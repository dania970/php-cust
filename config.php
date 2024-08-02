<?php

$servername = "localhost";
$username = "dania";
$password = "dania1234";
$dbname = "employesss";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
