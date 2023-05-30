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
    <title>VNC Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" />
</head>

<body>

    <main>

        <section id="navigation">
            <div class="admin-title">VNC</div>
            <div class="nav-links">
                <a href="#">
                    <div class="activebtn">
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
            <div class="analytics">
                <div class="analytic">
                    <div class="analytic-icon"><i class="fa-solid fa-users"></i></div>
                    <div class="numbers">
                        <h3 id="subscribernos">0</h3>
                        <h5>Subscribers</h5>
                    </div>
                </div>
                <div class="analytic">
                    <div class="analytic-icon"><i class="fa-regular fa-clipboard"></i></div>
                    <div class="numbers">
                        <h3 id="blogsno">0</h3>
                        <h5>Blogs</h5>
                    </div>
                </div>
                <div class="analytic">
                    <div class="analytic-icon"><i class="fa-solid fa-thumbs-up"></i></div>
                    <div class="numbers">
                        <h3 id="blogslikesno">0</h3>
                        <h5>Likes</h5>
                    </div>
                </div>
                <div class="analytic">
                    <div class="analytic-icon"><i class="fa-solid fa-eye"></i></div>
                    <div class="numbers">
                        <h3 id="blogsviewsno">0</h3>
                        <h5>Views</h5>
                    </div>
                </div>
            </div>
            <div class="comments-section">
                <div class="comments">
                    <div class="comments-title">Recent Comments</div>
                    <div class="comments-content" id="dashboardcommentssec">
                    </div>
                </div>
            </div>
            <div class="blogs">
                <div class="blogs-title">
                    <p>Blogs</p>
                    <div class="search">
                        <input type="search" id="searchinput" placeholder="Search Blog">
                        <button type="button" id="searchbtn">Search</button>
                    </div>
                </div>
                <div class="blogs-content">
                    <div class="blogs-content-title">
                        <div class="blog-id-title">Id</div>
                        <div class="blog-title-title">Blog Name</div>
                        <div class="blog-date-title">Posted Date</div>
                        <div class="blog-comments-title">Comments</div>
                        <div class="blog-likes-title">Likes</div>
                        <div class="blog-views-title">Views</div>
                    </div>
                    <div class="blog-content-content">
                    </div>
                </div>
            </div>
        </section>

    </main>

    <script src="script/dashboard.js"></script>
</body>

</html>