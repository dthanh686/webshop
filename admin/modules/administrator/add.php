<?php

    /**
     * gọi file autoload
     */
    
    $open = "setting";
    $active = "admin";
    include __DIR__ ."/../../autoload/autoload.php";

   /**
    *  xử lý
    */
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $error = [];

        $name         = postInput("name");
        $password     = postInput("password");
        
        $phone        = postInput("phone");
        $password     = postInput("password");
        $level        = postInput("level");
        $email        = postInput("email");
      


        if ($name == '')
        {
            $error['name'] = " Họ và tên  không được để trống !";
        }

        if ($email == '')
        {
            $error['email'] = " Email  không được để trống !";
        }

        if ($phone == '')
        {
            $error['phone'] = "Số điện thoại  không được để trống !";
        }

        if ($password == '')
        {
            $error['password'] = "password phẩm không được để trống !";
        }


        if( empty($error))
        {
            $data = [
                'name'      => $name,
                'phone'     => $phone,
                'password'  => md5($password),
                'email'     => $email,
                'level '    => $level 
            ];

            $id_insert = $db->insert("admin" , $data);   
            if($id_insert)
            {
                $_SESSION['success'] = ' Thêm Mới Thành Công ';
                redirectAdmin("administrator");
            }
            else
            {
                $_SESSION['error'] = 'Thêm Mới thất bai ';
                redirectAdmin('administrator');
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
                        <a href="index.php" ><i> Ban quản trị  </i></a>
                    </li>
                </ul>
                <?php include __DIR__ ."/../../layouts/action.php"; ?>
            </div>
              <?php include __DIR__ ."/../../layouts/notification.php"; ?>
             <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> Thêm mới ban quản trị 
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" method="POST" class="form-horizontal ng-pristine ng-valid" action="" enctype="multipart/form-data">
                       
                        <div class="form-body ">
                            <form id="demo-form2" action="" method="POST"  class="form-horizontal form-label-left bor" novalidate="" enctype="multipart/form-data">
                            
                            <div class="col-md-12 bor" style="padding-top: 20px;">

                               

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-2" for="first-name"> Họ và Tên  <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" name="name" class="form-control col-md-7 col-xs-12" value="<?php echo isset($name) ? $name : '' ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-2" for="first-name"> Email  <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" name="email" class="form-control col-md-7 col-xs-12" value="<?php echo isset($email) ? $email : '' ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-2" for="first-name"> Password  <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="password" name="password" class="form-control col-md-7 col-xs-12" value="<?php echo isset($password) ? $password : '' ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-2" for="first-name"> Số điện thoại <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="number" min="0" name="phone" class="form-control col-md-7 col-xs-12" value="<?php echo isset($phone) ? $phone : '' ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-2" for="first-name"> Cấp độ  <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-5">
                                        <select name="level" class="form-control">
                                            <option value="1"> Shipper</option>
                                            <option value="2"> CTV</option>       
                                        </select>
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