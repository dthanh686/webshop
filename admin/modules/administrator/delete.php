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
        redirectAdmin("administrator");
    }

    $adminDelete = $db->fetchID("admin", $id) ;


    if ( ! $adminDelete)
    {
        $_SESSION['error'] = ' Không tồn tại ID ';
        redirectAdmin("administrator");
    }

    if ($_SESSION['admin_id'] ==  $adminDelete['id'] || $adminDelete['id']  ==  4)
    {
        $_SESSION['error'] = '  Không thể xóa  !!!  ';
        redirectAdmin("administrator");
    }

   

    /**
     * kiểm tra danh mục có danh mục con không nếu có thì không cho xóa !
     */


    $num = $db->delete('admin', $id);

    if ($num > 0)
    {
        $_SESSION['success'] = ' Xóa Thành Công ';
        redirectAdmin("administrator");
    }
    else
    {
        $_SESSION['error'] = " Xóa Thất Bại";
        redirectAdmin("administrator");
    }

 ?>