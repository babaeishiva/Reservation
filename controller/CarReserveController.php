<?php
require_once 'model/CarReserve.php';
require_once 'helper/ReserveCarValidation.php';

class CarReserveController{

    public function insertReserveData()
    {
        try {
            if(!isset($_SESSION['username'])){
                header('Location:/reservation/LoginController/loginPage/');
            }

            $startDateTime = $_POST['start_date'] . ' ' . $_POST['start_time'];
            $endDateTime = $_POST['end_date'] . ' ' . $_POST['end_time'];
            $validation = new ReserveCarValidation($startDateTime, $endDateTime);
            $validation->validationRequest();
            $conn = new CarReserve($startDateTime, $endDateTime, $_POST['id']);
            $conn->insertData();
            include_once 'view/passenger.php';

        }catch (ReserveValidationException $e){
            echo $e->getReserveValidationErrors();
        }
    }
}
