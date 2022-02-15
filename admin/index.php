<?php

    /**
     * gọi file autoload
     */
    $active = 'admin';
    include __DIR__ ."/autoload/autoload.php";

    /**
     * tổng số sản phẩm
     */
    
    $sumsanpham = $db->countTable('sanpham');

    /**
     * tỏng số tiền đã thanh toán
     */
    $sqltt = " SELECT SUM(tongtien) as tt  FROM donhang WHERE trangthai = 1 ";
    $tongsotien = $db->total($sqltt);


    /**
     * tổng số đơn hàng ( chưa thanh toán và đã thanh toán)
     */
    
    $sumorder = $db->countTable('donhang');


    /**
     * tổng số thành viên và admin 
     */
    
    $sumauth = $db->countTable("auth");


    /**
     * doanh thu hôm nay
     */
    
    
    $sqltime = "SELECT SUM(tongtien) as danhthuthang FROM donhang WHERE 1 AND trangthai = 1 AND MONTH(updated_at) = $month";
    $kq = $db->total($sqltime);
    

    /**
     * doanh thu trong ngày 
     */
    
    $sqltime2 = "SELECT SUM(tongtien) as doanhthungay FROM donhang WHERE 1 AND trangthai = 1 AND DAY(updated_at) = $day";
    $kq2 = $db->total($sqltime2);


    /**
     * danh thu theo  tuần
     */
    
    $sqltime3 = "SELECT SUM(tongtien) as doanhthutuan FROM donhang WHERE 1 AND trangthai = 1 AND WEEK(updated_at) =  $week";
    $kq3 = $db->total($sqltime3);

  
    
?>  

<?php 
    /**
     * goi file header
     */
    include __DIR__ ."/layouts/header.php";
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
                        <i> Dashboard </i>
                    </li>
                </ul>
            </div>

            <!-- hiện thông báo -->
            <?php include __DIR__ ."/layouts/notification.php"; ?>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat blue-madison">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <?php echo $sumsanpham ?>
                            </div>
                            <div class="desc">
                                Tổng số sản phẩm 
                            </div>
                        </div>
                        <a class="more" href="javascript:;">
                        View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat red-intense">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <?php echo formatprice($tongsotien['tt']) ?>  đ
                            </div>
                            <div class="desc">
                                Tổng số tiền 
                            </div>
                        </div>
                        <a class="more" href="javascript:;">
                        View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat green-haze">
                        <div class="visual">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                 <?php echo $sumorder ?>
                            </div>
                            <div class="desc">
                                 Đơn hàng 
                            </div>
                        </div>
                        <a class="more" href="javascript:;">
                        View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat purple-plum">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <?php echo $sumauth ?>
                            </div>
                            <div class="desc">
                                Tổng số thành viên , admin
                            </div>
                        </div>
                        <a class="more" href="javascript:;">
                        View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat purple-plum">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <?php echo formatprice($kq2['doanhthungay']) ?>đ
                            </div>
                            <div class="desc">
                                Doanh thu Hôm nay
                            </div>
                        </div>
                        <a class="more" href="javascript:;">
                        View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>


                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat purple-plum">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <?php echo formatprice($kq3['doanhthutuan']) ?>đ
                            </div>
                            <div class="desc">
                                Doanh thu Tuần
                            </div>
                        </div>
                        <a class="more" href="javascript:;">
                        View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>

                 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-stat purple-plum">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <?php echo formatprice($kq['danhthuthang']) ?>đ
                            </div>
                            <div class="desc">
                                Doanh thu Tháng
                            </div>
                        </div>
                        <a class="more" href="javascript:;">
                        View more <i class="m-icon-swapright m-icon-white"></i>
                        </a>
                    </div>
                </div>

            </div>

           <!--  <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> Danh mục sản phẩm 
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Table heading
                                    </th>
                                    <th>
                                        Table heading
                                    </th>
                                    <th>
                                        Table heading
                                    </th>
                                    <th>
                                        Table heading
                                    </th>
                                    <th>
                                        Table heading
                                    </th>
                                    <th>
                                        Table heading
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        Table cell
                                    </td>
                                    <td>
                                        Table cell
                                    </td>
                                    <td>
                                        Table cell
                                    </td>
                                    <td>
                                        Table cell
                                    </td>
                                    <td>
                                        Table cell
                                    </td>
                                    <td>
                                        Table cell
                                    </td>
                                    onclick="return confirm('Bạn có muốn xóa k ? ')";
                                </tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> -->
           
        </div>
    </div>

 <?php 
    /**
     * goi file footer
     */
    include __DIR__ ."/layouts/footer.php";
 ?>