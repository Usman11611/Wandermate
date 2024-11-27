<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function getWeather($country, $state, $city) {
    $apiKey = "bec15965407f39af188bc9a893bf2181"; // Replace with your OpenWeatherMap API key
    $query = urlencode("$city,$state,$country");
    $url = "http://api.openweathermap.org/data/2.5/weather?q=$query&appid=$apiKey&units=metric";

    $response = @file_get_contents($url);

    if ($response === FALSE) {
        return ['error' => 'Error fetching weather data. Please check your API key or connection.'];
    }

    $weather_data = json_decode($response, true);

    if ($weather_data && isset($weather_data['cod']) && $weather_data['cod'] == 200) {
        return [
            'temperature' => $weather_data['main']['temp'],
            'description' => $weather_data['weather'][0]['description'],
            'updated_at' => date('Y-m-d H:i:s')
        ];
    } elseif (isset($weather_data['message'])) {
        return ['error' => 'API Error: ' . $weather_data['message']];
    } else {
        return ['error' => 'Unknown error occurred while fetching weather data.'];
    }
}

if (isset($_GET['country']) && isset($_GET['state']) && isset($_GET['city'])) {
    $country = $_GET['country'];
    $state = $_GET['state'];
    $city = $_GET['city'];

    $weather = getWeather($country, $state, $city);
    header('Content-Type: application/json');
    echo json_encode($weather);
    exit();
}
?>
