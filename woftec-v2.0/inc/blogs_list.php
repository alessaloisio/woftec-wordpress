<?php 
function blogs_list() {
global $wpdb;     
   $blogs = $wpdb->get_results(" SELECT blog_id FROM {$wpdb->blogs} WHERE site_id = '{$wpdb->siteid}' AND spam = '0' AND deleted = '0' AND archived = '0' AND public='1' ");     
   return $blogs; 
} 
?>