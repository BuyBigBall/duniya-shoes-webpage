<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="index, follow" />
        <meta name="keywords" content="iTailor Shoes, iShoes by itailor, itailor shoe, made to measure shoes, custom dress shoes, custom made shoes, mens custom shoes, mens shoes, Mens dress shoes, formal shoes, itailor mens shoes">
        <meta name="description" content="Design your own custom dress shoes, iTailor Shoes limitless possibility on state of the art 3D, Custom made Shoes with more than, listEle, listEle, listEle 100 leather choices and millions of style combination!"/>
        <title>iTailor Shoes, Bespoke shoes, iShoes made to measure</title>
        <link rel="stylesheet" href="webroot/css/style.css"/>
        <link rel="stylesheet" href="webroot/css/jquery.selectbox.css"/>
        <link rel="stylesheet" href="webroot/css/page.css"/>
        <script src="webroot/js/default.js.php"></script> 
        <script src="webroot/js/jquery-1.8.3.min.js"></script>
        <script src="webroot/js/jquery.plugin.min.js"></script>
        <script src="webroot/js/jquery.form.js"></script>
        <script src="webroot/js/itailor-min.js"></script>
        <script src="webroot/js/iShose-min.js"></script>
        <script src="webroot/js/iShose-min-2.js"></script>
        <script src="webroot/js/jquery.address.js"></script>
        <script src="webroot/js/html5ext.js"></script>
        <script src="webroot/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="webroot/js/base64.js"></script>
        <link rel="stylesheet" type="text/css" href="webroot/css/jquery.mCustomScrollbar.css" />
        <script src="webroot/js/JS-DESIGNNER-3D.js"></script>
        <script src="webroot/js/JS-DESIGN.js" type="text/javascript"></script>
        <script src="../designBelts/assets/js/beltDesigner.js" type="text/javascript"></script>
        <script src="webroot/js/deesignProduct.js" type="text/javascript"></script>
        <script>
            loadLanguage("");
        </script>
        <script src="webroot/js/preload.js"></script>
        <script>
            /* global precessDesignnerShoe , listEle , deesignProduct , listEle*/
            $(document).ready(function () {
                var itemArr = {"1":{"modelVersion":"","SEX":"M","getBackNo":"none","getBackNoName":"none","mixSolePriceStatus":"N","symbolicNo":"none","symbolicName":"none","COUPON_STATUS":"Y","getFrontNo":"none","getFrontNoName":"none","getLacesNo":"none","getLacesName":"none","getLeatherNo":"BOF_4","getLeatherNoName":"BOF_4","getLength":"250","getWidth":"120","getQty":1,"getSizeType":"EURO","getSizeTypeName":"EURO","getSizeNo":"38.7","getUnit":"cm","MODELNO":"DS_114","getShape":"Sharp","getShapeName":"Sharp","shoeType":"Monk","getLeatherName":"","getLeather":"","shoeTypeName":"Monk","getMonoIn":"","getMonoOut":"","getSideNo":"none","getSideNoName":"none","getSole":"LT-BB03","getSoleName":"LT-BB03","productType":"shoe","DESIGN_TYPE":"designer","getLiningNo":"SH-SW09","getLiningName":"SH-SW09","ARROW_STR":"black","WRISTBAND_STR":"black","getAccessory":"none","getAccessoryNo":"none","getAccessoryName":"none","THREADCOLORNO_STR":"none","getFront":"none","getSide":"none","getBack":"none","getStitchingNo":"none","getBrogueNo":"none","getBackName":"none","getFrontName":"none","getSideName":"none","getStitchingName":"none","getBrogueName":"none","optionBorderSlim":"N","PRECODE":"","PRE_STATID":null,"countSession":1,"PRICE":149,"SHIPPING":19.95,"MIX_PRICE":0,"SUMPRICE":149,"PRICE_SOLEMIX":0,"PRICE_SYMBOLIC":0},"2":{"modelVersion":"","SEX":"M","getBackNo":"none","getBackNoName":"none","mixSolePriceStatus":"N","symbolicNo":"none","symbolicName":"none","COUPON_STATUS":"Y","getFrontNo":"none","getFrontNoName":"none","getLacesNo":"none","getLacesName":"none","getLeatherNo":"BOF_4","getLeatherNoName":"BOF_4","getLength":"250","getWidth":"120","getQty":1,"getSizeType":"EURO","getSizeTypeName":"EURO","getSizeNo":"38.7","getUnit":"cm","MODELNO":"DS_114","getShape":"Sharp","getShapeName":"Sharp","shoeType":"Monk","getLeatherName":"","getLeather":"","shoeTypeName":"Monk","getMonoIn":"","getMonoOut":"","getSideNo":"none","getSideNoName":"none","getSole":"LT-BB03","getSoleName":"LT-BB03","productType":"shoe","DESIGN_TYPE":"designer","getLiningNo":"SH-SW09","getLiningName":"SH-SW09","ARROW_STR":"black","WRISTBAND_STR":"black","getAccessory":"none","getAccessoryNo":"none","getAccessoryName":"none","THREADCOLORNO_STR":"none","getFront":"none","getSide":"none","getBack":"none","getStitchingNo":"none","getBrogueNo":"none","getBackName":"none","getFrontName":"none","getSideName":"none","getStitchingName":"none","getBrogueName":"none","optionBorderSlim":"N","PRECODE":"","PRE_STATID":null,"countSession":2,"PRICE":149,"SHIPPING":19.95,"MIX_PRICE":0,"SUMPRICE":149,"PRICE_SOLEMIX":0,"PRICE_SYMBOLIC":0}};
                listEle.objLang ={"product":"Product","menu":"MENU","design-idea":"Design idea!","search":"search : ","choose-continue":"Choose & continue","go-back-design-idea":"<< GO BACK","next":"NEXT >>","chkcol1":"Items","chkcol2":"Order Date","chkcol3":"Item Description","chkcol4":"Price","chkcol5":"Shipping","chkcol6":"Qty","chkcol7":"Remove","chkcol8":"Remain","chkcol9":"Curr.","chkcol10":"No.","chkcol11":"Product","total":"Total","view-detail":"View Detail","save-design":"Save Design","couponToggle":"Do you have coupon code?","click-here":"click here","couponInputText":"Coupon No. :","btn-apply":"Apply","btn-cont":"CONTINUE SHOPPING","item-price-text":"item(s) Price :","shipping-text":"Shipping : ","coupon-dis-text":"Coupon Discount : ","total-text":"Total : ","str-customer-info":"Customer Information","first-name":"First Name*:","last-name":"Last Name*:","address":"Address*:","city":"City*:","state":"State(USA)*:","zip-code":"Zip Code*:","country":"Country*:","telphone":"Telphone*:","email":"Email*:","password":"Password*:","str-payment-option":"We offer you payment 2 Option :","str-secure-payment-ssl":"Secure payment through SSL","str-connection-privacy":"connection privacy guranteed","design-by":"Design by  : ","leather-color":"LEATHER COLOR","style-detail":"STYLE : ","shape-style":"SHAPE STYLE","front-style-detail":"FRONT STYLE","side-style":"SIDE STYLE","side-style-monk":"STRAP STYLE","sole-style-detail":"SOLE STYLE","laces-color-detail":"LACES COLOR","stitching-color-detail":"STITCHING COLOR","brogue-design":"BROGUE COLOR","lining-detail":"LINING","measurement-detail":"MEASUREMENT :","legth":"LENGTH","width":"WIDTH","option":"OPTION","max-match":"MIX & MATCH","front-color-detail":"FRONT COLOR","side-color-detail":"Side COLOR","back-color-detail":"BACK COLOR","monogram-detail":"MONOGRAM :","inside-inside":"INSIDE SOLE","outside-sole":"OUTSIDE SOLE","go-back":"Go Back","exit":"EXIT","home":"HOME","x3d-shoes-designer":"3D Shoes Designer","about-us":"About Us","contact-us":"Contact Us","collection":"Collection","design-ideas":"Design ideas","my-account":"My Account","my-wardrobe":"My Wardrobe","logout":"Logout","login":"Login","tailored-shirts":"TAILORED SHIRTS","tailored-suits":"TAILORED SUITS","custom-jeans":"CUSTOM TIES","overcoal":"OVERCOAT","women":"WOMEN","faq":"FAQ","delivery":"Delivery","review":"Review","terms":"Terms","shirt-quality":"Shirt Quality","save-completed":"Save Completed.","ok":"OK","thank":"Thank you.","pay-by-credit-card":"Pay By Credit Card (Paypal)","close":"close","emty-pre-design":"Emty Pre Design.","error":"ERROR","please-contact-customer":"Please Contact Customer Service.","invalid-coupon":"Invalid Coupon.","limit-max-save-design":"Limit Max Save Design 6 Item","email-or-pass":"Email or Password invalid.","do-you-want-remove-item":"Do you want to remove Item Product ?","yes":"Yes","no":"No","register":"Register","forgot-password":"Forgot your Password","register-new-member":"Register New Member","detail-login":"For first time customers,please proceed to design your order.During checkout,you will be able to submit your email and password to setup an account with us.Enjoy your designing experience on iTailor.","detail-forget-line1":"Just enter the email address associated with your itailor account below and click send.","detail-forget-line2":"You will shortly receive an email containing your password.","reg-new-member":"Register New Member","back-color":"Back color:","side-color":"Side color:","front-color":"Front color:","laces-color":"Laces color:","stitching-color":"Stitching color:","brogue-designs":"Brogue Design:","choose-lining":"choose Lining:","monogram-initals":"MONOGRAM\/INITIALS","title-monogram-position":"We offer 2 Monogram position:","inside-lining":"INSIDE LINING","monogram-only":": {English Script Only} ","monogram-outside-sole":"OUTSIDE SOLE","monogram-designed-by":"Designed by","type-of-shoes":"TYPE OF SHOES","oxford-shoes":"OXFORD SHOES","derby-shoes":"DERBY SHOES","boots-shoes":"BOOTS SHOES","monk-shoes":"MONK SHOES","loafers-shoes":"LOAFERS SHOES","fashion-shoes":"FASHION SHOES","choose-types":"CHOOSE SHOE TYPE","style":"STYLE","front-style":"FRONT STYLE","back-style":"BACK STYLE","sole-style":"SOLE STYLE","accessory-style":"ACCESSORY STYLE","special-design":"SPECIAL  DESIGN","mix-match":"Mix & Match","laces-stitching":"Laces\/Stitching","lining":"Lining","monogram":"Monogram","measurement":"MEASUREMENT","bodySize":"Body Size","shopping-cart":"SHOPPING BAG","check-out":"CHECK OUT >>","btn-next-style":"NEXT STEP","btn-undo":"UNDO","btn-redo":"REDO","choose-shape":"Choose Your Shape Style","comment":[],"choose-front":"Choose Your Front Style","choose-side":"Choose Your Side Style","choose-side-monk":"Choose Your Strap Style","choose-back":"Choose Your Back Style","choose-sole":"Choose Your Sole Style","choose-accessory":"Choose Your Accessory Style","page-tag":["Page","Page"],"of":"of","measure-header":"EASY MEASUREMENTS FOR PERFECT FIT","stepOne":"Step 1:","stepTwo":"Step 2:","stepThree":"Step 3:","stepFour":"Step 4:","lengthText":"Length:","valid-text":"*Invalid Number","widthText":"Width:","optSizeText":"Your regular size:","qtyText":"Qty:","btn-back-style":"BACK STEP","btn-add-cart":"ADD TO CART","item":"Item(S)","shipping":"Shipping","sub-total":"Subtotal","cate-1":"PREMIUM LEATHER","cate-2":"FASHION LEATHER","cate-3":"SHEEPSKIN LEATHER","cate-4":"FABRIC","choose-leather":"Choose Your Leather","currency":"Currency","tag-custInform":"Customer Information","tag-measInform":"Sizes","tag-history":"History Ordering","tag-giftCard":"Gift Card","no-product-search":"No Product item Search.","save":"Save","pageof-tag":"of","expire-coupon":"Coupon Expired.","emty-add-cart":"Your cart is Empty.","error-monogram":"Your Monogram is Empty.","shop-by-product":"shop by product","ccc5":"Credit Card Surcharge :","ccc5-desc":"This is for PayPal business transaction commission and exchange rate."};
                deesignProduct.config({itemArr: itemArr});
                setLanguage();
                slideMin();
                $(document).keydown(function (e) {
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

            /*##########################################################*/
            /*################### Call function Slide var #################*/
            /*##########################################################*/
            var slideMinVar = {count: 0, MainSlide: 1024, listSlideWidth: 1024, listSlideLength: ''};
        </script>
        <style>
            body {line-height: 1; font-family: Century Gothic, Century; overflow: hidden;}
            html {background-color: #050304 !important; background-image: none;} 
            #content {width: 100%; background: url("webroot/img/bg/bg-View-Details.jpg") no-repeat; background-position: top center;}
            #content-layout {height: 690px;}
            #productDetail * {margin: 0px; padding: 0px; font-size: 11px !important; color: #FFFFFF;}
            #productDetail #detail {position: relative; float: left; margin: 0px 0px 0px 50px; padding: 10px; overflow: auto; background-color: rgba(5,10,14,0.5); box-shadow: 5px 5px 10px #000000;}
            #productDetail #detail ul {float: left; width: 275px; list-style: none;}
            #productDetail #detail ul li {padding: 6px;}
            #productDetail .head {font-size: 15px !important; font-weight: bold; color: #c8f2fb;}
            #productDetail .sp-title {float: left; padding-left: 10px; width: 130px; color: #8baab1; font-size: 14px !important;}
            #productDetail .sp-detail {padding-left: 7px; color: #f8f9d9; font-size: 14px !important; font-weight: bold;}
            #productDetail .design {position: absolute;}
            #productDetail .design Canvas, #productDetail .design img {position: absolute; top: 80px; right: -11px;}
            #productDetail .design img {top: 160px; max-width: 440px;}
            #productDetail .design .shoe-custom img, #productDetail .design .shoecream-designer img, #productDetail .design .shoetrees-designer img {top: 80px;}
            #productDetail .block-symbolic {text-align: center;}
            #productDetail a:link {text-decoration: none;}
            #productDetail a:hover {text-shadow: 0.1em 0.1em 0.2em #FFFFFF;}
            #productDetail #list-social {margin: auto; width: 135px; text-align: center;}
            #productDetail #list-social li {float: left; margin-right: 5px;}
            #top-menu ul:first-child li:first-child {background: none;}
        </style>
    </head>
    <body>
        <div id="preloadImg"><canvas id="gauge">Your browser does not support the HTML5 canvas tag.</canvas></div>
        <div id="content">
            <div id="content-layout">
                <div id="top-menu">
                    <ul style="float: left;">
    <li><a href="javascript:void(0)" class="linkProduct" data-lang="shop-by-product" style="text-transform: uppercase;font-weight: bold;padding: 0 30px">Shop By Product</a></li>
</ul>
<ul>
    <!--<li><a title="Orthopedic Shoes" href="http://www.itailor.com/orthopedic-shoes/" target="_blank" style="color: #FFA500">Orthopedic Shoes</a></li>-->
    <li><a title="Collection" href="https://www.itailorshoes.com/designershoes/" target="_blank" style="color: #FFA500">Collection</a></li>
    <li class="link-magazine"><a title="Hand-painted Patina Shoes" href="https://www.itailorshoes.com/patina/"  data-lang="patina-shoes" target="_blank" data-traffic="patina-shoes">Patina Shoes</a></li>
    <li><a title="iTailor Design Idea!" href="https://www.itailorshoes.com/designershoes/" target="_blank" data-lang="design-ideas">Design ideas</a></li>
        <li><a class="link-login" title="Login" href="javascript:void(0)" data-lang="login"  data-traffic="link-login">Login</a></li>    <li  style="border:none">
        <span id="list-TopMenus"></span>
        <label class="arrowSlcNo">
            <select id="set_Language" class="myslc" style="z-index: 99999" data-traffic="language">
                <option value="English" selected>English</option><option value="China">China</option><option value="Czech">Czech</option><option value="Danish">Danish</option><option value="Dutch">Dutch</option><option value="Finnish">Finnish</option><option value="French">French</option><option value="German">German</option><option value="Italian">Italian</option><option value="Japanese">Japanese</option><option value="Norwegian">Norwegian</option><option value="Polish">Polish</option><option value="Portugese">Portugese</option><option value="Russian">Russian</option><option value="Spanish">Spanish</option><option value="Swedish">Swedish</option>            </select>
        </label>
    </li>
</ul>                  </div>
                <div style="text-align: center">
                    <img src="webroot/img/logo-iShoes-2.png" alt="">
                </div>
                <div style="width: 1024px;margin: auto;overflow: auto" id="productDetail">
                    <div class="MainSlide">
                        <div class="MainSlideList">
                            <span class="btnSlide" id="btnBack" style="width: 20px;overflow: auto;z-index: 999"><img src="webroot/img/icon/btn-back.png" alt=""></span>
                            <span class="btnSlide" id="btnNext" style="min-width: 50px;overflow: auto;z-index: 999"><img src="webroot/img/icon/btn-next.png" alt=""></span>
                                                                <div class="list-slide">
                                        <div style="float: left">
                                            <div id="detail">
    <div style="font-size: 20px !important; font-weight: bold; text-align: right;">
        <span id="total-count" style="font-size: 20px!important;font-weight: bold;">1</span>/2    </div>
    <br>
    <div>
        <ul style="float: left;">
            <li class="head" data-lang="type-of-shoes">TYPE OF SHOES</li>
            <li><span class="sp-title" data-lang="">Design No.</span>: <span class="sp-detail">DS_114</span></li>
            <li><span class="sp-title" data-lang="type-of-shoes">TYPE OF SHOES</span>: <span class="sp-detail">Monk</span></li>
            <li><span class="sp-title" data-lang="leather-color">LEATHER COLOR</span>: <span class="sp-detail">BOF_4</span></li>
            <li><br /></li>
            <li><span class="head" data-lang="style-detail">STYLE</span></li>
            <li><span class="sp-title" data-lang="shape-style">SHAPE STYLE</span>: <span class="sp-detail">Sharp</span></li>
            <li><span class="sp-title" data-lang="sole-style-detail">SOLE STYLE</span>: <span class="sp-detail">LT-BB03</span></li>
            <li><span class="sp-title" data-lang="">BLAKE STITCH</span>: <span class="sp-detail">No</span></li>
            <li><span class="sp-title" data-lang="laces-color-detail">LACES COLOR</span>: <span class="sp-detail">No</span></li>
            <li><span class="sp-title" data-lang="lining-detail">LINING</span>: <span class="sp-detail">SH-SW09</span></li>
            <li><br /></li>
                        <li><span class="head" data-lang="symbolic-detail">Symbolic</span></li>
            <li>
                <div class="block-symbolic">
                    <img src="../images/models/ishoes/menu/symbolic/view-detail/none.png" title="none">
                </div> 
            </li>
                    </ul>
        <ul style="float: left;width: 250px;">
            <li><span class="head" data-lang="measurement-detail">MEASUREMENT</span></li>
            <li><span class="sp-title" data-lang="legth">LENGTH</span>:<span class="sp-detail">250 cm</span></li>
            <li><span class="sp-title" data-lang="width">WIDTH</span>:<span class="sp-detail">120 cm</span></li>
            <li><span class="sp-title" data-lang="option">OPTION</span>: <span class="sp-detail">EURO 38.7</span><li>
            <li><span class="head" data-lang="max-match">MAX & MATCH</span></li>
            <li><span class="sp-title" data-lang="front-color-detail">FRONT COLOR</span>: <span class="sp-detail">No</span></li>
            <li><span class="sp-title" data-lang="side-color-detail">Side COLOR</span>: <span class="sp-detail">No</span></li>
            <li><span class="sp-title" data-lang="back-color-detail">BACK COLOR</span>: <span class="sp-detail">No</span></li>
            <li><span class="sp-title" data-lang="accessory-color-detail">ACCESSORY COLOR</span>: <span class="sp-detail">No</span></li>
            <li><br /></li>
            <li><span class="head" data-lang="monogram-detail">MONOGRAM</span></li>
            <li><span class="sp-title" data-lang="inside-inside">INSIDE INSIDE</span>:</li>
            <li><span class="sp-detail" style="padding-left:48px;">
                    No                </span>
            </li>
            <li><span class="sp-title" data-lang="outside-sole">OUTSIDE SOLE</span>:</li>
            <li><span class="sp-detail" style="padding-left: 48px;">
                    No                </span>
            </li>
        </ul>
    </div>
</div>
<div id="list-social" style="clear: left;">
    <br /><br /><br />
    <ul>
        <li><a title="iTailor Facebook" target="_bank" href="https://www.facebook.com/iTailorShirts"><img src="webroot/img/icon/iconFaceBook.png"/></a></li>
        <li><a title="iTailor Twitter" target="_bank" href="http://twitter.com/iTailorshirts"><img src="webroot/img/icon/iconTwitter.png"/></a></li>
        <li><a title="iTailor Youtube" target="_bank" href="http://www.youtube.com/user/iTailorshirt"><img src="webroot/img/icon/iconYoutube.png"/></a></li>
        <li><a title="iTailor Pinterest" target="_bank" href="http://pinterest.com/itailor"><img src="webroot/img/icon/iconPinterest.png"/></a></li>
    </ul>
</div>                                        </div>
                                        <div style="float: right;">
                                            <div class="design">
                                                <span class="imgs1 shoe-designer"></span>
                                            </div>
                                        </div>
                                    </div>
                                                                        <div class="list-slide">
                                        <div style="float: left">
                                            <div id="detail">
    <div style="font-size: 20px !important; font-weight: bold; text-align: right;">
        <span id="total-count" style="font-size: 20px!important;font-weight: bold;">2</span>/2    </div>
    <br>
    <div>
        <ul style="float: left;">
            <li class="head" data-lang="type-of-shoes">TYPE OF SHOES</li>
            <li><span class="sp-title" data-lang="">Design No.</span>: <span class="sp-detail">DS_114</span></li>
            <li><span class="sp-title" data-lang="type-of-shoes">TYPE OF SHOES</span>: <span class="sp-detail">Monk</span></li>
            <li><span class="sp-title" data-lang="leather-color">LEATHER COLOR</span>: <span class="sp-detail">BOF_4</span></li>
            <li><br /></li>
            <li><span class="head" data-lang="style-detail">STYLE</span></li>
            <li><span class="sp-title" data-lang="shape-style">SHAPE STYLE</span>: <span class="sp-detail">Sharp</span></li>
            <li><span class="sp-title" data-lang="sole-style-detail">SOLE STYLE</span>: <span class="sp-detail">LT-BB03</span></li>
            <li><span class="sp-title" data-lang="">BLAKE STITCH</span>: <span class="sp-detail">No</span></li>
            <li><span class="sp-title" data-lang="laces-color-detail">LACES COLOR</span>: <span class="sp-detail">No</span></li>
            <li><span class="sp-title" data-lang="lining-detail">LINING</span>: <span class="sp-detail">SH-SW09</span></li>
            <li><br /></li>
                        <li><span class="head" data-lang="symbolic-detail">Symbolic</span></li>
            <li>
                <div class="block-symbolic">
                    <img src="../images/models/ishoes/menu/symbolic/view-detail/none.png" title="none">
                </div> 
            </li>
                    </ul>
        <ul style="float: left;width: 250px;">
            <li><span class="head" data-lang="measurement-detail">MEASUREMENT</span></li>
            <li><span class="sp-title" data-lang="legth">LENGTH</span>:<span class="sp-detail">250 cm</span></li>
            <li><span class="sp-title" data-lang="width">WIDTH</span>:<span class="sp-detail">120 cm</span></li>
            <li><span class="sp-title" data-lang="option">OPTION</span>: <span class="sp-detail">EURO 38.7</span><li>
            <li><span class="head" data-lang="max-match">MAX & MATCH</span></li>
            <li><span class="sp-title" data-lang="front-color-detail">FRONT COLOR</span>: <span class="sp-detail">No</span></li>
            <li><span class="sp-title" data-lang="side-color-detail">Side COLOR</span>: <span class="sp-detail">No</span></li>
            <li><span class="sp-title" data-lang="back-color-detail">BACK COLOR</span>: <span class="sp-detail">No</span></li>
            <li><span class="sp-title" data-lang="accessory-color-detail">ACCESSORY COLOR</span>: <span class="sp-detail">No</span></li>
            <li><br /></li>
            <li><span class="head" data-lang="monogram-detail">MONOGRAM</span></li>
            <li><span class="sp-title" data-lang="inside-inside">INSIDE INSIDE</span>:</li>
            <li><span class="sp-detail" style="padding-left:48px;">
                    No                </span>
            </li>
            <li><span class="sp-title" data-lang="outside-sole">OUTSIDE SOLE</span>:</li>
            <li><span class="sp-detail" style="padding-left: 48px;">
                    No                </span>
            </li>
        </ul>
    </div>
</div>
<div id="list-social" style="clear: left;">
    <br /><br /><br />
    <ul>
        <li><a title="iTailor Facebook" target="_bank" href="https://www.facebook.com/iTailorShirts"><img src="webroot/img/icon/iconFaceBook.png"/></a></li>
        <li><a title="iTailor Twitter" target="_bank" href="http://twitter.com/iTailorshirts"><img src="webroot/img/icon/iconTwitter.png"/></a></li>
        <li><a title="iTailor Youtube" target="_bank" href="http://www.youtube.com/user/iTailorshirt"><img src="webroot/img/icon/iconYoutube.png"/></a></li>
        <li><a title="iTailor Pinterest" target="_bank" href="http://pinterest.com/itailor"><img src="webroot/img/icon/iconPinterest.png"/></a></li>
    </ul>
</div>                                        </div>
                                        <div style="float: right;">
                                            <div class="design">
                                                <span class="imgs2 shoe-designer"></span>
                                            </div>
                                        </div>
                                    </div>
                                                                    <script>
                                    $(document).ready(function () {
                                        slideMinVar.count = -1;
                                        $('#btnBack').trigger('click');
                                    });
                                </script>
                                                        </div>
                    </div>
                    <span style="position: absolute; right: 20px; top:105px; cursor: pointer;"><a style="font-weight: bold !important; font-size: 20px !important; color: #fffcc8 !important;" href="checkout.php" data-lang="go-back">Go Back</a></span>
                </div>
            </div>
        </div>
        <nav>
    <div id="footer">
        <ul>
            <li><a href="../designbelts/" target="_blank" title="iTailor Custom Made Belts"><span >CUSTOM BELT</span> 29.95 &euro;</a></li>
            <li><a href="http://www.itailor.com/designshirts/" target="_blank" title="iTailor Tailored Shirts"><span data-lang="tailored-shirts" data-traffic="link-shirt" >TAILORED SHIRTS</span> 39.95 &euro;</a></li>
            <li><a href="http://www.itailor.com/designsuits/" target="_blank" title="iTailor Tailored Suits"><span data-lang="tailored-suits" data-traffic="link-suit" >TAILORED SUITS</span> 139 &euro;</a></li>
            <li><a href="http://www.itailor.com/about-us.php" target="_blank" title="iTailor About Us" data-lang="about-us" data-traffic="link-about" >About Us</a></li>
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
            <p class="p1"><a href="#" class="forgetpass" data-lang="forgot-password"  data-traffic="popup-forgot">Forgot your Password</a></p>
            <div>
                <button type="button" class="btnstep" id="submitform" data-lang="login">Login</button>
                <button type="button" class="btnstep" onclick="closeModal('', 'modal')" data-lang="exit">Exit</button>
            </div>
            <p class="p2"><a href="javascript:void(0)" class="btnstep RegMember" data-lang="register-new-member"  data-traffic="popup-register">Register New Member</a></p>

            <span data-lang="detail-login">For first time customers,please proceed to design your order.During checkout,you will be able to submit your email and password to setup an account with us.Enjoy your designing experience on iTailor.</span>
        </form>
    </div>
    <div id="forgot-box">
        <h2><span data-lang="forgot-password">Forgot your Password</span></h2>
        <span style="margin-bottom:80px">
            <span data-lang="detail-forget-line1">Just enter the email address associated with your itailor account below and click send.</span>
            <br>
            <br>
            <span data-lang="detail-forget-line2"> You will shortly receive an email containing your password.</span>
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

<!-- Google Code for Main List -->
<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 1020984207;
    var google_conversion_label = "ITo0CMmmsgMQj_fr5gM";
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
<noscript>
<div style="display:inline;"><img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1020984207/?value=0&amp;label=ITo0CMmmsgMQj_fr5gM&amp;guid=ON&amp;script=0"/></div>
</noscript>  
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-20112889-1']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>

<!-- Web Analytics -->
<a style="display: none; margin: 0; padding: 0;" title="Web Analytics" href="http://clicky.com/100978465"><img alt="Web Analytics" src="//static.getclicky.com/media/links/badge.gif" border="0" /></a>
<script src="//static.getclicky.com/js" type="text/javascript"></script>
<script type="text/javascript">try{ clicky.init(100978465); }catch(e){}</script>
<noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/100978465ns.gif" /></p></noscript>

<!-- Facebook Pixel Code by Design Providers -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1045757025555236'); // Insert your pixel ID here.
fbq('track', 'PageView');
fbq('track', 'ViewContent');
fbq('track', 'Search');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1045757025555236&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->
    </body>
</html>