<?php
defined('ABSPATH') or die('This can be used only as a WordPress plugin.');

function dseomn_do_collapse() {
  return !is_singular() && !is_feed();
}

function dseomn_register_collapsing_scripts() {
  wp_register_style(
    'dseomn-collapsing',
    plugins_url('dseomn-customizations-wp/collapsing.css'));
  wp_enqueue_style('dseomn-collapsing');

  wp_register_script(
    'dseomn-collapsing',
    plugins_url('dseomn-customizations-wp/collapsing.js'),
    array(
      'jquery',

      // This dependency ensures that images are layed out correctly before we
      // try to calculate the height of a post.
      'dseomn-gallery',
      ),
    false,
    true);
  wp_enqueue_script('dseomn-collapsing');
}
add_action('wp_enqueue_scripts', 'dseomn_register_collapsing_scripts');

function dseomn_collapse_the_post() {
  if (!dseomn_do_collapse()) {
    return;
  }

  echo
    '<input type="checkbox" class="dseomn-is-collapsed" ',
    'id="dseomn-is-collapsed-', get_the_ID(), '">';
}
add_action('the_post', 'dseomn_collapse_the_post');

function dseomn_collapse_the_content($content) {
  if (!dseomn_do_collapse()) {
    return $content;
  }

  $parts = array($content);

  array_push($parts,
    '<label class="dseomn-expand-collapsed"',
    'for="dseomn-is-collapsed-', get_the_ID(), '">',
    'Read more…',
    '</label>');

  return implode($parts);
}
add_filter('the_content', 'dseomn_collapse_the_content');

?>
