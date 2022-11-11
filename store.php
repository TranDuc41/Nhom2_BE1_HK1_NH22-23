<?php session_start();
require "config.php";
require "models/db.php";
require "models/product.php";
$product = new Product;
$getAllProducts = $product->getAllProducts();
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
					<h3 class="aside-title">Categories</h3>
					<div class="checkbox-filter">

						<div class="input-checkbox">
							<input type="checkbox" id="category-1">
							<label for="category-1">
								<span></span>
								Laptops
								<small>(120)</small>
							</label>
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="category-2">
							<label for="category-2">
								<span></span>
								Smartphones
								<small>(740)</small>
							</label>
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="category-3">
							<label for="category-3">
								<span></span>
								Cameras
								<small>(1450)</small>
							</label>
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="category-4">
							<label for="category-4">
								<span></span>
								Accessories
								<small>(578)</small>
							</label>
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="category-5">
							<label for="category-5">
								<span></span>
								Laptops
								<small>(120)</small>
							</label>
						</div>

						<div class="input-checkbox">
							<input type="checkbox" id="category-6">
							<label for="category-6">
								<span></span>
								Smartphones
								<small>(740)</small>
							</label>
						</div>
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
					<h3 class="aside-title">Brand</h3>
					<div class="checkbox-filter">
						<div class="input-checkbox">
							<input type="checkbox" id="brand-1">
							<label for="brand-1">
								<span></span>
								SAMSUNG
								<small>(578)</small>
							</label>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="brand-2">
							<label for="brand-2">
								<span></span>
								LG
								<small>(125)</small>
							</label>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="brand-3">
							<label for="brand-3">
								<span></span>
								SONY
								<small>(755)</small>
							</label>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="brand-4">
							<label for="brand-4">
								<span></span>
								SAMSUNG
								<small>(578)</small>
							</label>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="brand-5">
							<label for="brand-5">
								<span></span>
								LG
								<small>(125)</small>
							</label>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="brand-6">
							<label for="brand-6">
								<span></span>
								SONY
								<small>(755)</small>
							</label>
						</div>
					</div>
				</div>
				<!-- /aside Widget -->

				<!-- aside Widget -->
				<div class="aside">
					<h3 class="aside-title">Top selling</h3>
					<div class="product-widget">
						<div class="product-img">
							<img src="./img/product01.png" alt="">
						</div>
						<div class="product-body">
							<p class="product-category">Category</p>
							<h3 class="product-name"><a href="#">product name goes here</a></h3>
							<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
						</div>
					</div>

					<div class="product-widget">
						<div class="product-img">
							<img src="./img/product02.png" alt="">
						</div>
						<div class="product-body">
							<p class="product-category">Category</p>
							<h3 class="product-name"><a href="#">product name goes here</a></h3>
							<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
						</div>
					</div>

					<div class="product-widget">
						<div class="product-img">
							<img src="./img/product03.png" alt="">
						</div>
						<div class="product-body">
							<p class="product-category">Category</p>
							<h3 class="product-name"><a href="#">product name goes here</a></h3>
							<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
						</div>
					</div>
				</div>
				<!-- /aside Widget -->
			</div>
			<!-- /ASIDE -->

			<!-- STORE -->
			<div id="store" class="col-md-9">
				<!-- store top filter -->
				<div class="store-filter clearfix">
					<div class="store-sort">
						<label>
							Sort By:
							<select class="input-select">
								<option value="0">Popular</option>
								<option value="1">Position</option>
							</select>
						</label>

						<label>
							Show:
							<select class="input-select">
								<option value="0">20</option>
								<option value="1">50</option>
							</select>
						</label>
					</div>
					<ul class="store-grid">
						<li class="active"><i class="fa fa-th"></i></li>
						<li><a href="#"><i class="fa fa-th-list"></i></a></li>
					</ul>
				</div>
				<!-- /store top filter -->

				<!-- store products -->
				<div class="row">

				</div>
				<!-- product -->
				<?php

				//TÌM LIMIT VÀ CURRENT_PAGE
				$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
				$limit = 6;
				$getAllProducts = $product->getAllProducts();
				// tổng số trang
				$total_page = ceil(count($getAllProducts) / $limit);

				// Giới hạn current_page trong khoảng 1 đến total_page
				if ($current_page > $total_page) {
					$current_page = $total_page;
				} else if ($current_page < 1) {
					$current_page = 1;
				}

				// Tìm Start
				$start = ($current_page - 1) * $limit;

				// Có limit và start truy vấn CSDL lấy danh sách sân phẩm
				$getProducts = $product->getProducts($start, $limit);

				foreach ($getProducts as $value) : ?>
					<div class="col-md-4 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="./img/<?php echo $value['pro_image'] ?>" alt="">
								<div class="product-label">
									<!-- <span class="sale">-30%</span> -->
									<!-- <span class="new">NEW</span> -->
								</div>
							</div>
							<div class="product-body">
								<!-- <p class="product-category">Category</p> -->
								<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a></h3>
								<h4 class="product-price"><?php echo number_format($value['price']) ?>VND
									<!-- <del class="product-old-price">$990.00</del> -->
								</h4>
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
				<?php endforeach; ?>

				<ul class="store-pagination">
					<?php
					require_once 'Pagination.php';
					//Khởi tạo class
					$config = [
						'total' => count($getAllProducts),
						'limit' => $limit,
						'full' => false, //bỏ qua nếu không muốn hiển thị full page
						'querystring' => 'page' //bỏ qua nếu GET của bạn là page
					];
					$page = new Pagination($config);
					//hiển thị code
					echo $page->getPagination();
					?>
				</ul>
				<!-- /product -->
			</div>
			<!-- /store products -->
		</div>
		<!-- /STORE -->
	</div>
	<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /SECTION -->

<?php include "./views/footer.php" ?>