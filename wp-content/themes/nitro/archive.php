<?php get_header(); ?>

<div id="primary-content" class="container" role="main">
    <div class="row">
        
        <div class="col-xs-12">
            <?php 
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array( 'posts_per_page' => 20, 'paged' => $paged, 'post_status' => 'publish');
			$loop = new WP_Query( $args );
			if ( $loop->have_posts() )
			{
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title();?></a></h5>
				<?php endwhile; 
			}  ?>
        </div>
        
    </div>
</div>

<?php get_footer(); ?>