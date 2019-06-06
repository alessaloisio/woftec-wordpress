<?php
add_action('wp', 'baw_non_duplicate_content' ); function baw_non_duplicate_content( $wp ) { global $wp_query; if( isset( $wp_query->query_vars['category_name'], $wp_query->query['category_name'] ) && $wp_query->query_vars['category_name'] != $wp_query->query['category_name'] ): $correct_url = str_replace( $wp_query->query['category_name'], $wp_query->query_vars['category_name'], $wp->request ); wp_redirect( home_url( $correct_url ), 301 );
die(); endif; }
?>