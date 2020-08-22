<?php
include_once "connection.php";
session_start();
if (isset($_SESSION['admin'])) {
    $email = $_SESSION['admin'];
} else {
    header("Location:adminlogin.php");
}
?>
<!-- header-section-starts -->
<?php
include "connection.php";
?>
<div class="header-top-strip">
    <div class="container">
        <div class="header-top-left">
            <p>24/7 Customer Care| <a class="play-icon popup-with-zoom-anim"
                > Resend Booking
                    Confirmation</a></p>
            <div id="small-dialog" class="mfp-hide">
                <div class="select-city">
                    <h3>Resend Confirmation</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                    <div class="confirmation">
                        <form>
                            <input type="text" class="email" placeholder="Email" required="required"
                                   pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" title="Enter a valid email"/>
                            <input type="text" class="email" placeholder="Mobile Number" maxlength="10"
                                   pattern="[1-9]{1}\d{9}" title="Enter a valid mobile number"/>
                            <input type="submit" value="SEND">
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="header-top-right">
            <div class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            <p>One fine body&hellip;</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- Button trigger modal  -->
            <!---pop-up-box---->
            <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
            <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
            <!---//pop-up-box---->

            <script>
                $(document).ready(function () {
                    $('.popup-with-zoom-anim').magnificPopup({
                        type: 'inline',
                        fixedContentPos: false,
                        fixedBgPos: true,
                        overflowY: 'auto',
                        closeBtnInside: true,
                        preloader: false,
                        midClick: true,
                        removalDelay: 300,
                        mainClass: 'my-mfp-zoom-in'
                    });

                });
            </script>
            <!-- Large modal -->
            <a href="signup.php">
                <button class="btn btn-primary">
                    Sign Up
                </button>
            </a>
            <a href="userlogin.php">
                <button class="btn btn-primary">
                    Login
                </button>
            </a>
            <script>

            </script>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div class="main-content">
        <div class="header">
            <div class="logo">
                <a href="index.php"><h1>Book My Show</h1></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="bootstrap_container">
            <nav class="navbar navbar-default w3_megamenu" role="navigation">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target="#defaultmenu" class="navbar-toggle"><span
                                class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    <a href="index.php" class="navbar-brand"><i class="fa fa-home"></i></a>
                </div><!-- end navbar-header -->

                <div id="defaultmenu" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="home.php">Home</a></li>
                        <!-- Mega Menu -->
                        <li class="dropdown w3_megamenu-fw"><a href="movies.html" data-toggle="dropdown"
                                                               class="dropdown-toggle">Admin<b class="caret"></b></a>
                            <ul class="dropdown-menu fullwidth">
                                <li class="w3_megamenu-content">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <h3 class="title">Admin</h3>

                                            <p><a href="admin.php">Add Admin</a></p>
                                            <p><a href="view.php">View Admin</a></p>


                                        </div><!-- end col-4 -->
                                        <div class="col-sm-2 movie-dd">
                                            <h3 class="title">Genre</h3>
                                            <p>
                                                <a href="genre.php">Add Genre</a>
                                            </p>
                                            <p>
                                                <a href="viewgenre.php">View Genre</a>
                                            </p>

                                        </div><!-- end col-4 -->
                                        <div class="col-sm-2 movie-dd">
                                            <h3 class="title">Movies</h3>
                                            <p>
                                                <a href="movies.php">Add Movies</a></p>
                                            <p>
                                                <a href="viewmovies.php">View Movies</a></p>

                                        </div>
                                        <div class="col-sm-2 movie-dd">
                                            <h3 class="title">Shows</h3>
                                            <p>
                                                <a href="shows.php">Add Shows</a></p>
                                            <p>
                                                <a href="viewshows.php">View Shows</a></p>

                                        </div>
                                        <div class="col-sm-2 movie-dd">
                                            <h3 class="title">Timings</h3>

                                            <p>
                                                <a href="showtimings.php">Add Timings</a></p>
                                            <p>
                                                <a href="viewtimings.php">View Timings</a></p>

                                        </div>
                                        <div class="col-sm-2 movie-dd">
                                            <h3 class="title">Settings</h3>
                                            <p><a href="changepassword.php">Change Password</a></p>
                                            <p><a href="logout.php">Logout</a></p>

                                        </div><!-- end col-4 -->
                                        <div class="clearfix"></div>
                                    </div><!-- end row -->
                                    <hr>

                                </li>
                            </ul>
                        </li>
                        <!-- end dropdown w3_megamenu-fw -->
                    </ul><!-- end nav navbar-nav -->
                </div><!-- end #navbar-collapse-1 -->

            </nav><!-- end navbar navbar-default w3_megamenu -->
        </div><!-- end container -->
