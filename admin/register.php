<?php

    require_once '../ewc/conn.php';
    $password = $_POST['password'];
    $conf_password = $_POST['conf_password'];

    if($password === $conf_password){

        $encrypted = password_hash($conf_password, PASSWORD_DEFAULT);
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $contact = $_POST['contact'];
        /*$grade = $_POST['grade'];
        $gender = $_POST['gender'];*/

        $sql = "INSERT INTO `admin`(fname, lname, contact, password) VALUES('$fname', '$lname', '$contact', '$encrypted')";

        if(mysqli_query($conn, $sql)){
            $query = mysqli_query($conn, "SELECT * FROM `admin` WHERE contact = '$contact'");
            $info = mysqli_fetch_array($query, MYSQLI_ASSOC);
            $_SESSION['active_admin'] = $info['admin_id'];
            header("location: home.php?=success");
        }
        else{
            header("location: ./index.php?=failed");
        }
        

    }else{
        header("location: ./index.php?=error");
    }

?>