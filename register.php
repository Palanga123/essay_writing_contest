<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/196d1be94d.js" crossorigin="anonymous"></script>
    <script src="ewc/styles.js" crossorigin="anonymous"></script>
    <title>EWC - Admin Register</title>
</head>
<body class="bg-gradient-to-r from-sky-400 to-slate-600">
    <div class="bg-white w-11/12 md:w-96 m-auto my-10 md:p-10 text-center py-10">
        <div class="text-gray-600">
            <h2 class="font-semibold text-2xl text-center">Geocademy</h2>
            <p class="font-semibold text-base text-center">Essay Writing Competition</p>
        </div>    
        <br>
        <form action="./ewc/register.php" method="post">
            <div class="">
                <input type="text" placeholder="First name" name="fname" class="h-10 w-32 border bg-gray-100 mr-1 rounded pl-4" required> <input type="text" placeholder="Last name" name="lname" class="h-10 w-32 border bg-gray-100 rounded pl-4 mb-2" required>
            </div>
            <div>
                <input type="text" placeholder="Email or Phone" name="contact" class="h-10 w-64 border bg-gray-100 rounded pl-4 mb-2" required>
            </div>
            <div>
                <input type="number" placeholder="Exam Number" name="password" class="h-10 w-64 border bg-gray-100 rounded pl-4 mb-2" length="12" required>
            </div>
            <div class="">
                <select name="grade" class="h-10 w-32 border bg-gray-100 rounded pl-4 mr-2">
                    <option class="text-gray-500">Grade</option>
                    <option value="12">12</option>
                    <option value="11">11</option>
                    <option value="10">10</option>
                </select>
                <select name="gender" class="h-10 w-32 border bg-gray-100 rounded pl-4 mb-2">
                    <option class="text-gray-500">Gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
            </div>
            <div>
                <input type="password" placeholder="Password" name="conf_password" class="h-10 w-64 border bg-gray-100 rounded pl-4 mb-6" required>
            </div>
            <p class="px-8 text-gray-600">By clicking register you agree to our <span class="text-blue-500 underline underline-offset-4">Privacy Policies, Terms and conditions</span></p><br>
            <button type="submit" class="w-64 h-10 bg-green-600 text-white rounded">Register</button><br><br>
            <p class="text-gray-600">Already have an account? <a href="index.html" class="font-semibold underline underline-offset-4">Login</a></p>
        </form>
        <footer class="bottom-0 h-32 w-full bg-transparent text-gray-600 mt-12">
            
            <div class="text-center">
                
                <div class="flex h-10 w-32 md:w-48 mx-auto text-gray-400 mb-2 justify-between">
                    <button class="h-8 md:h-12 w-8 md:w-12 rounded-full text-gray-600 border border-slate-500" onclick = "location.href='https://www.facebook.com/profile.php?id=100092004857675'"><i class="fa-brands fa-facebook-f md:hover:text-3xl text-center text-base md:text-2xl"></i></button> 
                    <button class="h-8 md:h-12 w-8 md:w-12 rounded-full text-gray-600 border border-slate-500" onclick = "location.href='https://twitter.com/Geocademy_'"><i class="fa-brands fa-twitter md:hover:text-3xl text-center text-base md:text-2xl"></i></button> 
                    <button class="h-8 md:h-12 w-8 md:w-12 rounded-full text-gray-600 border border-slate-500" onclick = "location.href='https://instagram.com/geocademyedu'"><i class="fa-brands fa-instagram md:hover:text-3xl text-center text-base md:text-2xl"></i></button> 
                </div>
                
                <p>Geocademy</p>
                <p>&copy 2023 All Rights Reserved</p>
            </div>
        </footer>
    </div>
</body>
</html>