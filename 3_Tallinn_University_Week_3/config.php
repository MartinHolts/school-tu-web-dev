<?php 
$serverHost = "db";
$serverUsername = "root";
$serverPassword = "example";
$database = "myDB";

/*
// Create connection
$conn = mysqli_connect($serverHost, $serverUsername, $serverPassword);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
*/



// Create connection
$conn = new mysqli($serverHost, $serverUsername, $serverPassword);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();



$dbname = "myDB";

// Create connection
$conn = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE user_sample (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
password VARCHAR(128) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();



?>