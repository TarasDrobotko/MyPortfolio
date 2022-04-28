<?php
/*
Plugin Name: User Posts Views History
Description: Keeps track of logged In User's posts views history and also anonymous user's posts views history.
Version: 1.0
Author: Drobotko Taras
Author URI: https://drobotkot.s-host.net/

*/

add_action('wp_enqueue_scripts','main_js_init');

function main_js_init() {
    wp_enqueue_script( 'main-js', plugins_url( '/js/main.js', __FILE__ ));
    wp_localize_script( 'main-js', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
} 

// added the widget
add_action('widgets_init', 'ursh_register_widgets');

function ursh_register_widgets() {
	register_widget('Posts_Views_History_Widget');
}
class Posts_Views_History_Widget extends WP_Widget {

    function __construct() {
		parent::__construct(
			'widget_your_posts_views_history',
			__('Recent browsing history', 'theme1'),
			array( 'description' => __('Displays the recent browsing history of User', 'theme1'))
		);
	}

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['posts-views-history-title']) ? __('Popular Posts') : $instance['posts-views-history-title']);
        $count = (int) (empty($instance['posts-views-history-number']) ? 5 : $instance['posts-views-history-number']);
        
          // get  all posts ids
         $posts_ids = get_posts(array(
    'fields'          => 'ids', // Only get post IDs
    'posts_per_page'  => -1
));

 $posts_ids = json_encode($posts_ids);
        ?>
        
        <script type="text/javascript">
    // get posts count 
   var count = '<?=$count?>';
    // get  all posts ids
   var postsIds = '<?=$posts_ids?>';
</script>
<?php
            echo $before_widget;
            if ($title) {
                ?>
        <script type="text/javascript">
   var widgetTitle = '<?=$title?>';
   var beforeTitle = '<?=$before_title?>';
</script>
<?php
            }
            echo $after_widget;

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['posts-views-history-title'] = strip_tags(stripslashes($new_instance['posts-views-history-title']));
        $instance['posts-views-history-number'] = (int) ($new_instance['posts-views-history-number']);
        return $instance;
    }

    function form($instance) {
        //Defaults
        $instance = wp_parse_args((array) $instance, array('posts-views-history-title' => 'User view history', 'posts-views-history-number' => 5));

        $title = htmlspecialchars($instance['posts-views-history-title']);
        $count = htmlspecialchars($instance['posts-views-history-number']);

        # Output the options
        echo '<p><label for="' . $this->get_field_name('posts-views-history-title') . '">' . __('Title:') . ' <input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('posts-views-history-title') . '" type="text" value="' . $title . '" /></label></p>';
        echo '<p><label for="' . $this->get_field_name('posts-views-history-number') . '">' . __('Number of posts to show:') . ' <input id="' . $this->get_field_id('posts-views-history-number') . '" name="' . $this->get_field_name('posts-views-history-number') . '" type="text" value="' . $count . '" size="3" /></label></p>';
    }

}

/*
 * get current post id by url
*/
add_action( "wp_ajax_postaction", "ursh_wp_ajax_function" );
add_action( "wp_ajax_nopriv_postaction", "ursh_wp_ajax_function" );
function ursh_wp_ajax_function(){
  //DO whatever you want with data posted
  //To send back a response you have to echo the result!
 $postUrl = $_POST['postUrl']; 
$postId = url_to_postid($postUrl);

echo $postId;
 
  wp_die(); // ajax call must die to avoid trailing 0 in your response
}