<?php
include("config.php");

if (isset($_GET['country_id'])) {
    $countryId = $_GET['country_id'];

    // Fetch cities based on the selected country
    $query = "SELECT id, name FROM location_db.tbl_cities WHERE countryId = '$countryId'";
    $result = mysqli_query($con, $query);
    $cities = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $cities[] = $row;
    }

    echo json_encode($cities); // Return cities as a JSON array
}
?>
