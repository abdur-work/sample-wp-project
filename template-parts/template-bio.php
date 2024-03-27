<?php
/*
* Template Name: Bio
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
                <div class="content-section bio-section">
                    
                	<h2><?php the_field('bio_name');?></h2>
                    <div class="detail-box">
                        <div class="row">
                            <div class="col-md-6">
                                <?php the_field('bio_blurb');?>
                            </div>
                            <div class="col-md-6">
                                <div class="bio-image">
                                	<?php $bio_img = get_field('bio_image');?>
                                    <img class="bio-img" src="<?php echo $bio_img['url'];?>" alt="<?php echo $bio_img['alt'];?>" />
                                </div>
                                <div class="bio-logo-slider">
                                	<?php if(have_rows('bio_badges')):
										while(have_rows('bio_badges')) : the_row();?>
	                                    <div>
	                                    	<?php $bio_badge = get_sub_field('badge');?>
	                                        <img src="<?php echo $bio_badge['url'];?>" alt="<?php echo $bio_badge['alt'];?>">
	                                    </div>
									<?php endwhile;
									endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail-content">
                        <div class="row">
                            <div class="col-md-12">
                            	<?php the_field('bio_affiliations');?>
                            </div>
                        </div>
                        <div class="row">
                        	<?php if(have_rows('bio_lists')):
								while(have_rows('bio_lists')) : the_row();?>
                            	<div class="col-md-4">
                                	<?php the_sub_field('bio_list');?>
                                </div>
							<?php endwhile;
							endif; ?>
                        </div>
                    </div>
	
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

</div>

<?php
get_footer();
