<?php
function _no_generator() { return ''; }
add_filter('the_generator', '_no_generator');

remove_action('wp_head','feed_links', 2 );
remove_action('wp_head', 'feed_links_extra', 3 );
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

remove_action('wp_head', 'wp_print_scripts');
remove_action('wp_head', 'wp_print_head_scripts', 9);
remove_action('wp_head', 'wp_enqueue_scripts', 1);
add_action('wp_footer', 'wp_print_scripts', 5);
add_action('wp_footer', 'wp_enqueue_scripts', 5);
add_action('wp_footer', 'wp_print_head_scripts', 5);

remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

add_filter( 'pre_option_link_manager_enabled', '__return_true' );

function add_opengraph_doctype( $output ) {
		return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
	}
add_filter('language_attributes', 'add_opengraph_doctype');

function store_box_in_head() {
         global $post;
	if ( !is_singular())
		return;
        
}
add_action( 'wp_head', 'store_box_in_head', 5 );

function floating_menu_css()
{
    // Si on est sur un appareil mobile, on ne fait pas flotter + retro compatibilité
    if( !function_exists( 'wp_is_mobile' ) || !wp_is_mobile() ) :
    ?>
    <style>
        #adminmenuwrap { position: fixed; top: 0px; left: 0px; }
        .admin-bar #adminmenuwrap { top: 28px; }
        body.rtl #adminmenuwrap { right: 0px; left: auto; }
        #collapse-menu:before, #collapse-menu:after { content: ""; display: table; }
        #collapse-menu:after { clear: both; }
        #collapse-menu { zoom:1; }
   </style>
       <?php
    endif;
}
add_action('admin_print_styles', 'floating_menu_css', 999 ); // 999 = en dernier

add_action('wp_head', 'gkp_prefetch');
function gkp_prefetch() {
	if ( is_single() ) {  ?>
	<link rel="prefetch" href="<?php echo home_url(); ?>" />
	<link rel="prerender" href="<?php echo home_url(); ?>" />
	<link rel="prefetch" href="<?php echo get_permalink( get_adjacent_post(false,'',true) ); ?>" />
	<link rel="prerender" href="<?php echo get_permalink( get_adjacent_post(false,'',true) ); ?>" />
	<?php
	}
}

add_filter('wp_editor_set_quality', create_function('', 'return 100;'));
?>