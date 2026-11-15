<?php
get_header();
//feature
global $post;
$featureimage          = get_the_post_thumbnail_url($post->ID);
$insight_desktop_image = get_field('insight_desktop_image');
$hero_banner           = $insight_desktop_image['url'];
if(!empty($featureimage)){
    $fid = $post->ID ? $post->ID : 0;
	if(!empty($fid )){
		$featureimage = get_the_post_thumbnail_url($fid);
		$thumbnail_id = get_post_thumbnail_id( $fid);
		$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 

		$desktop_img = $featureimage; 
		$tablet_img = $featureimage; 
		$tablet_img = $tablet_img ? $tablet_img : $desktop_img;
		$mobile_img = $featureimage;
		$mobile_img = $mobile_img ? $mobile_img : $desktop_img;
		$desktop_img_alt = $alt;
		$tablet_img_alt = $alt;
		$tablet_img_alt = $tablet_img_alt ? $tablet_img_alt : $desktop_img_alt;
		$mobile_img_alt = $alt;
		$mobile_img_alt = $mobile_img_alt ? $mobile_img_alt  : $desktop_img_alt;
	}
} if(!empty($hero_banner)){

//page banner
$insight_desktop_image = get_field('insight_desktop_image');
$insight_tablet_image  = get_field('insight_tablet_image');
$insight_mobile_image  = get_field('insight_mobile_image');


$desktop_img = $insight_desktop_image['url']; 
$tablet_img  = $insight_tablet_image['url'];
$tablet_img  = $tablet_img ? $tablet_img : $desktop_img;
$mobile_img  = $insight_mobile_image['url'];
$mobile_img  = $mobile_img  ? $mobile_img  :  $desktop_img;

$desktop_img_alt = $insight_desktop_image['alt'];
$tablet_img_alt  = $insight_tablet_image['alt'];
$tablet_img_alt = $tablet_img_alt ? $tablet_img_alt : $desktop_img_alt;
$mobile_img_alt  = $insight_mobile_image['alt'];
$mobile_img_alt = $mobile_img_alt ? $mobile_img_alt : $mobile_img_alt;

}//Default banner
if(empty($insight_desktop_image) && empty($featureimage)){
	$cid = 2;
	$formatcatid = 'category_'.$cid;
	$insight_desktop_image = get_field('insight_desktop_image',$formatcatid);
	$insight_tablet_image  = get_field('insight_tablet_image',$formatcatid);
    $insight_mobile_image  = get_field('insight_mobile_image',$formatcatid);

	$insight_tablet_image = $insight_tablet_image ? $insight_tablet_image : $insight_desktop_image;
    $insight_mobile_image = $insight_mobile_image ? $insight_mobile_image : $insight_desktop_image;
}




$short_description = get_field('short_description');

$insight_categories         = get_the_category($post->ID);
$insight_separator          = ', ';
$insight_output             = '';
if($insight_categories){
    foreach($insight_categories as $insight_category) {
        if($insight_category->name !== 'Insights'){
            $insight_output .= '<a href="'.get_category_link( $insight_category->term_id ).'" title="' . esc_attr( sprintf( __( "View all insight in %s" ), $insight_category->name ) ) . '">'.$insight_category->cat_name.'</a>'.$insight_separator;
        }
    }
$icat = trim($insight_output, $insight_separator);
}
$insight_button_text = get_field('insight_button_text');
$insight_button_link  = get_field('insight_button_link');
?>
<section class="hero_banner_section">
    <div class="container">
      	<div class="banner-main flex flex-vcenter">
	        <div class="banner-txt">
	            <?php if(!empty($icat)){ ?>
	           		<small><?php echo $icat; ?></small>
	           	<?php } ?>
			   <h1><?php echo get_the_title(); ?></h1>
			    <?php if(!empty($short_description)){
					echo '<hr/><p>'. $short_description.'</p>';
				} ?>
			<?php if(!empty($insight_button_text && $insight_button_link)){ ?>
				<a href="<?php echo $insight_button_link; ?>" class="button"><?php echo $insight_button_text; ?></a>
			<?php } ?>
	        </div>
	        
		    <div class="banner-right">
	          	<div class="banner-img"> 
	          		<span class="desktop"><img src="<?php echo $desktop_img; ?>" alt="<?php echo $desktop_img_alt; ?>"></span> 
	          		<span class="tablet"><img src="<?php echo $tablet_img; ?>" alt="<?php echo $tablet_img_alt; ?>"></span>
	          		<span class="mobile"><img src="<?php echo $mobile_img; ?>" alt="<?php echo $mobile_img_alt; ?>"></span> 
	          	</div>
		    </div>
            
        </div>
    </div>
    <div class="clearfix"></div>
</section>
<?php 
    $insight_author          = get_field('insight_author');
	if(!empty($insight_author)){
	$authorid                  = $insight_author[0]->ID;
	$our_people_image          = get_field('our_people_image', $authorid);
	$our_people_position_title = get_field('our_people_position_title',$authorid);
	$our_people_description    = get_field('our_people_description', $authorid);
	$our_people_first_name     = get_field('our_people_first_name',$authorid);
	}
