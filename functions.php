<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
//    wp_enqueue_style( 'child-style',
//        get_stylesheet_directory_uri() . '/style.css',
//        array('parent-style')
//    );
}

// Basic theme setup
if (!function_exists('wpbootstrap_child_setup_theme')) {
    function wpbootstrap_child_setup_theme() {
        register_nav_menus(
            array(
//                'header-menu' => __('Header Menu', 'wpbootstrap'),
                'user-menu' => __( 'User Menu', 'wpbootstrap' ),
            )
        );
    }
    add_action('after_setup_theme', 'wpbootstrap_child_setup_theme');
}


add_action('init', 'types_tml_fix');
function types_tml_fix(){
    if (!is_admin()) {
        require WPCF_EMBEDDED_ABSPATH .'/admin.php';
    }
}

// Filter wp_nav_menu() to add additional links and other output
function new_nav_menu_items($items) {

    if ( is_user_logged_in() ){
        $logou_url=wp_logout_url( home_url() );
        $logoutlink = '<li class="menu-item"><a href="'.$logou_url.'">' . __('登出') . '</a></li>';
        $items = $items.$logoutlink;
    }

    return $items;
}
add_filter( 'wp_nav_menu_items', 'new_nav_menu_items' );


//disable admin bar for Editor and Subscriber
function disable_admin_bar_users(){

    $show_admin_bar = false;
    if ( is_user_logged_in() ) {
        global $current_user;
        switch (true)  {
            case ( user_can( $current_user, "subscriber") || user_can( $current_user, "author")):
                $show_admin_bar = false;
                break;
            default:
                $show_admin_bar = true;
                break;
        }
    }
    return $show_admin_bar;
}

add_filter('show_admin_bar', 'disable_admin_bar_users');

//for wp-toolset Views usage
//https://github.com/easydigitaldownloads/Easy-Digital-Downloads/blob/master/includes/cart/functions.php
function edd_is_product_in_cart(  $download_id){

    $cart_details = function_exists( 'edd_get_cart_content_details' ) ? edd_get_cart_content_details() : false;
    if($cart_details){
        foreach ($cart_details as $item) {
            if($item['id'] == $download_id)
                return 1;
        }
    }

    return 0;
}

//head cleaning

remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

remove_action('wp_head', 'feed_links_extra', 3); // Remove category feeds
remove_action('wp_head', 'feed_links', 2); // Remove Post and Comment Feeds

remove_action('wp_head', 'wp_generator');



//test ajax

/*
add_action( 'admin_enqueue_scripts', 'my_enqueue' );
function my_enqueue($hook) {
    if( 'index.php' != $hook ) {
        // Only applies to dashboard panel
        return;
    }

    wp_enqueue_script( 'ajax-script', get_stylesheet_directory_uri().'/js/my_query.js', array('jquery') );

    // in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value
    wp_localize_script( 'ajax-script', 'ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ) );
}


add_action( 'wp_ajax_my_action', 'my_action_callback' );

function my_action_callback() {
    global $wpdb; // this is how you get access to the database

    $whatever = intval( $_POST['whatever'] );

    $whatever += 10;

    echo $whatever;

    wp_die(); // this is required to terminate immediately and return a proper response
}
*/