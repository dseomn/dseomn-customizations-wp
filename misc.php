<?php
defined('ABSPATH') or die('This can be used only as a WordPress plugin.');

function dseomn_register_misc_styles() {
  wp_register_style(
    'dseomn-misc',
    plugins_url('dseomn-customizations-wp/misc.css'));
  wp_enqueue_style('dseomn-misc');
}
add_action('wp_enqueue_scripts', 'dseomn_register_misc_styles');

?>
