<?php
include_once 'model/user.php';
include_once 'helper/loginValidation.php';

class LoginController
{
    public function loginAction()
    {
          try{

            $login = new LoginValidation($_POST['username'] , $_POST['password'] , $_POST['submit']);
            $login->requestValidation();

            $user1 = new User();
            $user1->setLoginSession($_POST['username'], $_POST['password']);


              }catch (ValidationException $e) {
               echo  $e->getErrorMessage();
           }

    }
    public function loginPage()
    {
        include_once 'view/login.php';
    }
}
