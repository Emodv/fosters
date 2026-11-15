<?php 
/* 
Template Name: Standalone Page Template
*/
get_header();
$default_banner_desktop_image       = get_field('default_banner_desktop_image', $postpageid);
$default_banner_tablet_image        = get_field('default_banner_tablet_image', $postpageid);
$default_banner_mobile_image        = get_field('default_banner_mobile_image', $postpageid);
$default_banner_heading             = get_field('default_banner_heading', $postpageid);
$default_banner_subheading          = get_field('default_banner_subheading', $postpageid);
$default_banner_description         = get_field('default_banner_description', $postpageid);
$default_banner_button_text         = get_field('default_banner_button_text', $postpageid);
$default_banner_button_link         = get_field('default_banner_button_link', $postpageid);
$banner                             = "";
$default_banner_heading             = $default_banner_heading ? $default_banner_heading : get_the_title();
$default_banner_tablet_image        = $default_banner_tablet_image  ? $default_banner_tablet_image : $default_banner_desktop_image;
$default_banner_mobile_image        = $default_banner_mobile_image ? $default_banner_mobile_image : $default_banner_desktop_image;
$default_banner_link_option         = get_field('default_banner_link_option');
if($default_banner_link_option  == "url"){
	$default_banner_button_link = get_field('default_banner_button_link');
}
if($default_banner_link_option  == "email"){
	$default_banner_button_link = get_field('default_banner_email_address');
}
if($default_banner_link_option  == "scroll"){
	$default_banner_button_link = get_field('default_banner_scroll_id');
}


if(!empty($default_banner_heading)){ ?>
	<section class="hero_banner_section">
		<?php if(!empty($default_banner_desktop_image)){ ?>
	  		<div class="desktop background"><img src="<?php echo $default_banner_desktop_image['url']; ?>" alt="<?php echo $default_banner_desktop_image['alt']; ?>" title="<?php echo $home_banner_desktop_image['title']; ?>"></div>
	  		<div class="tablet background"><img src="<?php echo $default_banner_desktop_image['url']; ?>" alt="<?php echo $default_banner_desktop_image['alt']; ?>" title="<?php echo $home_banner_tablet_image['title']; ?>"></div>
	  		<div class="mobile background"><img src="<?php echo $default_banner_mobile_image['url']; ?>" alt="<?php echo $default_banner_mobile_image['alt']; ?>" title="<?php echo $home_banner_mobile_image['title']; ?>"></div>
	    <?php } if(!empty($default_banner_heading  || $default_banner_description )){ ?>
			<div class="container">
		        <div class="banner-main flex flex-vcenter">
		          	<div class="banner-txt">
			          	<?php if(!empty($default_banner_heading)){ ?>
			          		    <div class="banner-txt-lt">
			            			<h1><?php echo $default_banner_heading; ?></h1>
			            	   	</div>			            		
			            <?php } if(!empty($default_banner_description)){ ?>
			            		<div class="banner-txt-rt">
									<hr>
									<?php 
									if(!empty($default_banner_description)){ 
										echo $default_banner_description; 
									} 
									if($default_banner_link_option  == "url"){
										if(!empty($default_banner_button_text & $default_banner_button_link)){ ?>
											<a href="<?php echo $default_banner_button_link; ?>" class="button"><?php echo $default_banner_button_text; ?></a>
										<?php } 
									} if($default_banner_link_option  == "email"){
										if(!empty($default_banner_button_text & $default_banner_button_link)){ ?>
											<a  href="mailto:<?php echo $default_banner_button_link; ?>" class="button"><?php echo $default_banner_button_text; ?></a>
										<?php } 
									} if($default_banner_link_option  == "scroll"){
										if(!empty($default_banner_button_text & $default_banner_button_link)){ ?>
											<a  href="<?php echo $default_banner_button_link; ?>" class="button"><?php echo $default_banner_button_text; ?></a>
										<?php } 
									} ?>
								</div>
			            <?php } ?>
		            </div>
		        </div>
  			</div>
  			<div class="clearfix"></div>
	    <?php } ?>
	</section>
<?php } 

