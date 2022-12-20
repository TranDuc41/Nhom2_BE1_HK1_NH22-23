<?php session_start();
require "../config.php";
require "../models/db.php";
require "../models/product.php";
$product = new Product;
//xu ly them:
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $manu_id = $_POST['manu'];
    $type_id = $_POST['type'];
    $price = $_POST['price'];
    $pro_image = $_FILES['image']['name'];
    $description = $_POST['description'];
    $feature = $_POST['feature'];
    $so_luong = $_POST['so_luong'];

    $product -> addProduct($name,$manu_id,$type_id,$price,$pro_image,$description,$feature,$so_luong); 
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
   
}
header('location:table-data-product.php');
?>
