<?php

declare(strict_types=1);

function view(string $view, array $data = [], $callback = null)
{
    $viewFile = Vars::$storage['views_directory'] . $view . '.' . Vars::$storage['views_extension'];

    if (! file_exists($viewFile)) {
        return '';
    }

    // Extract variables as references
    $viewVars = array_merge($data);

    extract($viewVars, EXTR_REFS);

    // Turn on output buffering
    ob_start();

    // Include view file
    include $viewFile;

    // Write content.
    $content = ob_get_clean() ?: '';

    // Filter content
    if ($callback !== null) {
        $content = call_user_func($callback, $content);
    }

    // Return rendered content
    return $content;
}