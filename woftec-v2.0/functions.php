<?php
if( is_dir( TEMPLATEPATH.'/inc' ) ) {
    if( $dh = opendir( TEMPLATEPATH.'/inc' ) ) {
        while( ( $inc_file = readdir( $dh ) ) !== false ) {
            if( substr( $inc_file, -4 ) == '.php' ) {
                include_once( TEMPLATEPATH.'/inc/' . $inc_file );
            }
        }
    }
}
?>
<?php
// Limites de mots.
function limite_mots($string, $word_limit){
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit) {
		array_pop($words);
	}
	return implode(' ', $words);
}

// Déplacement de l'admin bar
function move_admin_bar() { if (is_admin_bar_showing()){?>

	<style type="text/css">
		#root {top:-28px;margin-top: 28px;}
		header{
			top: 28px!important;
		}
		#core, #b.float{
			top: 80px!important;
		}
		.social.float{
			top: 116px;
		}
		#wpadminbar, #wpadminbar .ab-top-secondary{
			background:#333;
			background-image:-webkit-gradient(linear,left bottom,left top,color-stop(0,#222),color-stop(18%,#333));
			background-image:-webkit-linear-gradient(bottom,#222 0,#333 5px);
			background-image:-moz-linear-gradient(bottom,#222 0,#333 5px);
			background-image:-o-linear-gradient(bottom,#222 0,#333 5px);
			background-image:linear-gradient(to top,#222 0,#333 5px);
		}
		
		@media (max-width: 970px){
			header{top: 0 !important;}
			#core, #b.float{top: 0 !important;}
			#wpadminbar{z-index: 1001;}
		}

	</style>
<?php }}
add_action( 'wp_head', 'move_admin_bar' );

// Ajoute la classe "tag" dans les liens suivant et précédent des articles.
add_filter('next_post_link', 'post_link_attributes');
add_filter('previous_post_link', 'post_link_attributes');
function post_link_attributes($output) {
    $code = 'class="tag"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}

// Affiche url de l'avatar
function get_avatar_url($get_avatar){
    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
    return $matches[1];
}

// Remove admin bar
// function remove_admin_bar(){ return false; }
// add_filter( 'show_admin_bar' , 'remove_admin_bar');
?>