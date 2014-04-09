<?php get_header(); ?>

  <div class="container" role="main">
      <div class="row">
		
		<!--- Start Body Content --->
		<div id="primary-content" class="col-sm-9 col-xs-12">
			<div class="row">
				<div class="col-sm-12 col-xs-12">
					<?php if (have_posts()) : while (have_posts()) : the_post();?>
					<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					the_post_thumbnail();
					}  ?>
					<p class="lead"><?php the_content('<p class="serif">Read the rest of this page »</p>'); ?></p>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
          
		<!-- Right Sidebar -->
		<div class="col-sm-3 col-xs-12" id="sidebar">
			<?php $naw_url = get_post_meta( $post->ID, '_cd_naw_url', true );
				if ('' != $naw_url)
				{
			?>
			<div class="alert alert-success">
				<a href="<?php echo $naw_url; ?>" target="_blank" class="alert-link"><span class="glyphicon glyphicon-globe"></span> &nbsp; &nbsp;VISIT SITE</a>
			</div>
			<?php } ?>
		</div>
	</div>     
  </div>

<?php get_footer(); ?>