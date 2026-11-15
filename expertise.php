<?php
/*
Template Name: Expertise page Template
*/
get_header();

echo get_the_banner($post ->ID); 

$expertise_top_section_icon 					= get_field('expertise_top_section_icon');
$expertise_top_section_sub_heading 				= get_field('expertise_top_section_sub_heading');
$expertise_top_section_sub_heading_description 	= get_field('expertise_top_section_sub_heading_description');
$expertise_top_section_continued_content 		= get_field('expertise_top_section_continued_content');
$expertise_bottom_section						= get_field('expertise_bottom_section');
if(empty($expertise_top_section_icon)){ 
	$no_icon_class = "no-icon";
}else{
	$no_icon_class = "";
}
?>
<section class="template-content-main">
	<div class="container">
		<div class="template-inner-main">
			<div class="template-content-inner">
				<?php if(!empty($expertise_top_section_icon || $expertise_top_section_sub_heading)){ ?>
					<div class="section-head <?php echo $no_icon_class; ?>">
						<?php if(!empty($expertise_top_section_icon)){ ?>
		                		<div class="sh-icon"> 
		              	   			<img src="<?php echo $expertise_top_section_icon['url'];?>" alt="<?php echo $expertise_top_section_icon['alt'];?>" title="<?php echo $expertise_top_section_icon['title'];?>"> 
		              			</div>
			            <?php } ?>

						<?php if(!empty($expertise_top_section_sub_heading)){ ?>
							<div class="sh-title">
								<h2><?php echo $expertise_top_section_sub_heading; ?></h2>
							</div>
						<?php } ?>
					</div>
				<?php } if(!empty($expertise_top_section_sub_heading_description)){
						echo '<span class="bigger-text">'.$expertise_top_section_sub_heading_description.'</span>'; 
				} if(!empty($expertise_top_section_continued_content)){
					echo $expertise_top_section_continued_content; 
				} ?>

			</div>
		</div>
	</div>
</section>
    
<?php echo get_the_testimonial($post->ID); ?>
<?php if(!empty($expertise_bottom_section)){ ?>
<section class="template-content-main">
	<div class="container">
		<div class="template-inner-main">
			<div class="template-content-inner">
				<?php 
				 if(!empty($expertise_bottom_section)){
					echo $expertise_bottom_section; 
				} ?>
				<span class="foster-icon">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/foster-icon.png" alt="Fosters Law" title="Fosters Law"/>
				</span>
			</div>
		</div>
	</div>
</section>
<?php
}
get_the_faq();

echo get_the_cta_panel($post->ID, 'form');
echo get_the_featured_insights($post->ID);	  
get_footer(); 
?>