?>
<section class="template-single-main">
    <div class="container">
		<div class="template-sm">
		<aside class="sidebar-social">
            <div class="fixed-social-icons">
                <span class="share-text">Share</span> 
                <div class="sharethis-inline-share-buttons"></div>
				<div class="inline-phone-icon">
					<a href="<?php echo get_permalink(21); ?>"><i class="fa-solid fa-phone"></i></a>
				</div>
            </div>
        </aside>
    
	    <div class="template-single-inner">
	        <div class="template-single-content">
		        <?php  while ( have_posts() ) : the_post();
								 the_content();
				endwhile;  wp_reset_postdata();	?>
				<?php echo get_the_faq(); ?>
				<span class="foster-icon">
			  		<img src="<?php echo get_stylesheet_directory_uri().'/images/foster-icon.png'; ?>" alt="Foster Icon" title="Foster Icon"/> 
			  	</span>
				<?php if(!empty($authorid)){ ?>
				<section class="author-wrapper-section">
				<div class="author-wrapper flex flex-vcenter">
					<?php if(!empty($our_people_image)){ ?>
					<figure class="author-img">
						<a href="<?php echo get_the_permalink($authorid); ?>">
							<img src="<?php echo $our_people_image['url']; ?>" alt="<?php echo $our_people_image['alt']; ?>">
						</a>
					</figure>
					<?php } ?>
					<div class="author-profile">
						<?php echo '<h3><a class="" href="'.get_the_permalink($authorid).'">'.get_the_title($authorid).'</a></h3>'; 
						if(!empty($our_people_position_title)){
							echo'<span class="optional-text">'.$our_people_position_title.'</span>';
						}if(!empty($our_people_description)){
							echo'<p>'.$our_people_description.'</p>';
						} ?>
						<a class="button" href="<?php echo get_the_permalink($authorid); ?>">Contact <?php echo $our_people_first_name; ?></a>
			        </div>
			    </div>
					</section>
				<?php } ?>
			</div>
		</div>
	</div>
		</div>
</section>
<?php
$featured_insight_heading = get_field('featured_insight_heading');
if(empty($featured_insight_heading)){
	$featured_insight_heading ="Related Insights";
}
$featured_insights = get_field('featured_insights');
if(empty($featured_insights)){
$featured_insights = get_posts( array(
        'posts_per_page' => 3,
        'category'       => 2,
        'orderby'        => 'date',
        'order'          => 'DESC',
		'exclude'        => array($post->ID)
    ) );
}
if(!empty($featured_insights)){?>	  
<section class="feature-insights">
	<div class="container">
		<div class="feature-insights-main">
			<?php if( ! empty( $featured_insight_heading )){ ?>
				    <div class="heading-title flex flex-vcenter">
					  	<div class="heading-left"><h3><?php echo $featured_insight_heading;  ?></h3></div>
					  	<div class="heading-right hide-mobile"><a href="<?php echo get_category_link(2); ?>" class="button">More Insights</a></div>
					</div><!-- end of headign title -->
			<?php } ?>  
			<div class="feature-insights-lists flex">
				<?php foreach ( $featured_insights as $post ) : setup_postdata( $post );
					   	$thumb = get_the_post_thumbnail_url($post->ID); 
						$insight_categories         = get_the_category($post->ID);
						$insight_separator          = ', ';
						$insight_output             = '';
						if($insight_categories){
							foreach($insight_categories as $insight_category) {
								if($insight_category->name !== 'Insights'){
									$insight_output .= '<a href="'.get_category_link( $insight_category->term_id ).'" title="' . esc_attr( sprintf( __( "View all insight in %s" ), $insight_category->name ) ) . '">'.$insight_category->cat_name.'</a>'.$insight_separator;
								}
							}
							$icat = trim($insight_output, $insight_separator);
						}?>
			  			<div class="feature-lists">
							<div class="thumbnail">
				  			<a href="<?php echo get_the_permalink($post->ID); ?>">
					  			<img src="<?php echo $thumb; ?>" alt="Feature Insights Post"/></a></div>
				  				<span class="feature-icon flex flex-vcenter">
									<img src="<?php echo get_stylesheet_directory_uri();?>/images/category-icon.png" alt="Newspaper" title="Newspaper">
									<?php echo $icat; ?>
								</span>
				  			    <h3><a href="<?php echo get_the_permalink($post->ID); ?>"><?php echo get_the_title(); ?></a></h3>
				  		</div>
				<?php endforeach; wp_reset_postdata(); ?>
			</div><!-- end of feature-insights-lists -->
			  <div class="show-mobile hide-desktop">
			  <a href="<?php echo get_category_link(2); ?>" class="button">More Insights</a>
			  </div>
		  </div><!-- end of feature insights inner -->
		  </div>
</section><!-- end of feature insights -->

<?php } ?>

<?php get_footer();