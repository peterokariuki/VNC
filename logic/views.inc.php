<?php

require 'db.inc.php';

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE blog SET views = views + 1 WHERE blog_id = $id";
    if ($result = $conn->query($sql)) {
        echo json_encode(['msg' => "success"]);
    } else {
        echo json_encode(['msg' => 'error']);
    }
}
