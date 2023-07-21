document.addEventListener('DOMContentLoaded', function() {
	const toggles = document.querySelectorAll('.sub-menu-btn');
	const toggles2 = document.querySelectorAll('.sub-2');
	const togglesMobile = document.querySelectorAll('.mobile-sub-menu-btn');
	const openMenu = document.getElementById('open');
	const closeMenu = document.getElementById('close');
	const closeBannerButton = document.getElementById('close-banner');
	const headerBanner = document.querySelector('.upper-header-banner');

	const header = document.getElementById('masthead');
	openMenu.addEventListener('click', function() {
		header.classList.add('open');
	});
	closeMenu.addEventListener('click', function() {
		header.classList.remove('open');
	});

	function toggleAccordion(toggles, className) {
		toggles.forEach(function(toggle) {
			toggle.addEventListener('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				const parent = this.parentNode;
				parent.classList.toggle(className);
				if (className === 'active') {
					const siblings = Array.from(parent.parentNode.children).filter(function(child) {
						return child !== parent;
					});
					siblings.forEach(function(sibling) {
						sibling.classList.remove(className);
					});
				}
			});
		});
	}

	toggleAccordion(toggles, 'active');
	toggleAccordion(toggles2, 'active-sub');
	toggleAccordion(togglesMobile, 'active-mobile');

	const popupModal = document.querySelector('.popup');
	if (popupModal) {
		const elements = document.getElementsByClassName('more');
		const popupContent = document.querySelector('#popup .popup-container');
		const popupImage = document.querySelector('#popup .popup-container .leader-image');
		const popupLeaderInfo = popupContent.querySelector('.leader-info');
		const closeButton = document.querySelector('.close-popup');

		function openPopup(e) {
			e.preventDefault();
			popupModal.classList.add('active');
			const leaderContent = this.parentNode.querySelector('.leader-popup-text').textContent;
			const leaderImage = this.parentNode.previousElementSibling.getAttribute('src');
			const leaderName = this.parentNode.querySelector('.leader-name').textContent;
			const leaderPosition = this.parentNode.querySelector('.leader-position').textContent;
			popupImage.setAttribute('src', leaderImage);
			popupLeaderInfo.querySelector('.leader-name').textContent = leaderName;
			popupLeaderInfo.querySelector('.leader-description').textContent = leaderContent;
			popupLeaderInfo.querySelector('.leader-position').textContent = leaderPosition;
		}

		for (let i = 0; i < elements.length; i++) {
			elements[i].addEventListener('click', openPopup, false);
		}

		function closePopup() {
			popupModal.classList.remove('active');
			popupLeaderInfo.querySelector('.leader-name').textContent = '';
			popupLeaderInfo.querySelector('.leader-description').textContent = '';
			popupLeaderInfo.querySelector('.leader-position').textContent = '';
		}

		closeButton.addEventListener('click', closePopup, false);
	}

	function closeBanner() {
		headerBanner.classList.add('closed_banner');
	}

	if (closeBannerButton) {
		closeBannerButton.addEventListener('click', closeBanner, false);
	}

	const closeVideo = document.getElementById('close-video');
	const videos = document.querySelectorAll('.video-hook');
	const videoPopup = document.getElementById('video-popup');
	const videoEmpower = document.getElementById('empower-video');
	const iframe = videoEmpower.querySelector('iframe');

	function openVideo(e) {
		const videoSrc = this.getAttribute('video-data');
		iframe.src = videoSrc;
		videoPopup.classList.add('activated');
	}

	videos.forEach(function(video) {
		video.addEventListener('click', openVideo, false);
	});

	function closeVideoPopup() {
		iframe.src = '';
		videoPopup.classList.remove('activated');
	}

	if (closeVideo) {
		closeVideo.addEventListener('click', closeVideoPopup, false);
	}

	const accordions = document.getElementsByClassName('drop-down-info');

	for (let i = 0; i < accordions.length; i++) {
		accordions[i].addEventListener('click', function() {
			this.classList.toggle('active');
			const panel = this.nextElementSibling.nextElementSibling;
			panel.style.maxHeight = panel.style.maxHeight ? null : panel.scrollHeight + 'px';
		});
	}

	const resourceMediaTabLinks = document.getElementsByClassName('resource-media-tab-link');
	const tabWrapper = document.querySelector('.tab-wrapper');
	const tabBtns = document.querySelectorAll('.tab-btn');
	const tabContents = document.querySelectorAll('.tab-contents .content');

	tabWrapper.addEventListener('click', function(e) {
		const targetId = e.target.dataset.target;
		if (targetId) {
			tabBtns.forEach(function(btn) {
				btn.classList.remove('active');
			});
			e.target.classList.add('active');
			tabContents.forEach(function(content) {
				content.classList.remove('active');
			});
			const currentContent = document.getElementById(targetId);
			currentContent.classList.add('active');
		}
	});

});

