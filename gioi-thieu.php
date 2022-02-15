<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";
    $navactive = "gioi-thieu.php";
?>  
    <?php  require_once __DIR__ . "/include/header.php"; ?>
    
    <div id="maincontent">
        <div class="breadcrumbs theme-clearfix">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a><span class="divider"></span></li>
                   
                    <li class="active"> Giới thiệu </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <?php  require_once __DIR__ . "/include/left.php"; ?>
            <div class="col-md-9 bor" style="padding: 20px;">
                <section>
                  
                    <div class="col-md-12">
                        <div>
							<h3>Nội dung giới thiệu</h3>

								<h1> Shop Thời Trang Cao Cấp </h1>                               

								<p style="font-size: 15px; margin-bottom: 20px"> Shop Thời Trang chúng tôi không đơn thuần là cái đẹp thời trang, chúng tôi khao khát kiến tạo những giá trị xã hội nhân văn, trở thành một lối sống để đồng hành cùng người tiêu dùng trên hành trình thấu cảm vẻ đẹp của chính mình.</p>
                                                              
								<img src="https://assets.turbologo.com/blog/en/2020/01/19084710/louis-vuitton-cover-958x575.png" alt="">
                               
								<p style="font-size: 20px; margin-bottom: 20px"> Đây là trang mua sắm online uy tín hàng đầu, cùng với đội ngũ nhân viên chuyên nghiệp, chúng tôi cam kết đem những sản phẩm tốt nhất, với giá cả phải chăng, uy tín và chất lượng với dịch vụ tốt nhất đến với mọi người...</p>

								<p style="font-size: 20px; margin-bottom: 20px"> Chúng tôi cam kết tất cả những sản phẩm của chúng tôi được nhập về trên tiêu chí bền rẻ đẹp, cố gắng tốt nhất để làm hài lòng mọi người, trên phương diện gần gũi hơn nhưng vẫn giữ nguyên sự trẻ trung và sang trọng..</p>
                                <p style="font-size: 20px; margin-bottom: 20px"> Chiến lực phát triển của chúng tôi là luôn luôn đổi mới, cố gắng tìm tòi những cách thức phục vụ tốt nhất cho nhu cầu thiết yếu  của mọi người..</p>
                                <p style="font-size: 20px; margin-bottom: 20px"> Các sản phẩm của chúng tôi được lựa chọn vải và đặt may tại Việt Nam với tiêu chí “Không qua trung gian – Giá cả hợp lý – Chất lượng đảm bảo” ..</p>
						</div>
                    </div>
                </section>
                <!-- <a href="tin-tuc.php" class="btn btn-xs btn-danger" style="margin: 20px;">Tin khác</a> -->
            </div>
        </div>

        <div class="container" style="margin-top: 20px">
            <div class="col-md-4 bottom-content">
                <a href=""><img src="<?php echo base_url() ?>public/frontend/images/free-shipping.png"></a>
            </div>
            <div class="col-md-4 bottom-content">
                <a href=""><img src="<?php echo base_url() ?>public/frontend/images/guaranteed.png"></a>
            </div>
            <div class="col-md-4 bottom-content">
                <a href=""><img src="<?php echo base_url() ?>public/frontend/images/deal.png"></a>
            </div>
        </div>
      <?php  require_once __DIR__ . "/include/footer.php"; ?>