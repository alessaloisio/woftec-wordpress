<?php
// Add post thumbnail functionality
add_theme_support('post-thumbnails', array('post'));

add_image_size('post-image', 610, 250, true);
add_image_size('featured-image', 516, 340, true);
add_image_size('featured-image-thumb', 70, 60, true);
add_image_size('widget-image', 290, 160, true);
add_image_size('widget-image-thumb', 50, 50, true);
add_image_size('media-thumb', 140, 90, true);
add_image_size('related-thumb', 134, 90, true);
?>