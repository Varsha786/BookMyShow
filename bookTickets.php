<div class="m-tickets-instantly">
    <h4>Book tickets instantly</h4>
    <div class="fleft m-select">

    </div>
    <div class="m-select-movie" >
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

    </div>
    <div class="m-select-date">
        <select class="list_of_movies" id="showid">
            <option value="">Select Date</option>
        </select>

    </div>
    <div class="m-btn">
        <input type="button" value="Go" onclick="searchShows()" class="btn btn-primary">
    </div>
    <div class="clearfix"></div>
</div>