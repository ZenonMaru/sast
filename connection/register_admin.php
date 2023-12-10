<?php
session_start();
include('../db_connect.php');
if(isset($_POST['submit_admin'])){

    $SchoolID = mysqli_real_escape_string($con,$_POST['SchoolID']);
    $FullName = mysqli_real_escape_string($con,$_POST['FullName']);
    $Username = mysqli_real_escape_string($con,$_POST['Username']);
    $Email = mysqli_real_escape_string($con,$_POST['Email']);
    $Password = mysqli_real_escape_string($con, md5($_POST['Password']));
    $CPassword = mysqli_real_escape_string($con, md5($_POST['CPassword'])); 
       
    if($Password == $CPassword){
        $checkEmail = "SELECT Email FROM `userdata` WHERE Email = '$Email'";
        $checkEmail_run = mysqli_query($con, $checkEmail);

        if(mysqli_num_rows($checkEmail_run) > 0){
            $_SESSION['message'] = "Email already exists!";
            header('location:../register/Admin_registration.php');
            exit(0);
        }else{
            $insert = " INSERT INTO `userdata` (SchoolID, FullName, Username, Email, Password, CPassword)
                VALUES ('$SchoolID','$FullName', '$Username', '$Email','$Password','$CPassword')";
            $insert_run = mysqli_query($con, $insert);
               
            if($insert_run){
                $_SESSION['message'] = "Registered Successfully!";
                header('location:../login.php');
                exit(0);
            }else{
                $_SESSION['message'] = "Something went wrong!";
                header('location:../register/Admin_registration.php');
                exit(0);
            }
        }
    }else{
        $_SESSION['message'] = "Password does not match";
        header('location:../register/Admin_registration.php');
        exit(0);
        }       
}else{
    header('location:../register/Admin_registration.php');
    exit(0);
};
?>