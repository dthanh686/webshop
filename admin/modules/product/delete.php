<?php

    /**
     * gọi file autoload
     */
    
    include __DIR__ ."/../../autoload/autoload.php";

    /**
     *  lấy id url
     */
    
    if (isset($_GET['id']) && $_GET['id']  != '')
    {
        $id = intval($_GET['id']);
    }
    else
    {
        $_SESSION['error'] = ' Không tồn tại ID ';
        redirectAdmin("product");
    }

    $productEdit = $db->fetchID("sanpham", $id) ;

    if ( ! $productEdit)
    {
        $_SESSION['error'] = ' Không tồn tại ID ';
        redirectAdmin("product");
    }

    /**
     * kiểm tra danh mục có danh mục con không nếu có thì không cho xóa !
     */


    $num = $db->delete('sanpham', $id);

    if ($num > 0)
    {
        $_SESSION['success'] = ' Xóa Thành Công ';
        redirectAdmin("product");
    }
    else
    {
        $_SESSION['error'] = " Xóa Thất Bại";
        redirectAdmin("product");
    }

 ?>