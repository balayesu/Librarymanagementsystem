<?php
   include "connection.php";?>
 <?php  include "topbar.php";?>
    

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Books</title>
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
    .srch
    {
      float: right; 
    }
   

   </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
   <div class="container-fluid">
  <?php include "sidebar.php";?>
</div>
     
  <div class="container-fluid">
  <?php include "sidebar.php";?>
</div>
  <!------------------------sidenav------------------------------------------->
 

<div class="content-wrapper">

  <div class="srch">
    <br>
    <form class="navbar-form" method="post" name="form1">
<div class="form-inline">
         <input class="form-control float-sm-right" type="text" name="search" placeholder="search books.." required="">&nbsp &nbsp
         <button style="background-color: #4fc7bf;" type="submit" name="submit" class="btn btn-default float-xl-right">

              <i class="fa fa-search " aria-hidden="true"></i>
           
         </button>
      </div>
    </form>
<br>
     <form class="navbar-form" method="post" name="form1">
<div class="form-inline">
         <input class="form-control float-sm-right" type="text" name="bid" placeholder="Enter Book Id " required=""> &nbsp &nbsp
         <button style="background-color: #4fc7bf;" type="submit" name="submit1" class="btn btn-default float-xl-right"><i>Request</i>
         </button>
      </div>
    </form>

  </div>
  <br>
  <br><br><br>
  <h2 class="pl-2">List Of Books</h2>
  <!-- <br> -->
    <?php

        if(isset($_POST['submit']))
        {
            $q=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%' ");
            if(mysqli_num_rows($q)==0)
            {
                echo "Sorry! No book found. Try searching again.";
            }
            else
            {?>
                    <div class="container-fluid">
    <div class="table-responsive-lg">
    <table class="table">
        <thead class="thead-dark">
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Book-Name</th>
        <th scope="col">Authors Name</th>
        <th scope="col">Edition</th>
        <th scope="col">Status</th>
        <th scope="col">Quantity</th>
        <th scope="col">Department</th>
        </tr>
        </thead>
<tbody><?php


           while($row=mysqli_fetch_assoc($q))
           {?>
               <tr>
          <th><?php echo $row['bid']; ?></th>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['authors']; ?></td>
          <td><?php echo $row['edition']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td><?php echo $row['quantity']; ?></td>
          <td><?php echo $row['department'];?></td>
        </tr>
      <?php }?>
</tbody></table></div></div>
          <?php

          
                }
        }
          // /if button is not pressed/
        else
        {
             $res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");?>
          <div class="container-fluid">
    <div class="table-responsive-lg">
    <table class="table">
        <thead class="thead-dark">
        <tr>
        <th scope="col">Id</th>
        <th scope="col">Book-Name</th>
        <th scope="col">Authors Name</th>
        <th scope="col">Edition</th>
        <th scope="col">Status</th>
        <th scope="col">Quantity</th>
        <th scope="col">Department</th>
        </tr>
        </thead>

<tbody><?php


       while($row=mysqli_fetch_assoc($res))
       {?>
          <tr>
          <th><?php echo $row['bid']; ?></th>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['authors']; ?></td>
          <td><?php echo $row['edition']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td><?php echo $row['quantity']; ?></td>
          <td><?php echo $row['department'];?></td>
        </tr>
         <!--  echo "<tr>";
          echo "<td>"; echo $row['bid']; echo "</td>";
          echo "<td>"; echo $row['name']; echo "</td>";
          echo "<td>"; echo $row['authors']; echo "</td>";
          echo "<td>"; echo $row['edition']; echo "</td>";
          echo "<td>"; echo $row['status']; echo "</td>";
          echo "<td>"; echo $row['quantity']; echo "</td>";
          echo "<td>"; echo $row['department']; echo "</td>";

          echo "</tr>"; -->
      <?php }
?>
       </tbody>
     </table>
   </div>
 </div>
       <?php }
       if(isset($_POST['submit1']))
		{
			if(isset($_SESSION['login_user']))
			{
				$sql1=mysqli_query($db,"SELECT * FROM `books` WHERE bid='$_POST[bid]';");
			$row=mysqli_fetch_assoc($sql1);
			$count1=mysqli_num_rows($sql1);
			//=-----------
				$res4=mysqli_query($db,"SELECT quantity from books where bid='$_SESSION[bid]';");
				$row4=mysqli_fetch_assoc($res4);
			//==-=
			if ($count1!=0 && $row['quantity']!=0) 
			{
				mysqli_query($db,"INSERT INTO issue_book Values('$_SESSION[login_user]', '$_POST[bid]', '', '', '');");
				?>
					<script type="text/javascript">
						window.location="request.php"
					</script>
				<?php
			}
			else
			{?>
				<script type="text/javascript">
						alert("The requested book is not available or invalid book id");
					</script>
					<?php
			}
		}
			else
			{
				?>
					<script type="text/javascript">
						alert("You must login to Request a book");
					</script>
				<?php
			}
		}

	?>
       
  </div>

<!-- </div> -->
</body>
<footer class="main-footer d-flex justify-content-center">
    <strong >Contact Us <a href="#">hebah.library@gmail.com</a>.</strong>
    All rights reserved.
      </footer>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</html>

























































