<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ setting('site.title') }}</title>
    <meta name="description" content="">
    <meta name="theme-color" content="#ffffff" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/min/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/min/ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/min/collection.css') }}">
    <script async src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js"></script>
    <script defer src="{{ asset('js/min/jquery-3.3.1.js') }}"></script>
    <script defer src="{{ asset('js/min/sz-5.0.0.js') }}"></script>
    <script defer src="{{ asset('js/min/jquery.slides.js') }}"></script>
    <script defer src="{{ asset('js/min/collection.js') }}"></script>

</head>

<body>
    <div id="front-end">
        <section id="patina-shoes" class="sz-slideshow">
            <div class="ss-ratio">
                <div class="info">
                    <div class="nf-content nf-left">
                        <!-- <ul>
                            <li> <a href="/">iTailor.com</a> </li>
                        </ul> -->
                    </div>
                    <div class="nf-content nf-right">
                        <ul>
                            <li> <b class="lang">Worldwide shipping</b> </li>
                            <li> <b class="lang">Customer Care</b> <span>:</span> <span>info@itailor.com</span> </li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="reviews">
                    <nav class="trustpilot-widget" data-locale="en-US" data-template-id="5419b6ffb0d04a076446a9af" data-businessunit-id="4c95170000006400050de1c7" data-style-height="20px" data-style-width="100%" data-theme="dark">
                        <a href="#" target="_blank">Trustpilot</a>
                    </nav>
                    <div class="rv-brand">
                        <h3>Lusso</h3> <span>By iTailor</span>
                    </div>
                </div> -->
                <div class="slides">
                    <figure> <img class="sz-preload" data-szlazy="{{asset('images/slideshow/header/shoes-1.jpg')}}" alt="">
                        <figcaption>
                            <article>
                                <h2 style="color: #ff8100;">Hand-painted Patina Shoes</h2>
                            </article>
                        </figcaption>
                    </figure>
                    <figure> <img class="sz-preload" data-szlazy="{{asset('images/slideshow/header/shoes-2.jpg')}}" alt="">
                        <figcaption>
                            <article>
                                <h2 class="lang" style="color: #ff8100;">Work of Art</h2>
                            </article>
                        </figcaption>
                    </figure>
                    <figure> <img class="sz-preload" data-szlazy="{{asset('images/slideshow/header/shoes-3.jpg')}}" alt="">
                        <figcaption>
                            <article>
                                <h2 class="lang" style="color: #ff8100;">Passion of Italy & France</h2>
                            </article>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </section>
        <style>
            #tabmenu {
                position: relative;
                width: 100%;
                margin-bottom: 10px;
                display: inline-block;
                vertical-align: top;
            }

            #tabmenu>ul,
            #tabmenu>ul>li a {
                position: relative;
                width: 100%;
                display: inline-block;
                vertical-align: top;
            }

            #tabmenu>ul>li {
                position: relative;
                width: 50%;
                float: left;
                background: #f8f8f8;
                -webkit-transition: background 0.3s;
                -moz-transition: background 0.3s;
                transition: background 0.3s;
            }

            #tabmenu>ul>li.tbm-ac {
                background: #ddd;
            }

            #tabmenu>ul>li:hover {
                background: #eee;
            }

            #tabmenu>ul>li a {
                padding: 10px 20px;
                font-family: "ProximaNovaSemiBold";
                font-size: 1.25em;
                letter-spacing: 1px;
                text-align: center;
                text-transform: uppercase;
                color: #555;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            @media screen and (max-width: 480px) {
                #tabmenu>ul>li a {
                    font-size: 0.875em;
                    letter-spacing: 0;
                }
            }
        </style>