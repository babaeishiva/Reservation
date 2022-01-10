<?php
include_once 'validationException.php';

// Checking condition of login:
class RegisterValidation
{
    public $errorMessage = '';
    public $name;
    public $family;
    public $mobile;
    public $email;
    public $username;
    public $password;
    public $confirmPassword;
    public $submit;

    public function __construct($name, $family, $mobile, $email, $username, $password, $confirmPassword, $submit)
    {
        $this->name = $name;
        $this->family = $family;
        $this->mobile = $mobile;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->confirmPassword= $confirmPassword;
        $this->submit = $submit;
    }
        public function checkIsSet()
    {

        if (!isset($this->submit) || !isset($this->name) || !isset($this->family) || !isset($this->mobile)
            || !isset($this->email) || !isset($this->username) || !isset($this->password) || !isset($this->confirmPassword))
        {
            $this->errorMessage .= 'لطفا ابتدا وارد سایت شوید' . "<br>";
        }
    }

    public function checkEmpty()
    {
        if (empty($this->name) || empty($this->family) || empty($this->mobile)
            || empty($this->email) || empty($this->username) || empty($this->password) || empty($this->confirmPassword)){
            $this->errorMessage .= 'پر کردن همه فیلد ها الزامی است!' . '<br>';
        }
    }

    public function checkConfirmPassword()
    {
        if ($this->password != $this->confirmPassword)
            $this->errorMessage .= 'تایید پسورد با پسورد مطابقت ندارد. ' . "<br>";
    }

    public function checkUserPassChar()
    {
        if (strlen($this->username) < 3) {
            $this->errorMessage .= 'نام کاربری باید حداقل سه کاراکتر باشد.' . '<br>';
        }
        if ((!preg_match('/(([a-z]+[A-Z]+[0-9]+)|([A-Z]+[a-z]+[0-9]+)|([0-9]+[A-Z]+[a-z]+)|([0-9]+[a-z]+[A-Z]+)|([a-z]+[0-9]+[A-Z]+)|([A-Z]+[0-9]+[a-z]+))/'
                , $this->password)) || (strlen($this->password) < 8))
        {
            $this->errorMessage .= 'کلمه عبور باید حداقل 8 کاراکتر باشدو شامل حروف کوچک و بزرگ و اعداد باشد.' . '<br>';
        }
    }

    public function checkMobileFormat()
    {
        if (!preg_match('/^(\+98|0|98|0098)9[0-9]{9}$/', $this->mobile))
        {
            $this->errorMessage .= 'فرمت موبایل صحیح نمی باشد.' . '<br>';
        }
    }

    public function getErrors()
    {
        if (!empty ($this->errorMessage)) {
            throw new ValidationException($this->errorMessage , 400);
        }
    }

    /**
     * @throws ValidationException
     */
    public function validate()
    {
        $this->checkIsSet();
        $this->checkEmpty();
        $this->checkUserPassChar();
        $this->checkConfirmPassword();
        $this->checkMobileFormat();
        $this->getErrors();

    }

}

