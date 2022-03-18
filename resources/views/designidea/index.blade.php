
<!DOCTYPE html>
<html>
    <head>
        <title>DESIGNER SHOES</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <!-- META IMAGE -->
        <meta property="og:title" content="Customized Shoes Design Idea by iTailor">
        <meta property="og:description" content="Design Shoe 3D By iTailor">
        <meta property="og:image" content="">
        <!-- MARKUP -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/patina/reset.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/patina/fonts.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/designer/layout.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/designer/preload.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/patina/jquery-tooltip.css') }}"/>
        <script src="{{ asset('js/patina/sizzle.min.js') }}"></script>
        <script src="{{ asset('js/patina/jquery.js') }}"></script>
        <script src="{{ asset('js/patina/heartcode-canvasloader-min-0.9.1.js') }}"></script>
        <script src="{{ asset('js/patina/jquery.tooltip.min.js') }}"></script>
        <script src="{{ asset('js/patina/speziicoz.base.js') }}"></script>
        <script src="{{ asset('js/patina/speziicoz.query.js') }}"></script>
        <script src="{{ asset('js/patina/speziicoz.event.js') }}"></script>
        <script src="{{ asset('js/patina/speziicoz.event.mobile.js') }}"></script>
        <script src="{{ asset('js/patina/speziicoz.ajax.js') }}"></script>
        <script>
            var size, lang;
            var data = {!! $data !!};
            @if($gender=='female')
                size = {"EURO":[36,37,38,38.7,39.3,40,40.5,41,42,42.5,43,44,44.5,45,46,46.5,47,48,49,50,51,52],"US":[4.5,5,5.5,6,6.5,7,7.5,8,8.5,9,9.5,10,10.5,11,11.5,12,12.5,13,13.5,14,14.5,15,16],"UK":[4,4.5,5,5.5,6,6.5,7,7.5,8,8.5,9,9.5,10,10.5,11,11.5,12,12.5,13,13.5,14,14.5],"AU":[4,4.5,5,5.5,6,6.5,7,7.5,8,8.5,9,9.5,10,10.5,11,11.5,12,12.5,13,13.5,14,14.5],"JP":[22.5,23,23.5,24,24.5,25,25.5,26,26.5,27,27.5,28,28.5,29,29.5,30,30.5,31,31.5,32,32.5,33]};
                lang = {"choose-your-leather":"Choose Your Leather","choose-your-sole-style":"Choose Your Sole","nextstep":"NEXT STEP","backstep":"BACK","monogram-initials":"MONOGRAM \/ INITIALS","inside-lining":"INSIDE LINING","outside-sole":"OUTSIDE SOLE","easy-measurement":"EASY MEASUREMENTS FOR PERFECT FIT","step1":"Step 1:","step2":"Step 2:","step3":"Step 3:","step4":"Step 4:","length":"Length:","width":"Width:","your-regular-size":"Your regular size:","add-to-card":"ADD TO CART","click-change-leather":"Click to Change Leather","english-script":"ENTER YOUR MONOGRAM (English Script Only)","oxford-desc":"Oxford shoe is a style of leather shoe with enclosed lacing. You can customize each area with iShoes 3D Designer from combining 100s of leather and thousands of styles","derby-desc":"Derby shoe(or Gibson) is a style of shoe characterized by shoelace eyelet tabs that are sewn on top of a single-piece vamp.You will be able to customize\/design every detail of this Derby Shoes type.","loafers-desc":"Loafers are typically low, lace-less shoes.there are accessory details that you can customize and create your own design in this loafer shoe type by iShoes.","fashion-desc":"Fashion Shoes,are slips on lace-less shoes,it has elastic on the upper and assure high comfort,looks trendy and also smart casual shoe type.","monk-desc":"Our iShoes Monk is our own collection of Monk styled shoes - no laces, closed by a buckle and strap. Monks are smart, casual-wear shoes that can also be worn formally making it the most sought after category of shoes. The design options we provide are truly limitless - you can customise the upper, side, strab, back and sole features of the shoes, as well select contrasts from over 90 leather choices.","boot-desc":"Our iShoes Boot collection is our interpretation of the classic Boot design. Our boots mainly covers the foot and ankle areas. You can customise any part of the Boots with your choice of leather as well as other personalisation options."};
            @else
                size = {"EURO":[36,37,38,38.7,39.3,40,40.5,41,42,42.5,43,44,44.5,45,46,46.5,47,48,49,50,51,52],"US":[4.5,5,5.5,6,6.5,7,7.5,8,8.5,9,9.5,10,10.5,11,11.5,12,12.5,13,13.5,14,14.5,15,16],"UK":[4,4.5,5,5.5,6,6.5,7,7.5,8,8.5,9,9.5,10,10.5,11,11.5,12,12.5,13,13.5,14,14.5],"AU":[4,4.5,5,5.5,6,6.5,7,7.5,8,8.5,9,9.5,10,10.5,11,11.5,12,12.5,13,13.5,14,14.5],"JP":[22.5,23,23.5,24,24.5,25,25.5,26,26.5,27,27.5,28,28.5,29,29.5,30,30.5,31,31.5,32,32.5,33]};
                lang = {"choose-your-leather":"Choose Your Leather","choose-your-sole-style":"Choose Your Sole","nextstep":"NEXT STEP","backstep":"BACK","monogram-initials":"MONOGRAM \/ INITIALS","inside-lining":"INSIDE LINING","outside-sole":"OUTSIDE SOLE","easy-measurement":"EASY MEASUREMENTS FOR PERFECT FIT","step1":"Step 1:","step2":"Step 2:","step3":"Step 3:","step4":"Step 4:","length":"Length:","width":"Width:","your-regular-size":"Your regular size:","add-to-card":"ADD TO CART","click-change-leather":"Click to Change Leather","english-script":"ENTER YOUR MONOGRAM (English Script Only)","oxford-desc":"Oxford shoe is a style of leather shoe with enclosed lacing. You can customize each area with iShoes 3D Designer from combining 100s of leather and thousands of styles","derby-desc":"Derby shoe(or Gibson) is a style of shoe characterized by shoelace eyelet tabs that are sewn on top of a single-piece vamp.You will be able to customize\/design every detail of this Derby Shoes type.","loafers-desc":"Loafers are typically low, lace-less shoes.there are accessory details that you can customize and create your own design in this loafer shoe type by iShoes.","fashion-desc":"Fashion Shoes,are slips on lace-less shoes,it has elastic on the upper and assure high comfort,looks trendy and also smart casual shoe type.","monk-desc":"Our iShoes Monk is our own collection of Monk styled shoes - no laces, closed by a buckle and strap. Monks are smart, casual-wear shoes that can also be worn formally making it the most sought after category of shoes. The design options we provide are truly limitless - you can customise the upper, side, strab, back and sole features of the shoes, as well select contrasts from over 90 leather choices.","boot-desc":"Our iShoes Boot collection is our interpretation of the classic Boot design. Our boots mainly covers the foot and ankle areas. You can customise any part of the Boots with your choice of leather as well as other personalisation options."};
            @endif

            <?php $shoes_data=json_decode($data); ?>
        </script>
        <script src="{{ asset('js/designer/handler.js') }}"></script>
        <script src="{{ asset('js/designer/preload.js') }}"></script>
        <script src="{{ asset('js/patina/canvas.js') }}"></script>
        
    </head>

    <body>
        <!-- PRELOAD -->
        <div id="preload">
            <div id="preload-content">
                <p id="preloading-text" class="fluorescent">DUNIYA DESIGNER SHOES</p>
                <div id="preload-inner">
                    <div id="preloading" class="effect2"></div>
                </div>
                <p id="preloading-percent">0%</p>
            </div>
        </div>
        <!-- CONTENTS -->
        <div id="mastcontainer">
            <div id="mastcontent">
                <div id="inner">
                    <!-- STATIC CONTENT -->
                    <div id="static">
                        <header id="masthead">
                            <img src="/images/logo-ishoes.png" style="width: 223px; height: 79px;">
                        </header>
                        <article id="item-detail">
                            <img src="/images/icon/soft.png">
                            <p id="price" class="emphasize">
                                <span style="font-size:0.5em;color:#3dcfdc;text-decoration:line-through;">
                                    <span id="set-price-regular">0</span>
                                    <span>{!! setting('site.sign') !!}</span>
                                </span>
                                <span>
                                    <span id="set-price">0</span>
                                    <span>{!! setting('site.sign') !!}</span>
                                </span>
                            </p>
                            <p class="desc-1">
                                <b style="padding-bottom: 5px; display: inline-block;">DESCRIPTION</b>
                                                                                                <span id="desc-shoes" class="desc-shoes" title="Oxford shoe is a style of leather shoe with enclosed lacing. You can customize each area with iShoes 3D Designer from combining 100s of leather and thousands of styles">
                                    Oxford shoe is a style of leather shoe with enclosed lacing. You can customize each area with iShoes 3D Designer from combining 100s of leather and thousands of styles                                </span>
                            </p>
                            <p class="desc-2">
                                <b>DETAILS</b><br/>
                                <span id="percent-model">100% leather</span>
                            </p>
                            <ul id="social" style="margin-top: 10px;">
                                <li><a href="https://www.facebook.com/iTailorShirts" target="_blank"></a></li>
                                <li><a href="http://twitter.com/iTailorshirts" target="_blank"></a></li>
                                <li><a href="http://www.pinterest.com/itailor/"></a></li>
                            </ul>
                            <!-- FACEBOOK -->
                            <!--<img id="share-design" src="/images/misc/facebook_share.gif" alt="share this with your friend" style="margin-top: 10px; cursor: pointer;">-->
                            <!-- FACEBOOK -->
                            <div class="corona-popup">
                                <img id="corona-img" src="/images/corona-update.png">
                            </div>
                        </article>
                    </div>
                    <!-- DYNAMIC CONTENT -->
                    <div id="showcase">
                        <div id="slide">
                            <div id="overview">
                                <ul>
                                    <li data-view="0" class="active">
                                        <img src="/images/models/iShoes/designershoes/{!! $shoes_data->model !!}/view/view1.jpg" alt="">
                                        <div class="overview-bg"></div>
                                    </li>
                                    <li data-view="1">
                                        <img src="/images/models/iShoes/designershoes/{!! $shoes_data->model !!}/view/view2.jpg" alt="">
                                        <div class="overview-bg"></div>
                                    </li>
                                                                            <li data-view="2">
                                            <img src="/images/models/iShoes/designershoes/{!! $shoes_data->model !!}/view/view3.jpg" alt="">
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
                @if($gender=='male')
                <div id="first-sole" class="max-width-center">
                    <img src="/images/models/iShoes/designershoes/{!! $shoes_data->model !!}/view1/sole/{!! $shoes_data->defaults->sole_name .'.png' !!}" alt="">
                </div>
                @endif
            
                <div id="first-main" class="max-width-center anim">
                    <img src="/images/models/iShoes/designershoes/{!! $shoes_data->model !!}/view1/main/{!! $shoes_data->defaults->main_name .'.png' !!}" alt="">
                </div>
            
                @if($gender=='female')
                <div id="first-back" class="max-width-center">
                    <img src="/images/models/iShoes/designershoes/{!! $shoes_data->model !!}/view1/back/{!! $shoes_data->defaults->back_name .'.png' !!}" alt="">
                </div>
                @endif
            
                <div id="first-body" class="max-width-center">
                    <img src="/images/models/iShoes/designershoes/{!! $shoes_data->model !!}/view1/Body.png" alt="">
                </div>
                <div id="selector" class="show">
                    @if( !empty($shoes_data->selector[0] ) )
                        @foreach($shoes_data->selector[0] as $key=>$selector)
                            <?php $sel_bg = ''; ?>
                            @if($key=='side') <!-- SIDE SELECTOR --> 
                                <?php $sel_bg = $shoes_data->defaults->side; ?>
                                    @endif
                            @if($key=='main') <!-- MAIN SELECTOR --> 
                                <?php $sel_bg = $shoes_data->defaults->main; ?>
                                    @endif
                            @if($key=='front') <!-- FRONT SELECTOR --> 
                                <?php $sel_bg = $shoes_data->defaults->front; ?>
                                    @endif
                            @if($key=='back') <!-- BACK SELECTOR --> 
                                <?php $sel_bg = $shoes_data->defaults->back; ?>
                                    @endif
                            @if($key=='accessory') <!-- ACCESSORY SELECTOR --> 
                                <?php $sel_bg = $shoes_data->defaults->accessory; ?>
                                    @endif


                            <div class="selector-{!! $selector->style !!} selector-target" data-target="{!! $key !!}" style="top:{!! $selector->y !!}px; left:{!! $selector->x !!}px;">
                                <div class="selector" style="background-image:url(/images/models/iShoes/Menu/Leather/M/{!! $sel_bg !!}.png);"></div>
                                <span data-lang="click-change-leather" class="text-{!! $selector->pos !!}">CLICK TO CHANGE LEATHER</span>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        <!-- VIEW 2 -->
        <div class="second view">
            <div id="second-sole" class="max-width-center">
                <img data-source="/images/models/iShoes/designershoes/{!! $shoes_data->model !!}/view2/sole/Sole-1BN.png" src="/images/misc/empty.png" alt="">
            </div>
        
            <div id="second-main" class="max-width-center anim">
                <img data-source="/images/models/iShoes/designershoes/{!! $shoes_data->model !!}/view2/main/Leather-Dye-LightBrown.png" src="/images/misc/empty.png" alt="">
            </div>
        
            <div id="second-body" class="max-width-center">
                <img data-source="/images/models/iShoes/designershoes/{!! $shoes_data->model !!}/view2/Body.png" src="/images/misc/empty.png" alt="">
            </div>
            <div class="makeup"></div>
            <div id="selector-view2" class="show">
                @if( !empty($shoes_data->selector[1] ) )
                    @foreach($shoes_data->selector[1] as $key=>$selector)
                        @if($key=='side')       <!-- SIDE SELECTOR --> @endif
                        @if($key=='main')       <!-- MAIN SELECTOR --> @endif
                        @if($key=='front')      <!-- FRONT SELECTOR --> @endif
                        @if($key=='back')       <!-- BACK SELECTOR --> @endif
                        @if($key=='accessory')  <!-- ACCESSORY SELECTOR --> @endif
                        <div class="selector-{!! $selector->style !!} selector-target" data-target="{!! $key !!}" style="top:{!! $selector->y !!}px; left:{!! $selector->x !!}px;">
                            <div class="selector" style="background-image:url(/images/models/iShoes/Menu/Leather/M/Leather-Dye-LightBrown.png);"></div>
                            <span data-lang="click-change-leather" class="text-{!! $selector->pos !!}">CLICK TO CHANGE LEATHER</span>
                        </div>
                    @endforeach
                @endif
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
                <span class="text">BLAKE STITCH</span>
            </label>
            <span class="price emphasize">+ <span id="backstitch-price">0</span> <span id="backstitch-currency">{!! setting('site.sign') !!}</span></span>
        </div>
        <div id="snds-sndv-main" class="max-width-center">
            <img data-source="/images/models/iShoes/designershoes/{!! $shoes_data->model !!}/view3/sole/{!! $shoes_data->defaults->sole_name !!}.png" src="/images/misc/empty.png" alt="">
        </div>
        <div id="snds-sndv-sole" class="max-width-center anim">
            <img src="/images/misc/empty.png" alt="">
        </div>
        <div id="snds-sndv-backstitch" class="max-width-center anim">
            <img src="/images/misc/empty.png" alt="">
        </div>
        <div id="snds-sndv-monogram" class="hide">
            <span class="design-by">Designed by</span>
            <span id="monogram-design" class="design-by-name"></span>
        </div>
    </div>
