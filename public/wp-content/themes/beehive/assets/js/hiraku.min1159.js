!function(a){"use strict";"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?module.exports=a(require("jquery")):a(jQuery)}(function(a){var s,i={direction:"right",breakpoint:-1},t=0,n={x:window.scrollX,y:window.scrollY},e="a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, *[tabindex], *[contenteditable]",o=0,r=function(){a(window).width()!==o&&(o=a(window).width(),a(".js-hiraku-offcanvas").each(function(){var s=a(this),i=a(this).data("breakpoint");s.hasClass("js-hiraku-offcanvas-open")&&(-1===i||i>=window.innerWidth)||(-1===i||i>=window.innerWidth?s.addClass("js-hiraku-offcanvas-active").attr("aria-hidden",!0):s.removeClass("js-hiraku-offcanvas-active").attr("aria-hidden",!1).trigger("click"))}))};a.fn.extend({hiraku:function(s){s=a.extend({},i,s);var n="js-hiraku-offcanvas-"+t,e=a(this),o=a(s.btn),f=a(s.fixedHeader);e.addClass("js-hiraku-offcanvas-sidebar").data("scroll",scroll),0===e.parent(".js-hiraku-offcanvas").length&&e.wrap('<div class="js-hiraku-offcanvas"/>'),e.attr("role","navigation");var d=e.parent(".js-hiraku-offcanvas");d.data("opt",s),d.attr("aria-hidden","true").attr("aria-labelledby","hiraku-offcanvas-btn-"+t).attr("id",n).data("breakpoint",s.breakpoint).attr("aria-label","close"),a("body").addClass("js-hiraku-offcanvas-body"),"right"==s.direction?e.addClass("js-hiraku-offcanvas-sidebar-right"):e.addClass("js-hiraku-offcanvas-sidebar-left"),s.btn&&o.addClass("js-hiraku-offcanvas-btn").attr("data-toggle-offcanvas","#"+n).attr("aria-expanded",!1).attr("aria-label","Menu").attr("aria-controls",n).attr("id","hiraku-offcanvas-btn-"+t),s.fixedHeader&&f.addClass("js-hiraku-header-fixed"),t++,r()}}),a(document).on("click",".js-hiraku-offcanvas-btn",function(s){var i=a(a(this).data("toggle-offcanvas"));a('<button type="button">Close Offcanvas-Menu Button</button>').attr("aria-label","Close").addClass("js-hiraku-offcanvas-close-btn").appendTo(i);var t=a(this),o=a("body").css({height:a(window).height()}),r=i.find(".js-hiraku-offcanvas-sidebar"),f=i.find(e).first(),d=i.find(e).last();f.off("keydown.hiraku-offcanvas").on("keydown.hiraku-offcanvas",function(a){9===a.which&&a.shiftKey&&(a.preventDefault(),d.focus())}),d.off("keydown.hiraku-offcanvas").on("keydown.hiraku-offcanvas",function(a){9!==a.which||a.shiftKey||(a.preventDefault(),f.focus())}),d.off("click.hiraku-offcanvas").on("click.hiraku-offcanvas",function(){i.click()}),t.addClass("js-hiraku-offcanvas-btn-active").attr("aria-expanded",!0),n.x=window.scrollX,n.y=window.scrollY,i.attr("aria-hidden",!1).addClass("js-hiraku-offcanvas-open"),setTimeout(function(){a("html").css("marginTop",-1*window.scrollY),r.hasClass("js-hiraku-offcanvas-sidebar-right")?o.addClass("js-hiraku-offcanvas-body-right"):o.addClass("js-hiraku-offcanvas-body-left"),r.addClass("active"),f.focus()},1),s.preventDefault()}),a(document).on("click touchstart keyup",".js-hiraku-offcanvas",function(s){if(("keyup"!==s.type||27===s.keyCode)&&("keyup"===s.type&&(s.target=document.querySelector(".js-hiraku-offcanvas")),a(s.target).hasClass("js-hiraku-offcanvas"))){var i=a(this).data("opt");a(".js-hiraku-offcanvas-body").addClass("js-hiraku-offcanvas-body-moving").removeClass("js-hiraku-offcanvas-body-right").removeClass("js-hiraku-offcanvas-body-left"),a(".js-hiraku-offcanvas-sidebar").removeClass("active"),a("body").css({width:"",height:""}),setTimeout(function(){a(s.target).removeClass("js-hiraku-offcanvas-open").attr("aria-hidden",!0),a(".js-hiraku-offcanvas-body").removeClass("js-hiraku-offcanvas-body-moving"),a("html").css("marginTop",""),window.scrollTo(n.x,n.y),a(".js-hiraku-offcanvas-btn-active").removeClass("js-hiraku-offcanvas-btn-active").attr("aria-expanded",!1).focus(),a(s.target).find(".js-hiraku-offcanvas-close-btn").remove(),i&&i.onClose&&i.onClose()},300)}}),a(window).on("resize",function(){"requestAnimationFrame"in window?(cancelAnimationFrame(s),s=requestAnimationFrame(r)):r()})});
