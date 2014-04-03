<?php get_header(); ?>

  <div class="container" role="main">
      <div class="row">
		
		<!--- Start Body Content --->
		<div id="primary-content" class="col-sm-9 col-xs-12">
			
			<div class="row">
				<div class="col-sm-12 col-xs-12">
				<?php if (have_posts()) : while (have_posts()) : the_post();?>    
<<<<<<< HEAD
					&nbsp;
					<?php the_content(); ?>
					<?php endwhile; endif;?>

=======
					<?php the_content(); ?>
				<?php endwhile; endif;?>
				
>>>>>>> ffa1f9c0702c36b1873c91a35731b224f65d8994
					<div class="tabbable">
						<ul class="nav nav-tabs" id="custom-tabs-19">
						<li class="active"><a href="#custom-tab-0-webinars" data-toggle="tab"><?php echo the_title();?> Webinars</a></li>
						<li><a href="#custom-tab-0-success-stories" data-toggle="tab">Success Stories</a></li>
						<li><a href="#custom-tab-0-newsletters" data-toggle="tab">Newsletters</a></li>
						</ul>
						<div class="tab-content">
							<div id="custom-tab-0-webinars" class="tab-pane active"> 		
								<?php get_template_part('tabwebinars');?>				
							</div>
							<div id="custom-tab-0-success-stories" class="tab-pane "> 		
								<?php get_template_part('tabsuccess');?>
							</div>
							<div id="custom-tab-0-newsletters" class="tab-pane "> 
								<?php get_template_part('tabmailings');?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Right Sidebar -->
		<div class="col-sm-3 col-xs-12">
		<br/>
			<div class="leftnav">
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
				get_template_part('part', 'calltoaction');	
				
				/* Meta box Values */
				$naw = get_post_meta( $post->ID, '_cd_naw_content', true );
				$naw_link= get_post_meta( $post->ID, '_cd_naw_content_link', true );
				/* If Meta Box is Empty */
				if ($naw !='' && $naw_link !='')
				{
			?>
			<br/>
			<div class="panel panel-default"><div class="panel-body"><h4>About Net@Work</h4>
				<?php 
					echo $naw;
					echo '<a href="' .$naw_link. '" class="btn btn-primary btn-sm">Learn More &raquo;</a>';
				?>
			</div></div>
				<?php } 
				else
				{
					echo '<div class="panel panel-default"><div class="panel-body"><h4>About Net@Work</h4>';
					echo '<p>Net@Work is one of the leading authorized Sage 100 ERP partners, resellers and consultants. Our consultants and developers have extensive experience in Sage 100 ERP, as well as the full Sage ERP product portfolio, including installs, upgrades, conversions, customizations, support and training.</p>';
					echo '<a href="#" class="btn btn-primary btn-sm">Learn More &raquo;</a></div></div>';
				}
				?>
		</div>
	</div>     
  </div>

<?php get_footer(); ?>