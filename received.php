<?php session_start();
require "config.php";
require "models/db.php";
require "models/product.php";
require"models/protype.php";
$product = new Product;
$protype = new Protype;
$protypes = $protype->getProtypes();

//Nếu có type_id 
if (isset($_GET['type_id'])) {
    $getCartByIds = $product->getCartById($id = $_GET['type_id']);
} else {
    // $protype = new Protype;
    // $getIdUser = $protype->getIdUser($mail = $_SESSION['name']);
    // foreach ($getIdUser as $value) :
    //     //gán id người dùng vào biến
    //     $get = $value['id'];
    // endforeach;
    // $getCartByIds = $product->getCartById($id = $get);
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

<body>
    <?php $protype = new Protype;
    $getIdUser = $protype->getIdUser($mail = $_SESSION['name']);
    foreach ($getIdUser as $value) :
        //gán id người dùng vào biến
        $get = $value['id'];
    endforeach;
    $getWistlistByIds = $product->getWistlistById($id = $get);
    ?>
    <?php include "./views/header.php" ?>


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                    
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">sản phẩm</th>
                                            <th class="product-price">giá</th>
                                            <th class="product-quantity">Tinh Trang</th>
                                            <th class="product-subtotal">tổng giá</th>
                                  
                                        </tr>
                                    </thead>
                                    <?php $total = 0;
                                    ?>
                                    <?php foreach ($getCartByIds as $value) : ?>
                                        <tbody>

                                          

                                                <td class="product-thumbnail">
                                                    <a href=""><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="img/<?php echo $value['image'] ?>"></a>
                                                </td>

                                                <td class="product-name" style="max-width: 440px;">
                                                    <!-- Xử lý lấy ra id và type_id sản phẩm theo name -->
                                                    <?php $getIdAndType = $product->getIdAndType($value['name']) ?>
                                                    <?php foreach ($getIdAndType as $values) : ?>
                                                        <a href="detail.php?id=<?php echo $values['id'] ?>&type_id=<?php echo $values['type_id'] ?>"><?php echo $value['name'] ?></a>
                                                    <?php endforeach;
                                                    ?>
                                                </td>

                                                <td class="product-price">
                                                    <span class="amount"><?php echo number_format($value['price']) ?>VND</span>
                                                </td>

                                                <td class="product-quantity">
                                                    <div class="quantity buttons_added">
                                                    <?php
                                                                echo 'Hàng đã giao';
                                                            ?>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="amount"><?php echo number_format($value['price'] * $value['soLuong']);
                                                                            $total += $value['price'] * $value['soLuong']; ?>VND</span>
                                                </td>
                                                <tr>
                                                <td class="actions" colspan="6">
                                                   <div class="add-to-cart">

                                                   <div class="add-to-cart">
                                                                <button class="add-to-cart-btn"><a style="text-decoration: none;" href="repurchase.php?id=<?php echo $value['product_id'] ?>"><i class="fa fa-credit-card"></i> MUA LẠI</a></button>
                                                                 </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php endforeach; ?>

                                </table>
                            </form>
                            <div class="cart-collaterals">
                                <div class="cart_totals col-lg-offset-4">
                                    <h2>Tổng Đơn hàng</h2>

                                    <table cellspacing="0">
                                        <tbody>

                                            <tr class="shipping">
                                                <th>Vận chuyển và xử lý</th>
                                                <td>Miễn phí</td>
                                            </tr>

                                            <tr class="order-total">
                                                <th>Tổng</th>
                                                <td><strong><span class="amount"><?php echo number_format($total) ?>VND</span></strong> </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                            <hr size="5px" align="center" color=#e6e9ee />
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="products-tabs">
                                        <!-- tab -->
                                        <div id="pap1" class="tab-pane active">
                                            <div class="products-slick" data-nav="#slick-nav-1">
                                                <?php
                                                if (isset($_GET['type_id'])) :
                                                    $type_id = $_GET['type_id'];
                                                    $getAllProducts = $product->getAllProducts($type_id); ?>
                                                    <?php foreach ($getAllProducts as $value) : ?>
                                                        <!-- product -->
                                                        <div class="product">
                                                            <div class="product-img">
                                                                <img style="width=100px" src="./img/<?php echo $value['pro_image'] ?>" alt="">
                                                                <div class="product-label">
                                                                    <span class="new">BÁN CHẠY</span>
                                                                </div>
                                                            </div>
                                                            <div class="product-body">
                                                                <p class="product-category"></p>
                                                                <h3 class="product-name"><a href="detail.php?type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a></h3>
                                                                <h4 class="product-price"><?php echo number_format($value['price']) ?>VND</h4>
                                                                <div class="product-rating">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                                <div class="product-btns">
                                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                                                </div>
                                                            </div>
                                                            <a href="addcart.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>">
                                                                <div class="add-to-cart">
                                                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ</button>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <!-- /product -->
                                                    <?php endforeach ?>
                                                <?php endif ?>


                                            </div>
                                            <div id="slick-nav-1" class="products-slick-nav"></div>
                                        </div>
                                        <!-- /tab -->












                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./views/footer.php"?>
    
    