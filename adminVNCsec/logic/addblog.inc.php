<?php

require 'db.inc.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['addblogbtn'])) {
    if (empty($_POST['blogname']) || empty($_POST['blogsmtitle']) || empty($_POST['bgtitle']) || empty($_POST['smparagraph']) || empty($_FILES['blogimage']) || empty($_POST['authorselect']) || empty($_POST['readtime']) || empty($_POST['paratitle']) || empty($_POST['paracontent'])) {
        header('location: ../add.php?error=emptyinputs');
        exit();
    } else {
        $targetdir = '../../assets/images/';
        $storeddir = 'assets/images/';
        $name = $_POST['blogname'];
        $smtitle = $_POST['blogsmtitle'];
        $bgtitle = $_POST['bgtitle'];
        $smparagraph = $_POST['smparagraph'];
        $authorid = $_POST['authorselect'];
        $readtime = $_POST['readtime'];
        $paraTitle = $_POST['paratitle'];
        $paraContent = $_POST['paracontent'];
        $image = $targetdir . $_FILES['blogimage']['name'];
        $storeimage = $storeddir . $_FILES['blogimage']['name'];

        if (move_uploaded_file($_FILES['blogimage']['tmp_name'], $image)) {

            $firstSql = "INSERT INTO blog(blog_name, small_title, big_title, small_paragraph, blog_image, author_id, read_time) VALUES(?, ?, ?, ?, ?, ?, ?)";
            $prep_firstSql = $conn->prepare($firstSql);
            $prep_firstSql->bind_param('sssssis', $name, $smtitle, $bgtitle, $smparagraph, $storeimage, $authorid, $readtime);
            if ($prep_firstSql->execute()) {
                $prep_firstSql->close();
                for ($i = 0; $i < count($paraTitle); $i++) {
                    $secondSql = "UPDATE blog SET section_title$i = ?, section_paragraph$i = ? WHERE blog_name = ?";
                    $prep_secondSql = $conn->prepare($secondSql);
                    $prep_secondSql->bind_param('sss', $paraTitle[$i], $paraContent[$i], $name);
                    if (!$prep_secondSql->execute()) {
                        header('location: ../add.php?error=insertfailed');
                        exit();
                    } else {
                        $prep_secondSql->close();
                    }
                }

                header('location: ../add.php?msg=success');
                exit();
            } else {
                header('location: ../add.php?error=insertfailed');
                exit();
            }
        } else {
            header('location: ../add.php?error=bimagefailed');
            exit();
        }
    }
}
