<?php
session_start();
include("config.php");
include("weather_api.php");

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];

// Fetch user plans
$userId = $_SESSION['user_id'];

$query = "
    SELECT 
        plans.id, 
        plans.trip_name, 
        plans.start_date, 
        plans.end_date, 
        plans.budget, 
        plans.activities,
        plans.created_at,  
        plans.updated_at,  
        tbl_countries.name AS country_name, 
        tbl_states.name AS state_name, 
        tbl_cities.name AS city_name
    FROM 
        plans
    LEFT JOIN location_db.tbl_countries ON plans.country = tbl_countries.id
    LEFT JOIN location_db.tbl_states ON plans.state_province = tbl_states.id
    LEFT JOIN location_db.tbl_cities ON plans.city = tbl_cities.id
";

// Order by most recent trips first (based on created_at or updated_at)
$query .= " ORDER BY plans.created_at DESC";

if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    // Admins see all plans
    $query .= "";
} else {
    // Regular users see only their own plans
    $query .= " WHERE plans.user_id = '$userId'";
}

$result = mysqli_query($con, $query);

// Initialize variables
$error = '';
$temperature = '';
$description = '';
$city_name = '';

// Handle weather search
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['city']) && !empty($_POST['city'])) {
    $apiKey = "bec15965407f39af188bc9a893bf2181"; // Replace with your OpenWeatherMap API key
    $city = urlencode($_POST['city']);
    $url = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";

    $response = @file_get_contents($url);

    if ($response === FALSE) {
        $error = "Error fetching weather data. Please try again.";
    } else {
        $weather_data = json_decode($response, true);

        if ($weather_data && $weather_data['cod'] == 200) {
            $temperature = $weather_data['main']['temp'];
            $description = $weather_data['weather'][0]['description'];
            $city_name = $weather_data['name'];
        } else {
            $error = "Could not find weather data for the city. Please check the name and try again.";
        }
    }
}

