<?php

require 'db.inc.php';

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['value'])) {
    $value = $_GET['value'];
    $search = "%$value%";

    $sql = "SELECT * FROM blog WHERE blog_name LIKE ? ";
    $prep_sql = $conn->prepare($sql);
    $prep_sql->bind_param('s', $search);
    $prep_sql->execute();
    if ($result = $prep_sql->get_result()) {
        $arr = array();
        while ($row = $result->fetch_assoc()) {
            array_push($arr, $row);
        }
        echo json_encode(['blogs' => $arr]);
    } else {
        echo json_encode(['error' => 'Something went wrong']);
    }
    $prep_sql->close();
}
