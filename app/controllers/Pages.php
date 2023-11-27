<?php
  class Pages extends Controller {
    public function __construct() {
      $this->weatherModel = $this->model('Weather');
    }

    // Default method
    public function index() {
      //get Favorites
//      $soccerfav = $this->soccerModel->getSoccerFav();
      $soccerfav = [new stdClass()];
      $soccerfav[0]->name = 'Gerasin, Maksim';
      $soccerfav[0]->playerid = 'sr:player:68408';


      $data = [
        'soccerfav' => $soccerfav,
      ];

      $this->view('pages/index', $data);
    }


    public function weather($lat, $lon) {
      $weatherdata = $this->weatherModel->getWeatherByLatLon($lat, $lon);
      $city = $this->weatherModel->getCityByGeo($lat, $lon);

      $data = [
        'weather' => $weatherdata,
        'city' => $city,
      ];

      $this->view('pages/weather', $data);
    }
  }