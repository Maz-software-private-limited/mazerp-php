/**
 * Maz Timex microsite — motion, pricing sticky CTA, form helpers
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
      '.timex-plan-card, .timex-offer-card, .timex-pricing-included, .timex-savings-compare, .timex-pricing-close, .timex-limit-chip, .timex-value-step, .timex-feature-card, .timex-benefit, .timex-step, .timex-form-card, .timex-faq .accordion-item, .timex-feature-accordion .accordion-item, .timex-section .text-center, .timex-payslip'
    ),
    'timex-reveal'
  );
  addClass(document.querySelectorAll('.timex-pricing-stage__intro'), 'timex-reveal');
  addClass(document.querySelectorAll('.timex-hero-home .col-lg-5, .timex-section .col-lg-5'), 'timex-reveal-left');
  addClass(document.querySelectorAll('.timex-hero-home .col-lg-7, .timex-section .col-lg-7'), 'timex-reveal-right');

  document.querySelectorAll('.row.g-3, .row.g-4, .timex-offer-cards').forEach(function (row) {
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

  /* Mobile sticky CTA after scrolling past offer cards (defaults to best value) */
  var sticky = document.querySelector('[data-timex-sticky-cta]');
  var offers = document.querySelector('#timex-offers') || document.querySelector('.timex-offer-cards');
  if (sticky && offers && window.matchMedia('(max-width: 767.98px)').matches) {
    if ('IntersectionObserver' in window) {
      var stickyIo = new IntersectionObserver(
        function (entries) {
          entries.forEach(function (entry) {
            sticky.hidden = entry.isIntersecting;
          });
        },
        { threshold: 0.12 }
      );
      stickyIo.observe(offers);
    }
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
