<?php
add_filter("wpcf7_mail_tag_replaced", "suppress_wpcf7_filter");
function suppress_wpcf7_filter($value, $sub = ""){
	$out	=	!empty($sub) ? $sub : $value;
	$out	=	strip_tags($out);
	$out	=	wptexturize($out);
	return $out;
}
?>