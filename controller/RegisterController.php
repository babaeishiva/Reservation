<?php
//session_start();

include_once 'model/user.php';
include_once 'helper/RegisterValidation.php';
class RegisterController
{

    public function addUser()
    {
        try {
            $register = new RegisterValidation($_POST['name'], $_POST['family'], $_POST['mobile'], $_POST['email'],
                $_POST['username'], $_POST['password'], $_POST['confirmPassword'], $_POST['submit']);
            $register->validate();

            $user = new User();
            $user->insertUserData($_POST['name'], $_POST['family'], $_POST['mobile'], $_POST['email'],
                $_POST['username'], $_POST['password']);
            echo 'successful registration';
            $user->setSession();
            header('location:/reservation/');
        }catch (ValidationException $e){
            echo $e->getErrorMessage();
        }
    }

    public function registerPage()
    {
        include_once 'view/register.php';
    }
}

