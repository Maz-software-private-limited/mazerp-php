/**
 * Maz Timex microsite — motion, pricing toggle, form helpers
 */
(function () {
  'use strict';

  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  var nav = document.querySelector('.timex-navbar');
  function onScrollNav() {
    if (!nav) return;
    nav.classList.toggle('is-scrolled', window.scrollY > 8);
  }
  onScrollNav();
  window.addEventListener('scroll', onScrollNav, { passive: true });

  function addClass(nodes, className) {
    nodes.forEach(function (el) {
      if (
        !el.classList.contains('timex-reveal') &&
        !el.classList.contains('timex-reveal-left') &&
        !el.classList.contains('timex-reveal-right')
      ) {
        el.classList.add(className);
      }
    });
  }

  addClass(
    document.querySelectorAll(
      '.timex-plan-card, .timex-feature-card, .timex-benefit, .timex-step, .timex-form-card, .timex-faq .accordion-item, .timex-section .text-center, .timex-payslip'
    ),
    'timex-reveal'
  );
  addClass(document.querySelectorAll('.timex-hero-home .col-lg-5, .timex-section .col-lg-5'), 'timex-reveal-left');
  addClass(document.querySelectorAll('.timex-hero-home .col-lg-7, .timex-section .col-lg-7'), 'timex-reveal-right');

  document.querySelectorAll('.row.g-3, .row.g-4').forEach(function (row) {
    row.classList.add('timex-stagger');
  });

  if (!reduceMotion && 'IntersectionObserver' in window) {
    var io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.1, rootMargin: '0px 0px -24px 0px' }
    );
    document.querySelectorAll('.timex-reveal, .timex-reveal-left, .timex-reveal-right').forEach(function (el) {
      io.observe(el);
    });
  } else {
    document.querySelectorAll('.timex-reveal, .timex-reveal-left, .timex-reveal-right').forEach(function (el) {
      el.classList.add('is-visible');
    });
  }

  var topBtn = document.createElement('button');
  topBtn.type = 'button';
  topBtn.className = 'timex-back-top';
  topBtn.setAttribute('aria-label', 'Back to top');
  topBtn.innerHTML = '<i class="fa-solid fa-arrow-up" aria-hidden="true"></i>';
  document.body.appendChild(topBtn);

  function onScrollTop() {
    topBtn.classList.toggle('is-visible', window.scrollY > 520);
  }
  onScrollTop();
  window.addEventListener('scroll', onScrollTop, { passive: true });
  topBtn.addEventListener('click', function () {
    window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });
  });

  /* Monthly / yearly toggle */
  var toggle = document.querySelector('[data-timex-billing]');
  if (toggle) {
    var buttons = toggle.querySelectorAll('[data-billing]');
    buttons.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var mode = btn.getAttribute('data-billing');
        buttons.forEach(function (b) { b.classList.toggle('active', b === btn); });
        document.querySelectorAll('[data-price-monthly], [data-price-yearly]').forEach(function (el) {
          var monthly = el.getAttribute('data-price-monthly');
          var yearly = el.getAttribute('data-price-yearly');
          var label = el.querySelector('[data-price-value]');
          var unit = el.querySelector('[data-price-unit]');
          if (!label) return;
          if (mode === 'yearly') {
            label.textContent = yearly || 'Contact us';
            if (unit) unit.textContent = yearly ? '/year' : '';
          } else {
            label.textContent = monthly || 'Contact us';
            if (unit) unit.textContent = monthly ? '/month' : '';
          }
        });
      });
    });
  }

  /* Preview tabs on home */
  var tabBtns = document.querySelectorAll('[data-timex-panel]');
  if (tabBtns.length) {
    tabBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var id = btn.getAttribute('data-timex-panel');
        tabBtns.forEach(function (b) {
          b.classList.toggle('btn-primary', b === btn);
          b.classList.toggle('btn-outline-primary', b !== btn);
        });
        document.querySelectorAll('[data-timex-panel-target]').forEach(function (panel) {
          panel.hidden = panel.getAttribute('data-timex-panel-target') !== id;
        });
      });
    });
  }
})();
