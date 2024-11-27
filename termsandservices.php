<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service - Wandermate</title>
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
                <h1 class="page-title">TERMS OF SERVICE</h1>

                <p>Welcome to Wandermate. By using our website (wandermate.com) and related services (hereafter referred to as "the Service"), you agree to comply with and be bound by the following Terms of Service and our Privacy Policy. Please read these terms carefully before using the Service. If you do not agree to these terms, you should not access or use the Service.</p>

                <h2>1. Account Registration</h2>
                <p>To use certain features of the Service, including the ability to make travel plans, you must create an account. When registering, you agree to provide accurate, current, and complete information. You are responsible for maintaining the confidentiality of your account credentials and for all activities under your account.</p>
                <ul>
                    <li><strong>Eligibility:</strong> You must be at least 18 years old or the legal age in your jurisdiction to create an account with Wandermate.</li>
                    <li><strong>Account Responsibility:</strong> You are responsible for all activities that occur under your account and agree to immediately notify us of any unauthorized access or use of your account.</li>
                </ul>

                <h2>2. Use of Service</h2>
                <p>You agree to use the Service only for lawful purposes and in accordance with these Terms. You agree not to use the Service to:</p>
                <ul>
                    <li>Violate any laws, rules, or regulations.</li>
                    <li>Engage in fraudulent or deceptive activities.</li>
                    <li>Upload or transmit harmful or unlawful content (e.g., malware, illegal content).</li>
                    <li>Access the Service through unauthorized means or interfere with its operation.</li>
                </ul>

                <h2>3. Privacy Policy</h2>
                <p>Wandermate values your privacy. By using the Service, you agree to the collection, use, and storage of your data as described in our <a href="privacypolicy.php">Privacy Policy</a>.</p>

                <h2>4. User-Generated Content</h2>
                <p>You may submit content (e.g., comments, plans, reviews) to the Service. By submitting content, you grant Wandermate a non-exclusive, royalty-free, worldwide license to use, display, and distribute your content in connection with the Service.</p>
                <ul>
                    <li>You must ensure that your content complies with applicable laws and does not infringe on any third-party rights.</li>
                    <li>Wandermate reserves the right to remove any content that violates these terms or is deemed inappropriate.</li>
                </ul>

                <h2>5. Payment and Subscriptions</h2>
                <p>Some features of the Service may require a paid subscription. When making payments, you agree to provide accurate payment information and acknowledge that charges may apply according to the subscription plan selected.</p>
                <ul>
                    <li><strong>Subscription Fees:</strong> Fees are billed on a recurring basis. You agree to pay all applicable fees on time.</li>
                    <li><strong>Refund Policy:</strong> Payments are generally non-refundable unless otherwise stated.</li>
                </ul>

                <h2>6. Termination</h2>
                <p>We reserve the right to suspend or terminate your access to the Service if we believe you have violated these Terms. You may also terminate your account at any time by contacting our support team.</p>

                <h2>7. Disclaimers and Limitation of Liability</h2>
                <ul>
                    <li><strong>No Warranty:</strong> The Service is provided "as is" and "as available" without any warranties, either express or implied.</li>
                    <li><strong>Limitation of Liability:</strong> Wandermate will not be liable for any damages arising from your use or inability to use the Service, including direct, indirect, incidental, punitive, or consequential damages.</li>
                </ul>

                <h2>8. Governing Law</h2>
                <p>These Terms are governed by and construed in accordance with the laws of the jurisdiction where Wandermate operates, and any disputes shall be subject to the exclusive jurisdiction of the courts in that jurisdiction.</p>

                <h2>9. Modifications</h2>
                <p>Wandermate reserves the right to modify these Terms at any time. Any changes will be posted on this page with the date of the last update. Continued use of the Service after such changes constitutes your acceptance of the new Terms.</p>

                <h2>10. Contact Information</h2>
                <p>If you have any questions or concerns about these Terms, please contact us at:</p>
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
