<?php
/**
 * Plugin Name: Custom Text Card Widgets
 * Description: Elementor custom widgets from Text Image, Title and Description.
 * Plugin URI:  https://sufalkumar.com/
 * Version:     1.0.0
 * Author:      Sufal
 * Author URI:  https://sufalkumar.com/
 * Text Domain: custom-text-card-widget
 *
 * Elementor tested up to: 3.5.0
 * Elementor Pro tested up to: 3.5.0
 */


 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Widgets.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */


function register_custom_textcard_widgets( $widgets_manager ) {

    require_once( __DIR__ . '/widgets/card-widget.php' );  // include the widget file

    $widgets_manager->register( new \Elementor_Custom_Text_Card_Widget() );  // register the widget

}
add_action( 'elementor/widgets/register', 'register_custom_textcard_widgets' );