<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']); // Check if the user is logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success - Wandermate</title>
    <link rel="stylesheet" href="css/success.css">
</head>
<body>
<div class="body1">

<!-- Navbar -->
<nav class="navbar">
    <div class="navbar_container">
        <div class="Company_logo">  
            <a href="wandermate.php" id="navbar__logo">
                <img src="Images/WandermateLogo.webp" alt="Wandermate Logo">
            </a>  
        </div>
        <ul class="navbar__menu">
            <li class="navbar__item">
                <a href="wandermate.php" class="navbar__links">Home</a>
            </li>
            <li class="navbar__item">
                <a href="plan.php" class="navbar__links">Make Another Plan</a>
            </li>
            <li class="navbar__item">
                <a href="about.html" class="navbar__links">About</a>
            </li>
            <?php if ($isLoggedIn): ?>
                <li class="navbar__item">
                    <a href="logout.php" class="navbar__links">Logout</a>
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

<!-- Quote Section -->
<div class="Quote">
  "Your journey starts here—plan, discover, and explore with Wandermate."
</div>

<!-- Success Message Section -->
<div class="main success-message-container">
    <div class="success-message">
        <h1>Success! Your plan is made!</h1>
        <div class="navigation-links">
            <a href="wandermate.php" class="button">Back to Homepage</a>
            <a href="destinations.php" class="button">View Your Plan</a>
            <a href="plan.php" class="button">Make Another Plan</a>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
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

</div>
</body>
</html>
