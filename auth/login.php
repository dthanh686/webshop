<?php  
    session_start();
    require_once __DIR__ . "/../libraries/Function.php";
    require_once __DIR__ . "/../libraries/Database.php";
    require_once __DIR__ . "/../libraries/middleware.php";
    $db = new Database();


    if( isset($_SESSION['admin_name']))
    {
        redirectHome();
    }
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

            $admin = $db->fetchOne("admin","email = '".$email."' AND password = '".$password."'");
           
            if(empty($admin))
            {
                $error['thongtin'] = " Sai thông tin đăng nhập!";    
            }
            else 
            {
                // set_login($admin['id'],$admin['name']);
                $_SESSION['admin_name']    = $admin['name'];
                $_SESSION['admin_id']      = $admin['id'];
                $_SESSION['admin_level']   = intval($admin['level']);
                $_SESSION['admin_email']   = $admin['email'];
                $_SESSION['alertlogin'] = ' Đăng nhập thành công ' ;
                // redirectHome();
                checkadmin($_SESSION['admin_level']);
            }   
        }
        else
        {
            $error['trong'] = " Mời bạn điền đầy đủ thông tin !";
        }
    }
  ?>
<?php    ?>
<!DOCTYPE html>

        <html lang="en">
            <!--<![endif]-->
            <!-- BEGIN HEAD -->
            <head>
                <meta charset="utf-8"/>
                <title>  Đăng nhập hệ thông admin </title>
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
                <meta http-equiv="Content-type" content="text/html; charset=utf-8">
                <meta content="" name="description"/>
                <meta content="" name="author"/>
                <link href="<?php echo public_admin() ?>css/css.css" rel="stylesheet" type="text/css"/>
                <link href="<?php echo public_admin() ?>css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
                <link href="<?php echo public_admin() ?>css/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
                <link href="<?php echo public_admin() ?>css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
                <link href="<?php echo public_admin() ?>css/uniform.default.css" rel="stylesheet" type="text/css"/>
                <link href="<?php echo public_admin() ?>css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
                <!-- END GLOBAL MANDATORY STYLES -->
                <!-- BEGIN THEME STYLES -->
                <link href="<?php echo public_admin() ?>css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
                <link href="<?php echo public_admin() ?>css/login.css" id="style_components" rel="stylesheet" type="text/css"/>
                <link href="<?php echo public_admin() ?>css/plugins.css" rel="stylesheet" type="text/css"/>
                <link href="<?php echo public_admin() ?>css/layout.css" rel="stylesheet" type="text/css"/>
                <link id="style_color" href="<?php echo public_admin() ?>css/darkblue.css" rel="stylesheet" type="text/css"/>
                <link href="<?php echo public_admin() ?>css/custom.css" rel="stylesheet" type="text/css"/>
                <link href="<?php echo public_admin() ?>css/style.css" rel="stylesheet" type="text/css"/>
                <!-- END THEME STYLES -->
                <link rel="shortcut icon" href="<?php echo public_admin() ?>logo.ico" type="image/x-icon"/>
            </head>
            <!-- END HEAD -->
            <!-- BEGIN BODY -->
            <body class="login">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="menu-toggler sidebar-toggler"></div>
              
                
                <div class="content" style="margin-top: 100px;"">
                    <!-- BEGIN LOGIN FORM -->
                    <form class="login-form" action="" method="POST">
                        <h3 class="form-title"> Đăng nhập hệ thông</h3>
                       
                        <div class="form-group">
                            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                            <label class="control-label visible-ie8 visible-ie9">Username</label>
                            <input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" placeholder=" Email đăng nhập " name="email" required/>
                        </div>
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">Password</label>
                            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder=" Password " name="password" required/>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success uppercase">Đăng nhập </button>
                           
                        </div>
                        
                       
                    </form>
                  
                </div>
                <div class="copyright">
                    2022 © Đồ án môn học 
                </div>
                
                <script src="<?php echo public_admin() ?>js//jquery.min.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js/jquery-migrate.min.js" type="text/javascript"></script>
                <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
                <script src="<?php echo public_admin() ?>js/jquery-ui.min.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js/bootstrap.min.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js/jquery.slimscroll.min.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js/jquery.blockui.min.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js/jquery.cokie.min.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js/jquery.uniform.min.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js/bootstrap-switch.min.js" type="text/javascript"></script>
                <!-- END CORE PLUGINS -->
                <script src="<?php echo public_admin() ?>js/metronic.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js/layout.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js/quick-sidebar.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js/demo.js" type="text/javascript"></script>
                <!-- END PAGE LEVEL SCRIPTS -->
                <script>
                    jQuery(document).ready(function() {     
                    Metronic.init(); // init metronic core components
                    Layout.init(); // init current layout
                    Login.init();
                    Demo.init();
                    });
                </script>
                <!-- END JAVASCRIPTS -->
            </body>
            <!-- END BODY -->
        </html>