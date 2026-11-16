<?php

function fosters_theme_support() {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );
	add_theme_support( 'title-tag' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	
	load_theme_textdomain( 'fosters' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'customize-selective-refresh-widgets' );

	register_nav_menus( array( 
    'header' => 'Header menu', 
    'footer' => 'Footer menu',
    'footer' => 'Expertise menu',
  ) );
}

add_action( 'after_setup_theme', 'fosters_theme_support' );


function remove_my_post_metaboxes() {

remove_meta_box( 'commentstatusdiv','post','normal' ); // Comments Status Metabox
remove_meta_box( 'commentsdiv','post','normal' ); // Comments Metabox
}
add_action('admin_menu','remove_my_post_metaboxes');

function my_custom_mime_types( $mimes ) {
$mimes['svg'] = 'image/svg+xml';
$mimes['svgz'] = 'image/svg+xml';
$mimes['doc'] = 'application/msword';

unset( $mimes['exe'] );
 
return $mimes;
}
add_filter( 'upload_mimes', 'my_custom_mime_types' );

function fosters_register_styles() {
    global $post;
	$theme_version = wp_get_theme()->get( 'Version' );
    //$p_cache = get_the_cache_key();
	wp_enqueue_style( 'fosterlaw-style', get_stylesheet_uri(), array(), $theme_version );
	if(is_page(15)){
	   wp_enqueue_style( 'fosterlaw-home-style', get_theme_file_uri( '/css/home.css' ), array(), $theme_version );
	}
	if(is_archive('people')){
		wp_enqueue_style( 'our-people-style', get_theme_file_uri( '/css/our-people.css' ), array(), $theme_version );
    }
    if(is_single('people')){
        wp_enqueue_style( 'our-people-profile', get_theme_file_uri( '/css/our-people-profile.css' ), array(), $theme_version );
    }
    if(is_category()){
         wp_enqueue_style( 'insight-style', get_theme_file_uri( '/css/insights.css' ), array(), $theme_version );
    }
    wp_enqueue_style( 'our-people-profile', get_theme_file_uri( '/css/our-people-profile.css' ), array(), $theme_version );
    wp_enqueue_style( 'selectBox-style', get_theme_file_uri( '/css/jquery.selectBox.css' ), array(), $theme_version );
    wp_enqueue_script( 'selectBox-script', get_theme_file_uri( '/js/jquery.selectbox.js' ), array( 'jquery' ), '?ver=09042021');
    wp_enqueue_style( 'uniform-style', get_theme_file_uri( '/css/uniform.default.css' ), array(), $theme_version );

    wp_enqueue_script( 'uniform-script', get_theme_file_uri( '/js/jquery.uniform.js' ), array( 'jquery' ), 
        '?ver=09042021');
    wp_enqueue_script( 'placeholder.script', get_theme_file_uri( '/js/placeholder.js' ), array( 'jquery' ), 
        '?ver=09042021' );

    wp_enqueue_script( 'load-more', get_theme_file_uri( '/js/load-more.js' ), array( 'jquery' ), '?ver=09042021' );

    wp_enqueue_script( 'custom-script', get_theme_file_uri( '/js/script.js' ), array( 'jquery' ), $theme_version );

    wp_enqueue_script( 'slick-script', get_theme_file_uri( '/js/slick.min.js' ), array( 'jquery' ), '?ver=09042021' );
    wp_enqueue_style( 'slick-style', get_theme_file_uri( '/css/slick.css' ), array(), $theme_version );

    if(is_single() || is_single('careers')){
    wp_enqueue_style( 'singlr-page-style', get_theme_file_uri( '/css/single.css' ), array(), $theme_version );
    }
    if(is_category(10)){
    wp_enqueue_style( 'career-style', get_theme_file_uri( '/css/careers.css' ), array(), $theme_version );
    }
    if( is_page_template( 'templates/thank-you.php' )){
        wp_enqueue_style( 'confirmation-style', get_theme_file_uri( '/css/confirmation.css' ), array(), $theme_version );
    }
    if ( is_page_template( 'templates/expertise.php' )) {
    wp_enqueue_style( 'expertise-style', get_theme_file_uri( '/css/expertise.css' ), array(), $theme_version );
  
    }
    
    if ( is_page_template( 'templates/contact.php' ) ) {
        wp_enqueue_style( 'contact-style', get_theme_file_uri( '/css/contact.css' ), array(), $theme_version );
    }

    if ( is_page_template( 'templates/our-firm.php' ) ) {
        wp_enqueue_style( 'our-firm-style', get_stylesheet_directory_uri() . '/css/our-firm.css' );
    }
     if ( is_page_template( 'templates/standalone.php' ) ) {
        wp_enqueue_style( 'our-firm-style', get_stylesheet_directory_uri() . '/css/standalone.css' );
		 wp_enqueue_script( 'standalone-script', get_theme_file_uri( '/js/standalone-script.js' ), array( 'jquery' ), '?ver=09042021' );
    }
    
	wp_enqueue_script( 'jqueryui', get_theme_file_uri( '/js/jquery-ui.js' ), array( 'jquery' ), $theme_version );
    wp_enqueue_script( 'customui', get_theme_file_uri( '/js/custom-ui.js' ), array( 'jquery' ), $theme_version);
    wp_enqueue_style( 'jqueryui-style', get_stylesheet_directory_uri() . '/css/jquery-ui.css' );

  
    
}

add_action( 'wp_enqueue_scripts', 'fosters_register_styles' );



if (function_exists('acf_add_options_sub_page')) {
 acf_add_options_sub_page(array(
   'title' => 'Header Options',
   'parent' => 'themes.php',
 ));
}
if (function_exists('acf_add_options_sub_page')) {
 acf_add_options_sub_page(array(
   'title' => 'Footer Options',
   'parent' => 'themes.php',
 ));
}


add_filter( 'body_class', 'custom_class' );
function custom_class( $classes ) {
	global $post;

    global $template;
  

    $classes[] = "custom-foster-".basename($template);

    $template = basename($template);
    
    if($template == 'page.php'){

    	$default_banner_desktop_image = get_field('default_banner_desktop_image',$post->ID);

		if(empty($default_banner_desktop_image)){

			$classes[] = 'default-page-without-banner';

		} else {

			$classes[] = 'default-page-with-banner';
		}
	}

    if(is_single('careers')){

       $classes[] = 'page-template-career-opportunities';

    }

    if ( is_page(459) ) {
        $classes[] = 'thankyou';
    }

    if(is_page(1462)){
         $classes[] = 'motor-vehicle-accidents-form';
    }
	
	if(is_page(1504)){
         $classes[] = 'motor-vehicle-accidents-form';
    }
    
    return $classes;
}

add_filter('acf/fields/relationship/query/name=home_area_of_practices', 'relationship_expertise_template_expertise_query', 10, 3);


function relationship_expertise_template_expertise_query($args, $field, $post) {

    $IDs_to_include = array_column(get_pages( array( 'child_of' => 17 , 'depth'=>'-1' ) ), 'ID');

    $args['post__in'] = $IDs_to_include;

    $args['orderby'] = 'menu_order';

    return $args;

}

add_filter('acf/fields/relationship/query/name=select_practices', 'relationship_select_practices', 10, 3);

function relationship_select_practices($args, $field, $post) {

    $IDs_to_include = array_column(get_pages( array( 'child_of' => 17 , 'depth'=>'-1' ) ), 'ID');

    $args['post__in'] = $IDs_to_include;

    $args['orderby'] = 'menu_order';

    return $args;

}

