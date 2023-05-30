<?php

require 'db.inc.php';

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['bid'])) {
    $id = $_GET['bid'];

    $sql = "SELECT * FROM comments WHERE blog_id = $id ORDER BY date DESC";
    if ($result = $conn->query($sql)) {
        $arr = array();
        while ($row = $result->fetch_assoc()) {
            array_push($arr, $row);
        }
        $num = mysqli_num_rows($result);
        echo json_encode(['comments' => $arr, 'num' => $num]);
    } else {
        echo json_encode(['error' => "Something went wrong"]);
    }
}


if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['comment'])) {
    $name = testinput($_GET['name']);
    $comment = testinput($_GET['comment']);
    $blogid = $_GET['blogid'];

    $stmt = "INSERT INTO comments(username, blog_id, comment) VALUES(?, ?, ?)";
    $prep_stmt = $conn->prepare($stmt);
    $prep_stmt->bind_param('sis', $name, $blogid, $comment);
    if ($prep_stmt->execute()) {
        echo json_encode(['msg' => 'success']);
    } else {
        echo json_encode(['msg' => 'error']);
    }
    $prep_stmt->close();
}


function testinput($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
