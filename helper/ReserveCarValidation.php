<?php
require_once 'vendor/autoload.php';
use Carbon\Carbon;
require_once 'helper/reserveValidationException.php';
class ReserveCarValidation  {
    public $errors = '';
    public $curentDate;
    public $startDateTime;
    public $endDateTime;
     public function __construct($startDateTime , $endDateTime){
         $this->startDateTime= $startDateTime;
         $this->endDateTime= $endDateTime;
     }
    //Checking for correct selection time:
    function checkDuration ()
    {
        $start = new Carbon($this->startDateTime);
        $end = new Carbon($this->endDateTime);
        $diff = $start->diffInHours($end);
        if ($diff <= 1.30) {
            $this->errors .=  "least reserve time is 1.30 hour <br> ";
        }
    }
    // checking for not reserving for past times:
    function checkingPastTime()
    {
        $this->currentDate = Carbon::now();
        $desireDay = new Carbon ($this->startDateTime);
        $today_ = new Carbon ($this->currentDate);
        if ($desireDay->lessThan($today_)) {
            $this->errors .=  "your selected date was expired<br>";
        }
    }
// checking for not reserving for more than 2 month later:
    function checkingDateReserve ()
    {
        $this->currentDate = date('Y-m-d h:i:s');
        $desireDay = new Carbon($this->startDateTime);
        $today_ = new Carbon($this->currentDate);
        $diff = $desireDay->diffInMonths($today_);
        if ($diff > 02) {
            $this->errors .= "you cant reserve for more than 2 month please select near times <br>";
        }
    }
    public function getReserveErrors(){
        if (!empty ($this->errors))
            throw new ReserveValidationException($this->errors);
    }
    public function validationRequest(){
        $this->checkDuration();
        $this->checkingPastTime();
        $this->checkingDateReserve();
        $this->getReserveErrors();
    }


}
