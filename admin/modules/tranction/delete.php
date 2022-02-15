<?php
    require_once __DIR__ . "/../../autoload/autoload.php";
/**
     * lấy id danh mục url
     */
    
    if(isset($_GET['id']) && $_GET['id'] != '')
    {
        $id = $_GET['id'];
        $id = intval($id);
    }

    /**
     *  lấy danh mục có ID = $id;
     *  kiểm tra nếu ko tồn tại trong csdl thì đưa ra thông báo
     */
    
    $donhang = $db->fetchID('donhang',$id);
    if (!$donhang)
    {
        $_SESSION['error'] = ' Không tồn tại ID trong bảng danh mục  !!! ';
        redirectAdmin("tranction");
    }
    

    $sql = " SELECT * FROM chitietdonhang WHERE  donhang_id = $id";
    $chitietdonhang = $db->fetchsql($sql);
    foreach($chitietdonhang as $item)
    {
        $id_donhang = intval($item['donhang_id']);
        $num_or = $db->deletesql("chitietdonhang","donhang_id =  $id_donhang");
    }

    $num = $db->delete("donhang",$id);
    if ($num > 0 )
    {

        $_SESSION['success'] = ' Đã xóa thành công chi tiết đơn hàng và đơn hàng hiện thại!!! ';
        redirectAdmin('tranction');
    }
    else
    {
        $_SESSION['error'] = ' Xóa thất bại  !!! ';
         redirectAdmin('tranction');
    }
   
    