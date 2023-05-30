<?php

$servname = "localhost";
$dbname = "vnc";
$pass = "";
$user = "root";

$conn = new mysqli($servname, $user, $pass, $dbname);
if ($conn->connect_errno) {
    echo json_encode(['error' => $conn->connect_error]);
    exit();
}
