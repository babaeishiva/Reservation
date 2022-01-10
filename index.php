<?php
ini_set('display_errors' , 1);
error_reporting(E_ALL);
require_once 'vendor/autoload.php';
require_once 'routes.php';

use Pecee\SimpleRouter\SimpleRouter;
SimpleRouter::setDefaultNamespace('\Demo\Controllers');
// Start the routing
SimpleRouter::start();



//require_once 'controller/HomeController.php';
//require_once 'controller/CarController.php';
//require_once 'controller/RegisterController.php';
//require_once 'controller/LoginController.php';
//require_once 'controller/CarReserveController.php';
//require_once 'helper/validationException.php';
//require_once 'helper/reserveValidationException.php';

//    $route = isset($_GET['route']) ? $_GET['route'] : 'home';
//    switch ($route) {
//        case 'home':
//            $car = new HomeController();
//            $car->carList();
//            break;
//
//        case 'properties' :
//            $car = new CarController();
//            $car->carProperties($_POST);
//            break;
//
//        case 'register':
//            $user = new RegisterController();
//            $user->addUser($_POST);
//            break;
//
//        case 'login':
//
//            $login = new LoginController();
//            $login->LoginAction($_POST);
//
//
//            break;
//        case 'carReserve':
//            $reserve = new CarReserveController();
//            $reserve->insertReserveData($_POST);
//            break;
//        case 'passenger':
//            break;
//
//}




//use Pecee\SimpleRouter\SimpleRouter;
//use Pecee\SimpleRouter\SimpleRouter;
///* Load external routes file */
//require_once 'routes.php';
///**
// * The default namespace for route-callbacks, so we don't have to specify it each time.
// * Can be overwritten by using the namespace config option on your routes.
// */
//SimpleRouter::setDefaultNamespace('\Demo\Controllers');
//// Start the routing
//SimpleRouter::start();