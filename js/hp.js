var $ = jQuery;

$(document).ready( function (){


	// badges slider
	$('.slider-first').slick({
		dots: true,
		arrows: false,
		autoplay: true,
		infinite: true,
		autoplaySpeed: 9000,
		cssEase: 'linear'
	});

	$('.slider-second').slick({
		dots: false,
		arrows: true,
		autoplay: true,
		infinite: true,
		autoplaySpeed: 7000,
		cssEase: 'linear',
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
			  breakpoint: 768,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				infinite: true,
				dots: true,
				arrows: false
			  }
			},
		]
	});

	
	if ($(window).width() < 767) {
		$('.personal-injury-slider').slick({
			dots: true,
			arrows: false,
			autoplay: true,
			infinite: true,
			autoplaySpeed: 7000,
			cssEase: 'linear'
		});

		$('.claim-content-slider').slick({
			dots: true,
			arrows: false,
			autoplay: true,
			infinite: true,
			autoplaySpeed: 7000,
			cssEase: 'linear'
		});

		$('.client-logo-slider').slick({
			dots: true,
			arrows: false,
			autoplay: true,
			infinite: true,
			autoplaySpeed: 7000,
			cssEase: 'linear',
			slidesToShow: 1,
            slidesToScroll: 1
		});
		
	}

});

