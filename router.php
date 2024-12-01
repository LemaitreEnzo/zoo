<?php
require_once 'utils/utils.php';
require_once 'utils/splAutoload.php';


switch ($_SERVER['REDIRECT_URL']) {
    case '/':
        require 'controllers/indexCtrl.php';
        break;
    case '/show-enclosure':
        require 'controllers/showEnclosureCtrl.php';
        break;
    case '/modify-animal':
        require 'controllers/modifyCtrl.php';
        break;
    case '/modify-enclosure':
        require 'controllers/modifyCtrl.php';
        break;
    case '/delete-animal':
        require 'controllers/deleteAnimalCtrl.php';
        break;
    case '/delete-enclosure':
        require 'controllers/deleteEnclosureCtrl.php';
        break;
    default:
        require 'controllers/404Ctrl.php';
        break;
}
