<?php session_start(); ?>
<?php      
    require "../../config.php";
    require "../../models/db.php";
    require "../../models/product.php";

    $full_name = $_POST['full_name'];  
    $mail = $_POST['mail'];  
    $password = $_POST['pass'];
    
    $check = 0; //giá trị dùng kiểm tra mail tồn tại hay không.

    $product = new Product;
    $products = $product->getAllUsers($mail);
    foreach($products as $value):
        //Nếu mail người dùng nhập đã tồn tại thì gán giá trị $check = 1 và thoát vòng lặp
        if($value['mail'] == $mail){  
            $check = 1;
            break;
        }

    endforeach;

    //Nếu mail tồn tại thì hiển thị thông báo
    if($check == 1){
        ?>
        <Style>h4 {
                color: red;
            }
            body {
                display: flex;
                background-image: linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%);
            }
            form.signup {
                margin: auto;
                border-radius: 10px;
                border: 1px solid #fff;
                width: 26%;
                text-align: center;
                box-shadow: 0px 15px 20px rgb(0 0 0 / 10%);
                background: #fff;
            }
            .field.btn {
                margin-bottom: 20px;
            }
            input[type="submit"] {
                background: #FBAB7E;
                border: none;
                padding: 10px 10px;
                width: 86px;
                border-radius: 5px;
            }
            </Style>
            <form action="../../login.php" class="signup">
            <div class="field">
               <h4>Mail đã tồn tại !</h4>
            </div>
            <div class="field btn">
                <div class="btn-layer"></div>
                <input type="submit"  value=" Thử Lại">
             </div>
         </form>'
        <?php

        //Nếu mail chưa tồn taại thì thực hiện thêm người dùng vào SQL và thực hiện đăng nhập.
    }if($check == 0){

        //Kết nối đến CSDL
        $connect = mysqli_connect('localhost', 'root', '', 'nhom2');
        //Thực hiện câu truy vấn thêm người dùng vào bảng users
        $query = "INSERT INTO `users`(`id`, `mail`, `user_name`, `password`, `role`, `date_create`) VALUES ('','$mail','$full_name','$password','user',current_timestamp())";
        mysqli_query ($connect ,$query);

        // Lưu Session
        $_SESSION['name'] = $mail;
        //Chuyển hướng đến trang chủ
        header("Location: /Nhom2_BE1_HK1_NH22-23/index.php");
    }
    ?> 
    