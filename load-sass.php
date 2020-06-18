<?php

/**
 * Plugin Name: Load Sass
 * Plugin URI: https://truthseekers.io
 * Description: registering css preprocessers
 * Author: John
 * Author URI: https://truthseekers.io
 */

function new_plugin_setup()
{
    $asset_file = include(plugin_dir_path(__FILE__) . 'build/index.asset.php');

    wp_register_script(
        'truth-block-editor-script',
        plugins_url('build/index.js', __FILE__),
        $asset_file['dependencies'],
        $asset_file['version']
    );

    wp_register_style(
        'truth-block-editor-style',
        plugins_url('/src/editor.style.css', __FILE__),
        array('wp-edit-blocks')
    );

    wp_register_style(
        'truth-block-frontend-style',
        plugins_url('/src/style.css', __FILE__),
        array('wp-edit-blocks')
    );

    wp_register_script(
        'truth-block-frontend-script', //handle
        plugins_url('/src/frontend.js', __FILE__),
        array('jquery')
    );

    register_block_type('truth/new-plugin-block', array(
        'editor_script' => 'truth-block-editor-script',
        'editor_style'  => 'truth-block-editor-style',
        'script'        => 'truth-block-frontend-script',
        'style'         => 'truth-block-frontend-style'
    ));
}

add_action('init', 'new_plugin_setup');
