<?php

if ( ! function_exists( 'twentynineteen_setup' ) ) :
	function twentynineteen_setup() {
		
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );


		register_nav_menus(
		    array(
		      'header-menu' => __( 'Header Menu' )
		    )
		  );

	}
endif;
add_action( 'after_setup_theme', 'twentynineteen_setup' );

/**
 * Gravity Form Disable Scroll Back
 *
 */
add_filter( 'gform_confirmation_anchor', '__return_true' );
add_filter( 'gform_confirmation_anchor', function() {
    return false;
} );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentynineteen_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'twentynineteen' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'twentynineteen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'twentynineteen_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function twentynineteen_scripts() {
	wp_enqueue_style( 'twentynineteen-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'twentynineteen_scripts' );

/* ACF PRO function */

if( function_exists('acf_add_options_page') ) {
  acf_add_options_page();
  acf_add_options_sub_page('Header');
  acf_add_options_sub_page('Footer');
  acf_add_options_sub_page('Global Fields');
  acf_add_options_sub_page('IP ATF');
  acf_add_options_sub_page('404 Page'); 
}

if (function_exists('acf_set_options_page_menu')){
  acf_set_options_page_menu('Global Options');
}

/**
 *  Add custom CSS classes in menu
 *  This function is responsible for adding "my-parent-item" class to parent menu item's
 */

function add_menu_parent_class( $items ) {
$parents = array();
foreach ( $items as $item ) {
    //Check if the item is a parent item
    if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
        $parents[] = $item->menu_item_parent;
    }
}

foreach ( $items as $item ) {
    if ( in_array( $item->ID, $parents ) ) {
        //Add "menu-parent-item" class to parents
        $item->classes[] = 'nav-item parent';
    }
    else{
      $item->classes[] = 'nav-item';
    }
}

return $items;
}

//add_menu_parent_class to menu
add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );


/**
 * DeRegister Scripts
 */
add_action('wp_enqueue_scripts', 'ex_files', 100);

function ex_files(){
	if(!is_admin()):
		wp_deregister_style( 'wp-block-library' ); 
		wp_deregister_style( 'twentynineteen-style' ); 
	endif;
}

/**
 *  Jump Links
 */
function jump_links() {
?>
<style>
#showlink{ display: none; }
/*.show{ display: contents; }*/
#showlink p { margin-bottom: 10px; margin-top: 10px; }	
#showlink { padding: 0 0 30px 40px; }
.tableofcontent{ font-size: 20px; font-weight: 400; }
</style>
<script>
var $ = jQuery;
$(".show").click(function (){
  var newContents = $(this).attr('href').slice(1);
  if( $(this).hasClass('active')){
    $(this).removeClass('active');
    $(this).text('[Show]');
    $('#'+newContents).stop(true,true).slideUp();
  }
  else{
  	$(this).addClass('active');
    $(this).text('[Hide]');
  	$('#'+newContents).stop(true,true).slideDown();
  }
  return false;
});
$(document).ready(function(){
  // Add smooth scrolling to all links
  // Select all links with hashes
	$('a[href*="#"]')
	  // Remove links that don't actually link to anything
	  .not('[href="#"]')
	  .not('[href="#0"]')
	  .click(function(event) {
		if (this.hash === "#showlink") {
			$('body').addClass('smooth-scroll');
		   return false;
		}
		// On-page links
		if (
		  location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
		  && 
		  location.hostname == this.hostname
		) {
		  // Figure out element to scroll to
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
		  // Does a scroll target exist?
		  if (target.length) {
			// Only prevent default if animation is actually gonna happen
			event.preventDefault();
			  
			$('html, body').animate({
			  scrollTop: target.offset().top
			}, 1000, function() {
			  // Callback after animation
			  // Must change focus!
			  var $target = $(target);
			  $target.focus();
			  if ($target.is(":focus")) { // Checking if the target was focused
				return false;
			  } else {
				$target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
				$target.focus(); // Set focus again
			  };
			});
		  }
		}
	  });
	
});
</script>
<?php
}
add_action( 'wp_footer', 'jump_links' );


/**
 *  Custom Pagination
**/

function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 1;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => false,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => false,
    'type'            => 'array',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    $current_page =  0;
    ?>
     
        <ul class="pagination">
        <?php foreach ($paginate_links as $link) { ?>
          <li class="active"><?php echo $link; ?></li>
        <?php } ?>
        </ul>
                
 <?php
  }
}

add_filter('widget_text','do_shortcode');

/** 
* tn Limit Excerpt Length by number of Words
**/
function excerpt( $limit ) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

/**
 * Excerpt More
 */
function tn_excerpt_more( $more ) {
return sprintf( '<br><a class="read-more" href="%1$s">%2$s</a>',
get_permalink( get_the_ID() ),
__( 'Read More', 'textdomain' )
);
}
add_filter( 'excerpt_more', 'tn_excerpt_more' );


/**
 * Social media share buttons
 * Please make sure you replace WPCrumbs with your Twitter username in
 * <a class="share-twitter" href="https://twitter.com/intent/tweet?text=&url=&via=WPCrumbs" target="_blank">
**/
function wcr_share_buttons() {
    $url = urlencode(get_the_permalink());
    $title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
    $media = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));
?>
    <div class="social-button">
      <span>SHARE</span> 
      <a class="share-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" target="_blank"><i class="fa fa-facebook-f"></i></a>
      <a class="share-twitter" href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&amp;url=<?php echo $url; ?>&amp;via=WPCrumbs" target="_blank"><i class="fa fa-twitter"></i></a>
      <a class="share-googleplus" href="https://plus.google.com/share?url=<?php echo $url; ?>" target="_blank"></a>
      <a class="share-pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo $url; ?>&amp;media=<?php echo $media;?>&amp;description=<?php echo $title; ?>" target="_blank"></a>
    </div>
<?php 
}


/**
 * Allow SVG
 */
function cc_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');




/**
 *  body_class
**/
add_filter( 'body_class','my_body_classes' );
function my_body_classes( $classes ) {
 
    $classes[] = 'class-name';
     
    return $classes;
     
}


/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

