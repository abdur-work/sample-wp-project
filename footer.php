	</div>
	<!-- content end -->
	
	<!-- footer -->
	<footer class="footer">
        <?php // Check if page template is contact
        $checkClasess = get_body_class(); 
        if (!in_array('page-template-template-contact',$checkClasess)) { ?>
    
        <!-- contact-section -->
        <section class="contact-section">
            <div class="content-width">
                <div class="contact-form">
                    <h2><?php echo get_field("form_title", "options");?> <span><?php echo get_field("form_sub_title", "options");?></span></h2>
                    <span class="headline"><?php echo get_field("form_blurb", "options");?></span>
                    <div class="row">
                    	<?php echo do_shortcode( get_field("form_short_code", "options") );?>
                    </div>
                    <span class="note"><?php echo get_field("form_after_text", "options");?></span>
                    <span class="contact-number"><?php echo get_field("form_phone_text", "options");?></span>
                    <span class="contact-number"><?php echo get_field("form_phone", "options");?></span>
                </div>
            </div>
        </section>
        <!-- /.contact-section -->

        <!-- location section -->
        <div class="footer-location">
            <div class="content-width">
                <div class="row">
                	<?php if(have_rows('footer_locations', 'options')):
                		while ( have_rows('footer_locations', 'options') ) : the_row(); ?>
                		<div class="col-md-6">
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
            </div>
        </div>
        <!-- /.location section -->
        <?php } ?>
        <!-- Copyright Footer -->
        <div class="content-width">
            <div class="footer-contain">
                <div class="footer-left">
                	<?php $footer_logo = get_field( "footer_logo", "option" );?>
                    <a href="#"><img src="<?php echo $footer_logo['url'];?>" alt="<?php echo $footer_logo['alt'];?>"></a>
                    <div class="copyright">
                        <p>&copy; <?php date('Y');?> <?php echo get_field("footer_copyright", "options");?></p>
                    </div>
                </div>
                <div class="footer-mid">
                	<?php if(have_rows('footer_menu_row', 'options')):
                		while ( have_rows('footer_menu_row', 'options') ) : the_row(); ?>
                		<ul>
                			<?php if(have_rows('footer_menu', 'options')):
                				while ( have_rows('footer_menu', 'options') ) : the_row(); ?>
		                        <li><a href="<?php echo the_sub_field('menu_link');?>"><?php echo the_sub_field('menu_item');?></a></li>
	                        	<?php endwhile;
                			endif;?>
	                    </ul>
                		<?php endwhile;
                	endif;?>
                </div>
                <div class="footer-right">
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
                    <div class="powered-by">
                        <p><?php echo get_field('powered_by_text', 'options');?></p>
	                    <?php $al_logo = get_field( "apricotlaw_logo", "options" );?>
	                    <img src="<?php echo $al_logo['url'];?>" alt="<?php echo $al_logo['alt'];?>">
                    </div>
                </div>
            </div><!-- footer-contain -->

            <div class="footer-mobile">
                <div class="copyright">
                    <p>&copy; <?php date('Y');?> <?php echo get_field("footer_copyright", "options");?></p>
                </div>
            </div>

        </div>
        <!-- /.Copyright Footer -->
    </footer>
    <!-- /.footer -->


    <!-- ATF Fixed Button -->
    <div class="atf-fix-buttons">
        <ul>
            <?php the_field("atf_fixed_buttons", "options");?>
        </ul>
    </div>
    <!-- /.ATF Fixed Button -->

    <!-- Smart Nav -->
    <div class="smart-nav">
        <ul>
            <?php the_field("smart_nav", "options");?>
        </ul>
    </div>
    <!-- /.Smart Nav -->


    <!-- popup-section -->
    <div class="popup-overlay"></div>
    <div class="popup-section">
        <a href="javascript:void(0);" class="popup-close"></a>
        <div class="popup-inner">
            <div class="contact-form">
                <h2><?php echo get_field("form_title", "options");?> <span><?php echo get_field("form_sub_title", "options");?></span></h2>
                <span class="headline"><?php echo get_field("form_blurb", "options");?></span>
                <div class="row">
                    <?php echo do_shortcode( get_field("poup_form_short_code", "options") );?>
                </div>
                <div class="form-footer">
                    <span class="note"><?php echo get_field("form_after_text", "options");?></span>
                    <!-- <input type="submit" value="SEND" name="" />                 -->
                    <span class="contact-number"><?php echo get_field("form_phone_text", "options");?><em><?php echo get_field("form_phone", "options");?></em></span>
                </div>
            </div>
        </div>
    </div>
    <!-- /.popup-section -->


    <!-- live-chat-popup -->
    <div class="live-chat-popup">
        <div class="live-chat-inner">
            <a href="javascript:void(0);" class="close-chat-popup livechat-close"></a>
            <div class="chat-content">
                <span>Start <strong>Live</strong> Chat?</span>
                <a href="javascript:void(0);" id="" onclick=""
                    class="btn btn-lg btn-primary btn-hover btn-yes">
                    <span class="gradient"></span> yes
                </a>
                <a href="javascript:void(0);" class="btn btn-lg btn-primary btn-hover live-chat-no">
                    <span class="gradient"></span> No
                </a>
            </div>
        </div>
    </div>
    <!-- /.live-chat-popup -->

<?php wp_footer(); ?>
</div>

<script type='text/javascript' src="<?php echo bloginfo('template_url');?>/js/jquery-2.2.0.min.js"></script>
<script type='text/javascript' src="<?php echo bloginfo('template_url');?>/js/slick.min.js"></script>
<script type='text/javascript' src="<?php echo bloginfo('template_url');?>/js/hp.js"></script>
<script type='text/javascript' src="<?php echo bloginfo('template_url');?>/js/ip.js"></script>
<script type='text/javascript' src="<?php echo bloginfo('template_url');?>/js/aos.js"></script>
<script type='text/javascript' src="<?php echo bloginfo('template_url');?>/js/script.js"></script>

</body>
</html>
