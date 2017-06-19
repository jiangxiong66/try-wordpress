<?php
/* 
Template Name:全自定义html模板(无顶部和底部)
*/ 
if (have_posts()) : while (have_posts()) : the_post();?>
 
 <?php the_content(); ?>
 
<?php endwhile; endif;?>
