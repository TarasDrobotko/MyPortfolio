<?php  get_header(); ?>
<div class="content-wrapper">
   <div class="content-main">
   <div class="content">
   
   <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
   
    <div class="article">
   <div class="article-gen-img">
   <?php if(has_post_thumbnail()): ?>
     <?php the_post_thumbnail();?>
	 <?php else: ?>
	    <img src="<?php bloginfo('template_url'); ?>/images/no-image.png" alt="" />
	 <?php endif; ?>
   </div>
   <div class="article-head">
      <span class="article-date"><img src="<?php bloginfo('template_url'); ?>/images/articles-author.jpg"  alt=""/>
	      <span><?php the_author(); ?></span> - <?php the_time('M jS, Y'); ?>
	  </span>
	  <span class="article-comments"><img src="<?php bloginfo('template_url'); ?>/images/articles-comment.jpg"  alt=""/>
	     <a href="#"><?php comments_popup_link('Коментарів нема', '1 коментар', '%1$s коментарів'); ?></a>
	  </span>
   </div>
   <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
   <?php the_excerpt(); ?>
   <p><a href="<?php the_permalink(); ?>">Читати далі</a></p>
   </div>
   
   <?php endwhile; ?>
   <?php  else: ?>
   <p>За Вашим запитом нічого не знайдено.</p>
   <?php endif; ?>
   
   <div class="pager">
  <?php posts_nav_link('<span> - </span>', 'Попередня сторінка', 'Наступна сторінка'); ?>
   </div>
   </div>
<?php get_sidebar();?>
   </div>
</div>
<?php get_footer(); ?>