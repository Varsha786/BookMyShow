<?php

include_once "connection.php";
@session_start();
if (isset($_SESSION['user'])) {
    $email = $_SESSION['user'];
} else {
    header("Location:userlogin.php");
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
            <a href="myBookings.php">
                <button class="btn btn-primary">Booking History
                </button>
            </a><a href="changepassword.php">
                <button class="btn btn-primary">
                    Change Password
                </button>
            </a>
            <a href="userlogout.php">
                <button class="btn btn-primary">
                    Log out
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
                <a href="index.php"><h1>My Show</h1></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="bootstrap_container">
            <?php
            include "menu.php";
            ?>
        </div><!-- end container -->


