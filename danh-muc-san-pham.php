<?php

    /**
     * gọi file autoload
     */

use libraries\Url\Input;

require_once __DIR__ . "/autoload/autoload.php";

    $showPrice = 'true';
    $path = $_SERVER['SCRIPT_NAME'];

    if (isset($_GET['id']) && $_GET['id']  != '')
    {
        $id = intval($_GET['id']);
    }
    if (isset($_GET['slug']))
    {
        $slug = $_GET['slug'];
    }


    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p = 1;
    }


    /**
     *  lấy danh sách sản phẩm
     */


    $sql = " SELECT count($id) as tongso FROM sanpham  WHERE 1 AND danhmuc_id = $id";
    $tongsobanghi = $db->fetchsql($sql);


    $sqldanhmuc = " SELECT sanpham.*, danhmuc.tendanhmuc as danhmuc FROM sanpham 
        LEFT JOIN danhmuc ON danhmuc.id = sanpham.danhmuc_id
        WHERE 1 AND danhmuc_id = $id";

    if( Input::get('price'))
    {
        $key = Input::get('price');
        if(array_key_exists($key,$arrayPrice))
        {

            if(count($arrayPrice[$key]) == 2)
            {
                $sqldanhmuc .= ' AND gia BETWEEN ' .$arrayPrice[$key][0] . ' AND ' . $arrayPrice[$key][1] . ' ';
            }else
            {
                $sqldanhmuc .= ' AND gia > ' .$arrayPrice[$key][0] . ' ';
            }
        }else
        {
            $sqldanhmuc .= ' AND gia <=  1000000';
        }


        $filter['price'] = $key;
    }

    $sanpham = $db->fetchJone('sanpham',$sqldanhmuc,$page = $p,12,true);
    if(count($sanpham) == 0)
    {
        $error = "Dữ liệu đang được cập nhật ";
    }
    if(isset($sanpham['page']))
    {
        $sotrang =  $sanpham['page'];
        unset($sanpham['page']);
    }


?>
    <?php  require_once __DIR__ . "/include/header.php"; ?>
    <div id="maincontent">
        <div class="breadcrumbs theme-clearfix">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="">Home</a><span class="divider"></span></li>
                    <li class="active"><span> Danh mục sản phẩm </span></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <?php  require_once __DIR__ . "/include/left.php"; ?>
            <div class="col-md-9 bor">

                <section class="box-main1">
                    <h3 class="title-main"><a href=""> Danh sách sản  phẩm </a> </h3>

                    <div class="showitem">
                        <?php foreach($sanpham as $item) :?>
                            <div class="col-md-3 item-product bor">
                                <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>">
                                    <img src="<?php echo base_url() ?>/public/uploads/product/<?php echo $item['hinhanh'] ?>" class="" width="100%" height="180">
                                </a>
                                <div class="info-item">
                                    <a href=""><?php echo $item['tensanpham'] ?></a>
                                    <p><strike class="sale"><?php echo formatprice($item['gia']) ?>đ</strike> <b class="price"><?php echo formatprice($item['gia'] * (100 - $item['giamgia'])/100) ?> đ</b></p>
                                </div>
                                <div class="hidenitem">
                                    <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>"><i class="fa fa-search"></i></a></p>
                                   <p><a href="yeuthich.php?id=<?php echo $item['id'] ?>" title="Thêm vào sản phẩm yêu thích "><i class="fa fa-heart"></i></a></p>
                                    <p><a href="them-gio-hang.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                </div>
                            </div>
                        <?php endforeach ; ?>
                    </div>


                </section>

                <div class="row col-md-12 text-center">
                    <nav aria-label="Page navigation" class="clearfix">
                        <ul class="pagination" >
                            <li>
                                <a href=""  aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            <?php for(  $i = 1 ; $i <= $sotrang ; $i++ ) : ?>
                                <?php
                                if(isset($_GET['page']))
                                {
                                    $p = $_GET['page'];
                                }
                                else
                                {
                                    $p = 1;
                                }
                                ?>
                                <li class="<?php echo ($i == $p) ? 'active' : ''  ?>">

                                    <a href="<?php echo $path ?>?id=<?php echo $id ?>&&slug=<?php echo $slug ?>&&page=<?php echo $i ;?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>

                            <li>
                                <a href="" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>


            </div>
        </div>

      <?php  require_once __DIR__ . "/include/footer.php"; ?>