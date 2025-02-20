<?php
  include "connection.php";
   //include "topbar.php";
   //include "sidebar.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Message</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<style type="text/css">
  body
  {
    background-image: url("images/msg.png");
      background-repeat: no-repeat;
  }
  .pic
  {
    background-image: url("images/msg.png");
      background-repeat: no-repeat;
  }
  .left_box
  {
    height: 80vh;
    width: 40%;
       
    float: left;
    margin-top: 15px;
  }
  .left_box2
  {
    height: 100%;
    width: 50%;
    background-color: #537890;
    border-radius: 1%;
    float: right;
    margin-right: 2%;

    margin-top: 0px;
  }
  .left_box input
  {
    width: 60%;
    height: 20%;
    background-color: #537890;
    padding: 1%;
    margin: 1%;
    border-radius: 2%;
  }
  .list
  {
    height: 100%;
    width: 100%;
    background-color: #537890;
    float: right;
    color: white;
    padding: 10px;
    overflow-y: scroll;
    overflow-x: hidden;
  }
  .right_box
  {
    height: 100%;
    width: 60%;
     background-color: red;
    margin-left: 40%;
    margin-top: 10px;
   
  }
  .right_box2
  {

    height: 100%;
    width: 70%;
    margin-top: -20px;
    padding: 20px;
    border-radius: 20px;
    background-color: #537890;
    float: left;
    color:white;
    margin-top: 12px;

  }
  tr:hover
  {
    background-color: #1e3f54;
    cursor: pointer;
  }
  .form-control
{
  height: 47px;
  width: 78%;
}
.msg
{
  height: 460px;
  overflow-y: scroll;
}
.btn-info
{
  background-color: #02c5b6;
}
.chat
{
  display: flex;
  flex-flow:row wrap;
}
.user .chatbox
{
  height: 50px;
  width: 500px;
  padding: 13px 10px;
  background-color: #821b69;
  color: white;
  border-radius: 10px;
}
.admin .chatbox
{
  height: 50px;
  width: 500px;
  padding: 13px 10px;
  background-color: #423471;
  color: white;
  border-radius: 10px;
  order: -1;
}
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed" >
  <div class="container-fluid">
  <?php include "topbar.php";?>
</div>
     
  <div class="container-fluid">
  <?php include "sidebar.php";?>
</div>
 <!--  <div class="content-wrapper"> -->
    <div class="pic">
<?php
  $sql1=mysqli_query($db,"SELECT student.pic,message.username FROM student INNER JOIN message ON student.username=message.username group by username ORDER BY status ;");
?>
<!-----------------------Left box-------------------->
<div class="left_box">
  <div class="left_box2">
    <div style="color: #fff;">
      <form method="post" enctype="multipart/form-data">
        <input type="text" name="username" id="uname">
        <button type="submit" name="submit" class="btn btn-default">SHOW</button>
      </form>
    </div>
    <div class="list">
      <?php
        echo "<table id='table' class='table' >";
        while ($res1=mysqli_fetch_assoc($sql1)) 
        {
          echo "<tr>";
            echo "<td width=65>"; echo "<img class='img-circle profile_img' height=60 width=60 src='images/".$res1['pic']."'>";  echo "</td>";

            echo "<td style='padding-top:30px;'>"; echo $res1['username']; echo "</td>";

          echo "</tr>";
        }
        echo "</table>";
      ?>
    </div>
  </div>
