<?php

namespace BlogPhp;

use BlogPhp\Engine as E;

// On déclare les constants (root server path + root URL)
define('PROT', (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? 'https://' : 'http://');
define('ROOT_URL', PROT . $_SERVER['HTTP_HOST'] . str_replace('\\', '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))) . '/'); // On supprime les backslashes Pour la compatibilité Windows
define('ROOT_PATH', __DIR__ . '/');
