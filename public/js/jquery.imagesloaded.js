/*!
 * jQuery imagesLoaded plugin v2.1.1
 * http://github.com/desandro/imagesloaded
 *
 * MIT License. by Paul Irish et al.
 */

/*jshint curly: true, eqeqeq: true, noempty: true, strict: true, undef: true, browser: true */
/*global jQuery: false */
;(function($,f){'use strict';var g='data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==';$.fn.imagesLoaded=function(d){var e=this,deferred=$.isFunction($.Deferred)?$.Deferred():0,hasNotify=$.isFunction(deferred.notify),$images=e.find('img').add(e.filter('img')),loaded=[],proper=[],broken=[];if($.isPlainObject(d)){$.each(d,function(a,b){if(a==='callback'){d=b}else if(deferred){deferred[a](b)}})}function doneLoading(){var a=$(proper),$broken=$(broken);if(deferred){if(broken.length){deferred.reject($images,a,$broken)}else{deferred.resolve($images)}}if($.isFunction(d)){d.call(e,$images,a,$broken)}}function imgLoadedHandler(a){imgLoaded(a.target,a.type==='error')}function imgLoaded(a,b){if(a.src===g||$.inArray(a,loaded)!==-1){return}loaded.push(a);if(b){broken.push(a)}else{proper.push(a)}$.data(a,'imagesLoaded',{isBroken:b,src:a.src});if(hasNotify){deferred.notifyWith($(a),[b,$images,$(proper),$(broken)])}if($images.length===loaded.length){setTimeout(doneLoading);$images.unbind('.imagesLoaded',imgLoadedHandler)}}if(!$images.length){doneLoading()}else{$images.bind('load.imagesLoaded error.imagesLoaded',imgLoadedHandler).each(function(i,a){var b=a.src;var c=$.data(a,'imagesLoaded');if(c&&c.src===b){imgLoaded(a,c.isBroken);return}if(a.complete&&a.naturalWidth!==f){imgLoaded(a,a.naturalWidth===0||a.naturalHeight===0);return}if(a.readyState||a.complete){a.src=g;a.src=b}})}return deferred?deferred.promise(e):e}})(jQuery);