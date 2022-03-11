<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Shoes Care</title>
        <meta name="author" content="iTailor">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="theme-color" content="#ffffff"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <link rel="stylesheet" href="{{asset('/css/min/reset.css')}}">
        <link rel="stylesheet" href="{{asset('/css/min/shoescare.css')}}">
    </head>
    <body>
        <div id="shoescare">
            <header>
                <h2>iTailor</h2>
                <p>Handcrafted Patina Shoes</p>
            </header>
            <article>
                <h1>CUSTOM SHOES CARE</h1>
                <p>1) Use high quality cream and wax regularly on your custom shoes.</p>
                <p>2) To wear the shoes, use a shoe horn to hold the shape and care better for your patina shoes.</p>
                <p>3) To keep your patina shoes in the best condition, we highly recommend the use of shoe trees after wear.</p>
                <img src="{{ asset('images/shoescare.jpg') }}">
            </article>
            <a href="/patina/shoescare">Shop Shoes Care</a>
        </div>
        <section>
            <noscript id="webfonts">
            <link rel="stylesheet" type="text/css" href="{{asset('font/webfonts.css')}}"/>
            </noscript>
            <script>
                var loadDeferredStyles = function () {
                    var addStylesNode = document.getElementById("webfonts");
                    var replacement = document.createElement("div");

                    replacement.innerHTML = addStylesNode.textContent;

                    addStylesNode.parentElement.appendChild(replacement);
                    addStylesNode.parentElement.removeChild(addStylesNode.nextElementSibling);
                    addStylesNode.parentElement.removeChild(addStylesNode);
                };

                var raf = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;

                if (raf) {
                    raf(function () {
                        window.setTimeout(loadDeferredStyles, 0);
                    });
                } else {
                    window.addEventListener("load", loadDeferredStyles);
                }
            </script>
        </section>
    </body>
</html>
