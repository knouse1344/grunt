<?php
		GLOBAL $post;
		$options = array(
			'post_type' => 'mailings',
			'orderby' => 'date',
			'order' => 'DESC',
			'posts_per_page' => 5,
		);
		$pgtitle = get_post( $post )->post_title;
		$query = new WP_Query( $options );?>
		<ul class="list-group">
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
				<li class="list-group-item">
					<?php	
						the_title();
						$poslink=get_permalink(get_the_ID());
						echo '<br/><a href=' . $poslink .'>Read more...</a>';
					?>
				</li>
				
			<?php }
				}
			endwhile;
			}
			?>
		</ul>
			<?php wp_reset_query(); ?>
