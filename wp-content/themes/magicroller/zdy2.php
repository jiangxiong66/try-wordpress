<?php
/* 
Template Name:半自定义html模板（带有顶部和底部）
*/ 
get_header();
if (have_posts()) : while (have_posts()) : the_post();?>
 
 <?php the_content(); ?>
 
<?php endwhile; endif;?>
<?php get_footer(); ?>