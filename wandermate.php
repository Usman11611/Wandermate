<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']); // Check if the user is logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wandermate - Your Travel Assistant</title>
    <link rel="stylesheet" href="css/Styles.css">
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
      <?php if ($isLoggedIn): ?>
        <li class="navbar__item">
          <a href="logout.php" class="navbar__links">Logout</a>
        </li>
        <li class="navbar__item">
          <span class="navbar__links">Welcome, <?= htmlspecialchars($_SESSION['first_name']) ?></span>
        </li>
      <?php else: ?>
        <li class="navbar__item">
          <a href="login.php" class="navbar__links">Login</a>
        </li>
        <li class="navbar__item">
          <a href="register.php" class="navbar__links">Register</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>

<!-- Greeting Message -->
<?php if ($isLoggedIn): ?>
    <div id="greeting" class="greeting">
        <p>Hello there, <?= htmlspecialchars($_SESSION['first_name']) ?>!</p>
    </div>
<?php endif; ?>

<div class="Quote">
  "Your journey starts here—plan, discover, and explore with Wandermate."
</div>

<!-- Hero Section -->
<div class="main">
    <div class="main_container">
<!-- Explore Destinations Card -->
<div class="main_content">
    <div class="category-info">
        <img src="Images/ExploreDestinations.png" alt="Explore Destinations" class="category-image">
        <h1>Explore Destinations</h1>
        <a href="destinations.php" class="button">Explore Destinations</a>
        <div class="jot-notes">
            <p><strong>Discover top destinations</strong> and hidden gems to inspire your next adventure.</p>
            <p><strong>Explore new cultures, landscapes,</strong> and experiences around the globe.</p>
            <p><strong>Find the perfect destination</strong> based on your preferences and travel goals, whether you're into relaxation or seeking adventure.</p>
            <p><strong>500+</strong> destinations worldwide</p>
        </div>
       
        <a href="destinations.php" class="cta-button">Start Exploring</a>
    </div>
    
    <div class="features">
        <h4>Key Features:</h4>
        <ul>
            <li><strong>Dynamic Location Search:</strong> Filter by country, state, and city.</li>
            <li><strong>Weather-Based Recommendations:</strong> Get personalized destination ideas based on the weather at your destination.</li>
            <li><strong>Real-Time Updates:</strong> Stay updated with the latest info about your destination.</li>
        </ul>
    </div>

    <div class="testimonials">
        <h3>What Our Travelers Say:</h3>
        <p>"Wandermate helped me find hidden gems I never would have discovered on my own. Truly a game changer for planning my trips!"</p>
        <cite>- Emily, Wanderlust Explorer</cite>
    </div>
</div>

<!-- Create Your Plan Card -->
<div class="main_content">
    <div class="category-info">
        <img src="Images/Createyourplan.png" alt="Create Your Plan" class="category-image">
        <h2>Create Your Plan</h2>
        <a href="plan.php" class="button">Create Your Plan</a>
        <div class="jot-notes">
            <p><strong>Craft a personalized travel itinerary</strong> tailored to your preferences.</p>
            <p><strong>Easily organize flights, accommodations,</strong> and activities in one place, simplifying the planning process.</p>
            <p><strong>Ensure your trip runs smoothly</strong> by customizing every detail of your journey, from the dates to the experiences.</p>
        </div>
        <div class="statistic-box">
            <p><strong>Customize your trip with</strong> detailed control over your itinerary.</p>
        </div>
        <a href="plan.php" class="cta-button">Start Planning</a>
    </div>
    
    <div class="features">
        <h4>Key Features:</h4>
        <ul>
            <li><strong>Customizable Itineraries:</strong> Personalize your travel plans to fit your needs.</li>
            <li><strong>Easy Organization:</strong> Organize your flights, hotels, and activities in one platform.</li>
            <li><strong>Complete Trip Control:</strong> Edit and adjust your travel plans on the go.</li>
        </ul>
    </div>

    <div class="testimonials">
        <h3>What Our Travelers Say:</h3>
        <p>"Creating my itinerary with Wandermate was so easy! I had everything organized in one place, which made my trip seamless."</p>
        <cite>- Sarah, Frequent Traveler</cite>
    </div>
</div>

