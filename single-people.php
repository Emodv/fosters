<?php get_header(); 
$our_people_banner_desktop_image = get_field('our_people_banner_desktop_image');
$our_people_first_name = get_field('our_people_first_name');
$our_people_last_name = get_field('our_people_last_name');
$our_people_position_title = get_field('our_people_position_title');
$our_people_email = get_field('our_people_email');
$our_people_phone_number = get_field('our_people_phone_number');
$our_people_location = get_field('our_people_location');
$current_people_id = $post->ID;
?>
<section class="people-profile-banner">
    <div class="container">
		<div class="people-profile-main flex">
		  	<div class="people-profile-left">
				<h1><?php echo get_the_title($current_people_id); ?></h1>
				<?php if(!empty($our_people_position_title)){?>
			  		<span class="profile-position"><?php echo $our_people_position_title; ?></span>
			  	<?php } ?>
			  	<div class="profile-details">
			  		<?php if(!empty($our_people_email)){?>
                   		 	<span class="lrow flex-vcenter">
                   		 		<img src="<?php echo get_stylesheet_directory_uri();?>/images/envelope.png" alt="envelope" title="envelope"><a href="mailto:<?php echo $our_people_email; ?>"><?php echo $our_people_email; ?></a>
                   		 	</span>
                    <?php }  if(!empty($our_people_phone_number)){?>	
					<span class="lrow flex-vcenter"><a href="tel:<?php echo $our_people_phone_number; ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/images/phone.png" alt="Phone" title="Phone"><?php echo $our_people_phone_number; ?></a></span>
				    <?php }if(!empty($our_people_location)){ ?>
						<span class="lrow flex-vcenter"><img src="<?php echo get_stylesheet_directory_uri();?>/images/location.png" alt="Location" title="Location"><?php echo $our_people_location; ?></span>
				    <?php } ?>
                </div>
                <?php if(!empty($our_people_email)){?>
			  			<a href="mailto:<?php echo $our_people_email; ?>" class="button">Email <?php echo $our_people_first_name; ?></a>
			  	<?php } ?>
			</div>
			<?php if(!empty($our_people_banner_desktop_image)){?>
				<div class="people-profile-right">
					<div class="profile-thumb">
						<img src="<?php echo $our_people_banner_desktop_image['url'];  ?>" alt="<?php echo $our_people_banner_desktop_image['alt'];  ?>"/> 
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php $our_people_sub_heading = get_field('our_people_sub_heading');
$our_people_description = get_field('our_people_description');
$our_people_continued_content = get_field('our_people_continued_content');
?>
<section class="template-sidebar-main">
	<div class="container">
		<div class="template-sidebar">
			<div class="inner-content">
			    <?php if(!empty($our_people_sub_heading)){ ?>	
			  		<h2><?php echo $our_people_sub_heading; ?></h2>
                <?php } ?>
			</div>
			<div class="template-content flex">
				<div class="template-sidebar-left">
					<?php if(!empty($our_people_description)){ ?>
							<span class="bigger-text"><?php echo $our_people_description; ?></span>
					<?php } ?>
					<?php if(!empty($our_people_continued_content)){ 
					    echo $our_people_continued_content;
					} ?>
				</div>
			   
				
		  		<aside class="template-sidebar-right">
		  			<?php 
		  				$cid = 7; 
						$args = array(
	       					'post_type' => 'people',
	       					'cat' => $cid,
	        				'orderby' => 'menu_order',
	        				'order' => 'ASC',
	        				'posts_per_page' => -1,
						); 
						$partnerpeople = get_posts( $args );
		  				get_the_sidebar_blocks($cid, $partnerpeople);
			 	   
				 	    $cid = 19; // Lawyers
				  		$args = array(
	       					'post_type' => 'people',
	       					'cat' => $cid,
	        				'orderby' => 'menu_order',
	        				'order' => 'ASC',
	        				'posts_per_page' => -1,
						); 
						$lawyerpeople = get_posts( $args );
						get_the_sidebar_blocks($cid, $lawyerpeople);

						$cid = 8; // PC
				  		$args = array(
	       					'post_type' => 'people',
	       					'cat' => $cid,
	        				'orderby' => 'menu_order',
	        				'order' => 'ASC',
	        				'posts_per_page' => -1,
						); 
						$pcpeople = get_posts( $args );
						get_the_sidebar_blocks($cid, $pcpeople);

						$cid = 5;
						$args = array(
	       					'post_type' => 'people',
	       					'cat' => $cid,
	        				'orderby' => 'menu_order',
	        				'order' => 'ASC',
	        				'posts_per_page' => -1,
						); 
						$adminpeople = get_posts( $args );
						get_the_sidebar_blocks($cid, $adminpeople);
					?>
		  		</aside>
		</div><!-- end of tempalte content -->
	</div>
	</div>
</section><!-- end of template sidebar -->

<?php  get_footer(); ?>