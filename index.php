<?php
session_start();
session_destroy();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imag/REV.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap-icons-1.9.1/bootstrap-icons.css">
    <link rel="stylesheet" href="aos-master/dist/aos.css" />
    <title>Welcome To Rev</title>
</head>

<body>

    <header>
        <!--THE WEBSITE'S LOGO-->
        <div class="image_logo  bg-light">
            <img src="imag/REV.png" alt="graduation_cap" id="log">
        </div>
        <!--NAVIGATION SECTION OF THE WEB PAGE-->
        <nav class="navbar navbar-expand-lg bg-light" aria-label="Twelfth navbar example" id="link">
            <div class="container-fluid ">
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation" id="toggler">
            <span class="navbar-toggler-icon "></span>
          </button>

                <div class="collapse navbar-collapse justify-content-lg-center" id="navbarsExample10">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link  text-dark  " href="#about" style="margin-right:50px ; " id="link">ABOUT</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark " href="#" data-bs-toggle="dropdown" aria-expanded="false" style="margin-right:50px ;" id="link">STUDENT</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="students/CreateAccount.php" target="_self" id="dm">Register</a></li>
                                <li><a class="dropdown-item" href="students/RequestClearance.php" id="dm">Clearance</a></li>

                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="link" class="nav-link dropdown-toggle text-dark" href="#" data-bs-toggle="dropdown" aria-expanded="false">COMPANY / INSTITUTION</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="admin/login.php" id="dm">Login</a></li>
                                <li><a class="dropdown-item" href="admin/register.php" id="dm">Register</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
    </header>



    <main id="main">
        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
            <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade py-4" data-bs-ride="carousel">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="carousel-container">
                        <h2 class="animate__animated animate__fadeInDown ">WELCOME TO <span>REV</span></h2>
                        <h5 class="animate__animated animate__fadeInUp text-light py-3">
                            Online Academic Results Verification
                        </h5>
                        <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto ">Read More</a>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="carousel-container">
                        <h2 class="animate__animated animate__fadeInDown">STUDENTS</h2>
                        <h5 class="animate__animated animate__fadeInUp text-light">
                            <p> Are you intending to apply to a learning institution or just seeking clearance by verifying your results?</p>
                        </h5>
                        <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="carousel-container">
                        <h2 class="animate__animated animate__fadeInDown">COMPANY/INSTITUTION</h2>
                        <h5 class="animate__animated animate__fadeInUp text-light">
                            <p> Verify Results of your applicants as a third-party</p>
                        </h5>
                        <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"><i class="bi bi-chevron-left color-light"></i></span>
                </a>

                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"><i class="bi bi-chevron-right color-light"></i></span>
                </a>

            </div>


        </section>
        <!-- End Hero -->



        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">

                    <p>About REV</p>
                </div>

                <div class="row content" data-aos="fade-up">
                    <div class="col-lg-6">
                        <p>
                            REV is an online academic results verification system which offers the following services:
                        </p>
                        <ul>
                            <li><i class="bi bi-chevron-double-right"></i> Students intending to <strong> <a href="#application" data-bs-toggle="modal" data-bs-target="#application" id="abt">apply</a></strong> to a learning institution or seeking <strong><a href="#clearance" data-bs-toggle="modal" data-bs-target="#clearance" id="abt">Clearance</a></strong></strong>
                                after graduation can verify their results
                            </li>
                            <li><i class="bi bi-chevron-double-right"></i> Companies/Institutions can verify results of their applicants as a third-party</li>

                        </ul>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <img src="imag/REV.png" alt="REV" width="400" height="200">
                    </div>
                </div>

            </div>
        </section>
        <!-- End About Section -->




        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">

                    <p>Contact Us</p>
                </div>

                <div class="row mt-5">

                    <div class="col-lg-4" data-aos="fade-right">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>P10258 Hanniel Street,Lusaka</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+1 5589 55488 55s</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </section>
        <!-- End Contact Section -->

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="social-links">
                <a href="#" class="twitter"><i class="bi bi-whatsapp"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>

                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
            <div class="copyright">
                &copy; Copyright <strong><span>Tekrem</span></strong>. All Rights Reserved
            </div>

        </div>
        <a href="#" id="arrowh"><i class="bi bi-arrow-up color-warning" id="ficon"></i> </a>


    </footer>
    <!-- End Footer -->


    <script src="js/bootstrap.bundle.js"></script>

    <script src="aos-master/dist/aos.js"></script>
    <script>
        AOS.init({
            easing: 'ease-in-out-sine'
        });
    </script>

    <script src="script.js"></script>
</body>

</html>