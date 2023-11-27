<?php
  class Weather {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getWeatherByLatLon($lat, $lon) {
      $apiUrl = 'https://api.openweathermap.org/data/3.0/onecall?lat=' . $lat . '&lon=' . $lon . '&lang=de&units=metric&appid=' . APIKEY;

      $weatherData = json_decode(getApiData($apiUrl));

      return $weatherData;
    }
  }