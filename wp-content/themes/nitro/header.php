<!DOCTYPE html>
<html lang="en">

<head><!--HEAD START-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head><!--HEAD END-->
    
<body class="custom-background">
    <div id="wrap">

        
        <nav class="navbar yamm navbar-default navbar-static-top" role="navigation" id="header"><!-- HEADER NAV START -->
          <div class="container">
              
            <div class="col-sm-3"> <!-- HEADER LEFT START--> 
              <div class="navbar-header">                        
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>               
                <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
                  <img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>"><!--LOGO-->
                </a>            
              </div>
            </div><!-- HEADER LEFT END--> 
              
            <div class="col-sm-9"><!--HEADER RIGHT START-->
                            
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
                            <div class="collapse navbar-collapse" id="">
                                
                                    <ul class="nav navbar-nav navbar-right" id="primary">
                                        
                                        <!-- 4 --> 
                                        <li class="dropdown yamm-fw navbar-right"><a href="#">SUPPORT</a></li>
                                        
                                        <!-- 3 --> 
                                        <li class="dropdown yamm-fw navbar-right"><a href="#">COMPANY</a></li>
                                        
                                        <!-- 2 -->                                       
                                        <li class="dropdown yamm-fw navbar-right">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">LEARNING CENTER <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                              <li class="yamm-content">
                                                <div class="row">
                                                  <div class="col-sm-6">
                                                      <?php wp_nav_menu( array(
                                                        'theme_location' => 'resources',
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
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">SOLUTIONS & SERVICES <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                              <li class="yamm-content">
                                                <div class="row">
                                                  <div class="col-sm-4">
                                                      <h4>Services</h4>
                                                      <?php wp_nav_menu( array(
                                                        'theme_location' => 'services',
                                                         'echo'            => true,
                                                        'fallback_cb'     => 'wp_page_menu',
                                                        'items_wrap'      => '<ul class="list-unstyled">%3$s</ul>',
                                                        'depth'           => 1,
                                                        'walker'          => ''
                                                    )); ?></div>
                                                  <div class="col-sm-4"><h4>Products</h4>
                                                      <?php wp_nav_menu( array(
                                                        'theme_location' => 'products',
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
        
<?php if ( is_page() ) { ?>
        
     <p>I'm a Page.</p>   
        
<?php } else { ?>
     
    <p>I'm not a Page.</p>    
        
<?php }	?>