@extends('layouts.app')
@section('content')


<body>
    <link rel="stylesheet" href="{{asset('css/checkout.css')}}" />
    <script src="{{asset('js/checkout.js')}}"></script>
    <script src="{{asset('js/deesignProduct.js')}}"></script>
    <script src="{{asset('js/JS-DESIGNNER-3D.js')}}"></script>
    <script>
        listEle.objLang = <?php echo $language;  ?>;
        $(document).ready(function() {
            var itemArr = <?php echo $goods; ?>;
            deesignProduct.config({
                itemArr: itemArr
            });
        });
        setLanguage();

        var ch = 'ec';
    </script>

    <style>
        html {
            background-image: none;
        }

        #content {
            background: url("{{asset('images/bg/bg-design-idea.jpg')}}") no-repeat scroll center top transparent;
        }
    </style>
    <div id="content" class="checkout" style="display: block;">
        <div id="content-layout">
            @include('layouts.topmenu')
            <div id="checkout-body">
                <div style="float: left; min-width: 650px;">
                    <div id="eleFrmdatacheckOut" style="min-width: 650px; max-width: 650px;">
                        <script type="text/javascript">
                            /* global precessDesignnerShoe */
                            $(document).ready(function() {
                                setLanguage();
                            });
                        </script>
                        <table width="98.5%" style="background-color: rgba(5,10,14,0.5);">
                            <tr>
                                <td style="width: 630px; border-bottom: solid 1px white; float: left;">
                                    <table class="tbHead">
                                        <tr>
                                            <td width='50' data-lang="chkcol10">No.</td>
                                            <td width='265' data-lang="chkcol3">Item Description</td>
                                            <td width='75' data-lang="chkcol4">Price</td>
                                            <td width='75' data-lang="chkcol5">Shipping</td>
                                            <td width='35' data-lang="chkcol6">Qty</td>
                                            <td width='35' data-lang="chkcol7">Remove</td>
                                            <td width="70" data-lang="total">Total</td>
                                        </tr>
                                    </table>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td style="max-height: 100px;">
                                    <div class="list-chkout" style="width:100%; max-height:380px; overflow:hidden;">
                                        <table id="t-body" cellspacing="0" cellpadding="1" border="1" width="630" height="380">
                                            <tbody style="margin-top: 10px;">
                                                <?php $amt=0; $shp=0; ?>
                                                @foreach($goodsLists as $key=>$item)
                                                <tr class="list-hover tagProductList-{{$item->id}}">
                                                    <td width='30' style="vertical-align: top!important;text-align: center;color: #FFFFFF;padding: 5px;" class="list-no">No.{{$key}}</td>
                                                    <td width='265'>
                                                        <div style="float: left;max-width: 100px;padding: 10px;">
                                                            <div style="min-width: 100px;min-height: 100px">
                                                                <span class="imgs{{$key}}"></span>
                                                            </div>
                                                            <div class="viewLink">
                                                                <a href="detail?id={{$item->id}}" class="view-detail" data-lang="view-detail">View Detail</a>
                                                            </div>
                                                        </div>
                                                        <div style="float: left; width:165px;" id="productDetail">
                                                            <p class="sp-orange">No. {{$item->MODELNO}}</p>
                                                            <p>Style {{$item->shoeType}}</p>
                                                            @if( !empty($item->getLeatherName))
                                                            <p>Leather {{ $item->getLeatherName }}</p>
                                                            @endif
                                                            @if( !empty($item->getSizeTypeName) ) 
                                                            <p> {{ $item->getSizeTypeName}}  {{ $item->getSizeType ?? ''}} </p>
                                                            @endif
                                                            @if($item->productType == "shoe")
                                                            <p>
                                                                <br><br>
                                                                <a href="#" id="1" class="save-design" data-lang="save-design">Save Design</a>
                                                            </p>
                                                            @endif
                                                        </div>
                                                    </td>


                                                    <td width='55' style="text-align: right;padding-top:7%;font-weight: 800;" class="price">{{ ($item->getShoePrice ?? 0) + ($item->getMixPrice ?? 0) }}</td>
                                                    <td width='55' style="text-align: right;padding-top:7%" class="shipping">{{ $item->getShoeShipping ?? 0 }}</td>
                                                    <td width='25' style="text-align: center;padding-top:7%" class="qty">{{ $item->getQty }}</td>
                                                    <td width='35' style="text-align: center;padding-top:6%"><img class="deleteItem" id="{{$item->id}}" src="{{asset('images/icon/bin.png')}}" style="width: 18px;cursor: pointer"></td>
                                                    <td width='60' style="text-align: right;padding-top:7%;font-weight: 800" class="total">{{ (($item->getShoePrice ?? 0) + ($item->getMixPrice ?? 0) ) * ($item->getQty ?? 0) + ($item->getShoeShipping ?? 0) }} </td>
                                                    <?php 
                                                        $amt+= (($item->getShoePrice ?? 0) + ($item->getMixPrice ?? 0)) * $item->getQty;
                                                        $shp+= ($item->getShoeShipping ?? 0);
                                                    ?>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="630" height="2" style="border-top:solid 1px #FFF;float:left;"></td>
                            </tr>
                        </table>
                        <div style="float: left;height: 125px;position: relative;margin-top: 5px;">
                            <div id="use_coupon">
                                <p>
                                    <span data-lang="couponToggle">Do you have coupon code?</span>&nbsp;
                                    <a href="#" class="inputCoupon elehide" data-lang="click-here">click here</a>
                                </p>
                                <div class="cou-toggle in">
                                    <p>
                                        <span style="display: inline-block; max-width: 100px;" data-lang="couponInputText">Coupon No.</span>&nbsp;<input type="text" id="coupon_no_input" name="coupon_no" style="width: 150px;" value="">
                                        <button type="button" data-lang="btn-apply" class="btnstep" onclick="applyCoupon()">Apply</button>
                                    </p>
                                    <p style="margin-left: 87px;color: #00b3ee;font-weight: bold;display: none" data-lang="Available-coupon" id="available-coupon">Available Coupon</p>
                                </div>
                            </div>
                            <button class="btnstep" id="continue-shopping" data-lang="btn-cont" style="position: absolute;bottom: 0px;">CONTINUE SHOPPING</button>
                        </div>
                        <div style="float: right;height: 210px;width: 285px;margin-top: 5px;margin-right:10px;">
                            <p><span class="sp-detail"><span class="sum-qty">{!! count($goodsLists)!!} </span> <span data-lang="item-price-text"> item(s) Price :</span></span><span class="sp-value sum-price">{{ $amt }} {!!setting('site.sign')!!}</span></p>
                            <p><span class="sp-detail" data-lang="shipping-text">Shipping : </span><span class="sp-value sum-shipping">{{ $shp }} {!!setting('site.sign')!!}</span></p>
                            <p class="in cou-toggle disBox">
                                <span class="sp-detail" data-lang="coupon-dis-text" style="margin-right:22px">Coupon Discount : </span>
                                <span class="sp-value sum-discount">0.00 {!!setting('site.sign')!!}</span>
                            </p>
                            <div></div>

                            <br>
                            <p><br>
                                <span class="sp-orange sp-detail" data-lang="total-text" style="font-size: 16px!important;text-shadow: 5px 5px 5px #000;font-weight: bold">Total : </span>
                                <span class="sp-value sp-orange sum-total" style="font-size: 15px!important;border-top: 1px solid #E5E5E5;text-shadow: 5px 5px 5px #000">
                                        {{ $amt + $shp }} {!!setting('site.sign')!!}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div style="float: left; border-left: 1px solid #FFFFFF; padding-left: 10px;">
                    <div id="eleFrmCheckOut">
                        <div>
                            <div style="background-color: rgba(5,10,14,0.9);">
                                <p data-lang="str-customer-info" style="font-size: 16px!important;margin-bottom: 10px;margin-top: 5px;">Customer
                                    Information</p>
                                <form action="paypal/paypalpayment.php" method="post" id="FrmCheckout">
                                    @csrf
                                    <p><span class="sp-frm" data-lang="first-name">First Name*:</span><input type="text" name="fname" id="fname" data-validation="req" value=""></p>
                                    <p><span class="sp-frm" data-lang="last-name">Last Name*:</span><input type="text" name="lname" id="lname" data-validation="req" value=""></p>
                                    <p><span class="sp-frm" data-lang="address">Address*:</span><input type="text" name="address1" id="address1" data-validation="req" value=""></p>
                                    <p><span class="sp-frm">&nbsp;</span><input type="text" name="address2" id="address2" value=""></p>
                                    <p><span class="sp-frm" data-lang="city">city*:</span><input type="text" name="city" id="city" data-validation="req" value=""></p>
                                    <p class="state" style="display:none"><span class="sp-frm" data-lang="state">state(USA)*:</span><input type="text" name="state" id="state" data-validation="req"></p>
                                    <p><span class="sp-frm" data-lang="zip-code">Zip code*: </span><input type="text" name="post" id="post" data-validation="req" value=""></p>
                                    <p class="sel_country"><span class="sp-frm" data-lang="country">Country*:</span>
                                        <label class="arrowSlc">
                                            <select name="country" id="country" class="myslc" data-validation="select" style="width:228px;border:solid 1px #FFF;">
                                                <option>Choose country</option>
                                                <option value='Australia'>Australia</option>
                                                <option value='Austria'>Austria</option>
                                                <option value='Bahrain'>Bahrain</option>
                                                <option value='Bangladesh'>Bangladesh</option>
                                                <option value='Belarus'>Belarus</option>
                                                <option value='Belgium'>Belgium</option>
                                                <option value='Bhutan'>Bhutan</option>
                                                <option value='Brunei Darussalam'>Brunei Darussalam</option>
                                                <option value='Bulgaria'>Bulgaria</option>
                                                <option value='Cambodia'>Cambodia</option>
                                                <option value='Canada'>Canada</option>
                                                <option value='Croatia'>Croatia</option>
                                                <option value='Cyprus'>Cyprus</option>
                                                <option value='Czech Republic'>Czech Republic</option>
                                                <option value='Denmark'>Denmark</option>
                                                <option value='Estonia'>Estonia</option>
                                                <option value='Faroe Islands'>Faroe Islands</option>
                                                <option value='Finland'>Finland</option>
                                                <option value='France'>France</option>
                                                <option value='Germany'>Germany</option>
                                                <option value='Gibraltar'>Gibraltar</option>
                                                <option value='Greece'>Greece</option>
                                                <option value='Greenland'>Greenland</option>
                                                <option value='Guam'>Guam</option>
                                                <option value='Holland'>Holland</option>
                                                <option value='Holy See'>Holy See</option>
                                                <option value='Hong Kong'>Hong Kong</option>
                                                <option value='Hungary'>Hungary</option>
                                                <option value='Iceland'>Iceland</option>
                                                <option value='India'>India</option>
                                                <option value='Indonesia'>Indonesia</option>
                                                <option value='Ireland'>Ireland</option>
                                                <option value='Isle of Man'>Isle of Man</option>
                                                <option value='Italy'>Italy</option>
                                                <option value='Japan'>Japan</option>
                                                <option value='Kazakhstan'>Kazakhstan</option>
                                                <option value='Kyrgyzstan'>Kyrgyzstan</option>
                                                <option value='Latvia'>Latvia</option>
                                                <option value='Liechtenstein'>Liechtenstein</option>
                                                <option value='Lithuania'>Lithuania</option>
                                                <option value='Luxembourg'>Luxembourg</option>
                                                <option value='Malaysia'>Malaysia</option>
                                                <option value='Malta'>Malta</option>
                                                <option value='Mexico'>Mexico</option>
                                                <option value='Micronesia'>Micronesia</option>
                                                <option value='Monaco'>Monaco</option>
                                                <option value='Mongolia'>Mongolia</option>
                                                <option value='Mozambique'>Mozambique</option>
                                                <option value='Netherlands'>Netherlands</option>
                                                <option value='Netherlands Antilles'>Netherlands Antilles</option>
                                                <option value='New Zealand'>New Zealand</option>
                                                <option value='Norway'>Norway</option>
                                                <option value='Oman'>Oman</option>
                                                <option value='Pakistan'>Pakistan</option>
                                                <option value='Papua New Guinea'>Papua New Guinea</option>
                                                <option value='Poland'>Poland</option>
                                                <option value='Portugal'>Portugal</option>
                                                <option value='Puerto Rico'>Puerto Rico</option>
                                                <option value='Qatar'>Qatar</option>
                                                <option value='Romania'>Romania</option>
                                                <option value='Russian Federation' selected>Russian Federation</option>
                                                <option value='San Marino'>San Marino</option>
                                                <option value='Scotland'>Scotland</option>
                                                <option value='Serbia'>Serbia</option>
                                                <option value='Singapore'>Singapore</option>
                                                <option value='Slovakia'>Slovakia</option>
                                                <option value='Slovenia'>Slovenia</option>
                                                <option value='South Africa'>South Africa</option>
                                                <option value='Spain'>Spain</option>
                                                <option value='Sweden'>Sweden</option>
                                                <option value='Switzerland'>Switzerland</option>
                                                <option value='Taiwan'>Taiwan</option>
                                                <option value='Turkey'>Turkey</option>
                                                <option value='Ukraine'>Ukraine</option>
                                                <option value='United Kingdom'>United Kingdom</option>
                                                <option value='United States'>United States</option>
                                            </select>
                                        </label>
                                    </p>
                                    <p><span class="sp-frm" data-lang="telphone">Telphone*:</span><input type="text" name="phone" id="phone" data-validation="req" value=""></p>
                                    <p><span class="sp-frm" data-lang="email">Email*:</span><input type="text" name="email" id="email" data-validation="email" value=""></p>
                                    <p><span class="sp-frm" data-lang="password">Password*:</span><input type="password" name="password" id="pass" data-validation="req" value=""></p>
                                </form>
                            </div>
                            <br>
                            <p class="sp-orange" data-lang="str-payment-option">We offer you payment 2 Option :</p>
                            <div id="button">
                                <img id="buttonCheckPayPal" title="PayPal - The safer,easier way to pay online" src="{{asset('images/icon/butPayPal.png')}}" data-type="Paypal" data-merchant="7LD26HC3RDACS" style="margin-right: 10px;cursor: pointer">
                                <img id="buttonCheckout" title="Check out with Credit card" src="{{asset('images/icon/btnCheckout.png')}}" data-type="Credit Card Paypal" data-merchant="TPMZUQQXQ4YB8" style="cursor: pointer">
                            </div>
                            <br>
                            <div style="margin-left: 5px;">
                                <div style="float: left">
                                    <img src="{{asset('images/icon/option-checkout.png')}}" style="width: 99px;margin-top: 9px;cursor: pointer">
                                </div>
                                <div style="float: left;margin: 5px 8px;">
                                    <p style="font-size: 10px!important;margin: 0;padding: 0" data-lang="str-secure-payment-ssl">Secure payment through SSL</p>
                                    <p style="font-size: 10px!important;margin: 0;padding: 0" data-lang="str-connection-privacy">connection privacy guranteed</p>
                                </div>
                                <div id="termrs-condition" style="clear: left">
                                    <a href="#" title="Terms" data-lang="terms" onclick="terms();">Terms</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection