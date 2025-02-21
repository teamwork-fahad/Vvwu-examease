<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap 5.0.2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">

    <!-- Material Design Icons -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/4.0.0/iconfont/material-icons.min.css">

    <!-- Font Awesome 5.3.1 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <!-- Bootstrap 4.1.1 (Older Version) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <style>
    html {
        scroll-behavior: smooth;
    }
    .carousel-inner div {
    height: 400px;
    object-fit: cover;

}

    aside {
        width: 30%;
        padding-left: 15px;
        margin-left: 15px;
        float: right;
        font-style: italic;
        background-color: lightgray;
    }

    .bg-black {
        background: linear-gradient(109.6deg, rgb(36, 45, 57) 11.2%, rgb(16, 37, 60) 51.2%, rgb(0, 0, 0) 98.6%);

    }

    .text-white {
        color: white;
    }

    .text-black {
        color: black;
    }

    .bg-primary-orange {
        background-color: #fec503;
    }

    .primary-orange {
        color: #fec503;
    }

    .org-btn {
        border: 1px solid #fec503;
        color: #fec503;
    }

    .org-btn:hover {
        background-color: #fec503;
        color: white;
    }

    .light-grey {
        color: #6c757d;
    }

    .bg-light-grey {
        background-color: #6c757d:
    }

    .social-buttons-circle-dark-grey {
        background: #1a1d20;
    }

    /* img css */

    /* .testimonals-container img{
  width:300px;
  
} */

    /* hero */
    .center {
        text-align: center;
    }

    /*  Card hover */
    .move-up:hover {
        background-color: #fec503;
        color: white;
        transition: all .5s;
        transform: translateY(-10px);
    }

    .ng-mrg-t {
        margin-top: -50px;
    }


    /* Footer code */
    .foot {
        /*   position: relative; */
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #1a1d20;
        color: white;
        text-align: center;
        top: 75px;
    }

    a {
        color: #6c757d;
    }

    a:hover {
        color: #fec503;
        text-decoration: none;
    }

    ::selection {
        background: #fec503;
        text-shadow: none;
    }

    .footer-column {
        text-align: center;
    }

    .nav-link {
        padding: 0.1rem 0;
    }

    span.nav-link {
        color: #6c757d;
    }

    span.nav-link:hover {
        color: #fec503;
    }

    span.footer-title {
        font-size: 14px;
        font-weight: 700;
        color: #fff;
        text-transform: uppercase;
    }

    .fas {
        margin-right: 0.5rem;
    }

    footer {
        padding: 2rem 0;
        background-color: #212529;

    }


    ul.social-buttons {
        margin-bottom: 0;
    }

    ul.social-buttons li a:active,
    ul.social-buttons li a:focus,
    ul.social-buttons li a:hover {
        background-color: #fec503;
    }

    ul.social-buttons li a {
        font-size: 20px;
        line-height: 40px;
        display: block;
        width: 40px;
        height: 40px;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        transition: all 0.3s;
        color: #fff;
        border-radius: 100%;
        outline: 0;
        background-color: #1a1d20;
    }

    footer .quick-links {
        font-size: 90%;
        line-height: 40px;
        margin-bottom: 0;
        text-transform: none;
        font-family: Montserrat, "Helvetica Neue", Helvetica, Arial, sans-serif;
    }


    .copyright {
        color: white;
    }

    .fa-ellipsis-h {
        color: white;
        padding: 2rem 0;
    }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="logo-60.png" alt="Logo" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <div class="hero-container" id="hero-sec">
        <div class="container-fluid ">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                <img src="images/1.jpeg" class="d-block w-100" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/2.jpeg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/3.jpeg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- main container -->
        <div class="main-container">
            <div class="container-fluid">
                ...
            </div>
        </div>

        <!--  Card container  -->
        <div class="card-container bg-black" id="team">
            <div class="container-fluid px-3 py-3">
                <div class="row center mx-4 my-4 text-white">
                    <h2>Login & Sign Up Page</h2>
                    <p>Secure Login Section</p>
                </div>
                <div class="row mb-5">
                    <div class="col">
                        <div class="card">
                            <img src="https://img.freepik.com/free-vector/work-time-concept-illustration_114360-1474.jpg?w=740&t=st=1667038053~exp=1667038653~hmac=7f51a4d7c9f7dc9e0e3a6d53d45f381fc455e5424bcc36a0bedca65db24487e7"
                                class="card-img-top" style="height:300px" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Admin</h5>
                                <p class="card-text">Admin direct login no need of sign up</p>
                                <a href="admin/login.php" class="btn org-btn">Admin Login</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="https://img.freepik.com/free-vector/work-time-concept-illustration_114360-1074.jpg"
                                class="card-img-top" style="height:300px" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Student</h5>
                                <p class="card-text">Secure login of Students </p>
                                <a href="student/login.php" class="btn org-btn">Student Login</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="https://img.freepik.com/free-vector/teaching-concept-illustration_114360-1708.jpg?w=740&t=st=1667038099~exp=1667038699~hmac=d144ede4a891a4bfcb57b109cc26614850ed35f5260bbf32541845325c476dbb"
                                class="card-img-top" style="height:300px" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Faculty</h5>
                                <p class="card-text">New and existing faculty join with us</p>
                                <a href="faculty/login.php" class="btn org-btn">Faculty Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--  banner container  -->
        <div class="banner-container mt-5 mb-5" id="featured">
            <div class="container-fluid px-4 py-4">
                <div class="card bg-black text-white shadow-lg ">
                    <h5 class="card-header">Featured Courses</h5>
                    <div class="card-body">
                        <!--     <h5 class="card-title">Special Teachers for Students</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn org-btn center">Learn More</a> -->
                        <div class="conatiner">
                            <div class="row d-flex justify-content-around">
                                <div class="col">
                                    <div class="card text-black move-up mb-3">
                                        <div class="card-header">Web Development</div>
                                        <div class="card-body">
                                            <h5 class="card-title">Front End + Backend</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make up the bulk of the card's content.</p>
                                            <!--     <a href="#" class="btn btn-outline-primary center">View our curriculum</a> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-black move-up mb-3">
                                        <div class="card-header">Web3.0</div>
                                        <div class="card-body">
                                            <h5 class="card-title">Web3 and Tools</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-black move-up mb-3">
                                        <div class="card-header">Java Masterclass</div>
                                        <div class="card-body">
                                            <h5 class="card-title">Begineer Course</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-black move-up mb-3">
                                        <div class="card-header">Python </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Python AI</h5>
                                            <p class="card-text">Some quick example text to build on the card title and
                                                make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer -->
        <div class="footer-container foot">
            <div class="container-fluid">
                <footer>
                    <div class="">
                        <div class="row">
                            <div class="col-md-4 footer-column">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <span class="footer-title">Product</span>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Product 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Product 2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Plans & Prices</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Frequently asked questions</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 footer-column">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <span class="footer-title">Company</span>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">About us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Job postings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">News and articles</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 footer-column">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <span class="footer-title">Contact & Support</span>
                                    </li>
                                    <li class="nav-item">
                                        <span class="nav-link"><i class="fas fa-phone"></i>+47 45 80 80 80</span>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fas fa-comments"></i>Live chat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fas fa-envelope"></i>Contact us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fas fa-star"></i>Give feedback</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="text-center"><i class="fas fa-ellipsis-h"></i></div>

                        <div class="row text-center">
                            <div class="col-md-4 box">
                                <span class="copyright quick-links">Copyright &copy; Your Website <script>
                                    document.write(new Date().getFullYear())
                                    </script>
                                </span>
                            </div>
                            <div class="col-md-4 box">
                                <ul class="list-inline social-buttons">
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 box">
                                <ul class="list-inline quick-links">
                                    <li class="list-inline-item">
                                        <a href="#">Privacy Policy</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">Terms of Use</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>
            </footer>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js"></script>

</body>

</html>