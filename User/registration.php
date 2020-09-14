<?php

   include "connection.php";
   
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Regisration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    section
    {
      margin-top: -23px;
    }
  </style>
</head>
  <section>
    <div class="reg_img">
      <br>
            <div class="box2">
      <h1 style="text-align: center; color: white;font-family: baufra; font-size: 30px;">User Registration Form</h><br><br>
      <form name="Registration" action="" method="post">
        <input class="form-control" style="width: 300px; margin-left: 77px;"type="text" name="first" placeholder="First Name" required=""><br>
        <input class="form-control" style="width: 300px; margin-left: 77px;"type="text" name="last" placeholder="Last Name" required=""><br>
        <input class="form-control" style="width: 300px; margin-left: 77px;"type="text" name="username" placeholder="Username" required=""><br>
        <input class="form-control" style="width: 300px; margin-left: 77px;"type="password" name="password" placeholder="Password" required=""><br>
        <input class="form-control" style="width: 300px; margin-left: 77px;"type="text" name="roll" placeholder="Roll Number" required=""><br>
        <input class="form-control" style="width: 300px; margin-left: 77px;"type="text" name="email" placeholder="Email Id" required=""><br>
        <input class="form-control" style="width: 300px; margin-left: 77px;"type="text" name="contact" placeholder="Phone No" required=""><br>
        <input class="btn btn-default"type="submit" name="submit" value="Sign Up" style="width: 70px; height: 30px"></div></div>
      </form> 
    </div>
    </div>
  </section>

<?php

  if(isset($_POST['submit']))
  {
    $count=0;
    $sql="SELECT username from `student`";
    $res=mysqli_query($db,$sql);

    while($row=mysqli_fetch_assoc($res))
    {
       if($row['username']==$POST['username'])
       {
        $count=$count+1;
       }
    }
    
    if($count==0)
    {
      mysqli_query($db,"INSERT INTO `student` VALUES('$_POST[first]','$_POST[last]','$_POST[username]','$_POST[password]','$_POST[roll]','$_POST[email]','$_POST[contact]', 'pic.jpg');");
 ?>

<script type="text/javascript">
  alert("Registration Successful");
</script>
   <?php  
 }
   else
   {
      ?>
     <script type="text/javascript">
     alert("The username already exist. ");
    </script>
    <?php
   }
}

?>
 <body>