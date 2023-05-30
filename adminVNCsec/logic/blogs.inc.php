<?php

require 'db.inc.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $sql = "SELECT * FROM blog";
    if ($result = $conn->query($sql)) {
        $arr = array();
        while ($row = $result->fetch_assoc()) {
            array_push($arr, $row);
        }
        $num = mysqli_num_rows($result);
        echo json_encode(['blogs' => $arr, 'num' => $num]);
    }
}
