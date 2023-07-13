<?php 
    session_start();
    if(isset($_SESSION['user'])){
        session_destroy();
        echo "xoas ";
    }else{
        echo "khong";
    }

?>