<?php
//database_connection.php

$connect = new PDO("mysql:host=localhost;dbname=library", "root", "");

//session_start();

$_SESSION["user_id"] = "1";

?>