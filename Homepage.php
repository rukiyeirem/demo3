<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demohm";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Could not connect to the database! " . $conn->connect_error);
}

$categorySql = "SELECT DISTINCT category FROM products";
$categoryResult = $conn->query($categorySql);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addProduct'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $sql = "INSERT INTO products (name, category, price, image) VALUES ('$name', '$category', '$price', '$image')";
    $conn->query($sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateProduct'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $sql = "UPDATE products SET name='$name', category='$category', price='$price', image='$image' WHERE id='$id'";
    $conn->query($sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteProduct'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM products WHERE id='$id'";
    $conn->query($sql);
}

$whereClauses = [];
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $whereClauses[] = "name LIKE '%$search%'";
}
if (isset($_GET['category']) && !empty($_GET['category'])) {
    $category = $conn->real_escape_string($_GET['category']);
    $whereClauses[] = "category = '$category'";
}
if (isset($_GET['minPrice']) && is_numeric($_GET['minPrice'])) {
    $minPrice = $_GET['minPrice'];
    $whereClauses[] = "price >= $minPrice";
}
if (isset($_GET['maxPrice']) && is_numeric($_GET['maxPrice'])) {
    $maxPrice = $_GET['maxPrice'];
    $whereClauses[] = "price <= $maxPrice";
}

$whereSql = "";
if (count($whereClauses) > 0) {
    $whereSql = "WHERE " . implode(" AND ", $whereClauses);
}

$sql = "SELECT * FROM products $whereSql";
$result = $conn->query($sql);
$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cosmetic Product Management System</title>
</head>
<style>

body {
    background-color: #f8f9fa;
    color: #333;
    font-family: 'Arial', sans-serif;
}
header {
  position: relative;
  height: 150px; 
  background-color: #fff;
}

header .logo {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%); 
  
}

header .logo img {
  max-width: 250px;
  height: auto;
}

h1 {
    color:rgb(0, 0, 0);
    margin-bottom: 30px;
    font-weight: bold;
}

nav {
      margin-top: 10px;
      margin-left: 350px;
      margin-right: 350px;
}

    nav a {
      color: #000;
      margin: 0 1em;
      text-decoration: none;
      font-weight: bold;
      padding: 0.5em 1em;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    nav a:hover {
      background-color: #ff6f99;
      color: white;
    }

.form-inline input {
    margin: 5px 10px;
    border-radius: 5px;
}

.form-inline button {
    background-color: #ff6f99;
    border: none;
    color: white;
    border-radius: 20px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-inline button:hover {
    background-color: #ff4f7f;
}

.product-card {
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    border: 2px solid #ff6f99;
    padding: 15px;
    margin: 10px;
    text-align: center;
    flex: 1 1 calc(20% - 20px);
    max-width: calc(25% - 20px);
    box-sizing: border-box;
    transition: transform 0.3s, box-shadow 0.3s;
}

.product-card:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
}

.product-card img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    margin-bottom: 15px;
}

.product-card h4 {
    color: #ff6f99;
    margin-bottom: 10px;
}

.product-card p {
    margin-bottom: 10px;
    font-size: 14px;
    color: #666;
}

.product-card .btn {
    margin: 5px 5px;
}

.product-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
}

.filter-container {
    margin-bottom: 30px;
    text-align: left;
    background-color: #ff6f99; 
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 250px; 
    position: absolute;
    left: 20px; 
    top: 100px; 
}

.filter-container h3 {
    color: white;
}

.filter-container input,
.filter-container select {
    margin: 5px;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 14px;
}

.filter-container input[type="text"],
.filter-container input[type="number"],
.filter-container select {
    background-color:rgb(255, 255, 255);
}

.filter-container button {
    background-color:: #ff6f99;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 20px;
    cursor: pointer;
    font-weight: bold;
}

.filter-container button:hover {
    background-color: #ff6f99;
}

