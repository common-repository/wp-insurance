<?php
    // WPinsurance options menu
    if ( ! function_exists( 'wpinsurance_add_adminbar_menu' ) ) {
        function wpinsurance_add_adminbar_menu() {
            $menu = 'add_menu_' . 'page';
            $menu( 
                'wpinsurance_panel', 
                __( 'WP Insurance', 'wpinsurance' ), 
                'read', 
                'wpinsurance_menu', 
                '', 
                'dashicons-admin-generic', 
                40 
            );
        }
    }
    add_action( 'admin_menu', 'wpinsurance_add_adminbar_menu' );

if(!function_exists('wpinsurance_pagination')){
    function wpinsurance_pagination(){
        ?>
        <div class="wpinsurance-pagination"> <?php
            the_posts_pagination(array(
                'prev_text'          => '<i class="fa fa-angle-left"></i>',
                'next_text'          => '<i class="fa fa-angle-right"></i>',
                'type'               => 'list'
            )); ?>
        </div>
        <?php
    }
}


if( !function_exists('admin_media_scripts') ) {
    function admin_media_scripts() {
        wp_enqueue_style( 'assets', plugins_url( '/', __FILE__ ) . 'css/assets.css', false, '1.0' );
        wp_enqueue_script( 'assets', plugins_url( '/', __FILE__ ) . 'js/assets.js', false, '1.0' );
    }
}

add_action('admin_enqueue_scripts', 'admin_media_scripts');

?>