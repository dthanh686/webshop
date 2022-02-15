<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";


    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $error = [];

        $name     = postInput("name");
        $email    = postInput("email");
        $password = postInput("password");
        $address  = postInput("address");
        $phone    = postInput("phone");


        if(strlen($password) != 8)
        {
            $error['password'] = " Password phải 8 ký tự !";
        }
       

      

        if ($email == '')
        {
            $error['email'] = " Email  không được để trống !";
        }

        if ($name == '')
        {
            $error['name'] = " Tên  không được để trống !";
        }

        if ($password == '')
        {
            $error['password'] = " Mật khẩu  không được để trống !";
        }

        if ($address == '')
        {
            $error['address'] = " Địa chỉ không được để trống !";
        }


        if( empty($error))
        {
            $data = [
                'name'     => $name,
                'address'  => $address,
                'password' => MD5($password),                
                'phone'    => $phone,
                'email'    => $email
            ];

            /**
             * upload file 
             */
            if ( isset($_FILES['thunbar']))
            {
               $file_name = $_FILES['thunbar']['name'];
               $file_tmp  = $_FILES['thunbar']['tmp_name'];
               $file_type = $_FILES['thunbar']['type'];
               $file_erro = $_FILES['thunbar']['error'];

               if ($file_erro == 0)
               {
                    $part = ROOT ."auth/";
                    $data['thunbar'] = $file_name;
                    move_uploaded_file($file_tmp,$part.$file_name);
               }
            }

            // tiến hành insert
            $id_insert = $db->insert("auth" , $data);   
            
            if($id_insert)
            {
                $_SESSION['success']   = ' Đăng ký Thành Công ';
                $_SESSION['reg_email'] = $email;
                $_SESSION['reg_pass']  = $password;

                redirect('login.php');
            }
            else
            {
                $_SESSION['error'] = 'Đăng ký thất bai ';
                
            }
        }
    }

   
?>  
    <?php  require_once __DIR__ . "/include/header.php"; ?>
    
    <div id="maincontent">
        <div class="breadcrumbs theme-clearfix">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a><span class="divider"></span></li>
                  
                    <li class="active"> Đăng ký </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <?php  require_once __DIR__ . "/include/left.php"; ?>
            <div class="col-md-9 bor" style="padding: 10px;">
               
                 
                  <div class="panel panel-default">
                    <div class="panel-heading"> <h2>Đăng ký thành viên</h2> </div>
                    <div class="panel-body"> 
                        <?php if(isset($error)) :?>
                            <div class="alert alert-danger">
                                <ul>
                                
                                    <?php foreach($error as $key) : ?>
                                        <li style="color: red"><?php echo $key ?></li>
                                    <?php endforeach ; ?>
                               
                                </ul>
                            </div>
                        <?php endif ; ?>
                        <form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Họ và Tên:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" placeholder="  VD Nguyễn Văn A" name="name" value="<?php echo isset($name) ? $name : '' ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Email:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" placeholder=" VD nguyenvana@gmail.com" name="email" value="<?php echo isset($email) ? $email : '' ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Password:</label>
                                <div class="col-sm-10">          
                                    <input type="password" class="form-control" id="pwd" name="password" placeholder=" VD  *****************" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Địa chỉ:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" placeholder="  VD 56/34 số nhà 22 ........." name="address" value="<?php echo isset($address) ? $address : '' ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Số điện thoại:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="email" placeholder="  VD 0123456789 " name="phone" value="<?php echo isset($phone) ? $phone : '' ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email"> Avatar  </label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control"  name="thunbar">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success"> Đăng ký </button>
                                </div>
                            </div>
                       
                        </form>
                    </div>
                  </div>
                
              
            </div>
        </div>

        <div class="container" style="margin-top: 20px">
            <div class="col-md-4 bottom-content">
                <a href=""><img src="<?php echo base_url() ?>public/frontend/images/free-shipping.png"></a>
            </div>
            <div class="col-md-4 bottom-content">
                <a href=""><img src="<?php echo base_url() ?>public/frontend/images/guaranteed.png"></a>
            </div>
            <div class="col-md-4 bottom-content">
                <a href=""><img src="<?php echo base_url() ?>public/frontend/images/deal.png"></a>
            </div>
        </div>
      <?php  require_once __DIR__ . "/include/footer.php"; ?>