<?php
    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";
    // session_destroy();
   
?>  
    <?php  require_once __DIR__ . "/include/header.php"; ?>
    <div id="maincontent">
        <div class="container">
            <?php  require_once __DIR__ . "/include/left.php"; ?>
            <div class="col-md-9">
            <!-- slide -->
                <section id="slide" class="text-center" >
                    <img src="<?php echo base_url() ?>public/frontend/images/slide/b1.jpg" class="img-thumbnail">
                </section>
                <!-- END -->

                <section class="box-main1">
                    <h3 class="title-main" ><a href=""> Danh sách sản  phẩm </a> </h3>
                    
                    <div class="showitem">
                        <?php foreach($sanpham as $item) :?>
                            <div class="col-md-3 item-product bor">
                                <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>">
                                    <img src="<?php echo base_url() ?>/public/uploads/product/<?php echo $item['hinhanh'] ?>" class="" width="100%" height="180" title=<?php echo $item['tensanpham'] ?>>
                                </a>
                                <div class="info-item">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>"><?php echo $item['tensanpham'] ?></a>
                                    <p><strike class="sale"><?php echo formatprice($item['gia']) ?>đ</strike> <b class="price"><?php echo formatprice($item['gia'] * (100 - $item['giamgia'])/100) ?> đ</b></p>
                                </div>
                                <div class="hidenitem">
                                    <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>" title="Chi tiết sản phẩm "><i class="fa fa-search"></i></a></p>
                                    <p><a href="yeuthich.php?id=<?php echo $item['id'] ?>" title="Thêm vào sản phẩm yêu thích "><i class="fa fa-heart"></i></a></p>
                                    <p><a href="them-gio-hang.php?id=<?php echo $item['id'] ?>" title="Thêm vào giỏ hàng "><i class="fa fa-shopping-basket"></i></a></p>
                                </div>
                            </div>
                        <?php endforeach ; ?>
                    </div>
                </section>

            </div>
        </div>

	
      <?php  require_once __DIR__ . "/include/footer.php"; ?>


