<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";
    $sum = 0;
?>  
    <?php  require_once __DIR__ . "/include/header.php"; ?>
    <div id="maincontent">
        <div class="breadcrumbs theme-clearfix">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="">Home</a><span class="divider"></span></li>
                    <li class="active"><span> Thông báo  thanh toán thành công  </span></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <?php  require_once __DIR__ . "/include/left.php"; ?>
            <div class="col-md-9 bor">
                <section class="box-main1" style="margin-bottom: 20px;">
                    <h3 class="title-main"><a href=""> Giỏ hàng của bạn !!  </a> </h3>
                </section>
                <?php 

                    if(isset($_SESSION['success']))
                    {
                         echo "<div class='alert alert-success customalert' id='alertjs'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                ".$_SESSION['success']."
                            </div>";

                        unset($_SESSION['success']);
                    }
                ?>

        <a href="index.php" class="btn btn-success" style="margin-bottom: 20px">Trở về trang chủ </a>
            </div>
        </div>

      <?php  require_once __DIR__ . "/include/footer.php"; ?>