<?php

    include 'session.php';
    
    #use the user id as a reference
    
    $question = $_POST['question'];
    
    $que_sql = "INSERT INTO `files`(user_id, question, marked_status) VALUES('$active_user', '$question', 'No');";
    $que_query = mysqli_query($conn, $que_sql);
    $path = "uploads/$active_user $fname $lname";
    mkdir($path);

    header("location: home.php");
    #insert the question into the database using the id
    #redirect to home.php