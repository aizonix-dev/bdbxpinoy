<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'rt_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 $cmb CMB2 object.
 *
 * @return bool      True if metabox should show
 */
function rt_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template.
	if ( get_option( 'page_on_front' ) !== $cmb->object_id ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field $field Field object.
 *
 * @return bool              True if metabox should show
 */
function rt_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category.
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Manually render a field.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object.
 */
function rt_render_row_cb( $field_args, $field ) {
	$classes     = $field->row_classes();
	$id          = $field->args( 'id' );
	$label       = $field->args( 'name' );
	$name        = $field->args( '_name' );
	$value       = $field->escaped_value();
	$description = $field->args( 'description' );
	?>
	<div class="custom-field-row <?php echo esc_attr( $classes ); ?>">
		<p><label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?></label></p>
		<p><input id="<?php echo esc_attr( $id ); ?>" type="text" name="<?php echo esc_attr( $name ); ?>" value="<?php echo $value; ?>"/></p>
		<p class="description"><?php echo esc_html( $description ); ?></p>
	</div>
	<?php
}

/**
 * Manually render a field column display.
 *
 * @param  array      $field_args Array of field arguments.
 * @param  CMB2_Field $field      The field object.
 */
function rt_display_text_small_column( $field_args, $field ) {
	?>
	<div class="custom-column-display <?php echo esc_attr( $field->row_classes() ); ?>">
		<p><?php echo $field->escaped_value(); ?></p>
		<p class="description"><?php echo esc_html( $field->args( 'description' ) ); ?></p>
	</div>
	<?php
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array      $field_args Array of field parameters.
 * @param  CMB2_Field $field      Field object.
 */
function rt_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}

add_action( 'cmb2_admin_init', 'rt_register_gallery_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function rt_register_gallery_metabox() {
	$prefix = 'rt_'; 
	$cmb_project = new_cmb2_box( array(
		'id'            => $prefix . 'metabox-gallery',
		'title'         => esc_html__( 'Gallery Images', 'rs-framework' ),
		'object_types'  => array( 'gallery' ), // Post type
		// 'show_on_cb' => 'rt_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'rt_add_some_classes', // Add classes through a callback.
	) );

	$cmb_project->add_field( array(
	'name' => 'Upload Gallery Images',
	'desc' => '',
	'id'   => 'Screenshot',
	'type' => 'file_list',
	// 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	// 'query_args' => array( 'type' => 'image' ), // Only images attachment
	// Optional, override default text strings
	'text' => array(
		'add_upload_files_text' => 'Upload Files', // default: "Add or Upload Files"
		'remove_image_text' => 'Replacement', // default: "Remove Image"
		'file_text' => 'Replacement', // default: "File:"
		'file_download_text' => 'Replacement', // default: "Download"
		'remove_text' => 'Replacement', // default: "Remove"
	),
) );
	
}

add_action( 'cmb2_admin_init', 'rt_register_header_metabox' );

/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function rt_register_header_metabox() {
	$prefix = 'rt_'; 

  /**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Page Options', 'rs-framework' ),
		'object_types'  => array( 'page','post','teams','rt-portfolios','services','product','archive' ), // Post type
		'vertical_tabs' => true, // Set vertical tabs, default false
		'tabs' => array(
            array(
                'id'    => 'tab-1',
                'icon' => 'dashicons-admin-page',
                'title' => 'Page Settings',
                'fields' => array(
                    'primary-colors',
                    'page_bg',
                    'content_top',
                    'content_bottom'
                ),
            ),
                     
            array(
                'id'    => 'tab-9',
                'icon' => 'dashicons-format-image',
                'title' => 'Banner Settings',
                'fields' => array(
                    'banner_image',
                    'banner_hide',
                    'select-title',
                    'select-bread',                   
                    'content_banner',                   
                    'intro_content_banner'             
                ),
            ),         
                           

        )
		
	) );

function get_myposttype_options($argument) {
	$args = array(
		'post_type' => $argument, 
		'posts_per_page' => -1,
		'orderby' => 'title',
    	'order'   => 'ASC');
	$loop = new WP_Query($args);
	if($loop->have_posts()) {  
	    while($loop->have_posts()) : $loop->the_post();
	        //
	        $varID = get_the_id();
	        $varName = get_the_title();
	        $pageArray[$varID]=$varName;
	    endwhile; 
	    return  $pageArray;  
	}
	
}

	//Page Settings meta field
	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Primary Color', 'rs-framework' ),
		'desc'    => esc_html__( 'chosse your background', 'rs-framework' ),
		'id'      => 'primary-colors',		
		'type'    => 'colorpicker',
		'default' => '',
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Select Page Background Image', 'rs-framework' ),
		'desc' => esc_html__( 'Upload an image or enter a URL for page banner.', 'rs-framework' ),
		'id'   => 'page_bg',
		'type' => 'file',
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Content Top Padding', 'rs-framework' ),
		'desc'    => esc_html__( 'example(100px)', 'rs-framework' ),
		'default' => esc_attr__( '100px', 'rs-framework' ),
		'id'      => 'content_top',
		'type'    => 'text_medium',
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Content Bottom Padding', 'rs-framework' ),
		'desc'    => esc_html__( 'example(100px)', 'rs-framework' ),
		'default' => esc_attr__( '100px', 'rs-framework' ),
		'id'      => 'content_bottom',
		'type'    => 'text_medium',
	) );


	
	//Banner Custom field here

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Select Banner Image', 'rs-framework' ),
		'desc' => esc_html__( 'Upload an image or enter a URL for page banner.', 'rs-framework' ),
		'id'   => 'banner_image',
		'type' => 'file',
	) );
    
    $cmb_demo->add_field( array(
		'name'             => esc_html__( 'Banner Hide', 'rs-framework' ),
		'desc'             => esc_html__( 'You Can Show or Hide Banner', 'rs-framework' ),
		'id'               => 'banner_hide',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'show' => esc_html__( 'Show', 'rs-framework' ),
			'hide' => esc_html__( 'Hide', 'rs-framework' ),			
		),
	) );

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Show Page Title', 'rs-framework' ),
		'desc'             => esc_html__( 'You can show/hide page title', 'rs-framework' ),
		'id'               => 'select-title',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'show' => esc_html__( 'Show', 'rs-framework' ),
			'hide' => esc_html__( 'Hide', 'rs-framework' ),			
		),
	) );

	$cmb_demo->add_field( array(
		'name'             => esc_html__( 'Show Breadcurmbs', 'rs-framework' ),
		'desc'             => esc_html__( 'You can show/hide  breadcurmbs here', 'rs-framework' ),
		'id'               => 'select-bread',
		'type'             => 'select',
		'show_option_none' => 'Default',
		'options'          => array(
			'show' => esc_html__( 'Show', 'rs-framework' ),
			'hide' => esc_html__( 'Hide', 'rs-framework' ),			
		),
	));


	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Page Banner Text', 'rs-framework' ),
		'desc'    => esc_html__( 'Enter some text in banner', 'rs-framework' ),
		'id'      => 'content_banner',
		'type'    => 'textarea_small',
	) );

	$cmb_demo->add_field( array(
		'name'    => esc_html__( 'Page Banner Intro Text', 'rs-framework' ),
		'desc'    => esc_html__( 'Enter some intro text in banner', 'rs-framework' ),
		'id'      => 'intro_content_banner',
		'type'    => 'textarea_small',
	) );
}


/**** Skill Meta ***/

add_action( 'cmb2_admin_init', 'trainert_register_repeatable_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function trainert_register_repeatable_group_field_metabox() {
	$prefix = 'rt_group_';

	/**
	 * Repeatable Field Groups
	 */
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Team Member Skill', 'rs-function' ),
		'object_types' => array( 'teams' ),
		'priority'     => 'low',  //  'high', 'core', 'default' or 'low'
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => 'member_skill',
		'type'        => 'group',
		'description' => esc_html__( 'Team Member Personal Skills', 'rs-function' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Skill {#}', 'rs-function' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add More Skill', 'rs-function' ),
			'remove_button' => esc_html__( 'Remove Skill', 'rs-function' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Skill Title', 'rs-function' ),
		'id'         => 'skill_title',
		'type'       => 'text',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Skill Level', 'rs-function' ),
		'id'         => 'skill_level',
		'type'       => 'text',
		'desc' => esc_html__( 'add skill level as like (35%) out 100%', 'rs-function' ),
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );		

}


/**** Product Ingredient ***/

add_action( 'cmb2_admin_init', 'product_register_repeatable_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function product_register_repeatable_group_field_metabox() {
	$prefix = 'rt_group_in_';

	/**
	 * Repeatable Field Groups
	 */
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Product Ingredient', 'rs-function' ),
		'object_types' => array( 'product' ),
		'priority'     => 'low',  //  'high', 'core', 'default' or 'low'
	) );


	$cmb_group->add_field( array(
		'name'    => esc_html__( 'Ingredient Label', 'rs-framework' ),
		'id'      => 'product_ingredient_label',
		'type'    => 'text',
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => 'product-ingredient',
		'type'        => 'group',
		'description' => esc_html__( 'Product Ingredient Information', 'rs-function' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Ingredient {#}', 'rs-function' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add More Ingredient', 'rs-function' ),
			'remove_button' => esc_html__( 'Remove Ingredient', 'rs-function' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );
	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Product Ingredient', 'rs-function' ),
		'id'         => 'ingredient_feature',
		'type'       => 'text',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );	

}




add_action( 'cmb2_admin_init', 'header_style_register_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function header_style_register_field_metabox() {
	$prefix = 'yourprefix_group_header_';

	/**
	 * Repeatable Field Groups
	 */
	$cmb_meta_page = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Header Layout', 'rs-function' ),
		'object_types' => array( 'elementor-hf' ),
		'priority'     => 'low',  //  'high', 'core', 'default' or 'low'
	) );

	$cmb_meta_page->add_field( array(
		'name'    => esc_html__( 'Fixed Header Layout', 'rs-framework' ),
		'desc'    => esc_html__( 'If you active it your header layout will be fixed/absolutue positon', 'rs-framework' ),		
		'id'      => 'header-position',
		'type'    => 'checkbox',
	) );

	
}



// Timeline Year
add_action( 'cmb2_admin_init', 'rt_register_timeline_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function rt_register_timeline_metabox() {
	$prefix = 'rt_demo_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_meta_page = new_cmb2_box( array(
		'id'            => $prefix . 'timeline',
		'title'         => esc_html__( 'Timeline Settings', 'rs-framework' ),
		'object_types'  => array( 'timelines' ), // Post type
		// 'show_on_cb' => 'rt_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
		// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
		// 'classes_cb' => 'rt_add_some_classes', // Add classes through a callback.
	) );	

	$cmb_meta_page->add_field( array(
		'name'    => esc_html__( 'Enter Period of Time', 'rs-framework' ),
		'desc'    => esc_html__( 'Enter Period of Time i.e year of experience or year', 'rs-framework' ),		
		'id'      => 'year',
		'type'    => 'text_medium',
	) );
}


add_action( 'cmb2_admin_init', 'rt_service_project_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function rt_service_project_metabox() {
	$prefix = 'rt_'; 
	$cmb_project = new_cmb2_box( array(
		'id'            => $prefix . 'metabox-service',
		'title'         => esc_html__( 'Service Thumb Image', 'brickx' ),
		'object_types'  => array( 'services' ), // Post type
		
	) );

	$cmb_project->add_field( array(
		'name' => 'Upload Thumb Image',
		'desc' => '',
		'id'   => 'service-thumb',
		'type' => 'file',
	) );

	$cmb_project->add_field( array(
		'name' => 'Upload Hover Thumb Image',
		'desc' => '',
		'id'   => 'service-thumb-hover',
		'type' => 'file',
	) );
}

//department post type metabox
add_action( 'cmb2_admin_init', 'rt_department_project_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function rt_department_project_metabox() {
	$prefix = 'rt_'; 
	$cmb_project = new_cmb2_box( array(
		'id'            => $prefix . 'icon-department',
		'title'         => esc_html__( 'Department Section', 'brickx' ),
		'object_types'  => array( 'mp-event' ), // Post type
		
	) );

	$cmb_project->add_field( array(
		'name' => 'Upload department icon',
		'desc' => '',
		'id'   => 'icon-thumb',
		'type' => 'file',
		
	) );

	$cmb_project->add_field( array(
		'name'    => esc_html__( 'Department Except', 'rs-framework' ),
		'desc'    => esc_html__( 'Enter some text', 'rs-framework' ),
		'id'      => 'content_dept',
		'type'    => 'textarea_small',
	) );
}


/**
 * Callback to define the optionss-saved message.
 *
 * @param CMB2  $cmb The CMB2 object.
 * @param array $args {
 *     An array of message arguments
 *
 *     @type bool   $is_options_page Whether current page is this options page.
 *     @type bool   $should_notify   Whether options were saved and we should be notified.
 *     @type bool   $is_updated      Whether options were updated with save (or stayed the same).
 *     @type string $setting         For add_settings_error(), Slug title of the setting to which
 *                                   this error applies.
 *     @type string $code            For add_settings_error(), Slug-name to identify the error.
 *                                   Used as part of 'id' attribute in HTML output.
 *     @type string $message         For add_settings_error(), The formatted message text to display
 *                                   to the user (will be shown inside styled `<div>` and `<p>` tags).
 *                                   Will be 'Settings updated.' if $is_updated is true, else 'Nothing to update.'
 *     @type string $type            For add_settings_error(), Message type, controls HTML class.
 *                                   Accepts 'error', 'updated', '', 'notice-warning', etc.
 *                                   Will be 'updated' if $is_updated is true, else 'notice-warning'.
 * }
 */
function rt_options_page_message_callback( $cmb, $args ) {
	if ( ! empty( $args['should_notify'] ) ) {

		if ( $args['is_updated'] ) {

			// Modify the updated message.
			$args['message'] = sprintf( esc_html__( '%s &mdash; Updated!', 'rs-framework' ), $cmb->prop( 'title' ) );
		}

		add_settings_error( $args['setting'], $args['code'], $args['message'], $args['type'] );
	}
}

/**
 * Only show this box in the CMB2 REST API if the user is logged in.
 *
 * @param  bool                 $is_allowed     Whether this box and its fields are allowed to be viewed.
 * @param  CMB2_REST_Controller $cmb_controller The controller object.
 *                                              CMB2 object available via `$cmb_controller->rest_box->cmb`.
 *
 * @return bool                 Whether this box and its fields are allowed to be viewed.
 */
function rt_limit_rest_view_to_logged_in_users( $is_allowed, $cmb_controller ) {
	if ( ! is_user_logged_in() ) {
		$is_allowed = false;
	}

	return $is_allowed;
}

add_action( 'cmb2_admin_init', 'rt_portfoloio_metas' );
/**
 * Define the metabox and field configurations.
 */
function rt_portfoloio_metas() {

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'rt_portfolio_metas',
		'title'         => __( 'Portfolio Details', 'rs-framework' ),
		'object_types'  => array( 'rt-portfolios', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );


	$group_field_id = $cmb->add_field( array(
		'id'          => 'pf_details',
		'type'        => 'group',
		'description' => __( 'Provide Your projects details', 'rs-framework' ),
		// 'repeatable'  => false, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'       => __( 'Info {#}', 'rs-framework' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'        => __( 'Add Another Info', 'rs-framework' ),
			'remove_button'     => __( 'Remove Info', 'rs-framework' ),
			'sortable'          => true,
			// 'closed'         => true, // true to have the groups closed by default
			// 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'rs-framework' ), // Performs confirmation before removing group.
		),
	) );


	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Information Icon',
		'id'   => 'pf_info_title_icon',
		'type' => 'text',
		'description' => __( 'Portfolio Information Icon (You can write here font-awesome icon name. Ex: fas fa-calendar-alt)', 'rs-framework' ),
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Information Title',
		'id'   => 'pf_info_title',
		'type' => 'text',
		'description' => __( 'Portfolio Information name. Ex: Budget', 'rs-framework' ),
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	
	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Information Value',
		'id'   => 'pf_info_value',
		'type' => 'text',
		'description' => __( 'Portfolio Information value. Ex: $30K', 'rs-framework' ),

		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );


}

