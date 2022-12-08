<?php 

	require("../config.php");
	
	// see fail peab olema siis seotud kõigiga kus
	// tahame sessiooni kasutada
	// saab kasutada nüüd $_SESSION muutujat
	session_start();
	
	/*
	$serverHost = "db";
	$serverUsername = "root";
	$serverPassword = "example";
	$database = "myDB";
	*/

	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	
?>