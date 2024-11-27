<?php
session_start(); // Start the session
include("config.php"); // Include database configuration

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = $_POST['password'];

    // Query the database to find the user and fetch their role
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Store user information in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['role'] = $user['role']; // Store the role in the session

            // Redirect based on the role
            if ($user['role'] === 'admin') {
                // Redirect admins to an admin page
                header("Location: wandermate.php");
            } else {
                // Redirect regular users to the homepage
                header("Location: wandermate.php");
            }
            exit();
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Invalid email or password.";
    }
}
$error = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
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
                <li class="navbar__item"><a href="wandermate.php" class="navbar__links">Home</a></li>
                <li class="navbar__item"><a href="register.php" class="navbar__links">Register</a></li>
                <li class="navbar__item"><a href="plan.php" class="navbar__links">Make a Plan</a></li>
                <li class="navbar__item"><a href="about.html" class="navbar__links">About</a></li>
            </ul>
        </div>
    </nav>

    <!-- Login Section -->
    <div class="login-container">
        <div class="login-box">
            <header>Login</header>
            <?php if (isset($error)): ?>
                <p style="color: red;"><?= $error; ?></p>
            <?php endif; ?>
            <form action="" method="post">
                <div class="field">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required>
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field">
                    <input type="submit" value="Login" class="btn">
                </div>
                <div class="links">
                    Don't have an account? <a href="register.php">Register</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container2">
            <li class="container2_item"><a href="Contact.php" class="navbar__links">Contact Us</a></li>
            <li class="container2_item"><a href="chatbot.html" class="navbar__links">Help</a></li>
            <li class="container2_item"><a href="Socials.php" class="navbar__links">Socials</a></li>
            <li class="container2_item"><a href="termsandservices.php" class="navbar__links">Terms and Services</a></li>
            <li class="container2_item"><a href="privacypolicy.php" class="navbar__links">privacy policy</a></li>
        </div>
        <div class="CopyrightNotice">
            &copy; 2024 Wandermate, Inc. All rights reserved.
        </div>
    </footer>
</div>
</body>
</html>
