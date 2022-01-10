<?php
require_once 'helper/DbConnection.php';
class CarReserve{
    public $startDateTime;
    public $endDateTime;
    public $carId;
    public $userId;


    public function __construct($startDateTime, $endDateTime , $carId)
    {
        $this->startDateTime = $startDateTime;
        $this->endDateTime= $endDateTime;
        $this->carId= $carId;

    }
    public function insertData()
    {
       $conn= new DbConnection();
        $connection= $conn->connection();
        $usen= $_SESSION['username'];

        $sql2= "SELECT id FROM user WHERE username = '".$usen."'";
        $user= $connection->query($sql2);
        if($user->num_rows>0){
            $row= $user->fetch_assoc();
             $uId= $row['id'];
            $this->userId = $uId;
            $stmt= $connection->prepare("INSERT INTO car_reserve (user_id , car_id, start_date, end_date ) VALUES (?,?,?,?)");
            $stmt->bind_param('ssss' , $this->userId , $this->carId , $this->startDateTime, $this->endDateTime);
            $stmt->execute();

        }
    }

}
