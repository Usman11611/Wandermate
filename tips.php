<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']); // Check if the user is logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wandermate - Travel Tips</title>
    <link rel="stylesheet" href="css/Styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #a82222;
            color: white;
            padding: 20px;
            text-align: center;
        }
          .header h1 {
            font-size: 4rem; /* Makes the title larger */
             font-weight: bold; /* Ensures the text is bold */
             margin-bottom: 10px; /* Adds spacing below the title */
             text-transform: uppercase; /* Optional: Makes the text all uppercase */
             color: #ffffff; /* Keeps the text color white */
}
        }
        .header p {
            font-size: 1.2rem;
        }
        .container {
            max-width: 1000px;
            margin: 20px auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        h1, h2, h3 {
            color: #a82222;
        }
        ul {
            list-style-type: square;
            margin: 15px 0 15px 20px;
        }
        .tips-section {
            margin-bottom: 30px;
        }
        .image {
            text-align: center;
            margin: 20px 0;
        }
        .image img {
            max-width: 100%;
            border-radius: 10px;
        }
        blockquote {
            background: #f0f0f0;
            border-left: 5px solid #a82222;
            margin: 20px 0;
            padding: 15px 20px;
            font-style: italic;
        }
        .cta {
            text-align: center;
            margin-top: 30px;
        }
        .cta button {
            background-color: #a82222;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
        }
        .cta button:hover {
            background-color: #881919;
        }
/* Footer */
.footer {
    background-color: #b22222; /* Royale Red */
    color: #fff;
    text-align: center;
    padding: 30px 20px;
    margin-top: 40px;
}

.container2 ul {
    display: flex;
    justify-content: center;
    gap: 20px;
    list-style: none;
    margin-bottom: 20px;
    padding: 0;
}

.container2 ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    font-size: 1rem;
    transition: color 0.3s ease;
}

.container2 ul li a:hover {
    color: #ffcccc; /* Lightened red on hover */
}

.return-home-container {
    display: flex;
    justify-content: center;
    gap: 20px; /* Space between buttons */
    margin-top: 20px;
}

.return-home .button {
    padding: 10px 20px;
    background-color: #fff;
    color: #b22222;
    text-decoration: none;
    font-weight: bold;
    border-radius: 5px;
    border: 2px solid #b22222;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.return-home .button:hover {
    background-color: #b22222;
    color: #fff;
}
    </style>
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

<!-- Header Section -->
<div class="header">
    <h1>Travel Tips</h1>
    <p>Your ultimate guide to planning, packing, and exploring the world!</p>
</div>