function setCookie(name, value, days) {
	var expires = "";
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		expires = "; expires=" + date.toUTCString();
	}
	document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function updateScreenWidthCookie() {
	var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

	try {
		setCookie("screenWidth", screenWidth, 365);
		console.log("Screen width cookie updated successfully");
	} catch (error) {
		console.error("Error updating screen width cookie:", error);
	}
}

// Add event listener for beforeunload event
window.addEventListener('beforeunload', updateScreenWidthCookie);

const easeInOutQuad = (t) => t < .5 ? 2 * t * t : -1 + (4 - 2 * t) * t;

const inViewportCounter = (el) => {

	const duration = +el.dataset.duration || 3000;
	const start = +el.textContent || 0;
	const end = +el.dataset.count || 0;
	let raf;

	//stackoverflow.com/a/70746179/383904
	const counterStart = () => {
		if (start === end) return; // If equal values, stop here.

		const range = end - start;
		let curr = start; // Set current to start
		const timeStart = Date.now();

		const loop = () => {
			let elaps = Date.now() - timeStart;
			if (elaps > duration) elaps = duration;
			const frac = easeInOutQuad(elaps / duration); // Get the time fraction with easing
			const step = frac * range; // Calculate the value step
			curr = start + step; // Increment or Decrement current value
			el.textContent = Math.trunc(curr); // Apply to UI as integer
			if (elaps < duration) raf = requestAnimationFrame(loop); // Loop
		};

		raf = requestAnimationFrame(loop); // Start the loop!
	};

	const counterStop = (el) => {
		cancelAnimationFrame(raf);
		el.textContent = start;
	};

	//stackoverflow.com/a/70746179/383904
	const inViewport = (entries, observer) => {
		entries.forEach(entry => {
			// Enters viewport:
			if (entry.isIntersecting) counterStart(entry.target);
			// Exits viewport:
			else counterStop(entry.target);
		});
	};
	const Obs = new IntersectionObserver(inViewport);
	const obsOptions = {}; //developer.mozilla.org/en-US/docs/Web/API/Intersection_Observer_API#Intersection_observer_options
	// Attach observer to element:
	Obs.observe(el, obsOptions);
};

document.querySelectorAll('[data-count]').forEach(inViewportCounter);

