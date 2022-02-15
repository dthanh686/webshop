<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";

    $navactive = "tin-tuc.php";

    if(isset($_GET['id']))
    {
        $id = intval($_GET['id']);
    }
    
    /**
     *  lấy danh sách sản phẩm
     */
    $product = $db->fetchID('sanpham' , $id );
    $yt = intval($product['yeuthich'] + 1);

    $update = $db->update('sanpham',array('yeuthich' => $yt) , array('id' => $id));
    echo " <script>alert('  Cảm ơn bạn đã đánh giá sản phẩm    !'); location.href='index.php';</script>";
   
?>  
