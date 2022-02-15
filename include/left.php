<div class="col-md-3  fixside">
    <div class="box-left box-menu">
        <h3 class="box-title"><i class="fa fa-list"></i> Danh mục</h3>
		<?php showcatemenu($danhmuc);

		use libraries\Url\Input; ?>
    </div>
    <?php if (isset($showPrice)) :?>
       <!--  <div class="box-left box-menu" >
            <h3 class="box-title"><i class="fa fa-search"></i> Tìm kiếm theo khoảng giá </h3>
            <ul>
                <li class="<?= Input::get('price') == '<1' ? 'active' : '' ?>">
                    <a href="<?= libraries\Url\Url::addParams(['price' => '<1']) ?>"> Bé hơn 1tr đồng   </a>
                </li>
                <li class="<?= Input::get('price') == '1-3'   ? 'active' : '' ?>"><a href="<?= libraries\Url\Url::addParams(['price' => '1-3']) ?>"> 1.000.000đ - 3.000.000đ  </a></li>
                <li class="<?= Input::get('price') == '3-5'   ? 'active' : '' ?>"><a href="<?= libraries\Url\Url::addParams(['price' => '3-5']) ?>"> 3.000.000đ - 5.000.000đ  </a></li>
                <li class="<?= Input::get('price') == '5-7'   ? 'active' : '' ?>"><a href="<?= libraries\Url\Url::addParams(['price' => '5-7']) ?>"> 5.000.000đ - 7.000.000đ  </a></li>
                <li class="<?= Input::get('price') == '7-10'  ? 'active' : '' ?>"><a href="<?= libraries\Url\Url::addParams(['price' => '7-10']) ?>"> 7.000.000đ - 10.000.000đ </a></li>
                <li class="<?= Input::get('price') == '10-15' ? 'active' : '' ?>"><a href="<?= libraries\Url\Url::addParams(['price' => '10-15']) ?>"> 10.000.000đ - 15.000.000đ </a></li>
                <li class="<?= Input::get('price') == '15-20' ? 'active' : '' ?>"><a href="<?= libraries\Url\Url::addParams(['price' => '15-20']) ?>"> 15.000.000đ - 20.000.000đ </a></li>
                <li class="<?= Input::get('price') == '20'    ? 'active' : '' ?>"><a href="<?= libraries\Url\Url::addParams(['price' => '20']) ?>"> Trên 20.000.000 đ </a></li>
            </ul>
        </div> -->
    <?php endif ;?>

    <div class="box-left box-menu">
        <h3 class="box-title"><i class="fa fa-flag"></i> Sản phẩm hót </h3>
        <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
        <ul>
			<?php foreach ($sanphamhot as $item) : ?>
                <li class="clearfix">
                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>"">
                    <img src="<?php echo base_url() ?>/public/uploads/product/<?php echo $item['hinhanh'] ?>"
                         class="img-responsive pull-left" width="80" height="80">
                    <div class="info pull-right">
                        <p class="name"><?php echo $item['tensanpham'] ?></p>
                        <b class="price"> Giá gốc :<?php echo formatprice($item['gia']) ?>đ</b><br>
                        <b class="sale"> Giảm giá
                            : <?php echo formatprice($item['gia'] * (100 - $item['giamgia']) / 100) ?> đ</b><br>
                        <span class="view"><i class="fa fa-eye"></i> 100000 : <i
                                    class="fa fa-heart-o"></i><?php echo $item['yeuthich'] ?></span>
                    </div>
                    </a>
                </li>
			<?php endforeach; ?>
        </ul>
        <!-- </marquee> -->
    </div>


    <div class="box-left box-menu">
        <h3 class="box-title"><i class="fa fa-eye"></i> Sản phẩm bán chạy </h3>
        <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
        <ul>
			<?php foreach ($sanphambc as $item) : ?>
                <li class="clearfix">
                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>"">
                    <img src="<?php echo base_url() ?>/public/uploads/product/<?php echo $item['hinhanh'] ?>"
                         class="img-responsive pull-left" width="80" height="80">
                    <div class="info pull-right">
                        <p class="name"><?php echo $item['tensanpham'] ?></p>
                        <b class="price"> Giá gốc :<?php echo formatprice($item['gia']) ?>đ</b><br>
                        <b class="sale"> Giảm giá
                            : <?php echo formatprice($item['gia'] * (100 - $item['giamgia']) / 100) ?> đ</b><br>
                        <span class="view"><i class="fa fa-eye"></i> 100000 : <i
                                    class="fa fa-heart-o"></i><?php echo $item['yeuthich'] ?></span>
                    </div>
                    </a>
                </li>
			<?php endforeach; ?>


        </ul>
        <!-- </marquee> -->
    </div>

    <div class="box-left box-menu">
        <h3 class="box-title"><i class="fa fa-heart-o"></i> Sản phẩm yêu thích </h3>
        <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
        <ul>
			<?php foreach ($sanphamyt as $item) : ?>
                <li class="clearfix">
                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>"">
                    <img src="<?php echo base_url() ?>/public/uploads/product/<?php echo $item['hinhanh'] ?>"
                         class="img-responsive pull-left" width="80" height="80">
                    <div class="info pull-right">
                        <p class="name"><?php echo $item['tensanpham'] ?></p>
                        <b class="price"> Giá gốc :<?php echo formatprice($item['gia']) ?>đ</b><br>
                        <b class="sale"> Giảm giá
                            : <?php echo formatprice($item['gia'] * (100 - $item['giamgia']) / 100) ?> đ</b><br>
                        <span class="view"><i class="fa fa-eye"></i> 100000 : <i
                                    class="fa fa-heart-o"></i><?php echo $item['yeuthich'] ?></span>
                    </div>
                    </a>
                </li>
			<?php endforeach; ?>


        </ul>
        <!-- </marquee> -->
    </div>


</div>