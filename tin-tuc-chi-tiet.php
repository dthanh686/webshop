<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";


    if(isset($_GET['id']) && $_GET['id'] != '')
    {
        $id = $_GET['id'];
        $id = intval($id);
    }
    $tintuc = $db->fetchID('tintuc',$id);

   
?>  
    <?php  require_once __DIR__ . "/include/header.php"; ?>
    
    <div id="maincontent">
        <div class="breadcrumbs theme-clearfix">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a><span class="divider"></span></li>
                    <li class=""><a href="tin-tuc.php"><span> Tin tức </span></a></li>
                    <li ><span> Tin tức chi tiết  </span></li>
                    <li class="active"><?php echo $tintuc['slug'] ?></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <?php  require_once __DIR__ . "/include/left.php"; ?>
            <div class="col-md-9 bor" style="padding: 10px;">
                <section>
                  
                    <div class="col-md-12">
                        <h2 style="padding: 20px 20px 20px 1px"><?php echo $tintuc['tieude'] ?></h2>
                        <div style="text-align: justify">
                            <?php echo $tintuc['noidung'] ?>
                        </div>
                    </div>
                </section>
                <a href="tin-tuc.php" class="btn btn-xs btn-danger" style="margin: 20px;">Tin khác</a>
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