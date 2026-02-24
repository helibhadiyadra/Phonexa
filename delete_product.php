<?php
include 'db_connection.php';

$id = ($_GET['id']);   

$result = mysqli_query($conn, "SELECT image FROM products WHERE id = $id");
$row = mysqli_fetch_assoc($result);

if ($row) 
{
    $image_path = "uploads/" . $row['image'];

    if (!empty($row['image']) && file_exists($image_path)) 
    {
        unlink($image_path);
    }

    $query = "DELETE FROM products WHERE id = $id";
    mysqli_query($conn, $query);
}

header("Location: list_product.php");
exit();
?>