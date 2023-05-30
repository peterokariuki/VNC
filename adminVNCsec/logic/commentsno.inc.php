<?php

require 'db.inc.php';

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM comments WHERE blog_id = $id";
    if ($result = $conn->query($query)) {
        $num = mysqli_num_rows($result);
        echo json_encode(['num' => $num]);
    } else {
        echo json_encode(['num' => 'Something went wrong']);
    }
}
