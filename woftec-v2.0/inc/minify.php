<?php
add_action('get_header', 'gkp_html_minify_start');
function gkp_html_minify_start() {
    ob_start( 'gkp_html_minyfy_finish' );
}
function gkp_html_minyfy_finish( $html ) {
    // Suppression des commentaires HTML, sauf les commentaires conditionnels pour IE
    $html = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $html);
    // Suppression des espaces vides
    $html = str_replace(array("\r\n", "\r", "\t"), '', $html);
	while ( stristr($html, '  ')) 
		$html = str_replace('  ', ' ', $html);
	$bottomComment = '<!-- HTML minifier par une fonction maison ;)  -->';
	$html .= "\n" . $bottomComment;
	return $html;
}
?>