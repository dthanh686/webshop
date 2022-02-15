<?php

    /**
     * gọi file autoload
     */
  
    $open = "dm";
    $active = "category";
    include __DIR__ ."/../../autoload/autoload.php";


    /**
     *  lấy danh sách danh mục 
     */
    
    
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
                        <i> Danh mục </i>
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
                                    <th> Slug </th>
                                    <th> Ngày Tạo </th>
                                    <th class="text-center"> Thao Tác </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($danhmucsort as $item) :?>
                                <tr>
                                   <td><input type="checkbox" name="" ></td>
                                   <td>
                                        <?php $str = ''; for($i = 0 ; $i < $item['level']; $i++){ echo $str; $str.="| - -";} ?> <?php echo $item['tendanhmuc'] ?>
                                   </td>
                                   <td> <?php echo $item['slug'] ?></td>
                                   <td> <?php echo $item['created_at'] ?></td>
                                   <td class="text-center">
                                        <a href="edit.php?id=<?php echo $item['id'] ?>" class="btn default btn-xs green"><i class="fa fa-edit"></i> Sửa</a>
                                        
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