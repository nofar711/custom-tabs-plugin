<?php
/**
 * Plugin Name: Custom Tabs Plugin
 * Description: Custom tabs for your website.
 * Version: 1.0
 * Author: Nofar Shlomo
 * Text Domain: custom-tabs-plugin
 */

define( 'CUSTOM_TABS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

require_once CUSTOM_TABS_PLUGIN_PATH . 'includes/class-custom-tabs-plugin.php';

add_action( 'plugins_loaded', array( 'Custom_Tabs_Plugin', 'init' ) );

?>