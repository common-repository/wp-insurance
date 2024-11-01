<?php
    
    if( !function_exists('wpinsurance_custom_post_register') ){


        function wpinsurance_custom_post_register(){

    $wpinsurance_custom_post_name = wpinsurance_get_option( 'wpinsurance_custom_post_name', 'settings' );
    if( isset( $wpinsurance_custom_post_name ) && !empty( $wpinsurance_custom_post_name ) ){
        
    } else{
        $wpinsurance_custom_post_name = 'Services';
    }

    $wpinsurance_agent_custom_post_name = wpinsurance_get_option( 'wpinsurance_agent_custom_post_name', 'settings' );
    if( isset( $wpinsurance_agent_custom_post_name ) && !empty( $wpinsurance_agent_custom_post_name ) ){
        
    } else{
        $wpinsurance_agent_custom_post_name = 'Agent';
    }
            // Register Service Post Type
            $labels = array(
                'name'                  => _x( $wpinsurance_custom_post_name, 'Post Type General Name', 'wpinsurance' ),
                'singular_name'         => _x( 'Services', 'Post Type Singular Name', 'wpinsurance' ),
                'menu_name'             => __( 'Services', 'wpinsurance' ),
                'name_admin_bar'        => __( 'Services', 'wpinsurance' ),
                'archives'              => __( 'Service Archives', 'wpinsurance' ),
                'parent_item_colon'     => __( 'Parent Service:', 'wpinsurance' ),
                'add_new_item'          => __( 'Add New Service', 'wpinsurance' ),
                'add_new'               => __( 'Add New', 'wpinsurance' ),
                'new_item'              => __( 'New Service', 'wpinsurance' ),
                'edit_item'             => __( 'Edit Service', 'wpinsurance' ),
                'update_item'           => __( 'Update Service', 'wpinsurance' ),
                'view_item'             => __( 'View Service', 'wpinsurance' ),
                'search_items'          => __( 'Search Service', 'wpinsurance' ),
                'not_found'             => __( 'Not found', 'wpinsurance' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'wpinsurance' ),
                'featured_image'        => __( 'Featured Image', 'wpinsurance' ),
                'set_featured_image'    => __( 'Set featured image', 'wpinsurance' ),
                'remove_featured_image' => __( 'Remove featured image', 'wpinsurance' ),
                'use_featured_image'    => __( 'Use as featured image', 'wpinsurance' ),
                'insert_into_item'      => __( 'Insert into item', 'wpinsurance' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'wpinsurance' ),
                'items_list'            => __( 'Services list', 'wpinsurance' ),
                'items_list_navigation' => __( 'Services list navigation', 'wpinsurance' ),
                'filter_items_list'     => __( 'Filter items list', 'wpinsurance' ),
            );
            $args = array(
                'labels'                => $labels,
                'supports'              => array( 'title','editor', 'thumbnail','tag','elementor' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => 'wpinsurance_menu',
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-archive',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,        
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
            );
            register_post_type( 'wpinsurance', $args );

           // Service Category
           $labels = array(
            'name'              => _x( 'Services Categories', 'wpinsurance' ),
            'singular_name'     => _x( 'Services Category', 'wpinsurance' ),
            'search_items'      => esc_html__( 'Search Category' ),
            'all_items'         => esc_html__( 'All Category' ),
            'parent_item'       => esc_html__( 'Parent Category' ),
            'parent_item_colon' => esc_html__( 'Parent Category:' ),
            'edit_item'         => esc_html__( 'Edit Category' ),
            'update_item'       => esc_html__( 'Update Category' ),
            'add_new_item'      => esc_html__( 'Add New Category' ),
            'new_item_name'     => esc_html__( 'New Category Name' ),
            'menu_name'         => esc_html__( 'Services Category' ),
           );

           $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'wpinsurance_category' ),
           );

           register_taxonomy('wpinsurance_category','wpinsurance',$args);




// Agent Post Type
        $labels = array(
            'name' => _x($wpinsurance_agent_custom_post_name, 'wpinsurance'),
            'singular_name' => _x('Agent', 'wpinsurance'),
            'menu_name' => _x('Agent', 'wpinsurance'),
            'name_admin_bar' => _x('Agent', 'wpinsurance'),
            'add_new' => _x('Add New Agent Member', 'wpinsurance'),
            'add_new_item' => esc_html__('Agent Member Name', 'wpinsurance'),
            'new_item' => esc_html__('New Agent', 'wpinsurance'),
            'edit_item' => esc_html__('Edit Agent', 'wpinsurance'),
            'view_item' => esc_html__('View Agent', 'wpinsurance'),
            'search_items' => esc_html__('Search Agent', 'wpinsurance'),
            'parent_item_colon' => esc_html__('Parent Agent:', 'wpinsurance'),
            'not_found' => esc_html__('No Agent found.', 'wpinsurance'),
            'not_found_in_trash' => esc_html__('No Agent found in Trash.', 'wpinsurance'),
            'featured_image'        => __( 'Agent Image', 'wpinsurance' ),           
            );
        $args   = array(
            'labels' => $labels,
            'description' => esc_html__('Description.', 'wpinsurance'),
            'public' => true,
            'menu_icon' => 'dashicons-groups',
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => 'wpinsurance_menu',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'agents'
                ),
            'capability_type' => 'post',
            'has_archive' => false,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'custom-fields'
                )
            );
        register_post_type('wpinsurance_agent', $args);

    //Taxonomy Agent
        $labels = array(
            'name' => _x('Agent Categories', 'wpinsurance'),
            'singular_name' => _x('Agent Category', 'wpinsurance'),
            'search_items' => esc_html__('Search Category'),
            'all_items' => esc_html__('All Category'),
            'parent_item' => esc_html__('Parent Category'),
            'parent_item_colon' => esc_html__('Parent Category:'),
            'edit_item' => esc_html__('Edit Category'),
            'update_item' => esc_html__('Update Category'),
            'add_new_item' => esc_html__('Add New Category'),
            'new_item_name' => esc_html__('New Category Name'),
            'menu_name' => esc_html__('Agent Category')
            );
        $args   = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'wpinsurance_agent_cat'
                )
            );
        // Taxonomy Agent
        register_taxonomy('wpinsurance_agent_cat', 'wpinsurance_agent', $args);

            // Register Gallery Post Type
            $labels = array(
                'name'                  => _x( 'Gallery', 'Post Type General Name', 'wpinsurance' ),
                'singular_name'         => _x( 'Gallery', 'Post Type Singular Name', 'wpinsurance' ),
                'menu_name'             => __( 'Gallery', 'wpinsurance' ),
                'name_admin_bar'        => __( 'Gallery', 'wpinsurance' ),
                'archives'              => __( 'Gallery Archives', 'wpinsurance' ),
                'parent_item_colon'     => __( 'Parent Gallery:', 'wpinsurance' ),
                'add_new_item'          => __( 'Add New Gallery', 'wpinsurance' ),
                'add_new'               => __( 'Add New', 'wpinsurance' ),
                'new_item'              => __( 'New Gallery', 'wpinsurance' ),
                'edit_item'             => __( 'Edit Gallery', 'wpinsurance' ),
                'update_item'           => __( 'Update Gallery', 'wpinsurance' ),
                'view_item'             => __( 'View Gallery', 'wpinsurance' ),
                'search_items'          => __( 'Search Gallery', 'wpinsurance' ),
                'not_found'             => __( 'Not found', 'wpinsurance' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'wpinsurance' ),
                'featured_image'        => __( 'Featured Image', 'wpinsurance' ),
                'set_featured_image'    => __( 'Set featured image', 'wpinsurance' ),
                'remove_featured_image' => __( 'Remove featured image', 'wpinsurance' ),
                'use_featured_image'    => __( 'Use as featured image', 'wpinsurance' ),
                'insert_into_item'      => __( 'Insert into item', 'wpinsurance' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'wpinsurance' ),
                'items_list'            => __( 'Gallery list', 'wpinsurance' ),
                'items_list_navigation' => __( 'Gallery list navigation', 'wpinsurance' ),
                'filter_items_list'     => __( 'Filter items list', 'wpinsurance' ),
            );
            $args = array(
                'labels'                => $labels,
                'supports'              => array( 'title','thumbnail'),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => 'wpinsurance_menu',
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-archive',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,        
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
            );
            register_post_type( 'wpinsurance_gallery', $args );

           $labels = array(
            'name'              => _x( 'Gallery Categories', 'wpinsurance' ),
            'singular_name'     => _x( 'Gallery Category', 'wpinsurance' ),
            'search_items'      => esc_html__( 'Search Category' ),
            'all_items'         => esc_html__( 'All Category' ),
            'parent_item'       => esc_html__( 'Parent Category' ),
            'parent_item_colon' => esc_html__( 'Parent Category:' ),
            'edit_item'         => esc_html__( 'Edit Category' ),
            'update_item'       => esc_html__( 'Update Category' ),
            'add_new_item'      => esc_html__( 'Add New Category' ),
            'new_item_name'     => esc_html__( 'New Category Name' ),
            'menu_name'         => esc_html__( 'Gallery Category' ),
           );

           $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'wpinsurance_gallery_cat' ),
           );

           register_taxonomy('wpinsurance_gallery_cat','wpinsurance_gallery',$args);


           
       }
         add_action( 'init', 'wpinsurance_custom_post_register', 0 );

    }
	
	
?>