</section>

<section id="third-step" class="third step">
    <div id="third-view">
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
            <div class="monogram animated-normal fadeOutUp">
                <p class="detail" data-lang="english-script">ENTER YOUR MONOGRAM (English Script Only)</p>
                <input type="text" id="text-monogram" class="text-monogram" disabled="" maxlength="10">
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
                        <img src="/images/misc/empty.png" alt="">
                    </li>
                    <li id="measurement-video">
                        <div id="video-length" class="hide-video">
                            <video width="320" height="258" controls="controls" autoplay="autoplay">
                                <source src="/html5video/length.m4v" type="video/mp4">
                                <source src="/html5video/length.ogv" type="video/ogg">
                            </video>
                        </div>
                        <div id="video-width" class="hide-video">
                            <video width="320" height="258" controls="controls" autoplay="autoplay">
                                <source src="/html5video/width.m4v" type="video/mp4">
                                <source src="/html5video/width.ogv" type="video/ogg">
                            </video>
                        </div>
                    </li>
                    <li>
                        <div class="measure-step" data-lang="step1">Step 1:</div>
                        <div class="measure-info">
                            <span class="measure-unit">
                                <input type="radio" class="checklist" id="measure-size-cm" name="measure-size" value="cm" checked>
                                <label for="measure-size-cm">
                                    <b class="style3"></b>
                                    <span class="text">cm</span>
                                </label>
                                <span>&nbsp;</span>
                            </span>
                            <span class="measure-unit">
                                <input type="radio" id="measure-size-inch" class="checklist" name="measure-size" value="inch">
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
                                <input type="text" id="measure-length" class="input-style1" data-size="length">
                                <span>&nbsp;&nbsp;</span>
                                <span id="alert-measure-length" class="alert-text-inherit red" style="color: #70D3E9;"></span>
                            </div>
                        </li>
                                        <li>
                        <div class="measure-step" data-lang="step3">Step 3:</div>
                        <div class="measure-info">
                            <span class="span1" data-lang="width">Width:</span>
                            <input type="text" id="measure-width" class="input-style1" data-size="width">
                            <span>&nbsp;&nbsp;</span>
                            <span id="alert-measure-width" class="alert-text-inherit red"></span>
                        </div>
                    </li>
                    <li>
                        <div class="measure-step" data-lang="step4">Step 4:</div>
                        <div class="measure-info">
                            <span class="span2" data-lang="your-regular-size">Your regular size:</span>
                            <span class="select">
                                <select id="select-type" class="select-style" data-regular="regularSize"></select>
                            </span>
                            <span class="select">
                                <select id="select-size" class="select-style" data-regular="size"></select>
                            </span>
                            <span>&nbsp;&nbsp;&nbsp;</span>
                            <span class="span0">Qty:</span>
                            <span class="select">
                                <select id="select-qty" class="select-style" data-regular="quantity"></select>
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>                           
 </div> 
        <div id="choose">
            <p id="choose-text" data-lang="choose-your-leather">CHOOSE YOUR LEATHER</p>
                <ul id="choose-items" >
                    @foreach( $shoes_data->leather->item as $leather )
                    <li data-id="{!! $leather->id !!}" data-name="{!! $leather->name !!}" data-default-price="{!! $leather->price !!}">
                        <img src="/images/models/iShoes/Menu/Leather/M/{!! $leather->path !!}.png" alt="{!! $leather->id !!}" title="{!! $leather->name !!}">
                        @if($leather->pid==$shoes_data->defaults->main)
                            <img src="/images/misc/check2.png" class="leather-active">
                        @endif
                    </li>
                    @endforeach                                 
                </ul>
        </div>
                            <div id="control">
                                <div id="backstep" class="disable hide" data-lang="backstep">BACK STEP</div>
                                <!-- <div id="chooseLeather">CHANGE LEATHER</div> -->
                                <div id="nextstep" data-lang="nextstep" class="slide">NEXT STEP</div>
                                <div id="addcart" class="disable hide" data-lang="add-to-card">ADD TO CART</div>
                            </div>
                        </div>
                    </div>
                    <!-- LINK -->
                    <div id="link-outside">
                        <a href="/designshoes/" target="_blank">Home</a>
                        <a href="/designshoes/" target="_blank">Create your Own 3D</a>
                    </div>
                </div>
            </div>
            <div style="clear: both;"></div>
        </div>
        <!-- MAIN BACKGROUND -->
        <div id="mastbackground">
            <img src="/images/models/iShoes/designershoes/{!! $shoes_data->model !!}/background.jpg" alt="">
        </div>
        <!-- FACEBOOK -->
        <div id="fb-root"></div>
        <div id="footer">
            <ul>
                <li><a title="Orthopedic Shoes" href="http://www.itailor.com/Orthopedic-shoes/" target="_blank" style="color: #FFA500; font-size: 14px;">Orthopedic Shoes</a></li>
                <li><a href="http://www.itailor.com/designshirts" title="iTailor Tailored Shirts" target="_blank"><span data-lang="tailored-shirts" data-traffic="link-shirt">TAILORED SHIRTS</span> 29.95 {!! setting('site.sign') !!}</a></li>
                <li><a href="http://www.itailor.com/designsuits" title="iTailor Tailored Suits" target="_blank"><span data-lang="tailored-suits" data-traffic="link-suit">TAILORED SUITS</span> 119 {!! setting('site.sign') !!}</a></li>
                <li><a title="iTailor About Us" target="_blank" href="http://www.itailor.com/about-us.php" data-lang="about-us" data-traffic="link-about">About Us</a></li>
                <li><a data-traffic="link-faq" title="iTailor FAQ" target="_blank" href="http://www.itailor.com/faq.php" data-lang="faq">FAQ</a></li>
                <li><a data-traffic="link-contact" title="iTailor Contact Us" target="_blank" href="http://www.itailor.com/contact-us.php" data-lang="contact-us">Contact Us</a></li>
                <li><a data-traffic="link-collection" title="iTailor Collection" target="_blank" href="https://www.facebook.com/iTailorShirts" data-lang="collection">Collection</a></li>
            </ul>
        </div>
        
        <div id="canvasloader-container" class="wrapper"></div>
        @include('news.corona')
        @csrf
        <style>
            .corona-popup {
                margin: 20px auto 0;
            }

            .corona-popup img#corona-img {
                width: 290px;
                margin-left: -10px;
            }

            @media screen and (max-width: 768px) {
                #corona-img {
                    top: 0;
                    -webkit-transform: translateX(0);
                    -moz-transform: translateX(0);
                    transform: translateX(0);
                }
            }
        </style>
        <script type="text/javascript">
            var cl = new CanvasLoader('canvasloader-container');

            cl.setColor('#ffffff'); // default is '#000000'
            cl.setShape('spiral'); // default is 'oval'
            cl.setDiameter(67); // default is 40
            cl.setDensity(36); // default is 40
            cl.setFPS(13); // default is 24
            cl.show(); // Hidden by default

            // This bit is only for positioning - not necessary
            var loaderObj = document.getElementById("canvasLoader");

            loaderObj.style.position = "absolute";
            loaderObj.style["top"] = cl.getDiameter() * -0.5 + "px";
            loaderObj.style["left"] = cl.getDiameter() * -0.5 + "px";
        </script>
    </body>
</html>