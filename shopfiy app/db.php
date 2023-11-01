<?php
$servername = "localhost";
$username = "webdetty_solvpath";
$password = "_n}*Ptt}b{Fv";
$database = 'webdetty_solvpath';

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>