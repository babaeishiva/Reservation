<?php

require_once 'vendor/autoload.php';
use Pecee\SimpleRouter\SimpleRouter;
require_once 'controller/HomeController.php';
require_once 'controller/CarController.php';
include_once 'controller/LoginController.php';
include_once 'controller/RegisterController.php';
include_once 'controller/CarReserveController.php';
include_once 'controller/PassengerController.php';


SimpleRouter::get('/reservation/', [HomeController::class, 'carList']);
SimpleRouter::post('/reservation/properties/', [CarController::class, 'carProperties']);
SimpleRouter::post('/reservation/view/css/style.css', 'null');
SimpleRouter::post('reservation/view/css/propertiesStyle.css/', 'null');
SimpleRouter::post('/reservation/LoginController/loginAction/', [LoginController::class, 'loginAction']);
SimpleRouter::get('/reservation/LoginController/loginPage/', [LoginController::class, 'loginPage']);
SimpleRouter::get('/reservation/RegisterController/registerPage/', [RegisterController::class, 'registerPage']);
SimpleRouter::post('/reservation/RegisterController/addUser/', [RegisterController::class, 'addUser']);
SimpleRouter::post('/reservation/CarReserveController/insertReserveData/', [CarReserveController::class, 'insertReserveData']);

SimpleRouter::get('/reservation/PassengerController/passengerPage/', [PassengerController::class, 'passengerPage']);
SimpleRouter::post('/reservation/PassengerController/addPassengers/', [PassengerController::class, 'addPassengers']);



