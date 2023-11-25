<?php
function getApiData($url) {

  // Initialize cURL session
  $ch = curl_init($url);

  // Set cURL options
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  // Execute cURL session and get the response
  $response = curl_exec($ch);

  // Check for errors
  if (curl_errno($ch)) {
    die('Curl error: ' . curl_error($ch));
  }

  // Close cURL session
  curl_close($ch);

  return $response;
}