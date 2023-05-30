<?php

require 'db.inc.php';

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = "SELECT * FROM blog WHERE blog_id = $id";
    if ($result = $conn->query($stmt)) {
        $arr = array();
        while ($row = $result->fetch_assoc()) {
            array_push($arr, $row);
        }
        echo json_encode(['blog' => $arr]);
    } else {
        echo json_encode(['error' => 'Something went wrong']);
    }
}
