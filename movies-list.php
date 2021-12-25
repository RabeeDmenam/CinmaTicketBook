<?php
require './admin/helpers/dbConnection.php';
require './admin/helpers/functions.php';
require './checkLogin.php';

?>



<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Memico - Cinema Bootstrap HTML5 Template</title>
        <!-- Bootstrap -->
        <link href="./layoutassets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Animate.css -->
        <link href="./layoutassets/animate.css/animate.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome iconic font -->
        <link href="./layoutassets/fontawesome/css/fontawesome-all.css" rel="stylesheet" type="text/css" />
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
    </head>
    <body class="body">
    <header class="header header-horizontal header-view-pannel">
        <div class="container">
            <nav class="navbar">
                <a class="navbar-brand" href="index.php">
                        <span class="logo-element">
                            <span class="logo-tape">
                                <span class="svg-content svg-fill-theme" data-svg="./images/svg/logo-part.svg"></span>
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

                    </ul>
                    <div class="navbar-extra">
                        <a class="btn-theme btn" href="#"><i class="fas fa-ticket-alt"></i>&nbsp;&nbsp;Buy Ticket</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
        <section class="after-head d-flex section-text-white position-relative">
            <div class="d-background" data-image-src="http://via.placeholder.com/1920x1080" data-parallax="scroll"></div>
            <div class="d-background bg-black-80"></div>
            <div class="top-block top-inner container">
                <div class="top-block-content">
                    <h1 class="section-title">Movies list</h1>
                    <div class="page-breadcrumbs">
                        <a class="content-link" href="#">Home</a>
                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <span>Movies</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-long">
            <div class="container">

                <?php
                $sql= 'select * from movie';
                $movie_op = mysqli_query($con, $sql);
                while($movie_data = mysqli_fetch_assoc($movie_op)){
                ?>

             <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <article class="movie-line-entity">

                    <div class="entity-poster" data-role="hover-wrap">
                        <div class="embed-responsive embed-responsive-poster">
                            <img class="embed-responsive-item" src="./admin/movie/uploads/<?php echo $movie_data['image'];?>" alt="" />

                        </div>
                        <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                            <div class="entity-play">
                                <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=d96cjJhvlMA" data-magnific-popup="iframe">
                                    <span class="icon-content"><i class="fas fa-play"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="entity-content">
                        <h4 class="entity-title">
                            <a class="content-link" href="memico-master/html/movie-info-sidebar-right.html"><?php echo $movie_data['movie_name'];?></a>
                        </h4>
                        <div class="entity-category">
                            <a class="content-link" href="movies-blocks.html"><?php echo $movie_data['movie_type'];?></a>,

                        </div>
                        <div class="entity-info">
                            <div class="info-lines">
                                <div class="info info-short">
                                    <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                    <span class="info-text"><?php echo  "Price ". $movie_data['moive_offer_proce'] ." $";?></span>

                                </div>
                                <div class="info info-short">
                                    <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                    <span class="info-text">130</span>
                                    <span class="info-rest">&nbsp;min</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-short entity-text">
                            <?php echo $movie_data['movie_description'];?>
                        </p>
                    </div>
                    <div class="entity-extra">
                        <div class="text-uppercase entity-extra-title">Showtime</div>
                        <div class="entity-showtime">
                            <div class="showtime-wrap">
                                <div class="showtime-item">
                                    <span class="disabled btn-time btn" aria-disabled="true"> <?php echo $movie_data['movie_start_date'];?></span>
                                </div>
                            </div>
                        </div>

                        <div class="navbar-extra">
                            <a  href='./checkout.php?movie_id=<?php echo $movie_data['movie_id']; ?>'  class="btn-theme btn" type="submit" name="submit"> <i class="fas fa-ticket-alt"></i>add to cart</a>
                        </div>

                    </div>
                </article>
              </form>
               <?php
                }
                ?>

            </div>
        </section>

        <a class="scroll-top disabled" href="#"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
        <footer class="section-text-white footer footer-links bg-darken">
            <div class="footer-body container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <a class="footer-logo" href="index.php">
                            <span class="logo-element">
                                <span class="logo-tape">
                                    <span class="svg-content svg-fill-theme" data-svg="./images/svg/logo-part.svg"></span>
                                </span>
                                <span class="logo-text text-uppercase">
                                    <span>M</span>emico</span>
                            </span>
                        </a>

                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <h5 class="footer-title text-uppercase">Movies</h5>
                        <ul class="list-unstyled list-wide footer-content">
                            <li>
                                <a class="content-link" href="#">All Movies</a>
                            </li>


                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <h5 class="footer-title text-uppercase">Information</h5>
                        <ul class="list-unstyled list-wide footer-content">

                            <li>
                                <a class="content-link" href="#">News</a>
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

                    </div>
                </div>
            </div>
            <div class="footer-copy">
                <div class="container">Copyright 2021 &copy; . All rights reserved.</div>
            </div>
        </footer>
        <!-- jQuery library -->
        <script src="./js/jquery-3.3.1.js"></script>
        <!-- Bootstrap -->
        <script src="./bootstrap/js/bootstrap.js"></script>
        <!-- Paralax.js -->
        <script src="./parallax.js/parallax.js"></script>
        <!-- Waypoints -->
        <script src="./waypoints/jquery.waypoints.min.js"></script>
        <!-- Slick carousel -->
        <script src="./slick/slick.min.js"></script>
        <!-- Magnific Popup -->
        <script src="./magnific-popup/jquery.magnific-popup.min.js"></script>
        <!-- Inits product scripts -->
        <script src="./js/script.js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJ4Qy67ZAILavdLyYV2ZwlShd0VAqzRXA&callback=initMap"></script>
        <script async defer src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/js/rating.js"></script>
    </body>
</html>