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
                if (!is_array($tabs)) {
                    $tabs = array();
                }
                $tab_count = count($tabs);
                ?>
                <div id="tabs-container">
                    <?php
                    self::render_default_tab();
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

    protected static $default_tab_data = array(
        'title' => 'default title test',
        'content' => 'default content test'
    );

    public static function get_default_tab_data() {
        return self::$default_tab_data;
    }

    private static function render_default_tab() {
        $default_tab_data = self::get_default_tab_data();
        $default_tab_title = $default_tab_data['title'];
        $default_tab_content = $default_tab_data['content'];

        echo '<div class="tab-panel default-tab">' .
            '<h3>Default Tab</h3>' .
            '<p><label>Tab Title<br>' .
            '<input type="text" name="default_tab_title" value="' . esc_attr($default_tab_title) . '" readonly></label></p>' .
            '<p><label>Tab Content<br>' .
            '<textarea name="default_tab_content" rows="3" readonly>' . esc_textarea($default_tab_content) . '</textarea></label></p>' .
            '</div>';
    }

    private static function render_tab_fields($index, $tab) {
        echo '<div class="tab-panel">' .
            '<h3>Tab ' . ($index + 1) . '</h3>' .
            '<p><label>Tab Title<br>' .
            '<input type="text" name="custom_tabs_settings[' . $index . '][title]" value="' . esc_attr($tab['title']) . '"></label></p>' .
            '<p><label>Tab Content<br>' .
            '<textarea name="custom_tabs_settings[' . $index . '][content]" rows="3">' . esc_textarea($tab['content']) . '</textarea></label></p>' .
            '<button type="button" class="button delete-tab">Delete</button>' .
            '</div>';
    }

    public static function render_tabs_shortcode($atts) {
        ob_start();
        ?>
        <div class="custom-tabs">
            <div class="tab-panel default-tab">
                <h3><?php echo esc_html(self::$default_tab_data['title']); ?></h3>
                <div><?php echo wp_kses_post(self::$default_tab_data['content']); ?></div>
            </div>
            <?php
            $tabs = get_option('custom_tabs_settings', array());
            if (!is_array($tabs)) {
                $tabs = array();
            }
            foreach ($tabs as $index => $tab) {
                echo '<div class="tab-panel">' .
                    '<h3>' . esc_html($tab['title']) . '</h3>' .
                    '<div>' . wp_kses_post($tab['content']) . '</div>' .
                    '</div>';
            }
            ?>
        </div>
        <?php
        return ob_get_clean();
    }
}

add_action('admin_init', array('Settings_Page', 'register_settings'));
add_action('admin_menu', array('Settings_Page', 'add_menu_page'));
add_shortcode('custom_tabs', array('Settings_Page', 'render_tabs_shortcode'));

?>
