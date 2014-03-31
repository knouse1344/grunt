<?php
	##### Products Shortcode #####
	// create shortcode with parameters so that the user can define what's queried - default is to list all blog posts
	add_shortcode( 'products', 'naw_product_shortcode' );
	function naw_product_shortcode( $atts ) {
		ob_start();
	 
		// define attributes and their defaults
		extract( shortcode_atts( array (
			'type' => 'product',
			'order' => 'date',
			'orderby' => 'title',
			'posts' => -1,
			'category' => '',
			'tag' => '',
		), $atts ) );
	 
		// define query parameters based on attributes
		$options = array(
			'post_type' => $type,
			'order' => $order,
			'orderby' => $orderby,
			'posts_per_page' => $posts,
			'category_name' => $category,
			'tag' => $tag,
		);
		$query = new WP_Query( $options );?>
		
		<?php if ( $query->have_posts() ) { 
			 while ( $query->have_posts() ) : $query->the_post(); ?>
			 
					<div class="col-sm-4 col-md-4 productwrap" style="padding-right: 0px;padding-left: 10px;">
					<?php if (has_post_thumbnail( $post->ID ) ){
					 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); }?>
					<a href="<?php echo get_permalink( $post->ID ); ?>"><img src="<?php echo $image[0] ?>" alt="<?php echo get_the_title( $post->ID ); ?>" width="100%"></a>
					<div class="caption">
						<a href="<?php echo get_permalink( $post->ID ); ?>" rel="product"><h4 class="producthead"><span class="glyphicon glyphicon-play"></span>  <?php echo get_the_title( $post->ID ); ?></h4>
						<?php the_content('more'); ?></a>
					</div>
					</div>
			<?php endwhile;?>
			<?php wp_reset_query(); ?>
		
		   <?php
			$myvariable = ob_get_clean();
			return $myvariable;
		}
	}

	//[products posts="3"]
	##################################################################################################################################
	#### Testimonial Shortcode ####

	// create shortcode with parameters so that the user can define what's queried - default is to list all blog posts
	add_shortcode( 'testimonial', 'naw_testimonial_shortcode' );
	function naw_testimonial_shortcode( $atts ) {
		ob_start();
		
		// define attributes and their defaults
		extract( shortcode_atts( array (
			'postid' => '',
			'type' => 'testimonial',
			'order' => '',
			'orderby' => '',
			'posts' => 1,
			'category' => '',
			'tag'=> '',
		), $atts ) );
	 
		// define query parameters based on attributes
		$options = array(
			'p' => $postid,
			'post_type' => $type,
			'order' => $order,
			'orderby' => $orderby,
			'posts_per_page' => $posts+1,
			'category_name' => $category,
			'tag->name' => $tag,
		);
		$query = new WP_Query( $options );
		global $post;
		// run the loop based on the query
		if ( $query->have_posts() ) { ?>
			<div class="media">
				
				   <?php while ( $query->have_posts() ) : $query->the_post(); ?>
							<?php
							//echo $tag;
							$tags = wp_get_post_tags($post->ID);
							foreach ($tags as $posttag)
							{
								//echo $posttag->name;
								if (strcasecmp($posttag->name, $tag) == 0)
								{
							?>
										<?php if (has_post_thumbnail( $post->ID ) ): ?>
										<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
										
										<img class="media-object pull-left" src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title( $post->ID ); ?>">
									  <?php endif; ?>
									<div class="media-body">
										<div class="media-heading"><?php //global $more;    // Declare global $more (before the loop).
																		//$more = 0;       // Set (inside the loop) to display content above the more tag.
																the_content(); ?>
										</div>
									</div>
								<?php
								}
							}?>
					<?php endwhile; ?>
				
				<?php wp_reset_query(); ?>
			</div>
		<?php
			$myvariable = ob_get_clean();
			return $myvariable;
		}
	}

	//[testimonial tag='sage hrms' posts='1']
	########################################################################################################################
	###### Posts Shortcodes ######
	
	// create shortcode with parameters so that the user can define what's queried - default is to list all blog posts
	add_shortcode( 'list-posts', 'naw_post_shortcode' );
	function naw_post_shortcode( $atts ) {
		ob_start();
	 
		// define attributes and their defaults
		extract( shortcode_atts( array (
			'type' => 'post',
			'order' => 'date',
			'orderby' => 'title',
			'posts' => -1,
			'color' => '',
			'fabric' => '',
			'category' => '',
			'tag' => '',
		), $atts ) );
	 
		// define query parameters based on attributes
		$options = array(
			'post_type' => $type,
			'order' => $order,
			'orderby' => $orderby,
			'posts_per_page' => $posts,
			'color' => $color,
			'fabric' => $fabric,
			'category_name' => $category,
			'tag' => $tag,
		);
		$query = new WP_Query( $options );
		// run the loop based on the query
		if ( $query->have_posts() ) { ?>
			<ul class="clothes-listing ">
				<ul class="clothes-listing ">
				   <?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<h5><span style="font-size:12px;"><?php the_date(); ?></span> - <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="verdana13bluehot"><?php the_title();?></a></h5>
		<?php endwhile; ?>
				</ul>
			</ul>
		<?php
			$myvariable = ob_get_clean();
			return $myvariable;
		}
	}
	//[list-posts type="press" orderby="name" order="ASC" posts="5"]
	##########################################################################################
	##### Actions Shortcode #####

	add_shortcode( 'add_actions', 'naw_action_shortcode' );
	function naw_action_shortcode( $atts ) {
		ob_start();
	 
		// define attributes and their defaults
		extract( shortcode_atts( array (
			'type' => 'calltoaction',
			'order' => 'date',
			'orderby' => 'title',
			'posts' => -1,
			'category' => '',
			'tag' => '',
		), $atts ) );
	 
		// define query parameters based on attributes
		$options = array(
			'post_type' => $type,
			'order' => $order,
			'orderby' => $orderby,
			'posts_per_page' => $posts,
			'category_name' => $category,
			'tag' => $tag,
		);
		$query = new WP_Query( $options );
		// run the loop based on the query
		if ( $query->have_posts() ) { ?>
			<div class="panel panel-default">
				
				   <?php while ( $query->have_posts() ) : $query->the_post(); ?>
		   
				   <div class="panel-heading">
							<h2 class="panel-title"> <?php the_title();?></h2>
						</div>
						<div class="panel-collapse">
							<div class="panel-body">
								<?php the_content(); ?>
							</div>
						</div>
		<?php endwhile; ?>
				
			</div>
		<?php
			$myvariable = ob_get_clean();
			return $myvariable;
		}
	}
	#########################################################################################################
	##### Quote #####
	function naw_shortcode_quote( $atts, $content = null ) {
	// [quote quote_footer="Author Name" quote_title="Title of the Author"] Content [/quote]
		extract(shortcode_atts(array(
		"quote_footer" => 'Author Name',
		"quote_title" => 'Title of the Author'
		), $atts));
	
		$return = '<blockquote>  <p>'.$content.'</p>';
		$return .= '<footer><strong> - ' .$quote_footer. '</strong><br/><cite title="Source Title"><i>' .$quote_title. '</i></cite></footer></blockquote>';
		return $return;
	}
	add_shortcode('quote', 'naw_shortcode_quote');
	
	#############################################################################################################
	##### Link Button ######
	function naw_shortcode_button( $atts, $content = null ) {
	// [linkbutton type='primary' link="#" size="btn-sm,btn-lg,btn-xs"] Download [/linkbutton]
		extract(shortcode_atts(array(
		"type" => 'primary',
		"link" => '#',
		"size" => 'btn-sm'
		), $atts));
		return '<a class="btn btn-'.$type.' ' .$size.'" href="'.$link.'" role="button">' . do_shortcode($content) . '</a>';
	
	}
	add_shortcode('linkbutton', 'naw_shortcode_button');
	
	#############################################################################################################
	##### PDF Icon ######
	add_shortcode('pdficon', 'naw_shortcode_pdficon');
	function naw_shortcode_pdficon( $atts) {
	// [pdficon link="#" align='left']
		ob_start();
		extract(shortcode_atts(array(
		"link" => '#',
		"align"=> 'left'
		), $atts));
		return '<a href="'.$link.'" class="pdflink" target="_blank"><img class="alignleft size-full wp-image-1949" alt="pdf-icon32" src="/wp-content/uploads/2014/02/pdf-icon32.png" width="32" height="32" /></a>';
	$myvariable = ob_get_clean();
			return $myvariable;
	
	}
