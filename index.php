<!DOCTYPE html>
<html>
<head>
    <?php
    include "headerfiles.html";
    ?>
</head>
<body>
<?php
include "publicheader.php";
?> <!-- AddThis Smart Layers END -->

<div class="main-banner">
    <div class="banner col-md-8">
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <img src="images/pic1.jpg" class="img-responsive" alt=""/>
                    </li>
                    <li>
                        <img src="images/pic2.jpg" class="img-responsive" alt=""/>
                    </li>
                    <li>
                        <img src="images/pic3.jpg" class="img-responsive" alt=""/>
                    </li>
                    <li>
                        <img src="images/pic4.jpg" class="img-responsive" alt=""/>
                    </li>
                </ul>
            </div>
        </section>
        <!-- FlexSlider -->
        <script defer src="js/jquery.flexslider.js"></script>
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen"/>
        <script type="text/javascript">
            $(function () {
                SyntaxHighlighter.all();
            });
            $(window).load(function () {
                $('.flexslider').flexslider({
                    animation: "slide",
                    start: function (slider) {
                        $('body').removeClass('loading');
                    }
                });
            });
        </script>
    </div>
    <div class="col-md-4 banner-right">
        <h4>Instant Ticket Booking</h4>
        <div class="grid_3 grid_5">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab"
                                                              data-toggle="tab" aria-controls="home"
                                                              aria-expanded="true">Movies</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                        <div class="fleft">
                            <label><input type="radio">
                                <span class="fleft mr20">Movies</span></label>
                        </div>
                        <select class="list_of_movies" id="movieid" onchange="showShows(this.value,'dropdown')">
                            <option value="">Select Movie</option>
                            <?php
                            $selectquery = "select *from genre";
                            $result = mysqli_query($conn, $selectquery);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <optgroup label="<?php echo $row[0] ?>">
                                    <?php
                                    $movies = "select * from movies where genrename='$row[0]'";
                                    $movies_result = mysqli_query($conn, $movies);
                                    while ($movies_row = mysqli_fetch_array($movies_result)) {
                                        $releasedate30 = date('Y-m-d', strtotime('+30 days', strtotime($movies_row['releasedate'])));
                                        if ($releasedate30 > date('Y-m-d') && $movies_row['releasedate'] < date('Y-m-d')) {
                                            ?>
                                            <option style="padding-left: 10px;"
                                                    value="<?php echo $movies_row[0] ?>"><?php echo $movies_row[1] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </optgroup>
                                <?php
                            }
                            ?>
                        </select>
                        <select class="list_of_movies" id="showid">
                            <option value="">Select Date</option>
                        </select>
                        <input type="button" value="Go" onclick="searchShows()" class="btn btn-primary">
                        <h5 class="pre"><i class="fa fa-heart"></i>Preferred Cinemas :
                            <h5>
                                <h6 class="ipre"><a href="#">Mayajaal Multiplex: Chennai, </a> <a href="#">
                                        INOX: NCS Mall</a>, <a href="#">Vizianagaram</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="review-slider">
    <ul id="flexiselDemo1">
        <?php
        $movies = "select * from movies order by id DESC";
        $movies_result = mysqli_query($conn, $movies);
        while ($movies_row = mysqli_fetch_array($movies_result)) {
            $releasedate30 = date('Y-m-d', strtotime('+30 days', strtotime($movies_row['releasedate'])));
            ?>
            <li>
                <a href="movies.html"><img src="movies/<?php echo $movies_row['poster']; ?>" width="400"
                                           height="300" alt=""/></a>
                <div class="slide-title"><h4><?php echo $movies_row['moviename']; ?></div>
                <div class="date-city">
                    <h5><?php echo date('d M,Y', strtotime($movies_row['releasedate'])); ?></h5>
                    <h6><?php echo $movies_row['genrename'] ?></h6>
                    <?php
                    if ($releasedate30 > date('Y-m-d') && $movies_row['releasedate'] < date('Y-m-d')) {
                        ?>
                        <div class="buy-tickets">


                            <a href="movie-select-show.php">BUY TICKETS</a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </li>
            <?php
        }
        ?>

    </ul>
    <script type="text/javascript">
        $(window).load(function () {

            $("#flexiselDemo1").flexisel({
                visibleItems: 5,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,
                pauseOnHover: false,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint: 480,
                        visibleItems: 2
                    },
                    landscape: {
                        changePoint: 640,
                        visibleItems: 3
                    },
                    tablet: {
                        changePoint: 800,
                        visibleItems: 4
                    }
                }
            });
        });
    </script>
    <script type="text/javascript" src="js/jquery.flexisel.js"></script>
