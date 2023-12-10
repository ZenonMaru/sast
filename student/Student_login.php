<?php
include('../db_connect.php');
session_start();

if(isset($_POST['submit'])){
    $id = mysqli_real_escape_string($conn,$_POST['ID']);

    $school_id = mysqli_real_escape_string($conn,$_POST['SchoolID']);
    $firstname = mysqli_real_escape_string($conn,$_POST['FirstName']);
    $lastname = mysqli_real_escape_string($conn,$_POST['LastName']);
    $class_id = mysqli_real_escape_string($conn,$_POST['class_id']);
    $email = mysqli_real_escape_string($conn,$_POST['Email']);
    $password = md5($_POST['Password']);
    $cpassword = md5($_POST['CPassword']);   

    $select = mysqli_query($conn," SELECT * FROM `student_list` WHERE Email = '$email' && Password = '$password'");

    if(mysqli_num_rows($select)> 0){
        $row = mysqli_fetch_assoc($select);
            header('location:home.php');
    }else{
        $_SESSION['message'] = "Invalid Email or Password!";
            header('location:./Student_login.php');
            exit(0);
    }
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap-5.2.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <title>Login | Faculty Evaluation System</title>
    <script src="../bootstrap-5.2.1-dist/js/bootstrap.min.js"></script>

</head>
<body>
    <header>
    <h1>Faculty Evaluation System - Login</h1>
    </header>
    <div class="form-container">
        <form action="" method="POST">
            <img src="../image/ctulogo.png" alt="">
            <h2>Login</h2>
            <?php include('../message/message.php');?>
            <input type="email" name="Email" placeholder="Enter your email" required="required">
            <input type="password" name="Password" placeholder="Enter your password" required="required">

           <!-- <h3>Login As</h3>                
                <select name="std">
                    <option value="Student">Student</option>
                    <option value="Faculty">Faculty</option> 
                    <option value="Admin">Admin</option>                      
                </select> -->
    
                <button type="submit" name="submit" class="Student_log"><p>Login</p></button> 
                    
                    <div class="pass">
                    <a href="../ForgotPassword_Student/forgotpass_stu.php">Forgot Password?</a>
                    </div>

                    <div class="register">
                    <p>You don't have an Account? <a href="../register/Student_registration.php">Register here</label> </a></p>
                    </div>
        </form>
        
</div>
</body>
</html>