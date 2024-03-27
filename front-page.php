<?php
/**
 * Template Name : Home Page
 *
 */
get_header();

?>

<!-- ATF -->
<div class="atf-section">
    <div class="content-width">
        <div class="atf-content">
            <div class="emotion_sec">
            	<?php 
            		$atf_smiley_1 = get_field( "atf_smiley_1"); 
            		$atf_smiley_2 = get_field( "atf_smiley_2"); 
            		$atf_smiley_3 = get_field( "atf_smiley_3"); 
            	?>
                <ul>
                    <li class="fadein-onload"><img src="<?php echo $atf_smiley_1['url'];?>" alt="<?php echo $atf_smiley_1['alt'];?>"></li>
                    <li class="fadein-onload"><img src="<?php echo $atf_smiley_2['url'];?>" alt="<?php echo $atf_smiley_2['alt'];?>"></li>
                    <li class="bounce"><img src="<?php echo $atf_smiley_3['url'];?>" alt="<?php echo $atf_smiley_3['alt'];?>"></li>
                </ul>
            </div>
            <span><?php echo get_field('atf_sub_title_1');?></span>
            <span><?php echo get_field('atf_sub_title_2');?></span>
            <h1><?php echo get_field('atf_heading');?></h1>
            <div class="atf-content-bot">
                <span><?php echo get_field('atf_blurb');?></span>
            </div>
            <div class="atf-buttons">
                <a href="#" class="btn btn-hover"><?php echo get_field('talk_button_text');?></a>
                <span><a href="#" class="btn btn-text-hover"><?php echo get_field('consult_button_text');?></a></span>
            </div>
        </div>
    </div>
</div>
<!-- /.ATF -->

<!-- BTF1 Process -->
<div class="btf1-section">
    <div class="content-width">
        <span class="section-para"><?php echo get_field('btf1_title');?></span>
        <div class="row">
            <div class="col-md-6">
                <?php echo get_field('btf1_blurb');?>
            </div>
            <div class="col-md-6">
                <div class="btf1-right-content">
                    <ul>
                        <?php if(have_rows('btf1_list_items')):
                        while ( have_rows('btf1_list_items') ) : the_row(); ?>
                            <li>
                                <span>
                                    <?php $btf1_icon = get_sub_field('icon');?>
                                    <img src="<?php echo $btf1_icon['url'];?>" alt="<?php echo $btf1_icon['alt'];?>">
                                </span>
                                <p><?php the_sub_field('text');?></p>
                            </li>
                            <?php endwhile;
                        endif;?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="atf-buttons">
            <a href="#" class="btn btn-hover"><?php echo get_field('talk_button_text');?></a>
            <span><a href="#" class="btn btn-text-hover"><?php echo get_field('consult_button_text');?></a></span>
        </div>
    </div>
</div>
<!-- /.BTF1 Process -->

<!-- BTF2 Myths -->
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
<!-- /.BTF2 Myths -->

<!-- BTF3 Client Reviews -->
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
<!-- /.BTF3 Client Reviews -->

<!-- BTF4 Practice Areas -->
<section class="personal-injury-section">
    <div class="content-width">
        <h2><?php the_field('btf4_title');?> <span><?php the_field('btf4_sub_title');?></span></h2>
        <div class="atf-content-bot">
        <span><?php the_field('btf4_tag_line');?></span>
        </div>
        <div class="personal-injury-slider">
            <?php if(have_rows('practice_areas')):
            while ( have_rows('practice_areas') ) : the_row(); ?>
                <div>
                    <div class="personal-injury-contain">
                        <h3><?php the_sub_field('practice_title');?> <a href="<?php the_sub_field('practice_link');?>">LEARN MORE</a></h3>
                        <p>
                            <?php the_sub_field('practice_blurb');?>
                        </p>
                        <div class="practice-more">
                            <a href="#">Learn More</a>
                        </div>
                    </div>
                </div>
                <?php endwhile;
            endif;?>
        </div>
    </div>
</section>
<!-- /.BTF4 Practice Areas -->

<!-- BTF5 Path -->
<section class="claim-process">
    <div class="content-width">
        <span class="section-para"><?php the_field('btf5_title');?></span>
        <span class="headline"><?php the_field('btf5_sub_title');?></span>
        <div class="claim-content">
            <div class="row claim-content-slider">
                <?php if(have_rows('btf5_items')):
                while ( have_rows('btf5_items') ) : the_row(); ?>
                    <div class="claim-slide">
                        <div class="col-md-3">
                            <div class="claim-box">
                                <?php $btf5_icon = get_sub_field('icon');?>
                                <img src="<?php echo $btf5_icon['url'];?>" alt="<?php echo $btf5_icon['alt'];?>">
                                <span><?php the_sub_field('title');?></span>
                                <?php the_sub_field('blurb');?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile;
                endif;?>
            </div>
        </div>
        <div class="atf-buttons">
            <a href="#" class="btn btn-hover"><?php echo get_field('talk_button_text');?></a>
            <span><a href="#" class="btn btn-text-hover"><?php echo get_field('consult_button_text');?></a></span>
        </div>
    </div>
</section>
<!-- /.BTF5 Path -->

<!-- BTF6 FAQ -->
<section class="faq-section">
    <div class="content-width">
        <h2><?php the_field('btf6_title');?> <span><?php the_field('btf6_sub_title');?></span></h2>
        <?php if(have_rows('faqs')):
        while ( have_rows('faqs') ) : the_row(); ?>
            <h3><?php the_sub_field('question');?></h3>
            <?php the_sub_field('blurb');?>
            <?php endwhile;
        endif;?>
    </div>
</section>
<!-- /.BTF6 FAQ -->

<!-- BTF7 Team -->
<div class="our-team">
    <section class="ourteam-section">
        <div class="content-width">
            <h2><?php the_field('btf7_title');?> <span class="gray-text"><?php the_field('btf7_sub_title');?></span></h2>
            <span class="headline">
                <?php the_field('btf7_blurb');?>
            </span>
            <div class="atf-buttons">
                <a href="#" class="btn btn-hover"><?php the_field('btf7_cta_text');?></a>
            </div>

            <div class="sliders-inner">
                <div class="slider-box">
                    <div class="ourteam-slider">
                        <div class="slider-second">
                            <?php if(have_rows('team')):
                            while ( have_rows('team') ) : the_row(); ?>
                                <div>
                                    <div class="slide-content">
                                        <?php $team_img = get_sub_field('image');?>
                                        <img src="<?php echo $team_img['url'];?>" alt="<?php echo $team_img['alt'];?>">
                                        <span class="member">
                                            <span><?php the_sub_field('name');?></span>
                                            <a href="#"><?php the_sub_field('link_text');?></a>
                                        </span>
                                    </div>
                                </div>
                                <?php endwhile;
                            endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="client-logo-section">
            <div class="content-width">
                <div class="client-logos client-logo-slider">
                    <?php if(have_rows('clients_logo')):
                        while ( have_rows('clients_logo') ) : the_row(); ?>
                        <div>
                            <?php $client_logo = get_sub_field('client_logo');?>
                            <img src="<?php echo $client_logo['url'];?>" alt="<?php echo $client_logo['alt'];?>">
                        </div>  
                        <?php endwhile;
                    endif;?>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.BTF7 Team -->

<?php
get_footer();
