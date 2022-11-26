<?php
session_start();

require "config.php";
require "models/db.php";
require "models/protype.php";
require "models/product.php";
$product = new Product;
$protype = new Protype;
$getIdUser = $protype->getIdUser($mail = $_SESSION['name']);
$getAllProduct = $product->getProductById($id = $_GET['id']);

//Khi người dùng đã đăng nhập
if (isset($_SESSION['name'])) {
    if (isset($_GET['id'])) {

        //Sau khi có mail người dùng và id của sản phẩm
        //Từ mail sẽ lấy ra đc id người dùng
        foreach ($getIdUser as $value) :
            //gán id người dùng vào biến
            $get = $value['id'];
        endforeach;
        //gán id sản phẩm vào biến
        $id = $_GET['id'];

        //Lấy ra các giá trị cần thiết để thêm vào SQL
        foreach ($getAllProduct as $value) :
            //gán id người dùng vào biến
            $image = $value['pro_image'];
            $price = $value['price'];
            $name = $value['name'];
        endforeach;

        //Kết nối đến CSDL
        $connect = mysqli_connect('localhost', 'root', '', 'nhom2');
        //Thực hiện câu truy vấn thêm nội dung bảng cart
        $query = "INSERT INTO `wistlist`(`user_id`, `product_id`, `image`, `price`, `name`) VALUES ('$get','$id','$image','$price','$name')";
        mysqli_query($connect, $query);
    }
}



header('location:wistlist.php?type_id=' . $get);
