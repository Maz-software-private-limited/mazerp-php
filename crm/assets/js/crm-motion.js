/**
 * Maz CRM microsite motion — subtle, performance-friendly
 */
(function () {
  'use strict';

  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  var nav = document.querySelector('.crm-navbar');
  function onScrollNav() {
    if (!nav) return;
    nav.classList.toggle('is-scrolled', window.scrollY > 8);
  }
  onScrollNav();
  window.addEventListener('scroll', onScrollNav, { passive: true });

  function addClass(nodes, className) {
    nodes.forEach(function (el) {
      if (
        !el.classList.contains('crm-reveal') &&
        !el.classList.contains('crm-reveal-left') &&
        !el.classList.contains('crm-reveal-right')
      ) {
        el.classList.add(className);
      }
    });
  }

  addClass(
    document.querySelectorAll(
      '.crm-plan-card, .crm-addon-card, .crm-feature-card, .crm-why-item, .crm-industry-card, .crm-step, .crm-form-card, .crm-marketplace-banner, .crm-faq .accordion-item, .crm-section .text-center'
    ),
    'crm-reveal'
  );
  addClass(document.querySelectorAll('.crm-hero-home .col-lg-5, .crm-section .col-lg-5'), 'crm-reveal-left');
  addClass(document.querySelectorAll('.crm-hero-home .col-lg-7, .crm-section .col-lg-7'), 'crm-reveal-right');

  document.querySelectorAll('.row.g-3, .row.g-4').forEach(function (row) {
    row.classList.add('crm-stagger');
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

    document.querySelectorAll('.crm-reveal, .crm-reveal-left, .crm-reveal-right').forEach(function (el) {
      io.observe(el);
    });
  } else {
    document.querySelectorAll('.crm-reveal, .crm-reveal-left, .crm-reveal-right').forEach(function (el) {
      el.classList.add('is-visible');
    });
  }

  var topBtn = document.createElement('button');
  topBtn.type = 'button';
  topBtn.className = 'crm-back-top';
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
})();
