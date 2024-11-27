<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wandermate - Socials</title>
    <link rel="stylesheet" href="css/socials.css">
</head>
<body>

<div class="socials-page">
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
            </ul>
        </div>
    </nav>

<!-- Instagram Feed Section -->
<div class="socials-section">
    <h2>Follow Us on Instagram</h2>
    <iframe src="https://www.instagram.com/p/XXXXXXXXXXX/embed" width="400" height="480" frameborder="0" scrolling="no" allowtransparency="true" class="social-feed"></iframe>
    <div class="social-link">
        <a href="https://www.instagram.com/YourInstagramHandle" target="_blank">Visit Instagram</a>
    </div>
</div>

<!-- Twitter Feed Section -->
<div class="socials-section">
    <h2>Follow Us on Twitter</h2>
    <a class="twitter-timeline" href="https://twitter.com/YourTwitterHandle" data-tweet-limit="5" data-chrome="noheader nofooter noborders" data-theme="light">Tweets by YourTwitterHandle</a> 
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <div class="social-link">
        <a href="https://twitter.com/YourTwitterHandle" target="_blank">Visit Twitter</a>
    </div>
</div>


    <!-- Social Media Links -->
    <div class="socials-links">
        <a href="https://www.instagram.com/YourInstagramHandle" target="_blank">
            <img src="images/instagram.png" alt="Instagram" class="social-icon">
        </a>
        <a href="https://twitter.com/YourTwitterHandle" target="_blank">
            <img src="images/twitter.png" alt="Twitter" class="social-icon">
        </a>
    </div>

    <!-- About Section -->
    <div class="socials-about">
        <h2>Follow Us for Updates!</h2>
        <p>Stay connected with Wandermate on Instagram and Twitter for the latest travel tips, inspiration, and behind-the-scenes content. Join our community and start planning your next adventure with us!</p>
    </div>

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
</div>

<script src="app.js"></script> 
</body>
</html>
