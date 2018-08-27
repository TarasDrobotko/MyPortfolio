<?php  get_header(); ?>
<div class="content-wrapper">
   <div class="content-main">
   <div class="content">
   
   <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
   
    <div class="article border">
   
   <div class="article-head">
      <span class="article-date"><img src="<?php bloginfo('template_url'); ?>/images/articles-author.jpg"  alt=""/>
	      <span><?php the_author(); ?></span> - <?php the_time('M jS, Y'); ?>
	  </span>
	  <span class="article-comments"><img src="<?php bloginfo('template_url'); ?>/images/articles-comment.jpg"  alt=""/>
	     <a href="#"><?php comments_popup_link('Коментарів нема', '1 коментар', '% коментарі (в)'); ?></a>
	  </span>
   </div>
   <h1><?php the_title(); ?></h1>
   <?php the_content(); ?>
   </div>
   
   <?php endwhile; ?>
   <?php endif; ?>
       <div class="pager">
       <?php previous_post_link('<span>&laquo;</span> %link'); next_post_link('%link <span>&raquo;</span>');  ?>
       </div>
	   <?php comments_template(); ?>
   </div>
<?php get_sidebar();?>
   </div>
</div>
<?php get_footer(); ?>