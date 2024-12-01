<?php
/**
 * Redirects to the specified URL.
 * 
 * @param string $url The URL to redirect to.
 */
function redirectTo($url)
{
    header("Location: $url");
}

/**
 * Renders a view or template with the given data.
 * 
 * @param string $path The path to the view or template file.
 * @param array $data The data to pass to the view or template.
 * @param bool $templates Whether to use the templates directory.
 */
function render($path, $data = [], $templates = false)
{
    if ($templates) {
        require "templates/$path.php";
    } else {
        require "views/$path.php";
    }
}
