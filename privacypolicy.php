<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - Wandermate</title>
    <link rel="stylesheet" href="css/plan.css">
    <style>
        /* General Resets */
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

/* Body Styling */
body {
    font-family: 'Arial', sans-serif;
    color: #660000; /* Dark red */
    line-height: 1.6;
    background-color: #f5f5f5;
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Ensure body fills entire viewport height */
}

/* Page Wrapper */
.page-wrapper {
    display: flex;
    flex-direction: column;
    flex-grow: 1; /* Ensures the main content takes up the remaining space */
}

/* Navbar Styling */
.navbar {
    background-color: #b22222; /* Royale Red */
    height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 1.2rem;
    position: sticky;
    top: 0;
    z-index: 999;
}

.navbar_container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 90%;
    max-width: 1300px;
    padding: 0 20px;
}

.Company_logo {
    width: 150px;
    height: auto;
    margin-top: 20px;
}

.Company_logo img {
    width: 100%;
    height: auto;
    pointer-events: none;
}

.navbar__menu {
    display: flex;
    align-items: center;
    list-style: none;
    gap: 2rem;
}

.navbar__links {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

.navbar__links:hover {
    color: #ffcccc; /* Lightened red on hover */
}

/* Main Content Styling */
.main-content {
    flex-grow: 1; /* This ensures the content takes up the remaining space */
    padding: 40px 20px;
    max-width: 1000px;
    margin: 40px auto;
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.page-title {
    font-size: 2.5rem;
    color: #b22222;
    text-align: center;
    margin-bottom: 20px;
}

.page-subtitle {
    font-size: 1.2rem;
    color: #660000;
    text-align: center;
    margin-bottom: 30px;
}

/* Terms of Service Content */
h2 {
    font-size: 2rem;
    color: #b22222;
    margin-top: 20px;
    margin-bottom: 10px;
}

p {
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 20px;
}

ul {
    list-style-type: disc;
    padding-left: 20px;
}

ul li {
    margin-bottom: 10px;
}

/* Button Styling */
.button-container {
    text-align: center;
    margin-top: 30px;
}

.button {
    display: inline-block;
    padding: 12px 25px;
    background-color: #660000; /* Royale Red */#660000
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    font-size: 1rem;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.button:hover {
    background-color: #4B0000; /* Darker red on hover */
    transform: scale(1.05);
}

/* Footer Styling */
footer {
    background-color: #b22222; /* Royale Red */
    color: #fff;
    text-align: center;
    padding: 20px 10px;
    width: 100%;
    position: relative;
}

.container2 {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 10px;
}

.container2_item a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

.container2_item a:hover {
    color: #ffcccc; /* Lightened red on hover */
}

.CopyrightNotice {
    font-size: 0.9rem;
    color: #ffcccc;
}

/* Ensure footer stays at the bottom */
html, body {
    height: 100%;
}

.page-wrapper {
    display: flex;
    flex-direction: column;
    flex-grow: 1; /* Makes sure the footer stays at the bottom */
}

    </style>
</head>
<body>
    <div class="page-wrapper">
        <!-- Header Section -->
        <header>
            <nav class="navbar">
                <div class="navbar_container">
                    <div class="Company_logo">
                        <a href="wandermate.php" id="navbar__logo">
                            <img src="Images/WandermateLogo.webp" alt="Wandermate Logo">
                        </a>
                    </div>
                    <ul class="navbar__menu">
                        <li class="navbar__item"><a href="wandermate.php" class="navbar__links">Home</a></li>
                        <li class="navbar__item"><a href="destinations.php" class="navbar__links">Destinations</a></li>
                        <li class="navbar__item"><a href="plan.php" class="navbar__links">Make a Plan</a></li>
                        <li class="navbar__item"><a href="about.html" class="navbar__links">About</a></li>
                        <li class="navbar__item"><a href="termsandservices.php" class="navbar__links">Terms of Service</a></li>
                        <li class="navbar__item"><a href="privacypolicy.php" class="navbar__links">Privacy Policy</a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Main Content Section -->
        <main class="main-content">
            <div class="content-wrapper">
                <h1 class="page-title">PRIVACY POLICY</h1>

                <p>Welcome to Wandermate. This Privacy Policy explains how we collect, use, and protect your personal information when you use our website and services. By using the Service, you consent to the practices described in this policy.</p>

                <h2>1. Introduction</h2>
                <p>This Privacy Policy explains how we collect, use, and protect your personal information when you use the Service. By using Wandermate, you consent to the practices described in this policy.</p>

                <h2>2. Information We Collect</h2>
                <p>We collect the following types of information:</p>
                <ul>
                    <li><strong>Personal Information:</strong> When you register for an account, we collect your name, email address, and any other information you provide during the sign-up process.</li>
                    <li><strong>Account Information:</strong> We collect information related to your account activity, including the trips you create, your preferences, and interactions with the Service.</li>
                    <li><strong>Payment Information:</strong> If you make payments, we collect your payment details but do not store sensitive financial data directly. Payments are processed through a third-party provider.</li>
                </ul>

                <h2>3. How We Use Your Information</h2>
                <p>We use your personal information to:</p>
                <ul>
                    <li>Provide and maintain the Service.</li>
                    <li>Respond to your inquiries and provide customer support.</li>
                    <li>Improve the Service and conduct analytics.</li>
                    <li>Send you promotional emails (you can opt out at any time).</li>
                    <li>Process payments for any subscriptions or services you purchase.</li>
                </ul>

                <h2>4. Sharing Your Information</h2>
                <p>We do not sell or rent your personal information to third parties. However, we may share your information with trusted third-party service providers who assist in providing the Service, such as payment processors or marketing partners. These third parties are obligated to keep your information confidential.</p>

                <h2>5. Data Security</h2>
                <p>We use industry-standard security measures to protect your data, but please be aware that no method of transmission over the internet is completely secure. We cannot guarantee the absolute security of your information.</p>

                <h2>6. Your Rights</h2>
                <p>You have the right to:</p>
                <ul>
                    <li>Access and update your personal information.</li>
                    <li>Request the deletion of your account and data, subject to certain exceptions.</li>
                    <li>Opt-out of marketing communications.</li>
                </ul>

                <h2>7. Cookies and Tracking Technologies</h2>
                <p>We use cookies and other tracking technologies to improve your experience with the Service, analyze trends, and gather demographic information. You can control cookie settings through your browser.</p>

                <h2>8. Data Retention</h2>
                <p>We retain your personal information for as long as necessary to fulfill the purposes outlined in this Privacy Policy or as required by law.</p>

                <h2>9. Youth's Privacy</h2>
                <p>The Service is not intended for users under the age of 18, and we do not knowingly collect personal information from those under the legal age. If we learn that we have collected personal information from a child under 18, we will delete it.</p>

                <h2>10. Changes to This Privacy Policy</h2>
                <p>We may update this Privacy Policy from time to time. Any changes will be posted on this page, and the date of the last revision will be updated. Please review this Privacy Policy periodically to stay informed about our practices.</p>

                <h2>11. Contact Us</h2>
                <p>If you have any questions or concerns about this Privacy Policy, please contact us at:</p>
                <ul>
                    <li><strong>Email:</strong> support@wandermate.com</li>
                </ul>
            </div>
        </main>

        <!-- Footer Section -->
        <footer>

        <div class="return-home">
                <a href="wandermate.php" class="button">Return to Home</a>
            </div>

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
