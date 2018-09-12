<?php
/**
 * Plugin Name: Custom Gutenberg Blocks V1
 * Plugin Github URI: https://github.com/aishan-shrestha/custom-gutenberg-blocks
 * Description: Simple starter gutenberg block
 * Author: Aishan
 * Author URI: aishan-shrestha.com.np
 * Version: 1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
define('MY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'blocks/init.php';
