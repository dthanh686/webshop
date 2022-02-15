<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";
     $navactive = "dia-chi.php";
   
?>  
    <?php  require_once __DIR__ . "/include/header.php"; ?>
    
    <div id="maincontent">
        <div class="breadcrumbs theme-clearfix">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="">Home</a><span class="divider"></span></li>
                    <li class="active"><span> Địa chỉ  </span></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <?php  require_once __DIR__ . "/include/left.php"; ?>
            <div class="col-md-9 bor">
                <section>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3655.1405538086237!2d105.77165081488413!3d21.07234728597475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134552e30eb1139%3A0xd1218a3801e0ca00!2zMTggUGjhu5EgVmnDqm4sIMSQw7RuZyBOZ-G6oWMsIFThu6sgTGnDqm0sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e1!3m2!1svi!2s!4v1639057003727!5m2!1svi!2s" width="840" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                </section>

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