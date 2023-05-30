<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" />
</head>

<body id="header">

    <header>

        <nav>
            <div class="floatheader">
                <div class="nav-logo"><a href="index.php">VNC</a></div>
                <ul>
                    <li><a href="index.php">Home</a></li>
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

        <section id="blog-title">
            <h2 id="bigblogtitle"></h2>
            <button class="btn-brown blog-subscribe">Subscribe</button>
        </section>

    </header>

    <main>

        <section id="blog">
            <div class="left-blog">
                <div class="path-date">
                    <div class="blog-path">
                        <a href="index.php">Home</a> / <a href="blogs.php">Blogs</a> / <a href="#" id="blogpathname"></a>
                    </div>
                    <div class="blog-date" id="blogdateposted"></div>
                </div>
                <div class="author-like">
                    <div class="author-details">
                        <div class="author-blog-image" id="authorblogimaged"></div>
                        <div class="author-blog-namerole">
                            <h6 id="authornameblog"></h6>
                            <h6 id="authorroleblog"></h6>
                        </div>
                    </div>
                    <button type="button" id="userlikebuttonblog" class="btn-readlike-white"><span id="bloglikescount">0</span> <i class="fa-regular fa-thumbs-up"></i> Likes</button>
                </div>
                <div class="blog-content" id="blogcontentcontainer">
                </div>
                <div class="comments-section">
                    <div class="comments-section-title">Comments (<span id="commentsnumberblog">0</span>)</div>
                    <div class="comments-section-content">
                        <div class="top-comments">
                            <div class="actual-comments" id="actualcommentscontainer">
                                <div id="emptycommentssection">Be the first to Comment</div>
                            </div>
                            <button type="button" id="loadmorecomments">Load All</button>
                        </div>
                        <div class="add-comments">
                            <div class="add-comments-title">Add Comment</div>
                            <div id="errordivcomment"></div>
                            <div class="add-comments-content">
                                <div class="name-addcomment">
                                    <label for="nameadd">Name</label>
                                    <input type="text" id="nameadd" placeholder="Name">
                                </div>
                                <div class="comment-addcomment">
                                    <label for="commentadd">Comment</label>
                                    <textarea id="commentadd" cols="30" rows="10" placeholder="Comment"></textarea>
                                </div>
                                <button type="button" id="addcommentbtn" class="btn-lightbrown">Add Comment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="right-blog">
                <div class="blog-advertisement-section">
                    <div class="blog-advertisement-title">Advertisement</div>
                    <div id="blog-advertisement-content"></div>
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


    <script>
        const body = document.querySelector("#header");
        let lastScroll = 0;

        window.addEventListener("scroll", () => {
            const currentScroll = window.pageYOffset;
            if (currentScroll <= 0) {
                body.classList.remove("scrollup");
            }

            if (currentScroll > lastScroll && !body.classList.contains("scrolldown")) {
                body.classList.remove("scrollup")
                body.classList.add("scrolldown")
            }

            if (currentScroll < lastScroll && body.classList.contains("scrolldown")) {
                body.classList.remove("scrolldown")
                body.classList.add("scrollup")
            }

            lastScroll = currentScroll;
        })

        const herosubscribe = document.querySelector(".blog-subscribe");
        const popup = document.querySelector("#newsletter-popup");
        const removepopup = document.querySelector(".removepopup");

        herosubscribe.addEventListener('click', () => {
            popup.style.display = "block";
        })

        removepopup.addEventListener('click', () => {
            popup.style.display = "none";
        })
    </script>
    <script src="script/article.js"></script>
    <script src="script/openblog.js"></script>
    <script src="script/blog.js"></script>
    <script src="script/newsletter.js"></script>
    <script src="script/popup.js"></script>
    <script src="script/menubar.js"></script>
</body>

</html>