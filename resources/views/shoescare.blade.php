@extends('layouts.app')

@section('content')

<script async src="{{ asset('js/min/iscroll-5.2.0.js') }}"></script>
<script defer src="{{ asset('js/min/shoecare.js') }}"></script>
<style>
    .sz-spinner .spn-dv>li {
        min-width: 100px;
    }

    .sz-spinner .spn-dv>li:first-of-type {
        text-align: left;
    }

    .sz-spinner .spn-dv>li:last-of-type {
        text-align: right;
    }

    .collection .clt-list>ul>.clt-item .clt-item-wp {
        margin: 2%;
    }

    .collection .clt-list>ul>.clt-item .clt-figure figure {
        padding: 5%;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .collection .clt-list>ul>.clt-item .clt-item-ratio:before,
    .collection .clt-list>ul>.clt-item .clt-item-opt-toggle:checked+.clt-item-opt-inn:after {
        margin-top: 100%;
    }

    .collection .clt-list>ul>.clt-item .clt-item-opt-content .sz-spinner .spn-dv>li {
        min-width: 0;
    }

    .collection .clt-list>ul>.clt-item .clt-item-opt-content .sz-dropdown .dd-dv>li:first-of-type,
    .collection .clt-list>ul>.clt-item .clt-item-opt-content .sz-spinner .spn-dv>li:first-of-type {
        width: 100%;
        margin-bottom: 5px;
        font-size: 0.875em;
        font-weight: bold;
        text-align: left;
        text-indent: 1px;
    }

    .collection .clt-list>ul>.clt-item .clt-item-opt-row {
        padding: 0;
    }

    .collection .clt-list>ul>.clt-item .clt-item-opt-row>li {
        margin: 0 2% 5px;
    }

    .collection .clt-list>ul>.clt-item .clt-item-opt-row>li:nth-of-type(1),
    .collection .clt-list>ul>.clt-item .clt-item-opt-row>li:nth-of-type(2) {
        width: 120px;
    }

    .collection .clt-list>ul>.clt-item .clt-item-opt-row>li:nth-of-type(3) {
        width: 96px;
    }

    .collection .clt-list>ul>.clt-item .clt-item-opt-row>li:nth-of-type(4) {
        width: 20px;
    }

    .button.btn-cart {
        width: 80%;
        max-width: 400px;
        margin: 30px auto 50px;
        padding: 15px;
        font-size: 1.75em;
        letter-spacing: 2px;
        text-transform: uppercase;
        display: block;
    }

    @media screen and (max-width: 1024px) {
        .collection .clt-list>ul>.clt-item .clt-item-opt-row>li {
            margin: 0 0.5% 5px;
        }

        .collection .clt-list>ul>.clt-item .clt-item-opt-row>li:nth-of-type(1),
        .collection .clt-list>ul>.clt-item .clt-item-opt-row>li:nth-of-type(2) {
            width: 84px;
        }

        .button.btn-cart {
            width: 60%;
        }
    }

    @media screen and (min-width: 1024px) {
        .collection .clt-list>ul>.clt-item .clt-item-opt-row>li:nth-of-type(n) {
            width: 100%;
            margin-bottom: 10px;
        }

        .collection .clt-list>ul>.clt-item .clt-item-opt-content .sz-dropdown,
        .collection .clt-list>ul>.clt-item .clt-item-opt-content .sz-spinner {
            width: 150px;
        }

        .collection .clt-list>ul>.clt-item .clt-item-opt-content .sz-spinner .spn-dv {
            text-align: left;
        }
    }

    @media screen and (min-width: 1440px) {
        .collection .clt-list>ul>.clt-item .clt-item-opt-row>li:nth-of-type(n) {
            margin-bottom: 5px;
        }

        .collection .clt-list>ul>.clt-item .clt-item-opt-row>li:nth-of-type(1),
        .collection .clt-list>ul>.clt-item .clt-item-opt-row>li:nth-of-type(2) {
            width: 84px;
        }

        .collection .clt-list>ul>.clt-item .clt-item-opt-row>li:nth-of-type(3) {
            width: 96px;
        }
    }
</style>
<section>
    <div class="clt-wp">
        <div id="tabmenu">
            <ul>
                <li class="tbm-opt">
                    <a href="/patina">
                        <span>Handcrafted Patina</span>
                    </a>
                </li>
                <li class="tbm-opt tbm-ac">
                    <a href="/patina/shoescare">
                        <span>Custom Shoes care</span>
                    </a>
                </li>
            </ul>

        </div>
        <img id="corona-img" src="../images/corona-update.png">
    </div>
</section>
<section id="shoe-care-products" class="collection">
    <div class="clt-list" data-colm="2">
        <ul>
            @foreach (json_decode($data)->collection as $goods)
            @if($goods->style != "ShoeTrees")
            <li class="clt-item clt-item-slide">
                <div class="clt-item-wp"> <a class="clt-item-ratio">
                        <div class="clt-figure no-hover">
                            <figure> <img class="sz-lazyload" data-szlazy="../images/patina/shoecare/{{Str::upper($goods->id)}}/View{{$goods->view}}/{{strtolower($goods->id)}}.jpg" data-level="1" alt=""> </figure>
                        </div>
                        <div class="clt-item-content">
                            {!!str_replace('\/', '/', $goods->desc)!!}
                        </div>
                    </a>
                    <div class="clt-item-opt">
                        <div class="sz-spinner" data-sz-spinner="{{Str::upper($goods->id)}}">
                            <ul class="spn-dv">
                                <li> <span class="spn-name lang">Quantity</span> </li>
                                <li>
                                    <div class="spn-wp"> <button class="spn-btn spn-minus"><span>-</span></button> <input class="spn-input" type="text" value="0" readonly> <button class="spn-btn spn-plus"><span>+</span></button> </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            @else
            <li class="clt-item clt-item-slide">
                <div class="clt-item-wp"> <a class="clt-item-ratio">
                        <div class="clt-figure no-hover">
                            <figure> <img class="sz-lazyload" data-szlazy="../images/patina/shoecare/{{Str::upper($goods->id)}}/View{{$goods->view}}/{{strtolower($goods->id)}}.jpg" data-level="1" alt=""> </figure>
                        </div>
                        <div class="clt-item-content">
                            {!!str_replace('\/', '/', $goods->item_description)!!}
                        </div>
                    </a>
                    <div class="clt-item-opt"> <label class="clt-item-opt-more button lang" for="h62ec357b">Choose Size</label>
                        <div class="clt-item-opt-wp"> <input id="h62ec357b" class="clt-item-opt-toggle" type="checkbox">
                            <div class="clt-item-opt-inn">
                                <div class="clt-item-opt-content">
                                    <ul class="clt-item-opt-row" data-device="shoetrees">
                                        <li>
                                            <div class="sz-dropdown dropdown-type" data-sz-dropdown="{{Str::upper($goods->id)}}">
                                                <ul class="dd-dv">
                                                    <li> <span class="dd-name lang">Type</span> </li>
                                                    <li>
                                                        <div class="dd-wp">
                                                            <div class="dd-choose"> <span class="lang">None</span> </div>
                                                            <div class="dd-group">
                                                                <div class="dd-inn">
                                                                    <ul class="dd-list">
                                                                        <li class="dd-opt"> <a><span class="lang">None</span></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sz-dropdown dropdown-size" data-sz-dropdown="{{Str::upper($goods->id)}}">
                                                <ul class="dd-dv">
                                                    <li> <span class="dd-name lang">Size</span> </li>
                                                    <li>
                                                        <div class="dd-wp">
                                                            <div class="dd-choose"> <span class="lang">None</span> </div>
                                                            <div class="dd-group">
                                                                <div class="dd-inn">
                                                                    <ul class="dd-list">
                                                                        <li class="dd-opt"> <a><span class="lang">None</span></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sz-spinner" data-sz-spinner="{{Str::upper($goods->id)}}">
                                                <ul class="spn-dv">
                                                    <li> <span class="spn-name lang">Quantity</span> </li>
                                                    <li>
                                                        <div class="spn-wp"> <button class="spn-btn spn-minus"><span>-</span></button>
                                                            <input class="spn-input" type="text" value="0" readonly> <button class="spn-btn spn-plus"><span>+</span></button>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
    <button class="button btn-cart btn-disable lang">Add to Cart</button>
</section>
<section>
    <script id="sz-resource" type="application/json">
        {
            "rs": <?php echo $data; ?>
        }
    </script>
</section>
@endsection