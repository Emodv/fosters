<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri();?>/images/favicon.ico"/>
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri();?>/images/favicon-16x16.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri();?>/images/favicon-32x32.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri();?>/images/apple-touch-icon.png">
<link rel="icon" type="image/vnd.microsoft.icon" sizes="150x150" href="<?php echo get_stylesheet_directory_uri();?>/images/mstile-150x150.png">
<link rel="icon" type="image/png" sizes="144x144" href="<?php echo get_stylesheet_directory_uri();?>/images/android-chrome-144x144.png">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" href="https://use.typekit.net/yiz1blc.css"/>
<script src="https://kit.fontawesome.com/3fdc272b79.js" crossorigin="anonymous"></script>
<script>/*<![CDATA[*/(function(w,a,b,d,s){w[a]=w[a]||{};w[a][b]=w[a][b]||{q:[],track:function(r,e,t){this.q.push({r:r,e:e,t:t||+new Date});}};var e=d.createElement(s);var f=d.getElementsByTagName(s)[0];e.async=1;e.src='//info.fosterslaw.ca/cdnr/forpci3/acton/bn/tracker/43907';f.parentNode.insertBefore(e,f);})(window,'ActOn','Beacon',document,'script');ActOn.Beacon.track();/*]]>*/</script>
	<?php wp_head(); ?>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TTBD5LK');</script>
<!-- End Google Tag Manager -->
		
	
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '4663841813707818');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=4663841813707818&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->	
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=647da2db40353a0019caf281&product=sop' async='async'></script>	
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TTBD5LK"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <?php 
    $main_logo = get_field('main_logo','option');
    $mobile_logo = get_field('mobile_logo','option'); ?> 
    
    <div id="main">
        <header id="main-header">
            <div class="container">
                <div class="header flex">
                    <?php if(!empty($main_logo)){ ?>
                        <div class="logo">
                            <a href="<?php echo get_site_url(); ?>"><img src="<?php echo $main_logo['url']; ?>" alt="<?php echo $main_logo['alt']; ?>"></a>
                        </div>
                    <?php } ?>
                    
                    <?php if(!empty($mobile_logo)){?>
                        <div class="mobile_logo"> 
                            <a href="<?php echo get_site_url(); ?>"><img src="<?php echo $mobile_logo['url']; ?>" alt="<?php echo $mobile_logo['alt']; ?>"></a>
                         </div>
                    <?php } if(is_page_template( 'templates/standalone.php' )){
                                    $standalone_button_text = get_field('standalone_mobile_button_text','option');
                                    $standalone_button_link = get_field('standalone_mobile_button_link','option');                                 
                                    
                                    ?>
                                    <div class="mobile-standalone-menu-wrapper flex">
                                        <?php if(!empty($standalone_button_text && $standalone_button_link)){ ?>
                                            <div><a href="sms:<?php echo $standalone_button_link; ?>" class="button"><?php echo $standalone_button_text; ?></a></div> 
                                        <?php } ?>                                      
                                    </div>
                        <?php } ?>
                      <?php  if(!is_page_template( 'templates/standalone.php' )){?>                    
                    <div class="toggle_button flex flex-center">
                        <span class="line line1"></span> <span class="line line2"></span> <span class="line line3"></span> 
                    </div>
                    <?php } ?>
                    <div class="header-right header-right mobile_menu">

                        <nav class="main-navigation">
                            <div class="menu-main-menu-container">                               
                                
                                <?php

                                if( !is_page_template( 'templates/standalone.php' )){
                                    people_menu(); 
                                expertise_menu();
                                    wp_nav_menu( array(
                                                    'menu' => 3,
                                                    'container' => false,
                                                    'items_wrap' => '<ul class="desktop_hide_menu main_menu flex">%3$s</ul>',
                                                ));
                                }else{
                                    
                                    $standalone_button_text = get_field('standalone_button_text','option');
                                    $standalone_button_link = get_field('standalone_button_link','option');
                                    $standalone_contact_text = get_field('standalone_contact_text','option');
                                    $standalone_contact      = get_field('standalone_contact_number','option');
                                    
                                    ?>
                                    <div class="standalone-menu-wrapper flex">
                                        <?php if(!empty($standalone_contact_text && $standalone_contact  )){ ?>
                                            <span class="text-us"><?php echo $standalone_contact_text; ?>
                                                <a href="sms:<?php echo $standalone_contact;  ?>"><?php echo $standalone_contact;  ?></a>
                                            </span>
                                        <?php } if(!empty($standalone_button_text && $standalone_button_link  )){ ?>
                                            <div><a href="<?php echo $standalone_button_link; ?>" class="button"><?php echo $standalone_button_text; ?></a></div> 
                                        <?php } ?>                                      
                                    </div>
                                <?php 
                                }
                                ?>
                            </div>
                            <div class="menu-mobile-main-menu-container">
                                <?php
                                    
                                    if( !is_page_template( 'templates/standalone.php' )){
                                        people_mobile_menu(); 
                                        expertise_mobile_menu();
                                             wp_nav_menu( array(
                                                    'menu' => 3,
                                                    'container' => false,
                                                    'items_wrap' => '<ul class="mobile_hide_menu main_menu flex">%3$s</ul>',
                                                ));
                                    } 
                                       ?>
                            
                            </div>
                            <div class="menu-top-menu-container">
                                <ul class="mobile-primary-menu flex">
                                    <li class="request_button"><a href="#">Request an Appointment</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
    </header>
    <main id="mainContent">