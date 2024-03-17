<?php #include 'session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/output.css">
    <script src="https://kit.fontawesome.com/196d1be94d.js" crossorigin="anonymous"></script>
    <script src="styles.js"></script>
    <title>HOME</title>
</head>
<body>
    <?php include 'session.php';include 'header.php' ?>
    
    <div class="bg-gray-50 mt-10 p-10 w-4/5 border border-gray-400 rounded-md m-auto">

        <?php

            $row = mysqli_query($conn, "SELECT * FROM `scores` ORDER BY score DESC");
            $row_count = mysqli_num_rows($row);
        ?>    
            <p class="text-2xl">Scores Report</p><br>
            <p>Total Number scored: <?php echo $row_count ?></p><br>
            <table class="w-4/5 m-auto">
                <tr class="h-12 first:border-t border-b">
                    <!--<th>Position</th>-->
                    <th>Participant</th>
                    <th>Name</th>
                    <th>Score</th>
                </tr>
        <?php
            while ($result = $row -> fetch_assoc()){
                $id = $result['user_id'];
                $sql_query = mysqli_query($conn, "SELECT fname, lname FROM `users` WHERE user_id = '$id'");
                $sql_result = $sql_query -> fetch_assoc();
                
                $first = $sql_result['fname'];
                $last = $sql_result['lname'];
                $score = $result['score'];
                $fullname = "$first $last";
                if($row_count){    
        ?>          
                <tr class="text-sm h-12 border-b">
                    <!--<td class='md:text-xl text-center'>
                        <?php //echo $position ?>
                    </td>-->
                    <td class='md:text-xl text-center'>
                       <?php echo $id ?>
                    </td>
                    <td class='md:text-lg text-sky-700 text-center'>
                       <?php echo $fullname ?>
                    </td>
                    <td class="text-center">
                        <p><?php echo $score ?></p>
                    </td>
                </tr>
                
        <?php
               }else{
        ?>
                    
                <p>NO SCORES YET</p>
        <?php            
                }
            }          
            
            $row->free();
        ?>
        </table>
    </div>
</body>
</html>