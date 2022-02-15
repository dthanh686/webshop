<?php
    /**
     * khai bao session
     */
    session_start();
    
    
    /**
     * goi cac file cấu hình
     * - xử lý database
     * - các hàm xử lý
     *
     *
     * - ý nghĩa  ! dùng để gọi chung tới tất cả các file 
     */
    require_once __DIR__ . "/../../libraries/Database.php";
    require_once __DIR__ . "/../../libraries/Function.php";
    require_once __DIR__ . "/../../libraries/middleware.php";
    /**
     * kiểm tra admin 
     * 
     */
    if(! isset($_SESSION['admin_name']))
    {
        redirect();
    }
    $leveladmin  =  $_SESSION['admin_level'];
    $middleware = new Middeware($active, $leveladmin);
    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/public/uploads/");

     
     /**
     *  lấy time hiện tại 
     */
    $updatetime = date('Y-m-d  H:i:s');
    // tháng 
    $month = date('m');
    // ngày
    $day = date('d');


    //
    $dates = date('Y-m-d');
    while (date('w', strtotime($dates)) != 1) {
        $tmp = strtotime('-1 day', strtotime($dates));
        $dates = date('Y-m-d', $tmp);
    }
 
    $week = date('W', strtotime($dates));
    /**
     *  khởi tạo DB
     */
    
    $db = new Database();


    /**
     * danh sách danh mục
     */
    $danhmuc = $db->fetchAll('danhmuc');
    
    /**
     * sắp xếp
     * @var integer
     */
    recursive($danhmuc , $parents = 0 , $level = 1 , $danhmucsort);


    /**
     * sản phẩm sắp hết
     */
    
    $sql = " SELECT COUNT(id) as sl FROM sanpham WHERE soluong <= 5 ";
    $soluongton = $db->fetchsql($sql);

   


   /**
    * Đếm số hóa đơn chưa xử lý 
    */
   
   $sqldh = "SELECT count(id) as sohh FROM donhang WHERE trangthai = 0";
   $sodonhangf = $db->fetchsql($sqldh);




