<?php

if (!defined('ABSPATH')) exit;

/**
 * License manager module
 */
function gclpr_updater_utility() {
    $prefix = 'GCLPR_';
    $settings = [
        'prefix' => $prefix,
        'get_base' => GCLPR_PLUGIN_BASENAME,
        'get_slug' => GCLPR_PLUGIN_DIR,
        'get_version' => GCLPR_BUILD,
        'get_api' => 'https://download.geekcodelab.com/',
        'license_update_class' => $prefix . 'Update_Checker'
    ];

    return $settings;
}

function gclpr_updater_activate() {

    // Refresh transients
    delete_site_transient('update_plugins');
    delete_transient('gclpr_plugin_updates');
    delete_transient('gclpr_plugin_auto_updates');
}

require_once(GCLPR_PLUGIN_DIR_PATH . 'updater/class-update-checker.php');
