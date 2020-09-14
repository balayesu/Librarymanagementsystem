<?php
   include "connection.php";
   include "topbar.php";
?>
<!DOCTYPE html>
<html>
<head>
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
  <title>Book Request</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
    .srch
    {
      padding-left: 70%; 
    }
    .form-control
    {
      width: 300px;
      height: 40px;
      background-color: black;
      color: white;
    }


  body {
  background-image: url("images/issue.jpg");
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}



th,td
{
  width: 10%;
}
   </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="container-fluid">
  <?php include "sidebar.php";?>
</div>
     
  
<!--______sidenav______-->
  
 
  <div class="content-wrapper">
    <?php
      if(isset($_SESSION['login_user']))
      {
        ?>
        <div style="float: left; padding: 5px; padding-top: 20px; ">
          <form method="post" action="">
          <button name="submit2" type="submit" class="btn btn-default" style="background-color: #06861a; color: yellow;">RETURNED</button> &nbsp&nbsp
          <button name="submit3" type="submit" class="btn btn-default" style="background-color: red; color: yellow;">EXPIRED</button></form>
        </div>
        <div style="float: right; padding-top: 10px;">

          <?php
          $var=0;

            $result=mysqli_query($db, "SELECT * from `fine` where username='$_SESSION[login_user]' and status='not paid';");

            while($r=mysqli_fetch_assoc($result))
            {
              $var=$var+$r['fine'];
            }
            //$var2=$var+$_SESSION['fine'];

          ?>
          <h3>Your fine is: 
            <?php

              // echo "₹".$var2;

            ?>


          </h3>
          

        </div>
        <br><br><br><br><br>
   <?php
     }
     if(isset($_SESSION['login_user']))
     {
         $ret='<p style="color:yellow; background-color:green;">RETURNED</p>';

          $exp='<p style="color:yellow; background-color:red;">EXPIRED</p>';

      if(isset($_POST['submit2']))
      {

        $sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve='$ret' and issue_book.username ='$_SESSION[login_user]'  ORDER BY `issue_book`.`return` DESC";

         $res=mysqli_query($db,$sql);

      }
      else if(isset($_POST['submit3']))
      {
         $sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve='$exp'  and issue_book.username ='$_SESSION[login_user]' ORDER BY `issue_book`.`return` DESC";

          $res=mysqli_query($db,$sql);
      }
      else
      {
        $sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' and issue_book.approve !='Yes'  and issue_book.username ='$_SESSION[login_user]'  ORDER BY `issue_book`.`return` DESC";

         $res=mysqli_query($db,$sql);
      }

        echo "<table class='table table-bordered' style='width:100%;' >";
        //Table header
        
        echo "<tr style='background-color: #6db6b9e6;'>";
        echo "<th>"; echo "Username";  echo "</th>";
        echo "<th>"; echo "Roll No";  echo "</th>";
        echo "<th>"; echo "BID";  echo "</th>";
        echo "<th>"; echo "Book Name";  echo "</th>";
        echo "<th>"; echo "Authors Name";  echo "</th>";
        echo "<th>"; echo "Edition";  echo "</th>";
         echo "<th>"; echo "Status";  echo "</th>";
        echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Return Date";  echo "</th>";

      echo "</tr>"; 
      echo "</table>";

       echo "<div class='scroll'>";
        echo "<table class='table table-bordered' >";
      while($row=mysqli_fetch_assoc($res))
      {


        
          echo "<tr>";
          echo "<td>"; echo $row['username']; echo "</td>";
          echo "<td>"; echo $row['roll']; echo "</td>";
          echo "<td>"; echo $row['bid']; echo "</td>";
          echo "<td>"; echo $row['name']; echo "</td>";
          echo "<td>"; echo $row['authors']; echo "</td>";
          echo "<td>"; echo $row['edition']; echo "</td>";
          echo "<td>"; echo $row['approve']; echo "</td>";
          echo "<td>"; echo $row['issue']; echo "</td>";
          echo "<td>"; echo $row['return']; echo "</td>";
        echo "</tr>";
      }
    echo "</table>";
    echo "</div>";
  }
      else
      {
        ?>
          <h3 style="text-align: center;">Login to see information of Borrowed Books</h3>
        <?php
      }
    ?>
  </div>
</div>
</body>
</html>