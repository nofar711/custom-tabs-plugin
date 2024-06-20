<?php
class Custom_Tabs_Plugin {

    public static function init() {
        self::includes();
        self::hooks();
    }

    private static function includes() {
        require_once CUSTOM_TABS_PLUGIN_PATH . 'includes/class-settings-page.php';
        require_once CUSTOM_TABS_PLUGIN_PATH . 'includes/class-shortcode.php';
    }

    private static function hooks() {
        add_action( 'admin_menu', array( 'Settings_Page', 'add_menu_page' ) );
        add_action( 'init', array( 'Custom_Tabs_Shortcode', 'register_shortcode' ) );
        add_action( 'wp_enqueue_scripts', array( 'Custom_Tabs_Plugin', 'enqueue_styles' ) );
    }

    public static function enqueue_styles() {
        wp_enqueue_style( 'custom-tabs-plugin-style', plugins_url( '../assets/scss/style.scss', __FILE__ ) );
        wp_enqueue_style( 'custom-tabs-plugin-post-component', plugins_url( '../assets/scss/post-component.scss', __FILE__ ) );
        wp_enqueue_style('custom-tabs-plugin-font', 'https://use.typekit.net/wuz0gtr.css');
    }
}

?>
