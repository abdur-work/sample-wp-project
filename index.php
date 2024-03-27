<?php
/**
 * The main template file
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

					<h1><?php the_title(''); ?></h1>

					<?php
					if (have_posts() ) {

						// Load posts loop.
						while (have_posts() ) { 
							the_post();
							get_template_part( 'template-parts/content/content' );
						}

						// Previous/next page navigation.
						// twentynineteen_the_posts_navigation();
						
					      if (function_exists('custom_pagination')) {
					        //custom_pagination($custom_query->max_num_pages,"",$paged);
					      }

					} else {

						// If no content, include the "No posts found" template.
						get_template_part( 'template-parts/content/content', 'none' );

					}
					?>
					<div class="pagination">
					<?php
						global $wp_query;
						$total_pages = $wp_query->max_num_pages; 
						if ($total_pages > 1){ 
						  $current_page = max(1, get_query_var('paged'));
						  echo paginate_links(array(
							  'base' => get_pagenum_link(1) . '%_%',
							  'format' => '/page/%#%',
							  'current' => $current_page,
							  'total' => $total_pages,
							  'prev_text'    => __('<span class="read-prev">Previous</span>'),
							  'next_text'    => __('<span class="read-next">Next</span>'),
							));
						}
					?>
			        </div> 
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
