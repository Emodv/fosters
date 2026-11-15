<?php
/*
Template Name: Home Page Template
*/
get_header();
?>
<?php
$home_banner_desktop_image 	= get_field( 'home_banner_desktop_image');
$home_banner_tablet_image  	= get_field( 'home_banner_tablet_image');
$home_banner_mobile_image  	= get_field( 'home_banner_mobile_image');
$home_banner_heading       	= get_field( 'home_banner_heading');
$home_banner_description   	= get_field( 'home_banner_description');
$home_banner_button_text   	= get_field( 'home_banner_button_text');
$home_banner_button_link   	= get_field('home_banner_button_link');
$home_banner_tablet_image  	= $home_banner_tablet_image  ? $home_banner_tablet_image : $home_banner_desktop_image;
$home_banner_mobile_image 	= $home_banner_mobile_image ? $home_banner_mobile_image : $home_banner_desktop_image;

if(!empty($home_banner_heading)){ ?>
	<section class="hero_banner_section">
		<?php if(!empty($home_banner_heading)){ ?>
	  		<div class="desktop background"><img src="<?php echo $home_banner_desktop_image['url']; ?>" alt="<?php echo $home_banner_desktop_image['alt']; ?>" title="<?php echo $home_banner_desktop_image['title']; ?>"></div>
	  		<div class="tablet background"><img src="<?php echo $home_banner_tablet_image['url']; ?>" alt="<?php echo $home_banner_tablet_image['alt']; ?>" title="<?php echo $home_banner_tablet_image['title']; ?>"></div>
	  		<div class="mobile background"><img src="<?php echo $home_banner_mobile_image['url']; ?>" alt="<?php echo $home_banner_mobile_image['alt']; ?>" title="<?php echo $home_banner_mobile_image['title']; ?>"></div>
	    <?php } if(!empty($home_banner_heading || $home_banner_description)){ ?>
			<div class="container">
		        <div class="banner-main flex flex-vcenter">
		          	<div class="banner-txt">
			          	<?php if(!empty($home_banner_heading)){ ?>
			          		    <div class="banner-txt-lt">
			            			<h1><?php echo $home_banner_heading; ?></h1>
			            	   	</div>
			            		
			            <?php } if(!empty($home_banner_description)){ ?>
			            	<div class="banner-txt-rt">
			            	 	<hr>
			            		<?php echo $home_banner_description; 
			            		} if(!empty($home_banner_button_text & $home_banner_button_link)){ ?>
			            		<a href="<?php echo $home_banner_button_link; ?>" class="button"><?php echo $home_banner_button_text; ?></a>
			            	</div>
			            <?php } ?>
		            </div>
		        </div>
  			</div>
  			<div class="clearfix"></div>
	    <?php } ?>
	</section>
<?php } 
$home_expertise_icon 		= get_field( 'home_expertise_icon');
$home_expertise_sub_heading	= get_field( 'home_expertise_sub_heading');
$home_expertise_heading 	= get_field( 'home_expertise_heading');
$home_expertise_description	= get_field( 'home_expertise_description');
$home_expertise_icon 		= get_field( 'home_expertise_icon');
$home_expertise_icon 		= get_field( 'home_expertise_icon');
?>   
<section class="expertise">
    <div class="container">
	    <?php echo get_the_practices($post->ID); ?>
        <div class="expertise-main flex">
		  
      		<div class="expertise-left">
	            <div class="section-head">
	            	<?php if(!empty($home_expertise_icon)){?>
	              		<div class="sh-icon"> 
	              			<img src="<?php echo $home_expertise_icon['url']; ?>" alt="<?php echo $home_expertise_icon['alt']; ?>" title="<?php echo $home_expertise_icon['title']; ?>"> 
	              		</div>
	              	<?php } if(!empty($home_expertise_sub_heading)){?>
	              				<div class="sh-title"><span><?php echo $home_expertise_sub_heading; ?></span></div>
	              	<?php } ?>
	            </div><!-- end of sectionhead -->
	            <?php if(!empty($home_expertise_heading)){ ?>		
	           		 <h2><?php echo $home_expertise_heading;  ?></h2>
	           	<?php } if(!empty($home_expertise_description)){ 
	           			echo $home_expertise_description;
	           	} ?>
      		</div><!-- end of expertise left -->
      		<?php if( have_rows('home_expertise_features_details') ):	 ?>
		            <div class="expertise-right">
			            <div class="statistics flex">
							<?php  while( have_rows( 'home_expertise_features_details') ):the_row();
									$home_expertise_features_icon = get_sub_field( 'home_expertise_features_icon');
									$home_expertise_features_number = get_sub_field( 'home_expertise_features_number');
									$home_expertise_features_decription = get_sub_field( 'home_expertise_features_decription');
								if(!empty($home_expertise_features_icon || $home_expertise_features_number || $home_expertise_features_decription)){ ?>	
			              			<div class="statistics-grid">
			                			<div class="stat-top flex">
			                				<?php if(!empty($home_expertise_features_icon)){ ?>
			                				<span class="stat-icon"><img src="<?php echo $home_expertise_features_icon['url']; ?>" alt="<?php echo $home_expertise_features_icon['alt']; ?>" title="<?php echo $home_expertise_features_icon['title']; ?>"/></span> 
			                			    <?php } if(!empty($home_expertise_features_number)){  ?>
			                						<span class="stat-number"><?php echo $home_expertise_features_number;  ?></span>
			                			</div>
			                			<?php } if(!empty($home_expertise_features_decription)){
			                					echo $home_expertise_features_decription;
			                			} ?>
			                		</div>    
			              		<?php  } ?>
			                <?php endwhile; ?>
			            </div>
		            </div>
			<?php endif; ?>

      	</div>
       
    </div>
</section>
<?php
echo get_the_video_cta_panel();
echo get_the_people($post->ID);
echo get_the_cta_panel($post->ID, 'image');
echo get_the_testimonial($post->ID); 
get_the_faq();
echo get_the_cta_panel($post->ID, 'form');
echo get_the_featured_insights($post->ID);
get_footer(); ?>