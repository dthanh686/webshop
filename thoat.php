<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";


    unset($_SESSION['auth_name']);
    unset($_SESSION['auth_id']);
    unset($_SESSION['auth_level']);

    $path = $_SERVER['HTTP_REFERER'];
    header("location: index.php");exit();