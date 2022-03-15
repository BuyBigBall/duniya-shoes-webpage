@extends('layouts.app')
@section('content')


<body>
    <link rel="stylesheet" href="{{ asset('/css/detail_page.css') }}" />
    <script type="text/javascript" src="{{asset('js/html5ext.js')}}"></script>
    <script src="{{asset('js/JS-DESIGNNER-3D.js')}}"></script>
    <script src="{{asset('js/deesignProduct.js')}}"></script>
    <script src="{{asset('js/detail_preload.js')}}"></script>
    <script>
        /* global precessDesignnerShoe , listEle , deesignProduct , listEle*/
        $(document).ready(function() {
            var itemArr = {
                "1": {
                    "COUPON_STATUS": null,
                    "SEX": "M",
                    "DESIGN_TYPE": "designer",
                    "MODELNO": "CR002",
                    "productType": "ShoeCream",
                    "productLabel": "ShoeCare",
                    "productName": "Model Title",
                    "getQty": 1,
                    "countSession": 1,
                    "PRICE": 25.5,
                    "SHIPPING": 9.99,
                    "MIX_PRICE": 0,
                    "SUMPRICE": 25.5,
                    "PRICE_SOLEMIX": 0,
                    "PRICE_SYMBOLIC": 0
                }
            };
            loadLanguage("");
            listEle.objLang = <?php echo getLanguage();  ?>;

            deesignProduct.config({
                itemArr: itemArr
            });
            setLanguage();
            slideMin();
            $(document).keydown(function(e) {
                if (e.keyCode === 37) {
                    if (slideMinVar.count > 0) {
                        slideMinVar.count--;
                        $('.MainSlideList').animate({
                            'marginLeft': slideMinVar.listSlideWidth * (-slideMinVar.count)
                        }, 700);
                    }
                }
                if (e.keyCode === 39) {
                    if (slideMinVar.count < (slideMinVar.listSlideLength - 1)) {
                        slideMinVar.count++;
                        $('.MainSlideList').animate({
                            'marginLeft': slideMinVar.listSlideWidth * (-slideMinVar.count)
                        }, 700);
                    }
                }
            });
        });

        /*################### Call function Slide var #################*/
        var slideMinVar = {
            count: 0,
            MainSlide: 1024,
            listSlideWidth: 1024,
            listSlideLength: ''
        };
    </script>
    <div id="preloadImg"><canvas id="gauge">Your browser does not support the HTML5 canvas tag.</canvas></div>
    <div id="content">
        <div id="content-layout">
            @include('layouts.topmenu')
            <div style="text-align: center">
                <img src="{{asset('images/logo-iShoes.png') }}" alt="" style="width:223px; height:88px">
            </div>
            <div style="width: 1024px;margin: auto;overflow: auto" id="productDetail">
                <div class="MainSlide">
                    <div class="MainSlideList">
                        <span class="btnSlide" id="btnBack" style="width: 20px;overflow: auto;z-index: 999"><img src="{{asset('images/icon/btn-back.png') }}" alt=""></span>
                        <span class="btnSlide" id="btnNext" style="min-width: 50px;overflow: auto;z-index: 999"><img src="{{asset('images/icon/btn-next.png') }}" alt=""></span>
                        <div class="list-slide">
                            <div style="float: left">
                                <div id="detail">
                                    <div style="font-size: 20px!important;font-weight: bold;text-align: right">
                                        <span id="total-count" style="font-size: 20px!important;font-weight: bold;">1</span>/1
                                    </div>
                                    <br>
                                    <div>
                                        <ul style="float: left">
                                            <li class="head" data-lang="shoe-care">Shoe Care</li>
                                            <li><span class="sp-title" data-lang="product-no">Product No</span>: <span class="sp-detail">CR002</span></li>
                                            <li><span class="sp-title" data-lang="product-name">Product Name</span>:
                                                <span class="sp-detail">Model Title</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="list-social" style="clear: left">
                                    <br>
                                    <br>
                                    <br>
                                    <ul>
                                        <li><a title="iTailor Facebook" target="_bank" href="https://www.facebook.com/iTailorShirts"><img src="{{asset('images/icon/iconFaceBook.png') }}" /></a></li>
                                        <li><a title="iTailor Twitter" target="_bank" href="http://twitter.com/iTailorshirts"><img src="{{asset('images/icon/iconTwitter.png') }}" /></a></li>
                                        <li><a title="iTailor Youtube" target="_bank" href="http://www.youtube.com/user/iTailorshirt"><img src="{{asset('images/icon/iconYoutube.png') }}" /></a></li>
                                        <li><a title="iTailor Pinterest" target="_bank" href="http://pinterest.com/itailor"><img src="{{asset('images/icon/iconPinterest.png') }}" /></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div style="float: right;">
                                <div class="design">
                                    <span class="imgs1 shoecream-designer"></span>
                                </div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                slideMinVar.count = -1;
                                $('#btnBack').trigger('click');
                            });
                        </script>
                    </div>
                </div>
                <span style="position: absolute; right: 20px; top:105px; cursor: pointer;">
                    <a style="font-weight: bold !important; font-size: 20px !important; color: #fffcc8 !important;" href="checkout" data-lang="go-back">Go Back</a>
                </span>
            </div>
        </div>
    </div>
    @endsection
    <!-- <nav>
        <div id="footer">
            <ul>
                <li><a href="../designbelts/" target="_blank" title="iTailor Custom Made Belts"><span>CUSTOM BELT</span>
                        29.95 &euro;</a></li>
                <li><a href="http://www.itailor.com/designshirts/" target="_blank" title="iTailor Tailored Shirts"><span data-lang="tailored-shirts" data-traffic="link-shirt">TAILORED SHIRTS</span> 39.95
                        &euro;</a></li>
                <li><a href="http://www.itailor.com/designsuits/" target="_blank" title="iTailor Tailored Suits"><span data-lang="tailored-suits" data-traffic="link-suit">TAILORED SUITS</span> 139 &euro;</a>
                </li>
                <li><a href="http://www.itailor.com/about-us.php" target="_blank" title="iTailor About Us" data-lang="about-us" data-traffic="link-about">About Us</a></li>
                <li><a href="http://www.itailor.com/faq.php" target="_blank" title="iTailor FAQ" data-lang="faq" data-traffic="link-faq">FAQ</a></li>
                <li><a href="http://www.itailor.com/contact-us.php" target="_blank" title="iTailor Contact Us" data-lang="contact-us" data-traffic="link-contact">Contact Us</a></li>
                <li data-traffic="link-subscribe" class="linkSubscribe" data-lang="subscribe">SUBSCRIBE</li>
            </ul>
        </div>
    </nav>
    <div id="modal">
        <div id="login-box">
            <h2 data-lang="login">LOGIN</h2>
            <form id="login-form" name="login-form" method="post" action="">
                <div><span data-lang="email">Email: </span><input type="email" name="email"></div>
                <div><span data-lang="password">Password: </span><input type="password" name="password"></div>
                <p class="p1"><a href="#" class="forgetpass" data-lang="forgot-password" data-traffic="popup-forgot">Forgot your Password</a></p>
                <div>
                    <button type="button" class="btnstep" id="submitform" data-lang="login">Login</button>
                    <button type="button" class="btnstep" onclick="closeModal('', 'modal')" data-lang="exit">Exit</button>
                </div>
                <p class="p2"><a href="javascript:void(0)" class="btnstep RegMember" data-lang="register-new-member" data-traffic="popup-register">Register New Member</a></p>

                <span data-lang="detail-login">For first time customers,please proceed to design your order.During
                    checkout,you will be able to submit your email and password to setup an account with us.Enjoy your
                    designing experience on iTailor.</span>
            </form>
        </div>
        <div id="forgot-box">
            <h2><span data-lang="forgot-password">Forgot your Password</span></h2>
            <span style="margin-bottom:80px">
                <span data-lang="detail-forget-line1">Just enter the email address associated with your itailor account
                    below and click send.</span>
                <br>
                <br>
                <span data-lang="detail-forget-line2"> You will shortly receive an email containing your
                    password.</span>
            </span>
            <form id="forgot-form" name="forgot-form" method="post" action="">
                <div><span data-lang="email">Email: </span><input type="email" name="lostpass" style="width: 70%"></div>
                <div>
                    <button type="button" class="btnstep" id="submitforgot" data-lang="send">Send</button>
                    <button type="button" class="btnstep" onclick="closeModal('', 'modal')" data-lang="exit">Exit</button>
                </div>
            </form>
        </div>
    </div>
    <div id="modal-paypal"><img id="plp" src="webroot/img/loader6.gif"></div>

</body>

</html> -->