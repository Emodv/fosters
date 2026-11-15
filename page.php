<?php
get_header();
echo get_the_banner($post->ID); 
?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>    
		<section class="default-container-main">
			<div class="container">
				<div class="default-container-inner">
					<?php the_content();
					if(!is_page(1462)){
					?>
					<span class="foster-icon">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/foster-icon.png" alt="Fosters Law" title="Fosters Law"/>
					</span>
				   <?php } ?>
				</div>
			</div>
		</section>
    <?php endwhile; ?>
<?php endif; ?>

<?php 
echo get_the_cta_panel($post->ID, 'form');
echo get_the_featured_insights($post->ID);	  
get_footer(); 
?>