<?php 
    /**
    * debug
    **/
    if ( ! function_exists( 'dd' ))
    {
        /**
         * @param $data
         */
        function dd( $data ) {
            echo '<pre class="sf-dump" style=" color: #222; overflow: auto;">';
            echo '<div>Your IP: ' . $_SERVER['REMOTE_ADDR'] . '</div>';
            $debug_backtrace = debug_backtrace();
            $debug = array_shift($debug_backtrace);
            echo '<div>File: ' . $debug['file'] . '</div>';
            echo '<div>Line: ' . $debug['line'] . '</div>';
            if(is_array($data) || is_object($data)) {
                print_r($data);
            }
            else {
                var_dump($data);
            }
            echo '</pre>';
        }
    }

    /****/
    function recursive($listCategory ,$parents = 0 ,$level = 1 ,&$CategoryListSort)
    {
        if(count($listCategory) > 0 )
        {
            foreach ($listCategory as $key => $value) {
                if($value['danhmuccha_id']  == $parents)
                {
                    $value['level'] = $level;
                    $CategoryListSort[] = $value;
                    unset($listCategory[$key]);
                    $newparents = $value['id'];

                    recursive($listCategory , $newparents ,$level + 1 , $CategoryListSort);
                }
            }
        }
    }


    if ( ! function_exists('showcatemenu'))
    {
        function showcatemenu ($danhmuc, $parent_id = 0)
        {
            // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
            $cate_child = array();
            foreach ($danhmuc as $key => $item)
            {
                // Nếu là chuyên mục con thì hiển thị
                if ($item['danhmuccha_id'] == $parent_id)
                {
                    $cate_child[] = $item;
                    unset($danhmuc[$key]);
                }
            }

            // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
            if ($cate_child)
            {
                echo '<ul>';
            
                foreach ($cate_child as $key => $item)
                {
                    $id = $item['id'];
                    ?>
                        <li><a href="danh-muc-san-pham.php?id=<?php echo $id;?>&&slug=<?php echo $item['slug'] ?>"><?php echo $item['tendanhmuc']?> </a>
                    <?php
                    showcatemenu($danhmuc, $item['id']);
                }
                echo '</ul>';
            }
        }

    }



    function base_url()
    {
       return $url  = "http://localhost:8000/";
         return 'http://'.$_SERVER["SERVER_NAME"].'/';
    }

    function base_admin()
    {
        return  base_url() ."admin/";
    }
    function public_admin()
    {
        return base_url() . "public/admin/";
    }

    function modules($url)
    {
        return base_url() . "admin/modules/" .$url.'/' ;
    }
    
     if ( ! function_exists('redirectStyle'))
    {
        function redirectStyle($url = "")
        {
            header("location: ".base_url()."{$url}");exit();
        }
    }



    /**
     *  redirect về các trang 
     */
    if ( ! function_exists('redirectAdmin'))
    {
        function redirectAdmin($url = "")
        {
            header("location: ".base_url()."admin/modules/{$url}/");exit();
        }
    }



    /**
     *  redirect về các trang 
     */
    if ( ! function_exists('redirect'))
    {
        function redirect($url = "")
        {
            header("location: ".base_url().$url.'/');exit();
        }
    }


    /**
     *  redirect home admin 
     */
    if ( ! function_exists('redirectHome'))
    {
        function redirectHome()
        {
            header("location: ".base_url()."admin/");exit();
        }
    }



    /**
    * tao slug
    **/

    function to_slug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }

    if( ! function_exists('xss_clean') ) {
        function xss_clean($data)
        {
            // Fix &entity\n;
            $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
            $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
            $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
            $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

            // Remove any attribute starting with "on" or xmlns
            $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

            // Remove javascript: and vbscript: protocols
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

            // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

            // Remove namespaced elements (we do not need them)
            $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

            do
            {
                // Remove really unwanted tags
                $old_data = $data;
                $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
            }
            while ($old_data !== $data);

            // we are done...
            return $data;
        }
    }


    /**
    * get post
    **/
    function postInput($str)
    {
        return isset($_POST[$str]) ? $_POST[$str] : '';
    }


    function checkLevel($number)
    {
        $number = intval($number);

        switch ($number) {
            case 1:
                return "Mod";
                break;
            case 2:
                return "Boot";
            case 3:
                return "Admin";
            default:
                return "Subperadmin";
                break;
        }
    }


    function selected($key , $val )
    {
        return ($key == $val) ? 'selected = "selected" ' : '';
    }

    function formatprice($number)
    {
        $number = intval($number);
        return number_format($number, 0,',','.') ;
    }


    function checkprice($number)
    {
        $number = intval($number);
        if ($number == 0)
        {
            return "<b class='text-danger'> Hết hàng </b>";
        }
        else if($number > 0 && $number <= 5 )
        {
            return "<b class='text-warning'> Sắp hết </b>";
        }
        else
        {
            return "<b class=''> Còn hàng </b>";
        }
    }

    function checksize($number)
    {
        $number = intval($number);
        if ($number == 1)
        {
            return "35";
        }
        else if($number == 2 )
        {
            return "36";
        }
        else if( $number == 3)
        {
            return "37";
        }
        else if( $number == 4)
        {
            return "38";
        }
        else if( $number == 5)
        {
            return "39";
        }
        else
        {
            return "40";
        }
    }


    function checksumcart($number)
    {
        $number = intval($number);

        if($number > 10000000)
        {
            return 10;
        }
        else if ($number > 8000000)
        {
            return 5;
        }

        else if ($number > 5000000)
        {
            return 2;
        }
        else
        {
            return 0;
        }
    }

    function checkadmin($number)
    {
        $number = intval($number);
        if($number == 1)
        {
            redirectAdmin("tranction");
        }
        else if ($number == 2) {
            redirectAdmin("product");
        }
        else
        {
            redirectHome();
        }
    }


 ?> 