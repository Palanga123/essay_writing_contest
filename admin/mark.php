<?php
        include 'session.php';

        $point = $_POST['point'];
        $id = $_POST['id'];
        $score = mysqli_query($conn, "INSERT INTO `scores`(user_id, score) VALUES('$id','$point')");
        $marked_status = mysqli_query($conn, "UPDATE `files` SET marked_status = 'Yes' WHERE user_id = '$id'");
        header("location: home.php");
    ?>