
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Memico - Cinema </title>
    <!-- Bootstrap -->
    <link href="./layoutassets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Animate.css -->
    <link href="./layoutassets/animate.css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome iconic font -->
    <link href="./layoutassets/layoutassets/fontawesome/css/fontawesome-all.css" rel="stylesheet" type="text/css" />
    <!-- Magnific Popup -->
    <link href="./layoutassets/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
    <!-- Slick carousel -->
    <link href="./layoutassets/slick/slick.css" rel="stylesheet" type="text/css" />
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Oswald:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <!-- Theme styles -->
    <link href="./layoutassets/css/dot-icons.css" rel="stylesheet" type="text/css">
    <link href="./layoutassets/css/theme.css" rel="stylesheet" type="text/css">
    <?php
    require './admin/helpers/dbConnection.php';
    require './admin/helpers/functions.php';
    require './checkLogin.php';
    ?>
</head>
<body class="body">
<header class="header header-horizontal header-view-pannel">
    <div class="container">
        <nav class="navbar">
                     <a class="navbar-brand" href="./index.php">
                        <span class="logo-element">
                            <span class="logo-tape">
                                <span class="svg-content svg-fill-theme" data-svg="./layoutassets/images/svg/logo-part.svg"></span>
                            </span>
                            <span class="logo-text text-uppercase">
                                <span>M</span>emico</span>
                        </span>
                      </a>
                      <button class="navbar-toggler" type="button">
                        <span class="th-dots-active-close th-dots th-bars">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                       </button>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item nav-item-arrow-down nav-hover-show-sub">
                        <a class="nav-link" href="index.php">Homepage</a>
                        <div class="nav-arrow"><i class="fas fa-chevron-down"></i></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="movies-list.php">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="memico-master/html/contact-us.html">Contact us</a>
                    </li>
                </ul>
                <div class="navbar-extra">
                    <a class="btn-theme btn" href="#"><i class="fas fa-ticket-alt"></i>&nbsp;&nbsp;Buy Ticket</a>
                    <?php
                    if ($_SESSION['user']){
                        ?>
                        <a class="btn-theme btn" href="logout.php"><i class="fas fa-ticket-alt"></i>&nbsp;&nbsp;<?php echo $_SESSION['user']['name']?></a>

                    <?php }else{

                        ?>
                        <a class="btn-theme btn" href="Login.php"><i class="fas fa-ticket-alt"></i>login</a>

                        <?php
                    }

                    ?>
                </div>
            </div>
        </nav>
    </div>
</header>
 <section class="section-long">
        <div class="container">
            <div class="blog-single gray-bg">
                <div class="container">


                    <?php

                    $id = $_GET['id'];

                    $sql = "select * from blog where id = $id";

                    $op = mysqli_query($con, $sql);

                    while($blogdata = mysqli_fetch_assoc($op))
                    {

                    ?>

                    <div class="row align-items-start">
                        <div class="col-lg-8 m-15px-tb">
                            <article class="article">
                                <div class="article-img">

                                    <img src="./admin/Articales/uploads/<?php echo $blogdata['image']; ?>" title="" alt="Loading">
                                </div>
                                <div class="article-title">

                                    <h1><?php echo  $blogdata['title']?></h1>
                                    <div class="media">
                                        <div class="avatar">
                                        </div>
                                        <div class="media-body">


                                            <span> <?php echo date('Y/m/d',$blogdata['date']); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="article-content">
                                    <p><?php echo  $blogdata['content']?></p>
                                </div>

                        </div>

                        </div
                    </div>

                <?php }?>

                </div>
            </div>


    </section>



<a class="scroll-top disabled" href="#"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
<footer class="section-text-white footer footer-links bg-darken">
    <div class="footer-body container">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <a class="footer-logo" href="memico-master/html">
                        <span class="logo-element">
                                <span class="logo-tape">
                                    <span class="svg-content svg-fill-theme" data-svg="./images/svg/logo-part.svg"></span>
                        </span>
                        <span class="logo-text text-uppercase">
                                    <span>M</span>emico</span>
                        </span>
                </a>
                <div class="footer-content">
                    <p class="footer-text">Sidestate NSW 4132,
                        <br/>Australia</p>
                    <p class="footer-text">Call us:&nbsp;&nbsp;(555) 555-0312</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <h5 class="footer-title text-uppercase">Movies</h5>
                <ul class="list-unstyled list-wide footer-content">
                    <li>
                        <a class="content-link" href="#">All Movies</a>
                    </li>
                    <li>
                        <a class="content-link" href="#">Upcoming movies</a>
                    </li>

                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3">
                <h5 class="footer-title text-uppercase">Information</h5>
                <ul class="list-unstyled list-wide footer-content">
                    <li>
                        <a class="content-link" href="#">Schedule</a>
                    </li>
                    <li>
                        <a class="content-link" href="#">News</a>
                    </li>
                    <li>
                        <a class="content-link" href="#">Contact us</a>
                    </li>

                </ul>
            </div>
            <div class="col-sm-6 col-lg-3">
                <h5 class="footer-title text-uppercase">Follow</h5>
                <ul class="list-wide footer-content list-inline">
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-slack-hash"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-dribbble"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-google-plus-g"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
                <h5 class="footer-title text-uppercase">Subscribe</h5>
                <div class="footer-content">
                    <p class="footer-text">Get latest movie news right away with our subscription</p>
                    <form class="footer-form" autocomplete="off">
                        <div class="input-group">
                            <input class="form-control" name="email" type="email" placeholder="Your email" />
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="submit"><i class="fas fa-angle-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="container">Copyright 2019 &copy; AmigosThemes. All rights reserved.</div>
    </div>
</footer>

<!-- jQuery library -->
<script src="./layoutassets/js/jquery-3.3.1.js"></script>
<!-- Bootstrap -->
<script src="./layoutassets/bootstrap/js/bootstrap.js"></script>
<!-- Paralax.js -->
<script src="./layoutassets/parallax.js/parallax.js"></script>
<!-- Waypoints -->
<script src="./layoutassets/waypoints/jquery.waypoints.min.js"></script>
<!-- Slick carousel -->
<script src="./layoutassets./slick/slick.min.js"></script>
<!-- Magnific Popup -->
<script src="./layoutassets/magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- Inits product scripts -->
<script src="./layoutassets/js/script.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJ4Qy67ZAILavdLyYV2ZwlShd0VAqzRXA&callback=initMap"></script>
<script async defer src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/js/rating.js"></script>
</body>

</html>