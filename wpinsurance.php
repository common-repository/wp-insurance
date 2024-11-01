<?php
/**
 * Plugin Name: WP Insurance
 * Description: WordPress Insurance Service Plugin
 * Plugin URI: http://demo.wphash.com/insurers/
 * Version: 2.1.4
 * Author: HasThemes
 * Author URI: https://hasthemes.com/
 * License:  GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: wpinsurance
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'WPINSURANCE_VERSION', '2.1.4' );
define( 'WPINSURANCE_ADDONS_PL_URL', plugins_url( '/', __FILE__ ) );
define( 'WPINSURANCE_ADDONS_PL_PATH', plugin_dir_path( __FILE__ ) );
define( 'WPINSURANCE_ADDONS_PL_ROOT', __FILE__ );

// Required File
require_once WPINSURANCE_ADDONS_PL_PATH.'includes/helper-function.php';
require_once WPINSURANCE_ADDONS_PL_PATH.'init.php';
require_once WPINSURANCE_ADDONS_PL_PATH.'admin/init.php';

add_filter('single_template', 'wpinsurance_single_template_modify');

function wpinsurance_single_template_modify($single) {

    global $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'wpinsurance' ) {
        if ( file_exists( WPINSURANCE_ADDONS_PL_PATH . 'includes/single-wpinsurance.php' ) ) {
            return WPINSURANCE_ADDONS_PL_PATH . 'includes/single-wpinsurance.php';
        }
    }

    return $single;

}

add_filter('archive_template', 'wpinsurance_archive_modify');

function wpinsurance_archive_modify($archive) {

    global $post;

    /* Checks for archive template by post type */
    if ( $post->post_type == 'wpinsurance' ) {
        if ( file_exists( WPINSURANCE_ADDONS_PL_PATH . 'includes/archive-wpinsurance.php' ) ) {
            return WPINSURANCE_ADDONS_PL_PATH . 'includes/archive-wpinsurance.php';
        }
    }

    return $archive;

}


// Agent Single page
add_filter('single_template', 'wpinsurance_single_agent_template_modify');

function wpinsurance_single_agent_template_modify($single) {

    global $post;

    /* Checks for single template by post type */
    if ( $post->post_type == 'wpinsurance_agent' ) {
        if ( file_exists( WPINSURANCE_ADDONS_PL_PATH . 'includes/single-wpinsurance_agent.php' ) ) {
            return WPINSURANCE_ADDONS_PL_PATH . 'includes/single-wpinsurance_agent.php';
        }
    }
    return $single;
}



/**
 * Get the value of a settings field
 *
 * @param string $option settings field name
 * @param string $section the section name this field belongs to
 * @param string $default default text if it's not found
 *
 * @return mixed
 */
function wpinsurance_get_option( $option, $section, $default = '' ) {

    $options = get_option( $section );

    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }

    return $default;
}


// Check Plugins is Installed or not
function wpinsurance_is_plugins_active( $pl_file_path = NULL ){
    $installed_plugins_list = get_plugins();
    return isset( $installed_plugins_list[$pl_file_path] );
}
// This notice for Cmb2 is not installed or activated or both.

function wpinsurance_check_cmb2_status(){
    $cmb2 = 'cmb2/init.php';

    if( wpinsurance_is_plugins_active($cmb2) ) {
        if( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }
        $activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $cmb2 . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $cmb2 );
        $message = __( '<strong>WP Insurance Addons for Cmb2</strong> Requires Cmb2 plugin to be active. Please activate Cmb2 to continue.', 'wpinsurance' );
        $button_text = __( 'Activate CMB2', 'wpinsurance' );
    } else {
        if( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }
        $activation_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=cmb2' ), 'install-plugin_cmb2' );
        $message = sprintf( __( '<strong>WP Insurance Addons for Cmb2</strong> requires %1$s"Cmb2"%2$s plugin to be installed and activated. Please install Cmb2 to continue.', 'wpinsurance' ), '<strong>', '</strong>' );
        $button_text = __( 'Install Cmb2', 'wpinsurance' );
    }
    $button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';
    printf( '<div class="error"><p>%1$s</p>%2$s</div>', __( $message ), $button );
}


if( ! defined( 'CMB2_LOADED' )) {
    add_action( 'admin_init', 'wpinsurance_check_cmb2_status' );
}


// This notice for Elementor is not installed or activated or both.
function wpinsurance_check_elementor_status(){
    $elementor = 'elementor/elementor.php';
    if( wpinsurance_is_plugins_active($elementor) ) {
        if( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }
        $activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $elementor . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $elementor );
        $message = __( '<strong>WP Insurance Addons for Elementor</strong> Requires Elementor plugin to be active. Please activate Elementor to continue.', 'wpinsurance' );
        $button_text = __( 'Activate Elementor', 'wpinsurance' );
    } else {
        if( ! current_user_can( 'activate_plugins' ) ) {
            return;
        }
        $activation_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
        $message = sprintf( __( '<strong>WP Insurance Addons for Elementor</strong> requires %1$s"Elementor"%2$s plugin to be installed and activated. Please install Elementor to continue.', 'wpinsurance' ), '<strong>', '</strong>' );
        $button_text = __( 'Install Elementor', 'wpinsurance' );
    }
    $button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';
    printf( '<div class="error"><p>%1$s</p>%2$s</div>', __( $message ), $button );
}

