<?php
  class User {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    // Register user
    public function register($data) {
      $this->db->query('INSERT INTO users (username, password) VALUES (:name, :password)');
      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':password', $data['password']);

      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }

    }

    //Login User
    public function login($user, $password) {
      $this->db->query('SELECT * FROM users WHERE username = :username');
      $this->db->bind(':username', $user);

      $row = $this->db->single();

      $hashed_password = $row->password;
      if(password_verify($password, $hashed_password)) {
        return $row;
      } else {
        return false;
      }
    }


    //Find user by username
    public function findUserByUsername($username) {
      $this->db->query('SELECT * FROM users WHERE username = :username');
      // Bind values
      $this->db->bind(':username', $username);

      $row = $this->db->single();

      //Check row
      if($this->db->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    }


    // Get User by ID
    public function getUserById($id) {
      $this->db->query('SELECT * FROM users WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $id);

      return $this->db->single();
    }

    public function getFavoritenByUserid($usrid) {
      $this->db->query('SELECT * FROM favoriten WHERE userid = :usr_id');
      // Bind values
      $this->db->bind(':usr_id', $usrid);

      return $this->db->resultSet();
    }
  }