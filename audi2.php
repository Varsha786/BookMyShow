<?php
foreach (range('A', 'L') as $item) {
    ?>
    <div class="row">
        <?php
        $k = 0;
        for ($i = 1; $i < 13; $i++) {

            if (($i == 5 || $i == 10) && $item != 'A') {
                ?>
                <div class="col-md-1">&nbsp;</div>
                <?php
            } else {
                $k++;
                $bookedseats = disablSeat($item . $k);
                ?>
                <div class="col-md-1">

                    <input type="button" <?php if ($bookedseats != true) { ?> onclick="chooseSeat('<?php echo $item . $k; ?>')" <?php } ?>
                           <?php if ($bookedseats == true) { ?>disabled="" <?php } ?>
                           class="btn <?php if ($bookedseats == true) { ?>btn-danger<?php } else { ?>btn-primary <?php } ?>  btns"
                           value="<?php echo $item . $k; ?>" id="<?php echo $item . $k; ?>">
                    <br><br>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <?php
}
?>
<div class="row">
    <div class="col-md-12">Screen This Side</div>
</div>



