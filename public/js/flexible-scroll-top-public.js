(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	// Back to Top. Based on main.js from https://github.com/CodyHouse/back-to-top
	// fstVars is passed on via wp_localize_script in class-flexible-scroll-top-public.php

	// util.js -- Utility function -- Slimmed down to essential functions

	function Util () {};

	/* 
		class manipulation functions
	*/

	Util.addClass = function(el, className) {
		var classList = className.split(' ');
	 	if (el.classList) el.classList.add(classList[0]);
	 	else if (!Util.hasClass(el, classList[0])) el.className += " " + classList[0];
	 	if (classList.length > 1) Util.addClass(el, classList.slice(1).join(' '));
	};

	Util.removeClass = function(el, className) {
		var classList = className.split(' ');
		if (el.classList) el.classList.remove(classList[0]);	
		else if(Util.hasClass(el, classList[0])) {
			var reg = new RegExp('(\\s|^)' + classList[0] + '(\\s|$)');
			el.className=el.className.replace(reg, ' ');
		}
		if (classList.length > 1) Util.removeClass(el, classList.slice(1).join(' '));
	};

	/* 
		Smooth Scroll
	*/

	Util.scrollTo = function(final, duration, cb) {
	  var start = window.scrollY || document.documentElement.scrollTop,
	      currentTime = null;
	      
	  var animateScroll = function(timestamp){
	  	if (!currentTime) currentTime = timestamp;        
	    var progress = timestamp - currentTime;
	    if(progress > duration) progress = duration;
	    var val = Math.easeInOutQuad(progress, start, final-start, duration);
	    window.scrollTo(0, val);
	    if(progress < duration) {
	        window.requestAnimationFrame(animateScroll);
	    } else {
	      cb && cb();
	    }
	  };

	  window.requestAnimationFrame(animateScroll);
	};

	/* 
		Animation curves
	*/
	Math.easeInOutQuad = function (t, b, c, d) {
		t /= d/2;
		if (t < 1) return c/2*t*t + b;
		t--;
		return -c/2 * (t*(t-2) - 1) + b;
	};

	$(document).ready( function() {

		var backTop = document.getElementsByClassName("fst-button")[0],
			toTopVisibleClass = "to-top--is-visible",
			toTopFadeOutClass = "to-top--fade-out",
			fstPositionClass = fstVars.positionClass,
			fstStyleClass = fstVars.styleClass,
			fstBorderClass = fstVars.borderClass,
			fstColorSchemeClass = fstVars.colorSchemeClass,
			fstOffset = fstVars.offsetShow,
			fstOffsetOpacity = fstVars.offsetFade,
			fstScrollDuration = fstVars.scrolLDuration,
			scrolling = false;

		Util.addClass(backTop, fstPositionClass +" "+ fstStyleClass +" "+ fstBorderClass +" "+ fstColorSchemeClass);

		function checkBackToTop() {
			var windowTop = window.scrollY || document.documentElement.scrollTop;

			if ( windowTop > fstOffset ) {
				Util.addClass(backTop, toTopVisibleClass)
			} else {
				Util.removeClass(backTop, toTopVisibleClass + " " + toTopFadeOutClass)
			}

			if ( windowTop > fstOffsetOpacity ) {
				Util.addClass(backTop, toTopFadeOutClass)
			}

			scrolling = false;
		}

		if ( backTop ) {
			//update back to top visibility on scrolling
			window.addEventListener("scroll", function(event) {
				if( !scrolling ) {
					scrolling = true;
					(!window.requestAnimationFrame) ? setTimeout(checkBackToTop, 250) : window.requestAnimationFrame(checkBackToTop);
				}
			});

			//smooth scroll to top
			backTop.addEventListener("click", function(event) {
				event.preventDefault();
				(!window.requestAnimationFrame) ? window.scrollTo(0, 0) : Util.scrollTo(0, fstScrollDuration);
			});
		}

	});

})( jQuery );
