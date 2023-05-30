<?php

require 'db.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $query = "SELECT * FROM comments ORDER BY date DESC";
    if ($result = $conn->query($query)) {
        $arr = array();
        while ($row = $result->fetch_assoc()) {
            array_push($arr, $row);
        }
        $num = mysqli_num_rows($result);
        echo json_encode(['comments' => $arr, 'num' => $num]);
    } else {
        echo json_encode(['error' => 'Something went wrong']);
    }
}
