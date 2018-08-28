<?php 
 /*
    Загружаемые скрипты и стили
 */
function load_style_script() {
	wp_enqueue_script('jquery_my', get_template_directory_uri() . '/js/jquery.js');
	wp_enqueue_script('jqFancyTransitions', get_template_directory_uri() . '/js/jqFancyTransitions.1.8.min.js');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
}

 /*
    Загружаем скрипты и стили
 */
 
 add_action('wp_enqueue_scripts', 'load_style_script');
 
 /*
    поддержка миниатюр
 */
 add_theme_support('post-thumbnails');
 set_post_thumbnail_size(180,180);
 
 /*
    добавляем виджеты
 */
 register_sidebar(array(
                 'name' => 'Меню', 
				 'id' => 'menu_header',
				 'before_widget' => '',
                 'after_widget' => '',
				 ));
				 
 register_sidebar(array(
                 'name' => 'Меню-іконки', 
				 'id' => 'menu_icons',
				 'before_widget' => '',
                 'after_widget' => '',
				 ));
				 
register_sidebar(array(
                 'name' => 'Sidebar', 
				 'id' => 'sidebar',
				  'before_widget' => '<div class="sidebar-widget %2$s">',
                 'after_widget' => '</div>',
				 'before_title' => '<h3>',
				 'after_title' => '</h3>'));
 
register_sidebar(array(
                 'name' => 'Footer', 
				 'id' => 'footer',
				  'before_widget' => '<div class="footer-info %2$s">',
                 'after_widget' => '</div>',
				 'before_title' => '<h3>',
				 'after_title' => '</h3>'));
				 
	/*
    изменяем длину анонса поста
 */
	add_filter( 'excerpt_length', function(){
	return 30;
} );

/*
Комментарии
*/
if ( ! function_exists( 'twentyten_comment' ) ) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * To override this walker in a child theme without modifying the comments template
	 * simply create your own twentyten_comment(), and that function will be used instead.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @since Twenty Ten 1.0
	 *
	 * @param object $comment The comment object.
	 * @param array  $args    An array of arguments. @see get_comment_reply_link()
	 * @param int    $depth   The depth of the comment.
	 */
	function twentyten_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case '':
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment, 40 ); ?>
				<?php printf( __( '%s <span class="says">:</span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
			</div><!-- .comment-author .vcard -->
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
				<br />
			<?php endif; ?>

			<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php
					/* translators: 1: date, 2: time */
					printf( __( '%1$s в %2$s', 'twentyten' ), get_comment_date(), get_comment_time() );
					?>
					</a>
					<?php
					edit_comment_link( __( '(Редагувати)', 'twentyten' ), ' ' );
				?>
				</div><!-- .comment-meta .commentmetadata -->

				<div class="comment-body"><?php comment_text(); ?></div>

				<div class="reply">
				<?php
				comment_reply_link(
					array_merge(
						$args, array(
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
						)
					)
				);
?>
				</div><!-- .reply -->
			</div><!-- #comment-##  -->

		<?php
				break;
			case 'pingback':
			case 'trackback':
		?>
		<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?></p>
	<?php
				break;
		endswitch;
	}
endif;


/*
   баннер
*/
function banner_posts(){
	register_post_type('banner', array(
		'labels'             => array(
			'name'               => 'Банери', // Основное название типа записи
			'singular_name'      => 'Банер', // отдельное название записи типа Book
			'add_new'            => 'Добавити новий',
			'add_new_item'       => 'Добавити новий банер',
			'edit_item'          => 'Редагувати банер',
			'new_item'           => 'Новий банер',
			'view_item'          => 'Переглянути банер',
			'search_items'       => 'Найти банер',
			'not_found'          =>  'Банерів не знайдено',
			'not_found_in_trash' => 'В кошику банерів не знайдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Банери'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','thumbnail')
	) );
}
add_action('init', 'banner_posts');

/*
   слайдер
*/
function slider_posts(){
	register_post_type('slider', array(
		'labels'             => array(
			'name'               => 'Слайдери', // Основное название типа записи
			'singular_name'      => 'Слайлер', // отдельное название записи типа Book
			'add_new'            => 'Добавити новий',
			'add_new_item'       => 'Добавити новий слайдер',
			'edit_item'          => 'Редагувати слайдер',
			'new_item'           => 'Новий слайдер',
			'view_item'          => 'Переглянути слайдер',
			'search_items'       => 'Найти слайдер',
			'not_found'          =>  'Слайдерів не знайдено',
			'not_found_in_trash' => 'В кошику слайдерів не знайдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Слайдери'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','thumbnail')
	) );
}
add_action('init', 'slider_posts');