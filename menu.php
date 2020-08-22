<nav class="navbar navbar-default w3_megamenu" role="navigation">
    <div class="navbar-header">
        <button type="button" data-toggle="collapse" data-target="#defaultmenu" class="navbar-toggle"><span
                class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
        </button>
        <a href="index.php" class="navbar-brand"><i class="fa fa-home"></i></a>
    </div><!-- end navbar-header -->

    <div id="defaultmenu" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <!-- Mega Menu -->
            <li class="dropdown w3_megamenu-fw"><a href="movies.html" data-toggle="dropdown"
                                                   class="dropdown-toggle">Movies<b class="caret"></b></a>
                <ul class="dropdown-menu fullwidth">
                    <li class="w3_megamenu-content">
                        <div class="row">
                            <h5 class="movies-page">for movies page - <a href="movies.html">Click here</a>
                            </h5>
                            <div class="col-sm-4">
                                <h3 class="title">Now Showing</h3>
                                <?php
                                $movies = "select * from movies order by id DESC";
                                $movies_result = mysqli_query($conn, $movies);
                                while ($movies_row = mysqli_fetch_array($movies_result)) {
                                    $releasedate30 = date('Y-m-d', strtotime('+30 days', strtotime($movies_row['releasedate'])));
                                    if ($releasedate30 > date('Y-m-d') && $movies_row['releasedate'] < date('Y-m-d')) {
                                        ?>
                                        <ul class="mov_list">
                                            <li><?php echo $movies_row['genrename'] ?></li>
                                            <li>
                                                <a href="movie-select-show.php?q=<?php echo $movies_row[0] ?>"><?php echo $movies_row['moviename']; ?></a>
                                            </li>
                                        </ul>
                                        <?php
                                    }
                                }
                                ?>
                            </div><!-- end col-4 -->
                            <div class="col-sm-4 movie-dd">
                                <h3 class="title">Next Change</h3>
                                <?php
                                $movies = "SELECT * FROM `movies` WHERE `releasedate`>CURRENT_DATE && releasedate<DATE_ADD(CURRENT_DATE , INTERVAL 7 DAY)  order by id DESC";
                                $movies_result = mysqli_query($conn, $movies);
                                while ($movies_row = mysqli_fetch_array($movies_result)) {
                                    ?>
                                    <p>
                                        <a href="movie-select-show.php?q=<?php echo $movies_row[0] ?>"><?php echo $movies_row['moviename']; ?>
                                            (<?php echo $movies_row['genrename'] ?>
                                            )</a><span><?php echo date('d M,Y', strtotime($movies_row['releasedate'])); ?></span>
                                    </p>
                                    <?php

                                }
                                ?>
                            </div><!-- end col-4 -->
                            <div class="col-sm-4 movie-dd">
                                <h3 class="title">Comming Soon</h3>
                                <?php
                                $movies = "SELECT * FROM `movies` WHERE `releasedate`>CURRENT_DATE && releasedate>DATE_ADD(CURRENT_DATE , INTERVAL 7 DAY) && releasedate<DATE_ADD(CURRENT_DATE , INTERVAL 30 DAY)  order by id DESC";
                                $movies_result = mysqli_query($conn, $movies);
                                while ($movies_row = mysqli_fetch_array($movies_result)) {
                                    ?>
                                    <p>
                                        <a href="movie-select-show.php?q=<?php echo $movies_row[0] ?>"><?php echo $movies_row['moviename']; ?>
                                            (<?php echo $movies_row['genrename'] ?>
                                            )</a><span><?php echo date('d M,Y', strtotime($movies_row['releasedate'])); ?></span>
                                    </p>
                                    <?php

                                }
                                ?>
                            </div><!-- end col-4 -->
                            <div class="clearfix"></div>
                        </div><!-- end row -->
                        <hr>

                    </li>
                </ul>
            </li>
            <li><a href="about.php">About</a></li>
            <!-- end dropdown w3_megamenu-fw -->
        </ul><!-- end nav navbar-nav -->

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Contact Us<b
                        class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <form id="contact1">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <input type="text" name="name" id="name1" class="form-control"
                                       placeholder="Name">
                                <input type="text" name="email" id="email1" class="form-control"
                                       placeholder="Email">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <input type="text" name="phone" id="phone1" class="form-control"
                                       placeholder="Phone">
                                <input type="text" name="subject" id="subject1" class="form-control"
                                       placeholder="Subject">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <textarea class="form-control" name="comments" id="comments1" rows="6"
                                                      placeholder="Your Message ..."></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="pull-right">
                                    <input type="button" onclick="contact()" value="SEND" id="submit1"
                                           class="btn btn-primary small">
                                </div>

                                <div id="coutput"></div>
                            <div class="clearfix"></div>
                        </form>
                    </li>
                </ul>
            </li>
        </ul><!-- end nav navbar-nav navbar-right -->
    </div><!-- end #navbar-collapse-1 -->

</nav><!-- end navbar navbar-default w3_megamenu -->