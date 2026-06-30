<?php

defined('ABSPATH') || exit;

class Services_Meta
{
    const META_KEY = 'service_price';

    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'add_meta_box']);
        add_action('save_post_service', [$this, 'save_meta']);
        add_action('init', [$this, 'register_meta']);
    }

    public function register_meta()
    {
        register_post_meta('service', self::META_KEY, [
            'type' => 'number',
            'single' => true,
            'show_in_rest' => true,
            'sanitize_callback' => [$this, 'sanitize_price'],
            'auth_callback' => [$this, 'auth_check'],
            'schema' => [
                'type' => 'number',
                'description' => 'Service price',
                'context' => ['view', 'edit']
            ]
        ]);
    }

    public function add_meta_box()
    {
        add_meta_box(
            'service_price_meta',
            __('Service Price', 'services-plugin'),
            [$this, 'render_meta_box'],
            'service',
            'side',
            'default'
        );
    }

    public function render_meta_box($post)
    {
        $value = get_post_meta($post->ID, 'service_price', true);

        wp_nonce_field('service_price_nonce', 'service_price_nonce_field');

        include SERVICES_PLUGIN_PATH . 'admin/views/meta-price-field.php';
    }

    public function save_meta($post_id)
    {
        if (
            !isset($_POST['service_price_nonce_field']) ||
            !wp_verify_nonce($_POST['service_price_nonce_field'], 'service_price_nonce')
        ) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        if (isset($_POST[self::META_KEY])) {
            update_post_meta(
                $post_id,
                self::META_KEY,
                $this->sanitize_price($_POST[self::META_KEY])
            );
        }
    }

    public function sanitize_price($value)
    {
        return is_numeric($value) ? (float) $value : 0;
    }

    public function auth_check()
    {
        return current_user_can('edit_posts');
    }
}
