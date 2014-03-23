<?php get_header(); ?>

<main class="bs-masthead" id="content" role="main">
  <div id="primary-content" class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post();?>    
        <h1><?php the_title();?></h1>
        <p class="lead"><?php the_content('<p class="serif">Read the rest of this page »</p>'); ?>
        </p>
    <?php endwhile; endif; ?>
  </div>
</main>

<?php get_footer(); ?>