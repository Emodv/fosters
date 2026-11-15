<?php
/*
Template Name: Contact Page Template
*/
get_header();

$contact_page_intro_sub_heading   = get_field( 'contact_page_intro_sub_heading');
$contact_page_intro_heading 	  = get_field( 'contact_page_intro_heading');
$contact_page_intro_heading       = $contact_page_intro_heading ? $contact_page_intro_heading : get_the_title();
$contact_page_intro_description   = get_field( 'contact_page_intro_description');
$contact_page_intro_button_text   = get_field( 'contact_page_intro_button_text');
$contact_page_intro_button_link   = get_field( 'contact_page_intro_button_link');
$contact_page_intro_phone_message = get_field( 'contact_page_intro_phone_message');
$form_cta_form_shortcode          = get_field('form_cta_form_shortcode');

?>
<?php if(!empty($contact_page_intro_heading || $contact_page_intro_description)){?>
<section class="contact-container">
    <div class="container">
        <div class="contact-main flex">
	        <div class="contact-left">
                <div class="contact-cnt">
                    <?php if(!empty($contact_page_intro_sub_heading)){ ?>
                        <small><?php echo $contact_page_intro_sub_heading;  ?></small>
                    <?php } if(!empty($contact_page_intro_heading)){?>
                        <h1><?php echo $contact_page_intro_heading;  ?></h1>
                        <hr>
                    <?php } if(!empty($contact_page_intro_description)){ 
                           echo $contact_page_intro_description; 
                    } ?>  
                    <div class="contact-btn">
                        <?php  if(!empty($contact_page_intro_button_text & $contact_page_intro_button_link)){    
                                    if(filter_var($contact_page_intro_button_link, FILTER_VALIDATE_EMAIL)) {?>
                                        <a href="mailto:<?php echo $contact_page_intro_button_link;  ?>" class="button"><?php echo $contact_page_intro_button_text;  ?></a>
                                    <?php } else { ?>
                                         <a href="<?php echo $contact_page_intro_button_link;  ?>" class="button"><?php echo $contact_page_intro_button_text;  ?></a>
                                    <?php } 
                        } if(!empty($contact_page_intro_phone_message)){?>
                            <span><?php echo $contact_page_intro_phone_message;  ?></span>
                        <?php } ?>
                    </div>
                </div>
                <div class="contact-info flex">
                    <?php while( have_rows('contact_page_office_locations') ): the_row();
                    $contact_page_office_location_map              = get_sub_field('contact_page_office_location_map');
                    $contact_page_office_location_heading          = get_sub_field('contact_page_office_location_heading');
                    $contact_page_office_location_address          = get_sub_field('contact_page_office_location_address');
                    $contact_page_office_location_phone_number     = get_sub_field('contact_page_office_location_phone_number');
                    $contact_page_office_location_fax_number       = get_sub_field('contact_page_office_location_fax_number');
                    $contact_page_office_location_toll_free_number = get_sub_field('contact_page_office_location_toll_free_number'); ?>
                    <?php if(!empty($contact_page_office_location_heading || $contact_page_office_location_address)){?>
		  	            <div class="contact-grid">
                            <address>
                                <?php if(!empty($contact_page_office_location_heading)){?>	
                                        <span class="h4"><?php echo $contact_page_office_location_heading; ?></span>
                                <?php } if(!empty($contact_page_office_location_address)){ 
                                        echo $contact_page_office_location_address; 
                                } if(!empty($contact_page_office_location_phone_number)){  ?>
                                        <span class="lrow">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/phone.png" alt="Phone" title="Phone">
                                            <?php  echo $contact_page_office_location_phone_number; ?>
                                        </span> 
                                <?php }  if(!empty($contact_page_office_location_fax_number)){  ?>
                                        <span class="lrow">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fax.png" alt="Fax" title="Fax"><?php echo $contact_page_office_location_fax_number; ?>
                                        </span>
                                <?php }   if(!empty($contact_page_office_location_toll_free_number)){  ?>
                                            <span class="lrow">
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/phone.png" alt="toll-free" title="Fax"><?php echo $contact_page_office_location_toll_free_number; ?>
                                            </span>
                                <?php } ?>
                            </address>
                        </div>
		            <?php } endwhile; ?>
                </div>
	        </div>
            <div class="contact-right">
                <?php echo do_shortcode($form_cta_form_shortcode); ?>
            </div>
        </div>
    </div>
</section>
<?php
}
get_footer(); ?>