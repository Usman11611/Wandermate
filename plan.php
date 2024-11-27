<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']); // Correct session key
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a Plan - Wandermate</title>
    <link rel="stylesheet" href="css/plan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
</head>
<body>
    <div class="body1">
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
                    <?php if ($isLoggedIn): ?>
                        <li class="navbar__item"><a href="logout.php" class="navbar__links">Logout</a></li>
                        <li class="navbar__item"><span class="navbar__links">Welcome, <?= htmlspecialchars($_SESSION['first_name']) ?></span></li>
                    <?php else: ?>
                        <li class="navbar__item"><a href="login.php" class="navbar__links">Login</a></li>
                        <li class="navbar__item"><a href="register.php" class="navbar__links">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>

        <div class="Quote">
            "Your journey starts here—plan, discover, and explore with Wandermate."
        </div>

        <main class="main">
            <div class="main-container">
                <h1 class="page-title">MAKE YOUR TRAVEL PLAN</h1>
                <p class="page-subtitle">Plan every detail of your trip seamlessly with Wandermate.</p>

                <div class="form-container">
                    <form action="make_a_plan.php" method="POST" class="plan-form">
                        <!-- Left Column -->
                        <div class="form-left">
                            <div class="form-group">
                                <label for="trip-name">Trip Name</label>
                                <input type="text" id="trip-name" name="trip_name" placeholder="E.g., Summer Getaway 2024" required>
                            </div>
                            <div class="form-group">
                                <label for="start-date">Start Date</label>
                                <input type="date" id="start-date" name="start_date" required max="9999-12-31">
                            </div>
                            <div class="form-group">
                                <label for="end-date">End Date</label>
                                <input type="date" id="end-date" name="end_date" required max="9999-12-31">
                            </div>
                            <div class="form-group">
                                <label for="budget">Budget</label>
                                <input type="number" id="budget" name="budget" placeholder="Total Budget in $" required>
                            </div>
                        </div>
                        <!-- Right Column -->
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select id="country" name="country" class="searchable-dropdown" required>
                                <option value="">Select Country...</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="state">State/Province</label>
                            <select id="state" name="state" class="searchable-dropdown" disabled>
                                <option value="">Select State/Province...</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <select id="city" name="city" class="searchable-dropdown" disabled>
                                <option value="">Select City...</option>
                            </select>
                        </div>
                            
                            <div class="form-group">
                                <label for="activities">Activities</label>
                                <textarea id="activities" name="activities" rows="4" placeholder="E.g., Eiffel Tower visit at 10 AM"></textarea>
                            </div>
                        </div>
                        <!-- Save Button -->
                        <div class="button-container">
                            <button type="submit" class="button">Save Plan</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="locations.js"></script>
</body>

<script>
   $(document).ready(function () {
    const startDateInput = document.getElementById("start-date");
    const endDateInput = document.getElementById("end-date");
    const form = document.querySelector(".plan-form");

    // Function to enforce 4-digit year format
    function validateYearFormat(dateInput) {
        const dateValue = dateInput.value;
        const year = dateValue.split("-")[0];

        if (year.length > 4) {
            alert("Year must have only 4 digits.");
            dateInput.value = ""; // Clear the invalid value
        }
    }

    // Restrict invalid date formats dynamically
    startDateInput.addEventListener("input", function () {
        validateYearFormat(startDateInput);
    });

    endDateInput.addEventListener("input", function () {
        validateYearFormat(endDateInput);
    });

    // Add validation on form submission
    form.addEventListener("submit", function (event) {
        const startDateValue = startDateInput.value;
        const endDateValue = endDateInput.value;
        const today = new Date().toISOString().split("T")[0]; // Get today's date in YYYY-MM-DD format

        // Ensure Start Date is greater than or equal to today
        if (startDateValue < today) {
            alert("Start Date must be greater than or equal to today's date.");
            event.preventDefault();
            return;
        }

        // Ensure Start Date is less than End Date
        if (startDateValue >= endDateValue) {
            alert("Start Date must be less than the End Date.");
            event.preventDefault();
            return;
        }

        // Validate the year format for both dates
        const startYear = startDateValue.split("-")[0];
        const endYear = endDateValue.split("-")[0];

        if (startYear.length > 4 || endYear.length > 4) {
            alert("Year must have only 4 digits.");
            event.preventDefault();
            return;
        }

        // Ensure proper month and day values
        const startMonth = startDateValue.split("-")[1];
        const startDay = startDateValue.split("-")[2];
        const endMonth = endDateValue.split("-")[1];
        const endDay = endDateValue.split("-")[2];

        if (startMonth > 12 || startDay > 31 || endMonth > 12 || endDay > 31) {
            alert("Invalid month or day value in the date.");
            event.preventDefault();
            return;
        }
    });
});
</script>

</html>
