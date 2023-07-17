<?php

Class UserController {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function login()
    {
        $check = 0;
        if(isset($_POST['login']) && !isset($_SESSION["user"])){
            require "login.php";
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $rem = isset($_POST['rem']);
            $cookie_name = 'Acc';
            $row =  $this->db->checkLogin('login_data', $user,$pass);
            if(is_array($row)){
                if($rem==true){
                    setcookie($cookie_name,'user='.$user.'&pass='.$pass,time()+86400*7);
                }
                $_SESSION["user"] = $row['username'];
                $_SESSION["pass"] = $row['password'];
                $check =1;
            }else{
                echo '<script type = "text/javascript">';
                echo 'alert("Invalid Username or Password");';
                echo 'window.location.href = "login.php";';
                echo '</script>';
            }
        }
         if(isset($_SESSION["user"]) && isset($_POST['login']) ){   
           header("Location:index.php?page=start");
        }
        return $check;
    }
}