#############################################################################################################
##### Webinars Shortcode ######	
	add_shortcode( 'webinars', 'naw_webinars_shortcode' );
	function naw_webinars_shortcode( $atts ) {
		ob_start();
	 
		// define attributes and their defaults
		extract( shortcode_atts( array (
			'type' => 'product',
			'orderby' => 'date',
			'order' => 'DESC',
			'posts' => -1,
			'category' => '',
		), $atts ) );
	 
		// define query parameters based on attributes
		$options = array(
			'post_type' => $type,
			'orderby' => $orderby,
			'order' => $order,
			'posts_per_page' => $posts,
			'category_name' => $category,
		);
		$pgtitle = get_post( $post )->post_title;
		$query = new WP_Query( $options );?>
		<table width='100%'>
		<?php if ( $query->have_posts() ) { 
			 while ( $query->have_posts() ) : $query->the_post(); 
				$tags_obj = wp_get_post_tags(get_the_ID());
				foreach($tags_obj as $tagA)				
				{
					$tag_name = $tagA->name;
					//compare tags with page title and exclude first one
					if(strcasecmp($tagA->name, $pgtitle) == 0)
					{
				?>
				<tr style = "border-bottom:1px solid #bdbdbd;">
					<?php	
					$nawdate = get_post_meta( get_the_ID(), '_cd_naw_date', true );
					$nawtime_s = get_post_meta( get_the_ID(), '_cd_naw_start_time', true );
					$nawtime_e = get_post_meta( get_the_ID(), '_cd_naw_end_time', true );
					echo '<td width=25%>';
						echo $nawdate .'</br>' .$nawtime_s. '-'.$nawtime_e;
					echo '</td>';
					echo '<td width=75%>';
						the_title();
						$poslink=get_permalink(get_the_ID());
						echo '<br/><a href=' . $poslink .'>Learn More/Register</a>';
					echo '</td>';
						?>
				</tr>
				
			<?php }
				}
			endwhile;?>
		</table>
			<?php wp_reset_query(); ?>
		
		   <?php
			$myvariable = ob_get_clean();
			return $myvariable;
		}
	}
