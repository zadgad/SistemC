$(document).ready(function(){
	$('.btn-sideBar-SubMenu').on('click', function(){
		var SubMenu=$(this).next('ul');
		var iconBtn=$(this).children('.zmdi-caret-down');
		if(SubMenu.hasClass('show-sideBar-SubMenu')){
			iconBtn.removeClass('zmdi-hc-rotate-180');
			SubMenu.removeClass('show-sideBar-SubMenu');
		}else{
			iconBtn.addClass('zmdi-hc-rotate-180');
			SubMenu.addClass('show-sideBar-SubMenu');
		}
	});
	$('.btn-exit-system').on('click', function(){
		swal({
		  	title: 'Are you sure?',
		  	text: "The current session will be closed",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonColor: '#03A9F4',
		  	cancelButtonColor: '#F44336',
		  	confirmButtonText: '<i class="zmdi zmdi-run"></i> Yes, Exit!',
		  	cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, Cancel!'
		}).then(function () {
			window.location.href="index.html";
		});
	});
	$('.btn-menu-dashboard').on('click', function(){
		var body=$('.dashboard-contentPage');
		var sidebar=$('.dashboard-sideBar');
		if(sidebar.css('pointer-events')=='none'){
			body.removeClass('no-paddin-left');
			sidebar.removeClass('hide-sidebar').addClass('show-sidebar');
		}else{
			body.addClass('no-paddin-left');
			sidebar.addClass('hide-sidebar').removeClass('show-sidebar');
		}
	});
	$('.btn-Notifications-area').on('click', function(){
		var NotificationsArea=$('.Notifications-area');
		if(NotificationsArea.css('opacity')=="0"){
			NotificationsArea.addClass('show-Notification-area');
		}else{
			NotificationsArea.removeClass('show-Notification-area');
		}
	});
	$('.btn-search').on('click', function(){
		swal({
		  title: 'What are you looking for?',
		  confirmButtonText: '<i class="zmdi zmdi-search"></i>  Search',
		  confirmButtonColor: '#03A9F4',
		  showCancelButton: true,
		  cancelButtonColor: '#F44336',
		  cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> Cancel',
		  html: '<div class="form-group label-floating">'+
			  		'<label class="control-label" for="InputSearch">write here</label>'+
			  		'<input class="form-control" id="InputSearch" type="text">'+
				'</div>'
		}).then(function () {
		  swal(
		    'You wrote',
		    ''+$('#InputSearch').val()+'',
		    'success'
		  )
		});
	});
	$('.btn-modal-help').on('click', function(){
		$('#Dialog-Help').modal('show');
	});
});
(function($){
    $(window).on("load",function(){
        $(".dashboard-sideBar-ct").mCustomScrollbar({
        	theme:"light-thin",
        	scrollbarPosition: "inside",
        	autoHideScrollbar: true,
        	scrollButtons: {enable: true}
        });
        $(".dashboard-contentPage, .Notifications-body").mCustomScrollbar({
        	theme:"dark-thin",
        	scrollbarPosition: "inside",
        	autoHideScrollbar: true,
        	scrollButtons: {enable: true}
        });
	});
	$(window).scroll(function() {
		if ($(this).scrollTop() > 100) {
		  $('.back-to-top').fadeIn('slow');
		} else {
		  $('.back-to-top').fadeOut('slow');
		}
	  });
	  $('.back-to-top').click(function(){
		$('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
		return false;
	  });
	
	  // Initiate the wowjs animation library
	  new WOW().init();
	
	  // Initiate superfish on nav menu
	  $('.nav-menu').superfish({
		animation: {
		  opacity: 'show'
		},
		speed: 400
	  });
	
	  // Mobile Navigation
	  if ($('#nav-menu-container').length) {
		var $mobile_nav = $('#nav-menu-container').clone().prop({
		  id: 'mobile-nav'
		});
		$mobile_nav.find('> ul').attr({
		  'class': '',
		  'id': ''
		});
		$('body').append($mobile_nav);
		$('body').prepend('<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>');
		$('body').append('<div id="mobile-body-overly"></div>');
		$('#mobile-nav').find('.menu-has-children').prepend('<i class="fa fa-chevron-down"></i>');
	
		$(document).on('click', '.menu-has-children i', function(e) {
		  $(this).next().toggleClass('menu-item-active');
		  $(this).nextAll('ul').eq(0).slideToggle();
		  $(this).toggleClass("fa-chevron-up fa-chevron-down");
		});
	
		$(document).on('click', '#mobile-nav-toggle', function(e) {
		  $('body').toggleClass('mobile-nav-active');
		  $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
		  $('#mobile-body-overly').toggle();
		});
	
		$(document).click(function(e) {
		  var container = $("#mobile-nav, #mobile-nav-toggle");
		  if (!container.is(e.target) && container.has(e.target).length === 0) {
			if ($('body').hasClass('mobile-nav-active')) {
			  $('body').removeClass('mobile-nav-active');
			  $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
			  $('#mobile-body-overly').fadeOut();
			}
		  }
		});
	  } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
		$("#mobile-nav, #mobile-nav-toggle").hide();
	  }
	
	  // Smooth scroll for the menu and links with .scrollto classes
	  $('.nav-menu a, #mobile-nav a, .scrollto').on('click', function() {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
		  var target = $(this.hash);
		  if (target.length) {
			var top_space = 0;
	
			if ($('#header').length) {
			  top_space = $('#header').outerHeight();
	
			  if( ! $('#header').hasClass('header-fixed') ) {
				top_space = top_space - 20;
			  }
			}
	
			$('html, body').animate({
			  scrollTop: target.offset().top - top_space
			}, 1500, 'easeInOutExpo');
	
			if ($(this).parents('.nav-menu').length) {
			  $('.nav-menu .menu-active').removeClass('menu-active');
			  $(this).closest('li').addClass('menu-active');
			}
	
			if ($('body').hasClass('mobile-nav-active')) {
			  $('body').removeClass('mobile-nav-active');
			  $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
			  $('#mobile-body-overly').fadeOut();
			}
			return false;
		  }
		}
	  });
	
	  // Header scroll class
	  $(window).scroll(function() {
		if ($(this).scrollTop() > 100) {
		  $('#header').addClass('header-scrolled');
		} else {
		  $('#header').removeClass('header-scrolled');
		}
	  });
	
	  // Intro carousel
	  var introCarousel = $(".carousel");
	  var introCarouselIndicators = $(".carousel-indicators");
	  introCarousel.find(".carousel-inner").children(".carousel-item").each(function(index) {
		(index === 0) ?
		introCarouselIndicators.append("<li data-target='#introCarousel' data-slide-to='" + index + "' class='active'></li>") :
		introCarouselIndicators.append("<li data-target='#introCarousel' data-slide-to='" + index + "'></li>");
	
		$(this).css("background-image", "url('" + $(this).children('.carousel-background').children('img').attr('src') +"')");
		$(this).children('.carousel-background').remove();
	  });
	
	  $(".carousel").swipe({
		swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
		  if (direction == 'left') $(this).carousel('next');
		  if (direction == 'right') $(this).carousel('prev');
		},
		allowPageScroll:"vertical"
	  });
	
	  // Skills section
	  $('#skills').waypoint(function() {
		$('.progress .progress-bar').each(function() {
		  $(this).css("width", $(this).attr("aria-valuenow") + '%');
		});
	  }, { offset: '80%'} );
	
	  // jQuery counterUp (used in Facts section)
	  $('[data-toggle="counter-up"]').counterUp({
		delay: 10,
		time: 1000
	  });
	
	  // Porfolio isotope and filter
	  var portfolioIsotope = $('.portfolio-container').isotope({
		itemSelector: '.portfolio-item',
		layoutMode: 'fitRows'
	  });
	
	  $('#portfolio-flters li').on( 'click', function() {
		$("#portfolio-flters li").removeClass('filter-active');
		$(this).addClass('filter-active');
	
		portfolioIsotope.isotope({ filter: $(this).data('filter') });
	  });
	
	  // Clients carousel (uses the Owl Carousel library)
	  $(".clients-carousel").owlCarousel({
		autoplay: true,
		dots: true,
		loop: true,
		responsive: { 0: { items: 2 }, 768: { items: 4 }, 900: { items: 6 }
		}
	  });
	
	  // Testimonials carousel (uses the Owl Carousel library)
	  $(".testimonials-carousel").owlCarousel({
		autoplay: true,
		dots: true,
		loop: true,
		items: 1
	  });
})(jQuery);