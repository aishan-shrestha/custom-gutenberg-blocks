<?php
/**
 * Localize postypes in array
 * this will be used on index.js
 */
add_action('admin_enqueue_scripts', 'localize_block_gridlayout_postypes_script_variables');
function localize_block_gridlayout_postypes_script_variables() {

	//change this dynamic later. For now it is static
	$option_postypes = array(
						array('label' => "Post", 'value' => 'post'),
						array('label' => "Tour", 'value' => 'tour'),
					);

	wp_localize_script('jquery', 'option_postypes', $option_postypes);
}


/**
 * Registers the `isn/block-sample-gridview` block on server.
 */
add_action( 'init', 'register_block_gridlayout_postype' );
function register_block_gridlayout_postype() {

	// Register our block, and explicitly define the attributes we accept.
	register_block_type( 'isn/block-sample-gridview', array(
		'editor_script' => 'isn-block-gridlayout-postype-script',
		'style'         => 'isn-block-gridlayout-editor-style',
		'attributes'    => array(
								'postype' 	=> 	array(
													'type' => 'string',
												),
							),

		'render_callback' 	=> 'render_block_gridlayout_postype_content',
	) );
}



/**
 * Renders the `isn/block-sample-gridview` block on server.
 * @param array $attributes The block attributes.
 * @return string Returns the post content with selected InspectorPannel elements/controls
 */
function render_block_gridlayout_postype_content( $attributes ) {
	ob_start();
	extract($attributes);

    $html = '<div class="wp-block-sample-gridview"><div class="row">';
    wp_reset_postdata();
    $args = array(
				'post_type'   => !empty( $postype ) ? $postype : 'post',
				'post_status' => 'publish'
			);
	$myposts = get_posts( $args );
	if($myposts) :
		foreach( $myposts as $post ) :  setup_postdata($post);
			$post_id        = $post->ID;
			$tour_title     = get_the_title($post_id);
			$tour_permalink = get_the_permalink($post_id);
			$tour_excerpt   = wp_trim_words($post->post_content, 25);

			$imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'thumbnail', true );
			$imgsrc = $imgsrc[0];

			$html .= '<div class="column">
			    			<a class="tour_image" href="'.$tour_permalink.'">
				    			<img src="'.$imgsrc.'" alt="'.$tour_title.'">
				    		</a>
			    			<a class="tour-link" href="'.$tour_permalink.'">
			    				<h4>'.$tour_title.'</h4>
			    			</a>
			    			<div class="tour-excerpt"><p>'.$tour_excerpt.'</p></div>
			    			<div class="tour-attribute-wrapper">
			    				<div class="tour-enquiry">
									<a class="common-btn" href="'.$tour_permalink.'">inquire</a>
			    				</div>

			    			</div>
			    			<br class="clear">
			    		</div>';
		endforeach;
		else:
			$html = 'Tour postype not registered Yet!, to be continued...';
	endif;

    wp_reset_postdata();

	return $html.'</div></div>';
}





