<script>
    $(document).ready(function() {
        setLanguage();
        var T = CreateTagDesignIdeaDetail(PD.Select);
        $('#slideDesignDetailList').append(T)
        if (PD.Select > 0) {
            for (var i = PD.Select - 1; i >= 0; i--) {
                var Arr = PD.Arr;
                for (list in Arr) {
                    if (list == i) {
                        //                        if((PD.LeatherGUP == Arr[i]['GROUP']) && (Arr[i]['MODEL']==shoeObject.shoeType)){
                        if ((Arr[i]['MODEL'] == shoeObject.shoeType)) {
                            var T = CreateTagDesignIdeaDetail(i);
                            $('#slideDesignDetailList li:first').before(T);
                            index = $('#slideDesignDetailList #' + PD.Select).index();
                            $('#slideDesignDetailList').css({
                                'left': ((index - 2) * (-675))
                            });
                        }
                    }
                }
            }
        }
        //Event Click Button
        $('.btnSlideDesignDetail').click(function() {
            if ('btnSlideDesignBack' == $(this).attr('id')) {
                CreateTagAfter();
                var Left = parseInt($('#slideDesignDetailList').css('left').replace('px', ''));
                var Li = parseInt($('#slideDesignDetailList li').length);
                if (((Li * 675) * -1) < Left + (-675)) {
                    $('#slideDesignDetailList').animate({
                        'left': (Left + (-675))
                    });
                }
            } else {
                //CreateTagBefore();
                var Left = parseInt($('#slideDesignDetailList').css('left').replace('px', ''));
                if (Left < 0) {
                    $('#slideDesignDetailList').animate({
                        'left': (Left + (675))
                    });
                }
            }
        })
        setLanguage();
    })

    function CreateTagBefore() {
        if (PD.Select > 0) {
            for (var i = 0; i < 5; i++) {
                var LiFirst = parseInt($('#slideDesignDetailList li:first').attr('id')) - 1;
                if (LiFirst >= 0) {
                    if ((PD.LeatherGUP == Arr[list]['GROUP']) && (Arr[list]['MODEL'] == shoeObject.shoeType)) {
                        var T = CreateTagDesignIdeaDetail(LiFirst);
                        $('#slideDesignDetailList li:first').before(T);
                    }
                }
            }
        }
    }

    function CreateTagAfter() {
        var LiFirst = parseInt($('#slideDesignDetailList li:last').attr('id'));
        var j = 0;
        for (var i = LiFirst; i <= PD.ArrLength; i++) {
            if ($('#slideDesignDetailList #' + i).length <= 0) {
                var Arr = PD.Arr;
                for (list in Arr) {
                    if (list == i) {
                        //if((PD.LeatherGUP == Arr[i]['GROUP']) && (Arr[i]['MODEL']==shoeObject.shoeType)){
                        if ((Arr[i]['MODEL'] == shoeObject.shoeType)) {
                            if (j++ < 5) {
                                var T = CreateTagDesignIdeaDetail(i);
                                $('#slideDesignDetailList li:last').after(T)
                                setLanguage();
                            }
                        }
                    }
                }
            }
        }
    }

    function CreateTagDesignIdeaDetail(ID) {
        var IMG = PD.SrcM + PD.Arr[ID]['IMG'];
        var T = '';
        T += '<li id="' + ID + '">';
        T += '<div class="SlideImgMain">';
        T += '<img src="' + IMG + '">';
        T += '</div>';
        T += '<div style="position: absolute;bottom:  85px;right: 5%">';
        T += '<div class="ShoeDetails" style="text-align: center;color: #f5f5ce!important;font-size: 20px!important;width: 600px">';
        T += PD.Arr[ID]['MODEL'] + " Shoes : " + PD.Arr[ID]['SHAPE'] + " Shape : 100% Leather : Leather Sale";
        T += '</div>';
        T += '</div>';
        T += '<div data-lang="choose-design" class="brnChooseDesign" id="' + ID + '">';
        T += 'Choose This Design';
        T += '</div>';
        T += '</li>';
        return T;
    }
</script>
<style>
    #divDesignDetail {
        background: url('images/bg/bg-DeailgnIdeaDetail.jpg') no-repeat top;
        width: 679px;
        height: 582px;
        margin: auto;
        padding: 10px;
    }

    #divDesignDetail .btnSlideDesignDetail {
        position: absolute;
        top: 35%;
        cursor: pointer;
        width: 22px;
        height: 57px;
    }

    #divDesignDetail #btnSlideDesignBack {
        right: 5px;
        background-position: -907px -65px
    }

    #divDesignDetail #btnSlideDesignNext {
        left: 5px;
        background-position: -885px -65px
    }

    #divDesignDetail .SlideImgMain {
        position: absolute;
        right: 87px;
        top: -27px;
    }

    #divDesignDetail .ShoeDeatil {
        text-align: center;
        color: #f5f5ce !important;
        font-size: 20px !important;
        width: 600px
    }

    #divDesignDetail .brnChooseDesign {
        width: 200px;
        height: 20px;
        margin: auto;
        padding: 15px;
        position: absolute;
        bottom: 0px;
        left: 30%;
        cursor: pointer;
        text-align: center;
        color: #FFFFFF;
        font-size: 18px;
        text-indent: 0
    }

    #slideDesignDetailList {
        position: absolute;
        list-style: none;
        overflow: auto;
        width: 50000px
    }

    #slideDesignDetailList li {
        float: left;
        width: 675px;
        height: 485px;
        position: relative;
    }
</style>

<div id="divDesignDetail">
    <i class="btnClose closes" style="right: 10px;">btn close</i>
    <div style="text-align: center;font-weight: bold;font-size: 40px;color: #fffeda;margin: 20px;">
        Design idea!
    </div>
    <div style="position: relative;overflow: hidden;width: 679px;height: 582px;">
        <!-- main -->
        <ul id="slideDesignDetailList">
            <!-- Slide main-->

        </ul>
        <i class="btnSlideDesignDetail" id="btnSlideDesignNext">button Next</i>
        <i class="btnSlideDesignDetail" id="btnSlideDesignBack">button back</i>
    </div>
</div>