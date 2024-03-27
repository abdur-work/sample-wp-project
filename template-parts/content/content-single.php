<?php
/**
 * Template part for displaying posts
 */

?>
 <div class="bread-outer">
    <?php wcr_share_buttons(); ?>
    <div class="pagedate"><?php echo date("F j, Y");?></div>
</div>

<h1><?php the_title(); ?></h1>
<?php the_content(); ?>