function signup() { 

$singnup_form_icon = get_field('singnup_form_icon','option');
$singnup_form_heading = get_field('singnup_form_heading','option');
$singnup_form_description = get_field('singnup_form_description','option');
$singnup_form_shortcode = get_field('singnup_form_shortcode','option'); ?>
<section id="newsletter" class="signup">
    <div class="container">
        <div class="signup-inner flex flex-vcenter">
            <div class="signup-lt">
                <div class="section-head">
                    <?php if(!empty($singnup_form_icon)){  ?>
                            <div class="sh-icon"> 
                                <img src="<?php echo $singnup_form_icon['url']; ?>" alt="<?php echo $singnup_form_icon['alt']; ?>"> 
                            </div>
                    <?php } ?>
                    <div class="sh-title">
                        <?php if(!empty($singnup_form_heading)){  ?>
                            <span class="h4"><?php echo $singnup_form_heading;  ?></span> 
                        <?php }
                        if(!empty($singnup_form_description)){  ?>
                            <div class="hide-mobile">
                                <?php echo $singnup_form_description; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php if(!empty($singnup_form_description)){  ?>
                    <div class="show-mobile hide-tab hide-desktop">
                        <?php echo $singnup_form_description; ?>
                    </div>
                <?php } ?>
            </div>
            <div class="signup-rt">
                <div class="signup-form">
                    <?php if(!empty($singnup_form_shortcode)){ ?>
                        <div class="signup-rt">
                            <div class="signup-form">
                                <?php echo do_shortcode($singnup_form_shortcode); ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<?php } 

function slider_func() {
ob_start();
 global $post;
 $post->ID;
 if( have_rows('slider_details', $post->ID) ):
    $code = '<div class="def-slider"><div class="def-slider-wrap">';
        while( have_rows('slider_details', $post->ID) ): the_row();
            $slider_image = get_sub_field('slider_image', $post->ID);
            $slide_caption = get_sub_field('slide_caption', $post->ID);
            $code .= '<div class="def-slide">';
            if(!empty($slider_image)){
               $code .= '<div class="def-img"><img src="'.$slider_image['url'].'" alt="'.$slider_image['alt'].'"></div>';
            }
            if(!empty($slide_caption)){
                $code .= '<div class="def-caption"><p>'. $slide_caption.'</p></div>';
            }
            $code .= '</div>';
        endwhile;
     $code .= '</div></div>';
     return $code;
endif;
}
add_shortcode( 'slider', 'slider_func' );


function video_func() {
ob_start();
global $post;
$post->ID;
$code ="";
$code .='<div class="video-caption"><div class="video-thumbnail">';
      
$content_video_poster_image = get_field('content_video_poster_image', $post->ID);
$content_video = get_field('content_video', $post->ID);
$content_video_caption = get_field('content_video_caption', $post->ID);
        
   
if(!empty($content_video_poster_image)){
$code .= '<img src="'.$content_video_poster_image['url'].'" alt="'.$content_video_poster_image['alt'].'"/>';
$code .= '<div class="play_video_center"><a href="#" class="play_btn"></a></div>';
}
$code .= '</div>';
if(!empty($content_video_caption)){
    $code .= '<div class="video-caption-text"><p>'. $content_video_caption.'</p></div>';
}
     
$code .= '</div>';
return $code;

}
add_shortcode( 'video', 'video_func' );

function lawyercta_func() {
        $insight_cta_heading          = get_field('insight_cta_heading');
        $insight_cta_description      = get_field('insight_cta_description');
        $insight_cta_button_text      = get_field('insight_cta_button_text');
        $insight_cta_button_link      = get_field('insight_cta_button_link');
        $insight_cta_telephone_text   = get_field('insight_cta_telephone_text');
        $insight_cta_telephone_number = get_field('insight_cta_telephone_number');
        $insight_cta_form_shortcode   = get_field('insight_cta_form_shortcode');
        
        $ctacode .= '<section class="lawyer-cta-section">';
        $ctacode .='<div class="container">';
        $ctacode .='<div class="lawyer-cta-main flex">'; 
        $ctacode .='<div class="lawyer-cta-left">';
        if(!empty($insight_cta_heading)){
        $ctacode .='<h2>'.$insight_cta_heading.'</h2>';
        } if(!empty($insight_cta_description)){
             $ctacode .= $insight_cta_description;   
        } 
        $ctacode .='<div class="mail-phone-wrapper flex flex-vcenter">';
        if(!empty($insight_cta_button_text) && !empty($insight_cta_button_link)){
            $ctacode .='<div class="email-btn-text"><a class="button" href="mailto:'.$insight_cta_button_link.'">'.$insight_cta_button_text.'</a></div>'; 
        }
        $ctacode .='<div class="phone-text">'.$insight_cta_telephone_text.'<a href="tel:'.$insight_cta_telephone_number.'">&nbsp;'.$insight_cta_telephone_number.'</a></div>';

        $ctacode .= '</div></div>';
        if(!empty($insight_cta_form_shortcode)){
        $ctacode .= '<div class="lawyer-cta-right">';
        $ctacode .= '<div class="ctaform">';
        $ctacode .=  do_shortcode($insight_cta_form_shortcode);
        $ctacode .= '</div>';
        $ctacode .= '</div>';
         } 
        $ctacode .= '</div></div>';
        $ctacode .= '</section>';
        return $ctacode; 
    }
add_shortcode( 'lawyercta', 'lawyercta_func' );


function get_the_banner($postpageid){ 
    $default_banner_desktop_image       = get_field('default_banner_desktop_image', $postpageid);
    $default_banner_tablet_image        = get_field('default_banner_tablet_image', $postpageid);
    $default_banner_mobile_image        = get_field('default_banner_mobile_image', $postpageid);
    $default_banner_heading             = get_field('default_banner_heading', $postpageid);
    $default_banner_subheading          = get_field('default_banner_subheading', $postpageid);
    $default_banner_description         = get_field('default_banner_description', $postpageid);
    $default_banner_button_text         = get_field('default_banner_button_text', $postpageid);
    $default_banner_button_link         = get_field('default_banner_button_link', $postpageid);
    $banner                             = "";

    $default_banner_tablet_image = $default_banner_tablet_image  ? $default_banner_tablet_image : $default_banner_desktop_image;
    $default_banner_mobile_image = $default_banner_mobile_image ? $default_banner_mobile_image : $default_banner_desktop_image;

    $pagename = get_the_title();
    if ( is_page_template( array('templates/expertise.php' , 'templates/our-firm.php' ))) {
       $default_banner_heading = $default_banner_heading ? $default_banner_heading : $pagename;
    }

    if(!empty($default_banner_heading || $default_banner_desktop_image)){
        $banner .= '<section class="hero_banner_section">
            <div class="container">
                <div class="banner-main flex flex-vcenter">';
                    } if(!empty($default_banner_heading || $default_banner_description)){
                        $banner .='<div class="banner-txt">';
                        if(!empty($default_banner_subheading)){
                           $banner .='<small>'.$default_banner_subheading.'</small>';
                        } 
                        $banner .='<h1>'.$default_banner_heading.'</h1>';
                      
                        if(!empty($default_banner_description)){
                           $banner .= '<hr>'.$default_banner_description;
                        } 
                       
                        if(!empty($default_banner_button_text) && !empty($default_banner_button_link)){
                           $banner .='<a href="'.$default_banner_button_link.'" class="button">'.$default_banner_button_text.'</a>';
                        }
                    $banner .='</div>';
                    if(!empty($default_banner_desktop_image)){
                        $banner .='
                        <div class="banner-right">
                            <div class="banner-img">
                                <span class="desktop">
                                    <img src="'.$default_banner_desktop_image['url'].'" alt="'.$default_banner_desktop_image['alt'].'" title="'. $default_banner_desktop_image['title'].'"> 
                                </span> 
                                <span class="tablet">
                                    <img src="'.$default_banner_tablet_image['url'].'" alt="'.$default_banner_tablet_image['alt'].'" title="'. $default_banner_tablet_image['title'].'"> 
                                </span>
                                <span class="mobile">
                                    <img src="'.$default_banner_mobile_image['url'].'" alt="'.$default_banner_mobile_image['alt'].'" title="'. $default_banner_mobile_image['title'].'"> 
                                </span> 
                            </div>
                        </div>';
                    }
                $banner .='
                </div>
            </div>
            <div class="clearfix"></div>
        </section>';
    }
    return $banner;
}

function get_the_practices($postpageid){
    $practices          = get_field('home_area_of_practices', $postpageid);
    $area_of_practices  = "";

    if( $practices ):
        $area_of_practices .='<div class="expertise-post-main flex">';
            foreach( $practices as $post): 
                setup_postdata($post);
                $featured_image     = get_the_post_thumbnail($post->ID);
                $short_description  = get_field('short_description', $post->ID);
                $area_of_practices .='
                <div class="expertise-post">';
                    if(!empty($featured_image)){
                        $area_of_practices .='
                        <div class="expertise-thumb">
                            <a href="'.get_the_permalink($post->ID).'">'.$featured_image.'</a>
                        </div>';
                    }

                    $area_of_practices .='
                    <div class="expertise-cnt flex">
                        <div class="expertise-post-left">
                            <span class="h3">
                                <a href="'.get_the_permalink($post->ID).'">'.get_the_title($post->ID).'</a>
                            </span>';
                            
                            if(!empty($short_description)){
                                $area_of_practices .='<p>'.$short_description.'</p>';
                            }
                        $area_of_practices .='
                        </div>
                        
                        <div class="expertise-post-right">
                            <a href="'.get_the_permalink($post->ID).'" class="arrow-btn">Learn More</a>
                        </div>
                    </div>
                </div>';
            endforeach;
            wp_reset_postdata();
        $area_of_practices .='</div>';
    endif;

    return $area_of_practices;
}

function get_the_people($postpageid){

$people                             = "";
$ourpeople_icon                     = get_field('ourpeople_icon', $postpageid);
$ourpeople_heading                  = get_field('ourpeople_heading', $postpageid);
$ourpeople_description              = get_field('ourpeople_description', $postpageid);
$ourpeople_learn_more_text          = get_field('ourpeople_learn_more_text', $postpageid);
$ourpeople_learn_more_button_text   = get_field('ourpeople_learn_more_button_text', $postpageid);
$ourpeople_learn_more_button_link   = get_field('ourpeople_learn_more_button_link', $postpageid);

$people .= '
<section class="home-our-people">
    <div class="container">
        <div class="home-people-main">
            <div class="home-people-top flex">
                <div class="home-people-left">
                    <div class="section-head">';
                        if( ! empty( $ourpeople_icon ) ){
                            $people .= '
                            <div class="sh-icon"> 
                                <img src="'.$ourpeople_icon['url'].'" alt="'.$ourpeople_icon['alt'].'" title="'.$ourpeople_icon['title'].'"> 
                            </div>';
                        }  if( ! empty( $ourpeople_heading ) ){
                            $people .= '
                            <div class="sh-title">
                                <span>'.$ourpeople_heading.'</span>
                            </div>';
                        }
                    $people .= '</div>';
                    
                    if( ! empty( $ourpeople_description ) ){
                        $people .= $ourpeople_description;
                    }
                $people .= '</div>';
                
                if( have_rows('our_people_features_details', $postpageid) ):
                    $people .= '
                    <div class="home-people-right">
                        <div class="ppl-info flex">';
                            while( have_rows('our_people_features_details', $postpageid) ): the_row();
                                $our_people_features_number = get_sub_field('our_people_features_number', $postpageid);
                                $our_people_features_name   = get_sub_field('our_people_features_name', $postpageid);
                                if(!empty($our_people_features_number & $our_people_features_name)){
                                    $people .= '
                                    <div class="ppl-grid">
                                        <div class="ppl-grid-inner">
                                            <span class="count">'.$our_people_features_number.'</span>
                                            <span>'.$our_people_features_name.'</span>
                                        </div>
                                    </div>';
                                }
                            endwhile;
                        $people .= '</div>
                    </div>';
                endif;
            $people .= '</div>';
    
            $people .= get_all_the_people();
            
            if(!empty($ourpeople_learn_more_button_text & $ourpeople_learn_more_button_link)){
                $people .= '<div class="meet-team flex flex-vcenter">';
                    if(!empty($ourpeople_learn_more_text)){
                        $people .= '<h2>'.$ourpeople_learn_more_text.'</h2>';
                    }
                    $people .= '<a href="'.$ourpeople_learn_more_button_link.'" class="button">'.$ourpeople_learn_more_button_text.'</a>
                </div>';
            }
        $people .= '</div>
    </div>
</section>';

return $people;

}


function get_all_the_people(){
    $all_the_people = "";
    $people_posts   = get_posts( array(
                        'posts_per_page'    => -1,
                        'post_type'         => 'people',
                        'orderby'           => 'date',
                        'order'             => 'DESC',
                        ) );
    if ( $people_posts ) {            
        $all_the_people .= '
        <div class="team-main flex">';
            foreach ( $people_posts as $post ) : 
                setup_postdata( $post );
                $our_people_image       = get_field('our_people_image', $post->ID);
                $our_people_first_name  = get_field('our_people_first_name', $post->ID);
                $our_people_first_name = $our_people_first_name ? $our_people_first_name : get_the_title($post->ID);
                
                $all_the_people .= '
                <div class="team-single">
                    <a href="'.get_the_permalink($post->ID).'">
                        <img src="'.$our_people_image['url'].'" alt="'.$our_people_image['alt'].'"/> 
                        <span class="overlay-text">'."Meet<br/>".$our_people_first_name.'</span>
                    </a>
                </div>';
            endforeach; 
            wp_reset_query(); 
        $all_the_people .= '</div>';
    }

    return $all_the_people;
}

function get_the_cta_panel($postpageid, $ctatype = ''){
    $cta_panel            = "";
    $formcls              = "";
    if(!empty($ctatype)){
    $cta_icon             = get_field($ctatype.'_cta_icon', $postpageid);
    $cta_sub_heading      = get_field($ctatype.'_cta_sub_heading', $postpageid);
    $cta_heading          = get_field($ctatype.'_cta_heading', $postpageid);
    $cta_description      = get_field($ctatype.'_cta_description', $postpageid);
    $cta_form_shortcode   = get_field($ctatype.'_cta_form_shortcode', $postpageid);
    
    $cta_desktop_img      = get_field($ctatype.'_cta_desktop_img', $postpageid);
    $cta_tablet_img       = get_field($ctatype.'_cta_tablet_img', $postpageid);
    $cta_mobile_image     = get_field($ctatype.'_cta_mobile_image', $postpageid);

    $cta_tablet_img       = $cta_tablet_img ? $cta_tablet_img : $cta_desktop_img;
    $cta_mobile_image     = $cta_mobile_image ? $cta_mobile_image : $cta_desktop_img;

    $cta_button_text      = get_field($ctatype.'_cta_button_text', $postpageid);
    $cta_button_link      = get_field($ctatype.'_cta_button_link', $postpageid);

    $image_cta_position      = get_field($ctatype.'_cta_position', $postpageid);
    
    if($ctatype == "form"){ $formcls = "-form"; }
    if($image_cta_position == "Left"){$image_pos_cls = "image-left";}else{ $image_pos_cls=""; }

    if( ! empty( $cta_description || $cta_form_shortcode )){
        $cta_panel .='
        <section class="cta'.$formcls.' '.$image_pos_cls.'" id="email-us">
            <div class="container">
                <div class="cta'.$formcls.'-main flex">';
                    if( ! empty( $cta_icon || $cta_sub_heading || $cta_heading )){
                        $cta_panel .=' 
                        <div class="cta'.$formcls.'-left">
                            <div class="section-head">';
                                if( ! empty( $cta_icon )){
                                    $cta_panel .='
                                    <div class="sh-icon">
                                        <img src="'.$cta_icon['url'].'" alt="'.$cta_icon['alt'].'" title="'.$cta_icon['title'].'"> 
                                    </div>';
                                }                       
                                if( ! empty( $cta_sub_heading )){
                                    $cta_panel .='
                                    <div class="sh-title"><span>'.$cta_sub_heading.'</span></div>';
                                }
                            $cta_panel .='</div>';
                            if( ! empty( $cta_heading )){
                                if($ctatype == "image"){
                                    $cta_panel .='<h2>'.$cta_heading.'</h2>';
                                }else{
                                    $cta_panel .='<span class="h1">'.$cta_heading.'</span>';
                                }
                            }
                            if( ! empty( $cta_description )){
                                    $cta_panel .= $cta_description;
                            }
                            if(!empty($cta_button_text & $cta_button_link)){
                                $cta_panel .=
                                '<a href="'.$cta_button_link.'" class="button">'.$cta_button_text.'</a>';
                            }
                        $cta_panel .='</div>';
                    }
                    if( ! empty( $cta_form_shortcode )){
                        $cta_panel .='
                        <div class="cta-form-right">
                            <div class="ctaform">
                                '.do_shortcode($cta_form_shortcode).'
                            </div>
                        </div>';
                    }

                    if(!empty($cta_desktop_img)){
                        $cta_panel .='
                        <div class="cta-right">
                            <div class="cta-image">
                                <div class="desktop">
                                    <img src="'.$cta_desktop_img['url'].'" alt="'.$cta_desktop_img['alt'].'" title="'.$cta_desktop_img['title'].'">
                                </div>
                                <div class="tablet">
                                    <img src="'.$cta_tablet_img['url'].'" alt="'.$cta_tablet_img['alt'].'" title="'.$cta_tablet_img['title'].'">
                                </div>
                                <div class="mobile">
                                    <img src="'.$cta_mobile_image['url'].'" alt="'.$cta_mobile_image['alt'].'" title="'.$cta_mobile_image['title'].'">
                                </div>
                            </div>
                        </div>';
                    }

                    $cta_panel .='</div>
                  </div>
        </section>';
    }

    return $cta_panel;
}
}

function get_the_video_cta_panel(){

    $image_video_cta_select             = get_field('image_video_cta_select');
    $cta_icon             = get_field('image_video_cta_icon');
    $cta_sub_heading      = get_field('image_video_cta_sub_heading');
    $cta_heading          = get_field('image_video_cta_heading');
    $cta_description      = get_field('image_video_cta_description');
    
    $cta_desktop_img      = get_field('image_video_cta_desktop_img');
    $cta_tablet_img       = get_field('image_video_cta_tablet_img');
    $cta_mobile_image     = get_field('image_video_cta_mobile_image');

    $cta_tablet_img       = $cta_tablet_img ? $cta_tablet_img : $cta_desktop_img;
    $cta_mobile_image     = $cta_mobile_image ? $cta_mobile_image : $cta_desktop_img;

    $image_video_cta_video_url      = get_field('image_video_cta_video_url');

    $cta_button_text      = get_field('image_video_cta_button_text');
    $cta_button_link      = get_field('image_video_cta_button_link');

    $image_cta_position      = get_field('image_video_cta_position');
    if($image_cta_position == "Left"){$image_pos_cls = "image-left";}else{ $image_pos_cls = ""; }

    if($image_video_cta_select == "Video"){$image_video_popcls = "popup-youtube";}

    if( ! empty( $cta_heading || $cta_description ||  $cta_desktop_img)){
        $cta_panel ='
        <section class="cta '.$image_pos_cls.'" id="email-us">
            <div class="container">
                <div class="cta-main flex">';
                    if( ! empty( $cta_icon || $cta_sub_heading )){
                        $cta_panel .=' 
                        <div class="cta-left">
                            <div class="section-head">';
                                if( ! empty( $cta_icon )){
                                    $cta_panel .='
                                    <div class="sh-icon">
                                        <img src="'.$cta_icon['url'].'" alt="'.$cta_icon['alt'].'" title="'.$cta_icon['title'].'"> 
                                    </div>';
                                }                       
                                if( ! empty( $cta_sub_heading )){
                                    $cta_panel .='
                                    <div class="sh-title"><span>'.$cta_sub_heading.'</span></div>';
                                }
                            $cta_panel .='</div>';
                            if( ! empty( $cta_heading )){
                                if($ctatype == "image"){
                                    $cta_panel .='<h2>'.$cta_heading.'</h2>';
                                }else{
                                    $cta_panel .='<span class="h2">'.$cta_heading.'</span>';
                                }
                            }
                            if( ! empty( $cta_description )){
                                    $cta_panel .= $cta_description;
                            }   
                            if($image_video_cta_select == "Video"){
                                if(!empty($cta_button_text & $image_video_cta_video_url)){
                                    $cta_panel .=
                                    '<a href="'.$image_video_cta_video_url.'" class="'.$image_video_popcls.' button">'.$cta_button_text.'</a>';
                                }
                            } else {
                                if(!empty($cta_button_text & $cta_button_link)){
                                    $cta_panel .=
                                    '<a href="'.$cta_button_link.'" class="'.$image_video_popcls.' button">'.$cta_button_text.'</a>';
                                }   
                            }
                        $cta_panel .='</div>';
                    }

                    if(!empty($cta_desktop_img)){
                        $cta_panel .='
                        <div class="cta-right">
                            <div class="cta-image">
                                <div class="desktop">';
                                if($image_video_cta_select == "Video"){
                                    $cta_panel .='<div class="play_video_center new_play_button"><a href="'.$image_video_cta_video_url.'" class="'.$image_video_popcls.' play_btn"></a></div>';
                                }
                                    $cta_panel .='<img src="'.$cta_desktop_img['url'].'" alt="'.$cta_desktop_img['alt'].'" title="'.$cta_desktop_img['title'].'">
                                </div>
                                <div class="tablet">';
                                if($image_video_cta_select == "Video"){
                                    $cta_panel .='<div class="play_video_center new_play_button"><a href="'.$image_video_cta_video_url.'" class="'.$image_video_popcls.' play_btn"></a></div>';
                                }
                                    $cta_panel .='<img src="'.$cta_tablet_img['url'].'" alt="'.$cta_tablet_img['alt'].'" title="'.$cta_tablet_img['title'].'">
                                </div>
                                <div class="mobile">';
                                if($image_video_cta_select == "Video"){
                                    $cta_panel .='<div class="play_video_center new_play_button"><a href="'.$image_video_cta_video_url.'" class="'.$image_video_popcls.' play_btn"></a></div>';
                                }
                                    $cta_panel .='<img src="'.$cta_mobile_image['url'].'" alt="'.$cta_mobile_image['alt'].'" title="'.$cta_mobile_image['title'].'">
                                </div>
                            </div>
                        </div>';
                    }

                    $cta_panel .='</div>
                  </div>
        </section>';
    }

    return $cta_panel;
}

function get_the_video_cta_panel_standalone(){
    $cta_icon             = get_field('image_video_cta_icon');
    $cta_sub_heading      = get_field('image_video_cta_sub_heading');
    $cta_heading          = get_field('image_video_cta_heading');
    $cta_description      = get_field('image_video_cta_description');
    $video_url            = "";
    $image_video_cta_select = get_field('image_video_cta_select');
    if($image_video_cta_select == "Video"){
        $image_video_cta_poster_image = get_field('image_video_cta_poster_image');
        $image_video_cta_video_type   = get_field('image_video_cta_video_type');
       
       

    } if($image_video_cta_select == "Image"){
        $cta_desktop_img      = get_field('image_video_cta_desktop_img');
        $cta_tablet_img       = get_field('image_video_cta_tablet_img');
        $cta_mobile_image     = get_field('image_video_cta_mobile_image');
    
        $cta_tablet_img       = $cta_tablet_img ? $cta_tablet_img : $cta_desktop_img;
        $cta_mobile_image     = $cta_mobile_image ? $cta_mobile_image : $cta_desktop_img;
        
    }
    $cta_button_text      = get_field('image_video_cta_button_text');
    $cta_button_link      = get_field('image_video_cta_button_link');

    //$image_cta_position      = get_field('image_video_cta_position');
    //if($image_cta_position == "Left"){$image_pos_cls = "image-left";}else{ $image_pos_cls = ""; }

    if($image_video_cta_select == "Video"){$image_video_popcls = "popup-youtube";}

    if( ! empty( $cta_heading || $cta_description ||  $cta_desktop_img)){
        $cta_panel ='
        <section class="cta '.$image_pos_cls.'" id="email-us">
            <div class="container">
                <div class="cta-main flex">';
                    if( ! empty( $cta_icon || $cta_sub_heading )){
                        $cta_panel .=' 
                        <div class="cta-left">
                            <div class="section-head">';
                                if( ! empty( $cta_icon )){
                                    $cta_panel .='
                                    <div class="sh-icon">
                                        <img src="'.$cta_icon['url'].'" alt="'.$cta_icon['alt'].'" title="'.$cta_icon['title'].'"> 
                                    </div>';
                                }                       
                                if( ! empty( $cta_sub_heading )){
                                    $cta_panel .='
                                    <div class="sh-title"><span>'.$cta_sub_heading.'</span></div>';
                                }
                            $cta_panel .='</div>';
                            if( ! empty( $cta_heading )){
                                if($ctatype == "image"){
                                    $cta_panel .='<h2>'.$cta_heading.'</h2>';
                                }else{
                                    $cta_panel .='<span class="h2">'.$cta_heading.'</span>';
                                }
                            }
                            if( ! empty( $cta_description )){
                                    $cta_panel .= $cta_description;
                            }   
                            if($image_video_cta_select == "Video"){

                                if(!empty($cta_button_text & $image_video_cta_video_url)){
                                    $cta_panel .=
                                    '<a href="'.$image_video_cta_video_url.'" class="'.$image_video_popcls.' button">'.$cta_button_text.'</a>';
                                }
                            } else {
                                if(!empty($cta_button_text & $cta_button_link)){
                                    $cta_panel .=
                                    '<a href="'.$cta_button_link.'" class="'.$image_video_popcls.' button">'.$cta_button_text.'</a>';
                                }   
                            }
                        $cta_panel .='</div>';
                    }

                    if(!empty($image_video_cta_poster_image) && $image_video_cta_select == "Video" ){
                        $cta_panel .='
                        <div class="cta-right">
                            <div class="cta-image">';
                                
                                if($image_video_cta_select == "Vimeo" && !empty($image_video_cta_video_url)){
                                    $cta_panel .='<div class="play_video_center new_play_button">
                                    <a href="'.$image_video_cta_video_url.'" class="'.$image_video_popcls.' play_btn"></a>
                                    </div>';
                                }
                               
                                    $cta_panel .='<img src="'.$image_video_cta_poster_image['url'].'" alt="'.$image_video_cta_poster_image['alt'].'" title="'.$cta_desktop_img['title'].'">
                                
                               
                               
                            </div>
                        </div>';
                    }if(!empty($cta_desktop_img) && $image_video_cta_select == "Image" ){
                        $cta_panel .='
                        <div class="cta-right">
                            <div class="cta-image">';
                                    $cta_panel .='<picture class="object-fit">
                                        <source srcset="'.$cta_desktop_img['url'].'" media="(min-width: 1024px)">
                                        <source srcset="'.$cta_tablet_img['url'].'" media="(min-width: 768px)">
                                        <img src="'.$cta_mobile_image['url'].'" alt="'.$cta_mobile_image['alt'].'">
                                    </picture>
                           
                        </div>';
                    }

                    $cta_panel .='</div>
                  </div>
        </section>';
    }

    return $cta_panel;
}



function get_the_cta_panel_old($postpageid){
    $cta_panel            = "";
    $cta_icon             = get_field('cta_icon', $postpageid);
    $cta_sub_heading      = get_field('cta_sub_heading', $postpageid);
    $cta_heading          = get_field('cta_heading', $postpageid);
    $cta_description      = get_field('cta_description', $postpageid);
    $cta_form_shortcode   = get_field('cta_form_shortcode', $postpageid);
    
    // $cta_desktop_img     = get_field('cta_desktop_img', $postpageid);
    // $cta_tablet_img      = get_field('cta_tablet_img', $postpageid);
    // $cta_mobile_image    = get_field('cta_mobile_image', $postpageid);

    // $cta_tablet_img      = $cta_tablet_img ? $cta_tablet_img : $cta_desktop_img;
    // $cta_mobile_image    = $cta_mobile_image ? $cta_mobile_image : $cta_desktop_img;

    // $cta_button_text     = get_field('cta_button_text', $postpageid);
    // $cta_button_link     = get_field('cta_button_link', $postpageid);

    if( ! empty( $cta_form_shortcode )){$formcls = "-form";}

    if( ! empty( $cta_description || $cta_form_shortcode )){
        $cta_panel .='
        <section class="cta'.$formcls.'">
            <div class="container">
                <div class="cta'.$formcls.'-main flex">';
                    if( ! empty( $cta_icon || $cta_sub_heading )){
                        $cta_panel .=' 
                        <div class="cta'.$formcls.'-left">
                            <div class="section-head">';
                                if( ! empty( $cta_icon )){
                                    $cta_panel .='
                                    <div class="sh-icon">
                                        <img src="'.$cta_icon['url'].'" alt="'.$cta_icon['alt'].'" title="'.$cta_icon['title'].'"> 
                                    </div>';
                                }                       
                                if( ! empty( $cta_sub_heading )){
                                    $cta_panel .='
                                    <div class="sh-title"><span>'.$cta_sub_heading.'</span></div>';
                                }
                            $cta_panel .='</div>';
                            if( ! empty( $cta_heading )){
                                    $cta_panel .='<span class="h1">'.$cta_heading.'</span>';
                            }
                            if( ! empty( $cta_description )){
                                    $cta_panel .= $cta_description;
                            }
                            // if(!empty($cta_button_text & $cta_button_link)){
                            //     $cta_panel .=
                            //     '<a href="'.$cta_button_link.'" class="button">'.$cta_button_text.'</a>';
                            // }
                        $cta_panel .='</div>';
                    }
                    if( ! empty( $cta_form_shortcode )){
                        $cta_panel .='
                        <div class="cta-form-right">
                            <div class="ctaform">
                                '.do_shortcode($cta_form_shortcode).'
                            </div>
                        </div>';
                    }

                    // if(!empty($cta_desktop_img)){
                    //     $cta_panel .='
                    //     <div class="cta-right">
                    //         <div class="cta-image">
                    //             <div class="desktop">
                    //                 <img src="'.$cta_desktop_img['url'].'" alt="'.$cta_desktop_img['alt'].'" title="'.$cta_desktop_img['title'].'">
                    //             </div>
                    //             <div class="tablet">
                    //                 <img src="'.$cta_tablet_img['url'].'" alt="'.$cta_tablet_img['alt'].'" title="'.$cta_tablet_img['title'].'">
                    //             </div>
                    //             <div class="mobile">
                    //                 <img src="'.$cta_mobile_image['url'].'" alt="'.$cta_mobile_image['alt'].'" title="'.$cta_mobile_image['title'].'">
                    //             </div>
                    //         </div>
                    //     </div>';
                    // }

                    $cta_panel .='</div>
                  </div>
        </section>';
    }

    return $cta_panel;
}


add_shortcode( 'practicename', 'get_the_title');
add_filter('acf/format_value/type=text', 'do_shortcode');

function get_the_testimonial($postpageid){

    $testimonial                    = "";
    $testimonial_content            = get_field('testimonial_content', $postpageid);
    $testimonial_author_image       = get_field('testimonial_author_image', $postpageid);
    $testimonial_author_name        = get_field('testimonial_author_name', $postpageid);
    $testimonial_author_designation = get_field('testimonial_author_designation', $postpageid);
    if( is_page_template( 'templates/standalone.php' )){ $hide_desktop = "author-main hide-tab show-mobile hide-desktop";}
    else{$hide_desktop="author-main hide-tab show-mobile";}
    if( ! empty( $testimonial_content ) ){
        $testimonial .= '     
        <section class="single-testimonial">
            <div class="container">
                <div class="single-testimonial-inner">
                    <div class="single-testimonial-cnt">
                        '.$testimonial_content.'
                        <div class="'.$hide_desktop.'">';
                            if( ! empty( $testimonial_author_image ) ){
                                    $testimonial .= '
                                    <div class="author-thumb hide-desktop">
                                        <img src="'.$testimonial_author_image['url'].'" alt="'.$testimonial_author_image['alt'].'" title="'.$testimonial_author_image['title'].'"/>
                                    </div>';
                            } if( ! empty( $testimonial_author_name ) ){
                                        $testimonial .= '
                                        <div class="author-info">
                                            <span class="author-name">'.$testimonial_author_name.'</span>';
                                             if( ! empty( $testimonial_author_designation ) ){
                                                $testimonial .= '<span class="author-designation">'.$testimonial_author_designation.'</span>';
                                             } 
                                        $testimonial .= '</div>';
                            }
                        $testimonial .= '</div>
                    </div>
                    <div class="author-main hide-mobile show-tab">';
                        if( ! empty( $testimonial_author_image ) ){
                                $testimonial .= '
                                <div class="author-thumb">
                                    <img src="'.$testimonial_author_image['url'].'" alt="'.$testimonial_author_image['alt'].'" title="'.$testimonial_author_image['title'].'"/>
                                </div>';
                        } if( ! empty( $testimonial_author_name ) ){
                                $testimonial .= '
                                <div class="author-info hide-desktop">
                                    <span class="author-name">'.$testimonial_author_name.'</span>';
                                    if( ! empty( $testimonial_author_designation ) ){
                                        $testimonial .= '<span class="author-designation">'.$testimonial_author_designation.'</span>';
                                    }
                                $testimonial .= '</div>';
                        }
                    $testimonial .= '
                    </div>
                </div>
            </div>
        </section>';
    }
    return $testimonial;
}

function get_the_featured_insights($postpageid){
   $featuredinsights           = "";
    $featured_insight_heading   = get_field('featured_insight_heading', $postpageid);
    $featured_insight_heading   = $featured_insight_heading ? $featured_insight_heading : "Featured Insights";
    $featured_insights          = get_field('featured_insights', $postpageid);
    $default_insight_posts      = get_posts( array(
                                        'posts_per_page' => 3,
                                        'category'       => 2,
                                        'orderby'        => 'date',
                                        'order'          => 'DESC',
                                    ) );
    $featured_insights          = $featured_insights ? $featured_insights : $default_insight_posts;

    if(!empty($featured_insights)){
        $featuredinsights .= '
        <section class="feature-insights">
            <div class="container">
                <div class="feature-insights-main">';
                    if( ! empty( $featured_insight_heading )){
                            $featuredinsights .= '
                            <div class="heading-title flex flex-vcenter">
                                <div class="heading-left"><h3>'.$featured_insight_heading.'</h3></div>
                                <div class="heading-right hide-mobile"><a href="'.get_category_link(2).'" class="button">More Insights</a></div>
                            </div>';
                    }
                    $featuredinsights .= '
                    <div class="feature-insights-lists flex">';
                        foreach ( $featured_insights as $post ) : 
                                setup_postdata( $post );
                                $featured_insight_image     = get_the_post_thumbnail($post->ID);
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
                                $featuredinsights .= '
                                <div class="feature-lists">
                                    <div class="thumbnail">
                                    <a href="'.get_the_permalink($post->ID).'">'.$featured_insight_image.'</a>
                                        </div>
                                        <span class="feature-icon flex flex-vcenter"><img src="'.get_stylesheet_directory_uri().'/images/category-icon.png" alt="Newspaper" title="Newspaper">'.$icat.' </span>
                                        <h3><a href="'.get_the_permalink($post->ID).'">'.get_the_title($post->ID).'</a></h3>
                                </div>';
                        endforeach; 
                        wp_reset_postdata();
                    $featuredinsights .= '</div>
                      <div class="show-mobile hide-desktop">
                      <a href="'.get_category_link(2).'" class="button">More Insights</a>
                      </div>
                  </div>
                  </div>
        </section>';
    }
    return $featuredinsights;

}


function testimonial_fun(){
    global $post;
    $postpageid = $post->ID;
    $testimonial_content            = get_field('testimonial_content', $postpageid);
    $testimonial_author_image       = get_field('testimonial_author_image', $postpageid);
    $testimonial_author_name        = get_field('testimonial_author_name', $postpageid);
   $testimonial_author_designation = get_field('testimonial_author_designation', $postpageid);
$testimonial ="";
$testimonial .='<div class="single-testimonial">
                    <div class="single-testimonial-inner">
                        <div class="single-testimonial-cnt">'.$testimonial_content.
                            '<div class="author-main hide-tab show-mobile hide-desktop">';
                                if(!empty($testimonial_author_image)){
                                     $testimonial .= 
                                     '<div class="author-thumb"><img src="'.$testimonial_author_image['url'].'" alt="'.$testimonial_author_image['alt'].'" title="'.$testimonial_author_image['title'].'"/></div>';
                                } 
                                $testimonial .= '<div class="author-info"><span class="author-name">'.$testimonial_author_name.'</span><span class="author-designation">'.$testimonial_author_designation.'</span></div>
                            </div>
                        </div>';
                        $testimonial .= '<div class="author-main hide-mobile show-tab">';
                            if(!empty($testimonial_author_image)){
                                $testimonial .='<div class="author-thumb"><img src="'.$testimonial_author_image['url'].'" alt="'.$testimonial_author_image['alt'].'" title="'.$testimonial_author_image['title'].'"/></div>';
                            }
                        $testimonial .='<div class="author-info"><span class="author-name">'.$testimonial_author_name.'</span><span class="author-designation">'.$testimonial_author_designation.'</span></div>
                        </div>
                    </div>
                </div>';

return $testimonial;
}
add_shortcode('testimonial','testimonial_fun');

function image_fun(){
global $post;
$expertise_page_content_icon  = get_field('expertise_page_content_icon',$post->ID);
$expertise_page_content_image = get_field('expertise_page_content_image',$post->ID);
$expertise_page_content_image_caption = get_field('expertise_page_content_image_caption',$post->ID);
$img="";
if(!empty($expertise_page_content_image)){
$img .='<div class="wp-caption">';
$img .='<img src="'.$expertise_page_content_image['url'].'" alt="'.$expertise_page_content_image['alt'].'" title="'.$expertise_page_content_image['title'].'">';
if(!empty($expertise_page_content_image_caption)){ 
    $img .='<div class="wp-caption-text">
                          <span><img src="'.$expertise_page_content_icon['url'].'" alt="'.$expertise_page_content_icon['alt'].'" title="'.$expertise_page_content_icon['title'].'"/></span>';
    $img .='<p>'.$expertise_page_content_image_caption.'</p></div>';
    }
$img .='</div>';
}
return $img;
}
add_shortcode('fosterimage','image_fun');

function people_menu(){
    $select_partner_counsel = get_field('select_partner_counsel','option');
    $select_lawyer = get_field('select_lawyer','option');
    $select_plaintiff_coordinator = get_field('select_plaintiff_coordinator','option');
    $select_administrator = get_field('select_administrator','option');
    global $post;
    $current_page = $post->ID ? $post->ID : 0;
   
    ?>
 
            <ul class="desktop_hide_menu main_menu flex">
                <li class="menu-item-has-children people-menu foster-people">
                    <a href="<?php echo get_category_link(4); ?>">Our People</a>
                    <ul class="sub-menu">
                        <li><a href="#">Partners & Counsel</a>
                            <ul class="sub-menu">
                                <?php foreach ( $select_partner_counsel as $post ) : setup_postdata( $post );   
                                    $our_people_image   = get_field('our_people_image',$post->ID); 
                                    $people_id = $post->ID;
                                    ?>
                                    <li <?php if($current_page == $people_id) {?> class="active-practice" <?php } ?>><a href="<?php echo get_the_permalink($post->ID) ?>"><img src="<?php echo $our_people_image['url']; ?>" alt="<?php echo $our_people_image['alt']; ?>" title="<?php echo $our_people_image['title']; ?>"/><?php echo get_the_title($post->ID); ?></a></li>
                                 <?php endforeach;  wp_reset_postdata();?>
                            </ul>
                        </li> 
                        <li><a href="#">Lawyers</a>
                            <ul class="sub-menu">
                                <?php foreach ( $select_lawyer as $post ) : setup_postdata( $post );   
                                    $our_people_image   = get_field('our_people_image',$post->ID);
                                    $people_id = $post->ID; ?>
                                    <li <?php if($current_page == $people_id) {?> class="active-practice" <?php } ?>><a href="<?php echo get_the_permalink($post->ID) ?>"><img src="<?php echo $our_people_image['url']; ?>" alt="<?php echo $our_people_image['alt']; ?>" title="<?php echo $our_people_image['title']; ?>"/><?php echo get_the_title($post->ID); ?></a></li>
                                <?php endforeach;  wp_reset_postdata();?>
                            </ul>
                        </li>
                        <li>
                        <ul class="sub-menu">
                            <a href="#">PLAINTIFF COORDINATOR</a>
                                <?php foreach ( $select_plaintiff_coordinator as $post ) : setup_postdata( $post );  
                                 $our_people_image   = get_field('our_people_image',$post->ID); 
                                 $people_id = $post->ID;?>
                                    <li <?php if($current_page == $people_id) {?> class="active-practice" <?php } ?>><a href="<?php echo get_the_permalink($post->ID) ?>"><img src="<?php echo $our_people_image['url']; ?>" alt="<?php echo $our_people_image['alt']; ?>" title="<?php echo $our_people_image['title']; ?>"/><?php echo get_the_title($post->ID); ?></a></li>
                                <?php endforeach;  wp_reset_postdata();?>
                        </ul>
                        <ul class="sub-menu">
                            <a href="#">ADMINISTRATION</a>
                            <?php get_admins_text(); ?>
                        </ul>
                    </ul>
                </li>
            </ul>
        
<?php }


function people_mobile_menu(){
    $select_partner_counsel = get_field('select_partner_counsel','option');
    $select_lawyer = get_field('select_lawyer','option');
    $select_plaintiff_coordinator = get_field('select_plaintiff_coordinator','option');
    $select_administrator = get_field('select_administrator','option');
    ?>
 
            <ul class="mobile_hide_menu main_menu flex">
                <li class="menu-item-has-children people-menu foster-people">
                    <a href="<?php echo get_category_link(4); ?>">Our People</a>
                    <ul class="sub-menu">
                        <li><a href="#">Partners & Counsel</a>
                            <ul class="sub-menu">
                                <?php foreach ( $select_partner_counsel as $post ) : setup_postdata( $post );   
                                    $our_people_image   = get_field('our_people_image',$post->ID);


                                     ?>
                                    <li><a href="<?php echo get_the_permalink($post->ID) ?>"><img src="<?php echo $our_people_image['url']; ?>" alt="<?php echo $our_people_image['alt']; ?>" title="<?php echo $our_people_image['title']; ?>"/><?php echo get_the_title($post->ID); ?></a></li>
                                 <?php endforeach;  wp_reset_postdata();?>
                            </ul>
                        </li> 
                        <li><a href="#">Lawyers</a>
                            <ul class="sub-menu">
                                <?php foreach ( $select_lawyer as $post ) : setup_postdata( $post );   
                                    $our_people_image   = get_field('our_people_image',$post->ID); ?>
                                    <li><a href="<?php echo get_the_permalink($post->ID) ?>"><img src="<?php echo $our_people_image['url']; ?>" alt="<?php echo $our_people_image['alt']; ?>" title="<?php echo $our_people_image['title']; ?>"/><?php echo get_the_title($post->ID); ?></a></li>
                                <?php endforeach;  wp_reset_postdata();?>
                            </ul>
                        </li>
                        <li>
                        <ul class="sub-menu">
                            <a href="#">PLAINTIFF COORDINATOR</a>
                                <?php foreach ( $select_plaintiff_coordinator as $post ) : setup_postdata( $post );  
                                 $our_people_image   = get_field('our_people_image',$post->ID); ?>
                                    <li><a href="<?php echo get_the_permalink($post->ID) ?>"><img src="<?php echo $our_people_image['url']; ?>" alt="<?php echo $our_people_image['alt']; ?>" title="<?php echo $our_people_image['title']; ?>"/><?php echo get_the_title($post->ID); ?></a></li>
                                <?php endforeach;  wp_reset_postdata();?>
                        </ul>
                        <ul class="sub-menu">
                            <a href="#">ADMINISTRATION</a>
                            <?php get_admins_text(); ?>
                        </ul>
                    </ul>
                </li>
            </ul>
        
<?php }



function expertise_menu(){ 
    global $post;
    $current_page = $post->ID;
    $select_practices = get_field('select_practices','option'); ?>
    <ul class="desktop_hide_menu main_menu flex">
        <li class="menu-item-has-children foster-expertise"><a href="<?php echo get_the_permalink(17); ?>"><?php echo get_the_title(17); ?></a>
            <ul class="sub-menu">
                <?php foreach ( $select_practices as $post ) : setup_postdata( $post ); 
                       $menu_icon   = get_field('menu_icon',$post->ID);
                       $practice_id =  $post->ID; ?>
                        <li <?php if($current_page == $practice_id) {?> class="active-practice" <?php } ?>><a href="<?php echo get_the_permalink($post->ID) ?>"><img src="<?php echo $menu_icon['url']; ?>" alt="<?php echo $menu_icon['alt']; ?>" title="<?php echo $menu_icon['title']; ?>"/><?php echo get_the_title($post->ID); ?></a></li>
                <?php endforeach;  wp_reset_postdata();?>
            </ul>
        </li>
    </ul>
<?php }

function expertise_mobile_menu(){ 
     global $post;
    $current_page = $post->ID;
    $select_practices = get_field('select_practices','option'); ?>
    <ul class="mobile_hide_menu main_menu flex">
        <li class="menu-item-has-children foster-expertise"><a href="<?php echo get_the_permalink(17); ?>"><?php echo get_the_title(17); ?></a>
            <ul class="sub-menu">
                <?php foreach ( $select_practices as $post ) : setup_postdata( $post ); 
                       $menu_icon   = get_field('menu_icon',$post->ID); 
                       $practice_id =  $post->ID; ?>
                        <li <?php if($current_page == $practice_id) {?> class="active-practice" <?php } ?>><a href="<?php echo get_the_permalink($post->ID) ?>"><img src="<?php echo $menu_icon['url']; ?>" alt="<?php echo $menu_icon['alt']; ?>" title="<?php echo $menu_icon['title']; ?>"/><?php echo get_the_title($post->ID); ?></a></li>
                <?php endforeach;  wp_reset_postdata();?>
            </ul>
        </li>
    </ul>
<?php }

// Method 1: Filter.
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyB8dxzNsQ0GsvmSuIPk8qb199xvS1tbnXc';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

// Method 2: Setting.
function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyB8dxzNsQ0GsvmSuIPk8qb199xvS1tbnXc');
}
add_action('acf/init', 'my_acf_init');

function get_admins_text(){
if( have_rows('administrators','options') ): ?>
        <div class="admins">
            <?php while( have_rows('administrators','options') ): the_row();
                    $administrators_name = get_sub_field('administrators_name');
                    $administrators_title = get_sub_field('administrators_title');
                    $administrators_phone_number = get_sub_field('administrators_phone_number');
            ?>
            <div class="admin-row">
                <span class="admin"><?php echo $administrators_name; ?></span>
                <span class="admin-pos"><?php echo $administrators_title; ?></span>
                <span class="admin-contact"><a href="tel:<?php echo $administrators_phone_number; ?>"><?php echo $administrators_phone_number; ?></a></span>
            </div>
            <?php endwhile; ?>
        </div>
<?php endif;
}

function get_the_sidebar_blocks($cid, $sidebarpeople){
    if(!empty($sidebarpeople) || $cid == 5){ ?>
        <div class="side-bucket">
            <div class="buckets menu-nav">
                <div class="side-head drophead">
                    <span class="h4"><?php echo get_cat_name($cid); ?></span>
                </div>
                <div class="bucket-cnt">
                    <?php if($cid == 5) { get_admins_text(); } ?>
                    <?php if(!empty($sidebarpeople)){
                        $current_people_id =  $cid; ?>
                        <ul>
                            <?php foreach ( $sidebarpeople as $post ) : setup_postdata( $post ); 
                                    $sp_id = $post->ID;
                                    $our_people_image = get_field('our_people_image', $sp_id);
                                    $our_people_position_title = get_field('our_people_position_title', $sp_id);                                     
                                    ?>
                                    <li <?php if($current_people_id == $sp_id){ ?> class="active" <?php } ?>><a href="<?php echo get_the_permalink($sp_id); ?>"> 
                                    <?php if(!empty($our_people_image)){ ?>
                                        <span class="nav-thumb"><img src="<?php echo $our_people_image['url']; ?>" alt="<?php echo $our_people_image['alt']; ?>"></span> 
                                    <?php } ?>
                                    <span class="nav-cnt"> 
                                        <strong><?php echo get_the_title($sp_id); ?></strong> 
                                        <?php if(!empty($our_people_position_title)){ ?>
                                            <span><?php echo $our_people_position_title; ?></span> 
                                        <?php } ?> 
                                    </span></a>
                                    </li>
                            <?php endforeach; wp_reset_postdata();?>
                        </ul>
                     <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } 

add_filter( 'wp_calculate_image_srcset', '__return_false' );


function get_the_faq(){ 
    global $post;
    $foster_faq_heading = get_field('foster_faq_heading');
    $foster_faq_description = get_field('foster_faq_description');
    if ($post->post_parent == 17) {
        $faq_class = "expertise-faq-section";
    }else{
        $faq_class = "";
    }
    if( have_rows('foster_faq') ): ?>
<section class="foster-faq <?php echo $faq_class; ?>">
    <div class="container">
        <div class="faq-inner">
            <div class="faq-title">
                <?php if(!empty($foster_faq_heading)){ ?>
                     <h2><?php echo $foster_faq_heading; ?></h2>
                <?php }   if(!empty($foster_faq_description)){ 
                    echo $foster_faq_description;
                    }  ?>
            </div>
            <div class="faq-accordion">
            <?php while( have_rows('foster_faq') ): the_row();
                    $faq_heading     = get_sub_field('faq_heading');
                    $faq_description = get_sub_field('faq_description');
                    if(!empty($faq_heading &&  $faq_description)){ 
                if(!empty($faq_heading)){ ?>
                <h3 class="accordion-header">
                    <?php echo $faq_heading; ?>
                </h3>
                <?php } if(!empty($faq_description)){?>
                <div class="accordion-content">
                    <div class="accordion-list">
                        <?php echo $faq_description; ?>
                    </div>
                </div>
            <?php } } endwhile; ?>
            </div>
        </div>
    </div>
</section>
<?php 
endif;
}





?>