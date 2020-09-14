<?php
  include "connection.php";
  include "topbar.php";
   
?>
<!DOCTYPE html>
<html>
<head>
	<title>Fine Calculation </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}
.form-search {
width: calc(100% - 80px);
}

    .srch
    {
      float: right; 
    }

	</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<!--_________________sidenav_______________-->
<div class="content-wrapper">
	<div class="container">
		<?php include "sidebar.php";?>
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			<div class="form-inline">
				<input class="form-search" type="text" name="search" placeholder="Student username.." required="">&nbsp &nbsp
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<i class="fa fa-search " aria-hidden="true"></i>
				</button>
			</div>
		</form>
	</div>

	<!--__________________________search bar________________________-->


	<h2>List Of Students</h2>
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * FROM `fine` where username like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No student found with that username. Try searching again.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo " Username ";	echo "</th>";
				echo "<th>"; echo " Bid ";  echo "</th>";
				echo "<th>"; echo " Returned ";  echo "</th>";
				echo "<th>"; echo " Days ";  echo "</th>";
				echo "<th>"; echo " Fines in $ ";  echo "</th>";
				echo "<th>"; echo " Status ";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['returned']; echo "</td>";
				echo "<td>"; echo $row['day']; echo "</td>";
				echo "<td>"; echo $row['fine']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
	$res=mysqli_query($db,"SELECT * FROM `fine`;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo " Username ";	echo "</th>";
				echo "<th>"; echo " Bid ";  echo "</th>";
				echo "<th>"; echo " Returned ";  echo "</th>";
				echo "<th>"; echo " Days ";  echo "</th>";
				echo "<th>"; echo " Fines in $ ";  echo "</th>";
				echo "<th>"; echo " Status ";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['returned']; echo "</td>";
				echo "<td>"; echo $row['days']; echo "</td>";
				echo "<td>"; echo $row['fine']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
		}

	?>
</div>
</div>
</body>
<footer class="main-footer d-flex justify-content-center">
    <strong >Contact Us <a href="#">hebah.library@gmail.com</a>.</strong>
    All rights reserved.
      </footer>
</html>