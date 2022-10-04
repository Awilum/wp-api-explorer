<?php

declare(strict_types=1);

/**
 * Plugin Name: API Explorer
 * Plugin URI: https://github.com/Awilum/wp-api-explorer
 * Description: WordPress plugins adds API Explorer link for pages, posts, tags, categories and comments
 * Author: Sergey Romanenko
 * Version: 1.0.0
 * Author URI: https://awilum.github.io/
 */

require_once __DIR__ . '/includes/vars.php';

Vars::$storage['views_directory'] =  __DIR__ . '/views/';
Vars::$storage['views_extension'] = 'php';

require_once __DIR__ . '/includes/view.php';

add_filter('comment_row_actions', function($actions, $data) {
    return array_merge($actions, [view('link_row', ['data' => $data])]);
}, 100, 2);

add_filter('tag_row_actions', function($actions, $data) {
    return array_merge($actions, [view('link_row', ['data' => $data])]);
}, 100, 2);

add_filter('page_row_actions', function($actions, $data) {
    return array_merge($actions, [view('link_row', ['data' => $data])]);
}, 100, 2);

add_filter('post_row_actions', function($actions, $data) {
    return array_merge($actions, [view('link_row', ['data' => $data])]);
}, 100, 2);

add_action('admin_footer', function() {
    echo view('explorer');
});

add_action('admin_print_footer_scripts', function() {
    echo view('js');
});