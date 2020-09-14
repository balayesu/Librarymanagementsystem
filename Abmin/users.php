<?php
   include "connection.php";
    include "topbar.php";
    
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Information</title>
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
    .form-search {
width: calc(100% - 80px);
}
     body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}


  </style>
</head>
    <body class="hold-transition sidebar-mini layout-fixed">
      <div class="container-fluid">
  <?php include "sidebar.php";?>
</div>
     
  <!--___________________________________search bar____________________________________________________-->
  <div class="content-wrapper">
  <div class="srch">
    <form class="navbar-form" method="post" name="form1">
        <div class="form-inline">
          <br> <br> <br>
         <input class="form-search" type="text" name="search" placeholder="Student username.." required="">&nbsp &nbsp
         <button style="background-color: #4fc7bf;" type="submit" name="submit" class="btn btn-default"> 

              <i class="fa fa-search " aria-hidden="true"></i>
                
              </span>
           
         </button>
      </div>
    </form>
  </div>
  <br><br><br>
	<h2>List Of Students</h2>
    <?php

        if(isset($_POST['submit']))
        {
            $q=mysqli_query($db,"SELECT first,last,username,roll,email,contact FROM `student` where username like '%$_POST[search]%' ");
            if(mysqli_num_rows($q)==0)
            {
                echo "Sorry! No student found with such username. Try searching again.";
            }
            else
            {?>
                       <div class="container-fluid">
    <div class="table-responsive-lg">
    <table class="table">
        <thead class="thead-dark">
        <tr>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Username</th>
        <th scope="col">Roll</th>
        <th scope="col">Email</th>
        <th scope="col">Contact</th>
        </tr>
        </thead>
<tbody>

<?php
           while($row=mysqli_fetch_assoc($q))
           {
              echo "<tr>";
              echo "<td>"; echo $row['first']; echo "</td>";
	          echo "<td>"; echo $row['last']; echo "</td>";
	          echo "<td>"; echo $row['username']; echo "</td>";
	          echo "<td>"; echo $row['roll']; echo "</td>";
	          echo "<td>"; echo $row['email']; echo "</td>";
	          echo "<td>"; echo $row['contact']; echo "</td>";
              echo "</tr>";
           }

           echo "</table>";
                }
                  
        }
    
  
           /*if button is not pressed*/
        else
        {
             $res=mysqli_query($db,"SELECT first,last,username,roll,email,contact FROM `student`");?>

             <div class="container-fluid">
    <div class="table-responsive-lg">
    <table class="table">
        <thead class="thead-dark">
        <tr>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Username</th>
        <th scope="col">Roll</th>
        <th scope="col">Email</th>
        <th scope="col">Contact</th>
        </tr>
        </thead>
<tbody>

       <!-- echo "<table class='table table-bordered table-hover'>";
       echo "<tr style='background-color: #4fc7bf'>";
            // Table Header
           echo "<th>"; echo "First Name"; echo "</th>";
              echo "<th>"; echo "Last Name"; echo "</th>";
              echo "<th>"; echo "Username"; echo "</th>";
              echo "<th>"; echo "Roll"; echo "</th>";
              echo "<th>"; echo "Email"; echo "</th>";
              echo "<th>"; echo "Contact"; echo "</th>";
       echo "</tr>"; -->
<?php

       while($row=mysqli_fetch_assoc($res))
       {
          echo "<tr>";
          echo "<td>"; echo $row['first']; echo "</td>";
          echo "<td>"; echo $row['last']; echo "</td>";
          echo "<td>"; echo $row['username']; echo "</td>";
          echo "<td>"; echo $row['roll']; echo "</td>";
          echo "<td>"; echo $row['email']; echo "</td>";
          echo "<td>"; echo $row['contact']; echo "</td>";

          echo "</tr>";
       }

       echo "</table>";
        }
    ?>
</tbody>
</table>
</div></div></div>
</body>
<footer class="main-footer d-flex justify-content-center">
    <strong >Contact Us <a href="#">hebah.library@gmail.com</a>.</strong>
    All rights reserved.
      </footer>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</html>
