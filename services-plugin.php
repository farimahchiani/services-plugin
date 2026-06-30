<?php

/**
 * Plugin Name: Services Plugin
 * Plugin URI: https://github.com/farimahchiani/services-plugin
 * Description: Custom Services plugin with Gutenberg carousel block.
 * Version: 1.0.0
 * Requires at least: 6.6
 * Requires PHP: 8.1
 * Author: Farimah Chiani
 * License: GPL v2 or later
 * Text Domain: services-plugin
 * Domain Path: /languages
 */

defined('ABSPATH') || exit;

define('SERVICES_PLUGIN_VERSION', '1.0.0');
define('SERVICES_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('SERVICES_PLUGIN_URL', plugin_dir_url(__FILE__));

require_once SERVICES_PLUGIN_PATH . 'includes/helpers.php';
require_once SERVICES_PLUGIN_PATH . 'includes/class-loader.php';


function services_plugin()
{
    return Services_Plugin_Loader::get_instance();
}

services_plugin();
