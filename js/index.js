var $window = $(window);
var $pageTop = $('#page-top');

// ハンバーガーメニュー
$('.l-header-hamburger').on('click',function(){
    $('.l-header-hamburger__nav').toggleClass('is-active');
    $('.l-header-hamburger__nav').toggleClass('is-heightChange');
    $('.l-header-hamburger__line').toggleClass('is-activeMenu');
    $('.l-header-hamburger__area').toggleClass('is-fixed');
});
$('.l-header-hamburger__nav a').on('click',function(){
    $('.l-header-hamburger__nav').toggleClass('is-active');
    $('.l-header-hamburger__nav').toggleClass('is-heightChange');
    $('.l-header-hamburger__line').toggleClass('is-activeMenu');
});

// スムーススクロール
$(document).ready(function() {
    $('#page-top a').smoothScroll();
    $('#l-header a').smoothScroll();
    $('#p-footer a').smoothScroll();
});

// ページの先頭へ
$window.on('scroll',function() {
    if($window.scrollTop() > 700) {
        $pageTop.stop(true).fadeIn(400);
    }
    else {
        $pageTop.stop(true).fadeOut(400);
    }
});

// アニメーション
function fadeAnime(){
    $('.blurTrigger').each(function(){ 
		var elemPos = $(this).offset().top-50;
		var scroll = $window.scrollTop();
		var windowHeight = $window.height();
		if (scroll >= elemPos - windowHeight){
		    $(this).addClass('blur');
		}
	});	
    $('.smoothTrigger').each(function(){
		var elemPos = $(this).offset().top-50;
		var scroll = $window.scrollTop();
		var windowHeight = $window.height();
		if (scroll >= elemPos - windowHeight){
		    $(this).addClass('smooth');
		}
	});	
}

$(window).scroll(function (){
    fadeAnime();
});

$(window).on('load', function(){
    fadeAnime();
});