<?php
/*
 * SHORTCODES FOR BOOK MANAGER PLUGIN
 *
 */


// add shortcode for book list user page
function booklist_user_form($atts)
{
	include BOOKMANAGER_PLUGIN_DIR . '/pages/booklist-user-shortcode.php';
}
add_shortcode('booklist', 'booklist_user_form');

?>