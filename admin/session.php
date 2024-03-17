<?php 

    include '../ewc/conn.php';
    session_start();

    $active_admin = $_SESSION['active_admin'];
    $user_sql = mysqli_query($conn, "SELECT * FROM `admin` WHERE admin_id = '$active_admin'");
    $user_data = mysqli_fetch_array($user_sql, MYSQLI_ASSOC);

    $fname = $user_data['fname'];
    $lname = $user_data['lname'];
    $active_admin_name = "$fname $lname";

    if(!isset($_SESSION['active_admin'])){
        header('location: ./');
    }

?>