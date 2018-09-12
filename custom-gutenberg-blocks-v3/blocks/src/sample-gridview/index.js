

//  Import CSS.
import './assets/style.scss';
import './assets/editor.scss';

/**
 * Internal dependencies
 */
var el = wp.element.createElement,
    registerBlockType = wp.blocks.registerBlockType,
    ServerSideRender  = wp.components.ServerSideRender,
    SelectControl     = wp.components.SelectControl,
    InspectorControls = wp.editor.InspectorControls;

/*
 * Here's where we register the block in JavaScript.
 * attributes. (In our case, there's only one attribute, 'postype'.)
 * wp_localize_script variable defined, use for SelectOption dropdown options. (In our case, we defined 'option_postypes')
 */
registerBlockType( 'isn/block-sample-gridview', {
    title   : 'ISN Sample Gridview',
    icon    : 'grid-view',
    category: 'widgets',



    /*
     * In most other blocks, you'd see an 'attributes' property being defined here.
     * We've defined attributes in the PHP, that information is automatically sent
     * to the block editor, so we don't need to redefine it here.
     */

    edit: function( props ) {

        return [
            /*
             * The ServerSideRender element uses the REST API to automatically call
             * render_block_gridlayout_postype_content() in your PHP code whenever it needs to get an updated
             * view of the block.
             */
            el( ServerSideRender, {
                block: 'isn/block-sample-gridview',
                attributes: props.attributes,
            } ),
            /*
             * InspectorControls lets you add controls to the Block sidebar. In this case,
             * we're adding a SelectControl, which lets us edit the 'postype' attribute (which
             * we defined in the PHP). The onChange property is a little bit of magic to tell
             * the block editor to update the value of our 'postype' property, and to re-render
             * the block.
             */
            el( InspectorControls, {},
                el( SelectControl, {
                    label: 'Select Postype',
                    value: props.attributes.postype,
                    options: option_postypes,
                    onChange: ( value ) => { props.setAttributes( { postype: value } ); },
                } )
            ),
        ];
    },

    // We're going to be rendering in PHP, so save() can just return null.
    save: function() {
        return null;
    },
} );