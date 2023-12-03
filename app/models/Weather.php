<?php
  class Weather {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getWeatherByLatLon($lat, $lon) {
      $apiUrl = 'https://api.openweathermap.org/data/3.0/onecall?lat=' . $lat . '&lon=' . $lon . '&lang=de&units=metric&appid=' . APIKEY;

      return json_decode(getApiData($apiUrl));
    }

    public function getCityByGeo($lat, $lon) {
      $apiUrl = 'https://api.openweathermap.org/geo/1.0/reverse?lat=' . $lat . '&lon=' . $lon . '&limit=1&appid=' . APIKEY;

      return json_decode(getApiData($apiUrl));
    }

    public function getGeoByCity($city) {
      $apiUrl = 'https://api.openweathermap.org/geo/1.0/direct?q=' . $city . '&limit=1&appid=' . APIKEY;

      return json_decode(getApiData($apiUrl));
    }

    public function getPollutionByLatLon($lat, $lon) {
      $apiUrl = 'https://api.openweathermap.org/data/2.5/air_pollution?lat=' . $lat . '&lon=' . $lon . '&appid=' . APIKEY;

      return json_decode(getApiData($apiUrl));
    }
  }