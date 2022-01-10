<?php
require_once 'model/user.php';
require_once 'helper/validationException.php';
class LoginValidation {
    public string $errorMessage= "";
    public $username;
    public $password;
    public $submit;
    public function __construct($username , $password, $submit){
        $this->username=$username;
        $this->password=$password;
        $this->submit= $submit;

    }

    public function CheckIsSet()
    {
        if (!isset($this->submit) || !isset($this->username) || !isset($this->password))
        {
            $this->errorMessage .= 'لطفا ابتدا وارد سایت شوید' . "<br>";
        }
    }

    public function CheckEmpty()
    {
        if (empty($this->username) || empty($this->password))
        {
            $this->errorMessage .= 'نام کاربری یا کلمه عبور نمی تواند خالی باشد.' . '<br>';
        }
    }

    /**
     * @throws ValidationException
     */
    public function getErrors()
    {
        if (!empty ($this->errorMessage))
           Throw new ValidationException($this->errorMessage ,400);
    }

    /**
     * @throws ValidationException
     */
    public function requestValidation()
    {
        $this->CheckIsSet();
        $this->CheckEmpty();
        $this->getErrors();
    }
}
