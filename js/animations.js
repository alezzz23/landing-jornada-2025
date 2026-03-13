/* ========================================
   III Jornada Científica 2025 - GSAP Animations
   ======================================== */

// Register plugins (only if they exist)
gsap.registerPlugin(ScrollTrigger);
if (typeof window.ScrollToPlugin !== 'undefined') {
	gsap.registerPlugin(window.ScrollToPlugin);
}

// Wait for DOM to be ready
document.addEventListener('DOMContentLoaded', () => {

	// ========================================
	// Navigation Toggle
	// ========================================
	const navToggle = document.querySelector('.nav-toggle');
	const navMenu = document.querySelector('.nav-menu');

	if (navToggle && navMenu) {
		navToggle.addEventListener('click', () => {
			navMenu.classList.toggle('active');
			navToggle.classList.toggle('active');
		});

		// Close menu when clicking a link
		navMenu.querySelectorAll('a').forEach(link => {
			link.addEventListener('click', () => {
				navMenu.classList.remove('active');
				navToggle.classList.remove('active');
			});
		});
	}

	// ========================================
	// Hero Animations
	// ========================================
	const heroTimeline = gsap.timeline({
		defaults: { duration: 1, ease: 'power3.out' }
	});

	// Animate hero elements with stagger
	heroTimeline
		.from('.hero-badge', { opacity: 0, y: 30, duration: 0.8 })
		.from('.title-line', { opacity: 0, y: 80, stagger: 0.15 }, '-=0.4')
		.from('.hero-subtitle', { opacity: 0, y: 30 }, '-=0.3')
		.from('.hero-cta .btn', { opacity: 0, y: 20, stagger: 0.1 }, '-=0.3')
		.from('.hero-stats .stat', { opacity: 0, y: 20, stagger: 0.1 }, '-=0.2')
		.from('.scroll-indicator', { opacity: 0, y: 20 }, '-=0.2');

	// Floating shapes animation
	gsap.to('.shape-1', {
		x: 50,
		y: 30,
		duration: 8,
		repeat: -1,
		yoyo: true,
		ease: 'sine.inOut'
	});

	gsap.to('.shape-2', {
		x: -40,
		y: -30,
		duration: 10,
		repeat: -1,
		yoyo: true,
		ease: 'sine.inOut'
	});

	gsap.to('.shape-3', {
		x: 30,
		y: -40,
		duration: 7,
		repeat: -1,
		yoyo: true,
		ease: 'sine.inOut'
	});

	gsap.to('.shape-4', {
		x: -30,
		y: 40,
		duration: 9,
		repeat: -1,
		yoyo: true,
		ease: 'sine.inOut'
	});

	// ========================================
	// About Section Animations
	// ========================================
	gsap.from('.about-content', {
		scrollTrigger: {
			trigger: '.about',
			start: 'top 90%',
			once: true
		},
		opacity: 0,
		x: -50,
		duration: 0.8,
		ease: 'power3.out',
		clearProps: 'all'
	});

	gsap.from('.info-card', {
		scrollTrigger: {
			trigger: '.about',
			start: 'top 85%',
			once: true
		},
		opacity: 0,
		x: 50,
		stagger: 0.07,
		duration: 0.65,
		ease: 'power3.out',
		clearProps: 'all'
	});

	// ========================================
	// Speakers Section Animations
	// ========================================
	gsap.from('.section-header', {
		scrollTrigger: {
			trigger: '.speakers',
			start: 'top 85%',
			once: true
		},
		opacity: 0,
		y: 40,
		duration: 0.9,
		ease: 'power3.out',
		clearProps: 'all'
	});

	gsap.from('.speaker-card', {
		scrollTrigger: {
			trigger: '.speakers-grid',
			start: 'top 95%',  // Adjusted to trigger earlier
			toggleActions: 'play none none reverse'
		},
		opacity: 0,
		y: 60,
		scale: 0.9,
		stagger: {
			amount: 0.6,
			from: 'start'
		},
		duration: 0.8,
		ease: 'power3.out',
		clearProps: 'all' // Ensure props are cleared after animation
	});

	// ========================================
	// Registration Section Animations
	// ========================================
	gsap.from('.register-wrapper', {
		scrollTrigger: {
			trigger: '.register',
			start: 'top 75%',
			toggleActions: 'play none none reverse'
		},
		opacity: 0,
		y: 50,
		scale: 0.95,
		duration: 1,
		ease: 'power3.out'
	});

	// Form inputs stagger animation
	gsap.from('.form-group', {
		scrollTrigger: {
			trigger: '.register-form',
			start: 'top 85%',
			toggleActions: 'play none none reverse'
		},
		opacity: 0,
		y: 20,
		stagger: 0.08,
		duration: 0.6,
		ease: 'power2.out'
	});

	// ========================================
	// Footer Animation
	// ========================================
	gsap.from('.footer-content > div', {
		scrollTrigger: {
			trigger: '.footer',
			start: 'top 90%',
			toggleActions: 'play none none reverse'
		},
		opacity: 0,
		y: 30,
		stagger: 0.1,
		duration: 0.8,
		ease: 'power2.out'
	});

	// ========================================
	// Smooth Scroll for Navigation Links
	// ========================================
	document.querySelectorAll('a[href^="#"]').forEach(anchor => {
		anchor.addEventListener('click', function (e) {
			const href = this.getAttribute('href');
			if (!href || href === '#') return;

			const target = document.querySelector(href);
			if (!target) return;

			e.preventDefault();

			const y = target.getBoundingClientRect().top + window.pageYOffset - 80;
			const canUseScrollTo = typeof window.ScrollToPlugin !== 'undefined' || (gsap && gsap.plugins && gsap.plugins.scrollTo);

			if (canUseScrollTo) {
				gsap.to(window, {
					duration: 1,
					scrollTo: { y, autoKill: true },
					ease: 'power3.inOut'
				});
				return;
			}

			window.scrollTo({ top: y, behavior: 'smooth' });
		});
	});

	// ========================================
	// Navigation Background on Scroll
	// ========================================
	const nav = document.querySelector('.nav');
	const updateNavBg = () => {
		if (!nav) return;
		nav.style.background = window.scrollY > 80 ? 'rgba(15, 15, 26, 0.98)' : 'rgba(15, 15, 26, 0.9)';
	};
	updateNavBg();
	window.addEventListener('scroll', updateNavBg, { passive: true });

	// ========================================
	// Parallax Effect for Hero
	// ========================================
	gsap.to('.hero-content', {
		scrollTrigger: {
			trigger: '.hero',
			start: 'top top',
			end: 'bottom top',
			scrub: 1
		},
		y: 150,
		opacity: 0.3
	});

	// ========================================
	// Counter Animation for Stats (no TextPlugin required)
	// ========================================
	const statNumbers = document.querySelectorAll('.stat-number');

	statNumbers.forEach((stat) => {
		const raw = (stat.textContent || '').trim();
		const num = parseInt(raw.replace(/\D/g, ''), 10);
		if (Number.isNaN(num)) return;

		const suffix = raw.replace(/[\d]/g, '');
		const counter = { val: 0 };

		gsap.to(counter, {
			scrollTrigger: {
				trigger: stat,
				start: 'top 90%',
				toggleActions: 'play none none none'
			},
			val: num,
			duration: 1.8,
			ease: 'power2.out',
			onUpdate: () => {
				stat.textContent = Math.round(counter.val) + suffix;
			}
		});
	});

	// ========================================
	// Form Input Focus Animations
	// ========================================
	const formInputs = document.querySelectorAll('.form-group input, .form-group select');

	formInputs.forEach(input => {
		input.addEventListener('focus', () => {
			gsap.to(input, {
				scale: 1.02,
				duration: 0.3,
				ease: 'power2.out'
			});
		});

		input.addEventListener('blur', () => {
			gsap.to(input, {
				scale: 1,
				duration: 0.3,
				ease: 'power2.out'
			});
		});
	});

	// ========================================
	// Button Hover Animations
	// ========================================
	const buttons = document.querySelectorAll('.btn');

	buttons.forEach(btn => {
		btn.addEventListener('mouseenter', () => {
			gsap.to(btn, {
				scale: 1.05,
				duration: 0.3,
				ease: 'power2.out'
			});
		});

		btn.addEventListener('mouseleave', () => {
			gsap.to(btn, {
				scale: 1,
				duration: 0.3,
				ease: 'power2.out'
			});
		});
	});

	// ========================================
	// Speaker Card Hover Effects
	// ========================================
	const speakerCards = document.querySelectorAll('.speaker-card');

	speakerCards.forEach(card => {
		const image = card.querySelector('.speaker-image img');

		card.addEventListener('mouseenter', () => {
			gsap.to(image, {
				scale: 1.15,
				duration: 0.5,
				ease: 'power2.out'
			});
		});

		card.addEventListener('mouseleave', () => {
			gsap.to(image, {
				scale: 1,
				duration: 0.5,
				ease: 'power2.out'
			});
		});
	});

	// ========================================
	// Info Card Hover Effects
	// ========================================
	const infoCards = document.querySelectorAll('.info-card');

	infoCards.forEach(card => {
		card.addEventListener('mouseenter', () => {
			gsap.to(card, {
				x: 10,
				duration: 0.3,
				ease: 'power2.out'
			});
		});

		card.addEventListener('mouseleave', () => {
			gsap.to(card, {
				x: 0,
				duration: 0.3,
				ease: 'power2.out'
			});
		});
	});

});
