<?php
session_start();
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/protype.php";
$protype = new Protype;
$product = new Product;
$products = $product->getAllProducts();
$protypes = $product->getAllProtypes($_GET['type_id']);

if(isset($_SESSION['name'])){
$getIdUser = $protype->getIdUser($mail = $_SESSION['name']);
foreach ($getIdUser as $value) :
	//gán id người dùng vào biến
	$get = $value['id'];
endforeach;
$getWistlistByIds = $product->getWistlistById($id = $get);
}
?>
<?php include "./views/header.php" ?>

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
							<button class="btn btn-primary btn-rounded"><a style="text-decoration: none;" href="checkout.php?id=<?php echo $value['id'] ?>"><i class="fa fa-credit-card"></i> Buy Now</a></button>
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
<?php include "./views/footer.php" ?>