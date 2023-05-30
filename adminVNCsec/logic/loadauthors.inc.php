<?php

require 'db.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $arr = array();
    $sql = "SELECT * FROM authors";
    if ($result = $conn->query($sql, MYSQLI_ASSOC)) {
        while ($row = $result->fetch_assoc()) {
            array_push($arr, $row);
        }

        echo json_encode(['authors' => $arr]);
    } else {
        echo json_encode(['error' => 'Something went wrong try again later']);
    }
}
