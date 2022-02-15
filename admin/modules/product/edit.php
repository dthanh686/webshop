<?php

    /**
     * gọi file autoload
     */
    
     $open = "dm";
    $active = "product";
    include __DIR__ ."/../../autoload/autoload.php";
    $nhacc = $db->fetchAll('nhacungcap');
    /**
     *  lấy id url
     */
   
    if (isset($_GET['id']) && $_GET['id']  != '')
    {
        $id = intval($_GET['id']);
    }
    else
    {
        $_SESSION['error'] = ' Không tồn tại ID ';
        redirectAdmin("product");
    }

    $productEdit = $db->fetchID("sanpham", $id) ;

    if ( ! $productEdit)
    {
        $_SESSION['error'] = ' Không tồn tại ID ';
        redirectAdmin("product");
    }


   /**
    *  xử lý
    */
   
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $error = [];

        $tensanpham = postInput("tensanpham");
        $gianhap    = postInput("gianhap");
        $gia        = postInput("gia");
        $giamgia    = postInput("giamgia");
        $danhmuc_id = postInput("danhmuc_id");
        $hot        = postInput("hot");
        $soluong    = postInput("soluong");
        $mota       = postInput("mota");
        $nhacc      = postInput("nhacc");
        $size       = postInput("size");



        if ($tensanpham == '')
        {
            $error['tensanpham'] = " Tên sản phẩm không được để trống !";
        }
        if ($gianhap == '')
        {
            $error['gianhap'] = " Giá nhập vào  không được để trống !";
        }
        if ($gia == '')
        {
            $error['gia'] = " Giá không được để trống !";
        }

        if ($danhmuc_id == '')
        {
            $error['danhmuc_id'] = " Danh mục sản  phẩm không được để trống !";
        }

        if ($soluong == '')
        {
            $error['soluong'] = "Sô lượngsản phẩm không được để trống !";
        }

        if ($mota == '')
        {
            $error['mota'] = " Tên sản phẩm không được để trống !";
        }
        
       

        if( empty($error))
        {
            $data = [
                'tensanpham'    => $tensanpham,
                'slug'          => to_slug($tensanpham),
                'danhmuc_id'    => $danhmuc_id,
                'gia'           => $gia,
                'giamgia'       => $giamgia,
                'soluong'       => $soluong,
                'mota'          => $mota,
                'nhacungcap_id' => intval($nhacc),
                'gianhap'       => $gianhap,
                'size'          => $size
            ];

            /**
             * upload file 
             */
            if ( isset($_FILES['hinhanh']))
            {
               $file_name = $_FILES['hinhanh']['name'];
               $file_tmp  = $_FILES['hinhanh']['tmp_name'];
               $file_type = $_FILES['hinhanh']['type'];
               $file_erro = $_FILES['hinhanh']['error'];

               if ($file_erro == 0)
               {
                    $part = ROOT ."product/";
                    $data['hinhanh'] = $file_name;
                    move_uploaded_file($file_tmp,$part.$file_name);
               }
            }

            // tiến hành update
            $id_update = $db->update("sanpham" , $data , array("id" => $id));   
            if($id_update > 0)
            {
                $_SESSION['success'] = ' Cập nhậtThành Công ';
                redirectAdmin('product');
                
            }
            else
            {
                $_SESSION['error'] =" Cập nhật  thất bai ";
                 redirectAdmin('product');
            }
        }
    }
?>  

