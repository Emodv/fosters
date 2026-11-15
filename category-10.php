<?php
/*
Template Name: Careers Landing page Template
*/ 
get_header();

$pageid = 319;
$careers_landing_page_desktop_image = get_field( 'careers_landing_page_desktop_image',$pageid);
$careers_landing_page_tablet_image  = get_field( 'careers_landing_page_tablet_image',$pageid);
$careers_landing_page_mobile_image  = get_field( 'careers_landing_page_mobile_image',$pageid);

$careers_landing_page_tablet_image = $careers_landing_page_tablet_image ? $careers_landing_page_tablet_image: $careers_landing_page_desktop_image;
$careers_landing_page_mobile_image = $careers_landing_page_mobile_image ? $careers_landing_page_mobile_image : $careers_landing_page_desktop_image;

$careers_landing_page_heading       = get_field( 'careers_landing_page_heading',$pageid);
$careers_landing_page_description   = get_field( 'careers_landing_page_description',$pageid);
if(!empty($careers_landing_page_desktop_image || $careers_landing_page_heading || $careers_landing_page_description)) {?>

<section class="hero_banner_section">
    <div class="container">
      	<div class="banner-main flex flex-vcenter">
        	<div class="banner-txt">
        		<?php if(!empty($careers_landing_page_heading)){ ?>
          			  <h1><?php echo $careers_landing_page_heading; ?></h1>
          		<?php } else{ ?>
                      <h1><?php echo get_cat_name(10); ?></h1>
          		<?php }if(!empty($careers_landing_page_description)){ ?>
          		<hr>
                <?php echo $careers_landing_page_description; } ?>
        	</div>
        	<?php if(!empty($careers_landing_page_desktop_image)){ ?>
		        	<div class="banner-right">
		          		<div class="banner-img"> 
		          			<span class="desktop"><img src="<?php echo $careers_landing_page_desktop_image['url']; ?>" alt="<?php echo $careers_landing_page_desktop_image['alt']; ?>"></span> 
		          			<span class="tablet"><img src="<?php echo $careers_landing_page_tablet_image['url']; ?>" alt="<?php echo $careers_landing_page_tablet_image['alt']; ?>"></span> 
		          			<span class="mobile"><img src="<?php echo $careers_landing_page_mobile_image['url']; ?>" alt="<?php echo $careers_landing_page_mobile_image['alt']; ?>"></span> 
		          		</div>
		        	</div>
            <?php } ?>
        </div>
    </div>
    <div class="clearfix"></div>
</section>
<?php } 
$careers_landing_page_intoduction_heading     = get_field( 'careers_landing_page_intoduction_heading',$pageid);
$careers_landing_page_intoduction_description = get_field( 'careers_landing_page_intoduction_description',$pageid);
$careers_landing_page_intoduction_button_text = get_field( 'careers_landing_page_intoduction_button_text',$pageid);
$careers_landing_page_intoduction_button_link = get_field( 'careers_landing_page_intoduction_button_link',$pageid);

if(!empty($careers_landing_page_intoduction_heading || $careers_landing_page_intoduction_description || $careers_landing_page_description)) { ?>
<section class="intro">
    <div class="container">
      	<div class="intro-cnt flex">
      		<?php if(!empty($careers_landing_page_intoduction_heading)){?>
        	<div class="intro-lt">
          		<h2><?php echo $careers_landing_page_intoduction_heading; ?></h2>
          		<?php if(!empty($careers_landing_page_intoduction_button_text & $careers_landing_page_intoduction_button_link )) { ?>
          			<a href="<?php echo $careers_landing_page_intoduction_button_link; ?>" class="button open-position"><?php echo $careers_landing_page_intoduction_button_text; ?></a>
          		<?php } ?> 
          	</div>
            <?php }  if(!empty($careers_landing_page_intoduction_description)){?>
                <div class="intro-rt">
                	<?php echo $careers_landing_page_intoduction_description;  ?>
                </div>
            <?php } ?>
        </div>
	  </div>
	</section>
<?php }  if( have_rows('careers_page_firm_values',$pageid) ): ?>
<section class="values-main">
	<div class="container">
		<div class="values flex">
			<?php  while( have_rows( 'careers_page_firm_values',$pageid) ):the_row();
					$careers_page_firm_icon = get_sub_field( 'careers_page_firm_icon');
					$careers_page_firm_heading = get_sub_field( 'careers_page_firm_heading');
					$careers_page_firm_description = get_sub_field( 'careers_page_firm_description');
					if(!empty($careers_page_firm_heading || $careers_page_firm_description)){ ?>		
						<div class="values-grid">
							<?php if(!empty($careers_page_firm_icon)){ ?>
									<div class="values-thumb">
				    					<img src="<?php echo $careers_page_firm_icon['url']; ?>" alt="<?php echo $careers_page_firm_icon['alt']; ?>"/> 
				    				</div>
		    				<?php  }  if(!empty($careers_page_firm_heading)){  ?>
		  							<span class="h4"><?php echo $careers_page_firm_heading;  ?></span>
		  					<?php }  if(!empty($careers_page_firm_description)){ 
		  						echo $careers_page_firm_description;
		  					} ?>
		  					</div>
		  			<?php } ?>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php endif;

$careers_page_open_position_heading = get_field('careers_page_open_position_heading',$pageid); 
$careers_no_opening_text = get_field('careers_no_opening_text',$pageid); 
 
if(isset($_GET['category'])){
	$filter_catid = $_GET['category'];
	$arg = array(

	    'post_type' => 'careers',
        'posts_per_page' => -1,
        'category'       => $filter_catid,
        'orderby'          => 'date',
        'order'            => 'DESC',
    );



} else {
	$filter_catid = "";
 	$arg = array(
	    'post_type' => 'careers',
        'posts_per_page' => -1,
        'category'       => 10,
        'orderby'          => 'date',
        'order'            => 'DESC',
    );
}

$career_posts = get_posts($arg);
if(!empty($career_posts)){
 ?>
 <section class="open-positions" id="view-opportunities">
	<div class="container">
	  	<div class="open-positions-main">
			<div class="heading-title flex flex-vcenter">
				<?php if(!empty($careers_page_open_position_heading)){ ?>
					  	<div class="heading-left">
					  		<span class="h1"><?php echo $careers_page_open_position_heading; ?></span>
					  	</div>
				<?php } ?>
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
				  		
				  	</div>
				</div>
			  </div>
		  <div class="positions-slider">
		  <?php foreach ( $career_posts as $post ) : setup_postdata( $post ); 
		  		$short_description = get_field('short_description',$post->ID);
		  		$category_detail= get_the_category($post->ID);
		  		$postcatname = $category_detail[1]->name;
		  		if(in_category(17,$post->ID)){
		  			$postcatname = get_cat_name(17);
		  			$catid = 17;
		  			

		  		} else if(in_category(18,$post->ID)){
		  			$postcatname = get_cat_name(18);
		  			$catid = 18;


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
		<?php endforeach; wp_reset_postdata(); ?> 
			
		  </div><!-- end of positions slider -->
		</div><!-- end of open positions main -->
	  </div>
	</section><!-- end of open positions -->
<?php } else{ ?>
<section class="open-positions">
	<div class="container">
	  	<div class="open-positions-main">
			<div class="heading-title flex flex-vcenter">
				<?php if(!empty($careers_no_opening_text)){ ?>
					  	<div class="heading-left">
					  		<span class="h3"><?php echo $careers_no_opening_text; ?></span>
					  	</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>


<?php } ?>

<?php signup(); ?>
<?php get_footer(); ?>