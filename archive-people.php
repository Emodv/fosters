<?php
get_header();
if(isset($_GET['search'])){
	$search = $_GET['search'];
}else{
	$search ="";	
}

/*$filter_position = $_GET['position'];
$filter_practice = $_GET['practice'];
$filter_office   = $_GET['office'];
$filter_role =  $_GET['role'];*/

?>
<section class="people-search">
	<div class="container">
		<h1>Our People</h1>
        <?php 
        $people_desc = category_description(4);
        if(!empty($people_desc)){ 
         echo $people_desc;
        } ?>
    </div>
</section>

		<?php
        $args = array(
                'post_type' => 'people',
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'posts_per_page' => -1,
        );

$peopleposts = get_posts( $args );
if($peopleposts){ $found= ""; } else{ $found= "No People Found!"; }?>    
<section class="our-people-main">
    <div class="container">
        <?php if(!empty($found)){ ?>
             <h2><?php echo $found; ?></h2>
        <?php } ?>
  	    <div class="people-lists flex">
            <?php foreach ( $peopleposts as $post ) : setup_postdata( $post ); 
            		$our_people_image       = get_field('our_people_image');
            		$our_people_first_name  = get_field('our_people_first_name');
            		$our_people_last_name   = get_field('our_people_last_name');
            		$our_people_position_title = get_field('our_people_position_title');
            		$our_people_email        = get_field('our_people_email');
            		$our_people_phone_number = get_field('our_people_phone_number');
            		$our_people_location     = get_field('our_people_location'); ?>
            		<?php if(!empty($our_people_first_name || $our_people_last_name || $our_people_position_title)){ ?>
				    <div class="people-list">
				    	<?php if(!empty($our_people_image)){ ?>
						  	<div class="people-thumbnail"> 
						  		<a href="<?php echo get_the_permalink($post->ID); ?>"><img src="<?php echo $our_people_image['url']; ?>" alt="<?php echo $our_people_image['alt']; ?>"></a> 
						  	</div>
					    <?php }  if(!empty($our_people_first_name || $our_people_last_name)){?>
		                	<h2><a href="<?php echo get_the_permalink($post->ID); ?>"><?php echo $our_people_first_name."&nbsp;".$our_people_last_name; ?></a></h2>
		            	<?php } if(!empty($our_people_position_title)){ ?> 
		                	<span class="position"><?php echo $our_people_position_title; ?></span>
		                <?php } ?>
		                <div class="people-details"> 
		                	<?php if(!empty($our_people_email)){ ?>
							<span class="lrow flex-vcenter">
								<img src="<?php echo get_stylesheet_directory_uri();?>/images/envelope.png" alt="envelope" title="envelope"><a href="mailto:<?php echo $our_people_email; ?>"><?php echo $our_people_email; ?></a>
							</span>	
							<?php }  if(!empty($our_people_phone_number)){ ?>				 
							<span class="lrow flex-vcenter">
								<img src="<?php echo get_stylesheet_directory_uri();?>/images/phone.png" alt="Phone" title="Phone"><a href="tel:<?php echo $our_people_phone_number; ?>"><?php echo $our_people_phone_number; ?></a>
							</span>
							<?php } if(!empty($our_people_location)){ ?>
							<span class="lrow flex-vcenter">
								<img src="<?php echo get_stylesheet_directory_uri();?>/images/location.png" alt="Location" title="Location"><?php echo $our_people_location; ?>
							</span> 
							<?php } ?>
						</div>
					</div>
				    <?php } ?>
			<?php endforeach; wp_reset_postdata();?>
		</div>
	</div>
