<?php
/*
* Template Name: Thank You
*/

get_header();
?>

<div class="atf-inner-page-bg">
	
	<!-- IP ATF -->
	<div class="atf-inner-page">
		<?php include('content/template-innerpage-atf.php'); ?>      
	</div>
	<!-- /.IP ATF -->

	<div class="thankyou-inner">
        <div class="content-width">
            <div class="thankyou-content">
                <span><?php the_field('useful_resource_title');?></span>
                <ul>
	            	<?php if(have_rows('404_practice_links', 'options')):
						while(have_rows('404_practice_links', 'options')) : the_row();?>
						<li><a href="<?php the_sub_field('404_practice_link');?>"><?php the_sub_field('404_practice_name');?></a></li>
					<?php endwhile;
					endif; ?>
	            </ul>
            </div>
        </div>
   </div> 

   <!-- Myths -->
	<section class="myths-section">
	    <div class="content-width">
	        <div class="row">
	            <div class="col-md-4">
	                <div class="left-section">
	                    <?php $myths_img = get_field('myths_img', 'options');?>
	                    <img src="<?php echo $myths_img['url'];?>" alt="<?php echo $myths_img['alt'];?>">
	                </div>
	            </div>
	            <div class="col-md-8">
	                <div class="right-section">
	                    <h2><?php echo get_field('myths_title', 'options');?></h2>
	                    <span><?php echo get_field('myths_sub_title', 'options');?></span>
	                    <a href="<?php echo get_field('myths_cta_link', 'options');?>"><?php echo get_field('btf2_cta_texta', 'options');?></a>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<!-- /.Myths -->

	<!-- Client Reviews -->
	<section class="about-section">
	    <div class="sliders-wrap">
	        <div class="content-width">
	            <span class="top-heading"><?php echo get_field('client_reviews_title', 'options');?></span>
	            <div class="sliders-inner">
	                <div class="slider-box">
	                    <div class="btf-slider-fw">
	                        <div class="before" style="background-image: url('<?php the_field('double_quotes', 'options');?>');"></div>
	                        <div class="slider-first">
	                            <?php if(have_rows('client_reviews', 'options')):
	                            while ( have_rows('client_reviews', 'options') ) : the_row(); ?>
	                                <div>
	                                    <div class="slide-content">
	                                        <span><?php the_sub_field('review', 'options');?></span>
	                                        <span><?php the_sub_field('reviewer', 'options');?></span>
	                                    </div>
	                                </div>
	                                <?php endwhile;
	                            endif;?>
	                        </div>
	                    </div>
	                    <div class="view-more-wrap"><a href="<?php echo get_field('reviews_cta_link', 'options');?>"><?php echo get_field('reviews_cta_text' , 'options');?></a></div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<!-- /.Client Reviews -->


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


<?php
get_footer();
