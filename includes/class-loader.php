<?php

/**
 * Plugin bootstrap.
 *
 * @package Services_Plugin
 */

defined('ABSPATH') || exit;

final class Services_Plugin_Loader
{

    /**
     * @var Services_Plugin_Loader|null
     */
    private static $instance = null;

    public static function get_instance()
    {

        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {

        $this->load_dependencies();
        $this->init_hooks();
    }

    private function __clone() {}

    public function __wakeup()
    {

        wp_die(esc_html__('Cheatin&#8217; huh?', 'services-plugin'));
    }

    private function load_dependencies()
    {

        require_once SERVICES_PLUGIN_PATH . 'includes/class-post-type.php';

        new Services_Post_Type();
    }

    private function init_hooks()
    {

        add_action('plugins_loaded', array($this, 'load_textdomain'));
    }

    public function load_textdomain()
    {

        load_plugin_textdomain(
            'services-plugin',
            false,
            dirname(plugin_basename(SERVICES_PLUGIN_PATH)) . '/languages'
        );
    }
}
