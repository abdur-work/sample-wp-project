<?php
/*
* Template Name: Reviews
*/

get_header();
?>
<div class="atf-inner-page-bg">
	
	<!-- IP ATF -->
	<div class="atf-inner-page">
		<?php include('content/template-innerpage-atf.php'); ?>      
	</div>
	<!-- /.IP ATF -->

	<!-- IP Content -->
	<section class="main-wrap">
        <div class="content-width">
            <div class="main has-sidebar">
            	<!-- Main Content Section -->
                <div class="content-section blog-section">
                    
                    <div class="bread-outer">
                        <?php if ( function_exists('yoast_breadcrumb') ) {
							  yoast_breadcrumb( '<div class="breadcrumb" id="breadcrumbs">','</div>' );
							} ?>
						<div class="pagedate"><?php echo date("F j, Y");?></div>
                    </div>

                    <h1><?php the_title(); ?></h1>

                    <div class="reviews">
                    <?php if(have_rows('ip_reviws')):
	                    while(have_rows('ip_reviws')) : the_row();?>
	                    <div class="reviews-detail" style="background-image: url('<?php the_field('double_quotes', 'options'); ?>');">
	                        <p><?php the_sub_field('ip_review_blurb');?></p>
	                        <span class="review-name"><?php the_sub_field('ip_reviewer');?></span>
	                    </div>
	                <?php endwhile;
	                endif; ?>
	                </div>
	                

                </div>
                <!-- /.Main content-section -->

                <div class="sidebar">
                    <?php dynamic_sidebar();?>
                </div>
                <!-- /.sidebar -->
	
				<?php

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					//get_template_part( 'template-parts/content/content', 'page' );
					the_content(); 

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

				endwhile; // End of the loop.
				?>

			</div>
		</div>

	</section>
    <!-- /.IP Content -->
</div>
<?php
get_footer();
