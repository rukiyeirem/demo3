<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demohm"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed! " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

 
if ($conn->query($sql) === TRUE) {
    echo "The users table has been successfully created!";
} else {
    echo "Table creation error !" . $conn->error;
}

$conn->close();
?>
