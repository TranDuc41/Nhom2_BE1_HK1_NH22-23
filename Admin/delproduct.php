<?php session_start();
require "../config.php";
require "../models/db.php";
require "../models/user.php";
require "../models/product.php";
$user = new User;
$products = new Product;
    if(isset($_GET['id'])){
        $products -> deleteProduct($_GET['id']); 
        header('location: table-data-product.php');      
    }
?>