<?php

require 'db.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['author'])) {
    $id = $_GET['author'];

    $arr = array();

    $sql = "SELECT * FROM authors WHERE id = ?";
    $prep_sql = $conn->prepare($sql);
    $prep_sql->bind_param('i', $id);
    $prep_sql->execute();
    if ($result = $prep_sql->get_result()) {
        while ($row = $result->fetch_assoc()) {
            array_push($arr, $row);
        }
        echo json_encode(['author' => $arr]);
    } else {
        echo json_encode(['error' => "Something Went wrong, Try again!"]);
    }
}
