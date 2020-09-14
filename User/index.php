<?php include "connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Library</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="register_css/util.css"> 
  <link rel="stylesheet" type="text/css" href="register_css/main.css">
<style type="text/css">
  .small {
        margin: 8px;
    padding: 0px;
    padding-right: 49px;
    box-sizing: border-box; 
   text-align: center; 
} 
</style>
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-form-title" style="background-image: url(images/1.jpg);">
          <span class="login100-form-title-1">
            Sign In
          </span>
        </div>

        <form class="login100-form validate-form" name="login" action="" method="post">
          <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">Username</span>
            <input class="input100" type="text" name="username" placeholder="Enter username">
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
            <span class="label-input100">Password</span>
            <input class="input100" type="password" name="password" placeholder="Enter password">
            <span class="focus-input100"></span>
          </div>

          <div class="flex-sb-m w-full p-b-30">
              <div>
                <p>New To This Website:<a href="registration.php" class="txt1">
                Sign Up
              </a></p>
              
            </div>
            <div>
              <a href="update_password.php" class="txt1">
                Forgot Password?
              </a>
            </div>
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit" name="submit" value="Login">
              Login
            </button>
          </div>
        
  <?php

    if(isset($_POST['submit']))
    {
      $count=0;
      $res=mysqli_query($db,"SELECT * FROM `student` WHERE username='$_POST[username]' && password='$_POST[password]';");
      $row=mysqli_fetch_assoc($res);
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
              <!--
              <script type="text/javascript">
                alert("The username and password doesn't match.");
              </script> 
              -->
              <div class="mx-auto">
              <div class="small">
           <div class="alert alert-danger">
    <strong>The username and password doesn't match.</strong> 
  </div></div></div>
        <?php
      }
      else
      {
        $_SESSION['login_user'] = $_POST['username']; 
        $_SESSION['user_id'] = $_POST['username']; 
        $_SESSION['pic']=$row['pic'];
          //echo $_SESSION['user_id'] ;
        ?> 

           <script type="text/javascript">
            window.location="home.php"
          </script> 
        <?php
      }
    }

  ?>
<!--===============================================================================================-->
  </form>
      </div>
    </div>
  
  </div>

</body>
</html>