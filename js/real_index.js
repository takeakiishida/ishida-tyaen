var $window=$(window);var $top=$("#js-topTxt");var $pageTop=$("#page-top");var scrollWeight;var aboutHeight;var topHeight;$(".l-header-hamburger").on("click",function(){$(".l-header-hamburger__nav").toggleClass("is-active");$(".l-header-hamburger__nav").toggleClass("is-heightChange");$(".l-header-hamburger__line").toggleClass("is-activeMenu");$(".l-header-hamburger__area").toggleClass("is-fixed")});$(".l-header-hamburger__nav a").on("click",function(){$(".l-header-hamburger__nav").toggleClass("is-active");$(".l-header-hamburger__nav").toggleClass("is-heightChange");$(".l-header-hamburger__line").toggleClass("is-activeMenu")});$(document).ready(function(){$("#page-top a").smoothScroll();$("#l-header a").smoothScroll();$("#p-footer a").smoothScroll()});$window.on("scroll",function(){if($window.scrollTop()>700){$pageTop.stop(true).fadeIn(400)}else{$pageTop.stop(true).fadeOut(400)}});function fadeAnime(){$(".blurTrigger").each(function(){var b=$(this).offset().top-50;var a=$(window).scrollTop();var c=$(window).height();if(a>=b-c){$(this).addClass("blur")}else{$(this).removeClass("blur")}});$(".smoothTrigger").each(function(){var b=$(this).offset().top-50;var a=$(window).scrollTop();var c=$(window).height();if(a>=b-c){$(this).addClass("smooth")}else{$(this).removeClass("smooth")}})}$(window).scroll(function(){fadeAnime()});$(window).on("load",function(){fadeAnime()});