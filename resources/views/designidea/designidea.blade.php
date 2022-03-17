@extends('layouts.app')
@section('content')
    
<body>
    @csrf
    <script>
        var initData = {
            path: {
                domainPath: '/',
                @if( $gender=="female" )
                    projectPath: '/women-shoes/'
                @else
                    projectPath: '/designershoes/'
                @endif
            }
        };

        $(document).ready(function() {
            announce.init(initData);
            var dataObject = {!! $dataObject !!};

            processDesignIdea.defaults.linkMain = '/';
            @if( $gender=="female" )
                processDesignIdea.defaults.path = '/women-shoes/';
                processDesignIdea.defaults.linkProject = '/women-shoes/';
            @else
                processDesignIdea.defaults.path = '/';
                processDesignIdea.defaults.linkProject = '/designershoes/';
            @endif
            
            //processDesignIdea.defaults.itemSize = {!! env('ITEMS_COUNT_PER_PAGE') !!};
            processDesignIdea.defaults.itemSize =  {!! setting('site.display_itemscount_perpage') !!};

            processDesignIdea.config(dataObject);
            $('.menuMain .menuMain-box').mCustomScrollbar({
                scrollInertia: 100,
                scrollButtons: {
                    enable: false
                },
                advanced: {
                    updateOnContentResize: true
                }
            });


            /*-----------------------------------------
             * PRELOAD ING 3D DESIGN 
             *----------------------------------------*/
            $('html').imagesLoaded({
                progress: function(isBroken, $images, $proper, $broken) {
                    var percent = Math.round((($proper.length + $broken.length) * 100) / $images
                        .length) + "%";
                    $('#preloading').css('width', percent);
                    $('#preloading-percent').html(percent);
                },
                always: function() {
                    setTimeout(function() {
                        $('#preload').addClass("success");
                    }, 2000);
                    setTimeout(function() {
                        $('#preload').remove();
                    }, 2200);
                    $('html,body,.list-sty,.container').scrollTop(0)
                }
            });
        });
    </script>


    <article>
        <header class="header">
            <style>
                .header-description .block-announce {
                    position: relative;
                }

                .header-description .block-announce .banner-announce {
                    position: relative;
                    top: -20px;
                    cursor: pointer;
                }
            </style>
            <section class="header-description">
                <div class="soft-touch-idea">
                    <a href="#" target="_blank" title="Soft Touch & Feel">
                        <img src="{{asset('images/soft-touch.png')}}">
                    </a>
                </div>
                <h3>DUNIYA DESIGNER SHOES</h3>
                <div class="block-announce">
                    <a class="banner-announce" target="_blank">
                        <img src="{{asset('images/corona-update.png')}}" width="283">
                    </a>
                </div>
            </section>
            <section class="logo">
                <img src="{{asset('images/logo-ishoes.png')}}">
            </section>
            <section class="toolbar">
                <nav>
                    <ul style="width: 20%">
                        <li onclick="document.location = '/designidea';">
                            Home<span class="icon icon-home">
                                <!--icon home-->
                            </span></li>
                    </ul>
                    <ul style="width: 80%;">
                        <li>
                            <span class="go-to-custom" onclick="document.location = '/patina';">GO TO PATINA SHOES</span>
                        </li>
                        <li>
                            <span class="go-to-custom" @if($gender=='male') style="color: rgba(92, 228, 255, 0.82);" @endif onclick="document.location = '/designidea';">MAN SHOES</span>
                        </li>
                        <li>
                            <span class="go-to-custom" @if($gender=='female') style="color: rgba(92, 228, 255, 0.82);" @endif onclick="document.location = '/women-shoes/designidea';">WOMEN SHOES</span>
                        </li>
                        <!-- <li>
                            <span class="go-to-custom" onclick="document.location = '#';">GO TO DESIGNER BELTS</span>
                        </li>
                        <li>
                            <span class="go-to-custom" onclick="document.location = '#';">GO TO 3D CUSTOM BELTS</span>
                        </li>
                        <li>
                            <span class="go-to-custom" onclick="document.location = '/';">GO TO 3D CUSTOM SHOES</span>
                            <span class="icon icon-arrow"></span>
                        </li> -->
                    </ul>
                </nav>
            </section>
        </header>
        <section class="contain">
            <div id="preload">
                <div id="preload-content">
                    <p id="preloading-text" class="fluorescent">DUNIYA DESIGNER SHOES</p>
                    <div id="preload-inner">
                        <div id="preloading" class="effect2"></div>
                    </div>
                    <p id="preloading-percent">0%</p>
                </div>
            </div>
            <section class="clear menuMain">
                <div class="menu">
                    <ul>
                        <li><a target="_bank" href="/designidea">Home</a>
                        </li>
                        <li><a target="_bank" href="/designshoes">GO TO 3D CUSTOM SHOES</a>
                        </li>
                    </ul>
                </div>
                <div class="icon-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <h2 class="refine-by">REFINE BY</h2>
                <div class="txtC">
                    <div class="button btnClear">Clear All</div>
                </div>
                <div class="menuMain-box">
                    <nav>
                        <h2><span class="arrow"></span>LEATHER</h2>
                        <ul>
                            <?php $idx=0; ?>
                            @foreach($category as $item)
                            <li>
                                <input id="checkbox-category-{!! $idx !!}" type="checkbox" name="category" value="{!! $item->id !!}">
                                <label for="checkbox-category-{!! $idx !!}"><b></b><span>{!! $item->name !!}</span></label>
                            </li>
                            <?php $idx++ ?>
                            @endforeach
                        </ul>
                    </nav>
                    <nav>
                        <h2><span class="arrow"></span>SHOES TYPE</h2>
                        <ul>
                            <?php $idx=0; ?>
                            @foreach($style as $item)
                            <li><input id="checkbox-style-{!! $idx !!}" type="checkbox" name="style" value="{!! $item->type !!}">
                                <label for="checkbox-style-{!! $idx !!}"><b></b><span>{!! $item->name !!}</span></label>
                            </li>
                            <?php $idx++ ?>
                            @endforeach
                        </ul>
                    </nav>
                    <nav>
                        <h2><span class="arrow"></span>COLOR</h2>
                        <ul>
                            <?php $idx=0; ?>
                            @foreach($colorgroup as $item)
                            <li><input id="checkbox-colorGrp-{!! $idx !!}" type="checkbox" name="colorGrp" value="{!! $item->id !!}">
                                <label for="checkbox-colorGrp-{!! $idx !!}"><b></b><span>{!! $item->name !!}</span></label>
                            </li>
                            <?php $idx++ ?>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <p class="copyright">{{setting('site.copyright')}}</p>
            </section>
            <section class="container">
                <section class="menuOption">
                    <nav>
                        <ul>
                            <li data-option="bestsellers">BEST SELLERS</li>
                            <li data-option="business">BUSINESS</li>
                            <li data-option="casual">CASUAL</li>
                            <li data-option="laceup">LACE-UP</li>
                            <li data-option="slipons">SLIP-ONS</li>
                            <li data-option="chesea">CHELSEA</li>
                            <li data-option="sale" class="sele">SALE</li>
                        </ul>
                    </nav>
                    <section class="menuOption-description">
                        <ul>
                            <li>
                                <div class="menuOption-box-img">
                                    <img src="{{asset('images/DesignIdea/option/1.png')}}" alt="" />
                                </div>
                                <div class="menuOption-box-detail">
                                    <h1>BEST SELLERS</h1>
                                    <div>
                                        Choose your perfect shoe amongst the favourites at iTailor! A collection of
                                        bespoke shoes that feature smart and casual looks; from Boots to Loafers to
                                        Monks and much more!
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="menuOption-box-img">
                                    <img src="{{asset('images/DesignIdea/option/2.png')}}" alt="" />
                                </div>
                                <div class="menuOption-box-detail">
                                    <h1>BUSINESS</h1>
                                    <div>
                                        iShoes offer the smartest business shoes collection with the ability for you to
                                        customise and personalise it to another step. Choose from a range of business
                                        shoes and design now!
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="menuOption-box-img">
                                    <img src="{{asset('images/DesignIdea/option/3.png')}}" alt="" />
                                </div>
                                <div class="menuOption-box-detail">
                                    <h1>CASUAL</h1>
                                    <div>
                                        With a range of fashion, loafers, slip-ons and moccasins; iShoes provides an
                                        extensive range of casual shoes whilst maintaining a bespoke touch. The variety
                                        of styles below are sure to go with all your casual looks.
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="menuOption-box-img">
                                    <img src="{{asset('images/DesignIdea/option/4.png')}}" alt="" />
                                </div>
                                <div class="menuOption-box-detail">
                                    <h1>LACE-UP</h1>
                                    <div>
                                        Smart and Sophisticated shoes are essential. iShoes provide a variety of the
                                        smartest shoes whilst at the same time making sure they’re fashionable.
                                        Unlimited design possibilities and personalisation options. Simply and select
                                        your custom made shoes!
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="menuOption-box-img">
                                    <img src="{{asset('images/DesignIdea/option/5.png')}}" alt="" />
                                </div>
                                <div class="menuOption-box-detail">
                                    <h1>LUXURY</h1>
                                    <div>
                                        Find a selection of the most luxurious shoes in the world and the shoes that
                                        will make a style statement. A range of luxurious shoes ranging from high
                                        quality leathers, sheepskin, wool fabric mix. Select and personalise your
                                        trend-setting luxury shoes.
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="menuOption-box-img">
                                    <img src="{{asset('images/DesignIdea/option/6.png')}}" alt="" />
                                </div>
                                <div class="menuOption-box-detail">
                                    <h1>CHELSEA</h1>
                                    <div>
                                        Modern, Stylish and most importantly, comfortable. The Chelsea range offer a
                                        fashionable look whilst at the same time being extremely comfortable. Choose
                                        from a variety of Chelsea styles below:
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </section>
                </section>
                <ul class="list-sty"></ul>
            </section>
        </section>
        <div class="tab-more">More Style</div>

    </article>


</body>

</html>
@endsection