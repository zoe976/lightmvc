<?php

require 'config.php';

global $BASE_URL;
define('BASE_URL', $BASE_URL);

spl_autoload_register(function ($className) {
     if (file_exists('classes/'.$className.'.php')) {
      require_once('classes/'.$className.'.php');
    }
    else if (file_exists('Controllers/'.$className.'.php')) {
      require_once('Controllers/'.$className.'.php');
    }
});

require_once('router.php');



?>