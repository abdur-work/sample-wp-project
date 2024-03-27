<?php
/*
* Template Name: Case Results
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
                    
                  <h1><?php the_title(); ?></h1>

                    <?php if(have_rows('ip_case_results')):
						while(have_rows('ip_case_results')) : the_row();?>
						<div class="result-box">
							<h2><?php the_sub_field('case_title');?></h2>
	                        <span><?php the_sub_field('case_type');?></span>
	                        <?php the_sub_field('case_blurb');?>
						</div>
					<?php endwhile;
					endif; ?>

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
