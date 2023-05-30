<?php

require 'db.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        header('location: ../admin.php?error=emptyinputs');
        exit();
    } else {
        $email = $_POST['email'];
        $pwd = $_POST['password'];

        $checkSql = "SELECT * FROM admins WHERE email=?";
        $prepsql = $conn->prepare($checkSql);
        $prepsql->bind_param('s', $email);
        $prepsql->execute();

        if ($result = $prepsql->get_result()) {
            $admin = $result->fetch_assoc();
            $password = $admin['pssword'];
            $checkpwd = password_verify($pwd, $password);

            if ($checkpwd === false) {
                header('location: ../admin.php?error=wrongdetails');
                exit();
            } else if ($checkpwd === true) {
                session_start();
                $_SESSION['uid'] = $admin['id'];
                $_SESSION['name'] = $admin['name'];
                $_SESSION['role'] = $admin['role'];
                header('location: ../dashboard.php');
                exit();
            }
        } else {
            header('location: ../admin.php?error=wrongdetails');
            exit();
        }
        $prepsql->close();
        exit();
    }
}
