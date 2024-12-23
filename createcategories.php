<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demohm"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed! " . $conn->connect_error);
}

// Tabloyu oluşturma SQL sorgusu
$sql = "CREATE TABLE IF NOT EXISTS categories (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
)";

// SQL sorgusunu çalıştır
if ($conn->query($sql) === TRUE) {
    echo "Categories table was created successfully.";
} else {
    echo "An error occurred while creating the table! " . $conn->error;
}

$conn->close();
?>