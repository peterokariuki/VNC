<?php

require 'db.inc.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $query = "SELECT * FROM newsletter";
    if ($result = $conn->query($query)) {
        $num = mysqli_num_rows($result);
        echo json_encode(['num' => $num]);
    }
}
