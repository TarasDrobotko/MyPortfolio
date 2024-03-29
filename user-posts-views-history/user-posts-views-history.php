<?php
/*
Plugin Name: User Posts Views History
Plugin URI: https://drobotkot.s-host.net/plaginy/plagin-user-posts-views-history/
Description: The plugin displays the recent posts views history of the user (posts titles and dates of posts views). Posts data is stored in localStorage.
Version: 1.0
Text Domain: user-posts-views-history
Domain Path: /languages
Author: Drobotko Taras
Author URI: https://drobotkot.s-host.net/
*/

add_action('wp_enqueue_scripts', 'register_scripts');

function register_scripts()
{
    wp_enqueue_script('main-js', plugins_url('/assets/js/main.js', __FILE__));
    wp_localize_script('main-js', 'my_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

    wp_enqueue_style('plugin-default', plugins_url('/assets/css/style.css', __FILE__));
}

// translation file connection
add_action('plugins_loaded', 'myplugin_init');
function myplugin_init()
{
    load_plugin_textdomain('user-posts-views-history', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}

// add the widget
add_action('widgets_init', 'ursh_register_widgets');

function ursh_register_widgets()
{
    register_widget('Posts_Views_History_Widget');
}
class Posts_Views_History_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'widget_your_posts_views_history',
            __('User Posts Views History', 'user-posts-views-history'),
            array('description' => __('Displays the recent browsing history of User', 'user-posts-views-history'))
        );
    }

    function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', empty($instance['posts-views-history-title']) ? __('User view history', 'user-posts-views-history') : $instance['posts-views-history-title']);
        $count = (int) (empty($instance['posts-views-history-number']) ? 5 : $instance['posts-views-history-number']);
        // get data for js

        // check if it is post page
        if (is_single()) {
            $is_post_page = true;
            $is_post_page = json_encode($is_post_page);
        } else {
            $is_post_page = false;
            $is_post_page = json_encode($is_post_page);
        }
?>

        <script type="text/javascript">
            // get posts count 
            var count = '<?= $count ?>';

            var isPostPage = '<?= $is_post_page ?>';
        </script>
        <?php
        echo $before_widget;
        if ($title) {
        ?>
            <script type="text/javascript">
                var widgetTitle = '<?= $title ?>';
                var beforeTitle = '<?= $before_title ?>';
            </script>
<?php
        }
        echo $after_widget;
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['posts-views-history-title'] = strip_tags(stripslashes($new_instance['posts-views-history-title']));
        $instance['posts-views-history-number'] = (int) ($new_instance['posts-views-history-number']);
        return $instance;
    }

    function form($instance)
    {
        //Defaults
        $instance = wp_parse_args((array) $instance, array('posts-views-history-title' => 'User view history', 'posts-views-history-number' => 5));

        $title = htmlspecialchars($instance['posts-views-history-title']);
        $count = htmlspecialchars($instance['posts-views-history-number']);

        # Output the options
        echo '<p><label for="' . $this->get_field_name('posts-views-history-title') . '">' . __('Title:', 'user-posts-views-history') . ' <input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('posts-views-history-title') . '" type="text" value="' . $title . '" /></label></p>';
        echo '<p><label for="' . $this->get_field_name('posts-views-history-number') . '">' . __('Number of posts to show:', 'user-posts-views-history') . ' <input id="' . $this->get_field_id('posts-views-history-number') . '" name="' . $this->get_field_name('posts-views-history-number') . '" type="text" value="' . $count . '" size="3" /></label></p>';
    }
}

/*
 * get current post id by url
*/
add_action("wp_ajax_postaction", "ursh_wp_ajax_function");
add_action("wp_ajax_nopriv_postaction", "ursh_wp_ajax_function");
function ursh_wp_ajax_function()
{
    // get post id by post url
    $postUrl = $_POST['postUrl'];
    $postId = url_to_postid($postUrl);

    // get  all posts ids
    $posts_ids = get_posts(array(
        'fields'          => 'ids', // Only get post IDs
        'posts_per_page'  => -1
    ));

    $data = array(
        'postsIds'   =>  $posts_ids,
        'postId' =>  $postId
    );

    wp_send_json_success($data);
}
