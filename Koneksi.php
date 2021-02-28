<?php
	$host = "localhost";
	$dbname = "rismashop";
	$user = "root";
	$pass = "";

	try{
		$koneksi = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>