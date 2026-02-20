<?php
include 'db_connection.php';

if(isset($_POST['submit']))
{
    header("Location: list_product.php");

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $image = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($temp_name, "uploads/".$image);

    $query = "INSERT INTO products (name, description, image, price, status)
              VALUES ('$name', '$description', '$image', '$price', '$status')";

    if(mysqli_query($conn, $query))
    {
        //echo "Product Added Successfully!";
    } 
    else 
    {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
<style>
body
{
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background-color: #f4f6f9;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    overflow: hidden;
}
h2 
{
    font-size: 28px;
    text-align: center;
    margin: 0 0 20px 0;  
}
form 
{
    width: 600px;
    padding: 18px 25px 35px 25px;
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}
label
{
    display: block;
    margin-top: 6px;
    margin-bottom: -10px;
    font-weight: bold;
    font-size: 18px;
}
input[type="text"],
input[type="number"],
input[type="file"],
textarea,
select
{
    width: 100%;
    font-family: Arial, Helvetica, sans-serif;
    padding: 6px;
    border-radius: 6px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    font-size: 18px;
}
textarea
{
    height: 75px;
    resize: none;
}
input[type="submit"],
button 
{
    display: block;
    margin: 18px auto 0 auto;
    padding: 8px 25px;
    background-color: black;
    color: white;
    border: 2px solid black;
    border-radius: 6px;
    font-size: 18px;
    cursor: pointer;
}
</style>
<h2>Add Product</h2>

<form method="POST" enctype="multipart/form-data">

    <label>Product Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" rows="4" cols="40" required></textarea><br><br>

    <label>Upload Image:</label><br>
    <input type="file" name="image" required><br><br>

    <label>Price:</label><br>
    <input type="number" name="price" required><br><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="Available">Available</option>
        <option value="Out of Stock">Out of Stock</option>
    </select><br><br>

    <input type="submit" name="submit" value="Add Product">

</form>

</body>
</html>
