<?php

// **********  DEVELOPMENT ******** //
#This section calls non-minified CSS and Javascript. Un-comment this section when in development.

function bootstrap() 
	{
		wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/dist/css/bootstrap.css' );
		wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/dist/js/bootstrap.js', array( 'jquery' ) );
	}
	add_action( 'wp_enqueue_scripts', 'bootstrap' );

?>