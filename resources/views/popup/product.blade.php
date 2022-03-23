<style>
    /*POPUP PRODUCT*/

    .btnstep-a {
        background: url("images/PopUpProductV2/Check-Out.jpg") no-repeat scroll 0 0 transparent;
        border: 0 none;
        color: #FFFFFF;
        cursor: pointer;
        font-size: 15px;
        height: 35px;
        text-shadow: 0 0 2px #FFF506;
        width: 138px;
    }

    .prod-promos a {
        text-decoration: none
    }

    .prod-promos,
    .prod-promos-2,
    .prod-promos-3 {
        float: left;
        list-style: none;
        position: relative;
        width: 100%;
        padding: 0;
        margin: 0 10px;
    }

    .prod-promos,
    .prod-promos-2 {
        margin-bottom: 8px;
    }

    .prod-promos-2 {
        margin-top: 8px;
    }

    .prod-promos li,
    .prod-promos-2 li,
    .prod-promos-3 li {
        float: left;
        position: relative;
        cursor: pointer;
        width: 182px
    }

    .prod-promos li img {
        float: left;
        height: 236px
    }

    .prod-promos-2 li img {
        float: left;
        height: 183px
    }

    .prod-promos-3 li img {
        height: 124px;
        float: left;
    }

    .prod-promos-3 li:last-child {
        position: absolute;
        right: -163px;
        bottom: -1px;
    }

    .prod-promos-3 li:last-child img {
        height: auto;
    }

    .prod-promos li:not(:first-child) {
        margin-left: 13px;
    }

    .prod-promos-2 li:not(:first-child) {
        margin-left: 7px;
    }

    .prod-promos-3 li:not(:first-child) {
        margin-left: 30px;
        margin-top: 13px
    }

    .prod-promos-name,
    .prod-promos-price {
        position: absolute !important;
        width: 100% !important;
        bottom: 0;
        left: 0;
        text-align: center !important;
    }

    .ppn2 {
        position: absolute !important;
        width: 60% !important;
        left: 0;
        font-size: 14px;
        font-weight: bold;
        color: #dddddd;
        text-align: center !important;
    }

    .ppp2 {
        position: absolute !important;
        width: 60% !important;
        left: 0;
        top: 10%;
        font-size: 20px;
        font-weight: bold;
        color: red;
        text-align: center !important;
    }

    .ppp2 span,
    .ppp3 span {
        color: red
    }

    .ppn3 {
        position: absolute !important;
        width: 60% !important;
        margin-left: 55%;
        left: 0;
        font-size: 14px;
        font-weight: bold;
        color: #dddddd;
        margin-top: 12%;
    }

    .ppp3 {
        position: absolute !important;
        width: 60% !important;
        margin-left: 60%;
        margin-top: 20%;
        left: 0;
        font-size: 20px;
        font-weight: bold;
        color: red !important;
    }

    .prod-promos-name {
        margin-bottom: 27%;
        font-size: 14px;
        font-weight: bold;
        color: #dddddd;
    }

    .prod-promos-price {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10%;
        color: red;
    }

    .prod-eff:hover {
        color: #fff;
        text-shadow: 0 0 15px #fff;
        transition-duration: .5s;
        -webkit-transition-duration: .5s;
        cursor: pointer;
    }

    .prod-eff2:hover {
        text-shadow: 0 0 15px #fff;
        transition-duration: .5s;
        -webkit-transition-duration: .5s;
        cursor: pointer;
    }

    .modal,
    .modal-prod,
    .modal-menu {
        background-color: rgba(0, 0, 0, 0.7);
        position: absolute;
        display: block;
        width: 100%;
        height: 100%;
        z-index: 200;
        top: 0;
    }

    .pop-prod {
        position: absolute;
        width: 1024px;
        height: 667px;
        float: left;
        background-color: #140f0d;
        display: block;
        overflow: hidden;
    }

    .pop-prod-left {
        position: relative;
        width: 75%;
        height: 100%;
        float: left;
    }

    .pop-prod-left div .continue {
        float: left;
        margin-left: 22%;
    }

    .pop-prod-left div {
        position: relative;
        width: 100%;
        float: left;
        font-size: 16px;
        color: #ddd;
    }

    .pop-prod-left div a {
        color: #ddd;
        float: left;
    }

    .pop-prod-left div a:hover {
        color: #fff;
        text-shadow: 0 0 5px #fff506;
    }

    .pop-prod-right {
        position: relative;
        width: 25%;
        height: 100%;
        float: left;
        overflow: hidden;
        cursor: pointer;
    }

    .pop-prod-right img {
        float: right;
        height: 667px;
    }

    .prod-avail {
        transform: rotate(-30deg);
        -ms-transform: rotate(-30deg);
        -webkit-transform: rotate(-12deg);
        border: 1px solid #b1b4b3;
        width: 224px;
        height: 70px;
        position: absolute;
        top: 267px;
        left: 21px;
        text-align: center;
        background-color: rgba(0, 0, 0, 0.7);
    }

    .prod-avail div span {
        font-size: 20px;
        color: #a09f9f;
    }

    .prod-avail div .avail-price {
        font-size: 20px;
        color: red;
        margin-left: 5px;
    }

    .prod-avail div .avail-curr {
        font-size: 20px;
        color: red;
        margin-left: 5px;
    }

    .prod-avail div {
        margin-top: 8px;
    }

    .prod-exit {
        position: absolute;
        bottom: 0;
        right: 0;
        font-size: 20px;
        font-weight: bold;
        margin: 0 35px 44px 0;
        color: #59c6ff;
    }

    .prod-avail a {
        text-decoration: none
    }

    .prod-promos-price span {
        color: red
    }

    .prod-heading {
        color: #e4c480;
        font-size: 22px;
        margin-right: 85px;
        float: right;
        margin-bottom: 8px;
    }
