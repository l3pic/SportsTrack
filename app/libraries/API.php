<?php
class API {
  private $db;

  public function __construct() {
    $this->db = new Database();
  }

  public function getAPIByName($name) {
    $this->db->query("SELECT * FROM api WHERE name = :name");
    $this->db->bind(':name', $name);

    return $this->db->single();
  }
}