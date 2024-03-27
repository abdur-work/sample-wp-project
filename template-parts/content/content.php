<?php
/**
 * Template part for displaying posts
 */

?>

<div class="post blog-box" id="post-<?php the_ID(); ?>">
	<header class="entry-header">
		<?php
		if ( is_sticky() && is_home() && ! is_paged() ) {
			printf( '<span class="sticky-post">%s</span>', _x( 'Featured', 'post', 'twentynineteen' ) );
		}
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="post-img">
		<a href="<?php the_permalink(); ?>">

			<?php 
			   if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				}
				else {
					$default_img = get_field('default_blog_image', 'options'); ?>
					<img src="<?php echo $default_img['url'];?>" alt="<?php echo $default_img['alt'];?>">
				<?php } ?>

		</a>
	</div>

	<div class="post-caption entry-content">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<span><?php echo date("F j, Y");?></span>

		<p><?php echo excerpt(100); ?></p>
		<a href="<?php the_permalink(); ?>" class="btn btn-hover">READ MORE</a>
		
		<?php
		// the_content(
		// 	sprintf(
		// 		wp_kses(
		// 			/* translators: %s: Name of current post. Only visible to screen readers */
		// 			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentynineteen' ),
		// 			array(
		// 				'span' => array(
		// 					'class' => array(),
		// 				),
		// 			)
		// 		),
		// 		get_the_title()
		// 	)
		// );

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentynineteen' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
</div><!-- #post-<?php //the_ID(); ?> -->
