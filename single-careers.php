<?php
get_header();
$career_banner_desktop_image = get_field('career_banner_desktop_image');
$career_banner_tablet_image  = get_field('career_banner_tablet_image');
$career_banner_mobile_image  = get_field('career_banner_mobile_image');
if(empty($career_banner_desktop_image)){
	$pageid = 319;
   	$career_banner_desktop_image = get_field('careers_landing_page_desktop_image',$pageid);
   	$career_banner_tablet_image  = get_field('careers_landing_page_tablet_image',$pageid);
   	$career_banner_mobile_image  = get_field('careers_landing_page_mobile_image',$pageid);
}
$career_banner_tablet_image = $career_banner_tablet_image ? $career_banner_tablet_image :$career_banner_desktop_image;
$career_banner_mobile_image = $career_banner_mobile_image ? $career_banner_mobile_image : $career_banner_desktop_image;
?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri( '/css/career-opportunities.css'); ?>"/>
<section class="hero_banner_section">
    <div class="container">
      	<div class="banner-main flex">
        	<div class="banner-txt">
          		<h1><?php echo get_the_title(); ?></h1>
            </div>
            <?php if(!empty($career_banner_desktop_image)){ ?>
        	<div class="banner-right">
          		<div class="banner-img"> 
          			<span class="desktop"><img src="<?php echo $career_banner_desktop_image['url']; ?>" alt="<?php echo $career_banner_desktop_image['alt']; ?>"></span> 
          		</div>
        	</div>
            <?php } ?>
        </div>
    </div>
    <div class="clearfix"></div>
</section>
<?php  
$careers_post_sidebar_heading = get_field('careers_post_sidebar_heading'); 
$careers_post_sidebar_description = get_field('careers_post_sidebar_description');
$careers_post_sidebar_button_text = get_field('careers_post_sidebar_button_text');
$careers_post_sidebar_button_mail = get_field('careers_post_sidebar_button_mail');
?>
<section class="template-post-main">
	<div class="container">
		<div class="template-post-sidebar">
			<div class="template-post-content flex">
		  		<div class="template-post-left">
			  		<?php  while ( have_posts() ) : the_post();
								 the_content();
					endwhile;  wp_reset_postdata();	?>
		  		</div><!-- end of template post left -->
		  		<aside class="template-post-right">
				  	<div class="mbl-sidebanner">
					  	<span class="desktop"><img src="<?php echo $career_banner_desktop_image['url']; ?>" alt="<?php echo $career_banner_desktop_image['alt']; ?>"></span>
				  		<span class="tablet"><img src="<?php echo $career_banner_tablet_image['url']; ?>" alt="<?php echo $career_banner_tablet_image['url']; ?>"></span> 
				  		<span class="mobile"><img src="<?php echo $career_banner_mobile_image['url']; ?>" alt="<?php echo $career_banner_mobile_image['url']; ?>"></span> 
				    </div>
				    <?php if(!empty($careers_post_sidebar_heading || $careers_post_sidebar_description)){ ?>
					    	<div id="sticky-anchor"></div>
				  			<div class="side-bucket">
					 			<div class="sticky-right">
					 				<?php if(!empty($careers_post_sidebar_heading)){?>
					  				<h2><?php echo $careers_post_sidebar_heading;  ?></h2>
								    <?php } if(!empty($careers_post_sidebar_description)){
								    	echo $careers_post_sidebar_description;
								    } if(!empty($careers_post_sidebar_button_text & $careers_post_sidebar_button_mail)){ ?>
						  			<a href="mailto:<?php echo $careers_post_sidebar_button_mail.'?subject='.get_the_title(); ?>" class="button"><?php echo $careers_post_sidebar_button_text;  ?></a>
						  		    <?php } ?>
					  			</div><!-- end of sticky right -->
					  		</div>
			  	    <?php } ?>
		  		</aside>
		 	</div><!-- end of tempalte post content -->
		</div>
		<div id="sticky-stop"></div>
	</div>
