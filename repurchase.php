<?php session_start();
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/user.php";
require "models/protype.php";
$protype = new Protype;
$user = new User;
$product = new Product;
$protypes = $protype->getProtypes();
$getAllProducts = $product->getAllProducts();

if(isset($_SESSION['name'])){
	$getIdUser = $protype->getIdUser($mail = $_SESSION['name']);
	foreach ($getIdUser as $value) :
		//gán id người dùng vào biến
		$get = $value['id'];
	endforeach;
	$getWistlistByIds = $product->getWistlistById($id = $get);
	}
?>
<?php include"./views/header.php"?>

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li class="active">Checkout</li>
						</ul>
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
				<form action="addorder.php?id=<?php echo $_GET['id'] ?>" method="post">
					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Thông tin người nhận</h3>
							</div>
							<?php if (isset($_SESSION['user'])) :
								$getInfoByUsername =	$user->getInfoByUsername($_SESSION['user']);
								foreach ($getInfoByUsername as $value) :
							?>
								
									<div class="form-group">
										<input class="input" type="text" name="address" placeholder="Địa chỉ" required>
									</div>

									<div class="form-group">
										<input class="input" type="tel" name="phone" placeholder="Điện thoại" value="<?php echo $value['phone'] ?>" required>
									</div>

								<?php endforeach ?>
							<?php endif ?>
						</div>
						<!-- /Billing Details -->



						<!-- Order notes -->
						<div class="row">
							<div class="col-md-8">
								<div class="order-notes">
									<h4>Ghi chú</h4>
									<textarea style="height: 115px;" class="input" placeholder="Ghi chú" name="note"></textarea>
								</div>
							</div>
							<div class="col-md-3"><?php $getProductById = $product->getProductById($_GET['id']) ?>
								<img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="img/<?php foreach ($getProductById as $value) {
																													echo $value['pro_image'];
																												} ?>">
							</div>
						</div>


						<!-- /Order notes -->
					</div>
					<!-- Order Details -->
<div class="col-md-5 order-details">

<div class="section-title text-center">
	<h3 class="title">đơn hàng của bạn</h3>
</div>
<div class="order-summary">
	<div class="order-col">
		<div><strong>SẢN PHẨM</strong></div>
		<div><strong>ĐƠN GIÁ</strong></div>
	</div>
	<div class="order-products">
		
					<div class="order-col">
						<div> <?php echo $value['name'] ?></div>
						<div style="max-width:440px;"><?php echo number_format($value['price']) ?> VND</div>
					</div>

	</div>
	<div class="order-col">
		<div><strong>PHÍ VẬN CHUYỂN</strong></div>
		<div><strong>MIỄN PHÍ</strong></div>
	</div>
	<div class="order-col">
		<div><strong>TỔNG</strong></div>
		<div><strong class="order-total"><?php echo number_format($value['price']) ?>VND</strong></div>
	</div>
</div>
<?php
			
?>
	<a href="addcart.php?id=<?php echo $value['id'] ?>&type_id=<?php echo $value['type_id'] ?>">
											<div class="add-to-cart">
<button class="primary-btn order-submit col-lg-offset-4" type="submit" name="submit" >ĐẶT HÀNG</button>
</div>
										</a>

</div>
<!-- /Order Details -->
</form>
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /SECTION -->

		<?php include
		"./views/footer.php"?>