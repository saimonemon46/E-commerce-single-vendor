<?php
// ============================================================
//  ElegantTex — includes/config.php
//  Site-wide constants. Replace DB values before going live.
// ============================================================

// ----- Site Info -----
define('SITE_NAME',     'ElegantTex');
define('SITE_TAGLINE',  "Bangladesh's #1 Furniture Cover Brand");
define('SITE_URL',      'http://localhost/elegantex');
define('SITE_EMAIL',    'info@eleganttex.com.bd');
define('HELPLINE',      '+8801896224057');
define('WHATSAPP',      '+8801896224057');
define('CURRENCY',      '৳');
define('SHIPPING_FEE',  60);

// ----- Promo -----
define('PROMO_CODE',    'ELEGANT17');
define('PROMO_PCT',     17);

// ----- Database (fill in before connecting backend) -----
define('DB_HOST',   'localhost');
define('DB_NAME',   'elegantex_db');
define('DB_USER',   'root');
define('DB_PASS',   '');
define('DB_CHARSET','utf8mb4');

// ----- Paths -----
define('BASE_PATH', dirname(__DIR__));
define('ASSETS',    SITE_URL . '/assets');

// ----- Session start (safe to call multiple times) -----
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}