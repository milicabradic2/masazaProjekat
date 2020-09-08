;(function () {

	'use strict';

	// Main Menu Superfish
	var mainMenu = function() {

		$('#glavni-primary-menu').superfish({
			delay: 0,
			animation: {
				opacity: 'show'
			},
			speed: 'fast',
			cssArrows: true,
			disableHI: true
		});

	};

	// Offcanvas and cloning of the main menu
	var offcanvas = function() {

		var $clone = $('#glavni-menu-wrap').clone();
		$clone.attr({
			'id' : 'offcanvas-menu'
		});
		$clone.find('> ul').attr({
			'class' : '',
			'id' : ''
		});

		$('#glavni-page').prepend($clone);

		$('.js-glavni-nav-toggle').on('click', function(){

			if ( $('body').hasClass('glavni-offcanvas') ) {
				$('body').removeClass('glavni-offcanvas');
			} else {
				$('body').addClass('glavni-offcanvas');
			}

		});

		$('#offcanvas-menu').css('height', $(window).height());

		$(window).resize(function(){
			var w = $(window);


			$('#offcanvas-menu').css('height', w.height());

			if ( w.width() > 769 ) {
				if ( $('body').hasClass('glavni-offcanvas') ) {
					$('body').removeClass('glavni-offcanvas');
				}
			}

		});

	}



	var mobileMenuOutsideClick = function() {
		$(document).click(function (e) {
	    var container = $("#offcanvas-menu, .js-glavni-nav-toggle");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {
	      if ( $('body').hasClass('glavni-offcanvas') ) {
				$('body').removeClass('glavni-offcanvas');
			}
	    }
		});
	};



	var contentWayPoint = function() {
		var i = 0;
		$('.animate-box').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('animated') ) {

				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .animate-box.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							el.addClass('fadeInUp animated');
							el.removeClass('item-animate');
						},  k * 200, 'easeInOutExpo' );
					});

				}, 100);

			}

		} , { offset: '85%' } );
	};



	$(function(){
		mainMenu();
		offcanvas();
		mobileMenuOutsideClick();
		contentWayPoint();


	});


}());
