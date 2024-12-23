<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demohm"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed! " . $conn->connect_error);
}


$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL
)";


if ($conn->query($sql) === TRUE) {
    echo "The Products table has been created successfully.";
} else {
    echo "An error occurred while creating the table" . $conn->error;
}

$conn->close();
?>
