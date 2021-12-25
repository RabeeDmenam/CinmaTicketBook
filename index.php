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
    //require './checkLogin.php';
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

                </ul>
                <div class="navbar-extra">

                    <a class="btn-theme btn" href="movies-list.php"><i class="fas fa-ticket-alt"></i>&nbsp;&nbsp;Buy Ticket</a>

                    <a class="btn-theme btn" href="logout.php"><i class="fas fa-ticket-alt"></i>&nbsp;&nbsp;<?php  if(isset($_SESSION['user'])){
                        echo $_SESSION['user']['name'];
                        }else{
                        echo "login" ;
                        }?></a>


                </div>
            </div>
        </nav>
    </div>
</header>
    <section class="section-text-white position-relative">
        <div class="d-background bg-theme-blacked"></div>
        <div class="mt-auto container position-relative">
            <div class="top-block-head text-uppercase">
                <h2 class="display-4">Now
                    <span class="text-theme">in cinema</span>
                </h2>
            </div>
            <div class="top-block-footer">
                <div class="slick-spaced slick-carousel" data-slick-view="navigation responsive-4">
                    <div class="slick-slides">

                        <?php
                        $sql= 'select * from movie';
                        $movie_op = mysqli_query($con, $sql);
                        while($movie_data = mysqli_fetch_assoc($movie_op)){
                        ?>
                        <div class="slick-slide">
                            <article class="poster-entity" data-role="hover-wrap">
                                <div class="embed-responsive embed-responsive-poster">
                                    <img class="embed-responsive-item" src="./admin/movie/uploads/<?php echo $movie_data['image'];?>" alt="" />
                                </div>
                                <div class="d-background bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show"></div>
                                <div class="d-over bg-highlight-bottom">
                                    <div class="collapse animated faster entity-play" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                                        <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=d96cjJhvlMA" data-magnific-popup="iframe">
                                            <span class="icon-content"><i class="fas fa-play"></i></span>
                                        </a>
                                    </div>
                                    <h4 class="entity-title">
                                        <a class="content-link" href="memico-master/html/movie-info-sidebar-right.html"><?php echo $movie_data['movie_name'];?></a>
                                    </h4>
                                    <div class="entity-category">
                                        <a class="content-link" href="movies-blocks.html"><?php echo $movie_data['movie_name'];?></a>,

                                    </div>
                                    <div class="entity-info">
                                        <div class="info-lines">
                                            <div class="info info-short">
                                                <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                                <span class="info-rest"> <?php echo  "Price ". $movie_data['moive_offer_proce'] ." $";?></span>
                                            </div>
                                            <div class="info info-short">
                                                <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                                <span class="info-text">125</span>
                                                <span class="info-rest">&nbsp;min</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>

                      <?php
                        }
                      ?>
                    </div>

                    <div class="slick-arrows">
                        <div class="slick-arrow-prev">
                            <span class="th-dots th-arrow-left th-dots-animated">
                                    <span></span>
                            <span></span>
                            <span></span>
                            </span>
                        </div>
                        <div class="slick-arrow-next">
                            <span class="th-dots th-arrow-right th-dots-animated">
                                    <span></span>
                            <span></span>
                            <span></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <section class="section-long">
            <div class="container">
                <div class="section-head">
                    <h2 class="section-title text-uppercase">Now in play</h2>
                    <p class="section-text"></p>
                </div>
                <?php
                $sql2 = "SELECT * FROM movie ";
                $movie2_op = mysqli_query($con, $sql2);

                while($movie2_data = mysqli_fetch_assoc($movie2_op))
                {
                ?>
                <article class="movie-line-entity">
                    <div class="entity-poster" data-role="hover-wrap">
                        <div class="embed-responsive embed-responsive-poster">
                            <img class="embed-responsive-item" src="./admin/movie/uploads/<?php echo $movie2_data['image'];?>" alt="" />
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
                            <a class="content-link" href="memico-master/html/movie-info-sidebar-right.html"><?php echo $movie2_data['movie_name']?></a>
                        </h4>
                        <div class="entity-category">
                            <a class="content-link" href="movies-blocks.html"><?php echo $movie2_data['movie_type']?></a>,

                        </div>
                        <div class="entity-info">
                            <div class="info-lines">
                                <div class="info info-short">
                                    <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                    <span class="info-text">8,1</span>
                                    <span class="info-rest">/10</span>
                                </div>
                                <div class="info info-short">
                                    <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                    <span class="info-text"><?php echo  $movie2_data['movie_ticket_price'] . " AED"?></span>

                                </div>
                            </div>
                        </div>
                        <p class="text-short entity-text">
                            <?php echo $movie2_data['movie_description']?>
                        </p>
                    </div>
                    <div class="entity-extra">
                        <div class="text-uppercase entity-extra-title">Show time between </div>
                        <div class="entity-showtime">
                            <div class="showtime-wrap">
                                <div class="showtime-item">
                                    <span class="disabled btn-time btn" aria-disabled="true"> <?php echo $movie2_data['movie_start_date']?></span>
                                </div>
                                <div class="showtime-item">
                                    <a class="btn-time btn" aria-disabled="false" href="#"> <?php echo $movie2_data['movie_end_date']?></a>
                                </div>


                            </div>
                        </div>
                    </div>
                </article>
                    <?php
                }
                ?>
            </div>
        </section>

    <section class="section-long">
        <div class="container">
            <div class="section-head">
                <h2 class="section-title text-uppercase">Latest news</h2>
            </div>
            <div class="grid row">

                <?php
                $sql = 'select * from blog';
                $op = mysqli_query($con, $sql);

                while($data = mysqli_fetch_assoc($op))
                {

                ?>
                <div class="col-md-6">
                    <article class="article-tape-entity">
                        <a class="entity-preview" href="memico-master/html/article-sidebar-right.html" data-role="hover-wrap">
                            <span class="embed-responsive embed-responsive-16by9">

                                    <img class="embed-responsive-item" src="./admin/Articales/uploads/<?php echo $data['image'];?>" alt="" />
                                </span>
                            <span class="entity-date">
                                    <span class="tape-block tape-horizontal tape-single bg-theme text-white">
                                        <span class="tape-dots"></span>
                            <span class="tape-content m-auto"><?php echo date('Y/m/d',$data['date']); ?></span>
                            <span class="tape-dots"></span>
                            </span>
                            </span>
                            <span class="d-over bg-black-80 collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                                    <span class="m-auto"><i class="fas fa-search"></i></span>
                            </span>
                        </a>
                        <div class="entity-content">
                            <h4 class="entity-title">
                                <a class="content-link" href="memico-master/html/article-sidebar-right.html"> <?php echo $data['title']; ?></a>
                            </h4>
                            <div class="entity-category">
                                <a class="content-link" href="memico-master/html/news-blocks-sidebar-right.html">comedy</a>,

                            </div>
                            <p class="text-short entity-text">
                                <?php echo $data['content']; ?>

                            </p>
                            <div class="entity-actions">
                                <a class="text-uppercase" href="./single_blog.php?id=<?php echo $data['id']; ?>">Read More</a>
                            </div>
                        </div>
                    </article>
                </div>
                        <?php
                         }?>
            </div>
            <div class="section-bottom">
                <a class="btn btn-theme" href="memico-master/html/news-blocks-sidebar-right.html">View All News</a>
            </div>
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
                            <a class="content-link" href="#">Schedule</a>
                        </li>
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
                    <h5 class="footer-title text-uppercase">Subscribe</h5>

                </div>
            </div>
        </div>
        <div class="footer-copy">
            <div class="container">Copyright <?php echo date('Y')?>. All rights reserved.</div>
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