// Handle travel recommendations
$recommendations = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['preferredWeather'])) {
    $apiKey = "bec15965407f39af188bc9a893bf2181"; // Replace with your OpenWeatherMap API key
    $preferredWeather = $_POST['preferredWeather'];
    $minTemp = $_POST['minTemp'];
    $maxTemp = $_POST['maxTemp'];

    $randomCities = [
        "London", "Paris", "Tokyo", "New York", "Dubai", "Mumbai", "Sydney", "Cape Town", "Berlin", "Rome",
        "Bangkok", "Istanbul", "Toronto", "Melbourne", "Shanghai", "Rio de Janeiro", "Lagos", "Madrid", "Los Angeles", "Cairo"
    ];

    foreach ($randomCities as $city) {
        if (count($recommendations) >= 3) {
            break;
        }

        $cityEncoded = urlencode($city);
        $url = "http://api.openweathermap.org/data/2.5/weather?q=$cityEncoded&appid=$apiKey&units=metric";

        $response = @file_get_contents($url);
        if ($response !== FALSE) {
            $weatherData = json_decode($response, true);

            if ($weatherData['cod'] == 200) {
                $temperature = $weatherData['main']['temp'];
                $condition = $weatherData['weather'][0]['description'];

                if ($temperature >= $minTemp && $temperature <= $maxTemp && strpos(strtolower($condition), strtolower($preferredWeather)) !== false) {
                    $recommendations[] = [
                        'city' => $weatherData['name'],
                        'country' => $weatherData['sys']['country'],
                        'temperature' => $temperature,
                        'condition' => $condition
                    ];
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Destinations</title>
    <link rel="stylesheet" href="css/destinations.css">
    <script>
        const apiKey = "bec15965407f39af188bc9a893bf2181"; // Replace with your OpenWeatherMap API key

        // Function to generate random coordinates
        function getRandomCoordinates() {
            const lat = (Math.random() * 180 - 90).toFixed(2); // Latitude: -90 to 90
            const lon = (Math.random() * 360 - 180).toFixed(2); // Longitude: -180 to 180
            return { lat, lon };
        }

        // Function to fetch weather data for random coordinates
        async function fetchWeather(lat, lon) {
            const weatherUrl = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric`;

            try {
                const response = await fetch(weatherUrl);
                if (!response.ok) throw new Error("Failed to fetch weather data");
                const data = await response.json();

                if (!data.name || !data.sys.country || data.name === "Unknown" || data.sys.country === "Unknown") {
                    return null;
                }

                return {
                    city: data.name,
                    country: data.sys.country,
                    temperature: data.main.temp,
                    description: data.weather[0].description,
                };
            } catch (error) {
                return null;
            }
        }

        // Function to fetch and display weather for 6 random locations
        async function updateWeather() {
            const weatherContainer = document.getElementById("global-weather-container");

            // Ensure a fixed height to prevent layout shifting
            weatherContainer.style.minHeight = "400px";

            const weatherData = [];
            while (weatherData.length < 6) {
                const { lat, lon } = getRandomCoordinates();
                const weather = await fetchWeather(lat, lon);
                if (weather) {
                    weatherData.push(weather);
                }
            }

            // Display weather for all valid locations
            weatherContainer.innerHTML = weatherData.map((weather) => {
                return `
                    <div>
                        <h3>Weather in ${weather.city}, ${weather.country}</h3>
                        <p>Temperature: ${weather.temperature}°C</p>
                        <p>Condition: ${weather.description}</p>
                    </div>
                `;
            }).join("");
        }

        // Update weather every 9 seconds
        document.addEventListener("DOMContentLoaded", () => {
            updateWeather();
            setInterval(updateWeather, 9000);
        });
    </script>
</head>
<body>
<div class="body1">

<!-- Navbar -->
<nav class="navbar">
  <div class="navbar_container">
    <div class="Company_logo">  
        <a href="wandermate.php" id="navbar__logo"><img src="Images/WandermateLogo.webp" alt="Wandermate Logo"></a>  
    </div>
    <ul class="navbar__menu">
      <li class="navbar__item">
        <a href="wandermate.php" class="navbar__links">Home</a>
      </li>
      <li class="navbar__item">
        <a href="plan.php" class="navbar__links">Make a Plan</a>
      </li>
      <li class="navbar__item">
        <a href="about.html" class="navbar__links">About</a>
      </li>
      <li class="navbar__item">
        <a href="logout.php" class="navbar__links">Logout</a>
      </li>
      <li class="navbar__item">
        <span class="navbar__links">Welcome, <?= htmlspecialchars($_SESSION['first_name']) ?></span>
      </li>
    </ul>
  </div>
</nav>

<!-- Quote -->
<div class="Quote">
  "Your journey starts here—plan, discover, and explore with Wandermate."
</div>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- User Plans Section -->
    <section class="user-plans">
        <h2>Your Planned Trips</h2>
        <div class="plans-list">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class='plan-card'>
                    <h3><?php echo htmlspecialchars($row['trip_name']); ?></h3>
                    <p><strong>Destination:</strong> <?php echo htmlspecialchars($row['country_name']); ?>, <?php echo htmlspecialchars($row['state_name']); ?>, <?php echo htmlspecialchars($row['city_name']); ?></p>
                    <p><strong>Dates:</strong> <?php echo htmlspecialchars($row['start_date']); ?> to <?php echo htmlspecialchars($row['end_date']); ?></p>
                    <p><strong>Budget:</strong> $<?php echo htmlspecialchars($row['budget']); ?></p>
                    <p><strong>Activities:</strong> <?php echo htmlspecialchars($row['activities']); ?></p>
                    <p><strong>Planned on:</strong> <?php echo date('F j, Y, g:i a', strtotime($row['created_at'])); ?></p>
                    <p><strong>Last updated on:</strong> <?php echo date('F j, Y, g:i a', strtotime($row['updated_at'])); ?></p>
                    <form action="edit_trip.php" method="get">
                    <input type="hidden" name="plan_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="btn">Edit</button>
                    </form>
                </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>You haven't planned any trips yet.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Random Weather Section -->
    <section class="global-weather">
        <h2>Weather Across the Globe</h2>
        <div id="global-weather-container"></div>
    </section>

    <!-- Recommendations Section -->
    <section class="recommendations">
        <h2>Recommendations Based on Weather</h2>
        <form method="POST" action="">
            <label for="preferredWeather">Preferred Weather Condition:</label>
            <input type="text" id="preferredWeather" name="preferredWeather" placeholder="e.g., clear sky" required>
            <label for="minTemp">Minimum Temperature (°C):</label>
            <input type="number" id="minTemp" name="minTemp" required>
            <label for="maxTemp">Maximum Temperature (°C):</label>
            <input type="number" id="maxTemp" name="maxTemp" required>
            <button type="submit" class="btn recommendation-btn">Get Recommendations</button>
        </form>

        <?php if (!empty($recommendations)): ?>
            <h3>Recommended Travel Destinations</h3>
            <ul>
                <?php foreach ($recommendations as $recommendation): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($recommendation['city']); ?>, <?php echo htmlspecialchars($recommendation['country']); ?></strong><br>
                        Temperature: <?php echo htmlspecialchars($recommendation['temperature']); ?>°C<br>
                        Condition: <?php echo htmlspecialchars($recommendation['condition']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['preferredWeather'])): ?>
            <p>No recommendations found based on your preferences. Try adjusting your criteria.</p>
        <?php endif; ?>

        <div class="search-weather">
            <h3>Search Weather</h3>
            <form method="POST" action="">
                <label for="city">Enter City Name:</label>
                <input type="text" id="city" name="city" required>
                <button type="submit" class="btn">Get Weather</button>
            </form>

            <?php if (!empty($error)): ?>
                <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
            <?php elseif (!empty($temperature) && !empty($description)): ?>
                <h3>Weather in <?php echo htmlspecialchars($city_name); ?></h3>
                <p>Temperature: <?php echo htmlspecialchars($temperature); ?>°C</p>
                <p>Condition: <?php echo htmlspecialchars($description); ?></p>
            <?php endif; ?>
        </div>
    </section>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container2">
        <ul>
            <li><a href="Contact.php">Contact Us</a></li>
            <li><a href="chatbot.html">Help</a></li>
            <li><a href="Socials.php">Socials</a></li>
            <li><a href="termsandservices.php">Terms and Services</a></li>
            <li><a href="privacypolicy.php">Privacy Policy</a></li>
        </ul>
    </div>
    <div class="return-home">
        <a href="wandermate.php" class="button">Return to Home</a>
    </div>
    <div class="CopyrightNotice">
        &copy; 2024 Wandermate, Inc. All rights reserved.
    </div>
</footer>

</body>
</html>
