$(document).ready(function() {
    getCanvas('gauge');
});
var arcIncrement = {
    percent: 0,
    startCanvas: 0
}

function getCanvas(ele) {
    var canvasGauge = document.getElementById(ele);
    var gauge = canvasGauge.getContext('2d');
    var W = canvasGauge.width;
    var H = canvasGauge.height;
    drawCanvasBase(gauge, W, H);
    $('#' + ele).css({
        //top:$(window).height()/2 - (H/3),
        top: $(window).height() / 2 * 0.8,
        left: $(window).width() / 2 - (W / 2)
    });


//    var $holder = $('#content');
    var $holder = $('#content');
    dfd = $holder.imagesLoaded({
        progress: function(isBroken, $images, $proper, $broken) {
            arcIncrement.percent = Math.round((($proper.length + $broken.length) * 100) / $images.length);
            if (arcIncrement.percent <= 100) {
                arcIncrement.startCanvas = Math.round((($proper.length + $broken.length) * 100) / $images.length) * (2 * Math.PI / 100);
                initCanvasStaff(gauge, "rgba(255,255,255,0.5)", "#FFF", W, H);

                if (arcIncrement.percent > 80) {
                    $('#preloadImg').fadeOut(400, function() {
                        $holder.fadeIn(200);
                    });
                }
            }
        },
        always: function() {
            $('#preloadImg').fadeOut(300, function() {
                $holder.fadeIn(200, function() {
                    arcIncrement.percent = 0;
                    arcIncrement.startCanvas = 0;
                    //EventSlideDesignIdea();
                });
            });
        }
    });
}

function EventSlideDesignIdea() {
    /*Funtion Set Slide Load*/
    CreateTagList(function() {
        $('#DesignSlide').animate({
            'marginRight': 185
        }, 300, function() {
            $('#DesignSlide').animate({
                'marginRight': 0
            }, 800)
        });
    })
}

//FUNCTIONS AND OTHER STUFS
// init canvas staff
function drawCanvasBase(gauge, W, H) {
    gauge.clearRect(0, 0, W, H);

    gauge.beginPath();
    gauge.strokeStyle = "transparent";
    gauge.lineWidth = 4;
    gauge.arc(W / 2, H / 2, 30, 0, Math.PI * 2, false);
    gauge.stroke();
}
function initCanvasStaff(gauge, color_gauge, color_font, width, height) {
    //    var drawingStaff1 = setInterval(function(){
    arcIncrement.startCanvas = arcIncrement.startCanvas + (Math.PI / 180);
    drawCanvasStaff(gauge, arcIncrement.startCanvas, color_gauge, color_font, width, height);
    var end1 = drawCanvasStaff(gauge, arcIncrement.startCanvas, color_gauge, color_font, width, height);
//        if(end1 >= (1.5 * Math.PI)){
//            clearInterval(drawingStaff1);
//        }
//    },90);

}
function drawCanvasStaff(gauge, arcEndStaff, color_gauge, color_font, W, H) {
    gauge.clearRect(0, 0, W, H);

    //    gauge.beginPath();
    //    gauge.strokeStyle = "transparent";
    //    gauge.lineWidth = 4;
    //    gauge.arc(W/2, H/2, 30, 0, Math.PI*2, false);
    //    gauge.stroke();

    //CHANGE RADIUS TO COORDONATE WITH GROWCIRCLE (PROGRESS CIRCLE)
    gauge.beginPath();
    gauge.strokeStyle = color_gauge;
    gauge.lineWidth = 4;
    gauge.arc(W / 2, H / 2, 30, 0 - 90 * Math.PI / 180, arcEndStaff - 90 * Math.PI / 180, false);
    gauge.stroke();

    gauge.fillStyle = color_font;
    gauge.font = "14px Century Gothic";
    //var val = arcIncrement.percent;

    var val = Math.floor((arcEndStaff / (2 * Math.PI)) * 100);
    if (val > 100)
        val = 100;
    var text = val + "%";
    var text_width = gauge.measureText(text).width;
    gauge.fillText(text, W / 2 - text_width / 2, H / 2 + 5);

    return arcEndStaff;
}
