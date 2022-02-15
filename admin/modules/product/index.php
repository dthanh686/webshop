<?php

    /**
     * gọi file autoload
     */
    $open = "dm";
    $active = "product";
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
    $sql = " SELECT sanpham.*, danhmuc.tendanhmuc as danhmuc , nhacungcap.tennhacc as tennhacungcap FROM sanpham 
        LEFT JOIN danhmuc ON danhmuc.id = sanpham.danhmuc_id
        LEFT JOIN nhacungcap ON nhacungcap.id = sanpham.nhacungcap_id
        WHERE 1 ORDER BY id DESC";
    $productList = $db->fetchJone("sanpham",$sql,$page = $p,10,true);
    

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
                        <i> Sản phẩm  </i>
                    </li>
                </ul>
                <?php include __DIR__ ."/../../layouts/action.php"; ?>
            </div>

            <!-- hiện thông báo -->
            <?php include __DIR__ ."/../../layouts/notification.php"; ?>

            <div class="portlet box green">
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
                                    <th> #</th>
                                    <th> Tên </th>
                                    <th> Danh mục </th>
                                    <th> Hình ảnh  </th>
                                   
                                    <th> Thông tin </th>
                            
                                    <th class="text-center"> Thao Tác </th>
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
                                   
                                   <td>
                                       <ul>
                                            <li> Nhà cung cấp <?php echo $item['tennhacungcap'] ?></li>
                                            <li>Số lượng   : <?php echo $item['soluong'] ?></li>
                                            <li>Tình trạng :  <?php echo checkprice($item['soluong']) ?></li>
                                            <li> Giá Nhập : <?php echo formatprice($item['gianhap'])  ?> đ</li>
                                            <li> Giá Bán : <?php echo formatprice($item['gia'])  ?> đ</li>
                                            <li> Giảm giá  : <?php echo $item['giamgia'] ?> % </li>                                           
                                            <li> Size  : <?php echo checksize($item['size']) ?></li>                                           
                                       </ul>
                                   </td>
                                  
                                   <td class="text-center">
                                        <a href="edit.php?id=<?php echo $item['id'] ?>" class="btn default btn-xs green"><i class="fa fa-edit"></i> Sửa</a>
                                        
                                        <a  href="delete.php?id=<?php echo $item['id'] ?>" class="btn default btn-xs red" onclick="return confirm('Bạn có muốn xóa k ? ')";> <i class="fa fa-times"></i> Xóa</a>
                                       
                                    </td>
                                </tr>
                                <?php endforeach ; ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation" class="clearfix">

                            <ul class="pagination" >
                                <li>
                                    <a href=""  aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>

                                <?php for(  $i = 1 ; $i <= $sotrang ; $i++ ) : ?>
                                    <?php
                                    if(isset($_GET['page']))
                                    {
                                        $p = $_GET['page'];
                                    }
                                    else
                                    {
                                        $p = 1;
                                    }
                                    ?>
                                    <li class="<?php echo ($i == $p) ? 'active' : ''  ?>">

                                        <a href="?page=<?php echo $i ;?>"><?php echo $i; ?></a>
                                    </li>
                                <?php endfor; ?>

                                <li>
                                    <a href="" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
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