</section>    
<?php signup();
$catid = 4;
$term = 'category_'.$catid;
$our_people_cta_panel_icon        = get_field('our_people_cta_panel_icon',$term);
$our_people_cta_panel_image       = get_field('our_people_cta_panel_image',$term);
$our_people_cta_panel_sub_heading = get_field('our_people_cta_panel_sub_heading',$term); 
$our_people_cta_panel_heading     = get_field('our_people_cta_panel_heading',$term);
$our_people_cta_panel_description = get_field('our_people_cta_panel_description',$term);
$our_people_cta_panel_button_text = get_field('our_people_cta_panel_button_text',$term);
$our_people_cta_panel_button_link = get_field('our_people_cta_panel_button_link',$term);
?>
<section class="cta">
	<div class="container">
		<div class="cta-main flex">
		  	<div class="cta-left">
			  	<div class="section-head">
				    <?php if(!empty($our_people_cta_panel_icon)){ ?>	
	              			<div class="sh-icon"> 
	              				<img src="<?php echo $our_people_cta_panel_icon['url'];  ?>" alt="<?php echo $our_people_cta_panel_icon['alt'];  ?>"> 
	              			</div>
	              	<?php } ?>
                <div class="sh-title"><span><?php echo $our_people_cta_panel_sub_heading;  ?></span></div>
            </div><!-- end of sectionhead -->
            <?php if(!empty($our_people_cta_panel_heading)){ ?>
				<h2><?php echo $our_people_cta_panel_heading;  ?></h2>
			<?php } ?>
			<?php echo $our_people_cta_panel_description;  ?>
			<?php if(!empty($our_people_cta_panel_button_text & $our_people_cta_panel_button_link)){ ?>
			  		<a href="<?php echo $our_people_cta_panel_button_link; ?>" class="button">
			  			<?php echo $our_people_cta_panel_button_text;  ?>
			  		</a>
			<?php } ?>
			</div>
			<?php if(!empty($our_people_cta_panel_image)){ ?>
		   		<div class="cta-right">
			  		<div class="cta-image">
			   			<div class="desktop"><img src="<?php echo $our_people_cta_panel_image['url']; ?>" alt="<?php echo $our_people_cta_panel_image['alt']; ?>"></div>
                        <div class="tablet"><img src="<?php echo $our_people_cta_panel_image['url']; ?>" alt="<?php echo $our_people_cta_panel_image['alt']; ?>"></div>
                        <div class="mobile"><img src="<?php echo $our_people_cta_panel_image['url']; ?>" alt="<?php echo $our_people_cta_panel_image['alt']; ?>">
                    </div>
				</div>
			  </div>
			<?php } ?>
		</div><!-- end of cta main -->
    </div>
</section><!-- end of cta -->
<script type="text/javascript">
  
   var url = window.location.href;
function removeURLParameter(url, parameter) {
    //prefer to use l.search if you have a location/link object
    var urlparts= url.split('?');   
    if (urlparts.length>=2) {

        var prefix= encodeURIComponent(parameter)+'=';
        var pars= urlparts[1].split(/[&;]/g);

        //reverse iteration as may be destructive
        for (var i= pars.length; i-- > 0;) {    
            //idiom for string.startsWith
            if (pars[i].lastIndexOf(prefix, 0) !== -1) {  
                pars.splice(i, 1);
            }
        }

        url= urlparts[0]+'?'+pars.join('&');
        return url;
    } else {
        return url;
    }
}
    jQuery('#position_close').on('click', function() {
        new_url = removeURLParameter(url, 'position');
        window.location.href = new_url;
    });

    jQuery('#practice_close').on('click', function() {
        new_url = removeURLParameter(url, 'practice');
        window.location.href = new_url;
    });

    jQuery('#role_close').on('click', function() {
        new_url = removeURLParameter(url, 'role');
        window.location.href = new_url;
    });

    jQuery('#office_close').on('click', function() {
        new_url = removeURLParameter(url, 'office');
        window.location.href = new_url;
    });

    jQuery('#second_role_close').on('click', function() {
        new_url = removeURLParameter(url, 'second_role');
        window.location.href = new_url;
    });

</script>
<?php get_footer(); ?>