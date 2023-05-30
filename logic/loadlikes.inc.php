<?php

require 'db.inc.php';

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['cid'])) {
    $cid = $_GET['cid'];

    $sql = "SELECT * FROM comments WHERE id = $cid";
    if ($result = $conn->query($sql)) {
        $likes = $result->fetch_assoc()['likes'];
        echo json_encode(['likes' => $likes]);
    } else {
        echo json_encode(['error' => "Something went wrong"]);
    }
}

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['bid'])) {
    $bid = $_GET['bid'];

    $stmt = "SELECT * FROM blog WHERE blog_id = $bid";
    if ($bresult = $conn->query($stmt)) {
        $blikes = $bresult->fetch_assoc()['likes'];
        echo json_encode(['likes' => $blikes]);
    } else {
        echo json_encode(['error' => 'Something went wrong']);
    }
}
