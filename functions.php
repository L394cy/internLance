<?php
/**
 * MakeUC22-Internship Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MakeUC22-Internship
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_MAKEUC22_INTERNSHIP_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'makeuc22-internship-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_MAKEUC22_INTERNSHIP_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

/**
 * WORK BELOW THIS LINE 
 */
include('uuid/vendor/autoload.php');
include('classes/classes.php');
include('cpt/cpt.php');
include('snippets/snippets.php');


if (!function_exists('p_r')){function p_r($s){echo "<pre>";print_r($s);echo "</pre>";}}
if (!function_exists('write_log')){ function write_log ( $log )  { if ( is_array( $log ) || is_object( $log ) ) { error_log( print_r( $log, true ) ); } else { error_log( $log ); }}}
if (!function_exists('clean')){ function clean($string) { $string = str_replace(' ', '-', $string); return preg_replace('/[^A-Za-z0-9\-]/', '', $string); } }



