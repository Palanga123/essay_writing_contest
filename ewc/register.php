<?php

    require_once 'conn.php';

    session_start();

    $password = $_POST['password'];
    $conf_password = $_POST['conf_password'];

    if($password === $conf_password){

        $encrypted = password_hash($conf_password, PASSWORD_DEFAULT);
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $contact = $_POST['contact'];
        $grade = $_POST['grade'];
        $gender = $_POST['gender'];

        $sql = "INSERT INTO `users`(fname, lname, contact, grade, gender, password) VALUES('$fname', '$lname', '$contact', '$grade', '$gender', '$encrypted')";

        if(mysqli_query($conn, $sql)){
            $query = mysqli_query($conn, "SELECT * FROM `users` WHERE contact = '$contact'");
            $info = mysqli_fetch_array($query, MYSQLI_ASSOC);
            $_SESSION['active_user'] = $info['user_id'];
            header("location: ./home.php?=success");
        }
        else{
            header("location: ../register.php?=failed");
        }
        

    }else{
        header("location: ../register.php?=error");
    }

?>