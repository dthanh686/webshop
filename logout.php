<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";


    unset($_SESSION['admin_name']);
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_level']);

    $path = $_SERVER['HTTP_REFERER'];
    // header("location: index.php");exit();
    redirect('auth/login.php');