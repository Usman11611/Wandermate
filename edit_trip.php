<?php
session_start();
include("config.php");

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Define admin role
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
$userId = $_SESSION['user_id'];

// Fetch the trip details if `plan_id` is provided
if (isset($_GET['plan_id'])) {
    $planId = $_GET['plan_id'];

    // Admins can edit any trip, regular users can only edit their own trips
    $query = "
        SELECT 
            plans.*, 
            tbl_countries.name AS country_name, 
            tbl_states.name AS state_name, 
            tbl_cities.name AS city_name 
        FROM plans
        LEFT JOIN location_db.tbl_countries ON plans.country = tbl_countries.id
        LEFT JOIN location_db.tbl_states ON plans.state_province = tbl_states.id
        LEFT JOIN location_db.tbl_cities ON plans.city = tbl_cities.id
        WHERE plans.id = '$planId'
    ";
    if (!$isAdmin) {
        $query .= " AND plans.user_id = '$userId'";
    }

    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $trip = mysqli_fetch_assoc($result);
    } else {
        die("Trip not found or you don't have permission to edit it.");
    }
} else {
    die("No trip ID provided.");
}

// Handle form submission for updating or deleting
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['update'])) {
        $tripName = mysqli_real_escape_string($con, $_POST['trip_name']);
        $startDate = mysqli_real_escape_string($con, $_POST['start_date']);
        $endDate = mysqli_real_escape_string($con, $_POST['end_date']);
        $budget = mysqli_real_escape_string($con, $_POST['budget']);
        $country = !empty($_POST['country']) ? mysqli_real_escape_string($con, $_POST['country']) : NULL;
        $stateProvince = !empty($_POST['state']) ? mysqli_real_escape_string($con, $_POST['state']) : NULL;
        $city = !empty($_POST['city']) ? mysqli_real_escape_string($con, $_POST['city']) : NULL;
        $activities = !empty($_POST['activities']) ? mysqli_real_escape_string($con, $_POST['activities']) : NULL;

        $updateQuery = "
            UPDATE plans 
            SET 
                trip_name = '$tripName', 
                start_date = '$startDate', 
                end_date = '$endDate', 
                budget = '$budget', 
                country = '$country', 
                state_province = '$stateProvince', 
                city = '$city', 
                activities = '$activities' 
            WHERE id = '$planId'
        ";
        if (!$isAdmin) {
            $updateQuery .= " AND user_id = '$userId'";
        }

        if (mysqli_query($con, $updateQuery)) {
            header("Location: destinations.php");
            exit();
        } else {
            die("Error updating trip: " . mysqli_error($con));
        }
    }

    if (isset($_POST['delete'])) {
        // Allow deletion even if fields are empty
        $deleteQuery = "DELETE FROM plans WHERE id = '$planId'";
        if (!$isAdmin) {
            $deleteQuery .= " AND user_id = '$userId'";
        }

        if (mysqli_query($con, $deleteQuery)) {
            header("Location: destinations.php");
            exit();
        } else {
            die("Error deleting trip: " . mysqli_error($con));
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Trip</title>
    <link rel="stylesheet" href="css/plan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="locations.js"></script>
</head>
<body>
    <div class="body1">
        <main class="main">
            <div class="main-container">
                <h1 class="page-title">Edit Your Trip</h1>
                <form method="POST" class="plan-form">
                    <!-- Trip Name -->
                    <div class="form-group">
                        <label for="trip-name">Trip Name</label>
                        <input type="text" id="trip-name" name="trip_name" value="<?php echo htmlspecialchars($trip['trip_name']); ?>" required>
                    </div>

                    <!-- Start Date -->
                    <div class="form-group">
                        <label for="start-date">Start Date</label>
                        <input type="date" id="start-date" name="start_date" value="<?php echo htmlspecialchars($trip['start_date']); ?>" required>
                    </div>

                    <!-- End Date -->
                    <div class="form-group">
                        <label for="end-date">End Date</label>
                        <input type="date" id="end-date" name="end_date" value="<?php echo htmlspecialchars($trip['end_date']); ?>" required>
                    </div>

                    <!-- Budget -->
                    <div class="form-group">
                        <label for="budget">Budget</label>
                        <input type="number" id="budget" name="budget" value="<?php echo htmlspecialchars($trip['budget']); ?>">
                    </div>

                    <!-- Country -->
                    <div class="form-group">
                        <label for="country">Country</label>
                        <select id="country" name="country" class="searchable-dropdown">
                            <option value="">Select Country...</option>
                        </select>
                    </div>

                    <!-- State -->
                    <div class="form-group">
                        <label for="state">State/Province</label>
                        <select id="state" name="state" class="searchable-dropdown" disabled>
                            <option value="">Select State/Province...</option>
                        </select>
                    </div>

                    <!-- City -->
                    <div class="form-group">
                        <label for="city">City</label>
                        <select id="city" name="city" class="searchable-dropdown" disabled>
                            <option value="">Select City...</option>
                        </select>
                    </div>

                    <!-- Activities -->
                    <div class="form-group">
                        <label for="activities">Activities</label>
                        <textarea id="activities" name="activities" rows="4"><?php echo htmlspecialchars($trip['activities']); ?></textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="button-container">
                        <button type="submit" name="update" class="button">Update Trip</button>
                        <button type="submit" name="delete" class="button" onclick="return confirm('Are you sure you want to delete this trip?');">Delete Trip</button>
                        <a href="destinations.php" class="button">Go Back</a>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        $(document).ready(function () {
            const selectedCountryId = "<?php echo $trip['country']; ?>";
            const selectedStateId = "<?php echo $trip['state_province']; ?>";
            const selectedCityId = "<?php echo $trip['city']; ?>";

            // Load countries
            function loadCountries(selectedCountryId, callback) {
                $.ajax({
                    url: "get_locations.php",
                    type: "GET",
                    data: { type: "countries" },
                    dataType: "json",
                    success: function (countries) {
                        const countryDropdown = $("#country");
                        countryDropdown.empty().append('<option value="">Select Country...</option>');
                        countries.forEach(function (country) {
                            const selected = country.id == selectedCountryId ? "selected" : "";
                            countryDropdown.append(`<option value="${country.id}" ${selected}>${country.name}</option>`);
                        });
                        countryDropdown.prop("disabled", false);

                        if (callback) callback();
                    }
                });
            }

            // Load states
            function loadStates(countryId, selectedStateId, callback) {
                $.ajax({
                    url: "get_locations.php",
                    type: "GET",
                    data: { type: "states", parent_id: countryId },
                    dataType: "json",
                    success: function (states) {
                        const stateDropdown = $("#state");
                        stateDropdown.empty().append('<option value="">Select State/Province...</option>');
                        states.forEach(function (state) {
                            const selected = state.id == selectedStateId ? "selected" : "";
                            stateDropdown.append(`<option value="${state.id}" ${selected}>${state.name}</option>`);
                        });
                        stateDropdown.prop("disabled", false);

                        if (callback) callback();
                    }
                });
            }

            // Load cities
            function loadCities(stateId, selectedCityId) {
                $.ajax({
                    url: "get_locations.php",
                    type: "GET",
                    data: { type: "cities", parent_id: stateId },
                    dataType: "json",
                    success: function (cities) {
                        const cityDropdown = $("#city");
                        cityDropdown.empty().append('<option value="">Select City...</option>');
                        cities.forEach(function (city) {
                            const selected = city.id == selectedCityId ? "selected" : "";
                            cityDropdown.append(`<option value="${city.id}" ${selected}>${city.name}</option>`);
                        });
                        cityDropdown.prop("disabled", false);
                    }
                });
            }

            // Initialize dropdowns with preselected values
            loadCountries(selectedCountryId, function () {
                if (selectedCountryId) {
                    loadStates(selectedCountryId, selectedStateId, function () {
                        if (selectedStateId) {
                            loadCities(selectedStateId, selectedCityId);
                        }
                    });
                }
            });

            // Handle cascading dropdowns
            $("#country").on("change", function () {
                const countryId = $(this).val();
                $("#state").empty().append('<option value="">Select State/Province...</option>').prop("disabled", true);
                $("#city").empty().append('<option value="">Select City...</option>').prop("disabled", true);
                if (countryId) {
                    loadStates(countryId);
                }
            });

            $("#state").on("change", function () {
                const stateId = $(this).val();
                $("#city").empty().append('<option value="">Select City...</option>').prop("disabled", true);
                if (stateId) {
                    loadCities(stateId);
                }
            });
        });
    </script>
</body>
</html>
