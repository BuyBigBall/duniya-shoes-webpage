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
            var itemArr = {!! $json_items !!};
           
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
            #productDetail .design Canvas, #productDetail .design img {position: absolute; top: 70px; right: 40px;}
            #productDetail .design img {top: 70px; max-width: 440px;}
            #productDetail .design .shoe-custom img, #productDetail .design .shoecream-designer img, #productDetail .design .shoetrees-designer img {top: 80px;}
            #productDetail .block-symbolic {text-align: center;}
            #productDetail a:link {text-decoration: none;}
            #productDetail a:hover {text-shadow: 0.1em 0.1em 0.2em #FFFFFF;}
            #productDetail #list-social {margin: auto; width: 135px; text-align: center;}
            #productDetail #list-social li {float: left; margin-right: 5px;}
            #top-menu ul:first-child li:first-child {background: none;}
        </style>
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
<?php $idx=1; ?>                        
@foreach( $cart_items as $shoeInfo )
                        <div class="list-slide">
                            <div style="float: left">
<div id="detail">
    <div style="font-size: 20px!important;font-weight: bold;text-align: right">
        <span id="total-count" style="font-size: 20px!important;font-weight: bold;">{{$idx++}}</span>/ {{ count($cart_items) }}
    </div>
    <br>
    <div>
        <ul style="float: left;">
            <li class="head" data-lang="type-of-shoes">TYPE OF SHOES</li>
            <li><span class="sp-title" data-lang="">Design No.</span>: <span class="sp-detail">{{ $modelno[$idx-1-1] }}</span></li>
            <li><span class="sp-title" data-lang="type-of-shoes">TYPE OF SHOES</span>: <span class="sp-detail">{{ $shoeInfo->shoeType ?? ''}}</span></li>
            <li><span class="sp-title" data-lang="leather-color">LEATHER COLOR</span>: <span class="sp-detail">{{ $shoeInfo->getLeatherNo ?? ''}}</span></li>
            <li><br /></li>
            <li><span class="head" data-lang="style-detail">STYLE</span></li>
            <li><span class="sp-title" data-lang="shape-style">SHAPE STYLE</span>: <span class="sp-detail">{{ $shoeInfo->getStyle ?? ''}}</span></li>
            <li><span class="sp-title" data-lang="sole-style-detail">SOLE STYLE</span>: <span class="sp-detail">{{ $shoeInfo->getSole ?? ''}}</span></li>
            <li><span class="sp-title" data-lang="">BLAKE STITCH</span>: <span class="sp-detail">{{ $shoeInfo->getStitchingName ?? ''}}</span></li>
            <li><span class="sp-title" data-lang="laces-color-detail">LACES COLOR</span>: <span class="sp-detail">{{ $shoeInfo->getLacesName ?? ''}}</span></li>
            <li><span class="sp-title" data-lang="lining-detail">LINING</span>: <span class="sp-detail">{{ $shoeInfo->getLiningName ?? ''}}</span></li>
            <li><br /></li>
                        <li><span class="head" data-lang="symbolic-detail">Symbolic</span></li>
            <li>
                <div class="block-symbolic">
                    <img src="{{ asset( '/images/models/ishoes/menu/symbolic/view-detail/none.png') }}" title="none">
                </div> 
            </li>
                    </ul>
        <ul style="float: left;width: 250px;">
            <li><span class="head" data-lang="measurement-detail">MEASUREMENT</span></li>
            <li><span class="sp-title" data-lang="legth">LENGTH</span>:<span class="sp-detail">{{ $shoeInfo->length ?? ''}}{{ $shoeInfo->unit ?? ''}}</span></li>
            <li><span class="sp-title" data-lang="width">WIDTH</span>:<span class="sp-detail">{{ $shoeInfo->width ?? ''}}{{ $shoeInfo->unit ?? ''}}</span></li>
            <li><span class="sp-title" data-lang="option">OPTION</span>: <span class="sp-detail"></span><li>
            <li><span class="head" data-lang="max-match">MAX & MATCH</span></li>
            <li><span class="sp-title" data-lang="front-color-detail">FRONT COLOR</span>: <span class="sp-detail">{{ $shoeInfo->getFrontNoName ?? ''}}</span></li>
            <li><span class="sp-title" data-lang="side-color-detail">Side COLOR</span>: <span class="sp-detail">{{ $shoeInfo->getSideNoName ?? ''}}</span></li>
            <li><span class="sp-title" data-lang="back-color-detail">BACK COLOR</span>: <span class="sp-detail">{{ $shoeInfo->getBackNoName ?? ''}}</span></li>
            <li><span class="sp-title" data-lang="accessory-color-detail">ACCESSORY COLOR</span>: <span class="sp-detail">{{ $shoeInfo->getAccessoryName ?? ''}}</span></li>
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
                                    <span class="imgs{!! $idx-1 !!} shoe-designer"></span>
                                </div>
                            </div>
                        </div>
@endforeach

                                                                    <script>
                                    $(document).ready(function () {
                                        slideMinVar.count = -1;
                                        $('#btnBack').trigger('click');
                                    });
                                </script>
                                                        </div>
                    </div>
                    <span style="position: absolute; right: 20px; top:105px; cursor: pointer;">
                        <a 
                        style="font-weight: bold !important; font-size: 20px !important; color: #fffcc8 !important;" 
                            href="{{ route('checkout.main') }}" data-lang="go-back">Go Back</a></span>
                </div>
            </div>
        </div>
    @endsection
    