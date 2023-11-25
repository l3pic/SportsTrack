<?php
  class Pages extends Controller {
    public function __construct() {
      $this->soccerModel = $this->model('Soccer');
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


    public function soccer() {
      $players = $this->soccerModel->getPlayers();


      $data = [
        'players' => $players,
      ];

      $this->view('pages/soccer', $data);
    }
  }