if( ! did_action( 'elementor/loaded' ) ) {
    add_action( 'admin_notices', 'wpinsurance_check_elementor_status' );
}



/*
 * Display tabs related to Movie in admin when user
 * viewing/editing Movie/category/tags.
 */
function wpinsurance_tabs($view) {
    if ( ! is_admin() ) {
        return;
    }
    $admin_tabs = apply_filters(
        'wpinsurance_tabs_info',
        array(

            10 => array(
                "link" => "edit.php?post_type=wpinsurance",
                "name" => __( "Service", "wpinsurance" ),
                "id"   => "edit-wpinsurance",
            ),

            20 => array(
                "link" => "edit-tags.php?taxonomy=wpinsurance_category&post_type=wpinsurance",
                "name" => __( "Categories", "wpinsurance" ),
                "id"   => "edit-wpinsurance_category",
            ),

        )
    );
    ksort( $admin_tabs );
    $tabs = array();
    foreach ( $admin_tabs as $key => $value ) {
        array_push( $tabs, $key );
    }
    $pages = apply_filters(
        'wpinsurance_admin_tabs_on_pages',
        array( 'edit-wpinsurance', 'edit-wpinsurance_category', 'wpinsurance' )
    );
    $admin_tabs_on_page = array();
    foreach ( $pages as $page ) {
        $admin_tabs_on_page[ $page ] = $tabs;
    }

    $current_page_id = get_current_screen()->id;
    $current_user    = wp_get_current_user();
    if ( ! in_array( 'administrator', $current_user->roles ) ) {
        return;
    }
    if ( ! empty( $admin_tabs_on_page[ $current_page_id ] ) && count( $admin_tabs_on_page[ $current_page_id ] ) ) {
        echo '<h2 class="nav-tab-wrapper lp-nav-tab-wrapper">';
        foreach ( $admin_tabs_on_page[ $current_page_id ] as $admin_tab_id ) {

            $class = ( $admin_tabs[ $admin_tab_id ]["id"] == $current_page_id ) ? "nav-tab nav-tab-active" : "nav-tab";
            echo '<a href="' . esc_url(admin_url( $admin_tabs[ $admin_tab_id ]["link"] )) . '" class="' . esc_attr($class) . ' nav-tab-' . esc_attr($admin_tabs[ $admin_tab_id ]["id"]) . '">' . esc_html($admin_tabs[ $admin_tab_id ]["name"]) . '</a>';
        }
        echo '</h2>';
    }
    return $view;
}


add_filter('views_edit-wpinsurance','wpinsurance_tabs');
add_action('wpinsurance_category_pre_add_form','wpinsurance_tabs');

/*
 * Display tabs related to Agent in admin when user
 * viewing/editing Agent/category.
 */
function wpinsurance_agent_tabs($view) {
    if ( ! is_admin() ) {
        return;
    }
    $admin_tabs = apply_filters(
        'wpinsurance_agent_tabs_info',
        array(

            10 => array(
                "link" => "edit.php?post_type=wpinsurance_agent",
                "name" => __( "Agent", "wpinsurance" ),
                "id"   => "edit-wpinsurance_agent",
            ),

            20 => array(
                "link" => "edit-tags.php?taxonomy=wpinsurance_agent_cat&post_type=wpinsurance_agent",
                "name" => __( "Categories", "wpinsurance" ),
                "id"   => "edit-wpinsurance_agent_cat",
            ),

        )
    );
    ksort( $admin_tabs );
    $tabs = array();
    foreach ( $admin_tabs as $key => $value ) {
        array_push( $tabs, $key );
    }
    $pages = apply_filters(
        'wpinsurance_agent_admin_tabs_on_pages',
        array( 'edit-wpinsurance_agent', 'edit-wpinsurance_agent_cat', 'edit-agent_tag', 'wpinsurance_agent' )
    );
    $admin_tabs_on_page = array();
    foreach ( $pages as $page ) {
        $admin_tabs_on_page[ $page ] = $tabs;
    }

    $current_page_id = get_current_screen()->id;
    $current_user    = wp_get_current_user();
    if ( ! in_array( 'administrator', $current_user->roles ) ) {
        return;
    }
    if ( ! empty( $admin_tabs_on_page[ $current_page_id ] ) && count( $admin_tabs_on_page[ $current_page_id ] ) ) {
        echo '<h2 class="nav-tab-wrapper lp-nav-tab-wrapper">';
        foreach ( $admin_tabs_on_page[ $current_page_id ] as $admin_tab_id ) {

            $class = ( $admin_tabs[ $admin_tab_id ]["id"] == $current_page_id ) ? "nav-tab nav-tab-active" : "nav-tab";
            echo '<a href="' . esc_url(admin_url( $admin_tabs[ $admin_tab_id ]["link"] )) . '" class="' . esc_attr($class) . ' nav-tab-' . esc_attr($admin_tabs[ $admin_tab_id ]["id"]) . '">' . esc_html($admin_tabs[ $admin_tab_id ]["name"]) . '</a>';
        }
        echo '</h2>';
    }
    return $view;
}


