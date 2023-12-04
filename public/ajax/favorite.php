<?php
  require_once '../../app/bootstrap.php';

  $op = $_POST['op'];
  $userid = $_SESSION['user_id'];
  $database = new Database();
  //  $db = new Database();


  if($op == 'add') {
    $name = $_POST['name'];
    $lat = $_POST['lat'];
    $lon = $_POST['lon'];

    $database->query('INSERT INTO favoriten (name, lat, lon, userid) VALUES (:name, :lat, :lon, :userid)');
    // Bind values
    $database->bind(':name', $name);
    $database->bind(':lat', $lat);
    $database->bind(':lon', $lon);
    $database->bind(':userid', $userid);

    // Execute
    if($database->execute()) {
      echo json_encode(array('success' => 'true', 'newid' => $database->lastInsertId()));
    } else {
      echo json_encode(array('success' => 'false'));
    }
  } else if($op == 'remove') {
    $id = $_POST['id'];

    $database->query('DELETE FROM favoriten WHERE id = :id');
    $database->bind(':id', $id);
    if($database->execute()) {
      echo json_encode(array('success' => 'true'));
    } else {
      echo json_encode(array('success' => 'false'));
    }

  }