<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";

    if( isset($_SESSION['auth_id']))
    {
        $path = $_SERVER["HTTP_REFERER"];
        if(isset($path))
        {
            header("location: ".$path);
        }
        else
        {
            header("location: index.php");
        }
        
    }

     // lấy giá trị từ các ô input

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email    = postInput('email');
        $password = postInput('password');

        $error = [];
        if( $email == "" )
        {
            $error['email'] = "Mời bạn nhập email đăng nhập !";
        }

        if( $password == "" )
        {
            $error['password'] = "Mời bạn nhập nhập mật khẩu !";
        }

        if (empty($error))
        {
            $password = md5($password);

            $admin = $db->fetchOne("auth","email = '".$email."' AND password = '".$password."'");
            if(empty($admin))
            {
                $error['thongtin'] = " Sai thông tin đăng nhập!";    
            }
            else 
            {
                // set_login($admin['id'],$admin['name']);
                $_SESSION['auth_name']    = $admin['name'];
                $_SESSION['auth_id']      = $admin['id'];
                $_SESSION['auth_level']   = $admin['level'];
                unset($_SESSION['reg_email']);
                unset($_SESSION['reg_pass']);
                echo " <script>alert(' Đăng nhập thành công  !'); location.href='index.php';</script>";
            }   
        }
        else
        {
            $error['trong'] = " Mời bạn điền đầy đủ thông tin !";
        }
    }
   
?>  
    <?php  require_once __DIR__ . "/include/header.php"; ?>
    
    <div id="maincontent">
        <div class="breadcrumbs theme-clearfix">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a><span class="divider"></span></li>
                    
                    <li class="active">  Đăng nhập </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <?php  require_once __DIR__ . "/include/left.php"; ?>
            <div class="col-md-9 bor" style="padding: 10px;">
                 <div class="panel panel-default">
                    <div class="panel-heading"> <h2>Đăng Nhập</h2> </div>
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
                                <label class="control-label col-sm-2" for="email">Email:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" placeholder=" VD nguyenvana@gmail.com" name="email" value="<?php echo isset($_SESSION['reg_email']) ? $_SESSION['reg_email'] : '' ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Password:</label>
                                <div class="col-sm-10">          
                                    <input type="password" class="form-control" id="pwd" name="password" placeholder=" VD  *****************" value="<?php echo isset($_SESSION['reg_pass']) ? $_SESSION['reg_pass'] : '' ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-info"> Đăng Nhập </button>
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