$standalone_top_section_sub_heading 			= get_field('standalone_top_section_sub_heading');
$standalone_top_section_description 	        = get_field('standalone_top_section_description');
$standalone_top_section_continued_content 		= get_field('standalone_top_section_continued_content');
$standalone_bottom_section_description	        = get_field('standalone_bottom_section_description');

$standalone_action_form_heading 	  = get_field('standalone_action_form_heading');
$standalone_action_form_description   = get_field('standalone_action_form_description');
$standalone_action_form_shortcode     = get_field('standalone_action_form_shortcode');


$standalone_feature_heading     = get_field('standalone_feature_heading');
$standalone_feature_description = get_field('standalone_feature_description');
if(!empty($standalone_action_form_heading ||  $standalone_action_form_description || $standalone_action_form_shortcode )){?>
<div class="actionable-form hide-desktop show-mobile show-tab">
	<?php if(!empty($standalone_action_form_heading)){?>
		<h4><?php echo $standalone_action_form_heading; ?></h4>
	<?php } if(!empty($standalone_action_form_description)){ ?>
		<p><?php echo $standalone_action_form_description; ?></p>
	<?php } ?>
    <?php echo do_shortcode($standalone_action_form_shortcode ); ?>
</div><!-- end of actionable form -->
<?php 
$template_full_with = "";
} else{
	$template_full_with = "full-width";
} 
if(empty($standalone_top_section_sub_heading && $standalone_top_section_description)){
	$no_inner_content = "no-inner-content";
}else{
	$no_inner_content = "";
}
?>
<section class="template-standalone-main <?php echo $template_full_with; ?>">
	<div class="container">
		<div class="template-standalone-content flex">
		  	<div class="template-standalone-left">
				<?php if(!empty($standalone_top_section_sub_heading)){?>
					<div class="inner-content">
						<h2><?php echo $standalone_top_section_sub_heading; ?></h2>
					</div>
           		<?php } if(!empty($standalone_top_section_description)){
						echo $standalone_top_section_description;
				} ?>
				<div class="inner-feature <?php echo $no_inner_content; ?>">
			  	<?php
				if(!empty($standalone_feature_heading )){?>
					<h3><?php echo $standalone_feature_heading; ?></h3>
					<?php } if(!empty($standalone_feature_description)){
							echo $standalone_feature_description;
						} ?>
					</div>
					<?php if( have_rows('features_details') ):	 ?>	
					<div class="features">
						<div class="features-main">
						
							<?php  while( have_rows( 'features_details') ):the_row();
								$feature_icon        = get_sub_field( 'feature_icon');
								$feature_heading     = get_sub_field( 'feature_heading');
								$feature_description = get_sub_field( 'feature_description'); 

							if(!empty($feature_icon || $feature_heading || $feature_description)){	?>
							<div class="features-swrap">
								<div class="features-single">
									<?php if(!empty($feature_icon)){ ?> 
										<div class="features-icon">
											<img src="<?php echo $feature_icon['url']; ?>" alt="<?php echo $feature_icon['alt']; ?>" title="<?php echo $feature_icon['title']; ?>"/>
										</div>
									<?php } if(!empty($feature_heading || $feature_description)){?>
									<div class="features-cnt">
										<?php if(!empty($feature_heading)){?>
												<span class="h4"><?php echo $feature_heading; ?></span>
										<?php } if(!empty($feature_description)){?>
										<span class="hide-mobile">
											<?php echo $feature_description; ?>
										</span>
										<?php } ?>
									</div>
								<?php } ?>
								</div><!-- end of features single -->
								<?php if(!empty($feature_description)){?>
								<span class="hide-desktop hide-tab show-mobile">
									<?php echo $feature_description; ?>
								</span>
								<?php } ?>
							</div>
							<?php } endwhile; ?>
						</div>
					</div><!-- end of featurs -->
					<?php endif; ?>
           		
	        	
		</div><!-- end of template post left -->
		<?php if(!empty($standalone_action_form_heading ||  $standalone_action_form_description || $standalone_action_form_shortcode )){?>
		<aside class="template-standalone-right hide-mobile hide-tab">
		    <div id="sticky-anchored"></div>
		    <div class="side-bucket">
				<div class="sticky-right">
					<div class="actionable-form">
												
						<?php if(!empty($standalone_action_form_heading)){?>
							<span class="h4"><?php echo $standalone_action_form_heading; ?></span>
						<?php } if(!empty($standalone_action_form_description)){?>
							<p><?php echo $standalone_action_form_description; ?></p>
						<?php } ?>
						<?php echo do_shortcode($standalone_action_form_shortcode); ?>
					</div><!-- end of actionable form -->
				</div>
			</div>
		</aside>
		<?php } ?>
		</div><!-- end of tempalte post content -->
		<div id="sticky-stopped"></div>
	</div>
