<?php 
session_start();
include('../db_connect.php');
$email = "";
$SchoolId = "";
$errors = array();

//Forgot Password- Continue button 
if(isset($_POST['check-email'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $check_email = "SELECT * FROM `student_list` WHERE email='$email'";
    $run_sql = mysqli_query($conn, $check_email);
    if(mysqli_num_rows($run_sql) > 0){
        $code = rand(9999999, 1111111);
        $insert_code = "UPDATE `student_list` SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($conn, $insert_code);
        if($run_query){
            $subject = "Password Reset Code";
            $message = "Your password reset code is $code";
            $sender = "From: jahrastafarai983@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a password reset otp to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: reset-code.php');
                exit();
            }else{
                $_SESSION['otp-error'] = "Failed while sending code!";
            }
        }else{
            $_SESSION['db-error'] = "Something went wrong!";
        }
    }else{
        $_SESSION['email'] = "This email address does not exist!";
    }
}

//user-otp
if(isset($_POST['check'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
    $check_code = "SELECT * FROM   `student_list` WHERE code = $otp_code";
    $code_res = mysqli_query($conn, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE `student_list` SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($conn, $update_otp);
        if($update_res){
            $_SESSION['ID'] = $ID;
            $_SESSION['email'] = $email;
            header('location: ../Student/Student_login.php');
            exit();
        }else{
            $errors['otp-error'] = "Failed while updating code!";
        }
    }else{
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

//reset-code
if(isset($_POST['check-reset-otp'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
    $check_code = "SELECT * FROM `student_list` WHERE code = $otp_code";
    $code_res = mysqli_query($conn, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Please create a new password.";
        $_SESSION['info'] = $info;
        header('location: create-newpass.php');
        exit();
    }else{
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

//create-newpass
if(isset($_POST['change-password'])){
    $_SESSION['info'] = "";
    $Password = mysqli_real_escape_string($conn, md5($_POST['Password']));
    $CPassword = mysqli_real_escape_string($conn, md5($_POST['CPassword'])); 
    if($Password !== $CPassword){
        $errors['Password'] = "Confirm password not matched!";
    }else{
        $code = 0;
        $email = $_SESSION['email'];
        $update_pass = "UPDATE `student_list` SET code = $code, Password = '$Password', CPassword='$CPassword' WHERE email = '$email'";
        $run_query = mysqli_query($conn, $update_pass);
        if($run_query){
            $info = "Your password changed. Now you can login with your new password.";
            $_SESSION['info'] = $info;
            header('Location: password-changed.php');
        }else{
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}
?>