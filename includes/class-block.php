<?php


defined('ABSPATH') || exit;

class Services_Block
{

    public function __construct()
    {

        add_action(
            'init',
            array(
                $this,
                'register_blocks',
            )
        );
    }

    public function register_blocks()
    {

        register_block_type(
            SERVICES_PLUGIN_PATH . 'blocks/services-carousel'
        );
    }
}
