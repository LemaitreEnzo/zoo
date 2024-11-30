<?php
require 'utils/utils.php';
session_start();


spl_autoload_register(function($class) {
    $class = str_replace('\\', '/', $class);

    require_once "$class.php";
});

switch ($_SERVER['REDIRECT_URL']) {
    case '/':
        require 'controllers/indexCtrl.php';
        break;
    default:
        require 'controllers/404Ctrl.php';
        break;
}
