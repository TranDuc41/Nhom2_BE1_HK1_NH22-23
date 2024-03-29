<?php session_start();
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/protype.php";
$product = new Product;
$getAllProducts = $product->getAllProducts();
$protype = new Protype;
$protypes = $protype->getProtypes();
if (isset($_SESSION['name'])) {
    $getIdUser = $protype->getIdUser($mail = $_SESSION['name']);
    foreach ($getIdUser as $value) :
        //gán id người dùng vào biến
        $get = $value['id'];
    endforeach;
    $getWistlistByIds = $product->getWistlistById($id = $get);
}

?>
<?php include "./views/header.php" ?>

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Brand</h3>
                    <div class="checkbox-filter">
                        <?php
                        $product = new Product;
                        $manufactures = $product->getAllManufactures();

                        foreach ($manufactures as $value) :
                        ?>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-<?php echo $value['manu_id'] ?>">
                                <label for="brand-<?php echo $value['manu_id'] ?>">
                                    <span></span>
                                    <?php echo $value['manu_name'] ?>
                                    <!-- <small>(578)</small> -->
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Price</h3>
                    <div class="price-filter">
                        <div id="price-slider"></div>
                        <div class="input-number price-min">
                            <input id="price-min" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <span>-</span>
                        <div class="input-number price-max">
                            <input id="price-max" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">New Laptops</h3>
                    <?php
                    $product = new Product;
                    $products = $product->get3ProductsLaptop();

                    foreach ($products as $value) :
                    ?>
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="./img/<?php echo $value['pro_image'] ?>" alt="">
                            </div>
                            <div class="product-body">
                                <!-- <p class="product-category">Category</p> -->
                                <h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a></h3>
                                <h4 class="product-price"><?php echo number_format($value['price']) ?> VND
                                    <!-- <del class="product-old-price">$990.00</del> -->
                                </h4>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">

                    </div>
                </div>
                <!-- /store top filter -->
                <!-- store products -->
                <div class="row">

                    <!-- product -->
                    <?php if (isset($_GET['keyword'])) :
                        $keyword = $_GET['keyword'];
                        $search = $product->search($keyword);
                        // $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        // $total = count($search);

                        $url = $_SERVER['PHP_SELF'] . "?keyword=" . $keyword;
                        // $search = $product->search3($keyword);
                    ?>
                        <?php

                        //TÌM LIMIT VÀ CURRENT_PAGE
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $limit = 3;
                        // $getAllProducts = $product->getAllProducts();
                        // tổng số trang
                        $total_page = ceil(count($search) / $limit);

                        // Giới hạn current_page trong khoảng 1 đến total_page
                        if ($current_page > $total_page) {
                            $current_page = $total_page;
                        } else if ($current_page < 1) {
                            $current_page = 1;
                        }

                        // Tìm Start
                        $start = ($current_page - 1) * $limit;
                        $search1 = $product->search3($keyword, $start, $limit);
                        $url = $_SERVER['PHP_SELF'] . "?keyword=" . $keyword;
                        // $search = $product->search3($keyword);
                        if (count($search) == 0) {
                            echo "	<h2>Không tìm thấy sản phẩm</h2>";
                        } else
                            foreach ($search1 as $value) :
                        ?>
                            <!-- product -->
                            <div class="col-md-4 col-xs-6">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="./img/<?php echo $value['pro_image'] ?>" alt="">
                                    </div>
                                    <div class="product-body">
                                        <!-- <p class="product-category">Category</p> -->
                                        <h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a></h3>
                                        <h4 class="product-price"><?php echo number_format($value['price']) ?> VND</h4>
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
                                            <button class="quick-view"><a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a></button>
                                        </div>
                                    </div>
                                    <a href="addcart.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>">
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>ADD TO CART</button>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach;
                        ?>
                        <!-- /product -->
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <ul class="store-pagination">
                        <?php
                        require_once 'Pagination_Search.php';
                        //Khởi tạo class
                        $config = [
                            'key' => $keyword,
                            'total' => count($search),
                            'limit' => $limit,
                            'full' => false, //bỏ qua nếu không muốn hiển thị full page
                            'querystring' => 'page' //bỏ qua nếu GET của bạn là page
                        ];
                        $page = new Pagination($config);
                        //hiển thị code
                        echo $page->getPagination();
                        ?>
                    </ul>
                </div>
            <?php endif; ?>
            <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->



<?php include "./views/footer.php" ?>