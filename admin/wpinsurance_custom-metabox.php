<?php
/**
* Start Meta fields
*/
add_filter( 'cmb2_init', 'wpinsurance_metaboxes' );
function wpinsurance_metaboxes() {
	$prefix = '_wpinsurance_';

	/**
	* Start Page options [tab]
	*/
	$page_metabox_options = array(
		'id'           		 => $prefix . '_page_optons',
		'title'        		 => esc_html__( 'Page Options', 'wpinsurance' ),
		'object_types' 		 => array('post', 'page'),
		'context'      		 => 'normal',
		'priority'     		 => 'high',
		'show_names'         => true,
	);
	// Setup meta box
	$page_options = new_cmb2_box( $page_metabox_options );

	// Setting tabs
	$tabs_setting      = array(
		'config' 	=> $page_metabox_options,
		'layout' 	=> 'vertical', // Default : horizontal
		'tabs'  	=> array()
	);

	//===================================
	//Service Metaboxes
	//===================================
	$service = new_cmb2_box( array(
		'id'            => $prefix . 'wpinsurance',
		'title'         => esc_html__( 'Service Option', 'wpinsurance' ),
		'object_types'  => array( 'wpinsurance'), // Post type
		'priority'   => 'high',
		) );

	$service->add_field( array(
		'name'       => esc_html__( 'Description Title', 'wpinsurance' ),
		'desc'       => esc_html__( 'Insert Description Title Here', 'wpinsurance' ),
		'id'         => $prefix . 'des_title',
		'type'       => 'textarea_small',
		'default' 		=> ''
		) );
	$service->add_field( array(
		'name'       => esc_html__( 'Short Description', 'wpinsurance' ),
		'desc'       => esc_html__( 'Insert Description Here', 'wpinsurance' ),
		'id'         => $prefix . 'service_short_des',
		'type'       => 'textarea',
		'default' 		=> ''
		) );
	$service->add_field( array(
		'name'       => esc_html__( 'Service Icon', 'wpinsurance' ),
		'desc'       => esc_html__( 'Insert Service Icon,png,jpg,etc Here', 'wpinsurance' ),
		'id'         => $prefix . 'service_icon',
		'type'       => 'file',
		'default' 		=> ''
		) );
	   $service->add_field( array(
		'name'       => esc_html__( 'Popup Video', 'wpinsurance' ),
		'desc'       => esc_html__( 'insert video link. ex-https://youtu.be/OJ9ejTy4J98', 'wpinsurance' ),
		'id'         => $prefix . 'service_st2_video',
		'type'       => 'text_url',
	   ) );
	   $service->add_field( array(
		'name'       => esc_html__( 'Video Thumbnail', 'wpinsurance' ),
		'desc'       => esc_html__( 'insert video thumbnail', 'wpinsurance' ),
		'id'         => $prefix . 'service_st2_video_thumbnail',
		'type'       => 'file',
	   ) );


//===================================
//Agent Metaboxes
//===================================
		$agent = new_cmb2_box( array(
			'id'            => $prefix . 'agent',
			'title'         => esc_html__( 'agent Option', 'wpinsurance' ),
			'object_types'  => array( 'wpinsurance_agent', ), // Post type
			'priority'   => 'high',
			) );
		$agent->add_field( array(
			'name'       => esc_html__( 'Designation', 'wpinsurance' ),
			'desc'       => esc_html__( 'insert title here', 'wpinsurance' ),
			'id'         => $prefix . 'agentdeg',
			'type'       => 'text',
			) );
// $group_field_id is the field id string, so in this case: $prefix . 'wpinsurance'
		$agentgrop = $agent->add_field( array(
			'id'          => $prefix . 'agentsicon',
			'type'        => 'group',
			'description' => esc_html__( 'Add Second Icon', 'wpinsurance' ),
			'options'     => array(
				'group_title'   => esc_html__( 'Social Icon {#}', 'wpinsurance' ), // {#} gets replaced by row number
				'add_button'    => esc_html__( 'Add Another Icon', 'wpinsurance' ),
				'remove_button' => esc_html__( 'Remove Icon', 'wpinsurance' ),
				'sortable'      => true, // beta
				),
			) );
		$agent->add_group_field( $agentgrop, array(
			'name'       => esc_html__( 'Social Icon', 'wpinsurance' ),
			'desc'       => esc_html__( 'insert Icon', 'wpinsurance' ),
			'id'         => $prefix .'ticon',
			'type'       => 'text',
			) );
		$agent->add_group_field( $agentgrop, array(
			'name'       => esc_html__( 'Enter Link', 'wpinsurance' ),
			'desc'       => esc_html__( 'insert link here', 'wpinsurance' ),
			'id'  => $prefix .'turl',
			'type' => 'text_url',					
			) );
		// Gallery

			$wpinsurance_gallery = new_cmb2_box( array(
				'id'            => $prefix . 'wpinsurance_gallery',
				'title'         => __( 'Gallery Metaboxes', 'wpinsurance' ),
				'object_types'  => array( 'wpinsurance_gallery', ), // Post type
				'priority'   => 'high',
			) );
		   $wpinsurance_gallery->add_field( array(
			'name'       => esc_html__( 'Popup Video', 'wpinsurance' ),
			'desc'       => esc_html__( 'insert video link. ex-https://youtu.be/OJ9ejTy4J98', 'wpinsurance' ),
			'id'         => $prefix . 'wpinsurance_gallery_video',
			'type'       => 'text_url',
		   ) );

}