<?php 
    /**
     * goi file header
     */
    include __DIR__ ."/../../layouts/header.php";
 ?>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="<?php echo base_admin() ?>">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                   
                    <li>
                        <a href="index.php" ><i> Sản phẩm </i></a>
                    </li>
                </ul>
                <?php include __DIR__ ."/../../layouts/action.php"; ?>
            </div>
              <?php include __DIR__ ."/../../layouts/notification.php"; ?>
             <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> Cập nhật sản phẩm 
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" method="POST" class="form-horizontal ng-pristine ng-valid" action="" enctype="multipart/form-data">
                       
                        <div class="form-body ">
                            <form id="demo-form2" action="" method="POST"  class="form-horizontal form-label-left bor" novalidate="" enctype="multipart/form-data">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name"> Giá Nhập <span class="required">(*)</span> </label>
                                    <div class="col-md-8">
                                        <input type="number" id="first-name" name="gianhap" class="form-control" value="<?php echo isset($productEdit) ? $productEdit['gianhap'] : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name"> Giá <span class="required">(*)</span> </label>
                                    <div class="col-md-8">
                                        <input type="number" id="first-name" name="gia" class="form-control" value="<?php echo $productEdit['gia'] ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name"> Giảm giá </label>
                                    <div class="col-md-8">
                                        <input type="text" id="first-name" name="giamgia" class="form-control" value="<?php echo $productEdit['giamgia'] ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">  Size </label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="size">
                                            <option value="1" <?php echo isset($productEdit) && $productEdit['size'] == 1 ? "selected='selected'" : ''?>>35</option>
                                            <option value="2" <?php echo isset($productEdit) && $productEdit['size'] == 2 ? "selected='selected'" : ''?>>36</option>
                                            <option value="3" <?php echo isset($productEdit) && $productEdit['size'] == 3 ? "selected='selected'" : ''?>>37</option>
                                            <option value="4" <?php echo isset($productEdit) && $productEdit['size'] == 4 ? "selected='selected'" : ''?>>38</option>
                                            <option value="5" <?php echo isset($productEdit) && $productEdit['size'] == 5 ? "selected='selected'" : ''?>>39</option>
                                            <option value="6" <?php echo isset($productEdit) && $productEdit['size'] == 6 ? "selected='selected'" : ''?>>40</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 border-cus" style="padding-right: 10px">
                                    <div class="form-group">
                                        <label class="custom-file-upload col-md-11" >
                                            <i class="fa fa-file-image-o"></i> Ảnh đại diện
                                            <input type="file" accept="image/*" name="hinhanh" onchange="loadFileThunbar(event)" class="col-md-12">
                                           
                                        </label>
                                        
                                    </div>
                                     <?php if(isset($productEdit['hinhanh']) && $productEdit['hinhanh'] != NULL ) : ?>
                                        <img src="<?php echo base_url() ?>public/uploads/product/<?php echo $productEdit['hinhanh'] ?>" class="col-md-12">
                                    <?php endif ; ?>   
                                    <img  class="outputthunbar" class="col-md-12" width="105%" height="150" />

                                </div>
                            </div>
                            <div class="col-md-9 bor">

                                <div class="form-group">
                                    <label class="control-label col-md-2"> Category  <span class="required">(*)</span></label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="danhmuc_id">
                                            <option value=""> Mời bạn chọn danh mục </option>
                                                <?php foreach($danhmucsort as $item) : ?>
                                                    <option value="<?php echo $item['id'] ?>" <?php echo isset($productEdit) && $productEdit['danhmuc_id'] == $item['id'] ? "selected = 'selected'" : '' ?>> <?php $str = ''; for($i = 0 ; $i < $item['level']; $i++){ echo $str; $str.="| - -";} ?> <?php echo $item['tendanhmuc'] ?>  </option>
                                                <?php endforeach ; ?>                              
                                        </select>
                                      
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="control-label col-md-2"> Nhà cung cấp   <span class="required">(*)</span></label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="nhacc">
                                            <option value=""> Mời bạn chọn nhà cung cấp </option>
                                                <?php foreach($nhacc as $item) : ?>
                                                    <option value="<?php echo $item['id'] ?>" <?php echo isset($productEdit) && $productEdit['nhacungcap_id'] == $item['id'] ? "selected = 'selected'" : '' ?>> <?php echo $item['tennhacc'] ?>  </option>
                                                <?php endforeach ; ?>                               
                                        </select>
                                      
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="first-name"> Name <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-10">
                                        <input type="text" name="tensanpham" class="form-control col-md-7 col-xs-12" value="<?php echo $productEdit['tensanpham'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="first-name"> Số lượng <span class="required">(*)</span></label>
                                    <div class="col-md-5">
                                       <input type="number" name="soluong" value="<?php echo $productEdit['soluong'] ?>" class="form-control">
                                      
                                    </div>

                                    <label class="control-label col-md-1" for="first-name"> Hot </label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="hot">
                                            <option value="0" <?php echo $productEdit['hot'] == 0 ? "selected='selected'" : '' ?>> No </option>
                                            <option value="1" <?php echo $productEdit['hot'] == 1 ? "selected='selected'" : '' ?>> Yes </option>
                                        </select>
                                    </div>

                                    
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="first-name"> Mô tả <span class="required">(*)</span>
                                    </label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" id="content" name="mota"><?php echo $productEdit['mota'] ?></textarea>
                                        <script type="text/javascript">
                                            CKEDITOR.replace( 'content');
                                        </script>
                                       
                                    </div>
                                </div>
                                    
                            </div>

                            <div class="clearfix"></div>
                            <div class="ln_solid"></div>
                           
                      
                        </div>
                        <div class="form-actions right">
                            <button type="submit" class="btn green">Lưu</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>

 <?php 
    /**
     * goi file footer
     */
    include __DIR__ ."/../../layouts/footer.php";
 ?>