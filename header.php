<?php
    $directoryURI = $_SERVER['REQUEST_URI'];
    $path = parse_url($directoryURI, PHP_URL_PATH);
    $components = explode('/', $path);
    $first_part = $components[1];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CodeColab</title>
    <link rel="shortcut icon" href="assets/images/logo-mini.svg" />
    <!--/google-fonts -->
    <link href="//fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,700;1,700&display=swap" rel="stylesheet">
    <!--//google-fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>
<body>
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light stroke py-lg-0">
                <h1><a class="navbar-brand pe-xl-5 pe-lg-4" href="login_user.php">
                        { Code<span class="log">Colab }</span>
                    </a></h1>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-lg-auto my-2 my-lg-0 navbar-nav-scroll"></ul>
                    <!--/search-right-->
                    <ul class="header-search d-flex mx-lg-4">
                        <li class="nav-item search-right"></li>
                        <li class="nav-item propertyw3-btnhny">
                            <a href="login_user.php" class="btn btn-style btn-secondary">Start Sharing Now</a>
                        </li>
                    </ul>
                </div>
                <!-- toggle switch for light and dark theme -->
                <div class="mobile-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
    <!--//Header-->
    <!--//Banner-slider-->
    <section class="w3l-main-slider banner-slider position-relative" id="home">
        <div class="owl-one owl-carousel owl-theme">
            <div class="item">
                <div class="slider-info banner-view banner-top1">
                    <div class="container">
                        <div class="banner-info header-hero-19">
                            <p class="w3hny-tag"> Working for you &nbsp;& your Ease </p>
                            <h3 class="title-hero-19">Upload. Share. Document. Collaborate.</h3>
                            <a href="login_user.php" class="btn btn-style btn-primary mt-4">Discover More</a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
  

    <!--/w3-grids-->
    <section class="w3l-passion-mid-sec py-5">
        <div class="container py-md-5 py-3">
            <div class="row w3l-passion-mid-grids">
                <div class="col-lg-5 passion-grid-item-info mb-lg-0 mb-5 pe-lg-3">
                    <h6 class="title-subhny">What do we do ?</h6>
                    <h3 class="title-w3l mb-4">What is CodeColab?</h3>
                    <p class="mt-3 pe-lg-4" style="text-align: justify;">CodeColab is a platform that allows developers to seamlessly upload their projects and automatically generate AI-powered documentation, streamlining the documentation process.</p>
                    <!-- <p class="mt-3 pe-lg-5">It enables effortless sharing and collaboration, enhancing project visibility and fostering a community-driven environment for developers to showcase their work.</p> -->

                </div>
                <div class="col-lg-7 passion-grid-item-info ps-lg-5">
                    <h6 class="title-subhny">WHY US ?</h6>
                    <h3 class="title-w3l mb-4">Why Choose CodeColab?</h3>
                    <p class="mt-3 pe-lg" style="text-align: justify;">AI-Generated Documentation | Centralized Project Storage |  Collaboration Tools | Version Control</p>
                    <!-- <div class="w3banner-content-btns">
                        <a href="about.html" class="btn btn-style btn-primary mt-lg-5 mt-4">Read More </a>

                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!--//w3-grids-->
    <!-- features-section -->
    <section class="w3l-features py-5" id="features">
        <div class="container py-lg-5">
            <!-- <div class="row pb-lg-5 mb-lg-5 pt-lg-3">
                <div class="col-lg-5 text-left">
                    <h6 class="title-subhny two">What We Offer</h6>
                    <h3 class="title-w3l two">Building Brands More Quickly</h3>
                </div>
                <div class="col-lg-7 text-left ps-lg-5">
                    <p class="w3p-white">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo, ultrices in ligula. Semper at tempufddfel.Lorem ipsum dolor sit, amet consectetur elit.Lorem ipsum dolor sit amet.</p>
                </div>
            </div> -->
        </div>
    </section>
    <!--//features-section -->
    <!--/w3l-features-grids-->
    <section class="w3l-features-grids">
        <div class="container">
            <div class="main-cont-wthree-2">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-cloud"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">Upload Your Projects</a></h4>
                            <p class="text-para">Easily upload your coding projects to CodeColab, and organize them for quick access and sharing</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap active">
                            <div class="icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">AI-Powered Documentation</a></h4>
                            <p class="text-para">Let our AI automatically generate professional documentation for your projects, saving time and effort</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                        <div class="grids-1 box-wrap">
                            <div class="icon">
                                <i class="fas fa-share"></i>
                            </div>
                            <h4><a href="#service" class="title-head mb-3">
                                Share & Collaborate</a></h4>
                            <p class="text-para">Share your projects with others, collaborate seamlessly, and gain insights from the community</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--//w3l-features-grids-->

    <!--/w3-grids-->
    <section class="w3l-passion-mid-sec py-5">
        <div class="container py-md-5 py-3">
            <div class="heading text-center mx-auto">
                <h6 class="title-subhny">Our Works</h6>
                <h3 class="title-w3l mb-3">What We Do</h3>
            </div>
            <!--/row-1-->
            <div class="w3l-passion-mid-grids w3recent-works mt-5">
                <!--/row-1-->
                <div class="row w3l-passion-mid-grids">
                    <div class="col-lg-6 w3grids-left-img p-0">
                        <img src="assets/images/clou.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-6 passion-grid-item-info p-0">
                        <div class="w3grids-right-info">
                            <div class="icon-text">
                                <h5>Upload Projects</h5>
                                <h4><a href="#recent" class="title-head" style="text-align: justify;">
                                    Upload your coding projects in various formats..</a></h4><br>
                                <a href="#" class="read-more-icon"><i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--//row-1-->
                <!--/row-2-->
                <div class="row partrow-2 w3l-passion-mid-grids mt-lg-5 mt-4">
                    <div class="col-lg-6 passion-grid-item-info p-0">
                        <div class="w3grids-right-info">
                            <div class="icon-text">
                                <h5>AI-Powered Documentation</h5>
                                <h4><a href="#recent" class="title-head" style="text-align: justify;">
                                    Generate professional documentation for your projects using Strength of AI..</a></h4><br>
                                <a href="#" class="read-more-icon"><i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 w3grids-left-img p-0">
                        <img src="assets/images/ai.jpg" alt="" class="img-fluid">
                    </div>
                </div>
                <!--//row-2-->
                <!--/row-3-->
                <div class="row w3l-passion-mid-grids mt-lg-5 mt-4">
                    <div class="col-lg-6 w3grids-left-img p-0">
                        <img src="assets/images/collab.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-6 passion-grid-item-info p-0">
                        <div class="w3grids-right-info">
                            <div class="icon-text">
                                <h5>Share & Collaborate</h5>
                                <h4><a href="#recent" class="title-head">
                                    Enabling collaboration, feedback, and  sharing within the developer community..</a></h4><br>
                                <a href="#" class="read-more-icon"><i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--//row-3-->
            </div>
        </div>
    </section>
    <!--//w3-grids-->

    <!--/testimonials-->
    <section class="w3l-clients w3l-bg-grey py-5" id="testimonials">
        <div class="container py-md-5">
            <div class="row w3-testimonial-grids align-items-center py-lg-5">
                <div class="col-12 w3-testimonial-content-top">
                    <div class="mb-lg-0">
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="test-img"><img src="assets/images/nevil.png" class="img-fluid" alt="client-img">
                                </div>
                                <div class="testimonial">
                                    <blockquote>
                                        <q><i class="fas fa-quote-left me-2"></i>
                                            CodeColab was built to empower developers by simplifying project uploads, generating AI-driven documentation, and fostering collaboration. It's the tool I wish I had when I started coding.
                                            
                                    </blockquote>
                                    <div class="testi-des">

                                        <div class="peopl align-self">
                                            <h3>—  Nevil Dhinoja</h3>
                                            <p class="indentity">Founder ©CodeColab</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <footer class="w3l-footer">
        <div class="w3l-footer-16 py-5">
            <div class="container py-md-5">
                <div class="row footer-p">
                    <div class="col-lg-6 col-md-6 pe-lg-5">
                        <h2><a class="navbar-brand pe-xl-5 pe-lg-4" href="index.php">
                            { Code<span class="log">Colab }</span>
                        </a></h2>
                    </div>
                    <!-- <div class="col-lg-6 col-md-6">
                        <h4 class="mt-3">Start Working With CodeCollab Today</h4>
                    </div> -->
                </div>
                <div class="row footer-p mt-5 pt-lg-4">
                    <div class="col-lg-4 col-md-6 pe-lg-5">
                        <div class="column">
                            <h3>Contact</h3>
                            <p><a href="tel:+(21) 255 088 4943">(+91) 9426080847</a></p>
                        </div>

                        <div class="column mt-lg-5 mt-4">
                            <h3>Address</h3>
                            <p>CodeColab, Gujarat - India.</p>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6">

                        <div class="column">
                            <h3>For Support</h3>
                            <p><a href="mailto:finagenc@mail.com" class="mail">CodeColab@gmail.com</a></p>
                        </div>
                        <div class="column mt-lg-5 mt-4">
                            <h3>Follow</h3>
                            <ul class="social">
                                <li><a href="#facebook"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li><a href="https://www.linkedin.com/in/nevil-dhinoja/"target="_blank"><i class="fab fa-linkedin"></i></a>
                                </li>
                                <li><a href="https://github.com/Nevil-Dhinoja/"target="_blank"><i class="fab fa-github"></i></a>
                                </li>
                                <li><a href="#google"><i class="fab fa-google-plus-g"></i></a>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-6 mt-lg-0 mt-4 pl-xl-0">
                        <!-- <h3>Newsletter</h3>
                        <div class="end-column">
                            <form action="#" class="subscribe d-flex" method="post">
                                <input type="email" name="email" placeholder="Email Address" required="">
                                <button class="btn btn-secondary"><i class="fas fa-paper-plane"></i></button>
                            </form>
                            <p class="mt-4">Subscribe to our mailing list and get updates to your email inbox.</p>
                        </div> -->
                            <h4 class="mt-3">Free Yourself Start Working With CodeCollab Today!!</h4>
                    </div>
                </div>

                <div class="below-section pt-lg-4 mt-5">
                    <div class="row">

                        <p class="copy-text col-lg-7">&copy; 2025 CodeColab. All rights reserved. Design by Nevil Dhinoja</a>
                        </p>
                        <div class="col-lg-5 w3footer-gd-links d-flex">

                            <a href="#privacy">Privacy Policy</a>
                            <a href="#terms" class="mx-3">Terms of service</a>
                            <a href="#faq">FAQ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- //footer -->
    <!--/Js-scripts-->
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fas fa-arrow-up" aria-hidden="true"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

    </script>
    <!-- //move-top-->
    <!-- Template JavaScript -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/theme-change.js"></script>
    
    <!-- MENU-JS -->
    <script>
        $(window).on("scroll", function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function() {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function() {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function() {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });

    </script>
    <!-- //MENU-JS -->

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function() {
            $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            })
        });

    </script>
    <!-- //disable body scroll which navbar is in active -->

    <!-- //bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>