add_action( 'cmb2_admin_init', 'rt_product_metabox' );
/**
 * Define the metabox and field configurations.
 */
function rt_product_metabox() {

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'rt_product__meta',
		'title'         => __( 'RT Metabox', 'rs-framework' ),
		'object_types'  => array( 'product', ), // Post type
		'context'       => 'side',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	$cmb->add_field( array(
		'name'    => 'Product 2nd Image',
		'desc'    => 'This Image will show on the product hover on the home page if no gallery image is uploaded.',
		'id'      => 'rt_product_2nd_img',
		'type'    => 'file',
		// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
		),
		'preview_size' => 'thumbnail', // Image size to use when previewing in the admin.
	) );
	$cmb->add_field( array(
		'name' => 'Disable New Badge',
		'desc' => 'Check for only disable the new badge for this post',
		'id'   => 'disable_new_badge',
		'type' => 'checkbox',
	) );

}



add_action( 'cmb2_admin_init', 'rt_testimonial_metabox' );
/**
 * Define the metabox and field configurations.
 */
function rt_testimonial_metabox() {

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'testimonial_info_meta',
		'title'         => __( 'Testimonial Info', 'rs-framework' ),
		'object_types'  => array( 'rt-testimonials', ), // Post type
		'context'       => 'top',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // Keep the metabox closed by default
	) );

	$cmb->add_field( array(
		'name'    => 'Review Title',
		'desc'    => 'Give Your Review A Title.',
		'id'      => 'rt_review__title',
		'type'    => 'text',
		
	) );

	$cmb->add_field( array(
		'name'    => 'Author Designation',
		'desc'    => 'Your Designation.',
		'id'      => 'designation',
		'type'    => 'text',
	) );

	$cmb->add_field( array(
		'name'             => 'Select Ratings',
		'desc'             => 'Select ratings',
		'id'               => 'ratings',
		'type'             => 'select',
		'show_option_none' => true,
		'options'          => array(
			'1'   => __( '1', 'rs-framework' ),
			'1.5' => __( '1.5', 'rs-framework' ),
			'2'   => __( '2', 'rs-framework' ),
			'2.5' => __( '2.5', 'rs-framework' ),
			'3'   => __( '3', 'rs-framework' ),
			'3.5' => __( '3.5', 'rs-framework' ),
			'4'   => __( '4', 'rs-framework' ),
			'4.5' => __( '4.5', 'rs-framework' ),
			'5'   => __( '5', 'rs-framework' ),
		),
	) );


}




