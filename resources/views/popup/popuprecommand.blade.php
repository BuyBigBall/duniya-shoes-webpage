<style>
    #divRecommend {
        display: none;
        background: rgba(0, 0, 0, 0.7);
        margin: auto;
        padding: 10px;
        width: 800px;
        overflow: hidden;
        height: 495px;
        font-size: 14px;
        border-radius: 10px;
    }

    #divRecommend * {
        color: #FFFFFF
    }

    #divRecommend ul {
        list-style: none;
        margin: -10px 5px 5px 42px;
        overflow: auto;
    }

    #divRecommend ul li {
        overflow: hidden;
        float: left;
        width: 160px;
        height: 150px;
        margin: 10px;
        position: relative
    }

    #divRecommend li canvas {
        max-width: 150px;
        position: absolute;
        cursor: pointer;
        transform: scale(0.90);
    }

    #divRecommend li canvas:hover {
        transform: scale(1);
        transition: all 0.3s ease-in-out 0s;
    }

    #divRecommend li .chkItem {
        position: absolute
    }

    #divRecommend .sp-orange {
        color: #b49a66
    }

    #divRecommend .sp-frm {
        width: 150px;
        float: left;
    }

    #divRecommend p {
        margin-bottom: 10px;
    }

    #divRecommend input {
        padding: 5px;
        width: 61%;
        color: #000000
    }

    #divRecommend .sbOptions {
        width: 100%;
    }

    #divRecommend .sbOptions li {
        margin: 0;
    }

    #divRecommend .sbOptions a:hover {
        color: #EBB52D;
    }

    #divRecommend .sel_country .sbHolder {
        width: 61%;
        padding: 0 5px;
    }

    #btnExit {
        position: absolute;
        bottom: 20px;
        right: 20px;
        color: #fffcc8;
        cursor: pointer;
        font-weight: bold;
        font-size: 20px;
    }

    #btnExit:hover {
        text-shadow: 0px 0px 15px #FFFFFF
    }
</style>
<script>
    //*Befor Run function Rec*//
    var objRec = {
        front: null,
        frontName: null,
        side: null,
        sideName: null
    }
    objRec.front = shoeObject.getFront
    objRec.frontName = shoeObject.getFrontName
    objRec.side = shoeObject.getSide
    objRec.sideName = shoeObject.getSideName

    /*var brForm File iShoe-min*/
    var type = null;
    var id = null;
    var title = null;

    type = Rce.type;
    id = Rce.id;
    title = Rce.title;
    /*Create tag (ul) Box*/
    var t = "<ul id='Rec" + type + "'>"
    $('#divRecommend div').append(t);

    /*loop create tag (li)*/
    for (i in id) {
        shoeObject.img = null
        if (type == 'front') {
            shoeObject.getFront = id[i]
            shoeObject.getFrontName = title[i]
        } else {
            shoeObject.getSide = id[i]
            shoeObject.getSideName = title[i]
        }
        var _token = $('#page_token').val();
        var t = null
        t = $("<li></li>");
        t.load('lib/canvasImg', {
            code: shoeObject,
            w: 160,
            h: 160,
            i: id[i],
            t: title[i],
            "_token": _token,
        }, function() {
            RecChk();
        })
        $('#Rec' + type).append(t)
        shoeObject.getFront = objRec.front
        shoeObject.getFrontName = objRec.getFrontName
        shoeObject.getSide = objRec.side
        shoeObject.getSideName = objRec.sideName

    }

    function RecChk() {
        /*Function Check Item Rec*/
        $('#Rec' + Rce.type + ' .chkItem').remove();
        var chkImg = $('<img>').addClass('chkItem').attr('src', 'images/CheckMarkBlue.png');
        var chk = (Rce.type == 'front') ? shoeObject.getFront : shoeObject.getSide;
        $('#Rec' + Rce.type).find('#Rec' + chk).parent('li').append(chkImg);
    }

    function RecClickStyle(i, t) {
        if (Rce.type == 'front') {
            shoeObject.getFront = i;
            shoeObject.getFrontName = t;
            $('.selectSty ul #' + shoeObject.getFront).trigger('click');
        } else {
            shoeObject.getSide = i;
            shoeObject.getSideName = t;
            $('.selectSty ul #' + shoeObject.getSide).trigger('click');
        }
        RecChk();
    }
</script>
<div id="divRecommend">
    <p style="text-align: center;color: #FFFCC8;font-size: 20px;">
        All Style
    </p>
    <div>
    </div>
    <i class="btnClose closes">btn close</i>
</div>