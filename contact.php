<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']); // Check if the user is logged in

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_system"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $conn->real_escape_string($_POST['firstname']);
    $lastname = $conn->real_escape_string($_POST['lastname']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert data into the database
    $sql = "INSERT INTO contacts (firstname, lastname, email, subject, message) 
            VALUES ('$firstname', '$lastname', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to confirmation page
        header("Location: confirmemail.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Wandermate</title>
    <link rel="stylesheet" href="css/Contact.css">
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

<!-- Contact Form Section -->
<div class="container">
    <h1>CONTACT US</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" id="firstname" name="firstname" required>
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" id="lastname" name="lastname" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit">Send Message</button>
    </form>
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
</body>
</html>
