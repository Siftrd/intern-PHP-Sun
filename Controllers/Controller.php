<?php

Class Controller {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function login()
    {
        if(isset($_POST['login'])){
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
    }
    public function index() {
        $cookie_name = 'Acc';
        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
        if(empty($_SESSION["user"])){
            if(!isset($_COOKIE[$cookie_name])){
                echo '<script type = "text/javascript">';
                echo 'alert("Please login first");';
                echo 'window.location.href = "login.php";';
                echo '</script>';
            }else{
                parse_str($_COOKIE[$cookie_name],$array);
                $user = $array['user'];
                $pass = $array['pass'];
                $row =  $this->db->checkLogin('login_data', $user,$pass);
                if(is_array($row)){
                    $_SESSION['user'] = $row['username'];
                }
                echo $_SESSION['user'];   
            }
        }
        if(isset($_SESSION['user'])){
            switch ($page) {
                case ($page === "show"):
                    $this->db->readAll('movie');
                    require "views/show.php";
                    break;

                case ($page === "delete_movie"):
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $this->db->delete('movie',$id);
                    }
                    require "views/show.php";
                    break;

                case ($page === "create_movie"):
                    if (isset($_POST['insert_movie'])) {
                        $movie = new Movie();
                        $movie->setTitle($_POST['title']);
                        $movie->setTime($_POST['time']);
                        $movie->setType($_POST['type']);
                        $insert_success_movie = $this->createmovie($movie);
                        header('Location: /index.php?page=show&insert_success_movie=' . (bool)$insert_success_movie . '&id=' . $movie->getId());
                        exit();
                    }
                    require "views/create_movie.php";
                    break;

                case ($page === "update_movie"):
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $movie = $this->db->getById('movie', $id);
                        require "views/update_movie.php";
                    }
                    break;

                case ($page === "do_update_movie"):
                    if (isset($_POST['update_movie'])) {
                        $movie = new Movie($_POST);
                        $update_success_movie = $this->updatemovie($movie);
                        header('Location: /index.php?page=show&update_success_movie=' . (int)$update_success_movie . '&id=' . $movie->getId());
                        exit();
                    }
                    break;

                case "detail_movie":
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $movie = $this->db->getById('movie', $id);
                        require "views/detail_movie.php";
                    }
                    break;

                case ($page === "logout"):
                    session_start();
                    if(session_destroy()){
                        setcookie("Acc", "", time()-86400*7);
                        header('Location:login.php');
                    }    

                default:
                    require "views/start.php";
                    break;
        }
        }
    }

    public function updatemovie(Movie $movie) {
        return $this->db->update('movie', $movie->getId(), $movie->toArray());
    }

    public function createmovie(Movie $movie) {
        return $this->db->create('movie', $movie->toArray());
    }

    public function success() {
        if (isset($_GET['insert_success_movie']) && $_GET['insert_success_movie']) {
            echo "<p>Your movie was successfully inserted!";
        }
        elseif (isset($_GET['insert_success_movie']) && $_GET['insert_success_movie']) {
            echo "<p>Your movie was successfully inserted!";
        }
        elseif (isset($_GET['insert_success_movie']) && !$_GET['insert_success_movie']) {
            echo "<p>Something went wrong!</p>";
        }
        elseif (isset($_GET['insert_success_movie']) && !$_GET['insert_success_movie']) {
            echo "<p>Something went wrong!</p>";
        }
    }

    public function updateSuccess() {
        if (isset($_GET['update_success_movie']) && $_GET['update_success_movie']) {
            echo "<p>Your movie was successfully updated!";
        }
        elseif (isset($_GET['update_success_movie']) && $_GET['update_success_movie']) {
            echo "<p>Your movie was successfully updated!";
        }
        elseif (isset($_GET['update_success_movie']) && !$_GET['update_success_movie']) {
            echo "<p>Something went wrong!</p>";
        }
        elseif (isset($_GET['update_success_movie']) && !$_GET['update_success_movie']) {
            echo "<p>Something went wrong!</p>";
        }
    }
}