#############################################################################################################
##### Success Shortcode ######	
	add_shortcode( 'success', 'naw_success_shortcode' );
	function naw_success_shortcode( $atts ) {
		ob_start();
	 
		// define attributes and their defaults
		extract( shortcode_atts( array (
			'type' => 'success_story',
			'orderby' => 'date',
			'order' => 'DESC',
			'posts' => 5,
		), $atts ) );
	 
		// define query parameters based on attributes
		$options = array(
			'post_type' => $type,
			'orderby' => $orderby,
			'order' => $order,
			'posts_per_page' => $posts,
		);
		$pgtitle = get_post( $post )->post_title;
		$query = new WP_Query( $options );?>
		<ul>
		<?php if ( $query->have_posts() ) { 
			 while ( $query->have_posts() ) : $query->the_post(); 
				$tags_obj = wp_get_post_tags(get_the_ID());
				foreach($tags_obj as $tagA)				
				{
					$tag_name = $tagA->name;
					//compare tags with page title
					if(strcasecmp($tagA->name, $pgtitle) == 0)
					{
				?>
				<li style = "border-bottom:1px solid #bdbdbd;">
					<?php	
						the_title();
						$poslink=get_permalink(get_the_ID());
						echo '<br/><a href=' . $poslink .'>Read more...</a>';
					?>
				</li>
				
			<?php }
				}
			endwhile;?>
		</ul>
			<?php wp_reset_query(); ?>
		
		   <?php
			$myvariable = ob_get_clean();
			return $myvariable;
		}
	}

#############################################################################################################
########################### Newsletter Shortcode ############################################################
	add_shortcode( 'newsletter', 'naw_newsletter_shortcode' );
	function naw_newsletter_shortcode( $atts ) {
		ob_start();
	 
		// define attributes and their defaults
		extract( shortcode_atts( array (
			'type' => 'mailings',
			'orderby' => 'date',
			'order' => 'DESC',
			'posts' => 5,
		), $atts ) );
	 
		// define query parameters based on attributes
		$options = array(
			'post_type' => $type,
			'orderby' => $orderby,
			'order' => $order,
			'posts_per_page' => $posts,
		);
		$pgtitle = get_post( $post )->post_title;
		$query = new WP_Query( $options );?>
		<ul>
		<?php if ( $query->have_posts() ) { 
			 while ( $query->have_posts() ) : $query->the_post(); 
				$tags_obj = wp_get_post_tags(get_the_ID());
				foreach($tags_obj as $tagA)				
				{
					$tag_name = $tagA->name;
					//compare tags with page title
					if(strcasecmp($tagA->name, $pgtitle) == 0)
					{
				?>
				<li style = "border-bottom:1px solid #bdbdbd;">
					<?php	
						the_title();
						$poslink=get_permalink(get_the_ID());
						echo '<br/><a href=' . $poslink .'>Read more...</a>';
					?>
				</li>
				
			<?php }
				}
			endwhile;?>
		</ul>
			<?php wp_reset_query(); ?>
		
		   <?php
			$myvariable = ob_get_clean();
			return $myvariable;
		}
	}


