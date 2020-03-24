<?php
/*
Plugin Name: Book Manager plugin
Description: Simple plugin for managin book custom post types
Version: 1.0 
*/ 

// Defining the absolute path for plugins
define('BOOKMANAGER_PLUGIN_DIR', plugin_dir_path(__FILE__));

// Including shortcode for book list template
require_once 'include/bookmanager-shortcodes.php';

// Including admin backend for book manager
require_once 'include/bookmanager-admin.php';
?>