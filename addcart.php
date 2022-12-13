<?php
session_start();

require "config.php";
require "models/db.php";
require "models/protype.php";
require "models/product.php";
require "models/cart.php";
$product = new Product;
$protype = new Protype;
$cart = new Cart;

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

        //Biến chứa giá trị kiểm tra sản phẩm có trong giỏ hàng hay chưa
        $kt = 0;

        //Lấy ra tất cả sản phẩm của người dùng hiện tại trong bảng cart
        $getAllProductById = $cart->getAllProductById($get, $id);
        foreach ($getAllProductById as $value) :
            //Nếu sản phẩm đc chọn đã tồn tại trong giỏ hàng -> $kt = 1
            if ($value['product_id'] == $id) {
                $kt = 1;
            } else {
                $kt = 0;
            }
        endforeach;
        //Nếu $kt = 1 -> tăng số lượng của sản phẩm trong giỏ hàng lên 1
        if ($kt == 1) {
            //Kết nối đến CSDL
            $connect = mysqli_connect('localhost', 'root', '', 'nhom2');
            $soLuong = $value['soLuong'] + 1;
            $gia = $value['price'] * $soLuong;
            $ids = $value['id'];
            $query = "UPDATE `cart` SET `tong_gia`= $gia, `soLuong`= $soLuong WHERE `id` = $ids";
            mysqli_query($connect, $query);
        } else {
            //Nếu sản phẩm chưa có trong giỏ hàng thì thêm sản phẩm vào
            //Lấy ra các giá trị cần thiết để thêm vào SQL
            foreach ($getAllProduct as $values) :
                //gán id người dùng vào biến
                $image = $values['pro_image'];
                $price = $values['price'];
                $name = $values['name'];
            endforeach;

            //Kết nối đến CSDL
            $connect = mysqli_connect('localhost', 'root', '', 'nhom2');
            //Thực hiện câu truy vấn thêm nội dung bảng cart
            $query1 = "INSERT INTO `cart`(`user_id`, `product_id`, `image`, `price`, `name`, `soLuong`, `tong_gia`) VALUES ('$get','$id','$image','$price','$name','1','$price')";
            mysqli_query($connect, $query1);
        }


        // if (isset($_GET['type_id'])) {
        //     $id = $_GET['id'];
        //     $type_id = $_GET['type_id'];
        //     if (isset($_SESSION['cart'][$id])) {
        //         $_SESSION['cart'][$id]++;
        //     } else {
        //         $_SESSION['cart'][$id] = 1;
        //     }
        // }
    }
}



header('location:cart.php?type_id=' . $get);