var ssb = {
	aConts  : [],
	mouseY : 0,
	N  : 0,
	asd : 0, /*active scrollbar element*/
	sc : 0,
	sp : 0,
	to : 0,

	// constructor
	scrollbar : function (cont_id) {
		var cont = document.getElementById(cont_id);

		// perform initialization
		if (! ssb.init()) return false;

		var cont_clone = cont.cloneNode(false);
		cont_clone.style.overflow = "hidden";
		cont.parentNode.appendChild(cont_clone);
		cont_clone.appendChild(cont);
		cont.style.position = 'absolute';
		cont.style.left = cont.style.top = '0px';
		cont.style.width = cont.style.height = '100%';

		// adding new container into array
		ssb.aConts[ssb.N++] = cont;

		cont.sg = false;

		//creating scrollbar child elements
		cont.st = this.create_div('ssb_st', cont, cont_clone);
		cont.sb = this.create_div('ssb_sb', cont, cont_clone);
		cont.su = this.create_div('ssb_up', cont, cont_clone);
		cont.sd = this.create_div('ssb_down', cont, cont_clone);

		// on mouse down processing
		cont.sb.onmousedown = function (e) {
			if (! this.cont.sg) {
				if (! e) e = window.event;

				ssb.asd = this.cont;
				this.cont.yZ = e.screenY;
				this.cont.sZ = cont.scrollTop;
				this.cont.sg = true;

				// new class name
				this.className = 'ssb_sb ssb_sb_down';
			}
			return false;
		}
		// on mouse down on free track area - move our scroll element too
		cont.st.onmousedown = function (e) {
			if (! e) e = window.event;
			ssb.asd = this.cont;

			ssb.mouseY = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
			for (var o = this.cont, y = 0; o != null; o = o.offsetParent) y += o.offsetTop;
			this.cont.scrollTop = (ssb.mouseY - y - (this.cont.ratio * this.cont.offsetHeight / 2) - this.cont.sw) / this.cont.ratio;
			this.cont.sb.onmousedown(e);
		}

		// onmousedown events
		cont.su.onmousedown = cont.su.ondblclick = function (e) { ssb.mousedown(this, -1); return false; }
		cont.sd.onmousedown = cont.sd.ondblclick = function (e) { ssb.mousedown(this,  1); return false; }

		//onmouseout events
		cont.su.onmouseout = cont.su.onmouseup = ssb.clear;
		cont.sd.onmouseout = cont.sd.onmouseup = ssb.clear;

		// on mouse over - apply custom class name: ssb_sb_over
		cont.sb.onmouseover = function (e) {
			if (! this.cont.sg) this.className = 'ssb_sb ssb_sb_over';
			return false;
		}

		// on mouse out - revert back our usual class name 'ssb_sb'
		cont.sb.onmouseout  = function (e) {
			if (! this.cont.sg) this.className = 'ssb_sb';
			return false;
		}

		// onscroll - change positions of scroll element
		cont.ssb_onscroll = function () {
			this.ratio = (this.offsetHeight - 2 * this.sw) / this.scrollHeight;
			this.sb.style.top = Math.floor(this.sw + this.scrollTop * this.ratio) + 'px';
		}

		// scrollbar width
		cont.sw = 12;

		// start scrolling
		cont.ssb_onscroll();
		ssb.refresh();

		// binding own onscroll event
		cont.onscroll = cont.ssb_onscroll;
		return cont;
	},

	// initialization
	init : function () {
		if (window.oper || (! window.addEventListener && ! window.attachEvent)) { return false; }

		// temp inner function for event registration
		function addEvent (o, e, f) {
			if (window.addEventListener) { o.addEventListener(e, f, false); ssb.w3c = true; return true; }
			if (window.attachEvent) return o.attachEvent('on' + e, f);
			return false;
		}

		// binding events
		addEvent(window.document, 'mousemove', ssb.onmousemove);
		addEvent(window.document, 'mouseup', ssb.onmouseup);
		addEvent(window, 'resize', ssb.refresh);
		return true;
	},

	// create and append div finc
	create_div : function(c, cont, cont_clone) {
		var o = document.createElement('div');
		o.cont = cont;
		o.className = c;
		cont_clone.appendChild(o);
		return o;
	},
	// do clear of controls
	clear : function () {
		clearTimeout(ssb.to);
		ssb.sc = 0;
		return false;
	},
	// refresh scrollbar
	refresh : function () {
		for (var i = 0, N = ssb.N; i < N; i++) {
			var o = ssb.aConts[i];
			o.ssb_onscroll();
			o.sb.style.width = o.st.style.width = o.su.style.width = o.su.style.height = o.sd.style.width = o.sd.style.height = o.sw + 'px'= '4px';
			o.sb.style.height = Math.ceil(Math.max(o.sw * .5, o.ratio * o.offsetHeight) + 1) + 'px'= '118px';
		}
	},
	// arrow scrolling
	arrow_scroll : function () {
		if (ssb.sc != 0) {
			ssb.asd.scrollTop += 6 * ssb.sc / ssb.asd.ratio;
			ssb.to = setTimeout(ssb.arrow_scroll, ssb.sp);
			ssb.sp = 32;
		}
	},

	/* event binded functions : */
	// scroll on mouse down
	mousedown : function (o, s) {
		if (ssb.sc == 0) {
			// new class name
			o.cont.sb.className = 'ssb_sb ssb_sb_down';
			ssb.asd = o.cont;
			ssb.sc = s;
			ssb.sp = 400;
			ssb.arrow_scroll();
		}
	},
	// on mouseMove binded event
	onmousemove : function(e) {
		if (! e) e = window.event;
		// get vertical mouse position
		ssb.mouseY = e.screenY;
		if (ssb.asd.sg) ssb.asd.scrollTop = ssb.asd.sZ + (ssb.mouseY - ssb.asd.yZ) / ssb.asd.ratio;
	},
	// on mouseUp binded event
	onmouseup : function (e) {
		if (! e) e = window.event;
		var tg = (e.target) ? e.target : e.srcElement;
		if (ssb.asd && document.releaseCapture) ssb.asd.releaseCapture();

		// new class name
		if (ssb.asd) ssb.asd.sb.className = (tg.className.indexOf('scrollbar') > 0) ? 'ssb_sb ssb_sb_over' : 'ssb_sb';
		document.onselectstart = '';
		ssb.clear();
		ssb.asd.sg = false;
	}
}

window.onload = function() {
	ssb.scrollbar('container'); // scrollbar initialization
}


