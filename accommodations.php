<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wandermate - Find Accommodations</title>
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
            text-align: center;
            padding: 20px;
        }
        .header h1 {
            font-size: 3rem;
            margin: 0;
        }
        .header p {
            margin: 10px 0;
            font-size: 1.2rem;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .section {
            margin-bottom: 30px;
        }
        h2 {
            color: #a82222;
        }
        p {
            margin-bottom: 15px;
        }
        ul {
            margin: 15px 0;
            padding-left: 20px;
            list-style-type: square;
        }
        .flex-container {
            display: flex;
            align-items: flex-start; /* Align content at the top */
            gap: 20px; /* Space between text and image */
        }
        .flex-container .text {
            flex: 2; /* Make the text take more space */
        }
        .flex-container .image {
            flex: 1; /* Make the image smaller in proportion */
            max-width: 300px; /* Ensure the image has a reasonable width */
        }
        .image img {
            width: 100%;
            border-radius: 8px;
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
  </div>
</nav>



    <div class="header">
        <h1>FIND ACCOMMODATIONS</h1>
        <p>Seamlessly plan where to stay, tailored to your travel needs</p>
    </div>

    <div class="container">
        <div class="section">
            <h2>Why Choose Wandermate for Accommodations?</h2>
            <div class="flex-container">
                <div class="text">
                    <ul>
                        <li><strong>Personalized Plans:</strong> Add and manage accommodations directly within your trip itinerary.</li>
                        <li><strong>Budget-Friendly Planning:</strong> Set your own budget and adjust accommodation details at your convenience.</li>
                        <li><strong>Local Highlights:</strong> Discover suggested accommodations near your chosen destinations.</li>
                        <li><strong>Integrated Tools:</strong> View your accommodations alongside other trip details, such as transportation and activities.</li>
                    </ul>
                </div>
                <!-- Image Section -->
    <div class="image">
    <img src="Images/accomodations1.webp" alt="tips1" class="category-image">
    </div>

            </div>
        </div>

        <div class="section">
            <h2>How Wandermate Simplifies the Process</h2>
            <div class="flex-container">
                <div class="text">
                    <p>Finding the perfect place to stay has never been easier:</p>
                    <ul>
                        <li><strong>Advanced Filters:</strong> Search by budget, type (luxury, family-friendly, eco-friendly), or location.</li>
                        <li><strong>Search and Personalization:</strong> Get tailored recommendations based on your previous searches and preferences.</li>
                        <li><strong>Interactive Map:</strong> Visualize all available accommodations with precise locations on our integrated system.</li>
                        <li><strong>Direct Booking:</strong> Book directly from our platform with seamless integration to trusted providers like Booking.com and Expedia.</li>
                    </ul>
                </div>
    <div class="image">
    <img src="Images/accomodations2.webp" alt="tips1" class="category-image">
    </div>
            </div>
        </div>

        <div class="section">
            <h2>Special Features of Wandermate Accommodations</h2>
            <div class="flex-container">
                <div class="text">
                    <ul>
                        <li><strong>Eco-Friendly Stays:</strong> Discover accommodations with sustainable practices.</li>
                        <li><strong>Family-Centric Options:</strong> Listings with family-friendly amenities such as play areas and kitchenettes.</li>
                        <li><strong>Discounts and Deals:</strong> Access exclusive promotions and group discounts.</li>
                        <li><strong>Travel Safety Information:</strong> Learn about neighborhood safety, emergency contacts, and local travel advisories.</li>
                    </ul>
                </div>
    <div class="image">
    <img src="Images/accomodations3.webp" alt="tips1" class="category-image">
    </div>
            </div>
        </div>

        <div class="section">
            <h2>User Testimonials</h2>
            <div class="flex-container">
                <div class="text">
                    <p>"Finding a place to stay in a new city used to be stressful. With Wandermate, I found the perfect budget-friendly Airbnb within minutes. Highly recommend!" - A satisfied traveler</p>
                    <p>"I love how Wandermate integrates weather data to suggest accommodations. It helped me pick a cozy lodge for my winter trip!" - Frequent traveler</p>
                </div>
    <div class="image">
    <img src="Images/accomodations4.png" alt="tips" class="category-image">
    </div>
            </div>
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
        <ul>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="chatbot.html">Help</a></li>
                    <li><a href="Socials.php">Socials</a></li>
                    <li><a href="termsandservices.php">Terms and Services</a></li>
                    <li><a href="privacypolicy.php">Privacy Policy</a></li>
                </ul>
        </div>

        <p>&copy; 2024 Wandermate, Inc. All rights reserved.</p>
    </footer>

</body>
</html>

