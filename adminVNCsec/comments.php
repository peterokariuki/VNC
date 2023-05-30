<?php
session_start();

if (!isset($_SESSION['uid'])) {
    header('location: admin.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VNC Comments</title>
    <link rel="stylesheet" href="css/comments.css">
</head>

<body>

    <main>

        <section id="navigation">
            <div class="admin-title">VNC</div>
            <div class="nav-links">
                <a href="dashboard.php">
                    <div class="inactivebtn">
                        <i></i>
                        Dashboard
                    </div>
                </a>
                <a href="add.php">
                    <div class="inactivebtn">
                        <i></i>
                        Add Blog
                    </div>
                </a>
                <a href="#">
                    <div class="activebtn">
                        <i></i>
                        Comments
                    </div>
                </a>
            </div>
            <div class="admin-details">
                <form action="logic/logout.inc.php" method="POST"><button class="admin-image" type="submit">Log Out</button></form>
                <div class="admin-name">
                    <h4><?php echo $_SESSION['name']; ?></h4>
                    <h5><?php echo $_SESSION['role']; ?></h5>
                </div>
            </div>
        </section>

        <section id="content">
            <div class="content-title">Comments (<span id="commentsnumbertotal">0</span>)</div>
            <div class="content-content" id="commentspagecontainer">
            </div>
        </section>

    </main>

    <script src="script/comments.js"></script>
</body>

</html>