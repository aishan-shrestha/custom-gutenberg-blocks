<?php
/**
 * Blocks Initializer
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
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