<?php

    include 'session.php';

    $target_dir = "uploads/$active_user $fname $lname/";
    $target_file = $target_dir . basename($_FILES["answer"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if(isset($_POST["submit"])){

        $check = getimagesize($_FILES["answer"]["tmp_name"]);
        if($check !== false){

            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;

        }else{
            echo "File is not an image.";
            $uploadOk = 0;
        }


    }

    if(file_exists($target_file)){
        header("location: home.php?remarks=exist");
        $uploadOk = 0;
    }

    if($_FILES["answer"]["size"] > 500000000){
        header("location: home.php?remarks=size");
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "pdf" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
        header("location: home.php?remarks=format");
        $uploadOk = 0;
    }
    if($uploadOk == 0){
        header("location: home.php?remarks=error");
    }else{
        if(move_uploaded_file($_FILES["answer"]["tmp_name"], $target_file)){
            $upcheck = mysqli_query($conn, "SELECT * FROM `files` WHERE user_id = $active_user;");
            $upresult = mysqli_fetch_array($upcheck);
            $file_1 = $upresult['file_1'];
            $file_2 = $upresult['file_2'];
            $file_3 = $upresult['file_3'];


            if($file_1 == ""){
                if($uploadsql = mysqli_query($conn, "UPDATE `files` SET file_1 = '$target_file' WHERE user_id = $active_user;")){
                    header("location: home.php?remarks=uploaded");
                }else{
                    header("location: home.php?remarks=error");
                    }
            }
            elseif($file_1 !== "" && $file_2 == ""){
                if($uploadsql = mysqli_query($conn, "UPDATE `files` SET file_2 = '$target_file' WHERE user_id = $active_user;")){
                    header("location: home.php?remarks=uploaded");
                }else{
                    header("location: home.php?remarks=error");
                    }
            }
            elseif($file_1 != "" && $file_2 != ""){
                if($uploadsql = mysqli_query($conn, "UPDATE `files` SET file_1 = '$target_file' WHERE user_id = $active_user;")){
                    header("location: home.php?remarks=uploaded");
                }else{
                    header("location: home.php?remarks=error");
                    }
            }
                   
            
        }
    }