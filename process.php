<?php define("BASE_PATH", __DIR__ . "/public");

require_once __DIR__ . "/helpers.php";


$uri = $_SERVER['REQUEST_URI'];

$request = parse_url($uri);

$directory = rtrim(BASE_PATH . $request["path"], "/");


if (!file_exists($directory)) terminate_process();

if (is_file($directory)) download($directory);


/**
 * File meta-data
 */
$items = [];

$entries = scandir($directory);

# Remove "." from the Array
array_shift($entries);


foreach ($entries as $entry) {
    $full = $directory . '/' . $entry;
    
    $is_dir = is_dir($full) ? 1 : 0;

    $stat = stat($full);
    
    $size = $is_dir ? null : format_file_size($stat['size']);
    
    $mtime = date('M d, Y H:i', $stat['mtime']);
    
    $url = rtrim($request["path"], '/') . '/' . $entry . ($is_dir ? '/' : '');
    
    $items[] = compact('entry', 'url', 'is_dir', 'size', 'mtime');
}
