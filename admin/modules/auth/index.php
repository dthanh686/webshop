<?php

    /**
     * gọi file autoload
     */
     $open = "auth";
    $active = "thanhvien";
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
     *  lấy danh sách thành viên không phải là admin 
     */
    $sql = " SELECT * FROM auth WHERE 1 AND level != 2";
    $auth = $db->fetchJone("auth",$sql,$page = $p,5,false);
    

    if(isset($auth['page']))
    {
        $sotrang =  $auth['page'];
        unset($auth['page']); 
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
                        <i> Thành viên  </i>
                    </li>
                </ul>
               
            </div>

            <!-- hiện thông báo -->
            <?php include __DIR__ ."/../../layouts/notification.php"; ?>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> Danh sách thành viên
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
                                    <th> Phone </th>
                                    <th> Address </th>
                                    <th class="text-center" style="width: 20%"> Thao Tác </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($auth as $item) :?>
                                <tr>
                                   <td><input type="checkbox" name="" ></td>
                                   <td><?php echo $item['name'] ?></td>
                                   <td><?php echo $item['email'] ?></td>
                                   <td> <?php echo $item['phone'] ?></td>
                                   <td> <?php echo $item['address'] ?></td>
                                   <td class="text-center">                                       
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