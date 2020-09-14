<?php
   include "connection.php";
   include "topbar.php";
   include "sidebar.php";
    
?>
<!DOCTYPE html>
<html>
<head>
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

.container
{
  height: 800px;
  width: 85%;
  background-color: black;
  opacity: .8;
  color: white;
  margin-top: -15px;
}
.scroll
{
  width: 100%;
  height: 400px;
  overflow: auto;

}
th,td
{
  width: 10%;
}
   </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!--_________________sidenav_______________-->
  
 <div class="content-wrapper">
  <div class="container">
    <?php
      if(isset($_SESSION['login_user']))
      {
        ?>
        <div style="float: left; padding: 25px; ">
          <form method="post" action="">
          <button name="submit2" type="submit" class="btn btn-default" style="background-color: #06861a; color: yellow;">RETURNED</button> &nbsp&nbsp
          <button name="submit3" type="submit" class="btn btn-default" style="background-color: red; color: yellow;">EXPIRED</button></form>
        </div>
          <div class="srch">
            <br>
          <form method="post" action="" name="form1"><br>
          <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
          <input type="text" name="bid" class="form-control" placeholder="BID" required=""><br>
          <button class="btn btn-default" name="submit" type="submit">Submit</button><br>
      
    </form>
     
   </div>
   <?php
      if(isset($_POST['submit']))
        {
          $res=mysqli_query($db,"SELECT * FROM `issue_book` where username='$_POST[username]' and bid='$_POST[bid]' ;");

          while ($row=mysqli_fetch_assoc($res))
          {
                $d= strtotime($row['return']);
                $c= strtotime(date("Y-m-d"));
                $diff= $c-$d;

                if($diff>=0)
                {
                  $day= floor($diff/(60*60*24)); 
                  $fine= $day*1;
                }


          }
            $x= date("Y-m-d"); 
            mysqli_query($db, "INSERT INTO `fine` VALUES ('$_POST[username]','$_POST[bid]','$x','$day','$fine','not paid');");


              $var1='<p style="color:yellow; background-color:green;">RETURNED</p>';

               mysqli_query($db,"UPDATE issue_book SET approve='$var1' where username='$_POST[username]' and bid='$_POST[bid]'");
          }
      }


    ?>
    <!--<h3 style="text-align: center;">Date expired list</h3>--><br>
    <?php
    $c=0;

      if(isset($_SESSION['login_user']))
      {
         $ret='<p style="color:yellow; background-color:green;">RETURNED</p>';

          $exp='<p style="color:yellow; background-color:red;">EXPIRED</p>';

      if(isset($_POST['submit2']))
      {

        $sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve='$ret' ORDER BY `issue_book`.`return` DESC";

         $res=mysqli_query($db,$sql);

      }
      else if(isset($_POST['submit3']))
      {
         $sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve='$exp' ORDER BY `issue_book`.`return` DESC";

          $res=mysqli_query($db,$sql);
      }
      else
      {
        $sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' and issue_book.approve !='Yes'  ORDER BY `issue_book`.`return` DESC";

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
</div>
</body>
<footer class="main-footer d-flex justify-content-center">
    <strong >Contact Us <a href="#">hebah.library@gmail.com</a>.</strong>
    All rights reserved.
      </footer>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</html>