</section>
<?php    
$currentId = $post->ID;
if(isset($_GET['category'])){
	$filter_catid = $_GET['category'];
	$arg = array(
	    'post_type' => 'careers',
        'posts_per_page' => -1,
        'category'       => $filter_catid,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'exclude' => array($currentId)
    );

} else {
	$filter_catid = "";
 	$arg = array(
	    'post_type' => 'careers',
        'posts_per_page' => -1,
        'category'       => 10,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'exclude' => array($currentId)
    );
}

$career_posts = get_posts($arg);
if(!empty($career_posts)){
 ?>
 <a href="#view-opportunities" class="button open-position" style="display: none;">View Opportunities</a>
 <section class="open-positions" id="view-opportunities">
	<div class="container">
	  	<div class="open-positions-main">
			<div class="heading-title flex flex-vcenter">
			  	<div class="heading-left"><span class="h1">Open Positions</span></div>
			    <div class="heading-right">
			    	<div class="nav-wrap">
			  	  		<span <?php if($filter_catid == 10 || $filter_catid == ""){ ?> class="active" <?php } ?> ><a href="?category=10" class="button blue">All</a></span>
			  	  		<?php
			  	  		$args = array(
								'type'                     => 'post',
								'child_of'                 => 10,
								'orderby'                  => 'name',
								'order'                    => 'ASC',
								'hide_empty'               => FALSE,
								'hierarchical'             => 1,
								'taxonomy'                 => 'category',
								); 
						$child_categories = get_categories($args );
						if ( !empty ( $child_categories ) ){
						    foreach ( $child_categories as $child_category ){ ?>
						        <span <?php if($child_category->term_id == $filter_catid ){?> class="active" <?php  } ?>><a href="?category=<?php echo $child_category->term_id; ?>" class="button blue"><?php echo $child_category->name; ?></a></span>
						   <?php }
						}
			  	  		?>
				  		<!-- <span><a href="?category=" class="button blue">Lawyer</a></span>
				  		<span><a href="#" class="button blue">Admin</a></span> -->
				  	</div>
				</div>
			  </div>
		  <div class="positions-slider">
		  <?php
		  	$args       = array('child_of' => 10);
			$categories = get_categories( $args );
			$separator  = ', ';
			$output     = "";
			foreach($categories as $category) {
				if($category->term_id !== 10){
					//$output .= '<a href="'.get_category_link( $category->term_id ).'">'.$category->cat_name.'</a>' .$separator;}
					$output    .= $category->term_id.$separator;
				}

			}
			 $carrercat      =  trim($output, $separator);
			 $carrercat      = explode(",",$carrercat);
			
			$carrercatcount =  count($carrercat);
			$i=0; foreach ( $career_posts as $post ) : setup_postdata( $post ); 
		  		$short_description = get_field('short_description',$post->ID);
		  		$category_detail   = get_the_category($post->ID);
		  		for($j=0; $j<=$carrercatcount; $j++) {
					$targetcatgory = $carrercat[$j];
					if(in_category($targetcatgory,$post->ID)){
						$postcatname = get_cat_name($targetcatgory);
						$catid = $targetcatgory;
					} 
				}
		  	?>	
		 	<div class="positions-slide">
			  	<span class="h4"><a href="<?php echo get_the_permalink($post->ID); ?>"><?php echo get_the_title(); ?></a></span>
			  	<span class="open-position"><a href="?category=<?php echo $catid; ?>"><?php echo $postcatname; ?></a></span>
			 	<?php if( ! empty( $short_description )){ 
			 		echo '<p>'.$short_description.'</p>';			 		
			 	} ?>

			  <span class="posting-btn">
			  <a href="<?php echo get_the_permalink($post->ID); ?>" class="button">View Posting</a>
				  </span>
			  </div><!-- end of positions slide -->
		<?php $i++; endforeach; wp_reset_postdata(); ?> 
			
		  </div><!-- end of positions slider -->
		</div><!-- end of open positions main -->
	  </div>
	</section><!-- end of open positions -->
<?php } ?>

<?php get_footer(); ?>