<?php
/*
 * Book manager CRUD constants
 *
 */

// Book entity constants
define('BOOKMANAGER_BOOK_LIST', BOOKMANAGER_PLUGIN_DIR . '/pages/book-list-admin.php');
define('BOOKMANAGER_BOOK_EDIT', BOOKMANAGER_PLUGIN_DIR . '/pages/book-edit-admin.php');
define('BOOKMANAGER_BOOK_INSERT', BOOKMANAGER_PLUGIN_DIR . '/pages/book-insert-admin.php');


/*
 * Book manager admin panel
 *
 */
 
// setup admin menu
function bookmanager_admin_menu()
{
	add_menu_page(
		'Book Manager',
		'Book Manager',
		'manage_options',
		'bookmanager',
		'bookmgr',
		'dashicons-groups'
	);
	
	add_submenu_page(
		'bookmanager',
		'Add New Book',
		'Add New Book',
		'manage_options',
		'bookmgr_book_insert',
		'bookmgr_book_insert'
	);
	
	add_submenu_page(
		'bookmanager',
		'Book List',
		'Book List',
		'manage_options',
		'bookmgr_book_list',
		'bookmgr_book_list'
	);
}

add_action('admin_menu', 'bookmanager_admin_menu');


/*
 * DISPLAY PAGES FUNCTIONS
 *
 */

function bookmgr_book_list()
{
	global $wpdb;
	
	if (!current_user_can('manage_options'))
	{
		wp_die('You do not have sufficient permissions');
	}
	
	// if user has permissions, let's continue
	// NOTE: we can fall in this function if a POST or GET happens
	bookmgr_book_post_processor();
}

function bookmgr_book_insert()
{
	global $wpdb;
	
	if (!current_user_can('manage_options'))
	{
		wp_die('You do not have sufficient permissions');
	}
	
	if(!empty($_POST['listaction']))
	{
		bookmgr_book_post_processor();
	}
	else
	{
		include BOOKMANAGER_BOOK_INSERT;
	}
}

/*
 * POST processors
 *
 */

function bookmgr_book_post_processor()
{
	global $wpdb;
	global $id;
	
	if (!empty($_POST))
	{
		$listAction = $_POST['listaction'];
		
		if (isset($_POST['postid']))
		{
			$id = $_POST['postid'];
		}
		
		switch($listAction)
		{
			case 'display_insert_book':
				include BOOKMANAGER_BOOK_INSERT;
				break;
			case 'display_edit_book':
				include BOOKMANAGER_BOOK_EDIT;
				break;
			case 'display_list_book':
				include BOOKMANAGER_BOOK_LIST;
				break;
			case 'process_book_update':
				handle_book_update();
				include BOOKMANAGER_BOOK_LIST;
				break;
			case 'cancel_book_update':
				include BOOKMANAGER_BOOK_LIST;
				break;
			case 'process_book_delete':
				handle_book_delete();
				include BOOKMANAGER_BOOK_LIST;
				break;
			case 'process_book_insert':
				handle_book_insert();
				include BOOKMANAGER_BOOK_LIST;
				break;
			case 'cancel_book_insert':
				include BOOKMANAGER_BOOK_LIST;
				break;
		}
	}
	else 
	{
		include BOOKMANAGER_BOOK_LIST;
	}
}

/*
 * CRUD handlers
 *
 */

// CRUD options for book entity
function handle_book_delete()
{
	$id = -1;
	
	if (isset($_POST['postid']))
	{
		$id = $_POST['postid'];
	}
	
	// Execute action
	if ($id != -1)
	{
		wp_delete_post($id);
	}
}

function handle_book_update()
{
	$id = $_POST['postid'];
	$title = $_POST['frmTitle'];
	$description = $_POST['frmDescription'];
	
	// Building array with ID and data
	$data = array(
		'ID' => $id,
		'post_title' => $title,
		'post_content' => $description
	);
	
	// Perform the update
	wp_update_post($data);
}

function handle_book_insert()
{
	$title = $_POST['frmTitle'];
	$description = $_POST['frmDescription'];
	
	// Building array with ID and data
	$data = array(
		'post_title' => $title,
		'post_content' => $description,
		'post_status' => 'publish',
		'post_type' => 'book'
	);
	
	// Perform the insert
	wp_insert_post($data);
}


/*
 * HOOK BOOTSTRAP CSS
 *
 */

function bookmgr_css_js()
{
	echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">';
	echo '<script src="https://kit.fontawesome.com/a4aac60993.js" crossorigin="anonymous"></script>';
}
add_action('admin_head', 'bookmgr_css_js');
?>