<?php defined("BASE_PATH") || die("Permission defined!");


function format_file_size(float $bytes, int $decimals = 2): string {
    $sizes = ['B', 'KB', 'MB', 'GB', 'TB'];

    if ($bytes == 0) return '0 B';

    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . ' ' . $sizes[$factor];
}

/**
 * Request processor
 */
function download(string $file): void {
    # Securiy headers before downloading the file
    header('X-Content-Type-Options: nosniff');
    header('X-Download-Options: noopen');
    header('X-Frame-Options: DENY');
    header("Content-Security-Policy: default-src 'none'; frame-ancestors 'none'");
    header('Referrer-Policy: no-referrer');
    header('Permissions-Policy: geolocation=(), microphone=(), camera=(), payment=()');

    # File downloader headers
    header("Content-Type: application/octet-stream");
    header("Content-Discription: attachment; filename='" . basename($file) . "'");
    header("Expires: 0");
    header("Cache-Control: must-revalidate");
    header("Pragma: public");
    header("Content-Length: " . filesize($file));
    
    readfile($file);

    exit;
}

function terminate_process(): void {
    http_response_code(404);

    die("File not found!");
}