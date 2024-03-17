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
    <div class="bg-gray-50 mt-10 p-10 w-4/5 border border-gray-400 rounded-md m-auto">

        <?php
            $user_id = $_POST['score'];
            $scoreSql = mysqli_query($conn, "SELECT * FROM `users` WHERE user_id = $user_id");
            $questionSql = mysqli_query($conn, "SELECT * FROM `files` WHERE user_id = $user_id");

                    $questionResult = mysqli_fetch_array($questionSql);
                    $result = mysqli_fetch_array($scoreSql);
                    $questionStatement = $questionResult['question'];
                    $answer = $questionResult['file_1'];
                    $id = $result['user_id'];
                    $first = $result['fname'];
                    $last = $result['lname'];
                    $participant_name = "$first $last";
        ?>    
            <p class="text-2xl text-blue-500"><i class="fa-regular fa-user text-4xl text-black"></i><?php echo $participant_name ?></p><br>
            <p><span class="text-gray-900">Question: </span> <?php echo $questionStatement ?></p><br>

            <p>File: <span class="italic"><?php echo $answer; ?></span> <a href="../ewc/<?php echo $answer; ?>" target="_blank" class="underline underline-offset-4 text-red-600">Open</a> </p><br>

            <form action="mark.php" method="POST">
                <p>Enter Score</p>
                <input type="text" name="id" value="<?php echo $id ?>" hidden>
                <input type="number" name="point" id="" class="h-8 w-32 border"> <button class="h-8 rounded px-4 bg-green-700 text-white">Enter</button><br>
            </form>
            <button class="h-8 rounded px-4 bg-red-700 text-white" onclick="location.href = 'home.php'">Back</button>
        
    </div>
    
    
</body>
</html>