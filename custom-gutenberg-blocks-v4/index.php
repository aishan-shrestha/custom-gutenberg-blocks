<?php
/**
 * Plugin Name: Custom Gutenberg Blocks V4
 * Plugin Github URI: https://github.com/aishan-shrestha/custom-gutenberg-blocks
 * Description: Simple starter gutenberg block, utilizing "create-guten-block" package
 * Author: Aishan
 * Author URI: aishan-shrestha.com.np
 * Version: 1.0.0
 * @package CGB
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';
