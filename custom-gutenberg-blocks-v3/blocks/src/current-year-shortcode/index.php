<?php
/**
 * Register our block and shortcode.
 */
add_action( 'init', 'register_block_current_year_shortcode' );
function register_block_current_year_shortcode() {

	// Register our block, and explicitly define the attributes we accept.
	register_block_type( 'isn/block-current-year-shortcode', array(
		'editor_script' => 'isn-block-current-year-shortcode-script',
		// 'style'         => 'isn-block-shortcode-editor-style',
		'attributes'    => array(
								'format' => array(
												'type'    => 'string',
												'default' => 'jS F Y'
											),
							),
		'render_callback' => 'render_block_current_year_content',
	) );

	// Define our shortcode, too, using the same render function as the block.
	add_shortcode( 'current_date', 'render_block_current_year_content' );
}

function render_block_current_year_content( $attributes ) {
	// extract parameters
	extract(shortcode_atts(array(
			'format' => ''
		), $attributes)
	);
	$dateFormat = !empty( $format ) ? $format : 'jS F Y';

	return current_time( $dateFormat );

}