
@extends('layouts.app')
@section('content')
<body>
    <link rel="stylesheet" type="text/css" href="{{asset('css/patina/preload.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/patina/layout.css')}}" />
    <link rel="stylesheet" href="{{asset('css/patina/jquery.mCustomScrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('css/patina/MayaPopup.css')}}" />
    <link rel="stylesheet" href="{{asset('css/patina/my-account.css')}}" />
    <!-- PRELOAD -->
    <div id="preload">
        <div id="preload-content">
            <p id="preloading-text" class="fluorescent">PATINA SHOES</p>
            <div id="preload-inner">
                <div id="preloading" class="effect2"></div>
            </div>
            <p id="preloading-percent"></p>
        </div>
    </div>
    <!-- CONTENTS -->
    <div id="mastcontainer" class="wrapper">
        <div id="mastcontent">
            <div id="inner">
                <!-- STATIC CONTENT -->
                <div id="static">
                    <header id="masthead" class="lusso">
                        <h1>LUSSO</h1>
                        <p>Handcrafted Patina Shoes</p>
                    </header>
                    <article id="item-detail">
                        <h2 style="text-transform: uppercase;">{{$shoes->title}}</h2>
                        <p id="price" class="emphasize">
                            <span>
                                <span id="set-price">{{$shoes->price}}</span> <span id="set-currency">{!! setting('site.sign') !!}</span>
                            </span>
                        </p>
                        <p id="item-code"><span>Style No.</span><span>{{$shoes->key}}</span></p>
                        <div class="desc-1">
                            <b data-lang="details">Details</b>
                            <div id="desc-shoes" class="desc-shoes">
                            {!! $shoes->details!!}
                            </div>
                        </div>
                        <div id="symbolic-description" class="desc-1" style="padding-bottom: 0;">
                            <b style="padding-bottom: 5px;">
                                <span>Symbolic</span>
                                <span>:</span>
                                <span class="symbolic-name">None</span>
                            </b>
                            <div class="desc-shoes symbolic-description" style="display: none;">
                                <p>Symbolic Description</p>
                            </div>
                        </div>
                        <a href="/custom-shoes-care" class="desc-1"
                            style="display: block; padding-bottom: 0;">
                            <b style="padding-bottom: 5px;">
                                <span>Shoes Care Detail</span>
                            </b>
                        </a>
                        <div class="desc-1">
                            <b data-lang="delivery">Delivery</b>
                            <img style="display: inline-block; vertical-align: middle;"
                                src="../images/misc/PayPal.png">
                            <span
                                style="display: inline-block; vertical-align: middle; font-size: 13px;">Accepted</span>
                            <span style="display: block; margin-top: 15px; font-size: 13px;">World Wide Shipping</span>
                            <img src="../images/misc/DHL.png">
                        </div>
                        <img id="corona-img" class="corona-popup" src="../images/corona-update.png">
                    </article>
                </div>
                <!-- DYNAMIC CONTENT -->
                <div id="showcase">
                    <div id="slide">
                        <div id="overview">
                            <ul>
                                <li data-view="0" class="active">
                                    <img src="/images/models/iShoes/designershoes/PT031/view/view1.jpg" alt="">
                                    <div class="overview-bg"></div>
                                </li>
                                <li data-view="1">
                                    <img src="/images/models/iShoes/designershoes/PT031/view/view2.jpg" alt="">
                                    <div class="overview-bg"></div>
                                </li>
                                <li data-view="3">
                                    <img src="/images/models/iShoes/designershoes/PT031/view/view4.jpg" alt="">
                                    <div class="overview-bg"></div>
                                </li>
                                <li data-view="4">
                                    <img src="/images/models/iShoes/designershoes/PT031/view/view5.jpg" alt="">
                                    <div class="overview-bg"></div>
                                </li>
                                <li data-view="2">
                                    <img src="/images/models/iShoes/designershoes/PT031/view/view3.jpg" alt="">
                                    <div class="overview-bg"></div>
                                </li>
                            </ul>
                            <a href="Javascript:void(0);" id="reset-style" style="display: none;">Reset your style</a>
                        </div>
                        <div id="items">
                            <section id="first-step" class="first step onstate" data-step="leather">
                                <div id="first-view">
                                    <!-- VIEW 1 -->
                                    <div class="first view active">
                                        <div id="first-main" class="max-width-center anim">
                                            <img data-source="/images/models/iShoes/designershoes/PT031/view1/main/LT-002.png"
                                                alt="" src="../images/misc/empty.png">
                                        </div>
                                        <div id="first-body" class="max-width-center">
                                            <img src="/images/models/iShoes/designershoes/PT031/view1/Body.png"
                                                alt="">
                                        </div>
                                    </div>
                                    <!-- VIEW 2 -->
                                    <div class="second view">
                                        <div id="use-symbolic">
                                            <span class="text" data-lang="art-symbol">Art Symbol</span>
                                            <span class="price emphasize">+ <span id="symbolic-price">19</span> <span
                                                    id="symbolic-currency">{!! setting('site.sign') !!}</span></span>
                                        </div>
                                        <div id="second-symbolic" class="max-width-center anim">
                                            <img src="../images/misc/empty.png" alt="">
                                        </div>
                                        <div id="second-main" class="max-width-center anim">
                                            <img data-source="/images/models/iShoes/designershoes/PT031/view2/main/LT-002.png"
                                                src="../images/misc/empty.png" alt="">
                                        </div>
                                        <div id="second-body" class="max-width-center">
                                            <img src="/images/models/iShoes/designershoes/PT031/view2/Body.png"
                                                alt="">
                                        </div>
                                        <div class="makeup"></div>
                                    </div>
                                    <div class="view">
                                        <div class="max-width-center anim">
                                            <img src="/images/models/iShoes/designershoes/PT031/view4/Body.png"
                                                src="../images/misc/empty.png" alt="">
                                        </div>
                                    </div>
                                    <div class="view">
                                        <div class="max-width-center anim">
                                            <img src="/images/models/iShoes/designershoes/PT031/view5/Body.png"
                                                src="../images/misc/empty.png" alt="">
                                        </div>
                                    </div>
                                    <div class="view">
                                        <div class="max-width-center anim">
                                            <img src="/images/models/iShoes/designershoes/PT031/view6/Body.png"
                                                src="../images/misc/empty.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section id="second-step" class="second step" data-step="sole">
                                <!-- VIEW 3 -->
                                <div id="second-view">
                                    <div id="snds-sndv-use-backstitch">
                                        <input type="checkbox" id="sole-backstitch" class="checklist">
                                        <label id="use-sole-backstitch" for="sole-backstitch">
                                            <b></b>
                                            <span class="text" data-lang="blake-stitch">BLAKE STITCH</span>
                                        </label>
                                        <span class="price emphasize">+ <span id="backstitch-price">0</span> <span
                                                id="backstitch-currency">{!! setting('site.sign') !!}</span></span>
                                    </div>
                                    <div id="snds-sndv-main" class="max-width-center">
                                        <img src="/images/models/iShoes/designershoes/PT031/view3/sole/LT-N007.png"
                                            alt="">
                                    </div>
                                    <div id="snds-sndv-sole" class="max-width-center anim">
                                        <img src="../images/misc/empty.png" alt="">
                                    </div>
                                    <div id="snds-sndv-backstitch" class="max-width-center anim">
                                        <img src="../images/misc/empty.png" alt="">
                                    </div>
                                    <div id="snds-sndv-monogram" class="hide">
                                        <span class="design-by">Designed by</span>
                                        <span id="monogram-design" class="design-by-name"></span>
                                    </div>
                                </div>
                            </section>
                            <section id="third-step" class="third step">
                                <div id="third-view">
                                    <div class="monogram-wp">
                                        <p class="title" data-lang="monogram-initials">MONOGRAM/INITIALS</p>
                                        <ul id="monogram-initial">
                                            <li>
                                                <input type="checkbox" id="inside-lining" class="checklist">
                                                <label id="use-inside-lining" for="inside-lining">
                                                    <b class="style2"></b>
                                                    <span class="text" data-lang="inside-lining">INSIDE LINING</span>
                                                </label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="outside-sole" class="checklist">
                                                <label id="use-outside-sole" for="outside-sole">
                                                    <b class="style2"></b>
                                                    <span class="text" data-lang="outside-sole">OUTSIDE SOLE</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="monogram animated-normal fadeOutUp">
                                        <p class="detail" data-lang="english-script">ENTER YOUR MONOGRAM (English Script
                                            Only)</p>
                                        <input type="text" id="text-monogram" class="text-monogram" disabled=""
                                            maxlength="10">
                                        <p id="alert-text-monogram" class="alert-text"></p>
                                    </div>
                                </div>
                            </section>
                            <section id="fourth-step" class="fourth step">
                                <div id="fourth-view">
                                    <div id="measurement">
                                        <p data-lang="easy-measurement">EASY MEASUREMENTS FOR PERFECT FIT</p>
                                        <div id="measure">
                                            <ul>
                                                <li id="measurement-image">
                                                    <img src="../images/misc/empty.png" alt="">
                                                </li>
                                                <li id="measurement-video">
                                                    <div id="video-length" class="hide-video">
                                                        <video width="320" height="258" controls="controls"
                                                            autoplay="autoplay"
                                                            poster="../images/Length.jpg">
                                                            <source src="../html5video/length.m4v" type="video/mp4">
                                                            <source src="../html5video/ishoeslength.ogv" type="video/ogg">
                                                        </video>
                                                    </div>
                                                    <div id="video-width" class="hide-video">
                                                        <video width="320" height="258" controls="controls"
                                                            autoplay="autoplay"
                                                            poster="../images/Width.jpg">
                                                            <source src="../html5video/width.m4v" type="video/mp4">
                                                            <source src="../html5video/ishoeswidth.ogv" type="video/ogg">
                                                        </video>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="measure-step" data-lang="step1">Step 1:</div>
                                                    <div class="measure-info">
                                                        <span class="measure-unit">
                                                            <input type="radio" class="checklist" id="measure-size-cm"
                                                                name="measure-size" value="cm" checked>
                                                            <label for="measure-size-cm">
                                                                <b class="style3"></b>
                                                                <span class="text">cm</span>
                                                            </label>
                                                            <span>&nbsp;</span>
                                                        </span>
                                                        <span class="measure-unit">
                                                            <input type="radio" id="measure-size-inch" class="checklist"
                                                                name="measure-size" value="inch">
                                                            <label for="measure-size-inch">
                                                                <b class="style3"></b>
                                                                <span class="text">Inch</span>
                                                            </label>
                                                            <span>&nbsp;</span>
                                                        </span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="measure-step" data-lang="step2">Step 2:</div>
                                                    <div class="measure-info" style="height: 55px;">
                                                        <span class="span1" data-lang="length">Length:</span>
                                                        <input type="text" id="measure-length" class="input-style1"
                                                            data-size="length">
                                                        <span id="alert-measure-length"
                                                            class="alert-text-inherit"></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="measure-step" data-lang="step3">Step 3:</div>
                                                    <div class="measure-info">
                                                        <span class="span1" data-lang="width">Width:</span>
                                                        <input type="text" id="measure-width" class="input-style1"
                                                            data-size="width">
                                                        <span id="alert-measure-width"
                                                            class="alert-text-inherit"></span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="measure-step" data-lang="step4">Step 4:</div>
                                                    <div class="measure-info">
                                                        <span class="span2" data-lang="your-regular-size">Your regular
                                                            size:</span>
                                                        <span class="select">
                                                            <select id="select-type" class="select-style"
                                                                data-regular="regularSize"></select>
                                                        </span>
                                                        <span class="select">
                                                            <select id="select-size" class="select-style"
                                                                data-regular="size"></select>
                                                        </span>
                                                        <span>&nbsp;</span>
                                                        <div>
                                                            <span class="span0"
                                                                style="width: 85px; margin-left: 30px">Quantity:</span>
                                                            <span class="select" style="margin: 0;">
                                                                <select id="select-qty" class="select-style"
                                                                    data-regular="quantity"></select>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div id="choose" class="leather">
                            <div class="choose-wp">
                                <p id="choose-text" data-lang="choose-your-leather">CHOOSE YOUR LEATHER</p>
                                <ul id="choose-items">
                                    <li data-id="LT-002" data-name="LT-002" data-default-price="233">
                                        <img src="../images/models/iShoes/Menu/Leather/M/LT-002.png" alt="LT-002"
                                            title="LT-002">
                                        <img class="used-design" src="../images/misc/check2.png" alt="">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="symbolic">
                            <div class="symbolic-wp">
                                <p id="symbolic-text" data-lang="choose-your-art-symbol">CHOOSE YOUR ART SYMBOL</p>
                                <ul id="symbolic-items">
                                    <li data-id="None" data-name="None">
                                        <img src="../images/models/iShoes/Menu/Symbolic/None.png" alt="None"
                                            title="None">
                                        <img src="../images/misc/check2.png" class="used-design">
                                    </li>
                                    <li data-id="Fire" data-name="Fire">
                                        <img src="../images/models/iShoes/Menu/Symbolic/Fire.png" alt="Fire"
                                            title="Fire">
                                    </li>
                                    <li data-id="Air" data-name="Air">
                                        <img src="../images/models/iShoes/Menu/Symbolic/Air.png" alt="Air" title="Air">
                                    </li>
                                    <li data-id="Humility" data-name="Humility">
                                        <img src="../images/models/iShoes/Menu/Symbolic/Humility.png" alt="Humility"
                                            title="Humility">
                                    </li>
                                    <li data-id="Ocean" data-name="Ocean">
                                        <img src="../images/models/iShoes/Menu/Symbolic/Ocean.png" alt="Ocean"
                                            title="Ocean">
                                    </li>
                                    <li data-id="Anchor" data-name="Anchor">
                                        <img src="../images/models/iShoes/Menu/Symbolic/Anchor.png" alt="Anchor"
                                            title="Anchor">
                                    </li>
                                    <li data-id="Love" data-name="Love">
                                        <img src="../images/models/iShoes/Menu/Symbolic/Love.png" alt="Love"
                                            title="Love">
                                    </li>
                                    <li data-id="Gratitude" data-name="gratitude">
                                        <img src="../images/models/iShoes/Menu/Symbolic/Gratitude.png" alt="gratitude"
                                            title="gratitude">
                                    </li>
                                    <li data-id="Earth" data-name="Earth">
                                        <img src="../images/models/iShoes/Menu/Symbolic/Earth.png" alt="Earth"
                                            title="Earth">
                                    </li>
                                    <li data-id="Peace" data-name="peace">
                                        <img src="../images/models/iShoes/Menu/Symbolic/Peace.png" alt="peace"
                                            title="peace">
                                    </li>
                                    <li data-id="Abundance" data-name="Abundance">
                                        <img src="../images/models/iShoes/Menu/Symbolic/Abundance.png" alt="Abundance"
                                            title="Abundance">
                                    </li>
                                    <li data-id="Infinity" data-name="Infinity">
                                        <img src="../images/models/iShoes/Menu/Symbolic/Infinity.png" alt="Infinity"
                                            title="Infinity">
                                    </li>
                                    <li data-id="Friendship" data-name="Friendship">
                                        <img src="../images/models/iShoes/Menu/Symbolic/Friendship.png" alt="Friendship"
                                            title="Friendship">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="control">
                            <div id="backstep" class="disable hide" data-lang="backstep">BACK STEP</div>
                            <!--<div id="chooseLeather">CHANGE LEATHER</div>-->
                            <div id="nextstep" data-lang="nextstep" class="slide">NEXT STEP</div>
                            <div id="addcart" class="disable hide" data-lang="add-to-card">ADD TO CART</div>
                        </div>
                    </div>
                </div>
                <!-- LINK -->
                <div id="link-outside">
                    <div style="float: left;">
                        <a href="/patina" target="_blank" data-lang="all-collection">All Collection</a>
                    </div>
                    <div style="float: right;">
                        <a id="my-account" class="my-account" href="/Login/login?method=myaccount" data-myaccount="/OrderHistory/my-account">My Account</a>
                        <b> | </b>
                        <a id="log-in" class="log-in" href="/Login/login?method=login">Log In</a>
                        <a id="log-out" class="log-out hidden" href="/Login/login?method=logout">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
    </div>
    <!-- MAIN BACKGROUND -->
    <div id="mastbackground">
        <!--<img src="/images/models/iShoes/designershoes/PT031/background.jpg" alt="">-->
    </div>
    <!-- FACEBOOK -->
    <div id="fb-root"></div>
    @endsection
    
