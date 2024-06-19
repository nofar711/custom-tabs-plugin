<?php
class Settings_Page {

    public static function add_menu_page() {
        add_menu_page(
            'Custom Tabs Settings',
            'Custom Tabs',
            'manage_options',
            'custom-tabs-settings',
            array('Settings_Page', 'create_admin_page'),
            'dashicons-admin-generic'
        );
    }

    public static function create_admin_page() {
        ?>
        <div class="wrap">
            <h1>Settings</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('custom_tabs_settings_group');
                do_settings_sections('custom-tabs-settings');

                $tabs = get_option('custom_tabs_settings', array());
                $tab_count = count($tabs);
                ?>
                <div id="tabs-container">
                    <?php
                    if (!empty($tabs)) {
                        foreach ($tabs as $index => $tab) {
                            self::render_tab_fields($index, $tab);
                        }
                    }
                    ?>
                </div>
                <button type="button" class="button" id="add-tab">Add Tab</button>
                <?php submit_button(); ?>
            </form>
        </div>

        <script>
            var tabsData = {
                tabs: <?php echo json_encode($tabs); ?>,
                tabCount: <?php echo $tab_count; ?>
            };
        </script>
        <?php
    }

    public static function register_settings() {
        register_setting('custom_tabs_settings_group', 'custom_tabs_settings', array('sanitize_callback' => array('Settings_Page', 'sanitize_tabs_settings')));

        add_settings_section(
            'custom_tabs_settings_section',
            'Tab Content Settings',
            null,
            'custom-tabs-settings'
        );

        add_action('admin_enqueue_scripts', array('Settings_Page', 'enqueue_setting_page_script'));
    }

    public static function enqueue_setting_page_script() {
        wp_enqueue_script('setting-page-script', plugin_dir_url(__FILE__) . '../assets/js/setting-page.js', array('jquery'), null, true);
    }

    public static function sanitize_tabs_settings($input) {
        foreach ($input as $key => $value) {
            $input[$key]['title'] = sanitize_text_field($value['title']);
            $input[$key]['content'] = wp_kses_post($value['content']);
        }
        return $input;
    }

    private static function render_tab_fields($index, $tab) {
        echo '<div class="tab-panel">' .
            '<h3>Tab ' . ($index + 1) . '</h3>' .
            '<p><label>Title<br>' .
            '<input type="text" name="custom_tabs_settings[' . $index . '][title]" value="' . esc_attr($tab['title']) . '"></label></p>' .
            '<p><label>Content<br>' .
            '<textarea name="custom_tabs_settings[' . $index . '][content]" rows="2">' . esc_textarea($tab['content']) . '</textarea></label></p>' .
            '<button type="button" class="button delete-tab">Delete</button>' .
            '</div>';
    }
}

add_action('admin_init', array('Settings_Page', 'register_settings'));
add_action('admin_menu', array('Settings_Page', 'add_menu_page'));

?>
