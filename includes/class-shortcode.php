<?php
class Custom_Tabs_Shortcode {

    public static function register_shortcode() {
        add_shortcode('custom_tabs', array('Custom_Tabs_Shortcode', 'render_shortcode'));
        add_action('wp_enqueue_scripts', array('Custom_Tabs_Shortcode', 'enqueue_scripts'));
    }

    public static function render_shortcode($atts) {
        $options = get_option('custom_tabs_settings', array());

        // empty state
        if (empty($options)) {
            return '<p>There is nothing to show :(</p>';
        }

        ob_start();

        ?>

       <!-- component -->
        <div class="custom-tabs">
            <ul class="tab-titles">
                <?php foreach ($options as $index => $tab) : ?>
                    <li><a href="#tab-<?php echo $index; ?>"><?php echo esc_html($tab['title']); ?></a></li>
                <?php endforeach; ?>
            </ul>

            <div class="tab-contents">
                <?php foreach ($options as $index => $tab) : ?>
                    <div id="tab-<?php echo $index; ?>" class="tab-content">
                        <?php echo wpautop(wp_kses_post($tab['content'])); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php

        return ob_get_clean();
    }

    public static function enqueue_scripts() {
        wp_enqueue_script('custom-tabs-script', plugins_url('../assets/js/custom-tabs.js', __FILE__));
    }
}

add_action('init', array('Custom_Tabs_Shortcode', 'register_shortcode'));
