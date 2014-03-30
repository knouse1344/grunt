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
                                <li class="navbar-text navbar-right"><a href="#" class="navbar-link"><span class="glyphicon glyphicon glyphicon-earphone"></span> Remote Support</a></li>
                                <li class="navbar-text navbar-right"><a href="#" class="navbar-link"><span class="glyphicon glyphicon glyphicon-earphone"></span> 1-800-719-3307</a></li>
                            </ul>
                        </div>
                    </div><!-- UTILITY MENU END-->
                    
                    <div class="row"><!-- PRIMARY MENU START -->
                        <div class="col-sm-12">
                            <div class="collapse navbar-collapse" id="">
                                
                                    <ul class="nav navbar-nav">
                                        
                                        
                                        <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Grid<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                              <li class="grid-demo">
                                                <div class="row">
                                                  <div class="col-sm-12">.col-sm-12</div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-sm-6">.col-sm-6</div>
                                                  <div class="col-sm-6">.col-sm-6</div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-sm-4">.col-sm-4</div>
                                                  <div class="col-sm-4">.col-sm-4</div>
                                                  <div class="col-sm-4">.col-sm-4</div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-sm-3">.col-sm-3</div>
                                                  <div class="col-sm-3">.col-sm-3</div>
                                                  <div class="col-sm-3">.col-sm-3</div>
                                                  <div class="col-sm-3">.col-sm-3</div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-sm-2">.col-sm-2</div>
                                                  <div class="col-sm-2">.col-sm-2</div>
                                                  <div class="col-sm-2">.col-sm-2</div>
                                                  <div class="col-sm-2">.col-sm-2</div>
                                                  <div class="col-sm-2">.col-sm-2</div>
                                                  <div class="col-sm-2">.col-sm-2</div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-sm-1">.col-sm-1</div>
                                                  <div class="col-sm-1">.col-sm-1</div>
                                                  <div class="col-sm-1">.col-sm-1</div>
                                                  <div class="col-sm-1">.col-sm-1</div>
                                                  <div class="col-sm-1">.col-sm-1</div>
                                                  <div class="col-sm-1">.col-sm-1</div>
                                                  <div class="col-sm-1">.col-sm-1</div>
                                                  <div class="col-sm-1">.col-sm-1</div>
                                                  <div class="col-sm-1">.col-sm-1</div>
                                                  <div class="col-sm-1">.col-sm-1</div>
                                                  <div class="col-sm-1">.col-sm-1</div>
                                                  <div class="col-sm-1">.col-sm-1</div>
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
        
