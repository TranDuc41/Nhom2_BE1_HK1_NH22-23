<?php session_start();
require "config.php";
require "models/db.php";
require "models/product.php";
$product = new Product;
$getAllProducts = $product->getAllProducts();
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
    <?php include"./views/header.php"?>

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
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">sản phẩm</th>
                                            <th class="product-price">giá</th>
                                            <th class="product-quantity">số lượng</th>
                                            <th class="product-subtotal">tổng giá</th>
                                        </tr>
                                    </thead>
                                    <?php $total = 0;
                                    ?>
                                    <?php if (isset($_SESSION['cart'])) : ?>
                                        <?php foreach ($_SESSION['cart'] as $key => $qty) : ?>
                                            <?php $getAllProducts =  $product->getAllProducts();

                                            ?>
                                            <?php foreach ($getAllProducts as $value) : ?>
                                                <?php if ($value['id'] == $key) : ?>
                                                    <tbody>
                                                       
                                                            <tr class="cart_item">
                                                                <td class="product-remove">
                                                                    <a title="Remove this item" class="remove" href="delcart.php?id=<?php echo $key ?>&type_id=<?php echo $_GET['type_id'] ?>">×</a>
                                                                </td>

                                                                <td class="product-thumbnail">
                                                                    <a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="img/<?php echo $value['pro_image'] ?>"></a>
                                                                </td>

                                                                <td class="product-name" style="max-width: 440px;">
                                                                    <a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a>
                                                                </td>

                                                                <td class="product-price">
                                                                    <span class="amount"><?php echo number_format($value['price']) ?>VND</span>
                                                                </td>

                                                                <td class="product-quantity">
                                                                    <div class="quantity buttons_added">
                                                                        <!--     <input type="button" class="minus" value="-"> -->
                                                                        <a href="subtractqty.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $_GET['type_id'] ?>"><input type="button" class="minus" value="-"></a>
                                                                        <input type="text" size="1" class="input-text qty text" title="Qty" value="<?php echo $qty ?>">
                                                                        <a href="addqty.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $_GET['type_id'] ?>"><input type="button" class="plus" value="+"></a>
                                                                        <!--    <input type="button" class="plus" value="+"> -->
                                                                    </div>
                                                                </td>

                                                                <td class="product-subtotal">
                                                                    <span class="amount"><?php echo number_format($value['price'] * $qty);
                                                                                            $total += $value['price'] * $qty; ?>VND</span>
                                                                </td>
                                                            </tr>

                                                        
                                                        
                                                    </tbody>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endforeach ?>
                                    <?php endif ?>

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











                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include"./views/footer.php"?>