<div class="container">
    <!-- Section: General Travel Tips -->
    <div class="tips-section">
        <h2>General Travel Tips</h2>
        <p>Whether you're a seasoned traveler or embarking on your first adventure, these general travel tips will help you prepare for a stress-free journey:</p>
        <ul>
            <li><strong>Pack Light:</strong> Only bring the essentials. A small, versatile wardrobe works better than heavy luggage.</li>
            <li><strong>Plan Ahead:</strong> Research your destination, book accommodations, and create a loose itinerary.</li>
            <li><strong>Stay Connected:</strong> Share your itinerary with a trusted friend or family member for emergencies.</li>
            <li><strong>Be Flexible:</strong> Not everything goes according to plan—embrace unexpected adventures.</li>
        </ul>
        <blockquote>"Travel is one of the rare investments that leaves you wealthier in experiences." – Usman Haider</blockquote>
    </div>

    <!-- Section: Destination-Specific Tips -->
    <div class="tips-section">
        <h2>Destination-Specific Tips</h2>
        <p>Each destination is unique. Here's how to make the most of your visit:</p>
        <div class="section-highlight">
            <h3>1. Cultural Etiquette</h3>
            <p>Respect local customs, dress codes, and traditions. For example:</p>
            <ul>
                <li>In Japan, bowing is a sign of respect.</li>
                <li>In many Middle Eastern countries, modest clothing is expected.</li>
            </ul>
        </div>
        <div class="section-highlight">
            <h3>2. Seasonal Travel</h3>
            <p>Traveling in the off-season often means fewer crowds and cheaper accommodations.</p>
        </div>
    </div>

    <!-- Section: Packing Guides -->
    <div class="tips-section">
        <h2>Packing Guides</h2>
        <p>Efficient packing can make or break your travel experience:</p>
        <ul>
            <li><strong>Carry-On Only:</strong> Avoid checked luggage to save time and reduce stress.</li>
            <li><strong>Travel Cubes:</strong> Use packing cubes to organize your belongings.</li>
            <li><strong>Essential Items:</strong> Don’t forget your passport, ID, travel insurance, and chargers.</li>
        </ul>
    </div>

    <!-- Image Section -->
    <div class="image">
    <img src="Images/tips5.webp" alt="tips1" class="category-image">
    </div>


    <!-- Section: Travel Safety Tips -->
    <div class="tips-section">
        <h2>Travel Safety Tips</h2>
        <p>Your safety is paramount while traveling. Follow these tips:</p>
        <ul>
            <li><strong>Keep Copies:</strong> Have digital and physical copies of important documents.</li>
            <li><strong>Stay Alert:</strong> Be aware of your surroundings and avoid unsafe areas, especially at night.</li>
            <li><strong>Travel Insurance:</strong> Always purchase insurance to cover medical emergencies, trip cancellations, or theft.</li>
        </ul>
    </div>

    <!-- Image Section -->
    <div class="image">
    <img src="Images/tips4.webp" alt="tips1" class="category-image">
    </div>

    <!-- Section: Budget Travel Tips -->
    <div class="tips-section">
        <h2>Budget Travel Tips</h2>
        <p>Traveling doesn't have to break the bank. Here are some money-saving ideas:</p>
        <ul>
            <li>Use price comparison tools like Skyscanner for flights.</li>
            <li>Stay in budget accommodations like hostels or Airbnbs.</li>
            <li>Cook your meals when possible to save on dining expenses.</li>
        </ul>
    </div>

    <!-- Image Section -->
    <div class="image">
    <img src="Images/tips3.webp" alt="tips1" class="category-image">
    </div>


    <!-- Section: Travel Gadgets -->
    <div class="tips-section">
        <h2>Essential Travel Gadgets</h2>
        <p>Make your trip more enjoyable with these must-have gadgets:</p>
        <ul>
            <li><strong>Noise-Canceling Headphones:</strong> Perfect for flights and noisy environments.</li>
            <li><strong>Power Bank:</strong> Keep your devices charged on the go.</li>
            <li><strong>Universal Adapter:</strong> Stay connected anywhere in the world.</li>
        </ul>
    </div>

    <!-- Image Section -->
    <div class="image">
    <img src="Images/tips2.webp" alt="tips1" class="category-image">
    </div>

    <!-- Section: Inspirational Travel Quotes -->
    <div class="tips-section">
        <h2>Inspirational Travel Quotes</h2>
        <div class="quote-section">
            <p>"The world is a book, and those who do not travel read only one page." – Saint Augustine</p>
            <p>"Travel far enough, you meet yourself." – David Mitchell</p>
        </div>
    </div>

    <!-- Image Section -->
    <div class="image">
    <img src="Images/tips1.webp" alt="tips1" class="category-image">
    </div>

    
</div>

<footer class="footer">
           
<div class="return-home-container">
    <div class="return-home">
        <a href="wandermate.php" class="button">Return to Home</a>
    </div>
    <div class="return-home">
        <a href="plan.php" class="button">Make A Plan</a>
    </div>
    <div class="return-home">
        <a href="destinations.php" class="button">Explore Destinations</a>
    </div>
</div>


           <div class="container2">
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
           <p>&copy; 2024 Wandermate, Inc. All rights reserved.</p>
       </footer>
</body>
</html>
