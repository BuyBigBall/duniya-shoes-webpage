<script type="text/javascript" src="{{ asset('js/default.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.plugin.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/itailor-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/iShose-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/iShose-min-2.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui-1.9.2.custom.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.form.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/base64.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.address.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/JS-DESIGN.js') }}"></script>

<script src="{{asset('js/deesignProduct.js')}}"></script>
<script src="{{asset('js/JS-DESIGNNER-3D.js')}}"></script>
<script>
    //listEle.objLang = < ? php echo $language;  ?>;
    function make_design_Image(itemArr) 
    {
        deesignProduct.config({
            itemArr: itemArr
        });
    };
    var ch = 'ec';
</script>

<div style="min-width: 100px;min-height: 100px">
    <span class="imgs1">
        <img src="data:image/png;base64,">
    </span>
</div>