<?php
    $dsn = 'mysql:host=localhost;dbname=sr_bigotes';
	$user = 'root';
	$pass = '';
	$option = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
	);
	try
	{
		$con = new PDO($dsn,$user,$pass,$option);
		$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
	}
	catch(PDOException $ex)
	{
		echo "Fallo la conexion con la base de datos ".$ex->getMessage();
		die();
	}
?>