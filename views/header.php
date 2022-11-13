
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
										<a href="orders.php">Checkout <i class="fa fa-arrow-circle-right"></i></a>
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