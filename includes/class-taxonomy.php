<?php

defined('ABSPATH') || exit;

class Services_Taxonomy
{


    public function __construct()
    {

        add_action(
            'init',
            array(
                $this,
                'register_taxonomy',
            )
        );
    }


    public function register_taxonomy()
    {

        $labels = array(
            'name'              => __('Service Categories', 'services-plugin'),
            'singular_name'     => __('Service Category', 'services-plugin'),
            'search_items'      => __('Search Categories', 'services-plugin'),
            'all_items'         => __('All Categories', 'services-plugin'),
            'parent_item'       => __('Parent Category', 'services-plugin'),
            'parent_item_colon' => __('Parent Category:', 'services-plugin'),
            'edit_item'         => __('Edit Category', 'services-plugin'),
            'update_item'       => __('Update Category', 'services-plugin'),
            'add_new_item'      => __('Add New Category', 'services-plugin'),
            'new_item_name'     => __('New Category Name', 'services-plugin'),
            'menu_name'         => __('Service Categories', 'services-plugin'),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,
            'query_var'         => true,
            'rewrite'           => array(
                'slug' => 'service-category',
            ),
        );

        register_taxonomy(
            'service_category',
            array('service'),
            $args
        );
    }
}
