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
    $_SESSION['success'] = ' Xóa thành công ';
    unset($_SESSION['cart'][$id]);
    header("location: ".$path);
?>