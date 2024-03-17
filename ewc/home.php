<?php include 'session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/196d1be94d.js" crossorigin="anonymous"></script>
    <script src="styles.js"></script>
    <title>HOME</title>
</head>
<body>
    <header class="top-0 sticky p-4 text-center flex justify-between bg-gradient-to-r from-sky-500 to-slate-600">
        <div>
            <button class="h-10 text-lg"><i class="fa-regular fa-user"></i> <span class="text-white"><?php echo $active_user_name ?></span></button>            
        </div>
        <div class="">
            <button class="h-10 px-4 bg-orange-400 hover:bg-orange-600 rounded text-white "><a href="../logout.php" class="block">Logout</a></button>
        </div>    
    </header>
    
    

        <?php
            if($remarks = $_GET['remarks']){
            if($remarks == 'uploaded'){
                
                ?>

                    <div class="mt-6 p-4 w-11/12 border border-green-600 rounded-md m-auto text-center bg-green-200">
                        <p class=" text-green-700">File uploaded successfully!</p>
                        
                    </div>

                <?php

            }else if($remarks == 'size'){
                    
            }
        }
            #query from the database table files
            $check_question_query = mysqli_query($conn, "SELECT * FROM files WHERE user_id = $active_user;");
            $check_question = mysqli_fetch_array($check_question_query, MYSQLI_ASSOC);

            $que_heck = mysqli_num_rows($check_question_query);
            #check if the user has a question selected he/she is answering

            if($que_heck == 0){

                $constitution = "Describe types of constitution";
                $elections = "Explain the electrol process from legislature to announcing of the results";
                $culture = "Describe elements of culture";
                $human = "Describe any 3 early human rights documsents";
                $legal = "Explain legal systems";
                $conflict = "Describe ways conflict can be resolved at international level";
                
        ?>
        <div class="mt-6 p-4 w-11/12 border border-gray-400 rounded-md m-auto text-center bg-gray-50">
            <p class="text-3xl text-sky-700">Competition begins in:</p>
            <p id="timer" class="text-2xl text-red-600"></p>
        </div>
        <section class="mt-6 p-4 sm:w-4/5 w-11/12 border border-gray-400 rounded-md m-auto bg-gray-50">
            <p class="text-2xl">Choose one question from the list below?</p>
            <form action="questions.php" method="POST">
                <ul class="list-inside">
                    <li><input type="radio" name="question" id="constitution" value="<?php echo $constitution;?>"> <label for="constitution"><?php echo $constitution;?></label></li>
                    <li><input type="radio" name="question" id="elections" value="<?php echo $elections;?>"> <label for="elections"><?php echo $elections;?></label></li>
                    <li><input type="radio" name="question" id="culture" value="<?php echo $culture?>"> <label for="culture"><?php echo $culture;?></label></li>
                    <li><input type="radio" name="question" id="human" value="<?php echo $human?>"> <label for="human"><?php echo $human;?></label></li>
                    <li><input type="radio" name="question" id="legal" value="<?php echo $legal?>"> <label for="legal"><?php echo $legal;?></label></li>
                    <li><input type="radio" name="question" id="conflict" value="<?php echo $conflict;?>"> <label for="conflict"><?php echo $conflict;?></label></li><br>
                <ul>
                <button type="submit" class="h-10 px-4 bg-blue-400 hover:bg-blue-600 rounded text-white ">Next <i class="fa-solid fa-arrow-right"></i></button>
            </form>
        </section>
        <?php
            }else{

                $question = $check_question['question'];

         ?>
         <div class="mt-6 p-4 w-11/12 border border-gray-400 rounded-md m-auto bg-gray-50">
            <p class="text-xl md:text-3xl ">Rules and regulations</p>
            <ol class="list-decimal list-inside">
                <li>Essay should be written on either paper or typed.</li>
                <li>Essays should be submitted in the time frame.</li>
                <li>The EWC is strictly for school going children.</li>
            </ol>
        </div>
        <div class="mt-6 p-4 w-11/12 border border-gray-400 rounded-md m-auto bg-gray-50">
            <p class="text-xl md:text-3xl ">Upload your essay</p><br>
            <p class="text-snug md:text-xl">Your question: <span class="text-blue-700"><?php echo $question?></span></p><br>
            <p class="text-base md:text-lg text-slate-950"><span class="text-xl text-red-500">Note:</span> Only images in .jpg .png and files in .pdf are allowed</p><br>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                
                <input type="file" name="answer"><br><br>
                <button class="h-10 px-4 bg-blue-400 hover:bg-blue-600 rounded text-white">Upload</button>
            </form>
        </div>
         <?php       
            }
           
        ?>
        
    
</body>
<script src="index.js"></script>
</html>
