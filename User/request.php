<?php
  include "connection.php";
   include "topbar.php";
 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

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
<div class="content-wrapper">
  <?php
  if(isset($_SESSION['login_user']))
    {
      $q=mysqli_query($db,"SELECT * from issue_book where username='$_SESSION[login_user]' and approve='' ;");

      if(mysqli_num_rows($q)==0)
      {
        echo "There's no pending request";
      }
      else
      {
    echo "<table class='table table-bordered table-hover' >";
      echo "<tr style='background-color: #6db6b9e6;'>";
        //Table header
        
        echo "<th>"; echo "Book-ID";  echo "</th>";
        echo "<th>"; echo "Approve Status";  echo "</th>";
        echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Return Date";  echo "</th>";
        
      echo "</tr>"; 

      while($row=mysqli_fetch_assoc($q))
      {
        echo "<tr>";
        echo "<td>"; echo $row['bid']; echo "</td>";
        echo "<td>"; echo $row['approve']; echo "</td>";
        echo "<td>"; echo $row['issue']; echo "</td>";
        echo "<td>"; echo $row['return']; echo "</td>";
        
        echo "</tr>";
      }
    echo "</table>";
      }
    }
    else
    {
      echo "</br></br></br>"; 
      echo "<h2><b>";
      echo " Please login first to see the request information.";
      echo "</b></h2>";
    }
    ?>
  </div>
</div>
</body>
</html>