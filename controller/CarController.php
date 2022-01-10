<?php
include_once 'vendor/autoload.php';
use Pecee\Http\Input\InputHandler;
include_once 'model/Car.php';
class CarController{
    public function carProperties(){

        $car= new Cars();
        $carProperty= $car->carProperty($_POST['name']);
        include_once 'view/properties.php';
    }

}
