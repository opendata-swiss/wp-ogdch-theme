<?php
//Remove top level admin menus
function remove_admin_menus() {
	remove_menu_page( 'edit.php' ); // Posts
	remove_menu_page( 'edit-comments.php' ); // Comments
}

add_action( 'admin_menu', 'remove_admin_menus' );