</div>
<div class="footer-top-grid">
    <div class="list-of-movies col-md-8">
        <div class="tabs">
            <div class="sap_tabs">
                <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                    <ul class="resp-tabs-list">
                        <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Now Playing</span>
                        </li>
                        <li class="resp-tab-item" aria-controls="tab_item-1" role="tab">
                            <span>Opening This Week</span></li>
                        <li class="resp-tab-item" aria-controls="tab_item-0" role="tab">
                            <span>Comming Soon</span></li>
                        <div class="clearfix"></div>
                    </ul>
                    <div class="resp-tabs-container">
                        <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                            <ul class="tab_img">
                                <li>
                                    <div class="view view-first">
                                        <a href="movie-select-show.php"> <img src="images/pic-1.jpg"
                                                                              class="img-responsive"
                                                                              alt=""/></a>
                                        <div class="info1"></div>
                                        <div class="mask">
                                        </div>
                                        <div class="tab_desc">
                                            <a href="movie-select-show.php">Book Now</a>
                                            <div class="percentage-w-t-s">
                                                <h5>97</h5>
                                                <p>% <br> Want to see</p>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="view view-first">
                                        <a href="movie-select-show.php"><img src="images/pic-2.jpg"
                                                                             class="img-responsive"
                                                                             alt=""/></a>
                                        <div class="info1"></div>
                                        <div class="mask">
                                        </div>
                                        <div class="tab_desc">
                                            <a href="movie-select-show.php">Book Now</a>
                                            <div class="percentage-w-t-s">
                                                <h5>98</h5>
                                                <p>% <br> Want to see</p>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="view view-first">
                                        <a href="movie-select-show.php"><img src="images/pic-10.jpg"
                                                                             class="img-responsive"
                                                                             alt=""/></a>
                                        <div class="mask">
                                            <div class="info1"></div>
                                        </div>
                                        <div class="tab_desc">
                                            <a href="movie-select-show.php">Book Now</a>
                                            <div class="percentage-w-t-s">
                                                <h5>100</h5>
                                                <p>% <br> Want to see</p>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <div class="clearfix"></div>
                            </ul>
                        </div>
                        <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                            <ul class="tab_img">
                                <li>
                                    <div class="view view-first">
                                        <a href="movie-select-show.php"><img src="images/pic-8.jpg"
                                                                             class="img-responsive"
                                                                             alt=""/></a>
                                        <div class="mask">
                                            <div class="info1"></div>
                                        </div>
                                        <div class="tab_desc">
                                            <a href="movie-select-show.php">Book Now</a>
                                            <div class="percentage-w-t-s">
                                                <h5>92</h5>
                                                <p>% <br> Want to see</p>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="view view-first">
                                        <a href="movie-select-show.php"> <img src="images/pic-3.jpg"
                                                                              class="img-responsive"
                                                                              alt=""/></a>
                                        <div class="mask">
                                            <div class="info1"></div>
                                        </div>
                                        <div class="tab_desc">
                                            <a href="movie-select-show.php">Book Now</a>
                                            <div class="percentage-w-t-s">
                                                <h5>100</h5>
                                                <p>% <br> Want to see</p>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="last">
                                    <div class="view view-first">
                                        <a href="movie-select-show.php"><img src="images/pic-9.jpg"
                                                                             class="img-responsive"
                                                                             alt=""/></a>
                                        <div class="mask">
                                            <div class="info1"></div>
                                        </div>
                                        <div class="tab_desc">
                                            <a href="movie-select-show.php">Book Now</a>
                                            <div class="percentage-w-t-s">
                                                <h5>74</h5>
                                                <p>% <br> Want to see</p>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <div class="clearfix"></div>
                            </ul>
                        </div>
                        <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
                            <ul class="tab_img">
                                <li>
                                    <div class="view view-first">
                                        <a href="movie-select-show.php"> <img src="images/pic-4.jpg"
                                                                              class="img-responsive"
                                                                              alt=""/></a>
                                        <div class="mask">
                                            <div class="info1"></div>
                                        </div>
                                        <div class="tab_desc">
                                            <a href="movie-select-show.php">Book Now</a>
                                            <div class="percentage-w-t-s">
                                                <h5>88</h5>
                                                <p>% <br> Want to see</p>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="view view-first">
                                        <a href="movie-select-show.php"> <img src="images/pic-12.jpg"
                                                                              class="img-responsive"
                                                                              alt=""/></a>
                                        <div class="mask">
                                            <div class="info1"></div>
                                        </div>
                                        <div class="tab_desc">
                                            <a href="movie-select-show.php">Book Now</a>
                                            <div class="percentage-w-t-s">
                                                <h5>100</h5>
                                                <p>% <br> Want to see</p>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="last">
                                    <div class="view view-first">
                                        <a href="movie-select-show.php"><img src="images/pic-5.jpg"
                                                                             class="img-responsive"
                                                                             alt=""/></a>
                                        <div class="mask">
                                            <div class="info1"></div>
                                        </div>
                                        <div class="tab_desc">
                                            <a href="movie-select-show.php">Book Now</a>
                                            <div class="percentage-w-t-s">
                                                <h5>90</h5>
                                                <p>% <br> Want to see</p>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <div class="clearfix"></div>
                            </ul>
                        </div>
                        <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">
                            <ul class="tab_img">
                                <li>
                                    <div class="view view-first">
                                        <a href="movie-select-show.php"> <img src="images/pic-6.jpg"
                                                                              class="img-responsive"
                                                                              alt=""/></a>
                                        <div class="mask">
                                            <div class="info1"></div>
                                        </div>
                                        <div class="tab_desc">
                                            <a href="movie-select-show.php">Book Now</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="view view-first">
                                        <a href="movie-select-show.php"> <img src="images/pic-1.jpg"
                                                                              class="img-responsive"
                                                                              alt=""/></a>
                                        <div class="mask">
                                            <div class="info1"></div>
                                        </div>
                                        <div class="tab_desc">
                                            <a href="movie-select-show.php">Book Now</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="view view-first">
                                        <a href="movie-select-show.php"> <img src="images/pic-9.jpg"
                                                                              class="img-responsive"
                                                                              alt=""/></a>
                                        <div class="mask">
                                            <div class="info1"></div>
                                        </div>
                                        <div class="tab_desc">
                                            <a href="movie-select-show.php">Book Now</a>
                                        </div>
                                    </div>
                                </li>
                                <div class="clearfix"></div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="featured">
            <h4>Featured</h4>
            <ul>
                <li>
                    <div class="f-movie">
                        <div class="f-movie-img">
                            <a href="movies.html"><img src="images/f4.jpg" alt=""/></a>
                        </div>
                        <div class="f-movie-name">
                            <a href="movies.html">Lorem Ipsum used since</a>
                            <p>Multi city</p>
                        </div>
                        <div class="f-buy-tickets">
                            <a href="movie-select-show.php">BUY TICKETS</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="f-movie">
                        <div class="f-movie-img">
                            <a href="movies.html"><img src="images/f5.jpg" alt=""/></a>
                        </div>
                        <div class="f-movie-name">
                            <a href="movies.html">looked up one of more</a>
                            <p>Multi city</p>
                        </div>
                        <div class="f-buy-tickets">
                            <a href="movie-select-show.php">BUY TICKETS</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="f-movie">
                        <div class="f-movie-img">
                            <a href="movies.html"><img src="images/f6.jpg" alt=""/></a>
                        </div>
                        <div class="f-movie-name">
                            <a href="movies.html">The Live Lorem Ipsum </a>
                            <p>Mumbai</p>
                        </div>
                        <div class="f-buy-tickets">
                            <a href="movie-select-show.php">BUY TICKETS</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="f-movie">
                        <div class="f-movie-img">
                            <a href="movies.html"><img src="images/f1.jpg" alt=""></a>
                        </div>
                        <div class="f-movie-name">
                            <a href="movies.html">The standard chunk</a>
                            <p>Multi city</p>
                        </div>
                        <div class="f-buy-tickets">
                            <a href="movie-select-show.php">BUY TICKETS</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="f-movie">
                        <div class="f-movie-img">
                            <a href="movies.html"><img src="images/f2.jpg" alt=""></a>
                        </div>
                        <div class="f-movie-name">
                            <a href="movies.html">There are many 'variations'</a>
                            <p>Multi city</p>
                        </div>
                        <div class="f-buy-tickets">
                            <a href="movie-select-show.php">BUY TICKETS</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="f-movie">
                        <div class="f-movie-img">
                            <a href="movies.html"><img src="images/f3.jpg" alt=""></a>
                        </div>
                        <div class="f-movie-name">
                            <a href="movies.html">The Live Tribute Show</a>
                            <p>Mumbai</p>
                        </div>
                        <div class="f-buy-tickets">
                            <a href="movie-select-show.php">BUY TICKETS</a>
                        </div>
                    </div>
                </li>
                <div class="clearfix"></div>
            </ul>
        </div>
    </div>
    <div class="right-side-bar">
        <div class="top-movies-in-india">
            <h4>Top Movies in India</h4>
            <ul class="mov_list">
                <li><i class="fa fa-star"></i></li>
                <li>77%</li>
                <li><a href="movie-single.php">Jurassic World (3D) (U/A)</a></li>
            </ul>
            <ul class="mov_list">
                <li><i class="fa fa-star"></i></li>
                <li>80%</li>
                <li><a href="movie-single.php">Jurassic World (3D Hindi) (U/A)</a></li>
            </ul>
            <ul class="mov_list">
                <li><i class="fa fa-star"></i></li>
                <li>69%</li>
                <li><a href="movie-single.php">Dil Dhadakne Do (U/A)</a></li>
            </ul>
            <ul class="mov_list">
                <li><i class="fa fa-star"></i></li>
                <li>65%</li>
                <li><a href="movie-single.php">Hamari Adhuri Kahani (U)</a></li>
            </ul>
            <ul class="mov_list">
                <li><i class="fa fa-star"></i></li>
                <li>83%</li>
                <li><a href="movie-single.php">Premam (U)</a></li>
            </ul>
            <ul class="mov_list">
                <li><i class="fa fa-star"></i></li>
                <li>87%</li>
                <li><a href="movie-single.php">Tanu Weds Manu Returns (U/A)</a></li>
            </ul>
            <ul class="mov_list">
                <li><i class="fa fa-star"></i></li>
                <li>71%</li>
                <li><a href="movie-single.php">Romeo Juliet (U)</a></li>
            </ul>
            <ul class="mov_list">
                <li><i class="fa fa-star"></i></li>
                <li>81%</li>
                <li><a href="movie-single.php">Jurassic World (IMAX 3D) (U/A)</a></li>
            </ul>
            <ul class="mov_list">
                <li><i class="fa fa-star"></i></li>
                <li>80%</li>
                <li><a href="movie-single.php">Jurassic World (2D Hindi) (U/A)</a></li>
            </ul>
            <ul class="mov_list">
                <li><i class="fa fa-star"></i></li>
                <li>89%</li>
                <li><a href="movie-single.php">Kaaka Muttai (U)</a></li>
            </ul>
        </div>
        <div class="quick-pay">
            <h3>Quick Pay</h3>
            <p class="payText">Make your online payments a breeze. Save your Credit, Debit card and Netbanking
                in your BookMyShow profile.. </p>
        </div>
        <div class="our-blog">
            <h5>Our Blog</h5>
            <div class="post-article">
                <a href="blog.html" class="post-title">Lorem Ipsum is simply dummy text of the printing</a>
                <i>Posted on June 15, 2015</i>
                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                    classical Latin literature from 45 BC, making it over 2000 years old...<br> <a
                            href="blog.html">Read more</a></p>
            </div>
            <div class="post-article">
                <a href="blog.html" class="post-title">Sed ut perspiciatis unde</a>
                <i>Posted on June 15, 2015</i>
                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                    classical Latin literature from 45 BC, making it over 2000 years old...<br> <a
                            href="blog.html">Read more</a></p>
            </div>
            <div class="post-article">
                <a href="blog.html" class="post-title">Sed ut perspiciatis unde</a>
                <i>Posted on June 15, 2015</i>
                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                    classical Latin literature from 45 BC, making it over 2000 years old...<br> <a
                            href="blog.html">Read more</a></p>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="footer-top-strip">
    <p><span>Next Change <i>(Friday, 19 Jun) </i>: </span><a href="movie-single.php">Disney's ABCD 2 (3D)
            (U)</a>, <a href="movie-single.php"> 2 Premi Premache</a> , <a href="movie-single.php">Dekh Ke
            (Bhojpuri)</a> , <a href="movie-single.php">Disney's ABCD 2 (2D) (U)</a>, <a
                href="movie-single.php">Dekh Ke (Bhojpuri)</a></p>
    <p><span>Coming Soon :</span><a href="movie-single.php"> 2 Premi Premache</a>, <a href="movie-single.php">Acharam,
            Dekh Ke (Bhojpuri)</a>, <a href="movie-single.php">Entourage</a>, <a href="movie-single.php">Kuttram
            Kadithal</a></p>
