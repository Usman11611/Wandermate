<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("config.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=login_required");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are set
    $required_fields = ['trip_name', 'start_date', 'end_date', 'budget', 'country'];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            die("Error: Missing required field '$field'.");
        }
    }

    // Sanitize user input
    $trip_name = mysqli_real_escape_string($con, $_POST['trip_name']);
    $start_date = mysqli_real_escape_string($con, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($con, $_POST['end_date']);
    $budget = mysqli_real_escape_string($con, $_POST['budget']);
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $state_province = !empty($_POST['state']) ? mysqli_real_escape_string($con, $_POST['state']) : NULL;
    $city = !empty($_POST['city']) ? mysqli_real_escape_string($con, $_POST['city']) : NULL;
    $activities = !empty($_POST['activities']) ? mysqli_real_escape_string($con, $_POST['activities']) : NULL;
    $user_id = $_SESSION['user_id'];

    // Insert into database
    $query = "INSERT INTO plans (user_id, trip_name, start_date, end_date, budget, country, state_province, city, activities)
              VALUES ('$user_id', '$trip_name', '$start_date', '$end_date', '$budget', '$country', '$state_province', '$city', '$activities')";

    if (mysqli_query($con, $query)) {
        header("Location: success.php");
        exit();
    } else {
        die("Error inserting data: " . mysqli_error($con));
    }
} else {
    header("Location: plan.php");
    exit();
}
?>
