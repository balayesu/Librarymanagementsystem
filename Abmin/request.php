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
  
   </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="container-fluid">
<div class="content-wrapper">
   <div class="srch">
    <form method="post" action="" name="form1">
      <input type="text"  name="username" class="form-control" placeholder="Username" required="">
      <br>
      <input type="text"  name="bid" class="form-control" placeholder="BID" required=""> <br>
      <button class="btn btn-success" style="float: right;" name="submit" type="submit">Submit</button><br>
      
    </form>
     
   </div>

<div>
<?php
if(isset($_SESSION['login_user']))
{
  ?> <h3 style="text-align: center">Request Of Books</h3><br><?php
  $sql= "SELECT student.username,roll,books.bid,name,authors,edition,status FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve =''";
    $res= mysqli_query($db,$sql);
   if(mysqli_num_rows($res)==0)
            {

                echo "<h2><b>";
                echo "There's no pending request.";
                echo "</b></h2>";
            }
   else
   {
       echo "<table class='table table-bordered'>";
           echo "<tr style='background-color: #4fc7bf'>";
                // Table Header
              echo "<th>"; echo "Student Username"; echo "</th>";
              echo "<th>"; echo "Roll No"; echo "</th>";
              echo "<th>"; echo "Bid"; echo "</th>";
              echo "<th>"; echo "Book Name"; echo "</th>";
              echo "<th>"; echo "Authors Name"; echo "</th>";
              echo "<th>"; echo "Edition"; echo "</th>";
              echo "<th>"; echo "Status"; echo "</th>";
       
           echo "</tr>";


           while($row=mysqli_fetch_assoc($res))
           {
              echo "<tr>";
              echo "<td>"; echo $row['username']; echo "</td>";
              echo "<td>"; echo $row['roll']; echo "</td>";
              echo "<td>"; echo $row['bid']; echo "</td>";
              echo "<td>"; echo $row['name']; echo "</td>";
              echo "<td>"; echo $row['authors']; echo "</td>";
              echo "<td>"; echo $row['edition']; echo "</td>";
              echo "<td>"; echo $row['status']; echo "</td>";
           
              echo "</tr>";
           }

           echo "</table>";
   }
}
else
{
  ?>
  <br>
  <h4 style="text-align: center; color: yellow;">You need to login to see the request.</h4>
<?php
  
}
   if(isset($_POST['submit']))
   {
     $_SESSION['name']=$_POST['username'];
     $_SESSION['bid']=$_POST['bid'];


     ?>
       <script type="text/javascript">
         window.location="approve.php";
       </script>

     <?php
     
   }
?>
</div>
</div></div>
</body>
<footer class="main-footer d-flex justify-content-center">
    <strong >Contact Us <a href="#">hebah.library@gmail.com</a>.</strong>
    All rights reserved.
      </footer>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</html>