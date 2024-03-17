<?php include 'session.php'; ?>

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
    <?php include 'header.php' ?>
    <div class="bg-gray-50 mt-10 p-4 w-4/5 border border-gray-400 rounded-md m-auto">
        <p><a href="report.php">View Report</a></p>
    </div>
    <div class="flex w-4/5 m-auto">
        
        <div class="bg-gray-50 mt-10 p-4 w-4/5 border border-gray-400 rounded-md m-auto">
    
            <?php
                
            ?>    
                <p>Number essays submitted: <?php //echo $row_count ?></p><br>
                <table class="w-4/5">
                    <tr>
                        <th>Participant</th>
                        <th>Name</th>
                        <th>Score</th>
                    </tr>   
            <?php
            $submitted = mysqli_query($conn, "SELECT user_id FROM `files` WHERE file_1 != '' AND marked_status = 'No'");
            while($subresult = $submitted -> fetch_assoc()){

            

            $participant_id = $subresult['user_id'];
            

            $row = mysqli_query($conn, "SELECT * FROM `users` WHERE user_id = '$participant_id'");
            $row_count = mysqli_num_rows($row);
               while ($result = $row -> fetch_assoc()){
    
                    $id = $result['user_id'];
                    $first = $result['fname'];
                    $last = $result['lname'];
                    $fullname = "$first $last";
                    if($row_count){    
            ?>          
                    <tr class="py-4 first:border-t border-b">
                        <td class='text-xl text-center'>
                           <?php echo $id ?>
                        </td>
                        <td class='text-sky-700 text-center'>
                           <?php echo $fullname ?>
                        </td>
                        <td class="text-center">
                            <form action="score.php" method="POST">
                                <input type="text" name="score" id="" value="<?php echo $id ?>" hidden>
                                <button class="h-10 px-4 bg-blue-400 hover:bg-blue-600 rounded text-white">Score</button>
                            </form>
                            
                        </td>
                    </tr>
                    
            <?php
                   }else{
            ?>
                        
                    
            <?php            
                    }
                }          
            
                $row->free();
            }
            ?>
            </table>
        </div>
        <div class="bg-gray-50 ml-10 mt-10 p-4 w-1/5 border border-gray-400 rounded-md m-auto">
            <p>Fellow admins</p>
            <ul class="list-disc list-inside">
                <?php
                    $admin_query = mysqli_query($conn, "SELECT fname, lname FROM `admin` WHERE admin_id!='$active_admin'");
                
                    while ($admin_result = $admin_query -> fetch_assoc()){
    
                        
                        $admin_first = $admin_result['fname'];
                        $admin_last = $admin_result['lname'];
                        $admin_fullname = "$admin_first $admin_last";

                        ?>
                            <li><?php echo $admin_fullname ?></li>
                        <?php


                    }

                    $admin_query -> free();
                ?>
            </ul>
        </div>
    </div>
</body>
</html>