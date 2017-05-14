/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        
        var admin_bar_h = 30;

        //adjust header padding if sub nav is visible
        if ($('.sub-menu').is(':visible')) {
          $('header.banner .row.header-row').css("padding-bottom","1.8rem");
        }

         //init carousels
        $('.mini-carousel').owlCarousel({
          center: true,
          items:3,
          rewind: false,
          loop: false,
          margin:30,
          dots: false,
          responsive:{
            600:{
              items:3
            }
          }
        });
        var navArrow = "<img src='/wp-content/themes/CORE/dist/images/Arrow.svg' alt='Arrow next' class='arrow inverse'>";
        $('.owl-carousel').owlCarousel({
        	items:1,
        	nav : true, // Show next and prev buttons
        	navText: [navArrow,navArrow],
        	rewind: false,
      		smartSpeed : 300,
      		navSpeed : 400
    	});
      	// Handle body padding dynamically based on visible submenus
    	var bodyPadding = function() {
      		var bodyTopPadding = $('header.banner').outerHeight();
          	$('header.banner').each(function(){
        		if ($(this).is(':visible')) {
        			if ($("body").hasClass("admin-bar")) {
          				//add padding for that too
          				bodyTopPadding +=admin_bar_h;
          			}
          			$(this).headroom();
        		}
      		});
      		//alert(bodyTopPadding);
      		$('body').css({'padding-top': bodyTopPadding + 'px'});
      		if ($('body').hasClass("admin-bar")) {
      			$("header.banner").css("top",admin_bar_h+"px");
      		}
    	};

    	// Add some body padding dynamically based on open submenus
      	bodyPadding();

      	var $grid = $('.grid').imagesLoaded().always( function( instance ) {
      		// init Masonry after all images have loaded
      		$grid.masonry({
      			// options...
      			// set itemSelector so .grid-sizer is not used in layout
      			itemSelector: '.grid-item',
      			// use element for option
      			columnWidth: '.grid-sizer',
      			percentPosition: true,
      			gutter: '.gutter-sizer',
            	transitionDuration:0,
            	initLayout: true
      		});
      	});
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
        // Get the modal
        var video_core_modal = $('#video_core_modal');
        // Get the button that opens the modal
        var btn = $("#play_core_btn");
        // Get the <span> element that closes the modal
        var closebtn = $(".close-modal-core");
        var closeModal = function() {
          video_core_modal.modal("hide");
          $('#modal-core-content').html('');
        };
        video_core_modal.on('show.bs.modal', function () {
          var vEmbed = $('.slider .owl-stage .active .modal-embed-content').html();
          if(vEmbed){
            $('#modal-core-content').html(vEmbed);
          }
        });
        // When the user clicks on <span> (x), close the modal
        closebtn.click(function() {
            closeModal();
        });
        // When the user clicks anywhere outside of the modal, close it
        $(window).click(function(event) {
            var target = $( event.target );
            if ( target.is(video_core_modal) ) {
               closeModal();
            }
        });
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