</section>
<?php     
$content_video_image_video  = get_field('content_video_image_video');
if($content_video_image_video == "Video"){ 
	$video_type                 = get_field('video_type');
	if($video_type == "Vimeo"){
		$content_video_id    = get_field('content_video_vimeo_id');
        $content_video_id_url = "https://player.vimeo.com/video/".$content_video_id;
	}elseif($video_type == "Youtube"){
		$content_video_id   =  get_field('content_video_youtube_id');
		$content_video_url  = "https://www.youtube.com/watch?v=".$content_video_id;
	}elseif($video_type == "Custom"){
		$content_video   =  get_field('content_video');
		$content_video_url  = $content_video['url'];
	}
	$content_video_poster_image = get_field('content_video_poster_image');
	$content_video_caption      = get_field('content_video_caption');

}elseif($content_video_image_video == "Image"){
	$content_video_desktop_image  = get_field('content_video_desktop_image');
	$content_video_mobile_image   = get_field('content_video_mobile_image');
	$content_video_caption        = get_field('content_video_caption');
}
if(!empty($content_video_poster_image || $content_video_desktop_image )){?>
<section class="video-section">
	<div class="container">
		<?php if($content_video_image_video == "Video"){ ?>
				<div class="video-caption">
					<div class="video-thumbnail">       
						<?php   
						if(!empty($content_video_poster_image)){ 				

						if($video_type == "Vimeo" && !empty($content_video_url)){?>
                                <div class="play_video_center new_play_button">
                                    <a href="javascript:void(0);" onclick="openVideoPopup('<?php echo $content_video_url; ?>')" class="<?php echo $image_video_popcls;?> play_btn"></a>
                                    </div>
                        <?php }     
                        if($video_type == "Youtube" && !empty($content_video_url)){?>
                            <div class="play_video_center new_play_button">
                                    <a href="javascript:void(0);" onclick="openVideoPopup('<?php echo $content_video_url; ?>')" class="<?php echo $image_video_popcls;?> play_btn"></a>
                                    </div>
                        <?php }
						     
							 if($video_type == "Custom" && !empty($content_video_url)){?>
								<div class="play_video_center new_play_button">
										<a href="javascript:void(0);" onclick="openVideoPopup('<?php echo $content_video_url; ?>')" class="<?php echo $image_video_popcls;?> play_btn"></a>
										</div>
							<?php }
						 ?>                             
                        <img src="<?php echo $content_video_poster_image['url']; ?>" alt="<?php echo $content_video_poster_image['alt']; ?>">
                          

					</div>
					<?php if(!empty($content_video_caption)){ ?>
						<div class="video-caption-text"><p><?php echo $content_video_caption; ?></p></div>
					<?php } } ?>
				</div>
		<?php } if($content_video_image_video == "Image"){ ?>
			   <div class="video-caption">
					<div class="video-thumbnail">       
						<?php   
						if(!empty($content_video_desktop_image)){ ?>
							<picture class="object-fit">
                                <source srcset="<?php echo $content_video_desktop_image['url'];  ?>" media="(min-width: 1024px)">
								<img src="<?php echo $content_video_mobile_image['url']; ?>" alt="<?php echo $content_video_mobile_image ['alt']; ?>"/>
						    </picture>
						
						<?php } ?>
					</div>
					<?php if(!empty($content_video_caption)){ ?>
						<div class="video-caption-text"><p><?php echo $content_video_caption; ?></p></div>
					<?php } ?>
				</div>
		<?php } ?>
	</div>
</section>
<?php
}
echo get_the_testimonial($post->ID);

