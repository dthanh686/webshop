<?php
    require_once __DIR__ . "/autoload/autoload.php";
    /**
     *  xử lý giỏ hàng
     */
    $path = $_SERVER["HTTP_REFERER"];

    if(isset($_GET['id']) && $_GET['id'] != '')
    {
        $id = $_GET['id'];
        $id = intval($id);
    }


   
    /**
     *  lấy bài viết có ID = $id;
     */
    
    $sanpham = $db->fetchID('sanpham',$id);
    if (!$sanpham)
    {
         echo " <script>alert('Không tồn tại sản phẩm trong  kho hàng !'); location.href='index.php';</script>";
    }

    // session_destroy();
    if(isset($_SESSION['cart'][$id]))
    {
        $qty        = $_SESSION['cart'][$id]['qty'] + 1;
        $tensanpham = $sanpham['tensanpham'];
        $gia        = $sanpham['gia'];
        $hinhanh    = $sanpham['hinhanh'];
        $size       = $sanpham['size'];
    }
    else
    {
        $qty        = 1;
        $tensanpham = $sanpham['tensanpham'];
        $gia        = $sanpham['gia'];
        $hinhanh    = $sanpham['hinhanh'];
        $size       = $sanpham['size'];
    }

    if ( $sanpham['giamgia'] > 0)
    {
        $gia = $sanpham['gia'] * (100 - $sanpham['giamgia'] ) /  100  ;
    }
    

    
    $_SESSION['cart'][$id]['qty']           = $qty;
    $_SESSION['cart'][$id]['tensanpham']    = $tensanpham;
    $_SESSION['cart'][$id]['gia']           = $gia; 
    $_SESSION['cart'][$id]['hinhanh']       = $hinhanh;
    $_SESSION['cart'][$id]['size']          = $size;

    header("location: ".$path);
?>