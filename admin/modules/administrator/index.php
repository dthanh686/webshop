<?php

    /**
     * gọi file autoload
     */
    $open = "setting";
    $active = "admin";
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
    $sql = " SELECT * FROM admin WHERE 1";
    $admin = $db->fetchJone("admin",$sql,$page = $p,5,false);
    

    if(isset($admin['page']))
    {
        $sotrang =  $admin['page'];
        unset($admin['page']); 
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
                        <i> Ban quản trị  </i>
                    </li>
                </ul>
                <?php include __DIR__ ."/../../layouts/action.php"; ?>
            </div>

            <!-- hiện thông báo -->
            <?php include __DIR__ ."/../../layouts/notification.php"; ?>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> Danh mục quản trị viên  
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
                                    <th> Số dt  </th>
                                    <th> Quyền hạn </th>
                                    <th class="text-center" style="width: 20%"> Thao Tác </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($admin as $item) :?>
                                <tr>
                                   <td><input type="checkbox" name="" ></td>
                                   <td><?php echo $item['name'] ?></td>
                                   <td><?php echo $item['email'] ?></td>
                                   <td> <?php echo $item['phone'] ?></td>
                                   <td>
                                       <select name="level" class="form-control">
                                            <option value="1" <?php echo ($item['level'] ==  1 ? "selected = 'selected'" : '')  ?>> Shipper</option>
                                            <option value="2" <?php echo ($item['level'] ==  2 ? "selected = 'selected'" : '')  ?>> CTV</option>       
                                            <option value="4" <?php echo ($item['level'] ==  4 ? "selected = 'selected'" : '')  ?>> <span>Administrantor</span></option>       
                                        </select>
                                   </td>
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