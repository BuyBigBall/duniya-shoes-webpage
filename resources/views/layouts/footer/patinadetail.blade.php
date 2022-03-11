<footer>
        <div class="ft-wp">
            <!-- <img class="corona-popup" src="{{asset('images/corona-update.png')}}"> -->
            <div class="ft-ct">
                <ul>
                    <li><span data-lang="custom-shoes">Custom Shoes</span></li>
                    <li><span data-lang="design-your-shoes">Design Your Shoes</span></li>
                    <li><span data-lang="designer-shoes">Designer Shoes</span></li>
                </ul>
            </div>
            <div class="ft-ct ft-ct-2">
                <div class="ft-grp ft-contact">
                    <ul>
                        <li>
                            <b data-lang="support-center">Support Center</b>
                            <p data-lang="support-detail">To contact us for all enquiries,please use this contact form
                                to get in touch with our service team. We will get back to you by email within 24 hours
                                to answer your request.</p>
                        </li>
                        <li>
                            <b data-lang="email">Email</b>
                            <span>info@itailor.com</span>
                        </li>
                        <li>
                            <b data-lang="website">Website</b>
                            <!-- <span>https://www.itailorshoes.com/patina/</span> -->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="ft-copyright">
            <p>{{setting('site.copyright')}}</p>
        </div>
        <style>
            footer {
                position: relative;
                z-index: 200;
                background: #000;
                font-family: "ProximaNova";
                font-size: 16px;
                color: #fff;
            }

            footer .ft-wp {
                width: 100%;
                max-width: 1280px;
                margin: auto;
                padding: 0 20px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            footer .ft-ct,
            footer .ft-ct>ul>li {
                display: inline-block;
                vertical-align: top;
            }

            footer .ft-ct {
                width: 100%;
                margin: 30px 0 0;
            }

            footer .ft-ct-2 {
                max-width: 1024px;
                margin: 30px auto 0;
                display: table;
            }

            footer .ft-ct>ul,
            footer .ft-ct>p {
                text-align: center;
            }

            footer .ft-ct>ul>li span {
                font-family: "ProximaNova";
                font-weight: 600;
                font-size: 1.5em;
                line-height: 1.25;
                text-transform: uppercase;
            }

            footer .ft-ct>ul>li:nth-of-type(n+2) span:before {
                content: "•";
                margin-right: 4px;
            }

            footer .ft-ct>p {
                max-width: 1024px;
                margin: 10px auto 0;
                line-height: 1.5;
            }

            footer .ft-grp,
            footer .ft-grp>ul,
            footer .ft-grp .ft-colm {
                float: left;
            }

            footer .ft-grp>ul>li {
                display: inline-block;
                vertical-align: top;
                width: 100%;
            }

            footer .ft-grp>ul>li b,
            footer .ft-grp .ft-colm b {
                font-family: "ProximaNova";
                font-weight: 600;
                font-size: 0.9375em;
                letter-spacing: 1px;
                text-transform: uppercase;
            }

            footer .ft-grp>ul>li b:after {
                content: ":";
                margin: 0 4px;
            }

            footer .ft-grp>ul>li p {
                margin: 10px 0 30px;
                font-family: "ProximaNova";
                font-weight: 200;
                font-size: 0.875em;
                line-height: 1.75;
            }

            footer .ft-grp .ft-colm {
                width: 25%;
                margin-bottom: 10px;
            }

            footer .ft-grp .ft-colm ul,
            footer .ft-grp .ft-colm ul>li a,
            footer .ft-grp .ft-colm ul>li a span {
                display: inline-block;
                vertical-align: top;
            }

            footer .ft-grp .ft-colm ul {
                width: 100%;
                margin-top: 10px;
            }

            footer .ft-grp .ft-colm ul>li {
                max-width: 90%;
            }

            footer .ft-grp .ft-colm ul>li a,
            footer .ft-grp .ft-colm ul>li a span {
                max-width: 100%;
            }

            footer .ft-grp .ft-colm ul>li a span {
                font-family: "ProximaNova";
                font-weight: 200;
                font-size: 0.875em;
                line-height: 1.75;
                white-space: nowrap;
                text-overflow: ellipsis;
                overflow: hidden;
            }

            footer .ft-grp .ft-colm ul>li a span:before {
                content: "-";
                margin-right: 4px;
            }

            footer .ft-copyright {
                width: 100%;
                background: #111;
                display: inline-block;
                vertical-align: top;
            }

            footer .ft-copyright p {
                margin: 10px 36px;
                font-size: 0.8125em;
                line-height: 1.25;
                text-align: center;
            }

            footer .ft-factory {
                width: 70%;
            }

            footer .ft-factory .ft-colm:nth-child(1),
            footer .ft-factory .ft-colm:nth-child(2),
            footer .ft-factory .ft-colm:nth-child(3),
            footer .ft-factory .ft-colm:nth-child(4) {
                min-height: 240px;
            }

            footer .ft-factory .ft-colm:nth-child(5),
            footer .ft-factory .ft-colm:nth-child(6) {
                min-height: 140px;
            }

            footer .ft-contact {
                width: 30%;
            }

            footer .ft-ct-2 .ft-contact {
                width: 100%;
            }

            footer .ft-ct-2 .ft-contact ul {
                float: none;
            }

            footer .ft-contact ul>li:nth-of-type(n+2) {
                margin: 8px 0;
            }

            footer .ft-ct-2 .ft-contact ul>li {
                width: 50%;
                padding: 0 5%;
                float: left;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            footer .ft-ct-2 .ft-contact ul>li:nth-of-type(n+2) {
                margin: 0 0 10px;
            }

            @media screen and (max-width: 1280px) and (min-width: 0px) {
                footer .ft-wp {
                    padding: 0 10px;
                }

                footer .ft-ct {
                    margin: 20px auto 0;
                }

                footer .ft-ct>ul>li {
                    width: 100%;
                    margin: 0;
                }

                footer .ft-ct>ul>li span {
                    font-size: 1.125em;
                    line-height: 1.5;
                }

                footer .ft-ct>ul>li:nth-of-type(n+2) span:before {
                    display: none;
                }

                footer .ft-ct>p {
                    font-size: 0.8125em;
                    line-height: 1.25;
                }

                footer .ft-grp .ft-colm ul {
                    margin-top: 5px;
                }

                footer .ft-grp>ul>li b,
                footer .ft-grp>ul>li span,
                footer .ft-grp .ft-colm b {
                    font-size: 0.8125em;
                    letter-spacing: 0;
                }

                footer .ft-grp>ul>li b,
                footer .ft-grp>ul>li span {
                    display: block;
                }

                footer .ft-grp>ul>li b {
                    margin-bottom: 5px;
                }

                footer .ft-grp>ul>li p {
                    font-size: 0.8125em;
                    line-height: 1.5;
                }

                footer .ft-factory,
                footer .ft-contact {
                    width: 100%;
                }

                footer .ft-factory .ft-colm {
                    width: 50%;
                }

                footer .ft-factory .ft-colm:nth-child(1),
                footer .ft-factory .ft-colm:nth-child(2) {
                    min-height: 240px;
                }

                footer .ft-factory .ft-colm:nth-child(3),
                footer .ft-factory .ft-colm:nth-child(4) {
                    min-height: 190px;
                }

                footer .ft-factory .ft-colm:nth-child(5),
                footer .ft-factory .ft-colm:nth-child(6) {
                    min-height: 140px;
                }

                footer .ft-contact {
                    margin-top: 20px;
                }

                footer .ft-ct-2 .ft-contact ul>li {
                    width: 100%;
                    padding: 0 4%;
                }

                footer .ft-ct-2 .ft-contact ul>li:nth-of-type(n+2) {
                    margin: 0 0 20px;
                }

                footer .ft-copyright {
                    margin-top: 20px;
                }

                footer .ft-copyright p {
                    font-size: 0.6875em;
                }
            }

            @media screen and (max-width: 1280px) and (min-width: 480px) {
                footer .ft-factory .ft-colm {
                    width: 33.33%;
                }

                footer .ft-factory .ft-colm:nth-child(1),
                footer .ft-factory .ft-colm:nth-child(2),
                footer .ft-factory .ft-colm:nth-child(3) {
                    min-height: 240px;
                }

                footer .ft-factory .ft-colm:nth-child(4),
                footer .ft-factory .ft-colm:nth-child(5),
                footer .ft-factory .ft-colm:nth-child(6) {
                    min-height: 140px;
                }
            }

            @media screen and (max-width: 1280px) and (min-width: 768px) {
                footer .ft-wp {
                    padding: 0 30px;
                }

                footer .ft-ct {
                    margin: 30px auto 0;
                }

                footer .ft-ct>ul>li {
                    width: auto;
                }

                footer .ft-ct>ul>li:nth-of-type(n+2) span:before {
                    display: inline-block;
                }

                footer .ft-ct>p {
                    font-size: 1em;
                }

                footer .ft-factory .ft-colm {
                    width: 25%;
                }

                footer .ft-factory .ft-colm:nth-child(1),
                footer .ft-factory .ft-colm:nth-child(2),
                footer .ft-factory .ft-colm:nth-child(3),
                footer .ft-factory .ft-colm:nth-child(4) {
                    min-height: 240px;
                }

                footer .ft-factory .ft-colm:nth-child(5),
                footer .ft-factory .ft-colm:nth-child(6) {
                    min-height: 140px;
                }
            }

            @media screen and (max-width: 1280px) and (min-width: 1024px) {
                footer .ft-factory {
                    width: 60%;
                }

                footer .ft-factory .ft-colm {
                    width: 33.33%;
                }

                footer .ft-factory .ft-colm:nth-child(1),
                footer .ft-factory .ft-colm:nth-child(2),
                footer .ft-factory .ft-colm:nth-child(3) {
                    min-height: 240px;
                }

                footer .ft-factory .ft-colm:nth-child(4),
                footer .ft-factory .ft-colm:nth-child(5),
                footer .ft-factory .ft-colm:nth-child(6) {
                    min-height: 140px;
                }

                footer .ft-contact {
                    width: 40%;
                    margin-top: 0;
                }
            }

            @media screen and (max-width: 768px) {
                footer {
                    margin-bottom: 54px;
                }
            }

        </style>
    </footer>
    
    <div id="canvasloader-container" class="wrapper"></div>
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
        var data, size, lang;

        data = {
            "modelpkey": "507",
            "model": "PT031",
            "model_style": "Oxford",
            "model_series": "",
            "coupons": "N",
            "on_sale": "N",
            "model_shape": "Sharp",
            "defaults": {
                "accessory": false,
                "main": "LT-002",
                "side": false,
                "front": false,
                "back": false,
                "sole": "LT-N007",
                "laces": false,
                "backstitch": "Brown",
                "lining": "SH-SW08",
                "theme": false,
                "selector": "main",
                "backstitch_price": 19,
                "symbolic_price": 19,
                "main_name": "LT-002",
                "sole_name": "LT-N007",
                "lining_name": "SH-SW08",
                "product": "shoe"
            },
            "main": {
                "item": [{
                    "id": "LT-002",
                    "name": "LT-002",
                    "price": "233",
                    "regular": "233"
                }],
                "type": "leather"
            },
            "sole": {
                "item": [{
                    "id": "LT-N007",
                    "name": "LT-N007",
                    "price": "",
                    "regular": "233"
                }, {
                    "id": "LT-LB02",
                    "name": "LT-LB02",
                    "price": "",
                    "regular": "233"
                }, {
                    "id": "LT-B01",
                    "name": "LT-B01",
                    "price": "",
                    "regular": "233"
                }, {
                    "id": "LT-BB03",
                    "name": "LT-BB03",
                    "price": "",
                    "regular": "233"
                }],
                "type": "sole"
            },
            "monogram": {
                "inside": "Y",
                "outside": "Y"
            },
            "selector": [{
                "main": {
                    "location": "0",
                    "style": "main",
                    "x": -20,
                    "y": -74,
                    "pos": "bottom"
                }
            }, {
                "main": {
                    "location": "1",
                    "style": "main",
                    "x": -20,
                    "y": -74,
                    "pos": "bottom"
                }
            }],
            "description": {
                "english": {
                    "title": "Model Title",
                    "description": "<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Upper Materials: Imported 100% Leather with Hand Patina.<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Lining: Sheepskin Leather&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Sole: Natural leather sole with<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Last: Slightly Squared Toe&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">&quot;Passion of Italy &amp; France&quot;<\/span><\/p>\n"
                },
                "german": {
                    "title": "Model Title",
                    "description": "<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Upper Materials: Imported 100% Leather with Hand Patina.<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Lining: Sheepskin Leather&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Sole: Natural leather sole with<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Last: Slightly Squared Toe&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">&quot;Passion of Italy &amp; France&quot;<\/span><\/p>\n"
                },
                "dutch": {
                    "title": "Model Title",
                    "description": "<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Upper Materials: Imported 100% Leather with Hand Patina.<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Lining: Sheepskin Leather&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Sole: Natural leather sole with<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Last: Slightly Squared Toe&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">&quot;Passion of Italy &amp; France&quot;<\/span><\/p>\n"
                },
                "french": {
                    "title": "Model Title",
                    "description": "<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Upper Materials: Imported 100% Leather with Hand Patina.<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Lining: Sheepskin Leather&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Sole: Natural leather sole with<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Last: Slightly Squared Toe&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">&quot;Passion of Italy &amp; France&quot;<\/span><\/p>\n"
                },
                "italian": {
                    "title": "Model Title",
                    "description": "<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Upper Materials: Imported 100% Leather with Hand Patina.<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Lining: Sheepskin Leather&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Sole: Natural leather sole with<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Last: Slightly Squared Toe&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">&quot;Passion of Italy &amp; France&quot;<\/span><\/p>\n"
                },
                "spanish": {
                    "title": "Model Title",
                    "description": "<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Upper Materials: Imported 100% Leather with Hand Patina.<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Lining: Sheepskin Leather&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Sole: Natural leather sole with<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Last: Slightly Squared Toe&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">&quot;Passion of Italy &amp; France&quot;<\/span><\/p>\n"
                },
                "danish": {
                    "title": "Model Title",
                    "description": "<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Upper Materials: Imported 100% Leather with Hand Patina.<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Lining: Sheepskin Leather&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Sole: Natural leather sole with<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Last: Slightly Squared Toe&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">&quot;Passion of Italy &amp; France&quot;<\/span><\/p>\n"
                },
                "norwegian": {
                    "title": "Model Title",
                    "description": "<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Upper Materials: Imported 100% Leather with Hand Patina.<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Lining: Sheepskin Leather&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Sole: Natural leather sole with<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Last: Slightly Squared Toe&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">&quot;Passion of Italy &amp; France&quot;<\/span><\/p>\n"
                },
                "portuguese": {
                    "title": "Model Title",
                    "description": "<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Upper Materials: Imported 100% Leather with Hand Patina.<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Lining: Sheepskin Leather&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Sole: Natural leather sole with<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Last: Slightly Squared Toe&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">&quot;Passion of Italy &amp; France&quot;<\/span><\/p>\n"
                },
                "swedish": {
                    "title": "Model Title",
                    "description": "<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Upper Materials: Imported 100% Leather with Hand Patina.<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Lining: Sheepskin Leather&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Sole: Natural leather sole with<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Last: Slightly Squared Toe&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">&quot;Passion of Italy &amp; France&quot;<\/span><\/p>\n"
                },
                "russian": {
                    "title": "Model Title",
                    "description": "<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Upper Materials: Imported 100% Leather with Hand Patina.<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Lining: Sheepskin Leather&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Sole: Natural leather sole with<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Last: Slightly Squared Toe&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">&quot;Passion of Italy &amp; France&quot;<\/span><\/p>\n"
                },
                "japanese": {
                    "title": "Model Title",
                    "description": "<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Upper Materials: Imported 100% Leather with Hand Patina.<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Lining: Sheepskin Leather&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Sole: Natural leather sole with<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">- Last: Slightly Squared Toe&nbsp;<\/span><\/p>\n\n<p><span style=\"color:rgb(29, 33, 41); font-size:14px\">&quot;Passion of Italy &amp; France&quot;<\/span><\/p>\n"
                }
            },
            "description_symbolic": {
                "english": {
                    "None": {
                        "name": "None",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Fire": {
                        "name": "Fire",
                        "description": "<p>Fire Description<\/p>\n"
                    },
                    "Air": {
                        "name": "Air",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Humility": {
                        "name": "Humility",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Ocean": {
                        "name": "Ocean",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Anchor": {
                        "name": "Anchor",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Love": {
                        "name": "Love",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Gratitude": {
                        "name": "Gratitude",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Earth": {
                        "name": "Earth",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Peace": {
                        "name": "Peace",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Abundance": {
                        "name": "Abundance",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Infinity": {
                        "name": "Infinity",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Friendship": {
                        "name": "Friendship",
                        "description": "<p>Symbolic Description<\/p>"
                    }
                },
                "german": {
                    "None": {
                        "name": "None",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Fire": {
                        "name": "Fire",
                        "description": "<p>Symbolic Description<\/p>\n"
                    },
                    "Air": {
                        "name": "Air",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Humility": {
                        "name": "Humility",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Ocean": {
                        "name": "Ocean",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Anchor": {
                        "name": "Anchor",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Love": {
                        "name": "Love",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Gratitude": {
                        "name": "Gratitude",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Earth": {
                        "name": "Earth",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Peace": {
                        "name": "Peace",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Abundance": {
                        "name": "Abundance",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Infinity": {
                        "name": "Infinity",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Friendship": {
                        "name": "Friendship",
                        "description": "<p>Symbolic Description<\/p>"
                    }
                },
                "dutch": {
                    "None": {
                        "name": "None",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Fire": {
                        "name": "Fire",
                        "description": "<p>Fire Description<\/p>\n"
                    },
                    "Air": {
                        "name": "Air",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Humility": {
                        "name": "Humility",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Ocean": {
                        "name": "Ocean",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Anchor": {
                        "name": "Anchor",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Love": {
                        "name": "Love",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Gratitude": {
                        "name": "Gratitude",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Earth": {
                        "name": "Earth",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Peace": {
                        "name": "Peace",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Abundance": {
                        "name": "Abundance",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Infinity": {
                        "name": "Infinity",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Friendship": {
                        "name": "Friendship",
                        "description": "<p>Symbolic Description<\/p>"
                    }
                },
                "french": {
                    "None": {
                        "name": "None",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Fire": {
                        "name": "Fire",
                        "description": "<p>Symbolic Description<\/p>\n"
                    },
                    "Air": {
                        "name": "Air",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Humility": {
                        "name": "Humility",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Ocean": {
                        "name": "Ocean",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Anchor": {
                        "name": "Anchor",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Love": {
                        "name": "Love",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Gratitude": {
                        "name": "Gratitude",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Earth": {
                        "name": "Earth",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Peace": {
                        "name": "Peace",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Abundance": {
                        "name": "Abundance",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Infinity": {
                        "name": "Infinity",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Friendship": {
                        "name": "Friendship",
                        "description": "<p>Symbolic Description<\/p>"
                    }
                },
                "italian": {
                    "None": {
                        "name": "None",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Fire": {
                        "name": "Fire",
                        "description": "<p>Symbolic Description<\/p>\n"
                    },
                    "Air": {
                        "name": "Air",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Humility": {
                        "name": "Humility",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Ocean": {
                        "name": "Ocean",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Anchor": {
                        "name": "Anchor",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Love": {
                        "name": "Love",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Gratitude": {
                        "name": "Gratitude",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Earth": {
                        "name": "Earth",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Peace": {
                        "name": "Peace",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Abundance": {
                        "name": "Abundance",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Infinity": {
                        "name": "Infinity",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Friendship": {
                        "name": "Friendship",
                        "description": "<p>Symbolic Description<\/p>"
                    }
                },
                "spanish": {
                    "None": {
                        "name": "None",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Fire": {
                        "name": "Fire",
                        "description": "<p>Symbolic Description<\/p>\n"
                    },
                    "Air": {
                        "name": "Air",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Humility": {
                        "name": "Humility",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Ocean": {
                        "name": "Ocean",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Anchor": {
                        "name": "Anchor",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Love": {
                        "name": "Love",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Gratitude": {
                        "name": "Gratitude",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Earth": {
                        "name": "Earth",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Peace": {
                        "name": "Peace",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Abundance": {
                        "name": "Abundance",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Infinity": {
                        "name": "Infinity",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Friendship": {
                        "name": "Friendship",
                        "description": "<p>Symbolic Description<\/p>"
                    }
                },
                "danish": {
                    "None": {
                        "name": "None",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Fire": {
                        "name": "Fire",
                        "description": "<p>Symbolic Description<\/p>\n"
                    },
                    "Air": {
                        "name": "Air",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Humility": {
                        "name": "Humility",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Ocean": {
                        "name": "Ocean",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Anchor": {
                        "name": "Anchor",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Love": {
                        "name": "Love",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Gratitude": {
                        "name": "Gratitude",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Earth": {
                        "name": "Earth",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Peace": {
                        "name": "Peace",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Abundance": {
                        "name": "Abundance",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Infinity": {
                        "name": "Infinity",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Friendship": {
                        "name": "Friendship",
                        "description": "<p>Symbolic Description<\/p>"
                    }
                },
                "norwegian": {
                    "None": {
                        "name": "None",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Fire": {
                        "name": "Fire",
                        "description": "<p>Symbolic Description<\/p>\n"
                    },
                    "Air": {
                        "name": "Air",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Humility": {
                        "name": "Humility",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Ocean": {
                        "name": "Ocean",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Anchor": {
                        "name": "Anchor",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Love": {
                        "name": "Love",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Gratitude": {
                        "name": "Gratitude",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Earth": {
                        "name": "Earth",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Peace": {
                        "name": "Peace",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Abundance": {
                        "name": "Abundance",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Infinity": {
                        "name": "Infinity",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Friendship": {
                        "name": "Friendship",
                        "description": "<p>Symbolic Description<\/p>"
                    }
                },
                "portuguese": {
                    "None": {
                        "name": "None",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Fire": {
                        "name": "Fire",
                        "description": "<p>Symbolic Description<\/p>\n"
                    },
                    "Air": {
                        "name": "Air",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Humility": {
                        "name": "Humility",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Ocean": {
                        "name": "Ocean",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Anchor": {
                        "name": "Anchor",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Love": {
                        "name": "Love",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Gratitude": {
                        "name": "Gratitude",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Earth": {
                        "name": "Earth",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Peace": {
                        "name": "Peace",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Abundance": {
                        "name": "Abundance",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Infinity": {
                        "name": "Infinity",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Friendship": {
                        "name": "Friendship",
                        "description": "<p>Symbolic Description<\/p>"
                    }
                },
                "swedish": {
                    "None": {
                        "name": "None",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Fire": {
                        "name": "Fire",
                        "description": "<p>Symbolic Description<\/p>\n"
                    },
                    "Air": {
                        "name": "Air",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Humility": {
                        "name": "Humility",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Ocean": {
                        "name": "Ocean",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Anchor": {
                        "name": "Anchor",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Love": {
                        "name": "Love",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Gratitude": {
                        "name": "Gratitude",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Earth": {
                        "name": "Earth",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Peace": {
                        "name": "Peace",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Abundance": {
                        "name": "Abundance",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Infinity": {
                        "name": "Infinity",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Friendship": {
                        "name": "Friendship",
                        "description": "<p>Symbolic Description<\/p>"
                    }
                },
                "russian": {
                    "None": {
                        "name": "None",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Fire": {
                        "name": "Fire",
                        "description": "<p>Symbolic Description<\/p>\n"
                    },
                    "Air": {
                        "name": "Air",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Humility": {
                        "name": "Humility",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Ocean": {
                        "name": "Ocean",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Anchor": {
                        "name": "Anchor",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Love": {
                        "name": "Love",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Gratitude": {
                        "name": "Gratitude",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Earth": {
                        "name": "Earth",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Peace": {
                        "name": "Peace",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Abundance": {
                        "name": "Abundance",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Infinity": {
                        "name": "Infinity",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Friendship": {
                        "name": "Friendship",
                        "description": "<p>Symbolic Description<\/p>"
                    }
                },
                "japanese": {
                    "None": {
                        "name": "None",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Fire": {
                        "name": "Fire",
                        "description": "<p>Symbolic Description<\/p>\n"
                    },
                    "Air": {
                        "name": "Air",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Humility": {
                        "name": "Humility",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Ocean": {
                        "name": "Ocean",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Anchor": {
                        "name": "Anchor",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Love": {
                        "name": "Love",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Gratitude": {
                        "name": "Gratitude",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Earth": {
                        "name": "Earth",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Peace": {
                        "name": "Peace",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Abundance": {
                        "name": "Abundance",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Infinity": {
                        "name": "Infinity",
                        "description": "<p>Symbolic Description<\/p>"
                    },
                    "Friendship": {
                        "name": "Friendship",
                        "description": "<p>Symbolic Description<\/p>"
                    }
                }
            },
            "language": "English"
        };
        size = {
            "EURO": [36, 37, 38, 38.7, 39.3, 40, 40.5, 41, 42, 42.5, 43, 44, 44.5, 45, 46, 46.5, 47, 48, 49, 50, 51,
                52
            ],
            "US": [4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 8.5, 9, 9.5, 10, 10.5, 11, 11.5, 12, 12.5, 13, 13.5, 14, 14.5,
                15, 16
            ],
            "UK": [4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 8.5, 9, 9.5, 10, 10.5, 11, 11.5, 12, 12.5, 13, 13.5, 14,
                14.5],
            "AU": [4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 8.5, 9, 9.5, 10, 10.5, 11, 11.5, 12, 12.5, 13, 13.5, 14,
                14.5],
            "JP": [22.5, 23, 23.5, 24, 24.5, 25, 25.5, 26, 26.5, 27, 27.5, 28, 28.5, 29, 29.5, 30, 30.5, 31, 31.5,
                32, 32.5, 33
            ]
        };
        lang = {
            "choose-your-leather": "Choose Your Leather",
            "choose-your-sole-style": "Choose Your Sole",
            "nextstep": "NEXT STEP",
            "backstep": "BACK",
            "monogram-initials": "MONOGRAM \/ INITIALS",
            "inside-lining": "INSIDE LINING",
            "outside-sole": "OUTSIDE SOLE",
            "easy-measurement": "EASY MEASUREMENTS FOR PERFECT FIT",
            "step1": "Step 1:",
            "step2": "Step 2:",
            "step3": "Step 3:",
            "step4": "Step 4:",
            "length": "Length:",
            "width": "Width:",
            "your-regular-size": "Your regular size:",
            "add-to-card": "ADD TO CART",
            "click-change-leather": "Click to Change Leather",
            "english-script": "ENTER YOUR MONOGRAM (English Script Only)",
            "oxford-desc": "Oxford shoe is a style of leather shoe with enclosed lacing. You can customize each area with iShoes 3D Designer from combining 100s of leather and thousands of styles",
            "derby-desc": "Derby shoe(or Gibson) is a style of shoe characterized by shoelace eyelet tabs that are sewn on top of a single-piece vamp.You will be able to customize\/design every detail of this Derby Shoes type.",
            "loafers-desc": "Loafers are typically low, lace-less shoes.there are accessory details that you can customize and create your own design in this loafer shoe type by iShoes.",
            "fashion-desc": "Fashion Shoes,are slips on lace-less shoes,it has elastic on the upper and assure high comfort,looks trendy and also smart casual shoe type.",
            "monk-desc": "Our iShoes Monk is our own collection of Monk styled shoes - no laces, closed by a buckle and strap. Monks are smart, casual-wear shoes that can also be worn formally making it the most sought after category of shoes. The design options we provide are truly limitless - you can customise the upper, side, strab, back and sole features of the shoes, as well select contrasts from over 90 leather choices.",
            "boot-desc": "Our iShoes Boot collection is our interpretation of the classic Boot design. Our boots mainly covers the foot and ankle areas. You can customise any part of the Boots with your choice of leather as well as other personalisation options."
        };

    </script>
    <script src="{{ asset('js/patina/handler.js') }}"></script>
    <script src="{{ asset('js/patina/preload.js') }}"></script>
    <script src="{{ asset('js/patina/canvas.js') }}"></script>
    
    
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
    <!-- <script src="{{ asset('js/patina/Sz.js') }}"></script> -->
    <script src="{{ asset('js/patina/jquery.mCustomScrollbar.concat.min.js') }}"> </script>
    <script src="{{ asset('js/patina/MayaPopup.js') }}"></script>
    <script src="{{ asset('js/patina/my-account.js') }}"></script>
    <script>
        $(document).ready(function () {
            var initData = {
                path: {
                    domainPath: 'https://www.itailorshoes.com/',
                    projectPath: 'https://www.itailorshoes.com/design-patina-shoes/'
                },
                global: '{"COUNTRY":"Russian Federation","CURR":"EUR","LANGUAGE":"English","SIGN":"&euro;"}',
                profile: '',
                size: ''
            };

            myAccount.init(initData);

            $('.my-account, .log-in, .log-out').click(function (e) {
                e.preventDefault();

                if (e.target.id == 'log-out') {
                    myAccount.logoutProcess();
                } else {
                    if (e.target.id == 'my-account' && myAccount.starter.setting.profile.email) {
                        myAccount.popupMyAccount(e);
                    } else {
                        var callback = function () {

                        }
                        myAccount.popupLogin(e, callback);
                    }
                }
            });
        });

    </script>
    @include('news.corona')
</body>

</html>