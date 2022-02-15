<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";

     // lấy giá trị từ các ô input


    $sql = " SELECT sanpham.*, danhmuc.tendanhmuc as danhmuc FROM sanpham 
         LEFT JOIN danhmuc ON danhmuc.id = sanpham.danhmuc_id
         WHERE 1 " ;

    if(isset($_GET['category']) && $_GET['category'] != NULL)
    {
        $category = intval($_GET['category']);
        $sql .= " AND sanpham.danhmuc_id = $category";
    }

    if(isset($_GET['keywork']) && $_GET['keywork'] != NULL)
    {
        $keywork = $_GET['keywork'];
        $sql .= " AND tensanpham LIKE  '%$keywork%' ";
    }

    $kqtk =  $db->fetchsql($sql);

   
?>  
    <?php  require_once __DIR__ . "/include/header.php"; ?>
    
    <div id="maincontent">
        <div class="breadcrumbs theme-clearfix">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a><span class="divider"></span></li>
                    
                    <li class="active">  Tìm kiếm  </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <?php  require_once __DIR__ . "/include/left.php"; ?>
            <div class="col-md-9 bor" style="padding: 10px;">
                 <section class="box-main1">
                    <h3 class="title-main"><a href=""> Kết quả tìm kiếm </a> </h3>
                    
                    <div class="showitem">
                    <?php if(count($kqtk) > 0) :?>
                        <?php foreach($kqtk as $item) :?>
                            <div class="col-md-3 item-product bor">
                                <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>">
                                    <img src="<?php echo base_url() ?>/public/uploads/product/<?php echo $item['hinhanh'] ?>" class="" width="100%" height="180">
                                </a>
                                <div class="info-item">
                                    <a href=""><?php echo $item['tensanpham'] ?></a>
                                    <p><strike class="sale"><?php echo formatprice($item['gia']) ?>đ</strike> <b class="price"><?php echo formatprice($item['gia'] * (100 - $item['giamgia'])/100) ?> đ</b></p>
                                </div>
                                <div class="hidenitem">
                                    <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>"><i class="fa fa-search"></i></a></p>
                                    <p><a href="yeuthich.php?id=<?php echo $item['id'] ?>" title="Thêm vào sản phẩm yêu thích "><i class="fa fa-heart"></i></a></p>
                                    <p><a href="them-gio-hang.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                </div>
                            </div>
                        <?php endforeach ; ?>
                     <?php else :?>
                        <p>   Có 0 sản phẩm được tìm thấy </p>
                     <?php endif ;?>
                    </div>

                    
                </section>
            </div>
        </div>

        <div class="container" style="margin-top: 20px">
            <div class="col-md-4 bottom-content">
                <a href=""><img src="<?php echo base_url() ?>public/frontend/images/free-shipping.png"></a>
            </div>
            <div class="col-md-4 bottom-content">
                <a href=""><img src="<?php echo base_url() ?>public/frontend/images/guaranteed.png"></a>
            </div>
            <div class="col-md-4 bottom-content">
                <a href=""><img src="<?php echo base_url() ?>public/frontend/images/deal.png"></a>
            </div>
        </div>
      <?php  require_once __DIR__ . "/include/footer.php"; ?>