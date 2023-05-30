<?php

require 'db.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addauthor'])) {
    if (empty($_POST['authorname']) || empty($_POST['authorrole']) || empty($_FILES['authorimage'])) {
        header('location: ../add.php?error=emptyauthors');
        exit();
    } else {
        $targetdir = '../../assets/images/';
        $storeddir = 'assets/images/';
        $name = $_POST['authorname'];
        $role = $_POST['authorrole'];
        $image = $targetdir . $_FILES['authorimage']['name'];
        $storeimage = $storeddir . $_FILES['authorimage']['name'];

        if (move_uploaded_file($_FILES['authorimage']['tmp_name'], $image)) {
            $authorSql = "INSERT INTO authors(name, role, image) VALUES(?, ?, ?)";
            $prepauthor = $conn->prepare($authorSql);
            $prepauthor->bind_param('sss', $name, $role, $storeimage);
            if ($prepauthor->execute()) {
                header("location: ../add.php?msg=successauthor");
                exit();
            } else {
                header('location: ../add.php?error=stmtfailed');
                exit();
            }
            $prepauthor->close();
        } else {
            header('location: ../add.php?error=uploadfail');
            exit();
        }
    }
}
