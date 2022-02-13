<?php

declare(strict_types=1);

/**
 * Plugin Name: API Explorer
 * Plugin URI: https://github.com/Awilum
 * Description: API Explorer
 * Author: Sergey Romanenko
 * Version: 1.0.0
 * Author URI: https://github.com/Awilum
 */

use Glowy\View\View;

! is_file($autoload = __DIR__ . '/vendor/autoload.php') and exit('Please run: <i>composer install</i>');

$loader = require_once $autoload;

View::setDirectory(__DIR__ . '/views/');
View::setExtension('php');

add_filter('comment_row_actions', function($actions, $data) {
    return array_merge($actions, [view('link_row')->with(['data' => $data])->render()]);
}, 100, 2);

add_filter('tag_row_actions', function($actions, $data) {
    return array_merge($actions, [view('link_row')->with(['data' => $data])->render()]);
}, 100, 2);

add_filter('page_row_actions', function($actions, $data) {
    return array_merge($actions, [view('link_row')->with(['data' => $data])->render()]);
}, 100, 2);

add_filter('post_row_actions', function($actions, $data) {
    return array_merge($actions, [view('link_row')->with(['data' => $data])->render()]);
}, 100, 2);

add_action('admin_footer', function() {
    view('explorer')->display();
});

add_action('admin_print_footer_scripts', function() {
    view('js')->display();
});