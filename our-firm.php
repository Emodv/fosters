<?php
/*
Template Name: Our Firm Template
*/
get_header();

$our_firm_page_introduction_heading 	= get_field('our_firm_page_introduction_heading');
$our_firm_page_introduction_description = get_field('our_firm_page_introduction_description');
$our_firm_page_introduction_button_text = get_field('our_firm_page_introduction_button_text');
$our_firm_page_introduction_button_link = get_field('our_firm_page_introduction_button_link');

$our_firm_page_careers_icon 			= get_field('our_firm_page_careers_icon');
$our_firm_page_careers_sub_heading 		= get_field('our_firm_page_careers_sub_heading');
$our_firm_page_careers_heading 			= get_field('our_firm_page_careers_heading');
$our_firm_page_careers_description 		= get_field('our_firm_page_careers_description');
$our_firm_page_careers_button_text 		= get_field('our_firm_page_careers_button_text');
$our_firm_page_careers_button_link 		= get_field('our_firm_page_careers_button_link');
$our_firm_page_careers_desktop_img 		= get_field('our_firm_page_careers_desktop_img');
$our_firm_page_careers_tablet_img   	= get_field('our_firm_page_careers_tablet_img');
$our_firm_page_careers_mobile_img 		= get_field('our_firm_page_careers_mobile_img');

$our_firm_page_careers_tablet_img		= $our_firm_page_careers_tablet_img ? $our_firm_page_careers_tablet_img : $our_firm_page_careers_desktop_img;
$our_firm_page_careers_mobile_img		= $our_firm_page_careers_mobile_img ? $our_firm_page_careers_mobile_img : $our_firm_page_careers_desktop_img;
?>

<?php echo get_the_banner($post ->ID); ?>

<section class="intro">
	<div class="container">
		<div class="intro-cnt flex">
			<?php if(!empty($our_firm_page_introduction_heading || $our_firm_page_introduction_button_text)){ ?>
				<div class="intro-lt">
					<?php if(!empty($our_firm_page_introduction_heading)){ ?>
						<h2><?php echo $our_firm_page_introduction_heading; ?></h2>
					<?php } ?>
					<?php if(!empty($our_firm_page_introduction_button_text)){?>
						<a href="<?php echo $our_firm_page_introduction_button_link; ?>" class="button"><?php echo $our_firm_page_introduction_button_text; ?></a> 
					<?php } ?>
				</div>
			<?php } if(!empty($our_firm_page_introduction_description)){?>
				<div class="intro-rt">
					<?php echo $our_firm_page_introduction_description; ?>
				</div>
			<?php } ?>
		</div>

		<?php echo get_the_practices($post->ID); ?>

	</div>
</section>

<?php echo get_the_people($post->ID); ?>
<?php echo get_the_cta_panel($post->ID, 'form'); ?>
  
<section class="cta lt-img">
	<div class="container">
		<div class="cta-main flex">
			<?php if(!empty($our_firm_page_careers_desktop_img)){ ?>
				 	<div class="cta-left">
					    <div class="cta-image">
					    	<div class="desktop">
						   		<img src="<?php echo $our_firm_page_careers_desktop_img['url']; ?>" alt="<?php echo $our_firm_page_careers_desktop_img['alt']; ?>" title="<?php echo $our_firm_page_careers_desktop_img['title']; ?>">
						   	</div>
		                	<div class="tablet">
		                		<img src="<?php echo $our_firm_page_careers_tablet_img['url']; ?>" alt="<?php echo $our_firm_page_careers_tablet_img['alt']; ?>" title="<?php echo $our_firm_page_careers_tablet_img['title']; ?>">
		                	</div>
		                	<div class="mobile">
		                		<img src="<?php echo $our_firm_page_careers_mobile_img['url']; ?>" alt="<?php echo $our_firm_page_careers_mobile_img['alt']; ?>" title="<?php echo $our_firm_page_careers_mobile_img['title']; ?>">
		                	</div>
						</div>
					</div>
            <?php } ?>

			<div class="cta-right">
				<div class="section-head">
					<?php if(!empty($our_firm_page_careers_icon)){ ?>
						<div class="sh-icon"><img src="<?php echo $our_firm_page_careers_icon['url']; ?>" alt="<?php echo $our_firm_page_careers_icon['alt']; ?>" title="<?php echo $our_firm_page_careers_icon['title']; ?>"></div>
					<?php } ?>

					<?php if(!empty($our_firm_page_careers_sub_heading)){?>
						<div class="sh-title"><span><?php echo $our_firm_page_careers_sub_heading; ?></span></div>
					<?php } ?>
				</div>

				<?php if(!empty($our_firm_page_careers_heading)){?>
					<h2><?php echo $our_firm_page_careers_heading; ?></h2>
				<?php } ?>
				<?php echo $our_firm_page_careers_description; ?>
				<?php if(!empty($our_firm_page_careers_button_text)){?>
					<a href="<?php echo $our_firm_page_careers_button_link; ?>" class="button"><?php echo $our_firm_page_careers_button_text; ?></a> 
				<?php } ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>