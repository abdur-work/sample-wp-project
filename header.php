<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' );?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
	<!-- Style Links -->
	<link rel="stylesheet" href="<?php echo bloginfo('template_url');?>/css/fonts.css">
	<link rel="stylesheet" href="<?php echo bloginfo('template_url');?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo bloginfo('template_url');?>/css/aos.css">
    <link rel="stylesheet" href="<?php echo bloginfo('template_url');?>/css/slick.css">
	<link rel="stylesheet" href="<?php echo bloginfo('template_url');?>/css/global.css">

	<?php $classes = get_body_class();
	if (in_array('home',$classes)) { ?>
		<link rel="stylesheet" href="<?php echo bloginfo('template_url');?>/css/hp-style.css">
	<?php } else { ?>
		<link rel="stylesheet" href="<?php echo bloginfo('template_url');?>/css/inner-page.css">
	<?php } ?>

	<!-- <link rel="stylesheet"  media="nope!" onload="this.media='all'" href="<?php //echo bloginfo('template_url');?>/css/after-load-style.css"> -->

	<script type='text/javascript' src='<?php echo bloginfo('template_url');?>/js/jquery-2.2.0.min.js'></script>
    <script type='text/javascript' src="<?php echo bloginfo('template_url');?>/js/swiper.min.js"></script>
	
</head>

<body <?php body_class( array('before-load') ); ?>>
	
<div id="page" class="wrapper site">

    <!-- header -->
    <header class="header">
        <div class="logo">
            <?php $logo_main = get_field( "logo_main", "option" ); $logo_fixed = get_field( "logo_fixed", "option" ); ?>
            <a href="<?php echo site_url(); ?>">
                <img class="logo-main" src="<?php echo $logo_main['url'];?>" alt="<?php echo $logo_main['alt'];?>" />
                <img class="logo-fixed" src="<?php echo $logo_fixed['url'];?>" alt="<?php echo $logo_fixed['alt'];?>" />
            </a>
        </div>
        <div class="nav-icon"><span></span></div>
        <div class="header-right">
            <div class="nav-wrap">
                <nav id="menu" class="menu-main-menu-container">
                    <?php wp_nav_menu(array(
                                'theme_location'=>'header-menu',
                                'menu_class' => 'menu',
                                'container' =>'',
                                'fallback_cb' => false, 
                               )
                         ); 
                    ?>
                </nav>
            </div>
            <div class="header-phone">
                <span><?php echo get_field( "header_phone_text", "option" );?></span>
                <a href="tel:<?php echo get_field( "header_phone_tel", "option" );?>"><?php echo get_field( "header_phone_tel", "option" );?></a>
            </div>
        </div>
    </header>
    <!-- /.header -->

    