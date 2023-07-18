<?php

class HomeController
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function index()
    {
        $cookie_name = 'Acc';
        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($_SESSION["user"])) {
            if (!isset($_COOKIE[$cookie_name])) {
                echo '<script type="text/javascript">';
                echo 'alert("Please login first");';
                echo 'window.location.href = "login.php";';
                echo '</script>';
            } else {
                parse_str($_COOKIE[$cookie_name], $array);
                $user = $array['user'];
                $pass = $array['pass'];
                $_SESSION['user'] = $user;
            }
        }
        if (isset($_SESSION['user'])) {
            switch ($page) {
                case "show":
                    $this->db->readAll('movie');
                    require "views/show.php";
                    break;

                case "delete_movie":
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $this->deleteSuccess($id);
                    }
                    break;

                case "delete_movie_confirm":
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        require "views/show.php";
                    }
                    break;

                case "do_delete_movie":
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $this->deletemovie($id);
                    }
                    header('Location: /index.php?page=show');
                    break;

                case "create_movie":
                    if (isset($_POST['insert_movie'])) {
                        $title = $_POST['title'];
                        $time = $_POST['time'];
                        $type = $_POST['type'];

                        // Validate input
                        if (!$this->validateInput($title, $time, $type)) {
                            // Invalid input, display error message
                            echo '<script type="text/javascript">';
                            echo 'alert("Invalid input. Please check your input and try again.");';
                            echo '</script>';
                            require "views/create_movie.php";
                            break;
                        }

                        $movie = new Movie();
                        $movie->setTitle($title);
                        $movie->setTime($time);
                        $movie->setType($type);
                        $insert_success_movie = $this->createmovie($movie);
                        header('Location: /index.php?page=show&insert_success_movie=' . (bool)$insert_success_movie . '&id=' . $movie->getId());
                        exit();
                    }
                    require "views/create_movie.php";
                    break;

                case "update_movie":
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $movie = $this->db->getById('movie', $id);
                        require "views/update_movie.php";
                    }
                    break;

                case "do_update_movie":
                    if (isset($_POST['update_movie'])) {
                        $title = $_POST['title'];
                        $time = $_POST['time'];
                        $type = $_POST['type'];

                        // Validate input
                        if (!$this->validateInput($title, $time, $type)) {
                            // Invalid input, display error message
                            echo '<script type="text/javascript">';
                            echo 'alert("Invalid input. Please check your input and try again.");';
                            echo '</script>';
                            $id = $_POST['id'];
                            $movie = $this->db->getById('movie', $id);
                            require "views/update_movie.php";
                            break;
                        }

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

                case "logout":
                    session_start();
                    if (session_destroy()) {
                        setcookie("Acc", "", time() - 86400 * 7);
                        header('Location:login.php');
                    }
                    break;

                default:
                    require "views/start.php";
                    break;
            }
        }
    }

    public function updatemovie(Movie $movie)
    {
        return $this->db->update('movie', $movie->getId(), $movie->toArray());
    }

    public function createmovie(Movie $movie)
    {
        return $this->db->create('movie', $movie->toArray());
    }

    public function deletemovie($id)
    {
        $this->db->delete('movie', $id);
        $this->deleteSuccess();
    }

    public function success()
    {
        if (isset($_GET['insert_success_movie'])) {
            if ($_GET['insert_success_movie']) {
                echo '<script type="text/javascript">';
                echo 'alert("Your movie was successfully inserted!");';
                echo '</script>';
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Something went wrong!");';
                echo '</script>';
            }
        }
    }

    public function updateSuccess()
    {
        if (isset($_GET['update_success_movie'])) {
            if ($_GET['update_success_movie']) {
                echo '<script type="text/javascript">';
                echo 'alert("Your movie was successfully updated!");';
                echo '</script>';
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Something went wrong!");';
                echo '</script>';
            }
        }
    }

    public function deleteSuccess()
    {
        if (isset($_GET['delete_success'])) {
            echo '<script type="text/javascript">';
            echo 'alert("Movie deleted successfully!");';
            echo 'window.location.href = "/index.php?page=show";';
            echo '</script>';
            exit();
        }
    }

    private function validateInput($title, $time, $type)
    {
        if (strlen($title) < 3 || strlen($title) > 100) {
            return false;
        }

        if (strlen($time) < 3 || strlen($time) > 100) {
            return false;
        }

        if (!in_array($type, ['Action', 'Adventure', 'Comedy', 'Drama', 'Horror', 'Romance', 'Sci-Fi'])) {
            return false;
        }

        return true;
    }
}
