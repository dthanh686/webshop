<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";

    

     // lấy giá trị từ các ô input

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $danhgia    = postInput('danhgia');
        
        $error = [];
       
        if( $danhgia == "" )
        {
            $error['danhgia'] = "Mời bạn chọn thông tin  !";
        }

        if (empty($error))
        {
            $danhgiaupdate = $db->fetchID("danhgia",1);
            if ($danhgia == 1)
            {
                
                $data = [
                    'yes' => intval($danhgiaupdate['yes']) + 1,
                    'sum' => intval($danhgiaupdate['sum']) + 1 
                ];
                $id_update = $db->update("danhgia", $data,array("id" =>1) );
            }
            else
            {
                $data = [
                    'no' => intval($danhgiaupdate['no']) + 1,
                    'sum' => intval($danhgiaupdate['sum']) + 1 
                ];
                $id_update = $db->update("danhgia",$data,array("id" => 1));
            }
           
                echo " <script>alert(' Cảm ơn bạn đã đánh giá website của chúng tôi !!!  !'); location.href='index.php';</script>";
            
        }
        else
        {
            $error['trong'] = " Mời bạn điền đầy đủ thông tin. !";
        }
    }
   
?>  
    <?php  require_once __DIR__ . "/include/header.php"; ?>
    
    <div id="maincontent">
        <div class="breadcrumbs theme-clearfix">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a><span class="divider"></span></li>
                    
                    <li class="active">  Đánh giá website </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <?php  require_once __DIR__ . "/include/left.php"; ?>
            <div class="col-md-9 bor" style="padding: 10px;">
                 <div class="panel panel-default">
                    <div class="panel-heading"> <h2> Đánh giá </h2> </div>
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
                                <label class="control-label col-sm-6" for="email"> Hài lòng về dịch vụ và nhân viên của chúng tôi </label>
                                <div class="col-sm-6">
                                    <input type="radio" name="danhgia" value="1">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-4 col-sm-offset-2" for="pwd"> Không hài lòng  </label>
                                <div class="col-sm-6">          
                                    <input type="radio" name="danhgia" value="0">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-info"> Xác nhận </button>
                                </div>
                            </div>
                       
                        </form>
                    </div>
                  </div>
            </div>
        </div>

	
      <?php  require_once __DIR__ . "/include/footer.php"; ?>