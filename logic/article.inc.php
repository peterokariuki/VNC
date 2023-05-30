<?php

require 'db.inc.php';


if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['type'])) {
    $type = $_GET['type'];

    if ($type == 'popular') {
        $psql = "SELECT * FROM blog ORDER BY likes DESC";
        if ($presult = $conn->query($psql)) {
            $parr = array();
            while ($prow = $presult->fetch_assoc()) {
                array_push($parr, $prow);
            }
            echo json_encode(['blogs' => $parr]);
        } else {
            json_encode(['error' => "Something went wrong"]);
        }
    } else if ($type == 'latest') {
        $lsql = "SELECT * FROM blog ORDER BY date DESC";
        if ($lresult = $conn->query($lsql)) {
            $larr = array();
            while ($lrow = $lresult->fetch_assoc()) {
                array_push($larr, $lrow);
            }
            echo json_encode(['blogs' => $larr]);
        } else {
            json_encode(['error' => "Something went wrong"]);
        }
    } else if ($type == 'foryou') {
        $fsql = "SELECT * FROM blog ORDER BY RAND()";
        if ($fresult = $conn->query($fsql)) {
            $farr = array();
            while ($frow = $fresult->fetch_assoc()) {
                array_push($farr, $frow);
            }
            echo json_encode(['blogs' => $farr]);
        } else {
            json_encode(['error' => "Something went wrong"]);
        }
    }
}
