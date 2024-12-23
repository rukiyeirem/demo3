<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "demohm"; 

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed! " . $conn->connect_error);
}

$sql = "CREATE DATABASE demohm";
if ($conn->query($sql) === TRUE) {
    echo "The database has been successfully created!";
} else {
    echo "Error: The database could not be created." . $conn->error;
}

$conn->close();
?>
