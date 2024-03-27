<?php
/**
 * The template for displaying all single posts
 *
 */

get_header();
?>
<div class="atf-inner-page-bg">

	<!-- IP ATF -->
	<div class="atf-inner-page">
		<?php include('template-parts/content/template-innerpage-atf.php'); ?>      
	</div>
	<!-- /.IP ATF -->

	<section class="main-wrap">
        <div class="content-width">
            <div class="main has-sidebar">
                <div class="content-section blog-section">


				<?php

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content/content', 'single' );

					if ( is_singular( 'attachment' ) ) {
						// Parent post navigation.
						the_post_navigation(
							array(
								/* translators: %s: parent post link */
								'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentynineteen' ), '%title' ),
							)
						);
					} elseif ( is_singular( 'post' ) ) {
						// Previous/next post navigation.
						the_post_navigation(
							array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'twentynineteen' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'twentynineteen' ) . '</span> <br/>' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'twentynineteen' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'twentynineteen' ) . '</span> <br/>' .
									'<span class="post-title">%title</span>',
							)
						);
					}

				endwhile; // End of the loop.
				?>

			</div><!-- .content-area -->

			<!-- Sidebar Starts -->
			<div class="sidebar">
				<?php dynamic_sidebar();?>
			</div>
			<!-- Sidebar Ends -->
		</div>
	</div>
</section>

</div>
<?php
get_footer();
