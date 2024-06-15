<?php
/*
Plugin Name: Custom Greeting Plugin
Description: A custom WordPress plugin to display a greeting based on the time of day.
Version: 1.0
Author: Naqeeb Ul Rehman
Author URI: https://naqeebulrehman.netlify.app
*/

// Shortcode for displaying greeting based on time of day
function custom_greeting_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'name' => 'Guest',
    ), $atts );

    // Get the current hour in 24-hour format
    $current_hour = (int) date_i18n( 'G' );

    // Determine the time of day
    if ( $current_hour >= 5 && $current_hour < 12 ) {
        $greeting = 'Good morning';
    } elseif ( $current_hour >= 12 && $current_hour < 17 ) {
        $greeting = 'Good afternoon';
    } else {
        $greeting = 'Good evening';
    }

    // Output the greeting message
    $output = '<p>' . esc_html( $greeting ) . ', ' . esc_html( $atts['name'] ) . '!</p>';

    return $output;
}
add_shortcode( 'custom_greeting', 'custom_greeting_shortcode' );