add_filter('views_edit-wpinsurance_agent','wpinsurance_agent_tabs');
add_action('wpinsurance_agent_cat_pre_add_form','wpinsurance_agent_tabs');

/*
 * Display tabs related to gallery in admin when user
 * viewing/editing gallery/category.
 */
function wpinsurance_gallery_tabs($view) {
    if ( ! is_admin() ) {
        return;
    }
    $admin_tabs = apply_filters(
        'wpinsurance_gallery_tabs_info',
        array(

            10 => array(
                "link" => "edit.php?post_type=wpinsurance_gallery",
                "name" => __( "Gallery", "wpinsurance" ),
                "id"   => "edit-wpinsurance_gallery",
            ),

            20 => array(
                "link" => "edit-tags.php?taxonomy=wpinsurance_gallery_cat&post_type=wpinsurance_gallery",
                "name" => __( "Categories", "wpinsurance" ),
                "id"   => "edit-wpinsurance_gallery_cat",
            ),

        )
    );
    ksort( $admin_tabs );
    $tabs = array();
    foreach ( $admin_tabs as $key => $value ) {
        array_push( $tabs, $key );
    }
    $pages = apply_filters(
        'wpinsurance_gallery_admin_tabs_on_pages',
        array( 'edit-wpinsurance_gallery', 'edit-wpinsurance_gallery_cat', 'edit-gallery_tag', 'wpinsurance_gallery' )
    );
    $admin_tabs_on_page = array();
    foreach ( $pages as $page ) {
        $admin_tabs_on_page[ $page ] = $tabs;
    }
    $current_page_id = get_current_screen()->id;
    $current_user    = wp_get_current_user();
    if ( ! in_array( 'administrator', $current_user->roles ) ) {
        return;
    }
    if ( ! empty( $admin_tabs_on_page[ $current_page_id ] ) && count( $admin_tabs_on_page[ $current_page_id ] ) ) {
        echo '<h2 class="nav-tab-wrapper lp-nav-tab-wrapper">';
        foreach ( $admin_tabs_on_page[ $current_page_id ] as $admin_tab_id ) {

            $class = ( $admin_tabs[ $admin_tab_id ]["id"] == $current_page_id ) ? "nav-tab nav-tab-active" : "nav-tab";
            echo '<a href="' . esc_url(admin_url( $admin_tabs[ $admin_tab_id ]["link"] )) . '" class="' . esc_attr($class) . ' nav-tab-' . esc_attr($admin_tabs[ $admin_tab_id ]["id"]) . '">' . esc_html($admin_tabs[ $admin_tab_id ]["name"]) . '</a>';
        }
        echo '</h2>';
    }
    return $view;
}

add_filter('views_edit-wpinsurance_gallery','wpinsurance_gallery_tabs');
add_action('wpinsurance_gallery_cat_pre_add_form','wpinsurance_gallery_tabs');


add_action( 'wsa_form_bottom_pro_themes', 'wpinsurance_pro_tab_advertise' );
function wpinsurance_pro_tab_advertise(){
    echo '<h3> <a target="_blank" href="https://themeforest.net/item/insurers-insurance-agency-wordpress-theme/19762207?s_rank=4">
Insurers - Insurance Agency WordPress Theme</a><h3/> <a target="_blank" href="https://themeforest.net/item/insurers-insurance-agency-wordpress-theme/19762207?s_rank=4"><img alt="Insurers Insurance Agency WordPress Theme" src="https://themeforest.img.customer.envatousercontent.com/files/269712902/insurers-preview-v3-0.__large_preview.jpg?auto=compress%2Cformat&q=80&fit=crop&crop=top&max-h=8000&max-w=590&s=52c62c4a2ae33050434b71e7312a27db"></a>';
}

/**
* Elementor Version check
* Return boolean value
*/
function wpinsurance_is_elementor_version( $operator = '<', $version = '2.6.0' ) {
    return defined( 'ELEMENTOR_VERSION' ) && version_compare( ELEMENTOR_VERSION, $version, $operator );
}

// Compatibility with elementor version 3.6.1
function wpinsurance_widget_register_manager($widget_class){
    $widgets_manager = \Elementor\Plugin::instance()->widgets_manager;
    
    if ( wpinsurance_is_elementor_version( '>=', '3.5.0' ) ){
        $widgets_manager->register( $widget_class );
    }else{
        $widgets_manager->register_widget_type( $widget_class );
    }
}