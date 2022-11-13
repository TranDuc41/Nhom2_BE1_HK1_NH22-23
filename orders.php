<?php session_start();
require "config.php";
require "models/db.php";
require "models/product.php";
$product = new Product;
$getAllProducts = $product->getAllProducts();?>
<?php include"./views/header.php"?>
<?php
if(isset($_GET['status'])){
    if ($_GET['status']=='sd') {
        echo "<script> alert('Hủy đơn hàng thành công'); </script>";
        echo '<script>window.history.pushState({}, document.title, "/" + "Nhom2_BE1_HK1_NH22-23/orders.php");</script>';
    }
    if($_GET['status']=='s'){
        echo "<script> alert('Đặt hàng thành công'); </script>";
        echo '<script>window.history.pushState({}, document.title, "/" + "Nhom2_BE1_HK1_NH22-23/orders.php");</script>';
    }
    if($_GET['status']=='sr'){
        echo "<script> alert('Nhận hàng thành công'); </script>";
        echo '<script>window.history.pushState({}, document.title, "/" + "Nhom2_BE1_HK1_NH22-23/orders.php");</script>';
    }
}
?>

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="css/font-awesome.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/style1.css">
<link rel="stylesheet" href="css/responsive.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>



   
    <?php include"./views/footer.php"?>