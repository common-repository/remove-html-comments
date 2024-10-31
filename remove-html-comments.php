<?php
/**
 * Plugin Name: Remove html comments
 * Plugin URI: http://boutique.codiscripts.com/plugins-wordpress.php
 * Description: Remove html comments from the source of your wordpress
 * Version: 1.1
 * Author: codiweb
 * Author URI: http://boutique.codiscripts.com
 * License:
 */
 function rhc($search) {
	  list($l) = $search;
	  if (mb_eregi("\[if",$l) || mb_eregi("\[endif",$l) )  {
	    return $l;
	  }
  }
 function remove_html_comments($html) {
 	$expr = '/<!--(.|\s)*?-->/';
  $func = 'rhc';
	$html = preg_replace_callback($expr, $func, $html);
	return $html;
}
function rhc1() {
	ob_start("remove_html_comments");
}
function rhc2() {
	ob_end_flush();
}
add_action('get_header', 'rhc1',100);
add_action('wp_footer', 'rhc2',100);
?>