</div>
<!-----------------------Right box-------------------->
<div class="right_box">
  <div class="right_box2">
    <?php
    /*--------------if submit is pressed-----------*/
      if(isset($_POST['submit']))
      {
        $res=mysqli_query($db,"SELECT * from message where username='$_POST[username]' ;");
        mysqli_query($db,"UPDATE message SET status='yes' where sender='student' and username='$_POST[username]' ;");

        if($_POST['username'] != ''){$_SESSION['username']=$_POST['username'];}

      ?>
        <div style="height: 70px; width: 100%; text-align: center; color: white; ">
          <h3 style="margin-top: -5px; padding-top: 10px;"> <?php echo $_SESSION['username'] ?> </h3>
        </div>
  <!---------show message----------->
            <div class="msg">
            <?php
              while ($row=mysqli_fetch_assoc($res))
              {
                if($row['sender']=='student')
                {
            ?>
              <!-------student---------------->
              <br><div class="chat user">
                <div style="float: left; padding-top: 5px;">
                  &nbsp
                  <img style="height: 40px; width: 40px; border-radius: 50%;" src="images/pic.jpg">
                  &nbsp
                </div>
                <div style="float: left;" class="chatbox">
                  <?php
                    echo $row['message'];
                  ?>
                </div>
              </div>

          <?php
            }
            else
            {
          ?>
              <!-------admin---------------->

              <br><div class="chat admin">
                <div style="float: left; padding-top: 5px;">
                  &nbsp
                  <?php
                  echo "<img class='img-circle profile_img' height=40 width=40 src='images/".$_SESSION['pic']."'>";
                  ?>
                  
                  &nbsp
                </div>
                <div style="float: left;" class="chatbox">
                  <?php
                    echo $row['message'];
                  ?>
                </div>
              </div>

              <?php
            }
            }
              ?>
            </div>
        
          <div style="height: 50px; padding-top: 10px;" >
          <form action="" method="post">
            <div class="form-inline">
            <input type="text" name="message" class="form-control" required="" style="width: 80%;"placeholder="Write Message..." style="float: left"> &nbsp&nbsp
            <button class="btn btn-info btn-lg" type="submit" name="submit1"><span class="glyphicon glyphicon-send "></span>&nbsp Send</button>
            </div>
          </form>
          </div>
      <?php
      }
     /*--------------if submit is not pressed-----------*/
     else
     {
      if($_SESSION['username']=='')
      {
        ?>
          <img style="margin: 100px 80px; border-radius: 50%;" src="images/tenor.gif" alt="animated">
        <?php
      }
      else
      {
        if(isset($_POST['submit1']))
        {
          mysqli_query($db,"INSERT into `library`.`message` VALUES ('', '$_SESSION[username]','$_POST[message]','no','admin');");

          $res=mysqli_query($db,"SELECT * from message where username='$_SESSION[username]' ;");
        }
        else
        {
          $res=mysqli_query($db,"SELECT * from message where username='$_SESSION[username]' ;");
        }
        ?>
        <div style="height: 70px; width: 100%; text-align: center; color: white; ">
          <h3 style="margin-top: -5px; padding-top: 10px;"> <?php echo $_SESSION['username'] ?> </h3>
        </div>
            <div class="msg">
            <?php
              while ($row=mysqli_fetch_assoc($res))
              {
                if($row['sender']=='student')
                {
            ?>
              <!-------student---------------->
              <br><div class="chat user">
                <div style="float: left; padding-top: 5px;">
                  &nbsp
                  <img style="height: 40px; width: 40px; border-radius: 50%;" src="images/p.jpg">&nbsp
                </div>
                <div style="float: left;" class="chatbox">
                  <?php
                    echo $row['message'];
                  ?>
                </div>
              </div>

          <?php
            }
            else
            {
          ?>
              <!-------admin---------------->

              <br><div class="chat admin">
                <div style="float: left; padding-top: 5px;">
                  &nbsp
                  <?php
                  echo "<img class='img-circle profile_img' height=40 width=40 src='images/".$_SESSION['pic']."'>";
                  ?>
                  
                  &nbsp
                </div>
                <div style="float: left;" class="chatbox">
                  <?php
                    echo $row['message'];
                  ?>
                </div>
              </div>

              <?php
            }
            }
              ?>
            </div>
          <div style="height: 50px; padding-top: 10px;" >
          <form action="" method="post">
            <input type="text" name="message" class="form-control" required="" placeholder="Write Message..." style="float: left"> &nbsp&nbsp
            <button class="btn btn-info btn-lg" type="submit" name="submit1"><span class="glyphicon glyphicon-send "></span>&nbsp Send</button>
          </form>
          </div>

        <?php

      }
     }
    ?>
  </div>
</div>

<script>
  var table = document.getElementById('table'),eIndex;
  for(var i=0; i< table.rows.length; i++)
  {
    table.rows[i].onclick =function()
    {
      rIndex = this.rowIndex;
      document.getElementById("uname").value = this.cells[1].innerHTML;
    }
  }
</script>
</div>
</div>
</body>
</html>