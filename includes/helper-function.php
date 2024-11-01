<?php

namespace Elementor;

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit();

/**
 * Elementor category
 */
function wpinsurance_elementor_init(){
    Plugin::instance()->elements_manager->add_category(
        'wpinsurance',
        array(
            'title'  => 'WP Insurance',
            'icon' => 'font'
        )
    );
}
add_action('elementor/init','Elementor\wpinsurance_elementor_init');

// Service Category
function wpinsurance_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'wpinsurance_category',
        'hide_empty' => true,
    ));
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->slug ] = $term->name;
        }
        return $options;
    }
}


// Agent Category
function wpinsurance_agent_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'wpinsurance_agent_cat',
        'hide_empty' => true,
    ));
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->slug ] = $term->name;
        }
        return $options;
    }
}

// Gallery Category

function wpinsurance_gallery_categories(){
    $terms = get_terms( array(
        'taxonomy' => 'wpinsurance_gallery_cat',
        'hide_empty' => true,
    ));
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $options[ $term->slug ] = $term->name;
        }
        return $options;
    }
}


?>