</style>
<div style="width:1024px; height:667px;">
    <div class="modal-prod">
        <div class="pop-prod">
            <div class="pop-prod-left">
                <div><span class="prod-heading" data-lang="product-heading">What do you want to do now?</span></div>
                <div style="text-align: right"><span class="continue"><img src="../images/icon/continue.png"></span><button type="button" class="btnstep-a pull-right" onclick="window.location.href = 'checkout.php'">CHECK OUT</button></div>
                <div>
                    <ul class="prod-promos">
                        <li>
                            <a target="_blank" href="/designshirts/">
                                <img src="../images/PopUpProductV2/TailoredShirt.jpg">
                                <span class="prod-promos-name prod-eff" data-lang="product-custom">CUSTOM SHIRT</span>
                                <span class="prod-promos-price prod-eff"><span data-lang="product-price">39.95</span> <span data-lang="product-currency">{!! setting('site.sign') !!}</span></span>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="/designsuits/" title="CUSTOM SUIT">
                                <img src="../images/PopUpProductV2/TailoredSuit.jpg">
                                <span class="prod-promos-name prod-eff" data-lang="product-custom">CUSTOM SUIT</span>
                                <span class="prod-promos-price prod-eff"><span data-lang="product-price">139</span> <span data-lang="product-currency">{!! setting('site.sign') !!}</span></span>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="/design3pcsuits/" title="CUSTOM SUIT3PCS">
                                <img src="../images/PopUpProductV2/Tailored3Piece.jpg">
                                <span class="prod-promos-name prod-eff" data-lang="product-custom">CUSTOM SUIT3PCS</span>
                                <span class="prod-promos-price prod-eff"><span data-lang="product-price">199</span> <span data-lang="product-currency">{!! setting('site.sign') !!}</span></span>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="/designjackets/" title="CUSTOM JACKET">
                                <img src="../images/PopUpProductV2/TailoredJacket.jpg">
                                <span class="prod-promos-name prod-eff" data-lang="product-custom">CUSTOM JACKET</span>
                                <span class="prod-promos-price prod-eff"><span data-lang="product-price">99</span> <span data-lang="product-currency">{!! setting('site.sign') !!}</span></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div style="margin-left:20px;opacity: 0"><a href="#">&gt;&gt; <span data-lang="product-style">SHIRT WITH SAME STYLE</span></a></div>
                <div>
                    <ul class="prod-promos-2">
                        <li>
                            <a target="_blank" href="/designvests/" title="CUSTOM VEST">
                                <img src="../images/PopUpProductV2/TailoredVest.jpg">
                                <span class="prod-promos-name prod-eff" data-lang="product-custom">CUSTOM VEST</span>
                                <span class="prod-promos-price prod-eff">
                                    <span data-lang="product-price">59</span> <span data-lang="product-currency">{!! setting('site.sign') !!}</span></span>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="/designpants/" title="CUSTOM PANT">
                                <img src="../images/PopUpProductV2/TailoredPant.jpg">
                                <span class="prod-promos-name prod-eff" data-lang="product-custom">CUSTOM PANT</span>
                                <span class="prod-promos-price prod-eff" style="left: 0"><span data-lang="product-price">49</span> <span data-lang="product-currency">{!! setting('site.sign') !!}</span></span>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="/designtuxedos/" title="CUSTOM TUXEDO">
                                <img src="../images/PopUpProductV2/TailoredTuxedo.jpg">
                                <span class="prod-promos-name prod-eff" data-lang="product-custom">CUSTOM TUXEDO</span>
                                <span class="prod-promos-price prod-eff"><span data-lang="product-price">179</span> <span data-lang="product-currency">{!! setting('site.sign') !!}</span></span>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="/designjeans/" title="CUSTOM JEAN">
                                <img src="../images/PopUpProductV2/TailoredJeans.jpg">
                                <span class="ppn2 prod-eff" data-lang="product-custom">CUSTOM JEAN</span>
                                <span class="ppp2 prod-eff"><span data-lang="product-price">79</span> <span data-lang="product-currency">{!! setting('site.sign') !!}</span></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul class="prod-promos-3">
                        <li>
                            <a target="_blank" href="https://www.itailoronline.com/designshirts.php?product=Gift">
                                <img src="../images/PopUpProductV2/GiftCard.jpg">
                                <span class="ppn2 prod-eff" data-lang="gift-card">Gift Card</span>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="/designties/" title="CUSTOM TIE">
                                <img src="../images/PopUpProductV2/TailoredTie.jpg">
                                <span class="ppn3 prod-eff" data-lang="product-custom">CUSTOM TIE</span>
                                <span class="ppp3 prod-eff"><span data-lang="product-price">8.99</span> <span data-lang="product-currency">{!! setting('site.sign') !!}</span></span>
                            </a>
                        </li>
                        <li>
                            <img src="../images/PopUpProductV2/Tailormade.jpg">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="pop-prod-right">
                <img src="../images/PopUpProductV2/TailoredCoat.jpg">
                <div class="prod-avail">
                    <div>
                        <a target="_blank" href="/designcoats/" title="OVERCOAT"><span class="prod-eff" data-lang="overcoat">OVERCOAT</span></a>
                        <a target="_blank" href="/designcoats/" title="OVERCOAT" class="prod-eff2"><span class="avail-price" data-lang="product-price">169</span><span class="avail-curr" data-lang="product-currency">{!! setting('site.sign') !!}</span></a>
                    </div>
                    <div><a href="/designcoats/" title="OVERCOAT"><span class="prod-eff" data-lang="available">AVAILABLE NOW !!</span></a></div>
                </div>
                <div class="prod-exit prod-eff closes"><span id="exitmodal" data-lang="exit">Exit</span></div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
</div>