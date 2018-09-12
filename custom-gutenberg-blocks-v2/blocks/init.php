<?php
/**
 * Blocks Initializer
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Enqueue Gutenberg block assets for both frontend + backend.
 * `wp-blocks`: includes block type registration and related functions.
 * @since 1.0.0
 */
add_action( 'enqueue_block_assets', 'enqueue_block_frontend_assets' );
function enqueue_block_frontend_assets() {
	// Styles.
	wp_enqueue_style(
		'handler-style-css', // Handle.
		plugins_url( 'assets/blocks.style.build.css', dirname( __FILE__ ) ), // Block style CSS.
		array( 'wp-blocks' ) // Dependency to include the CSS after it.
	);
}



/**
 * Enqueue Gutenberg block assets for backend editor.
 * `wp-blocks`: includes block type registration and related functions.
 * `wp-element`: includes the WordPress Element abstraction for describing the structure of your blocks.
 * `wp-i18n`: To internationalize the block's text.
 * @since 1.0.0
 */

add_action( 'enqueue_block_editor_assets', 'enqueue_block_editor_assets' );
function enqueue_block_editor_assets() {
	// Scripts.
	wp_enqueue_script(
		'handler-block-js', // Handle.
		plugins_url( '/assets/blocks.build.js', dirname( __FILE__ ) ), // Block.build.js: We register the block here. Built with Webpack.
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ) // Dependencies, defined above.
	);

	// Styles.
	wp_enqueue_style(
		'handler-block-editor-css', // Handle.
		plugins_url( 'assets/blocks.editor.build.css', dirname( __FILE__ ) ), // Block editor CSS.
		array( 'wp-edit-blocks' ) // Dependency to include the CSS after it.
	);
}


/**
 * Require all blocks
 */
add_action( 'plugins_loaded', 'load_dynamic_blocks' );
function load_dynamic_blocks() {
	$root = MY_PLUGIN_PATH.'blocks/*/index.php';

	foreach ( glob( $root ) as $block_logic ) {
		require $block_logic;
    }
}