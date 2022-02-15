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
        redirectAdmin("auth");
    }

    $authEdit = $db->fetchID("auth", $id) ;

    if ( ! $authEdit)
    {
        $_SESSION['error'] = ' Không tồn tại ID ';
        redirectAdmin("auth");
    }

    /**
     * kiểm tra danh mục có danh mục con không nếu có thì không cho xóa !
     */


    $num = $db->delete('auth', $id);

    if ($num > 0)
    {
        $_SESSION['success'] = ' Xóa Thành Công ';
        redirectAdmin("auth");
    }
    else
    {
        $_SESSION['error'] = " Xóa Thất Bại";
        redirectAdmin("auth");
    }

 ?>