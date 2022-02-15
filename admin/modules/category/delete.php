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
        redirectAdmin("category");
    }

    $categoryEdit = $db->fetchID("danhmuc", $id) ;

    if ( ! $categoryEdit)
    {
        $_SESSION['error'] = ' Không tồn tại ID ';
        redirectAdmin("category");
    }


    $product = "SELECT * FROM sanpham WHERE danhmuc_id = $id";
    $productDelete = $db->fetchsql($product);
    
    if (count($productDelete) > 0)
    {
        $_SESSION['error'] = '  Không thể xóa danh mục này vì nó chứa dữ liệu kèm theo !!! ';
        redirectAdmin("category");
    }

    /**
     * kiểm tra danh mục có danh mục con không nếu có thì không cho xóa !
     */
    
    recursive($listCategory , $parents = $id, $level = 1 , $children);
    
    if( $children )
    {
        $_SESSION['error'] = ' Mời bạn xóa danh mục con trước rồi xóa danh mục cha ';
        redirectAdmin("category");
    }


    $num = $db->delete('danhmuc', $id);

    if ($num > 0)
    {
        $_SESSION['success'] = ' Xóa Thành Công ';
        redirectAdmin("category");
    }
    else
    {
        $_SESSION['error'] = " Xóa Thất Bại";
        redirectAdmin("category");
    }

 ?>