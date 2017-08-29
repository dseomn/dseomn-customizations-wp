<?php
defined('ABSPATH') or die('This can be used only as a WordPress plugin.');

class Dseomn_Archives extends WP_Widget {
  public function __construct() {
    parent::__construct(
      'dseomn_archives',
      'dseomn\'s Archives');

    add_action('wp_enqueue_scripts', array($this, 'register_styles'));
  }

  public function widget($args, $instance) {
    echo $args['before_widget'];

    echo $args['before_title'];
    echo apply_filters('widget_title', 'Archives');
    echo $args['after_title'];

    echo '<ul class="dseomn-archives">';
    wp_get_archives(
      array(
        type => 'yearly',
        format => 'custom',
        before => '<li class="dseomn-archives-item">',
        after => '</li>',
        show_post_count => true,
        ));
    echo '</ul>';

    echo $args['after_widget'];
  }

  public function register_styles() {
    wp_register_style(
      'dseomn-archives',
      plugins_url('dseomn-customizations-wp/archives.css'));
    wp_enqueue_style('dseomn-archives');
  }
}
add_action('widgets_init', function() { register_widget('Dseomn_Archives'); });

?>
