<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VNC</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" />
    <link rel="icon" type="image/png" href="assets/images/vnc-favicon.png"/>
</head>

<body>

    <header>

        <nav>
            <div class="floatheader">
                <div class="nav-logo"><a href="index.php">VNC</a></div>
                <ul>
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="blogs.php">Blogs</a></li>
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

        <section id="hero" class="section-p1">
            <div class="hero-left">
                <h1>Thoughts and insights around law that you'll love</h1>
            </div>
            <div class="hero-right">
                <div class="hero-image">
                    <img src="assets/images/pexels-ekaterina-bolovtsova-6077326.jpg" alt="mallet">
                </div>
                <div class="hero-btns">
                    <a href="blogs.php">
                        <div class="hero-blog">Blogs</div>
                    </a>
                    <div class="hero-subscribe btn-lightbrown">Subscribe</div>
                </div>
            </div>
        </section>

        <section id="trending">
            <div class="trending-title">Trending Blogs</div>
            <div class="trending-content">
                <div class="right-trending-content">
                </div>
            </div>
        </section>

        <section id="aero">
            <div class="aero-text">
                <h1>NEED HELP WITH ARTICLE OR LEGAL WRITING?.</h1>
                <h1>GET IN TOUCH AND WE'LL HELP YOU IN ANY WAY</h1>
            </div>
            <div class="aero-btns">
                <a href="contact.php">
                    <div class="aero-contact">Contact</div>
                </a>
            </div>
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

        <section id="newsletter-popup">
            <div class="dark-overlay">
                <div class="newsletter-form">
                    <div class="title-subscribe">Subscribe</div>
                    <div class="content-subscribe">
                        <h6>You will be notified when a new blog is posted.</h6>
                        <h6>[Your email will not be spammed with promotions]</h6>
                    </div>
                    <div id="errorpopup"></div>
                    <div id="successpopup"></div>
                    <div class="inputs-subscribe">
                        <input type="email" id="popupemailinput" placeholder="E-Mail" autocomplete="email">
                        <button id="popupnewslettersub">Shoot</button>
                    </div>
                    <div class="removepopup"><i class="fa-solid fa-x"></i></div>
                </div>
            </div>
        </section>

    </main>

    <footer>

        <div class="footer">
            <div class="footer-content">
                <div class="left-footer">
                    <div class="footer-logo"><a href="#">VNC</a></div>
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
                            <a href="blogs.php">Blogs</a>
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

    <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
    <script src="script/openblog.js"></script>
    <script src="script/index.js"></script>
    <script src="script/article.js"></script>
    <script src="script/newsletter.js"></script>
    <script src="script/popup.js"></script>
    <script src="script/menubar.js"></script>
    <script>
        const herosubscribe = document.querySelector(".hero-subscribe");
        const popup = document.querySelector("#newsletter-popup");
        const removepopup = document.querySelector(".removepopup");

        herosubscribe.addEventListener('click', () => {
            popup.style.display = "block";
        })

        removepopup.addEventListener('click', () => {
            popup.style.display = "none";
        })
    </script>
</body>

</html>