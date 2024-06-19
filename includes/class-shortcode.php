<?php
class Custom_Tabs_Shortcode {

    public static function register_shortcode() {
        add_shortcode('custom_tabs', array('Custom_Tabs_Shortcode', 'render_shortcode'));
        add_action('wp_enqueue_scripts', array('Custom_Tabs_Shortcode', 'enqueue_scripts'));
    }

    public static function render_shortcode($atts) {
        $options = get_option('custom_tabs_settings', array());
        $default_tab_data = Settings_Page::get_default_tab_data();

        ob_start();
        ?>

        <!-- component -->
        <div class="custom-tabs">
            <ul class="tab-titles">
                
                    <li><a href="#default-tab"><?php echo esc_html($default_tab_data['title']); ?></a></li>
                    <?php if (!empty($options)) : ?>
                    <?php foreach ($options as $index => $tab) : ?>
                        <li><a href="#tab-<?php echo $index; ?>"><?php echo esc_html($tab['title']); ?></a></li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>

            <div class="tab-contents">
                    <div id="default-tab" class="tab-content">
                        <?php echo wpautop(wp_kses_post($default_tab_data['content'])); ?>
                    </div>
                    <?php if (!empty($options)) : ?>
                    <?php foreach ($options as $index => $tab) : ?>
                        <div id="tab-<?php echo $index; ?>" class="tab-content">
                            <?php echo wpautop(wp_kses_post($tab['content'])); ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <!-- end component -->

        <?php

        return ob_get_clean();
    }

    public static function enqueue_scripts() {
        wp_enqueue_script('custom-tabs-script', plugins_url('../assets/js/custom-tabs.js', __FILE__), array('jquery'), null, true); // Adjust script URL and dependencies as needed
    }
}

add_action('init', array('Custom_Tabs_Shortcode', 'register_shortcode'));
?>
