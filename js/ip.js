var $ = jQuery;

$(document).ready( function (){
	// Inner page atf slider
	$('.quote-slider').slick({
		dots: false,
		arrows: false,
		autoplay: true,
		infinite: true,
		fade: true,
		autoplaySpeed: 9000,
		cssEase: 'linear'
	});


	$('.about-award-silder').slick({
	  dots: true,
	  autoplay: true,
	  infinite: true,
	  speed: 300,
	  autoplaySpeed: 9000,
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2,
	        infinite: true,
	        dots: true
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	  ]
	});

	$('.bio-logo-slider').slick({
		dots: false,
		arrows: false,
		autoplay: true,
		infinite: true,
		speed: 300,
		autoplaySpeed: 9000,
		slidesToShow: 1,
		slidesToScroll: 1,
	});


	$('.sidebar li.menu-item-has-children > a').click(function(b){
		b.preventDefault();
		$(this).parent().toggleClass('open');
	});

});

