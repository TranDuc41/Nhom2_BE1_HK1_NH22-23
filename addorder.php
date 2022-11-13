<?php
session_start();
require "config.php";
require "models/db.php";
require "models/user.php";
require "models/product.php";

$user = new User;
$product = new Product;

if (isset($_POST['submit'])) {
    $getInfoByUsername = $user->getInfoByUsername($_SESSION['user']);
    foreach ($getInfoByUsername as $value) {
        $user_id = $value['user_id'];
    }
    $getProductById = $product->getProductById($_GET['id']);
    foreach ($getProductById as $value) {
        $pro_name = $value['name'];
        $price = $value['price'];
    }
    header('location:orders.php?status=s');
}