<!-- Travel Tips Card -->
<div class="main_content">
    <div class="category-info">
        <img src="Images/Traveltips.png" alt="Travel Tips" class="category-image">
        <h3>Travel Tips</h3>
        <a href="tips.php" class="button">Travel Tips</a>
        <div class="jot-notes">
            <p><strong>Access essential tips</strong> and tricks for smooth, enjoyable trips.</p>
            <p><strong>Stay informed</strong> about the best travel practices, safety measures, and money-saving hacks to get the most out of your journey.</p>
            <p><strong>Learn the top hacks</strong> for making your trips efficient, comfortable, and memorable.</p>
        </div>
        <div class="statistic-box">
            <p><strong>Tips from experienced travelers</strong> for your best trip yet.</p>
        </div>
        <a href="tips.php" class="cta-button">Start Learning</a>
    </div>

    <div class="features">
        <h4>Key Features:</h4>
        <ul>
            <li><strong>Safety Tips:</strong> Know the best practices for a safe and enjoyable trip.</li>
            <li><strong>Money-Saving Hacks:</strong> Get recommendations on how to save while traveling.</li>
            <li><strong>Expert Recommendations:</strong> Learn from experienced travelers to optimize your trip.</li>
        </ul>
    </div>

    <div class="testimonials">
        <h3>What Our Travelers Say:</h3>
        <p>"The travel tips helped me save so much time and money. I was able to navigate unfamiliar places with confidence!"</p>
        <cite>- John, Budget Traveler</cite>
    </div>
</div>

<!-- Find Accommodations Card -->
<div class="main_content">
    <div class="category-info">
        <img src="Images/Findaccomodations.png" alt="Find Accommodations" class="category-image">
        <h4>Find Accommodations</h4>
        <a href="accommodations.php" class="button">Find Accommodations</a>
        <div class="jot-notes">
            <p><strong>Browse and book</strong> the best accommodations to fit your needs.</p>
            <p><strong>Choose from hotels, resorts,</strong> and unique stays to match your preferences and travel style.</p>
            <p><strong>Compare prices, read reviews,</strong> and find the best deals for your stay while enjoying comfort and convenience.</p>
        </div>
        <div class="statistic-box">
            <p><strong>Over 500+ choices</strong> to match your travel style.</p>
        </div>
        <a href="accommodations.php" class="cta-button">Start Booking</a>
    </div>

    <div class="features">
        <h4>Key Features:</h4>
        <ul>
            <li><strong>Extensive Search Options:</strong> Choose from hotels, resorts, and rentals.</li>
            <li><strong>Price Comparison:</strong> Compare prices from multiple sources for the best deal.</li>
            <li><strong>Read Reviews:</strong> Make informed decisions based on traveler feedback.</li>
        </ul>
    </div>

    <div class="testimonials">
        <h3>What Our Travelers Say:</h3>
        <p>"I found the perfect accommodation through Wandermate. It made my trip so much more comfortable and affordable."</p>
        <cite>- Anna, Luxury Traveler</cite>
    </div>
</div>

<!-- Placeholder Section for Scrolling -->
<div class="placeholder-section"></div>

<!-- Footer -->
<footer> 
        <div class="container2">
            <li class="container2_item">
                <a href="Contact.php" class="navbar__links">Contact Us</a>
            </li>
            <li class="container2_item">
                <a href="chatbot.html" class="navbar__links">Help</a>
            </li>
            <li class="container2_item">
                <a href="Socials.php" class="navbar__links">Socials</a>
            </li>
            <li class="container2_item">
                <a href="termsandservices.php" class="navbar__links">Terms and Services</a>
            </li>
            <li class="container2_item">
                <a href="privacypolicy.php" class="navbar__links">Privacy Policy</a>
            </li>
        </div>

        <div class="CopyrightNotice">
            &copy; 2024 Wandermate, Inc. All rights reserved.
        </div>
    </footer>

<script>
// Show the greeting temporarily
const greeting = document.getElementById('greeting');
if (greeting) {
    greeting.style.display = 'block';
    setTimeout(() => {
        greeting.style.display = 'none';
    }, 3000); // Disappear after 3 seconds
}
</script>
<script src="app.js"></script> 
</body>
</html>
