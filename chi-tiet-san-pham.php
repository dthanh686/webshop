<?php

/**
 * gọi file autoload
 */
require_once __DIR__ . "/autoload/autoload.php";


if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $id = intval($id);
}

$sanpham = $db->fetchID('sanpham', $id);

?>
<?php require_once __DIR__ . "/include/header.php"; ?>
<style>
	.content_nd p {
		margin-bottom: 10px;
	}
</style>
	<div id="maincontent">
	<div class="breadcrumbs theme-clearfix">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="">Home</a><span class="divider"></span></li>
				<li><a>Sản phẩm </a><span class="divider"></span></li>
				<li><a> Chi tiết sản phẩm </a><span class="divider"></span></li>
				<li class="active"><span> <?php echo $sanpham['slug'] ?> </span></li>
			</ul>
		</div>
	</div>
	<div class="container">
        <?php require_once __DIR__ . "/include/left.php"; ?>
		<div class="col-md-9 bor">

			<section class="box-main1">
				<div class="col-md-6 text-center">
					<img src="<?php echo base_url() ?>public/uploads/product/<?php echo $sanpham['hinhanh'] ?>"
						 class="img-responsive bor" id="imgmain" width="100%" height="370">

					<ul class="text-center bor clearfix" id="imgdetail">
						<li>
							<img src="<?php echo base_url() ?>public/uploads/product/<?php echo $sanpham['hinhanh'] ?>"
								 class="img-responsive pull-left" width="80" height="80">
						</li>
						<li>
							<img src="<?php echo base_url() ?>public/uploads/product/<?php echo $sanpham['hinhanh'] ?>"
								 class="img-responsive pull-left" width="80" height="80">
						</li>
						<li>
							<img src="<?php echo base_url() ?>public/uploads/product/<?php echo $sanpham['hinhanh'] ?>"
								 class="img-responsive pull-left" width="80" height="80">
						</li>
						<li>
							<img src="<?php echo base_url() ?>public/uploads/product/<?php echo $sanpham['hinhanh'] ?>"
								 class="img-responsive pull-left" width="80" height="80">
						</li>

					</ul>
				</div>
				<div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
					<ul id="right">
						<li><h3> <?php echo $sanpham['tensanpham']; ?> </h3></li>
<!--						<li><p> Khuyến mãi nếu có </p></li>-->
						<select class="form-control" id="sizeSelect" name="size">
							<option value=""> -- Size sản phẩm --</option>
							<option value="1">35</option>
							<option value="2">36</option>
							<option value="3">37</option>
							<option value="4">38</option>
							<option value="5">39</option>
							<option value="6">40</option>
						</select>
						<li><p><strike class="sale">Giá gốc : <?php echo formatprice($sanpham['gia']) ?> đ</strike> <b
										class="price"> Giá mới
									: <?php echo formatprice($sanpham['gia'] * (100 - $sanpham['giamgia']) / 100) ?>
									đ</b</li>
						<li><a href="them-gio-hang.php?id=<?php echo $sanpham['id'] ?>" class="btn btn-default"> <i
										class="fa fa-shopping-basket"></i>Thêm vào giỏ hàng </a></li>
					</ul>
				</div>

			</section>
			<div class="col-md-12" id="tabdetail">
				<div class="row">

					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#home">Mô tả sản phẩm </a></li>
						<li><a data-toggle="tab" href="#menu1">Thông tin khác </a></li>
						<li><a data-toggle="tab" href="#menu2">Hướng dẫn mua hàng</a></li>
			
					</ul>
					<div class="tab-content">
						<div id="home" class="tab-pane fade in active content_nd" >
                            <?php echo $sanpham['mota'] ?>
						</div>
						<div id="menu1" class="tab-pane fade">
							<h3> Thông tin khác </h3>
							<p>Toàn bổ sản phẩm đều được bảo quản một cách tốt nhất.</p>
						</div>
						<div id="menu2" class="tab-pane fade">
							<h3>Cách mua hàng trên website</h3>
							<p>Mô tả</p>
						</div>
			
					</div>


				</div>
			</div>

		</div>
	</div>

<?php require_once __DIR__ . "/include/footer.php"; ?>
		<div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=3205159929509308&autoLogAppEvents=1"></script>
