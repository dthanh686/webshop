<?php

    /**
     * gọi file autoload
     */
    session_start();
    require_once __DIR__ . "/../../libraries/Database.php";
    require_once __DIR__ . "/../../libraries/Function.php";

     /**
     * sản phẩm sắp hết
     */
    
    $db = new Database();
    
    $sql = " SELECT COUNT(id) as sl FROM sanpham WHERE soluong <= 5 ";
    $soluongton = $db->fetchsql($sql);

      /**
    * Đếm số hóa đơn chưa xử lý 
    */
   
   $sqldh = "SELECT count(id) as sohh FROM donhang WHERE trangthai = 0";
   $sodonhangf = $db->fetchsql($sqldh);


?>  

<?php 
    /**
     * goi file header
     */
    include __DIR__ ."/../layouts/header.php";
 ?>
     <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?php echo base_admin() ?>">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                   
                    <li>
                        <i> Errors  </i>
                    </li>
                </ul>
               
            </div>

            <!-- hiện thông báo -->
            <?php include __DIR__ ."/../layouts/notification.php"; ?>

            <div class="row">
                <div class="col-md-12 page-500">
                    <div class="number">
                        <h1>500</h1>
                    </div>
                    <div class=" details">
                        <h3> Bạn không có quyền truy cập vào đây </h3>
                        <p>
                            Bạn hãy vào các mục mà bạn được cấp quyền <br>
                            Xin cảm ơn .<br><br>
                        </p>
                    </div>
                </div>
            </div>
           
        </div>
    </div>

 <?php 
    /**
     * goi file footer
     */
    include __DIR__ ."/../layouts/footer.php";
 ?>