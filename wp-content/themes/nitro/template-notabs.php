<?php
/*
Template Name: Template - No Tabs
*/
?>
<?php get_header(); ?>

  <div id="primary-content" class="container" role="main">
      <div class="row">
		
		<!--- Start Body Content --->
		<div class="col-sm-9 col-xs-12">
			
			<div class="row">
				<div class="col-sm-12 col-xs-12">
				<?php if (have_posts()) : while (have_posts()) : the_post();?>    
					<h1><?php the_title();?></h1>
					<?php the_content(); ?>
					<!-- Getting Parent Page ID -->
					<h1><?php $parent = array_reverse(get_post_ancestors($post->ID));
							  $first_parent = get_page($parent[0]);?>
					</h1>
					<!-- End Parent Page ID -->
				<?php endwhile; endif;?>
				</div>
			</div>
		</div>
		<!-- Right Sidebar -->
		<div class="col-sm-3 col-xs-12">
			<div class="leftnav">
				<?php //get_template_part('leftnav');	?>
				<br/>
				<?php 
				$values = get_post_custom( $post->ID );
				$menuselected = isset( $values['naw_menu_select'] ) ? esc_attr( $values['naw_menu_select'][0] ) : '';
				$args = array(
				'theme_location'  => '',
				'menu'            => $menuselected,
				'container'       => 'div',
				'container_class' => 'sidemenu',
				'container_id'    => '',
				'menu_class'      => 'list-group',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul class="list-unstyled list-group-item">%3$s</ul>',
				'depth'           => -1,
				'walker'          => ''
			);
				wp_nav_menu( $args); ?>
			</div>
			<br/>
			<?php 
				/*CALL TO ACTION" */
				get_template_part('cta');	
				
				/* Meta box Values */
				$naw = get_post_meta( $post->ID, '_cd_naw_content', true );
				$naw_link= get_post_meta( $post->ID, '_cd_naw_content_link', true );
				/* If Meta Box is Empty */
				if ($naw !='' && $naw_link !='')
				{
			?>
			
			<div class="panel panel-default"><div class="panel-body"><h4>About Net@Work</h4>
				<?php 
					echo $naw;
					echo '<br/><br/><a href="' .$naw_link. '" class="btn btn-primary btn-sm">Learn More>></a>';
				?>
			</div></div>
				<?php } 
				else
				{
					echo '<div class="panel panel-default"><div class="panel-body"><h4>About Net@Work</h4>';
					echo '<p>Default Text</p>';
					echo '<br/><br/><a href="#" class="btn btn-primary btn-sm">Learn More>></a></div></div>';
				}
				?>
		</div>
	</div>     
  </div>

<?php get_footer(); ?>