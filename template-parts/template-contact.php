<?php
/*
* Template Name: Contact
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
            <div class="contact-page">
            	<!-- Contact Section -->
                <section class="contact-section">
                	<span class="headline"><?php the_field('contact_form_title');?></span>
                	<div class="content-width">
	                	<div class="contact-form">
							<div class="row">
		                    	<?php echo do_shortcode( get_field("form_short_code", "options") );?>
		                    </div>
		                    <span class="note"><?php echo get_field("form_after_text", "options");?></span>
		                    <span class="contact-number"><?php echo get_field("contact_form_call_text");?></span>
		                    <span class="contact-number"><?php echo get_field("form_phone", "options");?></span>
	                    </div>
	                </div>
                </section>
                <!-- /.Contact-section -->
                <div class="row">
                    <h2><?php the_field("contact_location_title");?></h2>
                    <?php if(have_rows('footer_locations', 'options')):
                		while ( have_rows('footer_locations', 'options') ) : the_row(); ?>
                		<div class="col-md-12">
	                        <div class="location">
	                            <div class="location-text">
	                                <span><?php echo the_sub_field('location_title');?></span>
	                                <p><?php echo the_sub_field('address_line_1');?></p>
	                                <p><?php echo the_sub_field('address_line_2');?></p>
	                                <p><strong>Phone:</strong> <a href="<?php echo the_sub_field('phone_number');?>"><?php echo the_sub_field('phone_number');?></a></p>
	                                <p><strong>Hours:</strong> <?php echo the_sub_field('hours_text');?></p>
	                            </div>
	                            <div class="location-map">
	                                <?php echo the_sub_field('location_gm');?>
	                            </div>
	                        </div>
	                    </div>		
                	<?php endwhile;
                	endif;?>
                </div>

                <!-- Contact Social Links -->
                <div class="social-conatct">
                    <h3><?php the_field("contact_social_title");?></h3>
                    <ul>
                    	<?php if(have_rows('social_icons', 'options')):
                		while ( have_rows('social_icons', 'options') ) : the_row(); ?>
                			<li><a href="<?php echo the_sub_field('link');?>" target="_blank">
                				<?php $social_icon = get_sub_field( "icon", "option" );?>
                				<img src="<?php echo $social_icon['url'];?>" alt="<?php echo $social_icon['alt'];?>">
                                </a></li>	
                			<?php endwhile;
                		endif;?>
                    </ul>
                </div>  
                <!-- /.Contact Social Links -->
	
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
