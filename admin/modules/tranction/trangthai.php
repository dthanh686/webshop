<?php
    $active = "donhang";
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
    
    $doanhang = $db->fetchID('donhang',$id);
    if (!$doanhang)
    {
        $_SESSION['error'] = ' Không tồn tại ID trong bảng danh mục  !!! ';
        redirectAdmin("tranction");
    }
    /**
     * chuyển đổi trạng thái ! nếu active = 1 thì chuyển sang 0 và ngược lại
     * @var [type]
     */
    
    if($doanhang['trangthai'] == 1)
    {
        $_SESSION['error'] = ' Đã thanh toán không thể trả lại hàng   !!! ';
        redirectAdmin("tranction");  
    }
    else
    {
        $trangthai =  1;
    }


    $doanhang_id = intval($doanhang['id']);
   
    $sql = " SELECT * FROM chitietdonhang WHERE donhang_id =  $doanhang_id";
    $chitiet = $db->fetchsql($sql);
  
    foreach($chitiet as $item)
    {
        $sanpham_id = intval($item['sanpham_id']);
        $soluong = intval($item['soluong']);

        $product = $db->fetchID("sanpham",$sanpham_id);
        $pay     = $product['pay'];

        $number = $product['soluong'] - $soluong;
        $pays = $product['pay'] + 1;
        $id_updates = $db->update("sanpham",array('soluong' => $number,'pay' => $pays),array('id' => $sanpham_id));
    }




    $data = array('trangthai' => $trangthai,'updated_at' => $updatetime);
    
    $id_update = $db->update("donhang",$data , array("id" => $id ));
    $_SESSION['success'] = ' Thanh toán thành công   !!! ';
    redirectAdmin("tranction");   

?>