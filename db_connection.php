<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "phonexa";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) 
{
    die("Database connection failed: " . mysqli_connect_error());
}
?>

<!--Create database using SQL:
CREATE DATABASE phonexa;
-->

<!--SQL to create the products table:
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    image VARCHAR(255),
    price DECIMAL(10,2),
    status ENUM('Available','Out of Stock') DEFAULT 'Available',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
); -->


