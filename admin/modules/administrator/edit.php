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
    

    if (isset($_GET['id']) && $_GET['id']  != '')
    {
        $id = intval($_GET['id']);
    }
    else
    {
        $_SESSION['error'] = ' Không tồn tại ID ';
        redirectAdmin("administrator");
    }

    $admin = $db->fetchID('admin',$id);
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $error = [];

        $name         = postInput("name");
        $email        = postInput("email");
        $phone        = postInput("phone");
        $level        = postInput("level");
      


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

        


        if( empty($error))
        {
            $data = [
                'name'      => $name,
                'phone'     => $phone,
                'email'     => $email,
                'level '    => $level 
            ];

            if ($password != '')
            {
                $data['password'] =  md5(postInput['password']);
            }
            $id_insert = $db->update("admin" , $data , array('id' => $id));   
            if($id_insert)
            {
                $_SESSION['success'] = ' Cập nhật  Thành Công ';
                redirectAdmin("administrator");
            }
            else
            {
                $_SESSION['error'] = 'Cập nhật  thất bai ';
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
                        <i class="fa fa-plus"></i> Cập nhật ban quản trị 
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
                                        <input type="text" name="name" class="form-control col-md-7 col-xs-12" value="<?php echo isset($admin) ? $admin['name'] : '' ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-2" for="first-name"> Email  <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" name="email" class="form-control col-md-7 col-xs-12" value="<?php echo isset($admin) ? $admin['email'] : '' ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-2" for="first-name"> Password 
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" name="password" class="form-control col-md-7 col-xs-12" value="<?php echo isset($password) ? $password : '' ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-2" for="first-name"> Sô điện thoại <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-5">
                                        <input type="text" name="phone" class="form-control col-md-7 col-xs-12" value="<?php echo isset($admin) ? $admin['phone'] : '' ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2 col-md-offset-2" for="first-name"> Cấp độ  <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-5">
                                        <select name="level" class="form-control">
                                            <option value="1" <?php echo ($admin['level'] ==  1 ? "selected = 'selected'" : '')  ?>> Shipper</option>
                                            <option value="2" <?php echo ($admin['level'] ==  2 ? "selected = 'selected'" : '')  ?>> CTV</option>       
                                              
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