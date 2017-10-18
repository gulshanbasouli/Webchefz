<?php
/**
*Plugin Name: Minigiv Dashboard Access Denied
*Author: Webchefz
*Author URI: https://www.webchefz.com
*Description: Dashboard Access Denied for users
*Plugin URI:  https://github.com/gulshanbasouli/Webchefz
Version: 0.1
*/

// Remove Admin access for subscribers

 /**
 * Disable admin bar for subscribers and who cannot edit posts
 * for subscribers.
 */
function wbcDisabled() {
    if ( ! current_user_can('edit_posts') ) {
        add_filter('show_admin_bar', '__return_false');
    }
}
add_action( 'after_setup_theme', 'wbcDisabled' );
 
/**
 * Redirect back to homepage
 */
function wbcRedirect(){
    if ( ! defined('DOING_AJAX') && ! current_user_can('edit_posts') && DOING_AJAX) {
        wp_redirect( site_url() );
        exit;      
    }
}
add_action( 'admin_init', 'wbcRedirect()' );
