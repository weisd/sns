<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = urldecode($uri);

<<<<<<< HEAD
$paths = require __DIR__ . '/bootstrap/paths.php';

$requested = $paths['public'] . $uri;
=======
$paths = require __DIR__.'/bootstrap/paths.php';

$requested = $paths['public'].$uri;
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
<<<<<<< HEAD
if ($uri !== '/' and file_exists($requested)) {
	return false;
}

require_once $paths['public'] . '/index.php';
=======
if ($uri !== '/' and file_exists($requested))
{
	return false;
}

require_once $paths['public'].'/index.php';
>>>>>>> cb959f70d1a8d6ccf47f8f24432f2edddb44a29d
