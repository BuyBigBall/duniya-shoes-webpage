<style>
    .PopUpContinueShopping{background:rgba(0, 0, 0, 0.5);height: 100%;left: 0;position: fixed;top: 0;width: 100%;color: #FFF;text-align: center}
    .PopUpContinueShopping-box{width: 1024px;margin: auto;height: 600px;left: 0;right: 0;top:5%;position: absolute}
    .PopUpContinueShopping-box h1{text-align: center;font-size: 175%;padding: 0 0 2%}
    .PopUpContinueShopping-box h2{font-size: 145%;font-weight: bold;padding: 3% 0;text-align: center;text-shadow: 0 0 5px #000000;letter-spacing: 3px}
    .PopUpContinueShopping-box .list{width: 49%;float: left;display: inline-block;position: relative;cursor: pointer}
    .PopUpContinueShopping-box .str-option{text-align: center;color: #5ed7ff;text-shadow: 0 0 1px #000;padding: 3% 0;clear: both}
    .PopUpContinueShopping-box .list-box{background-color: rgba(50,17,5,.5);background-color: rgba(50,17,5,.5);}
    .PopUpContinueShopping-box .list-box-2{background-color: rgba(0,54,47,.5);}
    .PopUpContinueShopping-box .list-box p{font-size: 70%;text-align: center;text-shadow: 0 0 1px #000}
    .PopUpContinueShopping-box .list-box .imgage{text-align: center}
    .PopUpContinueShopping-box .list-box .imgage img{max-width: 100%;}
    .PopUpContinueShopping-box .tab-promotion{position: absolute;right: 0;top:12%}
    .PopUpContinueShopping-box .button{background-color: #23C11B;box-shadow: 0 0 5px #FFFFFF;display: inline-block;font-weight: bold;margin: 0 1%;padding: 1% 7%;cursor: pointer}
    .PopUpContinueShopping-box .CloesButton{position: absolute;top:-35px;right: 0;cursor: pointer}
</style> 

<div class="PopUpContinueShopping">
    <div class="PopUpContinueShopping-box">
        <img src="webroot/img/icon/CloesButton.png" class="CloesButton closes"/>
        <h1>CONTINUE SHOPPING. DESIGN YOUR NEXT SHOES >></h1>
        <div class="list" style="margin-right: 2%" onclick="window.location = '{{ route('designerShoes') }}'">
            <div class="str-option">Option 1</div>
            <div class="list-box">
                <h2>ADVANCED 3D DESIGNER</h2>
                <p>Create and Design your Shoes with Unlimited Possibilities and Options</p>
                <div class="imgage">
                    <img src="webroot/img/img-list-1.png">
                </div>
            </div>
        </div>
        <div class="list" onclick="window.location = '{{ route('male.designidea') }}'">
            <div class="str-option">Option 2</div>
            <div class="list-box list-box-2">
                <h2>LUXURY DESIGNER SHOES</h2>
                <p>Choose and Personalise from Best-Selling, High Quality Leather Shoes</p>
                <div class="imgage">
                    <img src="webroot/img/img-list-2.png">
                </div>
                <img src="webroot/img/tab-promotion.png" class="tab-promotion"/>
            </div>
        </div>
        <div class="list" onclick="window.location = 'https://www.itailorshoes.com/patina/'">

            <div class="list-box list-box-2">
                <div style="position: absolute; top: 20px; right: 10px;">
                    <div class="str-option" style="font-size: 15px; color: #38a900; letter-spacing: 1px;">Option 3</div>
                    <h2 style="color: #000; font-size: 16px; letter-spacing: 1px; text-transform: uppercase; text-shadow: none;">Hand-Painted Patina Shoes</h2>
                </div>
                <div class="imgage">
                    <img src="webroot/img/Patina.jpg">
                </div>
            </div>
        </div>
        <div class="list">
            <div style="margin-top: 100px;">
                <div class="str-option">Option 4</div>
                <div class="button closes" style="margin: 0; padding: 4% 15%; font-weight: normal; letter-spacing: 2px; font-size: 20px; background-color: #47b900;">CHECKOUT</div>
            </div>
        </div>
    </div>
</div>