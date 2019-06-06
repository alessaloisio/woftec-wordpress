<?php
//****************************DoFollow
function nofollow($text = '') {return preg_replace_callback("/<\s*a\s+(.+?)>/is", 'nofollow_func', $text);}
function nofollow_func($match) {
    $attr = $match[1];$attr = " $attr ";
    $attr = preg_replace("/
        \s
        rel\s*=\s*(['\"])
        ([^\\1]*?\s+)?
        nofollow
        (\s+[^\\1]*?)?
        \\1
        /ix", " rel=$1$2$3$1", $attr);
    $attr = preg_replace("/
        \s
        rel\s*=\s*(['\"])\s*\\1
        /ix", '', $attr);
    $attr = trim($attr);return '<a ' . $attr . '>';}
add_filter('get_comment_author_link', 'nofollow', 15);
add_filter('comment_text', 'nofollow', 15);
remove_filter('pre_comment_content', 'wp_rel_nofollow', 15);
?>