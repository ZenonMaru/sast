<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
  ob_start();
  // if(!isset($_SESSION['system'])){

    $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
    foreach($system as $k => $v){
      $_SESSION['system'][$k] = $v;
    }
  // }
  ob_end_flush();
?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>
<?php include 'header.php' ?>
<link rel="stylesheet" href="./css/login.css">
<body class="hold-transition login-page bg-black">
  <h2><b><?php echo $_SESSION['system']['name'] ?></b></h2>
<div class="login-box">
  <div class="login-logo">
    <a href="#" class="text-white"></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form action="" id="login-form">
        <!-- logo image -->
        <img src="./image/ctulogo.png" alt="">
            <h3>Login</h3>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" required placeholder="Email">
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" required placeholder="Password">
        </div>
        <div class="form-group mb-3">
          <label for="" class="login-as">Login As</label>
          <select name="login" id="" class="custom-select custom-select-sm">
            <option value="3">Student</option>
            <option value="2">Teacher</option>
            <option value="1">Admin</option>
          </select>
        </div>
        
        <div class="row">
          <div class="col-12">
          <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
        </div>
        <!-- forgot password -->
        <div class="pass">
            <a href="./ForgotPassword_Student/forgotpass_stu.php">Forgot Password?</a>
        </div>
        <!-- registration form page for student -->
        <div class="registration-form">
          <a href="./register/Student_registration.php">Student Register</a><span> |</span> 
          <a href="./register/Faculty_registration.php">Faculty Register</a>
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<script>
  $(document).ready(function(){
    $('#login-form').submit(function(e){
    e.preventDefault()
    start_load()
    if($(this).find('.alert-danger').length > 0 )
      $(this).find('.alert-danger').remove();
    $.ajax({
      url:'ajax.php?action=login',
      method:'POST',
      data:$(this).serialize(),
      error:err=>{
        console.log(err)
        end_load();

      },
      success:function(resp){
        if(resp == 1){
          location.href ='index.php?page=home';
        }else{
          $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
          end_load();
        }
      }
    })
  })
  })
</script>
<?php include 'footer.php' ?>

</body>
</html>
