<?php
        if(!is_archive('people') && !is_page_template( 'templates/standalone.php' )){
            signup();
        }
        $footer_bg_logo = get_field('footer_bg_logo','option');
        $footer_logo    = get_field('footer_logo','option');
        ?>
        </main>
    </div>    
    <footer class="footer">
        <div class="ftr-top">
            <div class="container">
                <div class="ftr-top-cnt flex">
                    <div class="ftr-tplt">
                        <div class="ftr-lt-top">
                            <?php if(!empty($footer_bg_logo)){?>
                                <div class="ftr-logo-bg"> 
                                    <img src="<?php echo $footer_bg_logo['url']; ?>" alt="<?php echo $footer_bg_logo['alt']; ?>" title="Fosters Law Logo"> 
                                </div>
                            <?php } if(!empty($footer_logo)){?>
                                    <span class="ftr-logo">
                                        <a href="<?php echo get_site_url(); ?>"><img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>"></a>
                                    </span>
                            <?php } if( have_rows('footer_social_media','options') ): ?>
                                        <div class="footer-social-media">
                                            <ul>
                                            <?php while( have_rows('footer_social_media','options') ): the_row();
                                                    $footer_social_media_icon = get_sub_field('footer_social_media_icon');
                                                    $footer_social_media_link = get_sub_field('footer_social_media_link');
                                            ?>
                                                <li><a href="<?php echo $footer_social_media_link; ?>" target="_blank"><img src="<?php echo $footer_social_media_icon['url']; ?>" alt="<?php echo $footer_social_media_icon['alt']; ?>"></a></li>
                                            <?php endwhile; ?>
                                            </ul>
                                        </div>
                            <?php endif; ?>
                       </div>
                    </div>
                    <?php 
                    $footer_menu = get_field('footer_menu','options');
                    if(!empty($footer_menu)){ ?>
                        <div class="ftr-txt">
                            <?php 
                                wp_nav_menu( array(
                                'menu' => $footer_menu,
                                'container' => false,
                                'items_wrap' => '<ul class="">%3$s</ul>',
                            )); ?>
                        </div>
                    <?php } ?>
    <?php if( have_rows('office_locations_details','options') ): ?>
            <div class="ftr-txt">
                <?php while( have_rows('office_locations_details','options') ): the_row();
                    $office_location_heading = get_sub_field('office_location_heading');
                    $office_location_address = get_sub_field('office_location_address');
                    $office_location_phone_number = get_sub_field('office_location_phone_number');
                    $office_location_fax_number   = get_sub_field('office_location_fax_number');
                ?>
                <address>
                    <?php if(!empty($office_location_heading)){?>
                        <span class="ofc-location"><?php echo $office_location_heading; ?></span>
                    <?php } if(!empty($office_location_address)){
                            echo $office_location_address;
                    }  if(!empty($office_location_phone_number)){ ?>
                      <span class="lrow"><a href="tel:<?php echo $office_location_phone_number; ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/images/phone.png" alt="Phone" title="Phone"><?php echo $office_location_phone_number; ?></a></span> 
                    <?php } if(!empty($office_location_fax_number)){ ?>
                      <span class="lrow"><a href="fax:<?php echo $office_location_fax_number; ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/images/fax.png" alt="Fax" title="Fax"><?php echo $office_location_fax_number; ?></a></span>
                    <?php } ?>
                </address>
                <?php endwhile;  ?>
            </div>
    <?php endif; ?>
    </div>
    </div>
    </div>
    <div class="ftr-btm">
        <div class="container">
            <div class="ftr-btmcnt flex">
                <div class="copy alignleft">
                  <p>© Copyright <?php echo date('Y');  ?> Fosters Law LLP. All rights reserved. <a href="#" style="margin-left: 12px; color: inherit; text-decoration: underline;">Back to top</a></p>
                </div>
                <?php 
                $copyright_menu = get_field('copyright_menu','options');
                if(!empty($footer_menu)){ ?>
                <div class="ftr-links alignright">
                    <?php 
                        wp_nav_menu( array(
                                'menu' => $copyright_menu,
                                'container' => false,
                                'items_wrap' => '<ul class="">%3$s</ul>',
                        )); ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    </footer>
    <?php // if(is_single()){
    if(!is_page_template( 'templates/standalone.php' )){
        global $post;
        $content_video = get_field('content_video',$post->ID);
        $image_video_cta_video_url = get_field('image_video_cta_video_url',$post->ID);
    }
   
    if(!empty($image_video_cta_video_url)){
    ?>
        <section class="overlay_main_sec">
            <div class="overlay_center flex flex-center">
                <div class="overlay-main"> <span class="connect_close"></span>
                    <div class="overlay-wrap" id="formid">
                         <video width="320" height="240" controls>
                          <source src="<?php echo $image_video_cta_video_url; ?>" type="video/mp4">
                        </video> 
                     </div>
                    <div class="overlay-wrap" id="video" style="display:none;">
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <?php
    if(!empty($image_video_cta_video_url)){
    ?>
        <section class="overlay_main_sec youtube_overlay">
            <div class="overlay_center flex flex-center">
                <div class="overlay-main"> <span class="connect_close"></span>
                    <div class="overlay-wrap" id="formid">
                        <iframe width="960" height="540" src="<?php echo $image_video_cta_video_url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                     </div>
                    <div class="overlay-wrap" id="video" style="display:none;">
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
   
   
      
    
 
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/retina.js"></script>

<style type="text/css">
.acf-map {
    width: 100%;
    height: 400px;
    border: #ccc solid 1px;
    margin: 20px 0;
}


.acf-map img {
   max-width: inherit !important;
}
</style>
<?php
if ( is_single() && 'careers' == get_post_type() ) {?>
<script>
    jQuery(document).ready(function(){
      jQuery('.foster-careers').addClass('current-menu-item');


    });
</script>

<?php } 
if(is_category(10)){ 
if(isset($_GET['category'])){ ?>
<script>
    jQuery(document).ready(function(){
        console.log("ctreter");
        jQuery('a.open-position').trigger('click');

    });
</script>
<?php } } 

if(is_single() && 'careers' == get_post_type()){
    if(isset($_GET['category'])){ ?>
        <script>
            jQuery(document).ready(function(){
                console.log("assa");
                jQuery('a.open-position').trigger('click');

            });
        </script>
    <?php }
} 

if ( is_page_template( 'templates/expertise.php' )) { ?>
<script>
    jQuery(document).ready(function(){
      jQuery('.foster-expertise').addClass('current-menu-item');
    });
</script>
     
<?php } 
if ( is_single() && 'people' == get_post_type()) { ?>
<script>
    jQuery(document).ready(function(){
      jQuery('.foster-people').addClass('current-menu-item');
    });
</script>

     
<?php } ?>
<!-- Include jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<script>
     function openVideoPopup(videoUrl) {
      jQuery.magnificPopup.open({
          items: {
              src: videoUrl
          },
          type: 'iframe',
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: false,
          fixedContentPos: false,
          closeBtnInside: true, // Ensures close button is inside the popup
          iframe: {
              markup: `
                  <div class="mfp-iframe-scaler">
                      <button title="Close" type="button" class="mfp-close sam">&times;</button>
                      <iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>
                  </div>`
          }
      });
  }
</script>


<?php wp_footer(); ?>
</body>
</html>