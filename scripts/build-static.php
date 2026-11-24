<?php
// Renders each PHP page to a static .html copy for GitHub Pages (which cannot run PHP).
// Run from the project root: npm run build:static
chdir(dirname(__DIR__));

function render(string $page): string
{
    $_SERVER['SCRIPT_FILENAME'] = $page . '.php';
    ob_start();
    include $page . '.php';
    return ob_get_clean();
}

foreach (['index', 'about', 'contact', '404'] as $page) {
    $html = render($page);
    // Internal links point at the static copies
    $html = preg_replace('/href="(index|about|contact|404)\.php/', 'href="$1.html', $html);
    file_put_contents($page . '.html', $html);
    echo "$page.html\n";
}
