<!DOCTYPE html>
<html lang="en">

<head><!--HEAD START-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="author" content="">
    <title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head><!--HEAD END-->
    
<body class="custom-background woocommerce">
    <div id="wrap">       
        <nav class="navbar yamm navbar-default navbar-static-top" role="navigation" id="header"><!-- HEADER NAVSTART -->
          <div class="container">      
            <div class="col-xs-6 col-sm-3"> <!-- HEADER LEFT START--> 
              <div class="navbar-header">                                     
                <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
                  <img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>"><!--LOGO-->
                </a>            
              </div>
            </div><!-- HEADER LEFT END--> 
              
            <div class="col-xs-6 col-sm-9"><!--HEADER RIGHT START-->
                
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topnav"><!-- SPECIFY MOBILE MENU --> 
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>  
                
                    <div class="row hidden-sm hidden-xs"><!-- UTILITY MENU START-->
                        <div class="col-sm-12">
                            <ul class="nav" id="utility-nav">
                                <li class="navbar-right"><?php get_search_form(); ?></li>
                                <li class="navbar-text navbar-right"><a href="#" class="navbar-link"><span class="glyphicon glyphicon-comment"></span>  Remote Support</a></li>
                                <li class="navbar-text navbar-right"><a href="#" class="navbar-link"><span class="glyphicon glyphicon-earphone"></span>  1-800-719-3307</a></li>
                            </ul>
                        </div>
                    </div><!-- UTILITY MENU END-->
                    
                    <div class="row"><!-- PRIMARY MENU START -->
                        <div class="col-sm-12">
                            <div class="collapse navbar-collapse" id="topnav">
                                
                                    <ul class="nav navbar-nav navbar-right" id="primary">
                                        
                                        <!-- 4 --> 
                                        <li class="dropdown yamm-fw navbar-right"><a href="#">SUPPORT</a></li>
                                        
                                        <!-- 3 --> 
                                        <li class="dropdown yamm-fw navbar-right"><a href="/naw/example-grunt-project/wordpress/aboutus_1/">COMPANY</a></li>
                                        
                                        <!-- 2 -->                                       
                                        <li class="dropdown yamm-fw navbar-right">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">LEARNING CENTER</a>
                                            <ul class="dropdown-menu">
                                              <li class="yamm-content">
                                                <div class="row">
                                                  <div class="col-sm-6">
                                                      <?php wp_nav_menu( array(
                                                        'theme_location' => 'resources',
														//'menu'            => 'Learning Center',
                                                        'echo'            => true,
                                                        'fallback_cb'     => 'wp_page_menu',
                                                        'items_wrap'      => '<ul class="list-unstyled">%3$s</ul>',
                                                        'depth'           => 1,
                                                        'walker'          => ''
                                                    )); ?>
                                                    </div>
                                                    <div class="col-sm-6"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Resources')) : ?>[ Resources: Promotional Widget Area ]<?php endif; ?></div>
                                                </div>
                                              </li>
                                            </ul>
                                        </li>
                                        
                                        <!-- 1 --> 
                                        <li class="dropdown yamm-fw navbar-right">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">SOLUTIONS & SERVICES</a>
                                            <ul class="dropdown-menu">
                                              <li class="yamm-content">
                                                <div class="row">
                                                  <div class="col-sm-4">
                                                      <h4>Services</h4>
                                                      <?php wp_nav_menu( array(
                                                        'theme_location' => 'services',
														//'menu'            => 'Solutions and Services',
                                                         'echo'            => true,
                                                        'fallback_cb'     => 'wp_page_menu',
                                                        'items_wrap'      => '<ul class="list-unstyled">%3$s</ul>',
                                                        'depth'           => 1,
                                                        'walker'          => ''
                                                    )); ?></div>
                                                  <div class="col-sm-4"><h4>Products</h4>
                                                      <?php wp_nav_menu( array(
                                                        'theme_location' => 'products',
														//'menu'            => 'products',
                                                        'echo'            => true,
                                                        'fallback_cb'     => 'wp_page_menu',
                                                        'items_wrap'      => '<ul class="list-unstyled">%3$s</ul>',
                                                        'depth'           => 1,
                                                        'walker'          => ''
                                                    )); ?></div>
                                                  <div class="col-sm-4">
                                                      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Solutions')) : ?>
                                                        [ Services: Promotional Widget Area ]
                                                        <?php endif; ?> 
                                                  </div>
                                                </div>
                                              </li>
                                            </ul>
                                        </li>

                                    </ul>                                
  
                        </div><!-- Collapse -->
                    </div><!-- PRIMARY MENU END -->                    
                </div>
           
            </div>
        </div><!--HEADER RIGHT END-->
        </nav><!-- HEADER NAV END -->

        <!-- SHOW PAGE BANNER -->        
        <?php if ( is_page() || 'product' == get_post_type() ) { ?>
                
            <div class="page-banner">
                <div class="container">
                <div class="row">
                    <div class="col-xs-10">
                        <h1><span class="icon icon-pie"></span><?php the_title(); ?></h1>
                    </div>
                    <div class="col-xs-2 pull-right hidden-xs">
                        <button class="btn btn-default pull-right contact-us"><a href="/naw/example-grunt-project/wordpress/contact_1/"><span class="icon icon-bubbles"></span>CONTACT US</a></button>
                    </div>
                </div>
                </div>
            </div>
        <!-- BREADCRUMBS -->
        <div id="breadcrumbs-banner">
          <div class="container">
                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                } ?>
          </div>
        </div>
        
                
        <?php } else { ?>
              
            <!-- I'M NOT A PAGE SO I DON'T NEED PAGE HEADER --> 
        
        <?php }	?>