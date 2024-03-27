<?php
get_header();
?>
<script>
window.history.pushState("", "", '/notFound');
</script>

<div class="atf-inner-page-bg">
	
	<!-- IP ATF -->
	<div class="atf-inner-page">
		<?php include('template-parts/content/template-innerpage-atf.php'); ?>      
	</div>
	<!-- /.IP ATF -->

	<!-- IP Content -->
	<section class="main-wrap">
        <div class="content-width">
            <div class="main has-sidebar">
            	<!-- Main Content Section -->
                <div class="content-section blog-section">
                    
                   <div class="page-notfound">
                        <h2><?php the_field('404_title', 'options');?></h2>
                        <span><?php the_field('404_sub_title', 'options');?></span>
                        <p><?php the_field('404_links_text', 'options');?></p>
                        <ul>
                        	<?php if(have_rows('404_practice_links', 'options')):
								while(have_rows('404_practice_links', 'options')) : the_row();?>
								<li><a href="<?php the_sub_field('404_practice_link');?>"><?php the_sub_field('404_practice_name');?></a></li>
							<?php endwhile;
							endif; ?>
                        </ul>
                    </div>
                    
                    <h2><?php the_field('404_post_title', 'options');?></h2>


                    <?php 
	                    $custom_args = array( 'post_type' => 'post', 'paged' => $paged, 'posts_per_page'   => 3, 'order'=>'ASC', 'post_status'      => 'publish' );
	                    $custom_query = new WP_Query( $custom_args );
	              
	                 if ( $custom_query->have_posts() ) :
	                        while ( $custom_query->have_posts() ) : $custom_query->the_post();  ?>

	                        <div class="post blog-box">

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
								</div>
							</div>

					<?php endwhile; wp_reset_query();  endif;?>
					
                </div>
                <!-- /.Main content-section -->

                <div class="sidebar">
                    <?php dynamic_sidebar();?>
                </div>
                <!-- /.sidebar -->

			</div>
		</div>

	</section>
    <!-- /.IP Content -->
</div>

<?php
get_footer();
