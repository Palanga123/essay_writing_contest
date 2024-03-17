<?php 

    include 'conn.php';
    session_start();

    $active_user = $_SESSION['active_user'];
    $user_sql = mysqli_query($conn, "SELECT * FROM `users` WHERE user_id = '$active_user'");
    $user_data = mysqli_fetch_array($user_sql, MYSQLI_ASSOC);

    $fname = $user_data['fname'];
    $lname = $user_data['lname'];
    $active_user_name = "$fname $lname";
    

    if(!isset($_SESSION['active_user'])){
        header('location: ../');
    }

?>