<?php

require 'db.inc.php';

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['blogid'])) {
    $id = $_GET['blogid'];

    $sql = "UPDATE blog SET likes = likes + 1 WHERE blog_id = ?";
    $prep_sql = $conn->prepare($sql);
    $prep_sql->bind_param('i', $id);
    if ($prep_sql->execute()) {
        echo json_encode(['msg' => 'success']);
    } else {
        echo json_encode(['msg' => 'error']);
    }
    $prep_sql->close();
}

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['cid'])) {
    $cid = $_GET['cid'];

    $stmt = "UPDATE comments SET likes = likes + 1 WHERE id = $cid";
    if ($conn->query($stmt)) {
        echo json_encode(['msg' => 'success']);
    } else {
        echo json_encode(['msg' => 'error']);
    }
}
