<?php
/*
Template Name: Motor Vehicle Accident Preliminary Form
*/
get_header();

echo get_the_banner($post ->ID); 

if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>    
		<section class="default-container-main">
			<div class="container">
				<div class="default-container-inner">
					<?php the_content(); ?>
					<span class="foster-icon">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/foster-icon.png" alt="Fosters Law" title="Fosters Law"/>
					</span>
				</div>
			</div>
		</section>
    <?php endwhile; ?>
<?php endif;  
get_footer();