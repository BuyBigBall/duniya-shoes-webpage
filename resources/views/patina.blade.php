@extends('layouts.app')

@section('content')
<section>
    <div class="clt-wp">
        <div id="tabmenu">
            <ul>
                <li class="tbm-opt tbm-ac">
                    <a href="/patina">
                        <span>Handcrafted Patina</span>
                    </a>
                </li>
                <li class="tbm-opt">
                    <a href="/patina/shoescare">
                        <span>Custom Shoes care</span>
                    </a>
                </li>
            </ul>

        </div>
        <img id="corona-img" src="../images/corona-update.png">
    </div>
</section>
<section id="patina-collection" class="collection">
    <div class="clt-view"> <b class="lang">Handcrafted Luxury Patina Shoes</b>
        <ul></ul>
    </div>
    <div class="clt-list" data-colm="3">
        <ul>
            @foreach ($allShoes as $shoes)
            <li class="clt-item clt-item-slide">
                <div class="clt-item-wp"> <a class="clt-item-ratio" href="design-patina-shoes/?model={{$shoes->key}}" target="_blank">
                        <div class="clt-figure">
                            <figure> <img class="sz-lazyload" data-szlazy="../images/patina/collection/{{$shoes->key}}/{{$shoes->sub_path1}}/{{$shoes->key}}.jpg" data-level="1" alt=""> </figure>
                            <figure> <img class="sz-lazyload" data-szlazy="../images/patina/collection/{{$shoes->key}}/{{$shoes->sub_path2}}/{{$shoes->key}}.jpg" data-level="2" alt=""> </figure>
                            <figure> <img class="sz-lazyload" data-szlazy="../images/patina/collection/{{$shoes->key}}/{{$shoes->sub_path3}}/{{$shoes->key}}.jpg" data-level="3" alt=""> </figure>
                            <figure> <img class="sz-lazyload" data-szlazy="../images/patina/collection/{{$shoes->key}}/{{$shoes->sub_path4}}/{{$shoes->key}}.jpg" data-level="4" alt=""> </figure>
                            <figure> <img class="sz-lazyload" data-szlazy="../images/patina/collection/{{$shoes->key}}/{{$shoes->sub_path5}}/{{$shoes->key}}.jpg" data-level="5" alt=""> </figure>
                        </div> <span class="clt-item-pick lang">Design now</span>
                    </a>
                    <div class="clt-figcaption">
                        <span title="Model Title">{{$shoes->title}}</span>
                        <span class="clt-item-price">
                            <span>{{$shoes->price.setting('site.sign')}}</span>
                        </span>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</section>
@endsection