<?php
include("config.php");

if (isset($_GET['country_id'])) {
    $countryId = $_GET['country_id'];

    // Fetch states based on the selected country
    $query = "SELECT id, name FROM location_db.tbl_states WHERE countryId = '$countryId'";
    $result = mysqli_query($con, $query);
    $states = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $states[] = $row;
    }

    echo json_encode($states); // Return states as a JSON array
}
?>
