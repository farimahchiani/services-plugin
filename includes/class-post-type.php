<?php

defined('ABSPATH') || exit;


class Services_Post_Type
{

    public function __construct()
    {
        add_action('init', array($this, 'register_post_type'));
    }

    public function register_post_type()
    {

        $labels = array(
            'name'                  => __('Services', 'services-plugin'),
            'singular_name'         => __('Service', 'services-plugin'),
            'menu_name'             => __('Services', 'services-plugin'),
            'name_admin_bar'        => __('Service', 'services-plugin'),
            'add_new'               => __('Add New', 'services-plugin'),
            'add_new_item'          => __('Add New Service', 'services-plugin'),
            'new_item'              => __('New Service', 'services-plugin'),
            'edit_item'             => __('Edit Service', 'services-plugin'),
            'view_item'             => __('View Service', 'services-plugin'),
            'all_items'             => __('All Services', 'services-plugin'),
            'search_items'          => __('Search Services', 'services-plugin'),
            'not_found'             => __('No services found.', 'services-plugin'),
            'not_found_in_trash'    => __('No services found in Trash.', 'services-plugin'),
            'featured_image'        => __('Service Image', 'services-plugin'),
            'set_featured_image'    => __('Set service image', 'services-plugin'),
            'remove_featured_image' => __('Remove service image', 'services-plugin'),
            'use_featured_image'    => __('Use as service image', 'services-plugin'),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array(
                'slug' => 'services',
            ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 20,
            'menu_icon'          => 'dashicons-hammer',
            'show_in_rest'       => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
                'author',
            ),
        );

        register_post_type('service', $args);

        error_log( 'SERVICE CPT REGISTERED' );
    }
}
