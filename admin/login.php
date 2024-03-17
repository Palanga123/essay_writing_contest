<?php

    require_once '../ewc/conn.php';

    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $contact = $_POST['contact'];
        $query = mysqli_query($conn, "SELECT * FROM `admin` WHERE contact = '$contact'");
        $info = mysqli_fetch_array($query, MYSQLI_ASSOC);
        $row = mysqli_num_rows($query);

        if($query == 1){
            
            $password = $_POST['password'];
            $hash = $info['password'];

            $verify = password_verify($password, $hash);

            if($verify){

                $_SESSION['active_admin'] = $info['admin_id'];
                header("location: home.php?=success");

            }
            else{
                header("location: ./");
            }
            

        }
        else{
            header("location: ./");
        }

    }
    else{
        
        header("location: ./index.html=?error");

    }

?>