<?php
include("db_connection.php");

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) 
{
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    if($_FILES['image']['name'] != "") 
    {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/".$image);

        mysqli_query($conn, "UPDATE products SET 
            name='$name',
            description='$description',
            price='$price',
            status='$status',
            image='$image'
            WHERE id=$id");
    } 
    else 
    {
        mysqli_query($conn, "UPDATE products SET 
            name='$name',
            description='$description',
            price='$price',
            status='$status'
            WHERE id=$id");
    }

    header("Location: list_product.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
<style>
body  
{
    margin: 0;
    padding: 40px 0;
    background-color: #f4f6f9;
    font-family: Arial, Helvetica, sans-serif;
    display: flex;
    flex-direction: column;
    align-items: center;
    overflow: hidden;
}
h2 
{
    margin-top: -20px;
    font-size: 28px;
    margin-bottom: 20px;
}
form 
{
    background: #ffffff;
    padding: 25px 40px;
    width: 680px;
    font-size: 18px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}
form 
{
    font-weight: 600;
}
input[type="text"],
input[type="number"],
input[type="file"],
textarea,
select 
{
    width: 100%;
    padding: 10px;
    margin-top: 4px;
    margin-bottom: 20px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
    box-sizing: border-box;
}
textarea 
{
    resize: none;
    height: 50px;
}
img 
{
    margin-top: 8px;
    margin-bottom: 8px;
    border-radius: 6px;
}
form img {
    display: inline-block;
    vertical-align: middle;
    margin-left: 15px;
}
input[type="file"] 
{
    display: inline-block;
    vertical-align: middle;
    width: 39%;
}
form img 
{
    margin-right: 5px;   
}
input[type="submit"] 
{
    background: #1f2d3d;
    color: white;
    border: none;
    padding: 10px 25px;
    border-radius: 6px;
    cursor: pointer;
    display: block;
    margin: 12px auto 0px;
    transition: 0.3s;
    font-size: 18px;
}
label
{
    display: block;
    margin-top: -3px;
    margin-bottom: 2px;
    font-weight: bold;
    font-size: 18px;
}
input[type="submit"]:hover 
{
    background: #000;
}
a 
{
    display: inline-block;
    margin-top: 2px;
    padding: 8px 20px;
    background: black;
    color: white;
    text-decoration: none;
    border-radius: 6px;
    font-size: 18px;
}
</style>
<h2>Edit Product</h2>

<form method="POST" enctype="multipart/form-data">

    <label>Product Name:</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>">

    <label>Description:</label>
    <textarea name="description"><?php echo $row['description']; ?></textarea>

    <label>Price:</label>
    <input type="number" step="0.01" name="price" value="<?php echo $row['price']; ?>">

    <label>Status:</label>
    <select name="status">
        <option value="Available" <?php if($row['status']=="Available") echo "selected"; ?>>Available</option>
        <option value="Out of Stock" <?php if($row['status']=="Out of Stock") echo "selected"; ?>>Out of Stock</option>
    </select>

    Current Image:
    <img src="uploads/<?php echo $row['image']; ?>" width="100">

    Update Image:
    <input type="file" name="image">

    <input type="submit" name="update" value="Update Product">

</form>

<br>
<a href="list_product.php">Back</a>

</body>
</html>