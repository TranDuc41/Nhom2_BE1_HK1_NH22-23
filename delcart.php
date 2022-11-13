<?php
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //Kết nối đến CSDL
    $connect = mysqli_connect('localhost', 'root', '', 'nhom2');
    //Thực hiện câu truy vấn thêm người dùng vào bảng users
    $query = "DELETE FROM `cart` WHERE id = '$id'";
    mysqli_query($connect, $query);
}
header('location:cart.php');
