</div>
    <!-- END CONTAINER -->
     <!-- BEGIN FOOTER -->
                <div class="page-footer">
                    <div class="page-footer-inner">
                        2021 &copy; Đồ án tốt nghiệp 
                    </div>
                    <div class="scroll-to-top">
                        <i class="icon-arrow-up"></i>
                    </div>
                </div>
               
                <script src="<?php echo public_admin() ?>js//jquery.min.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js//jquery-migrate.min.js" type="text/javascript"></script>
                <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
                <script src="<?php echo public_admin() ?>js/jquery-ui.min.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js/bootstrap.min.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
                
                <script src="<?php echo public_admin() ?>js/jquery.slimscroll.min.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js/jquery.blockui.min.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js/jquery.cokie.min.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js/jquery.uniform.min.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js/bootstrap-switch.min.js" type="text/javascript"></script>
                <!-- END CORE PLUGINS -->
                <script src="<?php echo public_admin() ?>js/metronic.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js/layout.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js/quick-sidebar.js" type="text/javascript"></script>
                <script src="<?php echo public_admin() ?>js/demo.js" type="text/javascript"></script>
                <script>
                    jQuery(document).ready(function() {    
                       Metronic.init(); // init metronic core components
                    Layout.init(); // init current layout
                    QuickSidebar.init(); // init quick sidebar
                    Demo.init(); // init demo features
                    });
                </script>
                <!-- END JAVASCRIPTS -->
            </body>
            <!-- END BODY -->
        </html>



<script type="text/javascript">
    /**
     * load image thunbar
     */
   
    var loadFileThunbar = function(event) {
        var outputthunbar = document.getElementsByClassName('outputthunbar');
        outputthunbar[0].src = URL.createObjectURL(event.target.files[0]);
    };



   $(function(){
         showactivemenu = $(".page-sidebar-menu li");
        for (var i = 0; i < showactivemenu.length; i++)
        {
            if($(showactivemenu[i]).hasClass("open"))
            {
                $(this).addClass("active");
            }
            else
            {
                $(this).removeClass("active");
            }
        }
   });
</script>