#############################################################################################################
##### Tabs Shortcode ######	
	function naw_shortcode_tabs($atts, $content = null) {
	// [tabs style=""]  [tab title="TAB_NAME"] CONTENT [/tab]  [tab title="TAB_NAME"] CONTENT [/tab]  [tab title="TAB_NAME"] CONTENT [/tab][/tabs]

      if (isset($GLOBALS['tabs_count'])) $GLOBALS['tabs_count']++;
      else $GLOBALS['tabs_count'] = 0;
      extract(shortcode_atts(array(
          'tabtype' => 'nav-tabs',
          'style' => 'style1',
          'tabdirection' => '', ), $atts));

      preg_match_all('/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);

      $tab_titles = array();
      if (isset($matches[1])) {
          $tab_titles = $matches[1];
      }

      $output = '';

      if (count($tab_titles)) {
          $output .= '<div class="tabbable tabs_'.$style.' tabs-'.$tabdirection.'"><ul class="nav '.$tabtype.'" id="custom-tabs-'.rand(1, 100).'">';

          $i = 0;
          foreach($tab_titles as $tab) {
              if ($i == 0) $output .= '<li class="active">';
              else $output .= '<li>';

              $output .= '<a href="#custom-tab-'.$GLOBALS['tabs_count'].'-'.sanitize_title($tab[0]).'"  data-toggle="tab">'.$tab[0].'</a></li>';
              $i++;
          }

          $output .= '</ul>';
          $output .= '<div class="tab-content">';
          $output .= do_shortcode($content);
          $output .= '</div></div>';
      } else {
          $output .= do_shortcode($content);
      }

      return $output;
  }

  function naw_shortcode_tab($atts, $content = null) {

      if (!isset($GLOBALS['current_tabs'])) {
          $GLOBALS['current_tabs'] = $GLOBALS['tabs_count'];
          $state = 'active';
      } else {

          if ($GLOBALS['current_tabs'] == $GLOBALS['tabs_count']) {
              $state = '';
          } else {
              $GLOBALS['current_tabs'] = $GLOBALS['tabs_count'];
              $state = 'active';
          }
      }

      $defaults = array('title' => 'Tab');
      extract(shortcode_atts($defaults, $atts));

      return '<div id="custom-tab-'.$GLOBALS['tabs_count'].'-'.sanitize_title($title).'" class="tab-pane '.$state.'">'.do_shortcode($content).'</div>';
  }

  add_shortcode('tabs', 'naw_shortcode_tabs');
  add_shortcode('tab', 'naw_shortcode_tab');

#############################################################################################################
##### Demo Icon ######
	add_shortcode('demo', 'naw_shortcode_demo');
	function naw_shortcode_demo( $atts) {
	// [demo link="#" title='Title' position='top or left']
		ob_start();
		extract(shortcode_atts(array(
		"link" => '#',
		"title" => 'Title',
		"position" => 'top',
		), $atts));
		if ($position == 'left')
		{
			return '<div class="col-sm-12 col-xs-12"><a href="'.$link.'" target="_blank"><span class="glyphicon glyphicon-facetime-video"></span>&nbsp;' .$title. '</a></div>';
		}
		else
		{
			return '<div class="col-sm-4 col-xs-12"><a href="'.$link.'" target="_blank"><span class="glyphicon glyphicon-facetime-video"></span>&nbsp;' .$title. '</a></div>';
		}
		$myvariable = ob_get_clean();
			return $myvariable;
	
	}
#############################################################################################################
##### Contact Icon ######
	add_shortcode('contact', 'naw_shortcode_contact');
	function naw_shortcode_contact( $atts) {
	// [contact link="#" title='Title' position='top or left']
		ob_start();
		extract(shortcode_atts(array(
		"link" => '#',
		"title" => 'Title',
		"position" => 'top',
		), $atts));
		
		if ($position == 'left')
		{
			return '<div class="col-sm-12 col-xs-12"><a href="'.$link.'" target="_blank"><span class="glyphicon glyphicon-envelope"></span>&nbsp;' .$title. '</a></div>';
		}
		else
		{
		return '<div class="col-sm-4 col-xs-12"><a href="'.$link.'" target="_blank"><span class="glyphicon glyphicon-envelope"></span>&nbsp;' .$title. '</a></div>';
		}
		$myvariable = ob_get_clean();
			return $myvariable;
	
	}
  
#############################################################################################################
##### Contact Icon ######
	add_shortcode('support', 'naw_shortcode_support');
	function naw_shortcode_support( $atts) {
	// [support link="#" title='Title' position='top or left']
		ob_start();
		extract(shortcode_atts(array(
		"link" => '#',
		"title" => 'Title',
		"position" => 'top',
		), $atts));
		
		if ($position == 'left')
		{
			return '<div class="col-sm-12 col-xs-12"><a href="'.$link.'" target="_blank"><span class="glyphicon glyphicon-user"></span>&nbsp;' .$title. '</a></div>';
		}
		else
		{
		return '<div class="col-sm-4 col-xs-12"><a href="'.$link.'" target="_blank"><span class="glyphicon glyphicon-user"></span>&nbsp;' .$title. '</a></div>';
		}
		$myvariable = ob_get_clean();
			return $myvariable;
	
	}

#############################################################################################################
##### Phone Icon ######
	add_shortcode('phone', 'naw_shortcode_phone');
	function naw_shortcode_phone( $atts) {
	// [phone link="#" title='Title' position='top or left']
		ob_start();
		extract(shortcode_atts(array(
		"link" => '#',
		"title" => 'Title',
		"position" => 'top',
		), $atts));
		
		if ($position == 'left')
		{
			return '<div class="col-sm-12 col-xs-12"><a href="'.$link.'" target="_blank"><span class="glyphicon glyphicon-earphone"></span>&nbsp;' .$title. '</a></div>';
		}
		else
		{
		return '<div class="col-sm-4 col-xs-12"><a href="'.$link.'" target="_blank"><span class="glyphicon glyphicon-earphone"></span>&nbsp;' .$title. '</a></div>';
		}
		$myvariable = ob_get_clean();
			return $myvariable;
	
	}
#############################################################################################################
##### One Half Column ######	
add_shortcode('one_half_column', 'naw_shortcode_two_columns');
function naw_shortcode_two_columns( $atts, $content = null ) {
	// [one_half_column] Content [/one_half_column]
	  
	return '<div class="col-sm-6 col-xs-12">' . do_shortcode($content) . '</div>';
	
}
#############################################################################################################
##### One Third Column ######	
function naw_shortcode_three_columns( $atts, $content = null ) {
	// [one_third_column] Content [/one_third_column]
		  
	return '<div class="col-sm-4 col-xs-12">' . do_shortcode($content) . '</div>';
	
}
add_shortcode('one_third_column', 'naw_shortcode_three_columns');

#############################################################################################################
##### 1/4 Column ######
function naw_shortcode_one_fourth_columns( $atts, $content = null ) {
	// [one_fourth_column] Content [/one_fourth_column]
		  
	return '<div class="col-sm-3 col-xs-12">' . do_shortcode($content) . '</div>';
	
}
add_shortcode('one_fourth_column', 'naw_shortcode_one_fourth_columns');
#############################################################################################################
##### 2/3 Column ######
function naw_shortcode_two_third_columns( $atts, $content = null ) {
	// [two_third_column] Content [/two_third_column]
		  
	return '<div class="col-sm-8 col-xs-12">' . do_shortcode($content) . '</div>';
	
}
add_shortcode('two_third_column', 'naw_shortcode_two_third_columns');
#############################################################################################################
##### 3/4 Column ######
function naw_shortcode_three_fourth_columns( $atts, $content = null ) {
	// [three_fourth_column] Content [/three_fourth_column]
	  
	return '<div class="col-sm-9 col-xs-12">' . do_shortcode($content) . '</div>';
	
}
add_shortcode('three_fourth_column', 'naw_shortcode_three_fourth_columns');
?>