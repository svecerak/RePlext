<?php foreach($movieReviews['results'] as $review) { ?>

<div>
    <?php
    $content = $review['content'];
    $small = substr($content, 0, 300);
    // echo $small . " ...";
    ?>
    <!-- <hr> -->
</div>
<?php } ?>