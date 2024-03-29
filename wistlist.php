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
    $getWistlistByIds = $product->getWistlistById($id = $_GET['type_id']);
} else {
    $protype = new Protype;
    $getIdUser = $protype->getIdUser($mail = $_SESSION['name']);
    foreach ($getIdUser as $value) :
        //gán id người dùng vào biến
        $get = $value['id'];
    endforeach;
    $getWistlistByIds = $product->getWistlistById($id = $get);
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
                                    <h3>SẢN PHẨM YÊU THÍCH</h3>
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">sản phẩm</th>
                                            <th class="product-price">giá</th>
                                            <th class="product-action">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <?php $total = 0;
                                    ?>
                                    <?php foreach ($getWistlistByIds as $value) : ?>
                                        <tbody>

                                            <tr class="cart_item">
                                                <td class="product-remove">
                                                    <a title="Remove this item" class="remove" href="delwistlist.php?id=<?php echo $value['id'] ?>">×</a>
                                                </td>

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
                                                <td class="actions" colspan="6">

                                                    <div class="add-to-cart">
                                                        <button class="add-to-cart-btn"><a style="text-decoration: none;" href="detail.php?id=<?php echo $values['id'] ?>&type_id=<?php echo $values['type_id'] ?>"> Xem chi tiết</a></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php endforeach; ?>

                                </table>
                            </form>
                            <hr size="5px" align="center" color=#e6e9ee />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "./views/footer.php" ?>