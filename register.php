<?php
session_start();
include("config.php"); // Include database configuration
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css"> <!-- Linking CSS for Register -->
    <title>Register</title>
</head>
<body>
<div class="body1">
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar_container">
            <div class="Company_logo">
                <a href="/" id="navbar__logo"><img src="Images/WandermateLogo.webp" alt="Wandermate Logo"></a>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item"><a href="wandermate.php" class="navbar__links">Home</a></li>
                <li class="navbar__item"><a href="login.php" class="navbar__links">Login</a></li>
                <li class="navbar__item"><a href="register.php" class="navbar__links">Register</a></li>
                <li class="navbar__item"><a href="plan.php" class="navbar__links">Make a Plan</a></li>
                <li class="navbar__item"><a href="about.html" class="navbar__links">About</a></li>
            </ul>
        </div>
    </nav>

    <!-- Quote -->
    <div class="Quote">
        "Your journey starts here—plan, discover, and explore with Wandermate."
    </div>

    <!-- Register Form -->
    <div class="register-container">
        <div class="register-box">
            <?php
            if (isset($_POST['submit'])) {
                $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
                $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
                $dob = $_POST['dob'];
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

                // Check if email is unique
                $check_email_query = "SELECT email FROM users WHERE email='$email'";
                $result = mysqli_query($con, $check_email_query);

                if (mysqli_num_rows($result) > 0) {
                    echo "<div class='message'><p>Email already exists. Please use a different email.</p></div>";
                } else {
                    $insert_query = "INSERT INTO users (first_name, last_name, date_of_birth, email, password)
                                     VALUES ('$firstName', '$lastName', '$dob', '$email', '$password')";
                    if (mysqli_query($con, $insert_query)) {
                        echo "<div class='message'><p>Registration successful! <a href='login.php'>Login here</a>.</p></div>";
                    } else {
                        echo "<div class='message'><p>Error: Could not execute query: " . mysqli_error($con) . "</p></div>";
                    }
                }
            } else {
            ?>
            <header>Register</header>
            <form action="" method="post">
                <div class="field">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" required>
                </div>
                <div class="field">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" required>
                </div>
                <div class="field">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" id="dob">
                </div>
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field">
                    <input type="submit" name="submit" value="Register" class="btn">
                </div>
                <div class="links">
                    Already have an account? <a href="login.php">Login</a>
                </div>
            </form>
            <?php } ?>
        </div>
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
</body>
</html>
