<?php

    /**
     * gọi file autoload
     */
    $open =  "dh";
    $active = "donhang";
    include __DIR__ ."/../../autoload/autoload.php";


    /**
     * lấy số trang nếu có
     */
    
    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p = 1;
    }

    /**
     *  lấy danh sách sản phẩm
     */
    $sql = " SELECT * FROM donhang WHERE 1 ORDER BY id DESC";
    $donhang = $db->fetchJone("donhang",$sql,$page = $p,5,false);
    

    if(isset($donhang['page']))
    {
        $sotrang =  $donhang['page'];
        unset($donhang['page']); 
    }
    

?>  

<?php 
    /**
     * goi file header
     */
    include __DIR__ ."/../../layouts/header.php";
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
                        <i> Đơn hàng  </i>
                    </li>
                </ul>
               
            </div>

            <!-- hiện thông báo -->
            <?php include __DIR__ ."/../../layouts/notification.php"; ?>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> Đơn hàng
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> #</th>
                                    <th> Tên </th>
                                    <th> Email </th>
                                    <th> Số điện thoại  </th>
                                    <th> Số tiền </th>
                                    <th> Trạng thái </th>
                                    <th class="text-center"> Thao Tác </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  foreach($donhang as $item) :?>
                                <tr>
                                   <td><?php echo $item['id'] ?></td>
                                   <td><?php echo $item['ten'] ?></td>
                                   <td><?php echo $item['email'] ?></td>
                                   <td> <?php echo $item['sodienthoai'] ?></td>
                                   <td> <?php echo formatprice($item['tongtien']) ?> đ</td>
                                   <td>
                                       <?php if($item['trangthai'] == 0) :?>
                                            <a href="trangthai.php?id=<?php echo $item['id'] ?>" class="btn btn-xs btn-default trangthai-info" >Chưa thanh toán</a>
                                        <?php else : ?>
                                            <a href="javascript:;" class="btn btn-xs btn-info trangthai-info ">Đã thanh toán</a>
                                        <?php endif ; ?>
                                   </td>
                                   <td class="text-center">
                                        <a href="view.php?id=<?php echo $item['id'] ?>" class="btn default btn-xs blue"><i class="fa fa-eye-slash"></i> Xem </a>
                                        
                                        <a  href="delete.php?id=<?php echo $item['id'] ?>" class="btn default btn-xs red" onclick="return confirm('Bạn có muốn xóa k ? ')";> <i class="fa fa-times"></i> Xóa</a>
                                       
                                    </td>
                                </tr>
                                <?php endforeach ; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
        </div>
    </div>

 <?php 
    /**
     * goi file footer
     */
    include __DIR__ ."/../../layouts/footer.php";
 ?>