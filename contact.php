<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" />
</head>

<body>

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

    </header>

    <main>
        <section id="contact">
            <div class="contact-title">
                <h1>Contact Us</h1>
                <h5>Do you have an issue, a recommendation or simply want to say Hi, Send us a message and We'll get back to you</h5>
            </div>
            <div class="contact-content">
                <div class="contact-form">
                    <div class="name-inputs">
                        <div class="fname-div">
                            <input type="text" id="firstname" placeholder="First Name">
                        </div>
                        <div class="lname-div">
                            <input type="text" id="lastname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="email-div">
                        <input type="email" id="emailc" autocomplete="email" placeholder="E-Mail">
                    </div>
                    <div class="message-div">
                        <textarea name="" id="messagec" cols="30" rows="10" placeholder="Message"></textarea>
                    </div>
                    <div id="errormessagec"></div>
                    <div id="successmessagec"></div>
                    <button id="sendmessagebtn">Send Message</button>
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
                            <a href="#">Work with us</a>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script/newsletter.js"></script>
    <script src="script/contact.js"></script>
    <script src="script/menubar.js"></script>
</body>

</html>