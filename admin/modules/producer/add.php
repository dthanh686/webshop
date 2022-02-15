<?php

    /**
     * gọi file autoload
     */
    
     $open = "dm";
    $active = "producer";
    include __DIR__ ."/../../autoload/autoload.php";

   /**
    *  xử lý
    */
   
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $error = [];

        $tennhacc = postInput("tennhacc");
        $diachi        = postInput("diachi");
        
        $sodienthoai = postInput("sodienthoai");
        $email        = postInput("email");
        $soluong    = postInput("soluong");
        $mota       = postInput("mota");


        if ($tennhacc == '')
        {
            $error['tennhacc'] = " Tên nhà cung cấp  không được để trống !";
        }

        if ($diachi == '')
        {
            $error['diachi'] = " Địa chỉ không được để trống !";
        }

        if ($sodienthoai == '')
        {
            $error['sodienthoai'] = "Số điện thoại  không được để trống !";
        }

        if ($email == '')
        {
            $error['email'] = "Email phẩm không được để trống !";
        }


        if( empty($error))
        {
            $data = [
                'tennhacc' => $tennhacc,
                'sodienthoai' => $sodienthoai,
                'diachi'        => $diachi,
                'email'    => $email
            ];

            $id_insert = $db->insert("nhacungcap" , $data);   
            if($id_insert)
            {
                $_SESSION['success'] = ' Thêm Mới Thành Công ';
                redirectAdmin("producer");
            }
            else
            {
                $_SESSION['error'] = 'Thêm Mới thất bai ';
                redirectAdmin('producer');
            }
        }
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
                        <a href="index.php" ><i> Nhà cung cấp </i></a>
                    </li>
                </ul>
                <?php include __DIR__ ."/../../layouts/action.php"; ?>
            </div>
              <?php include __DIR__ ."/../../layouts/notification.php"; ?>
             <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> Thêm mới nhà cung cấp 
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" method="POST" class="form-horizontal ng-pristine ng-valid" action="" enctype="multipart/form-data">
                       
                        <div class="form-body ">
                            <form id="demo-form2" action="" method="POST"  class="form-horizontal form-label-left bor" novalidate="" enctype="multipart/form-data">
                            
                            <div class="col-md-12 bor" style="padding-top: 20px;">

                               

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-2" for="first-name"> Tên nhà cung cấp <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" name="tennhacc" class="form-control col-md-7 col-xs-12" value="<?php echo isset($tennhacc) ? $tennhacc : '' ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-2" for="first-name"> Địa chỉ <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" name="diachi" class="form-control col-md-7 col-xs-12" value="<?php echo isset($diachi) ? $diachi : '' ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-2" for="first-name"> Sô điện thoại <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" name="sodienthoai" class="form-control col-md-7 col-xs-12" value="<?php echo isset($sodienthoai) ? $sodienthoai : '' ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-2" for="first-name"> Email <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" name="email" class="form-control col-md-7 col-xs-12" value="<?php echo isset($email) ? $email : '' ?>">
                                    </div>
                                </div>
                                
                                

                                    
                            </div>

                            <div class="clearfix"></div>
                            <div class="ln_solid"></div>
                           
                      
                        </div>
                        <div class="form-actions right">
                            <button type="submit" class="btn green">Lưu</button>
                        </div>
                    </form>
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