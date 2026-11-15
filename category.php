<?php
get_header();
$cid = 2;
$formatcatid = 'category_'.$cid;

$featured_in = get_field('featured_insight',$formatcatid);
if(empty($featured_in)){
	$feat_args = array(
	  'numberposts' => 1,
	  'post_type'   => 'post'
	);
	$featured_insight = get_posts( $feat_args );
} else {
	$featured_insight = $featured_in;
}

?>
<?php foreach ( $featured_insight as $post ) : setup_postdata( $post );
		$fid = $post->ID;
		$featured_insight_short_description = get_field('short_description',$fid);
		$insight_desktop_image = get_field('insight_desktop_image',$fid);
		$insight_tablet_image  = get_field('insight_tablet_image',$fid);
		$insight_mobile_image  = get_field('insight_mobile_image',$fid);
		$insight_tablet_image = $insight_tablet_image ? $insight_tablet_image : $insight_desktop_image;
		$insight_mobile_image = $insight_mobile_image ? $insight_mobile_image : $insight_desktop_image;
	  $hero_banner = $insight_desktop_image['url'];

		
?>
<section class="hero_banner_section">
    <div class="container">
      	<div class="banner-main flex flex-vcenter">
	        <?php if(!empty($featured_insight)){ ?>
			        <div class="banner-txt">
					  <small>Featured Insight</small>
			          <h1><a href="<?php the_permalink($fid); ?>"><?php echo get_the_title($fid); ?></a></h1>
			          
			          <?php if(!empty($featured_insight_short_description)){?>
			          	<hr>
			          	<p><?php echo $featured_insight_short_description;  ?></p>
			          <?php } ?>			
						<a href="<?php the_permalink($fid); ?>" class="button">Read More</a>
			        </div>
			<?php }  
				$featureimage = get_the_post_thumbnail_url($fid);
				if(!empty($featureimage)){ 

			  	$featureimage = get_the_post_thumbnail_url($fid);
				$thumbnail_id = get_post_thumbnail_id( $fid);
				$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 

							$desktop_img = $featureimage; 
							$tablet_img = $featureimage; 
							$mobile_img = $featureimage;

							$desktop_img_alt = $alt;
			        $tablet_img_alt = $alt;
			        $mobile_img_alt = $alt;
				 } if(!empty($hero_banner)){ 

				 	$insight_desktop_image = get_field('insight_desktop_image',$fid);
		      $insight_tablet_image  = get_field('insight_tablet_image',$fid);
		      $insight_mobile_image  = get_field('insight_mobile_image',$fid);
		      $insight_tablet_image = $insight_tablet_image ? $insight_tablet_image : $insight_desktop_image;
		      $insight_mobile_image = $insight_mobile_image ? $insight_mobile_image : $insight_desktop_image;

				 		$desktop_img = $insight_desktop_image['url']; 
			      $tablet_img  = $insight_tablet_image['url'];
			      $mobile_img  = $insight_mobile_image['url'];

			    $desktop_img_alt = $insight_desktop_image['alt'];
			    $tablet_img_alt = $insight_tablet_image['alt'];
			    $mobile_img_alt = $insight_mobile_image['alt'];


       } if(empty($hero_banner) &&  empty($featureimage)){
			$insight_desktop_image = get_field('insight_desktop_image',$formatcatid);
			$insight_tablet_image  = get_field('insight_tablet_image',$formatcatid);
			$insight_mobile_image  = get_field('insight_mobile_image',$formatcatid);
			$insight_tablet_image = $insight_tablet_image ? $insight_tablet_image : $insight_desktop_image;
			$insight_mobile_image = $insight_mobile_image ? $insight_mobile_image : $insight_desktop_image;
		
			$desktop_img = $insight_desktop_image['url']; 
			$tablet_img  = $insight_tablet_image['url'];
			$mobile_img  = $insight_mobile_image['url'];

			$desktop_img_alt = $insight_desktop_image['alt'];
			$tablet_img_alt = $insight_tablet_image['alt'];
			$mobile_img_alt = $insight_mobile_image['alt'];


		} ?>

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
<?php endforeach; wp_reset_postdata(); ?>

<?php
if(!isset($_GET['category'])){
  $category = get_category( get_query_var( 'cat' ) );
  $cid = $category->cat_ID;
}else{
  $cid = $_GET['category'];
}
if(isset($_GET['search'])){
      $searchblog = $_GET['search'];
      $search = preg_replace('/[^a-zA-Z0-9_ -]/s','',$searchblog);
      $args = array(
        's' => $search,
        'post_type' => 'post',
        'category' => $cid,
        'post_status' => 'publish',
		 'exclude'    => $fid,
        'posts_per_page' => -1,
        'paged' => 1,
        'orderby' => 'menu_order',
        'order'   => 'DESC',
       
    );
   
}else{
	$search ="";
        $args = array(
        'category' => $cid,
        'post_type' => 'post',
     /*   'exclude' =>  $feat_ID,*/
        'orderby' => 'date',
        'order'   => 'DESC',
        'posts_per_page' => -1,
        'paged' => 1,
        
    );
}

$page_posts = get_posts( $args );
$postsCount = count($page_posts);
$args = array('child_of' => 2, 'exclude'=> '');
$categories = get_categories( $args );
?>

  <section class="feature-insights-landing">
    <div class="container">
		<div class="search-insight">
		<div class="heading-title flex flex-vcenter">
            <div class="heading-left">
              <span class="h4">Search Insights</span>
            </div>
            <div class="heading-right">
              <div class="res-filter">
                <form action="" class="filter-form select-main">
          <div class="select1-of-2">
            <select name="category" id="" onchange="this.form.submit()">
              <option value="">Category</option>
             
			<?php foreach($categories as $category) {?>
				   <option value="<?php echo $category->term_id; ?>"<?php if($cid == $category->term_id) { echo 'selected'; } ?>><?php echo $category->name; ?></option>
			<?php } ?>
            </select>
          </div>
          
          <div class="select1-of-2 srch_wrap">
            <input type="search" name="search" placeholder="Search" value="<?php echo $search; ?>">
            <input type="submit" value="">
          </div>
        </form>
                </div><!-- end of res filter -->
              </div>
          </div>
			</div>
			</div>
      	<div class="feature-landing-main">
		  	<div class="container">
	        	<div id="ajax-load-more" class="more loadmore">
			        <ul class="listing blog_list" id="blog_list" data-path="<?php bloginfo('stylesheet_directory'); ?>" data-post-type="post" data-category="<?php echo $cid; ?>" data-searchblog="<?php echo $search; ?>" data-taxonomy="" data-year="" data-month="" data-postscount="<?php echo $postsCount; ?>" data-tag="" data-author="" data-display-posts="13" data-post-not-in="<?php echo $fid; ?>" data-button-text="More Insights">
			        </ul>
	        	</div>
    		</div>  
    	</div>  
</section>

<?php 
echo get_the_cta_panel($formatcatid , 'image'); ?>
<?php signup(); ?>
<?php get_footer(); ?>
