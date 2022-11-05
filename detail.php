<?php
session_start();
require "config.php";
require "models/db.php";
require "models/product.php";
$product = new Product;
$products = $product->getAllProducts();
$protypes = $product->getAllProtypes($_GET['type_id']);
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
					<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
					<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
				</ul>
				<ul class="header-links pull-right">
					<li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
					<li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
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
							<a href="./index.php" class="logo">
								<img src="./img/logo.png" alt="">
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
						<div class="header-search">
							<form>
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
									<span>Your Wishlist</span>
									<div class="qty">2</div>
								</a>
							</div>
							<!-- /Wishlist -->

							<!-- Cart -->
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
							<!-- /Cart -->

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
					<li class="active"><a href="./index.php">Home</a></li>
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

	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<h3 class="breadcrumb-header">Trang Chi Tiết</h3>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BREADCRUMB -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<?php
				if (isset($_GET['id'])) :
					$id = $_GET['id'];
					foreach ($products as $value) :
						if ($id == $value['id']) :
				?>
							<div class="col-lg-5 col-md-5 col-sm-6">
								<div class="white-box text-center"><img src="./img/<?php echo $value['pro_image'] ?>" class="img-responsive"></div>
							</div>
							<div class="col-lg-7 col-md-7 col-sm-6">
								<h1 class="box-title mt-5"><?php echo $value['name'] ?></h1>
								<h4 class="box-title mt-5">Product description</h4>
								<p><?php echo $value['description'] ?></p>
								<h2 class="mt-5">
									<?php echo number_format($value['price']) ?> VND
									<!-- <small class="text-success">(36%off)</small> -->
								</h2>
								<button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
								<a href="addcart.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>">
									<i class="fa fa-shopping-cart"></i>
									</a>
								</button>
								<button class="btn btn-primary btn-rounded">Buy Now</button>
							</div>
				<?php endif;
					endforeach;
				endif; ?>
				<div class="col-lg-12 col-md-12 col-sm-12">
					<h3 class="box-title mt-5">Thông Tin Chung</h3>
					<div class="table-responsive">
						<table class="table table-striped table-product">
							<tbody>
								<tr>
									<td width="390">Brand</td>
									<td>Stellar</td>
								</tr>
								<tr>
									<td>Delivery Condition</td>
									<td>Knock Down</td>
								</tr>
								<tr>
									<td>Seat Lock Included</td>
									<td>Yes</td>
								</tr>
								<tr>
									<td>Type</td>
									<td>Office Chair</td>
								</tr>
								<tr>
									<td>Style</td>
									<td>Contemporary&amp;Modern</td>
								</tr>
								<tr>
									<td>Wheels Included</td>
									<td>Yes</td>
								</tr>
								<tr>
									<td>Upholstery Included</td>
									<td>Yes</td>
								</tr>
								<tr>
									<td>Upholstery Type</td>
									<td>Cushion</td>
								</tr>
								<tr>
									<td>Head Support</td>
									<td>No</td>
								</tr>
								<tr>
									<td>Suitable For</td>
									<td>Study&amp;Home Office</td>
								</tr>
								<tr>
									<td>Adjustable Height</td>
									<td>Yes</td>
								</tr>
								<tr>
									<td>Model Number</td>
									<td>F01020701-00HT744A06</td>
								</tr>
								<tr>
									<td>Armrest Included</td>
									<td>Yes</td>
								</tr>
								<tr>
									<td>Care Instructions</td>
									<td>Handle With Care,Keep In Dry Place,Do Not Apply Any Chemical For Cleaning.</td>
								</tr>
								<tr>
									<td>Finish Type</td>
									<td>Matte</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
	</div>
	<!-- /SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Sản phẩm liên quan</h3>
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
									if (isset($_GET['type_id'])) :
										$type_id = $_GET['type_id'];
										foreach ($protypes as $value) :
											if ($type_id == $value['type_id']) :
									?>
												<div class="product">
													<div class="product-img">
														<img src="./img/<?php echo $value['pro_image'] ?>" alt="image product">
														<div class="product-label">
															<!-- <span class="sale">-30%</span>
															<span class="new">NEW</span> -->
														</div>
													</div>
													<div class="product-body">
														<!-- <p class="product-category">Category</p> -->
														<h3 class="product-name"><a href="detail.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>"><?php echo $value['name'] ?></a></h3>
														<h4 class="product-price"><?php echo number_format($value['price']) ?> VND
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
									<?php endif;
										endforeach;
									endif; ?>
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

</body>

</html>