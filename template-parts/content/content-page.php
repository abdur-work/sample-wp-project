<?php
/**
 * Template part for displaying page content in page.php
 *
 */

?>
<div class="atf-inner-page-bg">
	
	<!-- IP ATF -->
	<div class="atf-inner-page">
		<?php include('template-innerpage-atf.php'); ?>      
	</div>
	<!-- /.IP ATF -->

	<!-- IP Content -->
	<section class="main-wrap">
        <div class="content-width">
            <div class="main has-sidebar">
            	<!-- Main Content Section -->
                <div class="content-section list-section">
                    
                    <div class="bread-outer">
                        <?php if ( function_exists('yoast_breadcrumb') ) {
							  yoast_breadcrumb( '<div class="breadcrumb" id="breadcrumbs">','</div>' );
							} ?>
						<div class="pagedate"><?php echo date("F j, Y");?></div>
                    </div>

                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>

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