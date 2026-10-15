(function () {
  const SECTION_IDS = [
    "features",
    "how-it-works",
    "benefits",
    "security",
    "pricing",
    "faq",
    "contact",
  ];

  const hash = window.location.hash.replace(/^#/, "");
  if (hash && SECTION_IDS.includes(hash)) {
    const base = window.location.pathname.replace(/\/?$/, "");
    window.history.replaceState(null, "", `${base}/${hash}`);
  }

  const header = document.querySelector("[data-header]");
  const navToggle = document.querySelector("[data-nav-toggle]");
  const nav = document.querySelector("[data-nav]");
  const contactForm = document.querySelector("[data-contact-form]");
  const formStatus = document.querySelector("[data-form-status]");
  const pricingToggle = document.querySelector("[data-pricing-toggle]");

  function onScroll() {
    if (!header) return;
    header.classList.toggle("is-scrolled", window.scrollY > 8);
  }

  window.addEventListener("scroll", onScroll, { passive: true });
  onScroll();

  const sectionId = document.body.dataset.homeSection;
  if (sectionId) {
    const target = document.getElementById(sectionId);
    if (target) {
      const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
      target.scrollIntoView({ behavior: reduceMotion ? "auto" : "smooth", block: "start" });
    }
  }

  if (navToggle && nav) {
    navToggle.addEventListener("click", () => {
      const open = nav.classList.toggle("is-open");
      navToggle.setAttribute("aria-expanded", open ? "true" : "false");
    });

    nav.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", () => {
        nav.classList.remove("is-open");
        navToggle.setAttribute("aria-expanded", "false");
      });
    });
  }

  if (contactForm && formStatus) {
    contactForm.addEventListener("submit", async (event) => {
      event.preventDefault();
      formStatus.textContent = "";
      formStatus.classList.remove("is-error", "is-success");

      if (!contactForm.reportValidity()) {
        return;
      }

      const submitBtn = contactForm.querySelector('[type="submit"]');
      if (submitBtn) {
        submitBtn.disabled = true;
      }

      try {
        const response = await fetch(contactForm.action, {
          method: "POST",
          body: new FormData(contactForm),
          headers: { Accept: "application/json" },
        });
        const data = await response.json();
        if (!response.ok || !data.ok) {
          throw new Error(data.message || "Something went wrong.");
        }
        formStatus.textContent = data.message;
        formStatus.classList.add("is-success");
        contactForm.reset();
      } catch (err) {
        formStatus.textContent =
          err instanceof Error ? err.message : "Could not send your request.";
        formStatus.classList.add("is-error");
      } finally {
        if (submitBtn) {
          submitBtn.disabled = false;
        }
      }
    });
  }

  function setPlanBilling(card, mode) {
    const priceBlock = card.querySelector("[data-plan-price]");
    if (!priceBlock) return;
    const isQuote = priceBlock.dataset.quote === "1";
    if (isQuote) return;

    const amountEl = priceBlock.querySelector("[data-price-amount]");
    const periodEl = priceBlock.querySelector("[data-price-period]");
    const equivEl = card.querySelector("[data-price-equiv]");
    const isYearly = mode === "yearly";
    const hasYearly = priceBlock.dataset.hasYearly === "1";
    const hasMonthly = priceBlock.dataset.hasMonthly === "1";

    if (!amountEl) return;

    if (isYearly && hasYearly && priceBlock.dataset.formatYearly) {
      amountEl.textContent = priceBlock.dataset.formatYearly;
      if (periodEl) periodEl.textContent = " / year";
    } else if (hasMonthly && priceBlock.dataset.formatMonthly) {
      amountEl.textContent = priceBlock.dataset.formatMonthly;
      if (periodEl) periodEl.textContent = " / month";
    }

    if (equivEl) {
      equivEl.hidden = !(isYearly && hasYearly);
    }

    const cta = card.querySelector("a[data-pricing-cta-console]");
    if (cta && cta.href) {
      try {
        const url = new URL(cta.href);
        url.searchParams.set("billing", mode);
        cta.href = url.toString();
      } catch (_) {
        /* keep href */
      }
    }
  }

  if (pricingToggle) {
    const cards = document.querySelectorAll("[data-plan-card]");
    const buttons = pricingToggle.querySelectorAll("[data-billing]");

    function setBilling(mode) {
      cards.forEach((card) => setPlanBilling(card, mode));
    }

    const firstPrice = document.querySelector("[data-plan-price]");
    const initial = firstPrice?.dataset.defaultBilling || "yearly";
    setBilling(initial);

    buttons.forEach((btn) => {
      btn.addEventListener("click", () => {
        const mode = btn.getAttribute("data-billing") || "yearly";
        buttons.forEach((b) => {
          b.classList.remove("is-active");
          b.setAttribute("aria-pressed", "false");
        });
        btn.classList.add("is-active");
        btn.setAttribute("aria-pressed", "true");
        setBilling(mode);
      });
    });
  }

  const pricingCards = document.querySelectorAll(".pricing-section .pricing-card");
  if (pricingCards.length && !window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            observer.unobserve(entry.target);
          }
        });
      },
      { rootMargin: "0px 0px -8% 0px", threshold: 0.08 }
    );
    pricingCards.forEach((card, i) => {
      card.style.setProperty("--pricing-delay", `${i * 60}ms`);
      observer.observe(card);
    });
  } else {
    pricingCards.forEach((card) => card.classList.add("is-visible"));
  }
})();
