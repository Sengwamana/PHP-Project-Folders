<?php

  // DB Params
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASS', '12345');
  define('DB_NAME', 'stockphp');


  //authentication in sending mail
  define('MAIL_PASS', '');

  //set default timezone
  date_default_timezone_set('Asia/Kolkata');

  // App Root
  define('APPROOT', dirname(dirname(__FILE__)));
  // URL Root
  define('URLROOT', 'http://localhost/L4 SOD/real world projects/stock-management');
  // Site Name
  define('SITENAME', 'STOCK MANAGEMENT SYSTEM');
  // App Version
  define('APPVERSION', '1.0.0');