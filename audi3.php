<link rel="stylesheet" href="css/audi.css">
<script src="js/a3.js"></script>
<div class="row">
    <div class="col-md-12 text-center">Screen This Side</div>
</div>
<div class="theatre">
    <?php
    $k = 1;
    for ($i = 0; $i < 2; $i++) {
        ?>
        <div class="cinema-seats <?php if ($i == 0) { ?> left <?php } else { ?>right<?php } ?>">
            <?php
            for ($j = 1; $j <= 7; $j++) {
                ?>
                <div class="cinema-row row-<?php echo $j ?>">
                    <?php
                    foreach (range('A', 'G') as $item) {
                        $bookedseats = disablSeat($item . $k);
                        ?>
                        <div class="<?php if ($bookedseats == true) { ?>occupiedSeat<?php } else { ?>seat <?php } ?> text-white"
                             id="<?php echo $item . $k; ?>" <?php if ($bookedseats == true) { ?>disabled="" <?php } ?>
                            <?php if ($bookedseats != true) { ?> onclick="chooseSeat('<?php echo $item . $k; ?>')" <?php } ?> ><?php echo $item . $k; ?></div>
                        <?php
                    }
                    ?>
                </div>
                <?php
                $k++;
            }
            ?>
        </div>
        <?php
    }
    ?>
</div>
