<?php
  class Soccer {
    private $db;
    private $api;

    public function __construct() {
      $this->db = new Database();
      $this->api = new API();
    }

    public function getPlayers() {
      $playersapi = $this->api->getAPIByName('soccer_players');
      $link = $playersapi->link;
      $apikey = $playersapi->key;

      $link = str_replace(':language_code', 'de', $link);
      $link = str_replace(':format', '.json', $link);

      $apiUrl = APIBASEURL . $link . '?api_key=' . $apikey;



      $playerids = json_decode(getApiData($apiUrl))->mappings;

      $players = [];
      foreach($playerids as $index => $playerid) {
        if ($index > 10) {
          break;
        }
        $profileapi = $this->api->getAPIByName('soccer_profile');
        $link = $profileapi->link;
        $apikey = $profileapi->key;

        $link = str_replace(':language_code', 'de', $link);
        $link = str_replace(':player_id', $playerid->id, $link);
        $link = str_replace(':format', '.json', $link);

        $apiUrl = APIBASEURL . $link . '?api_key=' . $apikey;

        $player = getApiData($apiUrl);

        array_push($players, $player);
      }

      return json_encode($players);
    }
  }