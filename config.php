<?php 
	$GLOBALS["serverHost"] = "db";
	$GLOBALS["serverUsername"] = "root";
	$GLOBALS["serverPassword"] = "example";
	$GLOBALS["database"] = "myDB";

	// Create connection.
	$conn = new mysqli($serverHost, $serverUsername, $serverPassword);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Create database.
	$sql = "CREATE DATABASE IF NOT EXISTS myDB";

	// Check if successfully created database.
	if ($conn->query($sql) === TRUE) {
		// echo "Database created successfully" . "<br>";
	} else {
		echo "Error creating database: " . $conn->error . "<br>";
	}

	// Close connection.
	$conn->close();

	// Create connection again to select the created database.
	$conn = new mysqli($serverHost, $serverUsername, $serverPassword, $database);

	// Check connection.
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// USER_SAMPLE
	// Sql to create table user_sample.
	$sql = "CREATE TABLE IF NOT EXISTS user_sample (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		email VARCHAR(50) NOT NULL,
		password VARCHAR(128) NOT NULL,
		created boolean
	)";

	// Check if successfully created table user_sample.
	if ($conn->query($sql) === TRUE) {
		// echo "Table MyGuests created successfully" . "<br>";
	} else {
		echo "Error creating table: " . $conn->error . "<br>";
	}
	
	// WHISTLE
	// Sql to create table whistle.
	$sql = "CREATE TABLE IF NOT EXISTS whistle (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		age INT(50) NOT NULL,
		color VARCHAR(128) NOT NULL
	)";

	// Check if successfully created table whistle.
	if ($conn->query($sql) === TRUE) {
		// echo "Table MyGuests created successfully" . "<br>";
	} else {
		echo "Error creating table: " . $conn->error . "<br>";
	}

	//INTERESTS
	// Sql to create table interests.
	$sql = "CREATE TABLE IF NOT EXISTS interests (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		interest VARCHAR(128) NOT NULL
	)";

	// Check if successfully created table interests.
	if ($conn->query($sql) === TRUE) {
		// echo "Table MyGuests created successfully" . "<br>";
	} else {
		echo "Error creating table: " . $conn->error . "<br>";
	}
	
	//USER_INTERESTS_4
	// Sql to create table user_interests_4.
	$sql = "CREATE TABLE IF NOT EXISTS user_interests_4 (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		user_id INT(50) NOT NULL,
		interest_id INT(50) NOT NULL
	)";

	// Check if successfully created table user_interests_4.
	if ($conn->query($sql) === TRUE) {
		// echo "Table MyGuests created successfully" . "<br>";
	} else {
		echo "Error creating table: " . $conn->error . "<br>";
	}

	// Close connection.
	$conn->close();
?>