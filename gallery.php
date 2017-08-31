<?php
defined('ABSPATH') or die('This can be used only as a WordPress plugin.');

function dseomn_modify_gallery_atts($out, $pairs, $atts, $shortcode) {
  $custom_defaults = array(
    'columns' => 0,
    );

  foreach ($custom_defaults as $att => $default) {
    if (array_key_exists($att, $pairs) && !array_key_exists($att, $atts)) {
      $out[$att] = $default;
    }
  }

  return $out;
}
add_filter('shortcode_atts_gallery', 'dseomn_modify_gallery_atts', 10, 4);

function dseomn_register_gallery_scripts() {
  wp_register_style(
    'dseomn-gallery',
    plugins_url('dseomn-customizations-wp/gallery.css'));
  wp_enqueue_style('dseomn-gallery');

  wp_register_script(
    'dseomn-gallery',
    plugins_url('dseomn-customizations-wp/gallery.js'),
    array('jquery'),
    false,
    true);
  wp_enqueue_script('dseomn-gallery');
}
add_action('wp_enqueue_scripts', 'dseomn_register_gallery_scripts');

?>
