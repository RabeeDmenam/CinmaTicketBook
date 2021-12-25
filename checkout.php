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
            <a class="navbar-brand" href="index.php">
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


            <div class="card-body">
                <div class="table-responsive">

                    <div class="card-body">
                        <div class="container">

                            <?php

                            $movie_id = $_GET['movie_id'];
                            $sql2 = "select * from movie where movie_id = $movie_id";
                            $movie_op = mysqli_query($con, $sql2);
                            while($movie_data = mysqli_fetch_assoc($movie_op)){
                            ?>
                            <form action="checkout.php" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="exampleInputName">cart_id</label>
                                   <input value="<?php echo $movie_data['movie_id'];?>" disabled  type="text" class="form-control" id="exampleInputName" name="movie_id"
                                          >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail">movie name</label>
                                    <input value="<?php echo $movie_data['movie_name'];?>" disabled type="email" class="form-control"  name="movie_name" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword">User</label>
                                    <input value="<?php echo $_SESSION['user']['id'];?>" disabled type="text" class="form-control"  name="user_id"
                                         >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">movie type</label>
                                    <input value="<?php echo $movie_data['movie_type'];?>" disabled type="text" class="form-control"  name="movie_type"
                                         >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">movie ticket price </label>
                                    <input value="<?php echo $movie_data['movie_ticket_price'];?>" disabled type="text" class="form-control"  name="movie_ticket_price"
                                    >
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                            <?php }?>
                        </div>
                    </div>
                </div>
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
                    <p class="footer-text">UAE ,
                        <br/>Dubai </p>

                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <h5 class="footer-title text-uppercase">Movies</h5>
                <ul class="list-unstyled list-wide footer-content">
                    <li>
                        <a class="content-link" href="movies-list.php">All Movies</a>
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