<?php
// Our include
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');
// Our variables
$postType = (isset($_GET['postType'])) ? $_GET['postType'] : 'post';
$category = (isset($_GET['category'])) ? $_GET['category'] : '';
$author_id = (isset($_GET['author'])) ? $_GET['author'] : '';
$taxonomy = (isset($_GET['taxonomy'])) ? $_GET['taxonomy'] : '';
$tag = (isset($_GET['tag'])) ? $_GET['tag'] : '';
$exclude = (isset($_GET['postNotIn'])) ? $_GET['postNotIn'] : '';
$numPosts = (isset($_GET['numPosts'])) ? $_GET['numPosts'] : 6;
$page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;
$year = (isset($_GET['year'])) ? $_GET['year'] : 0;
$month = (isset($_GET['month'])) ? $_GET['month'] : 0;
$searchblog = (isset($_GET['searchblog'])) ? $_GET['searchblog'] : 0;
$order = (isset($_GET['order'])) ? $_GET['order'] : 'DESC';
$views = (isset($_GET['option'])) ? $_GET['option'] : 0;
//Set up our initial query arguments
if ($searchblog != '') {

    $args = array(
        's' => $searchblog,
        'post_type' => $postType,
        'category' => $category,
        'author' => $author_id,
        'monthnum' => $month,
        'year' => $year,
        'posts_per_page' => $numPosts,
        'paged' => $page,
        'orderby' => 'date',
        'order' => $order,
        'post_status' => 'publish',
    );
    
} else {

$args = array(
        'post_type' => $postType,
        'category' => $category,
        'author' => $author_id,
        'monthnum' => $month,
        'year' => $year,
        'paged' => $page,
	    'orderby' => 'date',
        'order' => $order,
        'posts_per_page' => $numPosts,
    );
}

if (!empty($exclude)) {
    $exclude = explode(",", $exclude);
    $args['post__not_in'] = $exclude;
}

// Query by Taxonomy
$myposts = get_posts( $args );
//echo $num_post =  count($myposts);

?>
<?php if($myposts): ?>
<span id="more-blog" style="">
    <div class="insights-lists flex">
<?php 
$i=1;
foreach ( $myposts as $post ) : setup_postdata( $post ); 
        $post_image   = get_the_post_thumbnail( $post->ID, 'full' );
        $short_description = get_field('short_description',$post->ID);
    
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

        if($i==7){ ?>
            <div class="insights-list"> 
                    <div class="insight-big flex">
                        <div class="insight-cnt">
                            <small>Featured Insight</small>
                            <span class="h2"><a href="<?php the_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></span> 
                            <hr>
                            <p><?php echo $short_description; ?></p>
                            <a href="<?php the_permalink($post->ID); ?>" class="button">Read More</a>
                        </div>
                        <?php if(!empty($post_image)){ ?>
                            <div class="thumbnail">
                                <a href="<?php the_permalink($post->ID); ?>"><?php echo $post_image; ?></a>
                            </div>
                        <?php } ?>
                    </div>
            </div> <!-- end of insights list -->
        <?php  } else{ ?>
        <div class="insights-list" data-num="<?php echo $i; ?>">
            <?php if(!empty($post_image)){ ?> 
                <a href="<?php the_permalink($post->ID); ?>"><?php echo $post_image; ?></a>
            <?php } ?>
            <span class="feature-icon flex flex-vcenter">
                <img src="<?php echo get_stylesheet_directory_uri();?>/images/category-icon.png" alt="Newspaper" title="Newspaper">
               <?php echo $icat; ?>
            </span>
            <h3><a href="<?php the_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></h3>               
        </div> <!-- end of insights list -->
            

<?php } $i++; endforeach; wp_reset_postdata(); ?>
</div>
</span>
<?php endif;
