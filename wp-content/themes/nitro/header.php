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

        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" id="header"><!-- HEADER NAV START -->
          <div class="container">
              
            <div class="col-md-4"> <!-- HEADER LEFT START--> 
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
              
            <div class="col-sm-8"><!--HEADER RIGHT START-->
                            
                    <div class="row hidden-sm hidden-xs"><!-- UTILITY MENU START-->
                        <div class="col-sm-12">
                            <ul class="nav" id="utility-nav">
                                <li class="navbar-right"><?php get_search_form(); ?></li>
                                <li class="navbar-text navbar-right"><a href="#" class="navbar-link"><span class="glyphicon glyphicon glyphicon-earphone"></span>Remote Support</a></li>
                                <li class="navbar-text navbar-right"><a href="#" class="navbar-link"><span class="glyphicon glyphicon glyphicon-earphone"></span>1-800-719-3307</a></li>
                            </ul>
                        </div>
                    </div><!-- UTILITY MENU END-->
                    
                    <div class="row"><!-- PRIMARY MENU START -->
                        <div class="col-sm-12">
                            <div class="collapse navbar-collapse" id="">   
                            <?php wp_nav_menu( array(
                                'theme_location' => 'primary',
                                'menu'            => 'menu',
                                'container'       => 'container',
                                'container_class' => 'container_class',
                                'container_id'    => 'container_id',
                                'menu_class'      => 'nav',
                                'menu_id'         => 'primary',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                //'before'          => '',
                                //'after'           => '',
                                //'link_before'     => '',
                                //'link_after'      => '',
                                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth'           => 0,
                                'walker'          => ''
                            )); ?>
                        </div><!-- Collapse -->
                    </div><!-- PRIMARY MENU END -->                    
                </div>
           
            </div>
        </div><!--HEADER RIGHT END-->
        </nav><!-- HEADER NAV END -->
        
