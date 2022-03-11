<div id="corona">
    <style>
        #corona {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            z-index: 0;
            opacity: 0;
            visibility: hidden;
            font-family: ProximaNovaRegular, arial, sans-serif;
            font-size: 17px;
            text-align: left;
            text-transform: none;
            color: #fff;
            -webkit-transition: opacity 300ms, z-index 0ms 300ms, visibility 0ms 300ms;
            -moz-transition: opacity 300ms, z-index 0ms 300ms, visibility 0ms 300ms;
            transition: opacity 300ms, z-index 0ms 300ms, visibility 0ms 300ms;
        }

        #corona.active {
            -webkit-transition: opacity 300ms, z-index 0ms 0ms, visibility 0ms 0ms;
            -moz-transition: opacity 300ms, z-index 0ms 0ms, visibility 0ms 0ms;
            transition: opacity 300ms, z-index 0ms 0ms, visibility 0ms 0ms;
            z-index: 9999;
            opacity: 1;
            visibility: visible;
        }

        #corona .close {
            position: absolute;
            right: 0;
            top: 0;
            width: 52px;
            height: 48px;
            cursor: pointer;
            z-index: 2;
        }

        #corona article {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            max-width: 640px;
            height: 0;
            margin: auto;
        }

        #corona p {
            position: relative;
            padding: 3% 5%;
            box-shadow: 0 0 15px #444;
            border: 1px solid #444;
            background: #000;
            color: #fff;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        #corona p span {
            margin: 0.75em 0;
            line-height: 1.25;
            display: block;
        }

        #corona-img,
        #corona-img img {
            width: 320px;
            cursor: pointer;
        }

         /* #corona-img {
            position: absolute;
            left: 0;
            right: 0;
            margin: auto;
            overflow: hidden;
            cursor: pointer;
            -webkit-transform: translateX(83px);
            -moz-transform: translateX(83px);
            transform: translateX(83px);
        } */

       .corona-popup {
            margin: 20px auto 0;
        }

        .corona-popup img {
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

        @media screen and (max-width: 640px) {
            #corona p {
                font-size: 0.875em;
            }
        }

        @media screen and (max-width: 480px) {
            #corona p {
                font-size: 0.8125em;
            }

            #corona-img,
            #corona-img img {
                width: 260px;
            }
        }

        @media screen and (max-width: 375px) {
            #corona p {
                font-size: 0.75em;
            }
        }
    </style>
    <article>
        <p>
            <span>Corona Virus Updates</span>
            <span>We are open!</span>
            <span>Please enjoy designing and order your custom made clothes at the best price in the world anywhere! The delivery is 8-12 weeks, for more information our team can assist you at info@itailor.com or support@itailor.com</span>
            <i class="close"><img src="{{asset('images/closebutton.png')}}"></i>
        </p>
    </article>
    <script>
        (function() {
            var a, b, c;
            a = document.querySelector("#corona-img");
            b = document.querySelector("#corona");
            c = b.querySelector(".close");
            a.addEventListener("click", function() {
                b.className = "active";
            });
            c.addEventListener("click", function() {
                b.className = "";
            });
        })();
    </script>
</div>