$(document).ready(function() {
    getCanvas('gauge');
    $(window).resize(function() {
        $('#gauge').css({top: $(window).height() / 2 * 0.8, left: $(window).width() / 2 - (W / 2)});
        $('.preloadText').css({top: ($(window).height() / 2 * 0.8) + W / 2, left: ($(window).width() / 2 - (W / 2)) + W / 5.5, display: "block"})
    })
});
var arcIncrement = {percent: 0, startCanvas: 0};
function getCanvas(e) {
    var f = document.getElementById(e);
    var g = f.getContext('2d');
    var W = f.width;
    var H = f.height;
    drawCanvasBase(g, W, H);
    $('#' + e).css({top: $(window).height() / 2 * 0.8, left: $(window).width() / 2 - (W / 2)});
    $('.preloadText').css({top: ($(window).height() / 2 * 0.8) + W / 2, left: ($(window).width() / 2 - (W / 2)) + W / 5.5, display: "block"});
    var h = $('#content');
    dfd = h.imagesLoaded({progress: function(a, b, c, d) {
            $Lenght = parseInt(b.length) - 6;
            arcIncrement.percent = Math.round(((c.length + d.length) * 100) / $Lenght);
            if (arcIncrement.percent <= 100) {
                arcIncrement.startCanvas = Math.round(((c.length + d.length) * 100) / $Lenght) * (2 * Math.PI / 100);
                initCanvasStaff(g, "rgba(255,255,255,0.5)", "#FFF", W, H);
                if (arcIncrement.percent >= 100) {
                    $('#preloadImg').fadeOut(400, function() {
                        h.fadeIn(200)
                    })
                }
            }
        }, always: function() {
            $('#preloadImg').fadeOut(300, function() {
                h.fadeIn(200, function() {
                    arcIncrement.percent = 0;
                    arcIncrement.startCanvas = 0;
                    EventSlideDesignIdea()
                })
            })
        }})
}
function EventSlideDesignIdea() {
    CreateTagList(function() {
        $('#DesignSlide').animate({'marginRight': 185}, 300, function() {
            $('#DesignSlide').animate({'marginRight': 0}, 800)
        })
    })
}
function drawCanvasBase(a, W, H) {
    a.clearRect(0, 0, W, H);
    a.beginPath();
    a.strokeStyle = "transparent";
    a.lineWidth = 4;
    a.arc(W / 2, H / 2, 30, 0, Math.PI * 2, false);
    a.stroke()
}
function initCanvasStaff(a, b, c, d, e) {
    arcIncrement.startCanvas = arcIncrement.startCanvas + (Math.PI / 180);
    drawCanvasStaff(a, arcIncrement.startCanvas, b, c, d, e);
    var f = drawCanvasStaff(a, arcIncrement.startCanvas, b, c, d, e)
}
function drawCanvasStaff(a, b, c, d, W, H) {
    a.clearRect(0, 0, W, H);
    a.beginPath();
    a.strokeStyle = c;
    a.lineWidth = 4;
    a.arc(W / 2, H / 2, 30, 0 - 90 * Math.PI / 180, b - 90 * Math.PI / 180, false);
    a.stroke();
    a.fillStyle = d;
    a.font = "14px Century Gothic";
    var e = Math.floor((b / (2 * Math.PI)) * 100);
    if (e > 100)
        e = 100;
    var f = e + "%";
    var g = a.measureText(f).width;
    a.fillText(f, W / 2 - g / 2, H / 2 + 5);
    return b
}