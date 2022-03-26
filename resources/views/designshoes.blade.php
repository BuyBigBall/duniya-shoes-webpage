@extends('layouts.app')
@section('content')

<body>
    <script src="{{ asset('js/announce.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/set.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/JS-01.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/preload_3D.js') }}"></script>

    <script type="text/javascript">
        var initData = {
            path: {
                domainPath: 'https://localhost/',
                projectPath: 'https://localhost/shoescustom/'
            }
        };
        designObject.curr = "EUR";

        designObject.mixSolePrice = <?= $mixSolePrice; ?>;
        designObject.sizeShoes = <?php echo standardSize(); ?>;
        var style = JSON.parse('<?php echo $styles; ?>');
        var leather = <?php echo $leatherColor; ?>;
        designObject.customer = null;
        $(document).ready(function() {
            announce.init(initData);

            if (!menuObject.shoecurr) {
                menuObject.shoecurr = '';
                load_currency(menuObject.shoecurr);
            }

            setLanguage();
            LoadLeatherArr(style);
            load_leather_xml(leather);
        });
    </script>
    <style>
        html {
            background: url('images/bg3.jpg') no-repeat top;
            background-color: #090401;
            width: 100%;
            height: 100%
        }

        #DesignSlide {
            display: block
        }
    </style>

    <link href="{{ asset('css/event.css') }}" rel="stylesheet" type="text/css">
    <style>
        .bootstrapiso .tooltip {
            font-size: 14px;
        }

        .bootstrapiso .tooltip-inner {
            max-width: 300px;
        }
    </style>

    <h2 style="display: none">iTailor Shoes,iShoes by itailor,itailor shoe,made to measure shoes,custom dress
        shoes,custom made shoes,mens custom shoes,mens shoes,Mens dress shoes,formal shoes,itailor mens shoes</h2>
    <div id="preloadImg" style="display: none;">
        <div class="preloadText" style="top: 524.8px; left: 864.545px; display: block;">iShoes by iTailor</div>
        <canvas id="gauge" style="top: 374.8px; left: 810px;">
            <br><br>
            Your browser do not support HTML5, please click to update your browser<br><br>
            Please update your browser Safari to the latest version, <a href="http://support.apple.com/kb/dl1531">Click
                Here.</a><br>
            Please update your browser Google Chrome to the latest version, <a href="whttps://www.google.com/intl/en/chrome/browser/">Click Here.</a><br>
            Please update your browser Mozilla Firefox to the latest version, <a href="http://www.mozilla.org/en/firefox/fx/">Click Here.</a><br>
            Please update your browser Internet Explore to the latest version, <a href="http://windows.microsoft.com/en-ie/internet-explorer/downloads/ie-10/worldwide-languages">Click
                Here.</a><br>
        </canvas>
    </div>
    <div id="content" style="display: block;">
        <canvas id="CanvasPreOrder" style="display: none"> use create preorder </canvas>
        <div style="display:none"><img src="{{asset('images/bg3.jpg')}}"></div>
        <div id="content-layout">
            @include('layouts.topmenu')
            <div class="left">
                <div id="logo" style="margin-bottom: 8px;">
                    <img src="{{asset('images/logo-iShoes.png')}}" data-traffic="logo">
                </div>
                <div id="menu-style" class="left" data-traffic="menu">
                    <aside>
                        <ul>
                            <li id="menu-main-type" class="sub-menu active" data-traffic="menu-type">
                                <ul>
                                    <li>1. <span data-lang="type-of-shoes">TYPE OF SHOES</span></li>
                                </ul>
                                <ul class="sub-menu-type" style="display: block;">
                                    <li id="oxford" class="sType chk" data-lang="oxford-shoes">OXFORD SHOES</li>
                                    <li id="derby" class="sType" data-lang="derby-shoes">DERBY SHOES</li>
                                    <li id="boot" class="sType" data-lang="boots-shoes">BOOTS SHOES</li>
                                    <li id="monk" class="sType" data-lang="monk-shoes">MONK SHOES</li>
                                    <li id="loafers" class="sType" data-lang="loafers-shoes">LOAFERS SHOES</li>
                                    <li id="fashion" class="sType" data-lang="fashion-shoes">FASHION SHOES</li>
                                </ul>
                                <ul class="sub-menu-types">
                                    <li id="subSelLth" class="sType chk" data-lang="choose-types">CHOOSE SHOE TYPE</li>
                                </ul>
                            </li>
                            <li id="menu-main-color" class="sub-menu" data-traffic="menu-leather">
                                <ul>
                                    <li>2. <span data-lang="leather-color">LEATHER COLOR</span></li>
                                </ul>
                                <ul class="sub-menu-leather">
                                    <li id="premium" class="lthType"><span data-lang="cate-1">PREMIUM
                                            LEATHER</span><span class="discount">$179</span></li>
                                    <li id="fashion" class="lthType"><span data-lang="cate-2">FASHION
                                            LEATHER</span><span class="discount">$179</span></li>
                                    <li id="sheep" class="lthType"><span data-lang="cate-3">SHEEPSKIN
                                            LEATHER</span><span class="discount">$199</span></li>
                                    <li id="fabric" class="lthType"><span data-lang="cate-4">FABRIC</span><span class="discount">$139</span></li>
                                </ul>
                            </li>
                            <li id="menu-main-style" class="sub-menu" data-traffic="menu-style">
                                <ul>
                                    <li>3. <span data-lang="style">STYLE</span></li>
                                </ul>
                                <ul class="sub-menu-style">
                                    <li id="shape" class="styShoe" data-lang="shape-style">SHAPE STYLE</li>
                                    <li id="front" class="styShoe" data-lang="front-style">FRONT STYLE</li>
                                    <li id="side" class="styShoe" data-lang="side-style">SIDE STYLE</li>
                                    <li id="back" class="styShoe" data-lang="back-style">BACK STYLE</li>
                                    <li id="sole" class="styShoe" data-lang="sole-style">SOLE STYLE</li>
                                </ul>
                            </li>
                            <li id="menu-main-special-design" class="sub-menu" data-traffic="menu-special">
                                <ul>
                                    <li>4. <span data-lang="special-design">SPECIAL DESIGN</span></li>
                                </ul>
                                <ul class="sub-menu-special">
                                    <li id="mix-match" data-lang="mix-match">Mix &amp; Match</li>
                                    <li id="laces" data-lang="laces-stitching">Laces/Stitching</li>
                                    <li id="lining" data-lang="lining">Lining</li>
                                    <li id="monogram" data-lang="monogram">Monogram</li>
                                </ul>
                            </li>
                            <li id="manu-main-measurement" class="sub-menu" data-traffic="menu-measurement">
                                <ul>
                                    <li>5. <span data-lang="measurement">MEASUREMENT</span></li>
                                </ul>
                                <ul class="sub-menu-measure">
                                    <li id="bodySize" data-lang="bodySize">Body Size</li>
                                </ul>
                            </li>
                        </ul>
                    </aside>
                    <div id="cart-detail">
                        <p style="clear: left;text-align: center;"><span data-lang="check-out" style="font-size: 14px;color: #61eae8!important;font-weight: 800;text-shadow: 0px 0px 6px #FFF;text-decoration: none;cursor: pointer" class="linkCheckOut" data-traffic="link-checkout">CHECK OUT &gt;&gt;</span></p>
                        <p style="color: #c9b379;font-size: 14px;text-align: center" data-lang="shopping-cart">SHOPPING
                            BAG</p>
                        <i class="icon-shop-cart">icon ishoes shop bag</i>
                        <p><span class="item-count">0</span>&nbsp;<span data-lang="item">Item(S)</span></p>
                        <p><span data-lang="total">Total</span> : <span class="total-price">0 {!!setting('site.sign')!!}</span></p>
                        <p><span data-lang="shipping">Shipping</span> : <span class="shipping-amount">0 {!!setting('site.sign')!!}</span></p>
                        <p><span data-lang="sub-total">Subtotal</span> : <span class="sub-price">0 {!!setting('site.sign')!!}</span></p>
                        <div class="shop-bag" style="float: left"></div>
                    </div>
                </div>
            </div>
            <div id="right-section">
                <div id="over-view" class="left">
                    <div class="pretitle">
                        <p>The Most Comfortable Mens Shoes In The World!</p>
                    </div>
                    <article id="ShoeTypeDetail" style="right: 0; top: 80px; width: 305px; position: absolute; text-align: center;">
                        <h2 id="ShoeType-Header" style="font-size: 20px;font-weight: 600">OXFORD SHOES</h2>
                        <br>
                        <p id="Shoetype-Detail" style="font-size: 16px;">Oxford shoe is a style of leather shoe with
                            enclosed lacing.You can customize each area with iShoes 3D Designer,from combining 100s of
                            leather and thousands of styles</p>
                        <br>
                        <h2 style="font-size: 40px;color: #FF3102;font-weight: bold;text-shadow: 0 0 5px #FFFFFF;" class="price-tag-Shoe-Type">$ 179</h2>
                    </article>
                    <a style="z-index: 999; position: absolute; right: 0;" class="bannerMenuL banner-announce" target="_blank">
                        <img id="corona-img" class="corona-popup" src="{{asset('images/corona-update.png')}}" width="283">
                    </a>
                    <div id="main-design">
                        <canvas id="gauge-clone" style="top: 131px; left: 125px; display: none;"></canvas>
                        <div id="main-layout">
                            <div class="soft-touch">
                                <a href="soft-touch/" target="_blank" title="Soft Touch &amp; Feel"><img src="{{asset('images/soft-touch.png')}}" class="visible"></a>
                            </div>
                            <div class="main_model" id="Right">
                                <img id="BorderSole" src="{{asset('images/preorder/OxfordShoes/Round/MainMix/Right/Sole/LE2.png')}}">
                                <img id="lining" src="{{asset('images/preorder/OxfordShoes/Round/MainMix/Right/Lining/SH-SW08.png')}}">
                                <img id="back" src="{{asset('images/preorder/OxfordShoes/Round/MainMix/Right/Back/BK1/LT-001.png')}}">
                                <img id="side" src="{{asset('images/preorder/OxfordShoes/Round/MainMix/Right/Side/SD1/LT-001.png')}}">
                                <img id="laces" src="{{asset('images/preorder/OxfordShoes/Round/MainMix/Right/Sheslace/HT-Black.png')}}">
                                <img class="main" src="{{asset('images/preorder/OxfordShoes/Round/Right/LT-001.png')}}">
                                <img id="front" src="{{asset('images/missing.png')}}" style="z-index: 20;">
                            </div>
                            <div class="main_model" id="Left" style="display: none;">
                                <img id="BorderSole" src="{{asset('images/preorder/OxfordShoes/Round/MainMix/Left/Sole/LE2.png')}}">
                                <img id="lining" src="{{asset('images/preorder/OxfordShoes/Round/MainMix/Left/Lining/SH-SW08.png')}}">
                                <img id="back" src="{{asset('images/preorder/OxfordShoes/Round/MainMix/Left/Back/BK1/LT-001.png')}}">
                                <img id="side" src="{{asset('images/preorder/OxfordShoes/Round/MainMix/Left/Side/SD1/LT-001.png')}}">
                                <img id="laces" src="{{asset('images/preorder/OxfordShoes/Round/MainMix/Left/Sheslace/HT-Black.png')}}">
                                <img class="main" src="{{asset('images/preorder/OxfordShoes/Round/Left/LT-001.png')}}">
                                <img id="front" src="{{asset('images/missing.png')}}" style="z-index: 20;">
                            </div>
                            <!--<div class="main_model" id="Back" style="display:none"></div>-->
                            <div class="main_model" id="Under" style="display: none;">
                                <img id="UnderS" src="{{asset('images/preorder/OxfordShoes/Sole/Round/LT-N007.png')}}">
                            </div>
                        </div>
                        <div id="all-menu">
                            <div id="data-type"></div>
                            <div id="data-design"></div>
                            <div class="option-color" style="display: none;"></div>
                            <span class="btn-share-fb" onclick="processDesign.share_faceBook();" data-traffic="link-share" style="top: 270px; right: 155px;">share facebook </span>
                            <div id="MonogramDetail" style="display: none">
                                <h2 class="text-title" style="left: 20%;top:15px;position: absolute;" data-lang="monogram-initals">MONOGRAM/INITIALS</h2>
                                <div style="color: #fff;font-size:18px;margin-top:50px; position:absolute;right: -45px;text-align: right;text-shadow: 0 0 2px #281101;font-weight: 600" data-lang="title-monogram-position">We offer 2 Monogram position:</div>
                                <div style="position: absolute;right: 45px;">
                                    <div id="Mono-detail-main">
                                        <div id="Detail-inside">
                                            <p>
                                                <img src="{{asset('images/icon/monoNext.png')}}" style="margin-right: 15px;">
                                                <input type="checkbox" id="checkbox-2-1">
                                                <label for="checkbox-2-1" style="padding: 2px;"><span></span><i data-lang="inside-lining">INSIDE LINING</i></label>
                                            </p>
                                            <p class="onlys" data-lang="monogram-only">: {English Script Only} </p>
                                            <p><input type="text" id="input-inside" style="margin-bottom: 10px;" disabled="true" maxlength="6"></p>
                                        </div>
                                        <div id="Detail-outslide">
                                            <p>
                                                <img src="{{asset('images/icon/monoNext.png')}}" style="margin-right: 15px;">
                                                <input type="checkbox" id="checkbox-2-2">
                                                <label for="checkbox-2-2"><span></span><i data-lang="outside-sole">OUTSIDE SOLE</i></label>
                                            </p>
                                            <p class="by" data-lang="monogram-designed-by">Designed by</p>
                                            <p class="onlys" data-lang="monogram-only">: {English Script Only} </p>
                                            <p><input type="text" id="input-outside" disabled="true" maxlength="18"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="over-view-layout" style="z-index: 5000;width: 730px;">
                                <h2></h2>
                                <div class="price-tag" style="display: none;">$ 179</div>
                                <div class="price-mix"></div>
                                <div id="view-select" style="float: right;display: none">
                                    <ul>
                                        <li class="direction" id="Left" data-traffic="view-left" style="cursor: pointer;">
                                            <img id="BorderSole" src="{{asset('images/preorder/OxfordShoes/Round/MainMix/Right/Sole/LE2.png')}}">
                                            <img id="lining" src="{{asset('images/preorder/OxfordShoes/Round/MainMix/Right/Lining/SH-SW08.png')}}">
                                            <img id="back" src="{{asset('images/preorder/OxfordShoes/Round/MainMix/Right/Back/BK1/LT-001.png')}}">
                                            <img id="side" src="{{asset('images/preorder/OxfordShoes/Round/MainMix/Right/Side/SD1/LT-001.png')}}">
                                            <img id="laces" src="{{asset('images/preorder/OxfordShoes/Round/MainMix/Right/Sheslace/HT-Black.png')}}">
                                            <img class="main" src="{{asset('images/preorder/OxfordShoes/Round/Right/LT-001.png')}}">
                                            <img id="front" src="{{asset('images/missing.png')}}" style="z-index: 20;">

                                        </li>
                                        <li class="direction" id="Right" data-traffic="view-right" style="cursor: pointer;">
                                            <img id="BorderSole" src="{{asset('images/preorder/OxfordShoes/Round/MainMix/Left/Sole/LE2.png')}}">
                                            <img id="lining" src="{{asset('images/preorder/OxfordShoes/Round/MainMix/Left/Lining/SH-SW08.png')}}">
                                            <img id="back" src="{{asset('images/preorder/OxfordShoes/Round/MainMix/Left/Back/BK1/LT-001.png')}}">
                                            <img id="side" src="{{asset('images/preorder/OxfordShoes/Round/MainMix/Left/Side/SD1/LT-001.png')}}">
                                            <img id="laces" src="{{asset('images/preorder/OxfordShoes/Round/MainMix/Left/Sheslace/HT-Black.png')}}">
                                            <img class="main" src="{{asset('images/preorder/OxfordShoes/Round/Left/LT-001.png')}}">
                                            <img id="front" src="{{asset('images/missing.png')}}" style="z-index: 20;">
                                        </li>
                                        <li class="direction" id="Underview" data-traffic="view-under" style="cursor: pointer;">
                                            <img id="UnderS" src="{{asset('images/preorder/OxfordShoes/Sole/Round/LT-N007.png')}}">
                                        </li>
                                    </ul>
                                    <img id="imgPreLoadDirection" src="{{asset('images/icon/loading-icon.gif')}}" style="position: absolute; top: 34%; left: 34%; display: none;">
                                </div>
                                <div id="ShoeDetails" style="display: none">
                                    <ul>
                                        <li><span data-lang="upper">Upper</span> : Leather</li>
                                        <li><span data-lang="sole">Sole</span> : <i id="Detail-Sole">Leather</i></li>
                                        <li><span data-lang="insole">Insole</span> : Leather</li>
                                        <li><span data-lang="lining">Lining</span> : Leather</li>
                                        <li><span data-lang="heel">Heel</span> : Non-Slip</li>
                                    </ul>
                                </div>
                                <div class="bar"></div>
                                <div class="sideBorderOption">
                                    <input type="checkbox" id="sideBorderOption">
                                    <label for="sideBorderOption"><span></span>SELECT SIDE BORDER SLIM</label>
                                </div>
                                <div id="tab-soleOption" style="display: none;">
                                    <input type="checkbox" id="soleOption">
                                    <label for="soleOption"><span></span>Blake Stitch <b>+ 19 $</b>
                                        <img class="icon-info-blake-strtch" src="{{asset('images/icon/info.png')}}">
                                    </label>
                                    <div class="blake-stitch-detail">
                                        Blake stitch construction stitches directly from the outsole into the insole,
                                        without a midsole; the construction is largely popular in fine crafted Italian
                                        shoes. This creates a very lightweight and flexible feel and makes it more
                                        durable and long lasting.
                                        <br>
                                        <br>
                                        The high end production technique adds a sophisticated look to your custom made
                                        shoes. In line with our bespoke culture, all Blake constructions are hand
                                        stitched by our skilled shoemakers
                                    </div>
                                </div>
                            </div>
                            <div class="step">
                                <div id="prev-step" class="btnstep" data-lang="btn-back-style" data-traffic="button-back" style="display: none;">BACK STEP</div>
                                <div class="undoRedo" style="display: none;">
                                </div>
                                <div id="next-step" class="btnstep" data-lang="btn-next-style" data-traffic="button-next">NEXT STEP</div>
                            </div>
                            <div id="buttom-menu-header" style="display: none">
                                <h3>
                                    <img src="{{asset('images/icon/Arrow.png')}}" style="position: absolute">
                                    <span class="choose-style-text" data-lang="choose-your-style" style="margin-left: 35px;"></span>
                                </h3>&nbsp;
                                <span class="plink-show-all linkRecommend" data-lang="link-show-all" data-traffic="link-all-style" style="display: none;">Show All Style</span>
                                <span class="pageItem"></span>
                            </div>
                            <div class="selectType bmenu" style="display: block;">
                                <ul>
                                    @foreach($shoesType as $type)
                                    <li id="{{$type->type}}" data-traffic="type-{{$type->type}}">
                                        @if($type->type == "oxford")
                                        <img class="chkItem" src="{{asset('images/CheckMarkBlue.png')}}">
                                        @endif;
                                        <img title="{{$type->type}}" class="mtype" alt="Oxford Shoes" src="images/preorder/Menu/ViewAllType/{{$type->src}}"><br>
                                        <span data-lang="{{$type->type}}-shoes"><?php echo $type->name ?></span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div id="buttom-menu" style="display: none">
                                <div class="button">
                                    <div id="btn-prev" class="btnimg" style="display: none;"><img src="{{asset('images/icon/btn-next.png')}}" data-traffic="button-next-menus"></div>
                                </div>
                                <div class="mask">
                                    <div class="selectLth bmenu" style="display: none;"></div>
                                    <div class="selectSty bmenu" style="display: none;"></div>
                                </div>
                                <div class="button">
                                    <div id="btn-next" class="btnimg" style="display: none;"><img src="{{asset('images/icon/btn-back.png')}}" data-traffic="button-back-menus"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="main-measure">
                    <h2 data-lang="measure-header">EASY MEASUREMENTS FOR PERFECT FIT</h2>
                    <div id="body-layout">
                        <!--<form id="measure-form" method="post" action="checkout.php?type=3D">-->
                        <form id="measure-form" method="post" action="designshoes/elements/cart/add">
                            @csrf
                            <!-- <input type='hidden' id='page_token' name="page_token" value='{{ csrf_token() }}' /> -->
                            <input type="hidden" name="monoIn" id="frm-monoIn" />
                            <input type="hidden" name="monoOut" id="frm-monoOut" />
                            <input type="hidden" name="statusPreDesign" id="frm-statusPreDesign" value="false" />
                            <input type="hidden" name="shoes_image_base64" id="shoes_image_base64" />
                            <div id="measure-sample" class="media-layout">
                                <img id="img-length" src="{{asset('images/Length.jpg')}}">
                                <img id="img-width" src="{{asset('images/Width.jpg')}}" style="display: none">
                            </div>
                            <div id="measure-media" class="media-layout">
                                <source src="html5video/ishoeslength.m4v">
                                <video class="video" id="media-length" width="320" height="258" title="ishoeslength" autoplay="autoplay" loop="loop" preload="auto" onended="var v=this;setTimeout(function(){v.play()},100)" controls="">
                                    <source src="html5video/ishoeslength.m4v" type="video/x-m4v">
                                    <source src="html5video/ishoeslength.ogv" type="video/ogg">
                                    <object id="videoz" type="application/x-shockwave-flash" data="{{asset('flashfox.swf')}}" width="320" height="258" style="position:relative;z-index:30;">
                                        <param name="movie" value="html5video/flashfox.swf">
                                        <param name="allowFullScreen" value="true">
                                        <param name="wmode" value="transparent">
                                        <param name="flashVars" value="autoplay=true&amp;controls=true&amp;fullScreenEnabled=false&amp;posterOnEnd=true&amp;loop=true&amp;src=ishoeslength.m4v">
                                        <embed src="html5video/flashfox.swf" width="320" height="258" style="position:relative;" flashvars="autoplay=true&amp;controls=true&amp;fullScreenEnabled=false&amp;posterOnEnd=true&amp;loop=true&amp;src=ishoeslength.m4v" allowfullscreen="true" wmode="transparent" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer_en">
                                        <img alt="ishoeslength" style="position:absolute;left:0;" width="320" height="258" title="Video playback is not supported by your browser">
                                    </object>
                                </video>
                                <video class="video" id="media-width" width="320" height="258" title="ishoeswidth" loop="loop" autoplay="autoplay" preload="auto" onended="var v=this;setTimeout(function(){v.play()},100)" controls="" style="display: none">
                                    <source src="html5video/ishoeswidth.m4v" type="video/x-m4v">
                                    <source src="html5video/ishoeswidth.ogv" type="video/ogg">
                                    <object type="application/x-shockwave-flash" data="{{asset('flashfox.swf')}}" width="320" height="258" style="position:relative;z-index:30;">
                                        <param name="movie" value="html5video/flashfox.swf">
                                        <param name="allowFullScreen" value="true">
                                        <param name="wmode" value="transparent">
                                        <param name="flashVars" value="autoplay=true&amp;controls=true&amp;fullScreenEnabled=false&amp;posterOnEnd=true&amp;loop=true&amp;src=ishoeswidth.m4v">
                                        <embed src="html5video/flashfox.swf" width="320" height="258" style="position:relative;" flashvars="autoplay=true&amp;controls=true&amp;fullScreenEnabled=false&amp;posterOnEnd=true&amp;loop=true&amp;src=ishoeswidth.m4v" allowfullscreen="true" wmode="transparent" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer_en">
                                        <img alt="ishoeswidth" style="position:absolute;left:0;" width="320" height="258" title="Video playback is not supported by your browser">
                                    </object>
                                </video>
                            </div>
                            <div id="measure-form">
                                <div class="field">
                                    <span class="measure-head-form" data-lang="stepOne">Step 1:</span>
                                    <div class="unit"><input type="radio" name="unit" id="unit-cm" value="cm" checked=""><label for="unit-cm">cm</label></div>
                                    <div class="unit"><input type="radio" name="unit" id="unit-inch" value="inch"><label for="unit-inch">Inch</label></div>
                                </div>
                                <div class="field">
                                    <span class="measure-head-form" data-lang="stepTwo">Step 2:</span>
                                    <span class="textsize strMeasure" data-lang="lengthText">Length:</span><input type="text" name="length" maxlength="5" id="length" value="">
                                    <span id="length-validate" class="valid" style="display: none" data-lang="valid-text">*Invalid Number</span>
                                </div>
                                <div class="field">
                                    <span class="measure-head-form" data-lang="stepThree">Step 3:</span>
                                    <span class="textsize strMeasure" data-lang="widthText">Width:</span><input type="text" name="width" maxlength="5" id="width" value="">
                                    <span id="width-validate" class="valid" style="display: none" data-lang="valid-text">*Invalid Number</span>
                                </div>

                                <div class="field">
                                    <span class="measure-head-form" data-lang="stepFour">Step 4:</span>
                                    <!--                                            <span class="textsize" data-lang="widthText">Width:</span>-->
                                    <fieldset class="drop_box drop_ms">
                                        <span data-lang="optSizeText" class="strMeasure">Your regular size:</span>
                                        <label class="arrowSlc">
                                            <select id="size_type" class="myslc" name="size_type" data-traffic="select-type">
                                                <option value="EURO">EU</option>
                                                <option value="US">U.S.</option>
                                                <option value="UK">U.K.</option>
                                                <option value="AU">AU</option>
                                                <option value="JP">Japan</option>
                                                <option value="RU">RUS</option>
                                            </select>
                                        </label>
                                    </fieldset>
                                    <fieldset class="drop_box size_select">
                                        <label class="arrowSlcNo">
                                            <select id="size_no" class="myslc" name="size_no" data-traffic="select-size">
                                                <option value="--">--</option>
                                                <option value="36">36</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="38.7">38.7</option>
                                                <option value="39.3">39.3</option>
                                                <option value="40">40</option>
                                                <option value="40.5">40.5</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="42.5">42.5</option>
                                                <option value="43">43</option>
                                                <option value="44">44</option>
                                                <option value="44.5">44.5</option>
                                                <option value="45">45</option>
                                                <option value="46">46</option>
                                                <option value="46.5">46.5</option>
                                                <option value="47">47</option>
                                                <option value="48">48</option>
                                                <option value="49">49</option>
                                                <option value="50">50</option>
                                                <option value="51">51</option>
                                                <option value="52">52</option>
                                            </select>
                                        </label>
                                    </fieldset>
                                    <fieldset class="drop_box">
                                        <span class="strMeasure" style="width: 50px">Qty :</span>
                                        <label class="arrowSlcNo">
                                            <select class="myslc" name="qty">

                                                <?php for ($i = 1; $i <= 100; $i++) { ?>
                                                    <option value="{{$i}}">{{$i}}</option>
                                                <?php } ?>

                                            </select>
                                        </label>
                                    </fieldset>
                                </div>
                            </div>
                            <input type="hidden" name="qty_body" value="1">
                            <div class="nav_addcart">
                                <div id="prev-step" class="btnstep" data-lang="btn-back-style" data-traffic="button-back">BACK STEP</div>
                                <button type="button" id="btn-cart" data-lang="btn-add-cart">ADD TO CART</button>
                            </div>
                            <input type="hidden" name="size_name" value="EU">
                            <input type="hidden" name="sobj" value="">
                            <input type="hidden" name="lastitem" value="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="header-designshoes">Design Shoes</h1>
    </div>
    <script type="text/javascript" src="{{asset('js/SlideDeignIdea.js')}}"></script>
    <div id="DesignSlide" style="right: -185px;">
        <div style="overflow: hidden; position: relative; margin-top: 40px; height: 741px;" id="chkHeight">
            <div class="ListItem">
                <ul class="DesignIdeaSlide">
                    <li style="position: relative;text-align: center;" id="0">
                        <img src="{{asset('images/preorder/3D/S/PD2553D.png')}}">
                    </li>
                    <li style="position: relative;text-align: center;" id="1">
                        <img src="{{asset('images/preorder/3D/S/PD2633D.png')}}">
                    </li>
                    <li style="position: relative;text-align: center;" id="2">
                        <img src="{{asset('images/preorder/3D/S/PD2943D.png')}}">
                    </li>
                </ul>
            </div>
        </div>
        <i class="btnDesignSlide" id="btnDesignSlideDown">btn slide ishoes Down</i>
        <i class="btnDesignSlide" id="btnDesignSlideUp">btn slide ishoes Up</i>
        <div class="btnDesignDetailSlide btnSlidTagDesignIdea">
            <div data-lang="design-ideas" data-traffic="button-designidea">Design ideas</div>
        </div>
        <div class="btnSlidTagDesignIdea tabPromotions" style="top:170px;">
            <div onclick="window.open('/designidea', '_blank');" title="Weekly Promotions">Promotions</div>
        </div>
    </div>
<div style="width:100%; height:100px; background-color:blanchedalmond;">
    <iframe id="iframe_shoes_image_html" style="width:100%; height:100px;" src="{{ url('/shoes-viewdesignimage') }}">Your browser isn't compatible</iframe>
</div>                    
<script>
    function setDesignImageInformations(encoded_shoes_information)
    {
        $.ajax({
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
                url: '/createDesignImagesInformation',
                data: {shoes_info: encoded_shoes_information},
                success: function (d) {
                        console.log("design image created successfully.");
                        //alert("design image created successfully.");
                        d = JSON.parse(d);

                        frameWindow = $("#iframe_shoes_image_html").contents()[0].defaultView;
                        if(JSON.parse(d.goods) && frameWindow.make_design_Image)
                        {
                            frameWindow.make_design_Image( JSON.parse(d.goods) );
                            //console.log(frameWindow.$('.imgs1 img').attr('src'));
                        }

                    }
                });
    }
</script>
    @endsection