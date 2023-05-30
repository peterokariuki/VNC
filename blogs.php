<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link rel="stylesheet" href="css/blogs.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" />
</head>

<body>

    <header>

        <nav>
            <div class="floatheader">
                <div class="nav-logo"><a href="index.php">VNC</a></div>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="blogs.php" class="active">Blogs</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="about.php">About</a></li>
                    <div id="closemenu"><i class="fa-solid fa-xmark"></i></div>
                </ul>
                <a href="contact.php">
                    <div class="btn-contact">Contact</div>
                </a>
                <div id="checkbtn"><i class="fa-solid fa-bars"></i></div>
            </div>
        </nav>

    </header>

    <main>

        <section id="blogs">
            <div class="left-blogs">
                <div class="left-blogs-title">Blogs</div>
                <div class="left-blogs-content" id="blogspagecontainer">
                </div>
            </div>
            <!-- <div class="right-blogs">
                <div class="advertisements-section">
                    <div class="advertisements-section-title">Advertisements</div>
                    <div class="advertisements-section-contents"></div>
                </div>
            </div> -->
        </section>

        <section id="articles">
            <div class="article-title">Articles</div>
            <div class="article-content">
                <div class="left-article-content">
                    <div class="left-article-buttons">
                        <div class="article-active articlebtns" id="foryou">For You</div>
                        <div class="article-inactive articlebtns" id="popular">Popular</div>
                        <div class="article-inactive articlebtns" id="latest">Latest</div>
                    </div>
                    <div class="left-article-blogs">
                    </div>
                </div>
                <!-- <div class="right-article-content">
                    <div class="right-advertisement-section">
                        <div class="advertisement-title">
                            Advertisement
                        </div>
                        <div id="advertisement-content"></div>
                    </div>
                </div> -->
            </div>
        </section>

    </main>

    <footer>

        <div class="footer">
            <div class="footer-content">
                <div class="left-footer">
                    <div class="footer-logo"><a href="index.php">VNC</a></div>
                    <div class="footer-aboutVNC">
                        VNC is an upcoming dlegate Dignissimos nam blanditiis omnis ipsa totam quasi perspiciatis aspernatur
                        dolores
                        labore sunt
                        sed, saepe, provident unde velit quo quis est eligendi assumenda eveniet
                    </div>
                </div>
                <div class="right-footer">
                    <div class="explore">
                        <div class="explore-title">Explore</div>
                        <div class="explore-links">
                            <a href="about.php">About</a>
                            <a href="services.php">Services</a>
                            <a href="#">Blogs</a>
                            <a href="contact.php">Work with us</a>
                        </div>
                    </div>
                    <div class="explore">
                        <div class="explore-title">Network</div>
                        <div class="explore-links">
                            <a href="#">Twitter</a>
                            <a href="#">Instagram</a>
                            <a href="#">Facebook</a>
                            <a href="#">Linkedin</a>
                        </div>
                    </div>
                    <div class="newsletter">
                        <div class="email-input">
                            <div class="newsletter-title">Subscribe to the newsletter</div>
                            <div id="errornewsletter"></div>
                            <div id="successnewsletter"></div>
                            <div class="newsletter-input">
                                <input type="email" id="newletterfemail" autocomplete="email" placeholder="E-Mail">
                                <div id="send-email-btn">Shoot</div>
                            </div>
                            <div class="newsletter-desc">Get notified when a blog is posted. No SPAMMING!</div>
                        </div>
                        <div class="site-country">
                            <div class="country-image">
                                <img src="assets/images/ke.svg" alt="Kenya">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-author-details">
                <p>Powered by <a href="https://vrstudios.live" target="_blank">vr_studios</a></p>
            </div>
        </div>

    </footer>

    <script src="script/blogs.js"></script>
    <script src="script/openblog.js"></script>
    <script src="script/article.js"></script>
    <script src="script/newsletter.js"></script>
    <script src="script/menubar.js"></script>
</body>

</html>