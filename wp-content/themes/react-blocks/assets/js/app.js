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
