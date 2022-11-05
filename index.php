<?php session_start();
require "config.php";
require "models/db.php";
require "models/product.php";
$product = new Product;
$getAllProducts = $product->getAllProducts();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Electro - HTML Ecommerce Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
					<li><a href="#"><i class="fa fa-envelope-o"></i> Demo@email.com</a></li>
					<li><a href="#"><i class="fa fa-map-marker"></i> Cao Đẳng Công Nghệ Thủ Đức</a></li>
				</ul>
				<ul class="header-links pull-right">
					<!-- <li><a href="#"><i class="fa fa-dollar"></i> VND</a></li> -->
					<?php
					// Hiển thị thông tin lưu trong Session
					// phải kiểm tra có tồn tại không trước khi hiển thị nó ra
					if (isset($_SESSION['name'])) {
						echo '<li><a href="./logout.php">Đăng xuất</a></li>';
					} else {
						echo '<li><a href="./login.php">Đăng nhập</a></li>';
					}

					?>
				</ul>
			</div>
		</div>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="index.php" class="logo">
								<img src="./img/logo.png" alt="">
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header-search">
							<form action="" method="POST">
								<select class="input-select">
									<option value="0">All Categories</option>
									<option value="1">Category 01</option>
									<option value="1">Category 02</option>
								</select>
								<input class="input" placeholder="Search here">
								<button class="search-btn">Search</button>
							</form>
						</div>
					</div>
					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							<!-- Wishlist -->
							<div>
								<a href="#">
									<i class="fa fa-heart-o"></i>
									<span>Your wistlist</span>
									<div class="qty">0</div>
								</a>
							</div>
							<!-- /Wishlist -->

							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<span>Your cart</span>
									<?php
									$temp = 0;
									if (isset($_SESSION['cart'])) {
										foreach ($_SESSION['cart'] as $value) {
											$temp += 1;
										}
									}
									?>
									<div class="qty"><?php echo $temp; ?></div>
								</a>
								<div class="cart-dropdown">
									<div class="cart-list"><?php $totalPrice = 0;
															$totalProduct = 0; ?>
										<?php if (isset($_SESSION['cart'])) :

											foreach ($_SESSION['cart'] as $key => $qty) :
												$getAllProducts =  $product->getAllProducts();
												foreach ($getAllProducts as $value) :
													if ($value['id'] == $key) : ?>
														<?php $totalPrice += $value['price'] * $qty;
														$totalProduct += 1;
														?>
														<div class="product-widget">
															<div class="product-img">
																<img src="./img/<?php echo $value['pro_image'] ?>" alt="">
															</div>
															<div class="product-body">
																<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a></h3>
																<h4 class="product-price"><span class="qty"><?php echo $qty ?>x</span><?php echo number_format($value['price']) ?>VND</h4>
															</div>
															<a href="delcart1.php?id=<?php echo $value['id'] ?>"><button class="delete"><i class="fa fa-close"></i></button></a>
														</div>
													<?php endif ?>
												<?php endforeach ?>
											<?php endforeach ?>
										<?php endif ?>
									</div>
									<div class="cart-summary">
										<small><?php echo $totalProduct ?> Sản phẩm</small>
										<h5>SUBTOTAL: <?php echo number_format($totalPrice) ?></h5>
									</div>
									<div class="cart-btns">
										<a href="cart.php?type_id=1">View Cart</a>
										<a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
							</div>

							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<nav id="navigation">
		<!-- container -->
		<div class="container">
			<!-- responsive-nav -->
			<div id="responsive-nav">
				<!-- NAV -->
				<ul class="main-nav nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">Hot Deals</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Laptops</a></li>
					<li><a href="#">Smartphones</a></li>
					<li><a href="#">Cameras</a></li>
					<li><a href="#">Accessories</a></li>
				</ul>
				<!-- /NAV -->
			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>
	<!-- /NAVIGATION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img">
							<img src="./img/shop01.png" alt="">
						</div>
						<div class="shop-body">
							<h3>Laptop<br>Collection</h3>
							<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- /shop -->

				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img">
							<img src="./img/shop03.png" alt="">
						</div>
						<div class="shop-body">
							<h3>Accessories<br>Collection</h3>
							<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- /shop -->

				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img">
							<img src="./img/shop02.png" alt="">
						</div>
						<div class="shop-body">
							<h3>Cameras<br>Collection</h3>
							<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- /shop -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">New Products</h3>

					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab1" class="tab-pane active">
								<div class="products-slick" data-nav="#slick-nav-1">
									<?php
									$type_id = 1;
									$get20NewProducts = $product->get20NewProducts($type_id); ?>
									<?php foreach ($get20NewProducts as $value) : ?>
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img style="width=100px" src="./img/<?php echo $value['pro_image'] ?>" alt="">
												<div class="product-label">
													<span class="new">MỚI</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"></p>
												<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a></h3>
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
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>ADD TO CART</button>
												</div>
											</a>
										</div>
										<!-- /product -->
										
									<?php endforeach ?>
								</div>
								<div id="slick-nav-1" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- /Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- HOT DEAL SECTION -->
	<div id="hot-deal" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="hot-deal">
						<ul class="hot-deal-countdown">
							<li>
								<div>
									<h3>02</h3>
									<span>Days</span>
								</div>
							</li>
							<li>
								<div>
									<h3>10</h3>
									<span>Hours</span>
								</div>
							</li>
							<li>
								<div>
									<h3>34</h3>
									<span>Mins</span>
								</div>
							</li>
							<li>
								<div>
									<h3>60</h3>
									<span>Secs</span>
								</div>
							</li>
						</ul>
						<h2 class="text-uppercase">hot deal this week</h2>
						<p>New Collection Up to 50% OFF</p>
						<a class="primary-btn cta-btn" href="#">Shop now</a>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOT DEAL SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Top selling</h3>
						<div class="section-nav">
							<ul class="section-tab-nav tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab2">Smartphones</a></li>
								<li><a data-toggle="tab" href="#tab2">Laptops</a></li>
								<li><a data-toggle="tab" href="#tab2">Bluetooth Peaker</a></li>
								<li><a data-toggle="tab" href="#tab2">Smart Watches</a></li>
								<li><a data-toggle="tab" href="#tab5">Bluetooth Earbuds</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<!-- tab1 -->
							<div id="tab1" class="tab-pane fade in active">
								<div class="products-slick" data-nav="#slick-nav-2">
									<?php
									$getAllProtypes = $product->getAllProtypes(1); ?>
									<?php foreach ($getAllProtypes as $value) : ?>
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img style="width=100px" src="./img/<?php echo $value['pro_image'] ?>" alt="">
												<div class="product-label">

												</div>
											</div>
											<div class="product-body">
												<p class="product-category"></p>
												<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a></h3>
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
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>ADD TO CART</button>
												</div>
											</a>
										</div>
										<!-- /product -->
									<?php endforeach ?>

									<!-- /product -->

								</div>
								<div id="slick-nav-2" class="products-slick-nav"></div>
							</div>
							<!-- /tab1 -->

							<!-- tab2 -->
							<div id="tab2" class="tab-pane fade">
								<div class="products-slick" data-nav="#slick-nav-3">
									<?php
									$getAllProtypes = $product->getAllProtypes(2); ?>
									<?php foreach ($getAllProtypes as $value) : ?>
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img style="width=100px" src="./img/<?php echo $value['pro_image'] ?>" alt="">
												<div class="product-label">

												</div>
											</div>
											<div class="product-body">
												<p class="product-category"></p>
												<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a></h3>
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
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>ADD TO CART</button>
												</div>
											</a>
										</div>
										<!-- /product -->
									<?php endforeach ?>

									<!-- /product -->

								</div>
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
							<!-- /tab2 -->

							<!-- tab3 -->
							<div id="tab3" class="tab-pane fade">
								<div class="products-slick" data-nav="#slick-nav-4">
									<?php
									$getAllProtypes = $product->getAllProtypes(3); ?>
									<?php foreach ($getAllProtypes as $value) : ?>
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img style="width=100px" src="./img/<?php echo $value['pro_image'] ?>" alt="">
												<div class="product-label">

												</div>
											</div>
											<div class="product-body">
												<p class="product-category"></p>
												<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a></h3>
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
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>ADD TO CART</button>
												</div>
											</a>
										</div>
										<!-- /product -->
									<?php endforeach ?>

									<!-- /product -->

								</div>
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
							<!-- /tab3 -->

							<!-- tab4 -->
							<div id="tab4" class="tab-pane fade">
								<div class="products-slick" data-nav="#slick-nav-5">
									<?php
									$getAllProtypes = $product->getAllProtypes(4); ?>
									<?php foreach ($getAllProtypes as $value) : ?>
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img style="width=100px" src="./img/<?php echo $value['pro_image'] ?>" alt="">
												<div class="product-label">

												</div>
											</div>
											<div class="product-body">
												<p class="product-category"></p>
												<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a></h3>
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
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>ADD TO CART</button>
												</div>
											</a>
										</div>
										<!-- /product -->
									<?php endforeach ?>

									<!-- /product -->
								</div>
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
							<!-- /tab4 -->

							<!-- tab5 -->
							<div id="tab5" class="tab-pane fade">
								<div class="products-slick" data-nav="#slick-nav-6">
									<?php
									$getAllProtypes = $product->getAllProtypes(5); ?>
									<?php foreach ($getAllProtypes as $value) : ?>
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img style="width=100px" src="./img/<?php echo $value['pro_image'] ?>" alt="">
												<div class="product-label">

												</div>
											</div>
											<div class="product-body">
												<p class="product-category"></p>
												<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a></h3>
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
													<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>ADD TO CART</button>
												</div>
											</a>
										</div>
										<!-- /product -->
									<?php endforeach ?>

									<!-- /product -->
								</div>
								<div id="slick-nav-6" class="products-slick-nav"></div>
							</div>
							<!-- /tab5 -->
						</div>
					</div>
				</div>
				<!-- /Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title">điện thoại</h4>
						<div class="section-nav">
							<div id="slick-nav-3" class="products-slick-nav"></div>
						</div>
					</div>

					<div class="products-widget-slick" data-nav="#slick-nav-3">
						<div>
							<!-- product widget -->
							<?php

							$product = new Product;
							$products = $product->get3ProductsPhone();

							foreach ($products as $value) :
							?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['pro_image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category"></p>
										<h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price']) ?> VND</h4>
									</div>
								</div>
							<?php endforeach; ?>
							<!-- /product widget -->
						</div>

						<div>
							<!-- product widget -->
							<?php
							$product = new Product;
							$products = $product->getProductsPhone();

							foreach ($products as $value) :
							?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['pro_image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category"></p>
										<h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price']) ?> VND</h4>
									</div>
								</div>
							<?php endforeach; ?>
							<!-- /product widget -->
						</div>
					</div>
				</div>

				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title">Laptops</h4>
						<div class="section-nav">
							<div id="slick-nav-4" class="products-slick-nav"></div>
						</div>
					</div>

					<div class="products-widget-slick" data-nav="#slick-nav-4">
						<div>
							<!-- product widget -->
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
										<p class="product-category"></p>
										<h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price']) ?> VND</del></h4>
									</div>
								</div>
							<?php endforeach; ?>
							<!-- /product widget -->
						</div>

						<div>
							<!-- product widget -->
							<?php
							$product = new Product;
							$products = $product->getProductsLaptop();

							foreach ($products as $value) :
							?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['pro_image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category"></p>
										<h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price']) ?> VND</del></h4>
									</div>
								</div>
							<?php endforeach; ?>
							<!-- /product widget -->
						</div>
					</div>
				</div>

				<div class="clearfix visible-sm visible-xs"></div>

				<div class="col-md-4 col-xs-6">
					<div class="section-title">
						<h4 class="title">Đồng Hồ</h4>
						<div class="section-nav">
							<div id="slick-nav-5" class="products-slick-nav"></div>
						</div>
					</div>

					<div class="products-widget-slick" data-nav="#slick-nav-5">
						<div>
							<!-- product widget -->
							<?php
							$product = new Product;
							$products = $product->get3ProductsWatch();

							foreach ($products as $value) :
							?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['pro_image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category"></p>
										<h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price']) ?> VND</del></h4>
									</div>
								</div>
							<?php endforeach; ?>
							<!-- /product widget -->
						</div>

						<div>
							<!-- product widget -->
							<?php
							$product = new Product;
							$products = $product->getProductsWatch();

							foreach ($products as $value) :
							?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['pro_image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category"></p>
										<h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price']) ?> VND</del></h4>
									</div>
								</div>
							<?php endforeach; ?>
							<!-- /product widget -->
						</div>
					</div>
				</div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- NEWSLETTER -->
	<div id="newsletter" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="newsletter">
						<p>Sign Up for the <strong>NEWSLETTER</strong></p>
						<form>
							<input class="input" type="email" placeholder="Enter Your Email">
							<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
						</form>
						<ul class="newsletter-follow">
							<li>
								<a href="#"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-instagram"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-pinterest"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /NEWSLETTER -->

	<!-- FOOTER -->
	<footer id="footer">
		<!-- top footer -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">About Us</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
							<ul class="footer-links">
								<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
								<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
								<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Categories</h3>
							<ul class="footer-links">
								<li><a href="#">Hot deals</a></li>
								<li><a href="#">Laptops</a></li>
								<li><a href="#">Smartphones</a></li>
								<li><a href="#">Cameras</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>
						</div>
					</div>

					<div class="clearfix visible-xs"></div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Information</h3>
							<ul class="footer-links">
								<li><a href="#">About Us</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Orders and Returns</a></li>
								<li><a href="#">Terms & Conditions</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Service</h3>
							<ul class="footer-links">
								<li><a href="#">My Account</a></li>
								<li><a href="#">View Cart</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Track My Order</a></li>
								<li><a href="#">Help</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /top footer -->

		<!-- bottom footer -->
		<div id="bottom-footer" class="section">
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12 text-center">
						<ul class="footer-payments">
							<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
							<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
						</ul>
						<span class="copyright">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</span>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bottom footer -->
	</footer>
	<!-- /FOOTER -->

<<<<<<< HEAD
	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
=======
							<!-- HOT DEAL SECTION -->
							<div id="hot-deal" class="section">
								<!-- container -->
								<div class="container">
									<!-- row -->
									<div class="row">
										<div class="col-md-12">
											<div class="hot-deal">
												<ul class="hot-deal-countdown">
													<li>
														<div>
															<h3>02</h3>
															<span>Days</span>
														</div>
													</li>
													<li>
														<div>
															<h3>10</h3>
															<span>Hours</span>
														</div>
													</li>
													<li>
														<div>
															<h3>34</h3>
															<span>Mins</span>
														</div>
													</li>
													<li>
														<div>
															<h3>60</h3>
															<span>Secs</span>
														</div>
													</li>
												</ul>
												<h2 class="text-uppercase">hot deal this week</h2>
												<p>New Collection Up to 50% OFF</p>
												<a class="primary-btn cta-btn" href="#">Shop now</a>
											</div>
										</div>
									</div>
									<!-- /row -->
								</div>
								<!-- /container -->
							</div>
							<!-- /HOT DEAL SECTION -->

							<!-- SECTION -->
							<div class="section">
								<!-- container -->
								<div class="container">
									<!-- row -->
									<div class="row">

										<!-- section title -->
										<div class="col-md-12">
											<div class="section-title">
												<h3 class="title">Top selling</h3>
												<div class="section-nav">
													<ul class="section-tab-nav tab-nav">
														<li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
														<li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
														<li><a data-toggle="tab" href="#tab2">Cameras</a></li>
														<li><a data-toggle="tab" href="#tab2">Accessories</a></li>
													</ul>
												</div>
											</div>
										</div>
										<!-- /section title -->

										<!-- Products tab & slick -->
										<div class="col-md-12">
											<div class="row">
												<div class="products-tabs">
													<!-- tab -->
													<div id="tab2" class="tab-pane fade in active">
														<div class="products-slick" data-nav="#slick-nav-2">
															<!-- product -->
															<?php
																$getAllProducts = $product->get20Products();
															?>
															<?php foreach($getAllProducts as $value): ?>
															<div class="product">
																<div class="product-img">
																	<img src="./img/<?php echo $value['pro_image'] ?>" alt="">
																	<div class="product-label">
																		<span class="sale">-30%</span>
																		<span class="new">NEW</span>
																	</div>
																</div>
																<div class="product-body">
																	<p class="product-category">Category</p>
																	<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id']?>$type_id=<?php echo $value['type_id']?>">
																	<?php echo $value['name'] ?></a></h3>
																	<h4 class="product-price"><?php echo number_format($value['price']*0.7)?> VND<br><del class="product-old-price"><?php echo number_format($value['price'])?></del></h4>
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

																<div class="add-to-cart">
																	<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
																</div>
															</div>
																<?php endforeach; ?>
															<!-- /product -->
														</div>
														<div id="slick-nav-2" class="products-slick-nav"></div>
													</div>
													<!-- /tab -->
												</div>
											</div>
										</div>
										<!-- /Products tab & slick -->
									</div>
									<!-- /row -->
								</div>
								<!-- /container -->
							</div>
							<!-- /SECTION -->

							<!-- SECTION -->
							<div class="section">
								<!-- container -->
								<div class="container">
									<!-- row -->
									<div class="row">
										<div class="col-md-4 col-xs-6">
											<div class="section-title">
												<h4 class="title">điện thoại</h4>
												<div class="section-nav">
													<div id="slick-nav-3" class="products-slick-nav"></div>
												</div>
											</div>

											<div class="products-widget-slick" data-nav="#slick-nav-3">
												<div>
													<!-- product widget -->
													<?php

													$product = new Product;
													$products = $product->get3ProductsPhone();

													foreach ($products as $value) :
													?>
														<div class="product-widget">
															<div class="product-img">
																<img src="./img/<?php echo $value['pro_image'] ?>" alt="">
															</div>
															<div class="product-body">
																<p class="product-category"></p>
																<h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
																<h4 class="product-price"><?php echo number_format($value['price']) ?> VND</h4>
															</div>
														</div>
													<?php endforeach; ?>
													<!-- /product widget -->
												</div>

												<div>
													<!-- product widget -->
													<?php
													$product = new Product;
													$products = $product->getProductsPhone();

													foreach ($products as $value) :
													?>
														<div class="product-widget">
															<div class="product-img">
																<img src="./img/<?php echo $value['pro_image'] ?>" alt="">
															</div>
															<div class="product-body">
																<p class="product-category"></p>
																<h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
																<h4 class="product-price"><?php echo number_format($value['price']) ?> VND</h4>
															</div>
														</div>
													<?php endforeach; ?>
													<!-- /product widget -->
												</div>
											</div>
										</div>

										<div class="col-md-4 col-xs-6">
											<div class="section-title">
												<h4 class="title">Laptops</h4>
												<div class="section-nav">
													<div id="slick-nav-4" class="products-slick-nav"></div>
												</div>
											</div>

											<div class="products-widget-slick" data-nav="#slick-nav-4">
												<div>
													<!-- product widget -->
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
																<p class="product-category"></p>
																<h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
																<h4 class="product-price"><?php echo number_format($value['price']) ?> VND</del></h4>
															</div>
														</div>
													<?php endforeach; ?>
													<!-- /product widget -->
												</div>

												<div>
													<!-- product widget -->
													<?php
													$product = new Product;
													$products = $product->getProductsLaptop();

													foreach ($products as $value) :
													?>
														<div class="product-widget">
															<div class="product-img">
																<img src="./img/<?php echo $value['pro_image'] ?>" alt="">
															</div>
															<div class="product-body">
																<p class="product-category"></p>
																<h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
																<h4 class="product-price"><?php echo number_format($value['price']) ?> VND</del></h4>
															</div>
														</div>
													<?php endforeach; ?>
													<!-- /product widget -->
												</div>
											</div>
										</div>

										<div class="clearfix visible-sm visible-xs"></div>

										<div class="col-md-4 col-xs-6">
											<div class="section-title">
												<h4 class="title">Đồng Hồ</h4>
												<div class="section-nav">
													<div id="slick-nav-5" class="products-slick-nav"></div>
												</div>
											</div>

											<div class="products-widget-slick" data-nav="#slick-nav-5">
												<div>
													<!-- product widget -->
													<?php
													$product = new Product;
													$products = $product->get3ProductsWatch();

													foreach ($products as $value) :
													?>
														<div class="product-widget">
															<div class="product-img">
																<img src="./img/<?php echo $value['pro_image'] ?>" alt="">
															</div>
															<div class="product-body">
																<p class="product-category"></p>
																<h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
																<h4 class="product-price"><?php echo number_format($value['price']) ?> VND</del></h4>
															</div>
														</div>
													<?php endforeach; ?>
													<!-- /product widget -->
												</div>

												<div>
													<!-- product widget -->
													<?php
													$product = new Product;
													$products = $product->getProductsWatch();

													foreach ($products as $value) :
													?>
														<div class="product-widget">
															<div class="product-img">
																<img src="./img/<?php echo $value['pro_image'] ?>" alt="">
															</div>
															<div class="product-body">
																<p class="product-category"></p>
																<h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
																<h4 class="product-price"><?php echo number_format($value['price']) ?> VND</del></h4>
															</div>
														</div>
													<?php endforeach; ?>
													<!-- /product widget -->
												</div>
											</div>
										</div>

									</div>
									<!-- /row -->
								</div>
								<!-- /container -->
							</div>
							<!-- /SECTION -->

							<!-- NEWSLETTER -->
							<div id="newsletter" class="section">
								<!-- container -->
								<div class="container">
									<!-- row -->
									<div class="row">
										<div class="col-md-12">
											<div class="newsletter">
												<p>Sign Up for the <strong>NEWSLETTER</strong></p>
												<form>
													<input class="input" type="email" placeholder="Enter Your Email">
													<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
												</form>
												<ul class="newsletter-follow">
													<li>
														<a href="#"><i class="fa fa-facebook"></i></a>
													</li>
													<li>
														<a href="#"><i class="fa fa-twitter"></i></a>
													</li>
													<li>
														<a href="#"><i class="fa fa-instagram"></i></a>
													</li>
													<li>
														<a href="#"><i class="fa fa-pinterest"></i></a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<!-- /row -->
								</div>
								<!-- /container -->
							</div>
							<!-- /NEWSLETTER -->

							<!-- FOOTER -->
							<footer id="footer">
								<!-- top footer -->
								<div class="section">
									<!-- container -->
									<div class="container">
										<!-- row -->
										<div class="row">
											<div class="col-md-3 col-xs-6">
												<div class="footer">
													<h3 class="footer-title">About Us</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
													<ul class="footer-links">
														<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
														<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
														<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
													</ul>
												</div>
											</div>

											<div class="col-md-3 col-xs-6">
												<div class="footer">
													<h3 class="footer-title">Categories</h3>
													<ul class="footer-links">
														<li><a href="#">Hot deals</a></li>
														<li><a href="#">Laptops</a></li>
														<li><a href="#">Smartphones</a></li>
														<li><a href="#">Cameras</a></li>
														<li><a href="#">Accessories</a></li>
													</ul>
												</div>
											</div>

											<div class="clearfix visible-xs"></div>

											<div class="col-md-3 col-xs-6">
												<div class="footer">
													<h3 class="footer-title">Information</h3>
													<ul class="footer-links">
														<li><a href="#">About Us</a></li>
														<li><a href="#">Contact Us</a></li>
														<li><a href="#">Privacy Policy</a></li>
														<li><a href="#">Orders and Returns</a></li>
														<li><a href="#">Terms & Conditions</a></li>
													</ul>
												</div>
											</div>

											<div class="col-md-3 col-xs-6">
												<div class="footer">
													<h3 class="footer-title">Service</h3>
													<ul class="footer-links">
														<li><a href="#">My Account</a></li>
														<li><a href="#">View Cart</a></li>
														<li><a href="#">Wishlist</a></li>
														<li><a href="#">Track My Order</a></li>
														<li><a href="#">Help</a></li>
													</ul>
												</div>
											</div>
										</div>
										<!-- /row -->
									</div>
									<!-- /container -->
								</div>
								<!-- /top footer -->

								<!-- bottom footer -->
								<div id="bottom-footer" class="section">
									<div class="container">
										<!-- row -->
										<div class="row">
											<div class="col-md-12 text-center">
												<ul class="footer-payments">
													<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
													<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
													<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
													<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
													<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
													<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
												</ul>
												<span class="copyright">
													<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
													Copyright &copy;<script>
														document.write(new Date().getFullYear());
													</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
													<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
												</span>
											</div>
										</div>
										<!-- /row -->
									</div>
									<!-- /container -->
								</div>
								<!-- /bottom footer -->
							</footer>
							<!-- /FOOTER -->

							<!-- jQuery Plugins -->
							<script src="js/jquery.min.js"></script>
							<script src="js/bootstrap.min.js"></script>
							<script src="js/slick.min.js"></script>
							<script src="js/nouislider.min.js"></script>
							<script src="js/jquery.zoom.min.js"></script>
							<script src="js/main.js"></script>
>>>>>>> bf7a872a01a6f82219dc8ab652d9b6c2da2beafc

</body>

</html>