<?php

require 'db.inc.php';

if ($_SERVER['REQUEST_METHOD'] == "GET" && $_GET['blogid']) {
    $id = $_GET['blogid'];

    $sql = "SELECT * FROM blog WHERE blog_id = ?";
    $prep_sql = $conn->prepare($sql);
    $prep_sql->bind_param('i', $id);
    $prep_sql->execute();
    if ($result = $prep_sql->get_result()) {
        $arr = array();
        while ($row = $result->fetch_assoc()) {
            array_push($arr, $row);
        }
        echo json_encode(['blog' => $arr]);
    } else {
        echo json_encode(['error' => 'Something went wrong']);
    }
}
