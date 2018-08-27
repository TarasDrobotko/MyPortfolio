<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php bloginfo('name'); wp_title();?></title>

<?php wp_head();?>
</head>
<body>
<div class="head-wrapper">
   <div class="head">
   <div class="head-logo"><a href="/"><img src="<?php bloginfo('template_url'); ?>/images/logo.jpg" alt=""/></a></div>
   <div class="head-name"><?php $banner = new WP_Query( array( 'post_type' => 'banner', 'posts_per_page' => 1) );?>
   <?php if($banner->have_posts()) : while ($banner->have_posts()) : $banner->the_post(); ?>
   <?php the_post_thumbnail('full');?>
   <?php endwhile; ?>
   <?php else: ?>
   <p>Місце для банера 728х90</p>
   <?php endif; ?>
   </div>
   </div>
</div>
<div class="menu-wrapper">
   <div class="menu-main">
   <?php if(!dynamic_sidebar('menu_header')):?>
   <span>Це меню, що добавляється з віджета</span>
   <?php endif; ?>
   
 <?php if(!dynamic_sidebar('menu_icons')):?>
   <span>Це меню іконок, що добавляється з віджета</span>
   <?php endif; ?>
    </div>
</div>