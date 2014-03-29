<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!--WORDPRESS PAGE TITLE-->
<title>
 <?php wp_title('|',true,'right'); ?>
 <?php bloginfo('name'); ?>
</title>

<?php wp_head(); ?>
    
 </head>
<body class="custom-background">
   <!-- Wrap all page content here -->
    <div id="wrap">

        <!-- HEADER NAVIGATION -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">
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
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-5">
              <p class="navbar-text navbar-right">Built by <a href="#" class="navbar-link">Net@Work Webteam</a></p>
            </div>
          </div>
        </nav>
