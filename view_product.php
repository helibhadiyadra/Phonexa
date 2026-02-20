<?php
include 'db_connection.php';

$id = $_GET['id'];

$query = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Product</title>
</head>
<body>
<style>
body 
{
    margin: 0;
    padding: 40px 0;
    font-family: Arial, Helvetica, sans-serif;
    background-color: #f4f6f9;
    display: flex;
    flex-direction: column;
    align-items: center; 
}
h2 
{
    margin-top: -8px;
    margin-bottom: 20px;
    font-size: 28px;
    text-align: center;
}
p 
{
    width: 40%;
    margin: 8px auto;  
    background: #ffffff;
    padding: 12px 20px;
    border-radius: 10px;
    font-size: 17px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}
strong 
{
    display: inline-block;
    width: 100px;
}
img 
{
    margin-top: 10px;
    border-radius: 8px;
    display: block;
}
a 
{
    display: inline-block;
    margin: 5px auto -18px;   
    padding: 8px 20px;
    background: #000000;
    color: white;
    font-size: 20px;
    text-decoration: none;
    border-radius: 5px;
    transition: 0.3s;
}
</style>
<h2>View Product</h2>

<p><strong>ID:</strong> <?php echo $row['id']; ?></p>
<p><strong>Name:</strong> <?php echo $row['name']; ?></p>
<p><strong>Description:</strong> <?php echo $row['description']; ?></p>
<p><strong>Price:</strong> <?php echo $row['price']; ?></p>
<p><strong>Status:</strong> <?php echo $row['status']; ?></p>
<p><strong>Image:</strong><br>
    <img src="uploads/<?php echo $row['image']; ?>" width="150">
</p>

<br>
<a href="list_product.php">Back</a>

</body>
</html>
