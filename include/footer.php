<div class="container-pluid">
	<section id="footer">
		<div class="container">
			<div class="col-md-3" id="shareicon">
				<ul>
					<li>
						<a href=""><i class="fa fa-facebook"></i></a>
					</li>
					<li>
						<a href=""><i class="fa fa-twitter"></i></a>
					</li>
					<li>
						<a href=""><i class="fa fa-google-plus"></i></a>
					</li>
					<li>
						<a href=""><i class="fa fa-youtube"></i></a>
					</li>
				</ul>
			</div>
			<div class="col-md-8" id="title-block">
				<div class="pull-left">

				</div>
				<div class="pull-right">

				</div>
			</div>

		</div>
	</section>
	<section id="footer-button">
		<div class="container-pluid">
			<div class="container">
				<div class="col-md-3" id="ft-about">

					<p>Đồ án môn học</p>
				</div>
				<div class="col-md-3 box-footer">
					<h3 class="tittle-footer">Tin tức</h3>
					<ul>
						<li>
							<i class="fa fa-angle-double-right"></i>
							<a href="<?php echo base_url() ?>/tin-tuc.php"><i></i> Tin tức </a>
						</li>
					</ul>
				</div>
				<div class="col-md-3 box-footer">
					<h3 class="tittle-footer">Về Chúng Tôi </h3>
					<ul>
						<li>
							<i class="fa fa-angle-double-right"></i>
							<a href="<?php echo base_url() ?>/gioi-thieu.php"><i></i> Giới thiệu</a>
						</li>
						<li>
							<i class="fa fa-angle-double-right"></i>
							<a href=""><i></i> Liên hệ </a>
						</li>
						<li>
							<i class="fa fa-angle-double-right"></i>
							<a href="<?php echo base_url() ?>/lien-he.php"><i></i> Contact </a>
						</li>
					</ul>
				</div>
				<div class="col-md-3" id="footer-support">
					<h3 class="tittle-footer"> Liên hệ</h3>
					<ul>
						<li>

							<p><i class="fa fa-home" style="font-size: 16px;padding-right: 5px;"></i> Số 18 Phố viên - Phường Đức Thắng - Bắc Từ Liêm -  Hà Nội</p>
							<p><i class="sp-ic fa fa-mobile" style="font-size: 22px;padding-right: 5px;"></i> 0964262686 - 
							</p>
							<p><i class="sp-ic fa fa-envelope" style="font-size: 13px;padding-right: 5px;"></i>
                                alimodosay@gmail.com</p>
						</li>
					</ul>
				</div>
			</div>
		</div>
<!-- 	</section>
	<section id="ft-bottom">
		<p class="text-center">Copyright © 2021 . </p>
	</section> -->
</div>
</div>
</div>
<script src="<?php echo base_url() ?>public/frontend/js/slick.min.js"></script>

</body>

</html>

<script type="text/javascript">

	/**
	 *  url  golbal
	 */

	$url = "http://localhost:8000/";


	$(function () {
		$hidenitem = $(".hidenitem");
		$itemproduct = $(".item-product");
		$itemproduct.hover(function () {
			$(this).children(".hidenitem").show(100);
		}, function () {
			$hidenitem.hide(500);
		})
	})


	/**
	 * update giỏ hàng
	 */


	$updatecart = $(".updatecart");
	$updatecart.click(function () {

		$key = $(this).attr("data-key");
		$qty = $(this).parents("tr").find("#qtyup").val();

        $size = $(this).parents('tr').find(".selected-size option:selected" ).val();
		$.ajax({
			url: $url + "updatecart.php",
			type: 'POST',
			data: {'key': $key, 'qtyupdate': $qty, 'size' : $size},
			async: true,
			success: function (data) {
				if (data == 1) {
					alert('  Cập nhật thành công ! !!   !');
					location.href = 'danh-sach-gio-hang.php';
				}
				else {
					alert(" Cập  nhật thất bại ");
				}

			}
		})
	})
</script>