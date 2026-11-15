<?php 
/* 
Template Name: Thank You Page Template
*/
get_header();
$thankyou_page_desktop_icon   = get_field('thankyou_page_desktop_icon');
$thankyou_page_tablet_icon    = get_field('thankyou_page_tablet_icon');
$thankyou_page_mobile_icon    = get_field('thankyou_page_mobile_icon');
$thankyou_page_tablet_icon = $thankyou_page_tablet_icon ? $thankyou_page_tablet_icon : $thankyou_page_desktop_icon;
$thankyou_page_mobile_icon = $thankyou_page_mobile_icon ? $thankyou_page_mobile_icon :$thankyou_page_desktop_icon;
$thankyou_page_sub_heading = get_field('thankyou_page_sub_heading');
$thankyou_page_heading     = get_field('thankyou_page_heading');
$thankyou_page_description = get_field('thankyou_page_description');
if(!empty($thankyou_page_heading || $thankyou_page_description)){?>
<section class="thankyou-container">
    <div class="container">
        <div class="thankyou-main flex">
        	<?php if(!empty($thankyou_page_heading || $thankyou_page_description)){?>
            <div class="thankyou-lt">
            	<?php if(!empty($thankyou_page_sub_heading)){?>
						<small><?php echo $thankyou_page_sub_heading;  ?></small>
				<?php } if(!empty($thankyou_page_heading)){?>
                		<h1><?php echo $thankyou_page_heading;  ?></h1>
                <?php } if(!empty($thankyou_page_description)){ ?>
                <hr>
               <?php echo $thankyou_page_description; } ?>             
            </div>
            <?php } if(!empty($thankyou_page_desktop_icon)){?>
			<div class="thankyou-rt">
				<span class="desktop"><img src="<?php echo $thankyou_page_desktop_icon['url']; ?>" alt="<?php echo $thankyou_page_desktop_icon['alt']; ?>" title="<?php echo $thankyou_page_desktop_icon['title']; ?>"></span> 
				<span class="tablet"><img src="<?php echo $thankyou_page_tablet_icon['url']; ?>" alt="<?php echo $thankyou_page_tablet_icon['alt']; ?>" title="<?php echo $thankyou_page_tablet_icon['title']; ?>"></span> 
				<span class="mobile"><img src="<?php echo $thankyou_page_mobile_icon['url']; ?>" alt="<?php echo $thankyou_page_mobile_icon['alt']; ?>" title="<?php echo $thankyou_page_mobile_icon['title']; ?>"></span>
			</div>
		    <?php } ?>
            </div>
            <!-- end of thankyou main --> 
          </div>
</section>
<?php  } 
echo get_the_featured_insights(93); ?>
<?php get_footer(); ?>