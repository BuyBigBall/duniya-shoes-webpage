@extends('layouts.app')
@section('content')


<body>
    <link rel="stylesheet" href="{{asset('css/checkout.css')}}" />
    <script src="{{asset('js/checkout.js')}}"></script>
    <script src="{{asset('js/deesignProduct.js')}}"></script>
    <script src="{{asset('js/JS-DESIGNNER-3D.js')}}"></script>
    <script>
        // listEle.objLang = <?php echo $language ?? '';  ?>;
        // $(document).ready(function() {
        //     var itemArr = <?php echo $goods ?? ''; ?>;
        //     deesignProduct.config({
        //         itemArr: itemArr
        //     });
        // });
        // setLanguage();

        // var ch = 'ec';
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
        This is Paypal Content Page.
    </div>

    @endsection