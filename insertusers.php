<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demohm";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed! " . $conn->connect_error);
}

$sql = "INSERT INTO users (email, password) VALUES ('rukiyeiremdogan@gmail.com', 'password123') , ('elifceylan@gmail.com' , 'password123') , ('sudenursaglam@gmail.com' , 'password123')";

if ($conn->query($sql) === TRUE) {
    echo "User added successfully!";
} else {
    echo "Addition error! " . $conn->error;
}

$conn->close();
?>
