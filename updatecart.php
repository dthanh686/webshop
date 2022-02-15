<?php 


    require_once __DIR__ . "/autoload/autoload.php";
    if ( ! isset($_SESSION['cart'] ))
    {
        echo " <script>alert('  Chưa có sản phẩm trong giỏ hàng   !'); location.href='index.php';</script>";
    }
    
    if(isset($_POST['key']) && $_POST['key'] != NULL)
    {
        $key = $_POST['key'];
    }


    if(isset($_POST['qtyupdate']) && $_POST['qtyupdate'] != NULL)
    {
        $qtyupdate = $_POST['qtyupdate'];
    }

    $size = $_POST['size'];

    if ( $key && $qtyupdate)
    {
        $_SESSION['cart'][$key]['qty'] = $qtyupdate;
        $_SESSION['cart'][$key]['size'] = $size;
        $data = 1;
    }
    else
    {
        $data = 0;
    }
    echo  $data;
 ?>