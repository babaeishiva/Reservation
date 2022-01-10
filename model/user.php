<?php
session_start();
include_once 'helper/DbConnection.php';

class User
{
    public $name;
    public $family;
    public $mobile;
    public $email;
    public $username;
    public $password;

    public function insertUserData($name, $family, $mobile, $email, $username, $password)
    {
        $this->name = $name;
        $this->family = $family;
        $this->mobile = $mobile;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $connection = new DbConnection();
        $conn = $connection->connection();
        $stmt = $conn->prepare("INSERT INTO user (name, family , username , password, mobile, email)
    VALUES (?,?,?,?,?,?)");
        $stmt->bind_param('ssssss', $this->name, $this->family, $this->username,
            $this->password, $this->mobile, $this->email);
        $stmt->execute();
    }

    public function setSession()
    {
        $_SESSION['username'] = $this->username;
    }

    public function setLoginSession($user, $pass)
    {
        $this->username = $user;
        $this->password = $pass;
        $connection = new DbConnection();
        $conn = $connection->connection();
        $sql = "SELECT username, password FROM user WHERE username= '" . $this->username . "' AND password='" . $this->password . "'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $_SESSION['username'] = $this->username;
                header('location:/reservation/');
            }
        } else {
            header('Location:/reservation/LoginController/loginPage/?message= your username or password is wrong');
        }

    }
}
//$user= new User();
//var_dump ($user->setLoginSession());
