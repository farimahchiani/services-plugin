<?php

defined('ABSPATH') || exit;

final class Services_Plugin_Loader
{
    private static $instance = null;

    private $classes = array();

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
        $this->init_classes();
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
        require_once SERVICES_PLUGIN_PATH . 'includes/class-taxonomy.php';
        require_once SERVICES_PLUGIN_PATH . 'includes/class-meta.php';
        require_once SERVICES_PLUGIN_PATH . 'includes/class-block.php';
    }

    private function init_classes()
    {
        $this->classes['post_type'] = new Services_Post_Type();
        $this->classes['taxonomy']  = new Services_Taxonomy();
        $this->classes['meta']      = new Services_Meta();
        $this->classes['block'] = new Services_Block();
    }

    private function init_hooks()
    {
        add_action('plugins_loaded', array($this, 'load_textdomain'));

        add_action('init', array($this, 'register_blocks'), 20);
    }

    public function register_blocks()
    {
        error_log('BLOCK REGISTER START');

        if (!function_exists('register_block_type')) {
            return;
        }

        register_block_type(
            SERVICES_PLUGIN_PATH . 'blocks/services-carousel/block.json'
        );

        error_log('BLOCK REGISTERED SUCCESS');
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
