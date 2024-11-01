<?php

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit();

if ( !class_exists( 'WPinsurance_Addons_Init' ) ) {
    class WPinsurance_Addons_Init{
        
        public function __construct(){
            if ( wpinsurance_is_elementor_version( '>=', '3.5.0' ) ) {
                add_action( 'elementor/widgets/register', array( $this, 'wpinsurance_includes_widgets' ) );
            }else{
                add_action( 'elementor/widgets/widgets_registered', array( $this, 'wpinsurance_includes_widgets' ) );
            }
        }
        // Include Widgets File
        public function wpinsurance_includes_widgets(){

            if ( file_exists( WPINSURANCE_ADDONS_PL_PATH.'includes/widgets/wpinsurance_addons.php' ) ) {
                require_once WPINSURANCE_ADDONS_PL_PATH.'includes/widgets/wpinsurance_addons.php';
            }

            if ( file_exists( WPINSURANCE_ADDONS_PL_PATH.'includes/widgets/wpinsurers_addons_section_title.php' ) ) {
                require_once WPINSURANCE_ADDONS_PL_PATH.'includes/widgets/wpinsurers_addons_section_title.php';
            }

            if ( file_exists( WPINSURANCE_ADDONS_PL_PATH.'includes/widgets/wpinsurance_addons_our_benefit_box.php' ) ) {
                require_once WPINSURANCE_ADDONS_PL_PATH.'includes/widgets/wpinsurance_addons_our_benefit_box.php';
            }

            if ( file_exists( WPINSURANCE_ADDONS_PL_PATH.'includes/widgets/wpinsurers_addons_testimonial.php' ) ) {
                require_once WPINSURANCE_ADDONS_PL_PATH.'includes/widgets/wpinsurers_addons_testimonial.php';
            }
            if ( file_exists( WPINSURANCE_ADDONS_PL_PATH.'includes/widgets/wpinsurers_addons_agent.php' ) ) {
                require_once WPINSURANCE_ADDONS_PL_PATH.'includes/widgets/wpinsurers_addons_agent.php';
            }
            if ( file_exists( WPINSURANCE_ADDONS_PL_PATH.'includes/widgets/wpinsurance_gallery_addons.php' ) ) {
                require_once WPINSURANCE_ADDONS_PL_PATH.'includes/widgets/wpinsurance_gallery_addons.php';
            }

            
        }
}
    new WPinsurance_Addons_Init();
}

if ( !function_exists( 'WPinsurance_fonts_url' ) ) :
function WPinsurance_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    /* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'wpinsurance' ) ) {
        $fonts[] = 'Open Sans:300,400,600,700';
    }

    /* translators: If there are characters in your language that are not supported by Raleway, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'wpinsurance' ) ) {
        $fonts[] = 'Raleway:300,400,500,600,700,900';
    }
    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        ), 'https://fonts.googleapis.com/css' );
    }

    return $fonts_url;
}
endif;

// enqueue scripts
add_action( 'wp_enqueue_scripts','wpinsurance_enqueue_scripts');
function  wpinsurance_enqueue_scripts(){
    // enqueue styles
	wp_enqueue_style('wpinsurance-font',WPinsurance_fonts_url());
    wp_enqueue_style( 'bootstrap', WPINSURANCE_ADDONS_PL_URL . 'assets/css/bootstrap.min.css');
    wp_enqueue_style( 'font-awesome', WPINSURANCE_ADDONS_PL_URL . 'assets/css/font-awesome.min.css');
    wp_enqueue_style( 'fancybox', WPINSURANCE_ADDONS_PL_URL . 'assets/css/jquery.fancybox.css');


    wp_enqueue_style( 'wpinsurance-vendors', WPINSURANCE_ADDONS_PL_URL.'assets/css/wpinsurance-vendors.css');
    wp_enqueue_style( 'wpinsurance-widgets', WPINSURANCE_ADDONS_PL_URL.'assets/css/wpinsurance-widgets.css');



    // enqueue js
     wp_enqueue_script( 'popper', WPINSURANCE_ADDONS_PL_URL . 'assets/js/popper.min.js', array('jquery'), '1.0.0', true);    
     wp_enqueue_script( 'bootstrap', WPINSURANCE_ADDONS_PL_URL . 'assets/js/bootstrap.min.js', array('jquery'), '4.0.0', true);
     wp_enqueue_script( 'fancybox', WPINSURANCE_ADDONS_PL_URL . 'assets/js/jquery.fancybox.min.js', array('jquery'), '3.1.20', true);     
     wp_enqueue_script( 'wpinsurance-vendors', WPINSURANCE_ADDONS_PL_URL.'assets/js/wpinsurance-vendors.js', array('jquery'), '', false);
     wp_enqueue_script( 'wpinsurance-active', WPINSURANCE_ADDONS_PL_URL.'assets/js/wpinsurance-jquery-widgets-active.js', array('jquery'), '', true);
}

add_action('init','wpinsurance_size');
function wpinsurance_size(){
    add_image_size('wpinsurance_img1170x600',1170,600,true);
    add_image_size('wpinsurance_img550x348',550,348,true);
    add_image_size('wpinsurance_img370x410',370,410,true);
    add_image_size('wpinsurance_img162x100',162,100,true);
}

// Text Domain load
add_action( 'init', 'wpinsurance_load_textdomain' );
function wpinsurance_load_textdomain() {
  load_plugin_textdomain( 'wpinsurance', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}


/*
CHANGE SLUGS OF CUSTOM POST TYPES
*/

function wpinsurance_post_types_slug( $args, $post_type ) {

    $wpinsurance_custom_post_name = wpinsurance_get_option( 'wpinsurance_custom_post_name', 'settings' );

    if(isset( $wpinsurance_custom_post_name ) && !empty( $wpinsurance_custom_post_name )){

        $wpinsurance_custom_post_name = strtolower(  str_replace(' ', '-', $wpinsurance_custom_post_name));

    } else{
        $wpinsurance_custom_post_name = 'services';
    }

   /*item post type slug*/   
   if ( 'wpinsurance' === $post_type ) {
        array(
            $args['rewrite']['slug'] = $wpinsurance_custom_post_name,
        );
   }

    //Agent Post
    $wpinsurance_agent_custom_post_name = wpinsurance_get_option( 'wpinsurance_agent_custom_post_name', 'settings' );

    if(isset( $wpinsurance_agent_custom_post_name ) && !empty( $wpinsurance_agent_custom_post_name )){

        $wpinsurance_agent_custom_post_name = strtolower(  str_replace(' ', '-', $wpinsurance_agent_custom_post_name));

    } else{
        $wpinsurance_agent_custom_post_name = 'agent';
    }

   /*item post type slug*/   
   if ( 'wpinsurance_agent' === $post_type ) {
        array(
            $args['rewrite']['slug'] = $wpinsurance_agent_custom_post_name,
        );
   }

   return $args;
}
add_filter( 'register_post_type_args', 'wpinsurance_post_types_slug', 10, 2 );