.filter-container form {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.filter-container input[type="text"],
.filter-container input[type="number"] {
    width: 100%;
}

.filter-container select {
    width: 100%;

}
.btn {
    border-radius: 20px;
    padding: 10px 20px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
}

.btn-primary {
    background-color: #4CAF50; 
    color: white;
    border: none;
}

.btn-primary:hover {
    background-color: #45a049;
    transform: scale(1.05);
}

.btn-danger {
    background-color:rgb(243, 16, 0);
    color: white;
    border: none;
}

.btn-danger:hover {
    background-color: #e53935; 
    transform: scale(1.05);
}

.filter-container button {
    background-color:rgb(255, 255, 255);
    color: black;
    border: none;
}

.filter-container button:hover {
    background-color:rgb(0, 0, 0); 
    transform: scale(1.05);
}

.btn-info {
    background-color: #ff6f99; 
    color: white;
    border: none;
}

.btn-info:hover {
    background-color: #ff4f7f; 
    transform: scale(1.05);
}
</style>
<body>
  <header>
    <div class="logo">
      <img src="files/Sephora-Logo.png" alt="Kozmetik Logo" id="logo">
    </div>
  </header>
  
  <div class="container">
    <h1 class="text-center">Cosmetic Product Management System</h1>

    <nav>
      <a href="categories.html">Categories</a>
      <a href="about.html">About Us</a>
      <a href="contact.html">Contact</a>
    </nav>

    <div class="filter-container">
      <h3>Product Filtering</h3>
      <form method="GET">
        <input type="text" name="search" placeholder="Search Product" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
        
        <select name="category">
          <option value="">Select Category</option>
          <?php
          while ($row = $categoryResult->fetch_assoc()) {
              $categoryName = $row['category'];
              $selected = (isset($_GET['category']) && $_GET['category'] == $categoryName) ? 'selected' : '';
              echo "<option value='$categoryName' $selected>$categoryName</option>";
          }
          ?>
        </select>
        
        <input type="number" name="minPrice" placeholder="Min Price" min="0" value="<?= isset($_GET['minPrice']) ? $_GET['minPrice'] : '' ?>">
        <input type="number" name="maxPrice" placeholder="Max Price" min="0" value="<?= isset($_GET['maxPrice']) ? $_GET['maxPrice'] : '' ?>">
        <button type="submit" class="btn btn-info">Filter</button>
      </form>
    </div>

    <h3>Add Product</h3>
    <form method="POST" class="form-inline">
      <input type="text" name="name" placeholder="Product Name" class="form-control" required>
      <select name="category" class="form-control" required>
        <option value="">Select Category</option>
        <?php
        $categoryResult->data_seek(0); 
        while ($row = $categoryResult->fetch_assoc()) {
            $categoryName = $row['category'];
            echo "<option value='$categoryName'>$categoryName</option>";
        }
        ?>
      </select>
      
      <input type="number" name="price" placeholder="Price" class="form-control" required>
      <input type="text" name="image" placeholder="Image" class="form-control" required>
      <button type="submit" name="addProduct" class="btn btn-success">Add</button>
    </form>

    <h3>Product Lists</h3>
    <div class="product-container">
        <?php foreach ($products as $product): ?>
        <div class="product-card">
          <img src="<?= $product['image'] ?>" alt="Görsel">
          <h4><?= $product['name'] ?></h4>
          <p>Category: <?= $product['category'] ?></p>
          <p>Price: <?= $product['price'] ?> TL</p>
          <form method="POST" style="display:inline-block;">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">
            <input type="text" name="name" value="<?= $product['name'] ?>" required>
            <input type="text" name="category" value="<?= $product['category'] ?>" required>
            <input type="number" name="price" value="<?= $product['price'] ?>" required>
            <input type="text" name="image" value="<?= $product['image'] ?>" required>
            <button type="submit" name="updateProduct" class="btn btn-primary">Update</button>
          </form>
          <form method="POST" style="display:inline-block;">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">
            <button type="submit" name="deleteProduct" class="btn btn-danger">Delete</button>
          </form>
        </div>
        <?php endforeach; ?>
    </div>
  </div>

</body>
</html>