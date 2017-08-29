<?php
defined('ABSPATH') or die('This can be used only as a WordPress plugin.');

function dseomn_prepend_attachment($p) {
  if (wp_attachment_is('image')) {
    return implode(array(
      '<p class="attachment">',
      wp_get_attachment_link(0, 'large', false),
      '</p>',
      ));
  } else {
    return $p;
  }
}
add_filter('prepend_attachment', 'dseomn_prepend_attachment');

?>
