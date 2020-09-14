<?php
if(isset($_GET['vkey'])){
	
	$vkey = $_GET['vkey'];

	$mysqli=NEW MYSQLi('localhost','root','','library');

	$resultSet = $mysqli->query("SELECT verified,vkey FROM student WHERE verified = 0 AND vkey='$vkey LIMIT 1");

	if($resultSet->num_rows == 1) {
		
		$update = $mysqli->query("UPDATE STUDENT SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");

		if($update) {
			echo "Your account has been verified. You may now login.";
		}
	}else{
		echo "This account invalid or already verified";
	}

}else{
	die("something went wrong");
}
?>
<html>
<head>
<link href="style.css"rel="stylesheet" type="text/css"/>
</head>

<body>
</center>
</body>
</html>