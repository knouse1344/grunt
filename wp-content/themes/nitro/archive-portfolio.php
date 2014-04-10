<?php get_header(); ?>

  <div class="container" role="main">
      <div class="row">
		
		<!--- Start Body Content --->
		<div id="primary-content" class="col-xs-12">
			<div class="row">
				<div class="col-sm-12 col-xs-12">
					<?php
					//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					//$args = array( 'post_type' => 'portfolio', 'posts_per_page' => 10, 'paged' => $paged);
					$args = array( 'post_type' => 'portfolio', 'posts_per_page' => -1);
					$loop = new WP_Query( $args );	
					
					 if ( $loop->have_posts() )
					{
					 while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<div class="col-sm-4 col-xs-12">
						
							<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							$thumb = the_post_thumbnail(array(350,220)); }  
							$naw_url = get_post_meta( $post->ID, '_cd_naw_url', true );
							if ('' != $naw_url){
								$siteurl = '<a href="' .$naw_url. '" target="_blank">'; }
							else {
								$siteurl = ''; } 
                                    
                                    echo '<a href="' .$naw_url. '">'; 
                                    echo $thumb; 
                                    echo '</a>'?><!--whats this?-->
                    
						  <div class="caption">
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<p><?php the_excerpt(); ?></p>
							<p><a href="<?php the_permalink(); ?>" class="" role="button">Read More!</a></p>
						  </div>
						
					</div>
				<?php endwhile; ?>
				<!-- Pagination LINKS Disabled
				<span class="next"><?php //next_posts_link( 'Older posts', $loop->max_num_pages ); ?></span>
				<span class="prev"><?php //previous_posts_link( 'Newer posts', $loop->max_num_pages ); ?></span> -->
				<?php
				} 
				?>
				</div>
			</div>
		</div>

	</div>     
  </div>

<?php get_footer(); ?>