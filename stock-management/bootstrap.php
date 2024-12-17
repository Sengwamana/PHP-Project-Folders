<?php

/**
 * this is used to
 * load all required
 * libraries
 */
//set error reporting to zero
error_reporting(0);


// Load Config
require_once 'config/config.php';

// Load Helpers if any
require_once 'helpers/session_helper.php';
require_once 'helpers/url_helper.php';
require_once 'helpers/otp_helper.php';
require_once 'helpers/back_up_helper.php';
require_once 'helpers/csrf_helper.php';