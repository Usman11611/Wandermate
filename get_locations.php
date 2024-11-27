<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'location_db';

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $type = $_GET['type'];
    $parent_id = isset($_GET['parent_id']) ? intval($_GET['parent_id']) : null;

    switch ($type) {
        case 'countries':
            $query = "SELECT id, name FROM tbl_countries";
            $result = $conn->query($query);

            if (!$result) {
                echo "Query failed: " . $conn->error;
                exit;
            }

            $countries = [];
            while ($row = $result->fetch_assoc()) {
                $countries[] = $row;
            }
            echo json_encode($countries);
            break;

        case 'states':
            if ($parent_id) {
                $query = "SELECT id, name FROM tbl_states WHERE countryId = $parent_id";
                $result = $conn->query($query);

                if (!$result) {
                    echo "Query failed: " . $conn->error;
                    exit;
                }

                $states = [];
                while ($row = $result->fetch_assoc()) {
                    $states[] = $row;
                }
                echo json_encode($states);
            }
            break;

        case 'cities':
            if ($parent_id) {
                $query = "SELECT id, name FROM tbl_cities WHERE stateId = $parent_id";
                $result = $conn->query($query);

                if (!$result) {
                    echo "Query failed: " . $conn->error;
                    exit;
                }

                $cities = [];
                while ($row = $result->fetch_assoc()) {
                    $cities[] = $row;
                }
                echo json_encode($cities);
            }
            break;

        default:
            echo "Invalid type requested.";
            break;
    }
}

$conn->close();
?>

