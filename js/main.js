document.addEventListener('DOMContentLoaded', function() {
    // Cache DOM queries
    const hamburger = document.querySelector('.hamburger-menu');
    const navLinks = document.querySelector('.nav-links');
    const sections = document.querySelectorAll('section');
    const navAnchors = document.querySelectorAll('.nav-links a');
    const navOverlay = document.querySelector('.nav-overlay');
    const body = document.body;
    
    // Throttle scroll event
    let scrollTimeout;
    
    // Mobile Navigation with performance optimization
    hamburger?.addEventListener('click', () => {
        requestAnimationFrame(() => {
            hamburger.classList.toggle('active');
            navLinks.classList.toggle('active');
            navOverlay.classList.toggle('active');
            body.classList.toggle('menu-open');
        });
    });

    // Close menu when clicking overlay
    navOverlay?.addEventListener('click', () => {
        hamburger.classList.remove('active');
        navLinks.classList.remove('active');
        navOverlay.classList.remove('active');
        body.classList.remove('menu-open');
    });

    // Close menu when clicking links
    navLinks?.addEventListener('click', (e) => {
        if (e.target.tagName === 'A') {
            hamburger.classList.remove('active');
            navLinks.classList.remove('active');
            navOverlay.classList.remove('active');
            body.classList.remove('menu-open');
        }
    });

    // Close menu on resize if screen becomes large
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
            hamburger.classList.remove('active');
            navLinks.classList.remove('active');
            navOverlay.classList.remove('active');
            body.classList.remove('menu-open');
        }
    });

    // Optimized smooth scrolling
    navAnchors.forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Optimized scroll handler with throttling
    window.addEventListener('scroll', () => {
        if (scrollTimeout) {
            window.cancelAnimationFrame(scrollTimeout);
        }

        scrollTimeout = window.requestAnimationFrame(() => {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (window.scrollY >= (sectionTop - sectionHeight / 3)) {
                    current = section.getAttribute('id');
                }
            });

            navAnchors.forEach(link => {
                link.classList.toggle('active', link.getAttribute('href').includes(current));
            });
        });
    });

    // Lazy load images
    const lazyLoadImages = () => {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.style.backgroundImage = `url('${img.dataset.src}')`;
                    observer.unobserve(img);
                }
            });
        });

        document.querySelectorAll('.gallery-item[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    };

    // Initialize lazy loading
    if ('IntersectionObserver' in window) {
        lazyLoadImages();
    }
});

document.addEventListener('DOMContentLoaded', () => {
  const navToggle = document.querySelector('[data-nav-toggle]');
  const navLinks = document.querySelector('[data-nav-links]');

  navToggle?.addEventListener('click', () => {
    navToggle.classList.toggle('active');
    navLinks?.classList.toggle('active');
  });

  // Close menu when clicking outside
  document.addEventListener('click', (e) => {
    if (!e.target.closest('[data-nav]') && navLinks?.classList.contains('active')) {
      navToggle?.classList.remove('active');
      navLinks.classList.remove('active');
    }
  });

  // Close menu when clicking a link
  navLinks?.addEventListener('click', (e) => {
    if (e.target.tagName === 'A') {
      navToggle?.classList.remove('active');
      navLinks.classList.remove('active');
    }
  });
});
