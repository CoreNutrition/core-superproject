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
        var breakpoint = 768; //breakpoint where to switch some elements to mobile layout
        var menuOpen = false; ///init hamburger and slideout nav menu

       //Sticky footer
       var bumpIt = function() { 
        var footer_height = $('footer.content-info').height();
        var viewport_height = $(window).height();
        var header_height = $('header.banner').height();
        var container_height = viewport_height - header_height - footer_height;
       	$('.wrap').css('min-height', container_height);
       }, didResize = false;
       bumpIt();
       
       $(window).resize(function() {
       	didResize = true;
       });
       
       setInterval(function() {  
       	if(didResize) {
       		didResize = false;
       		bumpIt();
       	}
       }, 250);
        //END sticky

        //store selector references in cache
        DOMCACHESTORE = {};
        DOMCACHE = {
          get: function(selector, force) {
            if (DOMCACHESTORE[selector] !== undefined && force === undefined) {
              return DOMCACHESTORE[selector];
            }
            DOMCACHESTORE[selector] = $(selector);
            return DOMCACHESTORE[selector];
          }
        };

        var hamburger = DOMCACHE.get('#nav-toggle'); //nav trigger hamburger icon
        var mobile_nav = DOMCACHE.get('.resposnive_nav_container'); //mobile nav
        var desktop_nav = DOMCACHE.get('#menu-top-navigation'); //mobile nav
        var header = DOMCACHE.get('header.banner');
        var social = DOMCACHE.get('.social-channels');


        hamburger.on( "click", function() {
          if (menuOpen) {
            mobile_nav.width(0);
            hamburger.removeClass('active');
            
            $('.push').css('position','relative');
            $('.push').css('right','0');

           

            mobile_nav.find('li').css('opacity','0');
            menuOpen=false;
            header.css('left','0');

          } else {
            mobile_nav.find('li').css('opacity','1');
            mobile_nav.width('65%');
            $('.push').css('right','70%');
            
            hamburger.addClass('active');
            $('.push').css('position','relative');

            $('.push').css('position','relative');
           
            header.css('left','-70%');
           

            menuOpen=true;
          }
        });

        //If below breakpoint, hide social and desktop nav and reveal the hamburger
        var switch_nav = function() {
          if ( $(window).width() >= breakpoint ) {
            desktop_nav.css('display','flex');
            hamburger.css('display','none');
            //force mobile nav closed if it's open

             //move social out of the sidebar nav social
            social.removeClass('in_nav');

            social.prependTo('.top-right');

            menuOpen=true;
            hamburger.click();
          } else {
            desktop_nav.css('display','none');
            hamburger.css('display','block');

             //move social into the sidebar
            social.addClass('in_nav');
            social.prependTo('#menu').wrap( "<li></li>" );

          }
        };
        switch_nav();



        $(document).ready(function() {
          $(".animsition").animsition({
            inClass: 'fade-in',
            outClass: 'fade-out',
            inDuration: 1500,
            outDuration: 800,
            linkElement: '.animsition-link',
            // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
            loading: true,
            loadingParentElement: 'body', //animsition wrapper element
            loadingClass: 'animsition-loading',
            loadingInner: '', // e.g '<img src="loading.svg" />'
            timeout: false,
            timeoutCountdown: 5000,
            onLoadEvent: true,
            browser: [ 'animation-duration', '-webkit-animation-duration'],
            // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
            // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
            overlay : false,
            overlayClass : 'animsition-overlay-slide',
            overlayParentElement : 'body',
            transition: function(url){ window.location.href = url; }
          });
        });

        

        //adjust header padding if sub nav is visible
        if ($('.nav-primary .sub-menu').is(':visible')) {
          $('header.banner .row.header-row').css("padding-bottom","1.8rem");
        }

         //init carousels
        $('.mini-carousel').owlCarousel({
          center: true,
          autoplay:true,
          autoplayTimeout:2000,
          addClassActive: true,
          items:3,
          rewind: true,
          loop: true,
          margin:30,
          dots: true,
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
    	/*var bodyPadding = function() {
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
    	};*/
      $('header.banner').headroom();

    	// Add some body padding dynamically based on open submenus
      	//bodyPadding();

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

        //on Product pages, we need to adjust the gradient row for the absolutely position lifestyle image
        var set_hero_overlay_height = function() {
          $('.slideshow-overlay .img-overlay').imagesLoaded().always( function( instance ) {
            $lifestyle_image_height = $('.slideshow-overlay .img-overlay img').height()-100;
            $('.slideshow-overlay').css('min-height', $lifestyle_image_height);
          });
        };
        set_hero_overlay_height();

        $( window ).resize(function() {
          set_hero_overlay_height();
          switch_nav();
        });

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        /*
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
        });*/
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
