<?php
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sl = $_GET['sl'];
    $tg = $_GET['tg'];
    if ($sl >= 1) {
        //Kết nối đến CSDL
        $connect = mysqli_connect('localhost', 'root', '', 'nhom2');
        //Thực hiện câu truy vấn thêm người dùng vào bảng users
        $query = "UPDATE `cart` SET `soLuong`='$sl', `tong_gia`='$tg' WHERE `id` = '$id'";
        mysqli_query($connect, $query);
    }

    header('location:cart.php');
}
