<?php
session_start();
include('../db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap-5.2.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/registration.css">
    <title>Registration | Web - Based Students Assessment Survey for Teachers (SAST)</title>
    <script src="../bootstrap-5.2.1-dist/js/bootstrap.min.js"></script>

</head>
<body>
    <header>
    <h1>Web - Based Students Assessment Survey for Teachers (SAST)- Registration</h1>
    </header>
    <div class="form-container">
        <form action="../connection/register_faculty.php" method="POST">
            <img src="../image/ctulogo.png" alt="">
            <h2>REGISTRATION</h2>
            <?php include('../message/message.php');?>
            <input type="text" name="SchoolID" placeholder="Enter your school ID" required="required">
            <input type="text" name="FirstName" placeholder="Enter your first name" required="required">
            <input type="text" name="LastName" placeholder="Enter your last name" required="required">
            <input type="email" name="Email" placeholder="Enter your email" required="required">
            <input type="password" name="Password" placeholder="Enter your password" required="required">
            <input type="password" name="CPassword" placeholder="Confirm your password" required="required">

            <!--<h3>Register As</h3>                
                <select name="std">
                    <option value="Student">Student</option>
                    <option value="Faculty">Faculty</option>                      
                </select> -->
                <button type="submit" name="submit_register_fa" class="faculty_reg"><p>Register</p></button> 
                <div class="login">  
                    <p>Already have an Account? <a href="../login.php"> Login here</a></p>
                </div>                        
        </form>
</div>
</body>
</html>