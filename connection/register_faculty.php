<?php
session_start();
include('../db_connect.php');

if(isset($_POST['submit_register_fa'])){

    $school_id = mysqli_real_escape_string($conn,$_POST['SchoolID']);
    $firstname = mysqli_real_escape_string($conn,$_POST['FirstName']);
    $lastname = mysqli_real_escape_string($conn,$_POST['LastName']);
    $email = mysqli_real_escape_string($conn,$_POST['Email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['Password']));
    $cpassword = mysqli_real_escape_string($conn, md5($_POST['CPassword'])); 
       
    if($password == $cpassword){
        $checkEmail = "SELECT Email FROM `faculty_list` WHERE Email = '$email'";
        $checkEmail_run = mysqli_query($conn, $checkEmail);

        if(mysqli_num_rows($checkEmail_run) > 0){
            $_SESSION['message'] = "Email already exists!";
            header('location:../register/Faculty_registration.php');
            exit(0);
        }else{
            $insert = " INSERT INTO `faculty_list` (school_id, FirstName, LastName, Email, Password, CPassword)
                VALUES ('$school_id','$firstname','$lastname', '$email','$password','$cpassword')";
            $insert_run = mysqli_query($conn, $insert);
               
            if($insert_run){
                $_SESSION['message'] = "Registered Successfully!";
                header('location:../login.php');
                exit(0);
            }else{
                $_SESSION['message'] = "Something went wrong!";
                header('location:../register/Faculty_registration.php');
                exit(0);
            }
        }
    }else{
        $_SESSION['message'] = "Password does not match";
        header('location:../register/Faculty_registration.php');
        exit(0);
        }       
}else{
    header('location:../register/Faculty_registration.php');
    exit(0);
};
?>