</div>
</div>
<div class="footer">
    <div class="col-md-3 footer-left">
        <div class="f-mov-list">
            <h4>Latest Movies</h4>
            <ul>
                <li><a href="now-showing.html">Now Showing</a></li>
                <li><a href="comming-soon.html">Coming Soon</a></li>
                <li><a href="celebrities.html">Movie Celebrities</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="f-mov-list">
            <h4>Movie Reviews</h4>
            <ul>
                <li><a href="404.html" target="target_blank">Entertainment News</a></li>
                <li><a href="blog.html" target="target_blank">Rajeev Masand</a></li>
                <li><a href="blog.html" target="target_blank">Film Reviews</a></li>
                <li><a href="write-us.html" target="target_blank">Guest Blogging</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="f-mov-list">
            <h4>Movie Trailers</h4>
            <ul>
                <li><a href="trailers-now-showing.html">Now Showing</a></li>
                <li><a href="trailers-comming-soon.html">Coming Soon</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="col-md-3 footer-left">
        <div class="f-mov-list">
            <h4>Cinemas & Regions</h4>
            <ul>
                <li><a href="regions.html">All Regions</a></li>
                <li><a href="cinema-chain.html">Cinema Chains</a></li>
                <li><a href="cinemas.html">Cinemas</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="f-mov-list">
            <h4>Movies by Language</h4>
            <ul>
                <li><a href="movies.html">Hindi</a></li>
                <li><a href="movies.html">English</a></li>
                <li><a href="movies.html">Marathi</a></li>
                <li><a href="movies.html">Bengali</a></li>
                <li><a href="movies.html">Tamil</a></li>
                <li><a href="movies.html">Telugu</a></li>
                <li><a href="movies.html">Malayalam</a></li>
                <li><a href="movies.html">Bhojpuri</a></li>
                <li><a href="movies.html">Kannada</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="col-md-3 footer-left">
        <div class="f-mov-list">
            <h4>Exclusives</h4>
            <ul>
                <li><a href="donate.html">Book A Smile</a></li>
                <li><a href="vochers.html">Corporate Vouchers</a></li>
                <li><a href="gift-cards.html">Gift Cards</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="f-mov-list">
            <h4>Help</h4>
            <ul>
                <li><a href="site-map.html">Sitemap</a></li>
                <li><a href="feed-back.html">Feedback</a></li>
                <li><a href="faq.html">FAQs</a></li>
                <li><a href="terms-and-conditions.html">Terms and Conditions</a></li>
                <li><a href="privacy-policy.html">Privacy Policy</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="col-md-3 footer-left">
        <div class="f-mov-list">
            <h4>Movies by Genre</h4>
            <ul>
                <li><a href="movies.html">Action</a></li>
                <li><a href="movies.html">Romance</a></li>
                <li><a href="movies.html">Comedy</a></li>
                <li><a href="movies.html">Adult</a></li>
                <li><a href="movies.html">Adventure</a></li>
                <li><a href="movies.html">Classic</a></li>
                <li><a href="movies.html">Crime</a></li>
                <li><a href="movies.html">Drama</a></li>
                <li><a href="movies.html">Family </a></li>
                <li><a href="movies.html">Fantasy</a></li>
                <li><a href="movies.html">Musical</a></li>
                <li><a href="movies.html">Mystery</a></li>
                <li><a href="movies.html">Suspense</a></li>
                <li><a href="movies.html">Thriller</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12">
        <div class="footer-right">
            <div class="follow-us">
                <h5 class="f-head">Follow us</h5>
                <ul class="social-icons">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="subscribe">
                <h5 class="f-head">Subscribe to our newsletters</h5>
                <input type="text" class="text" value="Enter Email ID" onfocus="this.value = '';"
                       onblur="if (this.value == 'Enter email...') {this.value = 'Enter Email ID';}">
                <input type="submit" value="submit">
                <div class="clearfix"></div>
            </div>
            <div class="recent_24by7">
                <a class="play-icon popup-with-zoom-anim" href="#small-dialog" href="#"><i
                            class="fa fa-calendar-o"></i>Resend Booking Confirmation</a>
                <a href="support.html"><i class="fa fa-question"></i>24/7 Customer Care</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<?php
include "footer.php";
?>
</body>
</html>