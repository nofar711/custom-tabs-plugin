<?php
class Custom_Tabs_Shortcode {

    public static function register_shortcode() {
        add_shortcode('custom_tabs', array('Custom_Tabs_Shortcode', 'render_shortcode'));
        add_action('wp_enqueue_scripts', array('Custom_Tabs_Shortcode', 'enqueue_scripts'));
    }

    public static function render_shortcode($atts) {
        $options = get_option('custom_tabs_settings', array());

        ob_start();
        ?>

        <!-- component -->
        <div class="custom-tabs">
            <?php if (empty($options)) : ?>
                <p>There is nothing to show :(</p>
            <?php else : ?>
                <div class="tabs-header">
                    <ul class="tabs-header-titles">
                        <?php foreach ($options as $index => $tab) : ?>
                            <li class="tab-title" id="tab-<?php echo $index; ?>-button"><?php echo get_the_title($tab['post_id']); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="tabs-body">
                    <?php foreach ($options as $index => $tab) : ?>
                        <div id="tab-<?php echo $index; ?>" class="tab-content">
                            <?php echo get_post_field('post_content', $tab['post_id']); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- end component -->

        <?php

        return ob_get_clean();
    }

    public static function enqueue_scripts() {
        wp_enqueue_script('custom-tabs-script', plugins_url('../assets/js/custom-tabs.js', __FILE__));
    }
}

add_action('init', array('Custom_Tabs_Shortcode', 'register_shortcode'));

?>
