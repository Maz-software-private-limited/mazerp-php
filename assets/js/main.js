/* ==========================================================================
   MazERP v2 - Main JavaScript
   Vanilla JS: header scroll, hamburger, scroll reveal, counters,
   FAQ accordion, exit intent, calendar, form validation
   ========================================================================== */
(function () {
  'use strict';

  /* ---- Header scroll shadow ---- */
  var header = document.getElementById('siteHeader');
  if (header) {
    window.addEventListener('scroll', function () {
      header.classList.toggle('scrolled', window.scrollY > 15);
    }, { passive: true });
  }

  /* ---- Hamburger mobile nav ---- */
  var hamburger = document.getElementById('hamburger');
  var navMenu = document.getElementById('navMenu');
  var mainNav = navMenu ? navMenu.closest('nav') : null;
  var navBackdrop = document.getElementById('navBackdrop');
  if (hamburger && mainNav) {
    function openNav() {
      mainNav.classList.add('is-open');
      if (navBackdrop) navBackdrop.classList.add('is-open');
      hamburger.classList.add('is-active');
      hamburger.setAttribute('aria-expanded', 'true');
      document.body.style.overflow = 'hidden';
    }
    function closeNav() {
      mainNav.classList.remove('is-open');
      if (navBackdrop) navBackdrop.classList.remove('is-open');
      hamburger.classList.remove('is-active');
      hamburger.setAttribute('aria-expanded', 'false');
      // Close any open dropdown accordions too
      mainNav.querySelectorAll('.has-dropdown.open').forEach(function (el) {
        el.classList.remove('open');
      });
      document.body.style.overflow = '';
    }
    hamburger.addEventListener('click', function () {
      mainNav.classList.contains('is-open') ? closeNav() : openNav();
    });
    // Backdrop click closes the nav
    if (navBackdrop) {
      navBackdrop.addEventListener('click', closeNav);
    }
    // Escape key closes the nav
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && mainNav.classList.contains('is-open')) closeNav();
    });
    // Close when a non-dropdown nav link is clicked
    mainNav.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function (e) {
        // Don't close on the dropdown trigger itself (it just toggles the sub-menu)
        if (a.closest('.has-dropdown') && a.parentElement && a.parentElement.classList.contains('has-dropdown')) {
          // This is the parent <a> that toggles dropdown — skip close
          return;
        }
        closeNav();
      });
    });
    // Products dropdown toggle on mobile (accordion behavior)
    mainNav.querySelectorAll('.has-dropdown > a, .has-dropdown > button').forEach(function (trigger) {
      trigger.addEventListener('click', function (e) {
        if (window.innerWidth <= 700) {
          e.preventDefault();
          trigger.closest('.has-dropdown').classList.toggle('open');
        }
      });
    });
    // Close button inside nav overlay
    var navClose = mainNav.querySelector('.nav-close');
    if (navClose) navClose.addEventListener('click', closeNav);
  }

  /* ---- Scroll reveal ---- */
  var revealEls = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');
  if ('IntersectionObserver' in window && revealEls.length) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
    revealEls.forEach(function (el) { io.observe(el); });
  } else {
    revealEls.forEach(function (el) { el.classList.add('visible'); });
  }

  /* ---- Animated counters ---- */
  var counters = document.querySelectorAll('[data-count]');
  if (counters.length && 'IntersectionObserver' in window) {
    var cio = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        var el = entry.target;
        var target = parseFloat(el.dataset.count);
        var suffix = el.dataset.suffix || '';
        var dur = 1500;
        var start = performance.now();
        function step(now) {
          var p = Math.min((now - start) / dur, 1);
          var ease = 1 - Math.pow(1 - p, 3);
          var v = target * ease;
          el.textContent = (target % 1 === 0 ? Math.floor(v) : v.toFixed(1)) + suffix;
          if (p < 1) requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
        cio.unobserve(el);
      });
    }, { threshold: 0.4 });
    counters.forEach(function (c) { cio.observe(c); });
  }

  /* ---- FAQ accordion ---- */
  document.querySelectorAll('.faq-item').forEach(function (item) {
    var btn = item.querySelector('.faq-btn, .faq-q');
    if (!btn) return;
    btn.addEventListener('click', function () {
      item.parentElement.querySelectorAll('.faq-item.open').forEach(function (other) {
        if (other !== item) other.classList.remove('open');
      });
      item.classList.toggle('open');
    });
  });

  /* ---- Exit intent modal ---- */
  var modal = document.getElementById('exitModal');
  if (modal) {
    var shown = sessionStorage.getItem('maz_exit') === '1';
    var pageReadyForExit = false;
    // Only arm exit-intent after user has been on page for 5 seconds
    // This prevents false triggers on page load / iframe focus events
    setTimeout(function () { pageReadyForExit = true; }, 5000);

    function showModal() {
      if (shown) return;
      shown = true;
      sessionStorage.setItem('maz_exit', '1');
      modal.removeAttribute('hidden');
      modal.classList.add('open');
      document.body.style.overflow = 'hidden';
    }
    function hideModal() {
      modal.classList.remove('open');
      modal.setAttribute('hidden', '');
      document.body.style.overflow = '';
    }
    document.addEventListener('mouseout', function (e) {
      if (pageReadyForExit && !e.relatedTarget && e.clientY <= 5) showModal();
    });
    setTimeout(function () { if (!shown) showModal(); }, 60000);
    modal.querySelectorAll('[data-close]').forEach(function (el) {
      el.addEventListener('click', hideModal);
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && !modal.hidden) hideModal();
    });
  }

  /* ---- Calendar mock ---- */
  document.querySelectorAll('.cal-day').forEach(function (day) {
    if (day.classList.contains('off')) return;
    day.addEventListener('click', function () {
      document.querySelectorAll('.cal-day.sel').forEach(function (d) { d.classList.remove('sel'); });
      day.classList.add('sel');
    });
  });

  /* ---- Contact form validation ---- */
  var form = document.getElementById('demoForm');
  if (form) {
    var msgBox = form.querySelector('.form-msg');
    var submitBtn = form.querySelector('.form-submit');

    function showErr(field, msg) {
      var g = field.closest('.form-group');
      if (!g) return;
      g.classList.add('error');
      var e = g.querySelector('.form-error');
      if (e) e.textContent = msg;
    }
    function clearErr(field) {
      var g = field.closest('.form-group');
      if (!g) return;
      g.classList.remove('error');
      var e = g.querySelector('.form-error');
      if (e) e.textContent = '';
    }

    form.querySelectorAll('input, select, textarea').forEach(function (f) {
      f.addEventListener('input', function () { clearErr(f); });
    });

    form.addEventListener('submit', async function (e) {
      e.preventDefault();
      var valid = true;
      var name = form.querySelector('[name="name"]');
      var email = form.querySelector('[name="email"]');
      var phone = form.querySelector('[name="phone"]');
      var company = form.querySelector('[name="company"]');
      var business = form.querySelector('[name="business_type"]');

      if (!name.value.trim() || name.value.trim().length < 2) { showErr(name, 'Enter your full name.'); valid = false; }
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) { showErr(email, 'Enter a valid email.'); valid = false; }
      if (!/^[+\d\s\-()]{8,}$/.test(phone.value.trim())) { showErr(phone, 'Enter a valid phone number.'); valid = false; }
      if (!company.value.trim()) { showErr(company, 'Company name is required.'); valid = false; }
      if (!business.value) { showErr(business, 'Select your business type.'); valid = false; }
      if (!valid) return;

      submitBtn.disabled = true;
      var orig = submitBtn.innerHTML;
      submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Sending...';

      try {
        var res = await fetch('api/submit.php', { method: 'POST', body: new FormData(form) });
        var data = await res.json();
        if (data.success) {
          msgBox.className = 'form-msg success';
          msgBox.textContent = data.message;
          form.reset();
        } else {
          msgBox.className = 'form-msg error';
          msgBox.textContent = data.message || 'Something went wrong. Please try again.';
        }
      } catch (err) {
        msgBox.className = 'form-msg error';
        msgBox.textContent = 'Network error. Please try again or call us directly.';
      } finally {
        submitBtn.disabled = false;
        submitBtn.innerHTML = orig;
        msgBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
      }
    });
  }

  /* ---- Lazy loading images ---- */
  document.querySelectorAll('img').forEach(function (img) {
    if (!img.hasAttribute('loading')) img.setAttribute('loading', 'lazy');
  });

})();
