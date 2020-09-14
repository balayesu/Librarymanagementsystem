<?php
   include "connection.php";
   include "topbar.php";
   
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    		background-image: url("images/feed.png");
    	}
    	.wrapper
    	{
    		padding: 10px;
    		margin: -20px auto;
    		width:900px;
    		height: 600px;
    		margin-top: 50px;
    		background-color: black;
    		opacity: .8;
    		color: white;
    	}
    	.form-control
    	{
    		height: 80px;
    		width: 60%;
    	}
    	.scroll
    	{
    		width: 100%;
    		height: 300px;
    		overflow: auto;
    	}
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
   <div class="container-fluid">
  <?php include "sidebar.php";?>
</div>
   <div class="content-wrapper">
    <br>
    <br>
   	<h4>If you have any suggestions or queries please comment below.</h4><br>
   	<form style="" action="" method="post">
   		<input class="form-control" style="width: 40%;height: 80px;" type="text" name="comment" placeholder="Write something..."><br>
   		<input class="btn btn-success" type="submit" name="submit" value="Comment" style="width: 100px; height: 35px;"><br><br>
   		
   	</form><br>
   	<div class="scroll">
<?php
			if(isset($_POST['submit']))
			{
				$sql="INSERT INTO `comments` VALUES('','Admin', '$_POST[comment]');";
				if(mysqli_query($db,$sql))
				{
					$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
					$res=mysqli_query($db,$q);?>
<div class="table-responsive-lg">
    <table class="table">
      <thead class="thead-dark">
        <tr>
        <th scope="col">Name</th>
        <th scope="col">Comment</th>
      </tr></thead>
      <tbody><?php
					while ($row=mysqli_fetch_assoc($res)) 
					{
						?>
            <tr>
              <td><?php echo $row['username'];?></td>
              <td><?php echo $row['comment']; ?></td>
              </tr>
            <?php
					}?>
          </tbody></table></div> <?php
				}

}
			else
			{
				$q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC"; 
					$res=mysqli_query($db,$q);
?>
			<div class="container-fluid">
          <div class="table-responsive-lg">
    <table class="table">
      <thead class="thead-dark">
        <tr>
        <th scope="col">Name</th>
        <th scope="col">Comment</th>
      </tr></thead>
      <tbody><?php
					while ($row=mysqli_fetch_assoc($res)) 
					{
						?><tr>
              <td><?php echo $row['username'];?></td>
							<td><?php echo $row['comment']; ?></td>
              </tr>
						<?php
					}?></tbody></table></div></div><?php
			}

		?>

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
  

