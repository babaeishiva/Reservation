<?php
include_once 'model/Car.php';
class HomeController{
    public  function carList()
    {

            $car = new Cars();
            $cars = $car->carList();

            require_once 'view/Homepage.php';
    }

}
