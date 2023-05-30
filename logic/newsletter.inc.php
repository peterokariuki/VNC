<?php

require 'db.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['email'])) {
    $email = $_GET['email'];

    $sql = "INSERT INTO newsletter(email) VALUES(?)";
    $prep_sql = $conn->prepare($sql);
    $prep_sql->bind_param('s', $email);
    if ($prep_sql->execute()) {
        echo json_encode(['msg' => 'success']);
    } else {
        echo json_encode(['msg' => 'error']);
    }
    $prep_sql->close();
}
