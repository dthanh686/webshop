<?php

    /**
     * gọi file autoload
     */
    $open =  "ht";
    $active = "inventory";
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
    $sql = " SELECT sanpham.*, danhmuc.tendanhmuc as danhmuc FROM sanpham 
        LEFT JOIN danhmuc ON danhmuc.id = sanpham.danhmuc_id
        WHERE 1 AND soluong <= 5";
    $productList = $db->fetchJone("sanpham",$sql,$page = $p,5,false);
    

    if(isset($productList['page']))
    {
        $sotrang =  $productList['page'];
        unset($productList['page']); 
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
                        <i> Mặt hàng sắp hết  </i>
                    </li>
                </ul>
               
            </div>

            <!-- hiện thông báo -->
            <?php include __DIR__ ."/../../layouts/notification.php"; ?>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> Danh sách hàng tồn  
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> #</th>
                                    <th> Tên </th>
                                    <th> Danh mục </th>
                                    <th> Hình ảnh  </th>
                                    <th> Slug </th>
                                    <th> Thông tin </th>
                            
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($productList as $item) :?>
                                <tr>
                                   <td><input type="checkbox" name="" ></td>
                                   <td><?php echo $item['tensanpham'] ?></td>
                                   <td><?php echo $item['danhmuc'] ?></td>
                                   <td>
                                        <img src="<?php echo base_url() ?>public/uploads/product/<?php echo $item['hinhanh'] ?>" class="img" width="100" height="100" />
                                   </td>
                                   <td> <?php echo $item['slug'] ?></td>
                                   <td>
                                       <ul>
                                           <li>Số lượng   : <?php echo $item['soluong'] ?></li>
                                           <li>Tình trạng :  <?php echo checkprice($item['soluong']) ?></li>
                                           <li> Giá  : <?php echo formatprice($item['gia'])  ?> đ</li>
                                           
                                       </ul>
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