add_action( 'cmb2_admin_init', 'rt_register_taxonomy_metabox' );
/**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
function rt_register_taxonomy_metabox() {

	/**
	 * Metabox to add fields to categories and tags
	 */
	$cmb_term = new_cmb2_box( array(
		'id'               => 'rt_pcat_info',
		'title'            => esc_html__( 'Category Metabox', 'cmb2' ), // Doesn't output for term boxes
		'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
		'taxonomies'       => array( 'product_cat' ), // Tells CMB2 which taxonomies should have these fields
		// 'new_term_section' => true, // Will display in the "Add New Category" section
	) );

	$cmb_term->add_field( array(
		'name' => esc_html__( 'Icon', 'cmb2' ),
		'desc' => esc_html__( 'Add Product Category Icon Image', 'cmb2' ),
		'id'   => 'rt_pcat_icon',
		'type' => 'file',
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Add Icon'
		),
		'preview_size' => 'thumbnail', // Image size to use when previewing in the admin.
	) );

	$cmb_term->add_field( array(
		'name' => esc_html__( 'Category Image', 'cmb2' ),
		'desc' => esc_html__( 'Add Category Image', 'cmb2' ),
		'id'   => 'rt_pcat_image',
		'type' => 'file',
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Add Image'
		),
		'preview_size' => 'thumbnail', // Image size to use when previewing in the admin.
	) );

	$cmb_term->add_field( array(
		'name'    => 'Category Grid Item Background',
		'id'      => 'pcat_grid_bg',
		'type'    => 'colorpicker',
		'options' => array(
			'alpha' => true, 
		),
		) );
		
	$cmb_term->add_field( array(
		'name'    => 'Category Grid Item Button Color',
		'id'      => 'pcat_grid_btn_color',
		'type'    => 'colorpicker',
		'desc' 	  => esc_html__( 'Try to pick a similar color like icon ', 'cmb2' ),
		'options' => array(
			'alpha' => true, 
		),
	) );		

}



