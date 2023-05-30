<?php

require 'db.inc.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $arr = array();
    $sql = "SELECT * FROM blog";
    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            array_push($arr, $row);
        }
        echo json_encode(['blogs' => $arr]);
    } else {
        echo json_encode(['error' => "Something went wrong"]);
    }
}
