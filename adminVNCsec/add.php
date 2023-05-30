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
    <title>VNC BlogAdd</title>
    <link rel="stylesheet" href="css/add.css">
    <link rel="icon" type="image/png" href="../assets/images/vnc-favicon.png"/>
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
                <a href="#">
                    <div class="activebtn">
                        <i></i>
                        Add Blog
                    </div>
                </a>
                <a href="comments.php">
                    <div class="inactivebtn">
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
            <?php if (isset($_GET['error'])) {
                if ($_GET['error'] == 'emptyinputs') {
                    echo '<div class="errorinputblog">Please fill in all fields</div>';
                } else if ($_GET['error'] == 'insertfailed') {
                    echo '<div class="errorinputblog">Insert Failed, Try again!</div>';
                } else if ($_GET['error'] == 'bimagefailed') {
                    echo '<div class="errorinputblog">Image Upload Failed, Try again!</div>';
                }
            }
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == "success") {
                    echo '<div class="successinputblog">Successful</div>';
                }
            } ?>
            <div class="content-title">
                <div>Add Blog</div>
                <button class="btnadd" form="addblogform" type="submit" name="addblogbtn">Add Blog</button>
            </div>
            <form class="content-content" id="addblogform" method="POST" enctype="multipart/form-data" action="logic/addblog.inc.php">
                <div class="content-main">
                    <div class="name-smtitle">
                        <div class="blogname">
                            <label for="blogname">Name</label>
                            <input type="text" name="blogname" placeholder="Blog Name">
                        </div>
                        <div class="blogsmtitle">
                            <label for="blogsmtitle">Small Title</label>
                            <input type="text" name="blogsmtitle" placeholder="Small Title">
                        </div>
                    </div>
                    <div class="bgtitle">
                        <label for="bgtitle">Big Title</label>
                        <input type="text" name="bgtitle" placeholder="Big Title">
                    </div>
                    <div class="smparagraph">
                        <label for="smparagraph">Small Paragraph</label>
                        <textarea name="smparagraph" cols="30" rows="10" placeholder="Small Paragraph"></textarea>
                    </div>
                    <div class="blogimage">
                        <label for="blogimage">Blog Image</label>
                        <input type="file" name="blogimage">
                    </div>
                    <div class="author-readtime">
                        <select title="Author" id="authorselectdiv" name="authorselect">
                        </select>
                        <div class="readtime">
                            <label for="readtime">Estimate Read Time</label>
                            <input type="text" name="readtime" placeholder="Time">
                        </div>
                    </div>
                </div>
                <div class="content-sections" id="sectioncontainers">
                    <div class="contentsection">
                        <div class="contentsection-title">
                            <div>Section</div>
                            <button class="btnadd" type="button" id="addparagraph">Add Section</button>
                        </div>
                        <div class="contentsection-content">
                            <div class="paragraph">
                                <div class="paragraph-title">
                                    <label for="paratitle">Section Title</label>
                                    <input type="text" name="paratitle[]" placeholder="Title">
                                </div>
                                <div class="paragraph-content">
                                    <label for="paracontent">Section Content</label>
                                    <textarea name="paracontent[]" cols="30" rows="10" placeholder="Content"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form class="add-authors" method="post" enctype="multipart/form-data" action="logic/addauthor.inc.php">
                <?php if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'emptyauthors') {
                        echo '<div class="errorauthors">Please Fill in all fields</div>';
                    } else if ($_GET['error'] == 'stmtfailed') {
                        echo '<div class="errorauthors">Insert Failed, Try again!</div>';
                    } else if ($_GET['error'] == 'uploadfail') {
                        echo '<div class="errorauthors">Image not uploaded, Try again!</div>';
                    }
                }
                if (isset($_GET['msg'])) {
                    if ($_GET['msg'] == "successauthor") {
                        echo '<div class="successauthors">Successful</div>';
                    }
                } ?>
                <div class="add-authors-title">
                    <div>Add Author</div>
                    <button type="submit" name="addauthor" class="btnadd">Add Author</button>
                </div>
                <div class="add-authors-content">
                    <div class="name-author">
                        <label for="authorname">Name</label>
                        <input type="text" name="authorname" placeholder="Name">
                    </div>
                    <div class="name-author">
                        <label for="authorrole">Role</label>
                        <input type="text" name="authorrole" placeholder="Role">
                    </div>
                    <div class="name-author">
                        <label for="authorimage">Image</label>
                        <input type="file" name="authorimage" placeholder="Image">
                    </div>
                </div>
            </form>
        </section>

    </main>

    <script src="script/add.js"></script>
</body>

</html>