$(document).ready(function(e) {
            $('.theme-customizer-icon').click(function(e) {
                $('#theme-customizer').toggleClass('slide-out');
            });
			
			var logo1 = $('#logo-1');
			var logo2 = $('#logo-2');
			var body_el = $('body');
			var all_el = $('#all');
			var bread_img = $('#bread-image');
			var devices_img = $('#devices-img');
			var slider_testimonial = $('#testimonials-slider');
			var slider_post_images = $('#post-images-slider-1');
			var post_slider = $('#post-slider-1');
			$('.theme-syle').click(function(e) {
				e.preventDefault();
				if($('#dark-stylesheet').length > 0) {
					$('#dark-stylesheet')[0].disabled=true;
					$('#dark-stylesheet').remove();
				}
                body_el.removeClass();
				all_el.removeClass();
				$('#devices-section.section-black-cover').removeClass('section-black-cover').addClass('section-color-cover');
				$('.section-black-cover').removeClass('section-black-cover').addClass('section-white-cover');
				bread_img.attr('src', 'images/bread.png');
				devices_img.attr('src', 'images/devices.png');
				logo1.attr('src', 'images/logo.png');
				logo2.attr('src', 'images/logo_secondary.png');
				
				switch($(this).attr('id')) {
					case 'theme-pattern':
						body_el.addClass('bg-pattern');
						break;
					case 'theme-boxed':
						body_el.addClass('bg-pattern2');
						all_el.addClass('boxed');
						break;
					case 'theme-dark':
						$('head').append('<link id="dark-stylesheet" rel="stylesheet" type="text/css" href="styles/dark-skin.css">');
						$('.section-white-cover').removeClass('section-white-cover').addClass('section-black-cover');
						bread_img.attr('src', 'images/bread_dark_skin.png');
						devices_img.attr('src', 'images/devices_dark_skin.png');
						$('#devices-section').removeClass('section-color-cover').addClass('section-black-cover');
						logo1.attr('src', 'images/logo_dark_skin.png');
						logo2.attr('src', 'images/logo_secondary_dark_skin.png');
						break;
					case 'theme-dark-pattern':
						$('head').append('<link id="dark-stylesheet" rel="stylesheet" type="text/css" href="styles/dark-skin.css">');
						$('.section-white-cover').removeClass('section-white-cover').addClass('section-black-cover');
						bread_img.attr('src', 'images/bread_dark_skin.png');
						devices_img.attr('src', 'images/devices_dark_skin.png');
						$('#devices-section').removeClass('section-color-cover').addClass('section-black-cover');
						logo1.attr('src', 'images/logo_dark_skin.png');
						logo2.attr('src', 'images/logo_secondary_dark_skin.png');
						body_el.addClass('bg-pattern3');
						break;
				}
				
				var owl = slider_testimonial.data('owlCarousel');
				owl.destroy();
				slider_testimonial.owlCarousel({
					singleItem: true
				});
				var owl = slider_post_images.data('owlCarousel');
				owl.destroy();
				var owl = post_slider.data('owlCarousel');
				owl.destroy();
				post_slider.owlCarousel({
					singleItem: true,
					navigation: true,
					navigationText: false,
					pagination: false
				});
				slider_post_images.owlCarousel({
					singleItem: true
				});
				
				$(window).trigger('resize');
            });
        });