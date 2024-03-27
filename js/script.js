AOS.init({
   disable: 'mobile' 
});

$("body,html").animate({
  scrollTop: 1
  }, 0);
var $ = jQuery;

$(document).ready( function (){


  // need to remove this class so work fine after page load
  $("body").removeClass('before-load');


  // header fixed on scroll
  var headerHeight = $(".header").outerHeight();
  $(window).scroll(function() {    
    var scroll = $(window).scrollTop();
      if (scroll >= headerHeight) {
          $(".header").addClass("header-fixed");
      }
      else{
        $(".header").removeClass("header-fixed");
      }
  });

  var atfHeight = $(".atf-section").outerHeight();
  $(window).scroll(function() {
      if ($(this).scrollTop() > atfHeight) {
          $("#draggable, .atf-fix-buttons").fadeIn();
      }
      else{
          $("#draggable, .atf-fix-buttons").fadeOut();
      }
  });

  //  navigation start from 992px
  $(".nav-icon").click(function (){
    if( $(this).hasClass('change-navicon')){
      $(this).removeClass('change-navicon');
      $(".nav-wrap").removeClass('toggle-nav');
       $(".header").removeClass('header-sticked');
      $('body').removeClass('nav-open');
    }
    else{
      $(this).addClass('change-navicon');
      $(".nav-wrap").addClass('toggle-nav');
      $(".header").addClass('header-sticked');
      $('body').addClass('nav-open');
    }
  });
  if($(window).width() < 1000){
    $(".menu >  .menu-item-has-children").click(function (){
      if( $(this).hasClass('show-submenu')){
        $(this).removeClass('show-submenu');
      }
      else{
        $(".menu > .menu-item-has-children").removeClass('show-submenu');
        $(this).addClass('show-submenu');
      }
    });

    $(".menu .menu-item-has-children .menu-item-has-children").click(function (){
      if( $(this).hasClass('menu-exp')){
        $(this).removeClass('menu-exp');
      }
      else{
        $(this).addClass('menu-exp');
      }
      return false;
    });
  }

  $(".nav a").click(function (){
    window.location.href = $(this).attr('href');
    return false;
  });
  // navigaiton end 


  // popup show and hide
  $(".popup-link").click(function (){
    $(".popup-section, .popup-overlay").fadeIn();
    return false;
  });
  $(".popup-close").click(function (){
    $(".popup-section, .popup-overlay").fadeOut();
    return false;
  });

});



// detect iphone or android start
var classNames = [];
if (navigator.userAgent.match(/(iPad|iPhone|iPod)/i)) classNames.push('device-ios');
if (navigator.userAgent.match(/android/i)) classNames.push('device-android');

var html = document.getElementsByTagName('html')[0];

if (classNames.length) classNames.push('on-device');
if (html.classList) html.classList.add.apply(html.classList, classNames);
// detect iphone or android end

//  only for iphone x start
(function(){

  // Really basic check for the ios platform
  // https://stackoverflow.com/questions/9038625/detect-if-device-is-ios
  var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;

  // Get the device pixel ratio
  var ratio = window.devicePixelRatio || 1;

  // Define the users device screen dimensions
  var screen = {
    width : window.screen.width * ratio,
    height : window.screen.height * ratio
  };

  // iPhone X Detection
  if (iOS && screen.width == 1125 && screen.height === 2436) {
    $('html').addClass('iphoneX');
  }
})();
//  only for iphone x end



// Live Chat Script Start
jQuery( window ).bind('load', function(){   
    
  function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        //d.setTime(d.getTime() + (exdays  24  60  60  1000));
    d.setTime(d.getTime()+(exdays*24*60*60*1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    if(getCookie("popState")!='cookieset'){
        setTimeout(function(){
            jQuery('.live-chat-popup').addClass('show');
        }, 8000);
        setCookie("popState", "cookieset", 1);
    }
    jQuery('.live-chat-nobutton').click(function(e){
        e.preventDefault();
        jQuery('.live-chat-popup').removeClass('show');
    });
    jQuery('.livechat-close, .live-chat-no, .btn-yes').click(function(e){
      e.preventDefault();
        jQuery('.live-chat-popup').removeClass('show');
    });

});
// Live Chat Script End