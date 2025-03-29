<?php
/**
 * Plugin Name: Visitor Counter
 * Description: A simple plugin to count and display unique visitors.
 * Version: 1.0
 * Author: Your Name
 * License: GPL2
 */

// Ensure WordPress is loaded
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Initialize the visitor count in the database if it doesn't exist
function initialize_visitor_counter() {
    if ( get_option( 'visitor_count' ) === false ) {
        update_option( 'visitor_count', 0 );
    }
}
register_activation_hook( __FILE__, 'initialize_visitor_counter' );

// Function to count visitors
function count_visitors() {
    if ( ! isset( $_COOKIE['has_visited'] ) ) {
        // If the user has not visited before, count them as a unique visitor
        $visitor_count = get_option( 'visitor_count' );
        $visitor_count++;
        update_option( 'visitor_count', $visitor_count );

        // Set a cookie to mark that the user has visited
        setcookie( 'has_visited', 'true', time() + 3600 * 24 * 365, COOKIEPATH, COOKIE_DOMAIN );
    }
}

// Hook to count visitors on each page load
add_action( 'wp', 'count_visitors' );

// Shortcode to display the number of unique visitors
function display_visitor_count() {
    $visitor_count = get_option( 'visitor_count' );
    return '<p>' . __( 'Total Unique Visitors:', 'visitor-counter' ) . ' ' . $visitor_count . '</p>';
}
add_shortcode( 'visitor_count', 'display_visitor_count' );

// Register settings page
function visitor_counter_menu() {
    add_options_page(
        __( 'Visitor Counter Settings', 'visitor-counter' ), 
        __( 'Visitor Counter', 'visitor-counter' ), 
        'manage_options', 
        'visitor-counter', 
        'visitor_counter_settings_page'
    );
}
add_action( 'admin_menu', 'visitor_counter_menu' );

// Display settings page
function visitor_counter_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php _e( 'Visitor Counter Settings', 'visitor-counter' ); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields( 'visitor_counter_settings_group' );
            do_settings_sections( 'visitor-counter' );
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><?php _e( 'Reset Visitor Count', 'visitor-counter' ); ?></th>
                    <td>
                        <input type="submit" name="reset_visitor_count" class="button-primary" value="<?php _e( 'Reset Visitor Count', 'visitor-counter' ); ?>" />
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Register settings
function visitor_counter_register_settings() {
    register_setting( 'visitor_counter_settings_group', 'visitor_count' );
}
add_action( 'admin_init', 'visitor_counter_register_settings' );

// Reset visitor count
if ( isset( $_POST['reset_visitor_count'] ) ) {
    update_option( 'visitor_count', 0 );
}

// Load translation files
function visitor_counter_load_textdomain() {
    load_plugin_textdomain( 'visitor-counter', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'visitor_counter_load_textdomain' );
