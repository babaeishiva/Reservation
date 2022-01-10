<?php
include_once 'helper/DbConnection.php';

class Cars
{
    public $name;
    public $plate_number;
    public $color;
    public $manufacturing_country;
    public $construction_year;
    public $seat_number;
    public $image;

    public function carList()
    {
        $conn = new DbConnection();
        $connection = $conn->connection();
        $sql = "SELECT * FROM car";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $list[] = $row;
            }

        }
        return $list;
    }

    public function carProperty($name)
    {
        $conn = new DbConnection();
        $connection = $conn->connection();
        $this->name = $name;
        $sql = "SELECT * FROM car WHERE  name = '".$name."'";
      $sql2 = "SELECT start_date , end_date , car.id , car.name FROM car_reserve , car WHERE car_reserve.car_id= car.id and car.name = '".$name."'";
        $result = $connection->query($sql);
        $result2= $connection->query($sql2);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $list[] = $row;
            }

        }
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $dateTimes[] = $row2;
            }

        }
       $godData= [ $list , $dateTimes ];

        return $godData;

    }
}
//
//$car = new Cars();
//var_export($car->carProperty('بنز'));