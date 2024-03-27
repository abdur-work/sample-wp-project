<div class="content-width">
    <div class="atf-content">
        <?php // Check if page template is different
        $checkClasess = get_body_class(); 
        if (in_array('page-template-template-contact',$checkClasess)) { // Check if page template is Contact ?>

			<span><?php the_field("contact_atf_title");?></span>

        <?php } else if (in_array('page-template-template-thank-you',$checkClasess)) { // Check if page template is Thank you ?>

			<?php the_field("thank_you_atf_title");?>

        <?php } else { // check if simple page ?>

			<span><?php the_field("ip_atf_title","option");?></span>
	        <span><?php the_field("ip_atf_sub_title","option");?></span>
	        <span>
	            <div class="atf-buttons">
	                <a href="<?php the_field("ip_cta_link","option");?>" class="btn btn-hover"><?php the_field("ip_atf_cta_txt","option");?></a>
	            </div>
	        </span>

        <?php } ?>
    </div>
</div>