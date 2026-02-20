<?php
include 'db_connection.php';

$id = $_GET['id'];

$query = "DELETE FROM products WHERE id = $id";

if(mysqli_query($conn, $query)){
    header("Location: list_product.php");
}
?>
