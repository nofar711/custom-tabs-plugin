<?php
class Settings_Page {

    public static function add_menu_page() {
        add_menu_page(
            'Custom Tabs Settings',
            'Custom Tabs',
            'manage_options',
            'custom-tabs-settings',
            array('Settings_Page', 'create_admin_page'),
            plugins_url('../assets/img/custom-icon.svg', __FILE__), 
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
                ?>
                <div class="tabs-container">
                    <?php
                    foreach ($tabs as $index => $tab) {
                        self::render_tab_fields($tab, $index);
                    }
                    ?>
                </div>
                <div class="action-buttons">
                    <button type="button" class="button" id="add-tab">Add New Tab</button>
                    <?php submit_button(); ?>
                </div>
                
            </form>
        </div>

        <div id="tab-template" style="display: none;">
            <?php self::render_tab_fields(array('post_id' => '', 'post_type' => ''), 'INDEX'); ?>
        </div>

        <script>
        jQuery(document).ready(function($) {
            $('#add-tab').on('click', function() {
                var template = $('#tab-template').html().replace(/INDEX/g, $('.tab-panel').length);
                $('.tabs-container').append(template);
            });

            $(document).on('click', '.delete-button', function() {
                $(this).closest('.tab-panel').remove();
            });

            $(document).on('change', '.post-type-select', function() {
                var postType = $(this).val();
                var $postSelect = $(this).closest('.tab-panel').find('.post-select');

                $.ajax({
                    url: ajaxurl,
                    method: 'POST',
                    data: {
                        action: 'load_posts',
                        post_type: postType
                    },
                    success: function(response) {
                        $postSelect.html(response);
                    }
                });
            });
        });
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
        add_action('wp_ajax_load_posts', array('Settings_Page', 'load_posts_ajax'));
    }

    public static function sanitize_tabs_settings($input) {
        foreach ($input as $key => $value) {
            $input[$key]['post_id'] = absint($value['post_id']);
            $input[$key]['post_type'] = sanitize_text_field($value['post_type']);
        }
        return $input;
    }

    private static function render_tab_fields($tab, $index) {
        $post_types = get_post_types(array('public' => true), 'objects');
        $selected_post_type = isset($tab['post_type']) ? $tab['post_type'] : '';

        $post_type_options = '';
        foreach ($post_types as $post_type) {
            $selected = $post_type->name == $selected_post_type ? 'selected' : '';
            $post_type_options .= '<option value="' . $post_type->name . '" ' . $selected . '>' . esc_html($post_type->labels->singular_name) . '</option>';
        }

        $posts = get_posts(array('post_type' => $selected_post_type, 'numberposts' => -1));
        $post_options = '';
        foreach ($posts as $post) {
            $selected = isset($tab['post_id']) && $post->ID == $tab['post_id'] ? 'selected' : '';
            $post_options .= '<option value="' . $post->ID . '" ' . $selected . '>' . esc_html($post->post_title) . '</option>';
        }

        ?>
        <div class="tab-panel">
            <h3>Tab</h3>
            <p><label>Select Post Type<br>
                <select name="custom_tabs_settings[<?php echo $index; ?>][post_type]" class="post-type-select"><?php echo $post_type_options; ?></select></label></p>
            <p><label>Select Post<br>
                <select name="custom_tabs_settings[<?php echo $index; ?>][post_id]" class="post-select"><?php echo $post_options; ?></select></label></p>
            <button type="button" class="button delete-button">Delete</button>
        </div>
        <?php
    }

    public static function load_posts_ajax() {
        $post_type = isset($_POST['post_type']) ? sanitize_text_field($_POST['post_type']) : 'post';
        $posts = get_posts(array('post_type' => $post_type, 'numberposts' => -1));
        $post_options = '';
        foreach ($posts as $post) {
            $post_options .= '<option value="' . $post->ID . '">' . esc_html($post->post_title) . '</option>';
        }
        echo $post_options;
        wp_die();
    }

    public static function enqueue_styles() {
        wp_enqueue_style('custom-tabs-plugin-font', 'https://use.typekit.net/wuz0gtr.css');
        wp_enqueue_style('custom-tabs-plugin-settings-page-style', plugins_url('../assets/scss/settings-page-style.scss', __FILE__));
    }
}

add_action('admin_init', array('Settings_Page', 'register_settings'));
add_action('admin_menu', array('Settings_Page', 'add_menu_page'));
add_action('admin_enqueue_scripts', array('Settings_Page', 'enqueue_styles'));

?>
