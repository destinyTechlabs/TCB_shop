<?php
// SECURITY NOTE:
// - Do NOT commit secret keys to public repos.
// - Put secrets in server env vars if possible.
// This file is included by pages and handlers.

return [
  'site' => [
    'name' => 'Remote Work Solutions TCB',
    'short' => 'REMOTE TCB',
    'phone' => '240-666-7889',
    'phone_display' => '(240) 666-7889',
    'email' => 'support@remote.tcbshopz.com',
    'address' => 'Laurel, MD 20708',
    'service_area' => 'Domestic (USA) and Worldwide',
    'site_url' => 'https://remote.tcbshopz.com',
    'logo_header' => 'https://tcb-media.s3.us-east-1.amazonaws.com/images/logos/remote-tcb/Remote_tcb_logo_header.png',
    'logo_square' => 'https://tcb-media.s3.us-east-1.amazonaws.com/images/logos/remote-tcb/sqaure_remote_tcb_logo.png',
  ],
  'recaptcha' => [
    'site_key' => '6LcgdWcsAAAAAE_dxFcaP7M0fn1soP9Ir-g2tgTJ',
    // Replace with your real secret key on the server.
    // You can also set env var RECAPTCHA_SECRET_KEY and read it in verify.php.
    'secret_key' => getenv('RECAPTCHA_SECRET_KEY') ?: 'REPLACE_ME',
    'score_threshold' => 0.3
  ],
  'mail' => [
    // Where form submissions should be delivered
    'to' => 'support@remote.tcbshopz.com',
    // Change this to a verified sender on your hosting for best deliverability
    'from' => 'no-reply@remote.tcbshopz.com',
    'subject_prefix' => '[REMOTE TCB Website]'
  ],
  'uploads' => [
    // Make sure this folder is writable by PHP.
    'dir' => __DIR__ . '/../uploads',
    'max_size' => 8 * 1024 * 1024, // 8MB
    'allowed_ext' => ['pdf', 'doc', 'docx']
  ]
];
