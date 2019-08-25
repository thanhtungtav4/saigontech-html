<footer id="footer">
    <div class="footer-top">
        <div class="container">
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-lg-2">
                <div class="logo-footer">
                    <img src="img/logo-white.png">
                </div>
            </div>
            <div class="col-md-5 col-lg-5">
                <div class="info-footer">
                    <p class="info-1">CÔNG TY TNHH DỊCH VỤ & GIẢI PHÁP SAIGON SOFTTECH</p>
                    <p>Lầu 2, Tòa nhà SFC, Số 9, Đinh Tiên Hoàng, Phường Đakao, Quận 1, TPHCM</p>
                    <p>Điện thoại: 028 3838 9292</p>
                    <p>Fax: 028 3838 9393</p>
                    <p>Email: saigonsofttech@sst.com.vn</p>
                    <p>Website: saigonsofttech.com.vn</p>
                </div>
            </div>
            <div class="col-md-5 col-lg-5">
                <div class="row">
                    <div class="col">
                        <ul>
                            <li><a href="#">Giới thiệu</a> </li>
                            <li> <a href="#">Giải pháp IoT</a></li>
                            <li> <a href="#">Giải pháp viễn thông</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul>
                            <li><a href="#">Giải pháp hệ thống</a> </li>
                            <li> <a href="#">Liên hệ</a></li>
                            <li> <a href="#">Tin tức</a></li>
                        </ul>
                    </div>
                </div>
                <div class="mt-social">
                    Kết nối với chúng tôi
                    <ul>
                        <li><a href="#"> <img src="img/icon/facebook.png"></a></li>
                        <li><a href="#"> <img src="img/icon/twitter.png"></a></li>
                        <li><a href="#"> <img src="img/icon/google.png"></a></li>
                        <li><a href="#"> <img src="img/icon/youtube.png"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_dow">
        <p>© 2019 - Công ty TNHH dịch vụ & giải pháp SAIGON SOFTTECH</p>
    </div>
</footer>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/superfish/hoverIntent.js"></script>
<script src="lib/superfish/superfish.min.js"></script>
<script src="lib/owl/owl.carousel.js"></script>
<!-- Template Main Javascript File -->
<script src="js/main.js"></script>
<script>
    jQuery("#carousel").owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        navText: ["<i class=\"fa fa-arrow-left\"></i>","<i class=\"fa fa-arrow-right\"></i>"],
        responsive:{
            0:{
                items:2
            },
            600:{
                items:4
            },
            1000:{
                items:6
            }
        }

    })
    jQuery("#123").owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        items:1,
        navText: ["<i class=\"fa fa-arrow-left\"></i>","<i class=\"fa fa-arrow-right\"></i>"],

    })
    if (document.documentElement.clientWidth > 992) {

        $(document).ready(function() {

            var sync1 = $("#sync1");
            var sync2 = $("#sync2");
            var slidesPerPage = 3; //globaly define number of elements per page
            var syncedSecondary = true;

            sync1.owlCarousel({
                items : 1,
                slideSpeed : 2000,
                center:true,
                nav: false,
                dots:false,
                autoplay: true,
                loop: true,
                responsiveRefreshRate : 200,


            }).on('changed.owl.carousel', syncPosition);

            sync2
                .on('initialized.owl.carousel', function () {
                    sync2.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items : slidesPerPage,
                    nav: true,
                    dots:false,
                    center:true,
                    smartSpeed: 200,
                    slideSpeed : 500,
                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
                    responsiveRefreshRate : 100
                }).on('changed.owl.carousel', syncPosition2);

            function syncPosition(el) {
                //if you set loop to false, you have to restore this next line
                //var current = el.item.index;

                //if you disable loop you have to comment this block
                var count = el.item.count-1;
                var current = Math.round(el.item.index - (el.item.count/2) - .5);

                if(current < 0) {
                    current = count;
                }
                if(current > count) {
                    current = 0;
                }

                //end block

                sync2
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync2.find('.owl-item.active').length - 1;
                var start = sync2.find('.owl-item.active').first().index();
                var end = sync2.find('.owl-item.active').last().index();

                if (current > end) {
                    sync2.data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    sync2.data('owl.carousel').to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if(syncedSecondary) {
                    var number = el.item.index;
                    sync1.data('owl.carousel').to(number, 100, true);
                }
            }

            sync2.on("click", ".owl-item", function(e){
                e.preventDefault();
                var number = $(this).index();
                sync1.data('owl.carousel').to(number, 300, true);
            });
        });
    }
    if (document.documentElement.clientWidth < 992) {

    }


</script>

</body>
</html>
