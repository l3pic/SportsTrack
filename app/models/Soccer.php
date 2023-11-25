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

      return getApiData($apiUrl);
    }
  }