$our_feature_main_heading = get_field('our_feature_main_heading');
$our_feature_main_description = get_field('our_feature_main_description');

$book_call_heading     = get_field('book_call_heading');
$book_call_notice      = get_field('book_call_notice');
$book_call_button_text = get_field('book_call_button_text');
$book_call_button_link = get_field('book_call_button_link');
if( have_rows('our_features_details') || !empty($book_call_heading & $book_call_notice)){?>
<section class="standalone-our-feature">			
	<div class="container">
		<div class="standalone-our-wrapper">
			<?php if( have_rows('our_features_details') ): ?>
				<div class="standalone-our-feature-intro">
					<?php if(!empty($our_feature_main_heading)){ ?>
						<h3><?php echo $our_feature_main_heading; ?></h3>
						<?php } if(!empty($our_feature_main_description)){
							echo $our_feature_main_description;
						} ?>
				</div>
				<?php if( have_rows('our_features_details') ):	 ?>	
					<div class="standalone-features">
						<div class="standalone-features-main flex">
						
							<?php  while( have_rows( 'our_features_details') ):the_row();
								$feature_icon        = get_sub_field( 'our_feature_icon');
								$feature_heading     = get_sub_field( 'our_feature_heading');
								$feature_description = get_sub_field( 'our_feature_description'); 

							if(!empty($feature_icon || $feature_heading || $feature_description)){	?>
							<div class="standalone-features-swrap">
								<div class="standalone-features-single">
									<?php if(!empty($feature_icon)){ ?> 
										<div class="features-icon">
											<img src="<?php echo $feature_icon['url']; ?>" alt="<?php echo $feature_icon['alt']; ?>" title="<?php echo $feature_icon['title']; ?>"/>
										</div>
										<hr/>
									<?php } if(!empty($feature_heading || $feature_description)){?>
									<div class="standalone-features-cnt">
										<?php if(!empty($feature_heading)){?>
												<span class="h4"><?php echo $feature_heading; ?></span>
										<?php } if(!empty($feature_description)){?>
										<span class="hide-mobile">
											<?php echo $feature_description; ?>
										</span>
										<?php } ?>
									</div>
								<?php } ?>
								</div><!-- end of features single -->
								<?php if(!empty($feature_description)){?>
								<span class="hide-desktop hide-tab show-mobile">
									<?php echo $feature_description; ?>
								</span>
								<?php } ?>
							</div>
							<?php } endwhile; ?>
						</div>
					</div><!-- end of featurs -->
				<?php endif; ?>
				<?php
			endif;

		    if(!empty($book_call_heading & $book_call_notice)){ ?>
				<div class="standalone-bookcall flex flex-center">
					<div class="standalone-bookcall-text">
						<span class="h4"><?php echo $book_call_heading; ?></span>
						<p><?php echo $book_call_notice;  ?></p>
					</div>
					<?php if(!empty($book_call_button_text & $book_call_button_link)){ ?>
						<div class="standalone-bookcall-btn">
							<a href="<?php echo $book_call_button_link; ?>" class="button"><?php echo $book_call_button_text; ?></a>
						</div>
					<?php } ?>
					
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php
}
echo get_the_video_cta_panel_standalone();
get_the_faq();
echo get_the_cta_panel($post->ID, 'form');
get_footer(); 
?>