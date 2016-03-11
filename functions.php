<?php
/**
---------------------------------------------------------------
---------------------------------------------------------------
 */
// Edit as required
function tnatheme_globals() {
    global $pre_path;
    global $pre_crumbs;
    if (substr($_SERVER['REMOTE_ADDR'], 0, 3) === '10.') {
        $pre_path = '';
        $pre_crumbs = array(
            'FOI' => '/'
        );
    } else {
        $pre_crumbs = array(
            'About us' => '/about/',
            'FOI' => '/about/foi/'
        );
        $pre_path = '/about/foi';
    }
}
// For live environment
// tnatheme_globals();
/**
---------------------------------------------------------------
---------------------------------------------------------------
 */
function dequeue_parent_style() {
    wp_dequeue_style('tna-styles');
    wp_deregister_style('tna-styles');
}
add_action( 'wp_enqueue_scripts', 'dequeue_parent_style', 9999 );
add_action( 'wp_head', 'dequeue_parent_style', 9999 );
// Enqueue styles
function tna_child_styles() {
    wp_register_style( 'tna-parent-styles', get_template_directory_uri() . '/css/base-sass.css.min', array(), EDD_VERSION, 'all' );
    wp_register_style( 'tna-child-styles', get_stylesheet_directory_uri() . '/style.css', array(), '0.1', 'all' );
    wp_enqueue_style( 'tna-parent-styles' );
    wp_enqueue_style( 'tna-child-styles' );
}
add_action( 'wp_enqueue_scripts', 'tna_child_styles' );

/**
    ---------------------------------------------------------------
    ---------------------------------------------------------------
 */
// Change the POSTS label to Information requests
function edit_admin_menus() {
    global $menu;
    global $submenu;

    $menu[5][0] = 'Information requests'; // Change Posts to Recipes
    $submenu['edit.php'][5][0] = 'All information requests';
    $submenu['edit.php'][10][0] = 'Add an information request';
}
add_action( 'admin_menu', 'edit_admin_menus' );

function custom_theme_setup() {
    add_theme_support( $feature, $arguments );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

/**
---------------------------------------------------------------
---------------------------------------------------------------
 */


