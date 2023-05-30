<?php

require 'db.inc.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['signup'])) {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['rptpassword']) || empty($_POST['role'])) {
        header('location: ../signup.php?error=emptyinputs');
        exit();
    } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $pssword = $_POST['password'];
        $rpt = $_POST['rptpassword'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('location: ../signup.php?error=invalidemail');
            exit();
        }

        if (!preg_match("/^[a-zA-Z- ']*$/", $name)) {
            header('location: ../signup.php?error=invalidname');
            exit();
        }

        if ($rpt != $pssword) {
            header('location: ../signup.php?error=notmatchingpasswords');
            exit();
        }

        $hashedPwd = password_hash($pssword, PASSWORD_DEFAULT);

        $insertSql = 'INSERT INTO admins(name, email, role, pssword) VALUES(?,?,?,?)';
        $prepsql = $conn->prepare($insertSql);
        $prepsql->bind_param('ssss', $name, $email, $role, $hashedPwd);
        $prepsql->execute();
        $prepsql->close();

        header('location: ../admin.php');
        exit();
    }
}
