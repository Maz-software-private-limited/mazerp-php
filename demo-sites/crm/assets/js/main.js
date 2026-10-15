(function () {
  const SECTION_IDS = [
    "why",
    "features",
    "how-it-works",
    "pipeline",
    "follow-ups",
    "preview",
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
  const previewRoot = document.querySelector("[data-preview]");
  const megaRoot = document.querySelector("[data-mega]");
  const megaToggle = document.querySelector("[data-mega-toggle]");
  const megaPanel = document.querySelector("[data-mega-panel]");

  function onScroll() {
    if (!header) return;
    header.classList.toggle("is-scrolled", window.scrollY > 12);
  }

  window.addEventListener("scroll", onScroll, { passive: true });
  onScroll();

  function closeMega() {
    if (!megaPanel || !megaToggle) return;
    megaPanel.hidden = true;
    megaToggle.setAttribute("aria-expanded", "false");
    megaRoot?.classList.remove("is-open");
  }

  function openMega() {
    if (!megaPanel || !megaToggle) return;
    megaPanel.hidden = false;
    megaToggle.setAttribute("aria-expanded", "true");
    megaRoot?.classList.add("is-open");
  }

  if (megaToggle && megaPanel && megaRoot) {
    megaToggle.addEventListener("click", (event) => {
      event.stopPropagation();
      if (megaPanel.hidden) {
        openMega();
      } else {
        closeMega();
      }
    });

    megaRoot.addEventListener("mouseenter", () => {
      if (window.matchMedia("(min-width: 961px)").matches) {
        openMega();
      }
    });

    megaRoot.addEventListener("mouseleave", () => {
      if (window.matchMedia("(min-width: 961px)").matches) {
        closeMega();
      }
    });

    document.addEventListener("click", (event) => {
      if (!megaRoot.contains(event.target)) {
        closeMega();
      }
    });

    megaToggle.addEventListener("keydown", (event) => {
      if (event.key === "Escape") {
        closeMega();
        megaToggle.blur();
      }
    });
  }

  if (navToggle && nav) {
    navToggle.addEventListener("click", () => {
      const open = nav.classList.toggle("is-open");
      navToggle.setAttribute("aria-expanded", open ? "true" : "false");
      document.body.classList.toggle("crm-nav-open", open);
      if (!open) {
        closeMega();
      }
    });

    nav.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", () => {
        nav.classList.remove("is-open");
        navToggle.setAttribute("aria-expanded", "false");
        document.body.classList.remove("crm-nav-open");
        closeMega();
      });
    });
  }

  if (previewRoot) {
    const tabs = previewRoot.querySelectorAll("[data-preview-tab]");
    const panels = previewRoot.querySelectorAll("[data-preview-panel]");

    tabs.forEach((tab) => {
      tab.addEventListener("click", () => {
        const id = tab.getAttribute("data-preview-tab");
        tabs.forEach((t) => {
          const active = t === tab;
          t.setAttribute("aria-selected", active ? "true" : "false");
        });
        panels.forEach((panel) => {
          const match = panel.getAttribute("data-preview-panel") === id;
          panel.hidden = !match;
        });
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

  if (pricingToggle) {
    const cards = document.querySelectorAll("[data-plan-card]");
    const buttons = pricingToggle.querySelectorAll("[data-billing]");

    function updateCardPrice(card, mode) {
      const priceBlock = card.querySelector("[data-plan-price]");
      if (!priceBlock) return;
      const amountEl = priceBlock.querySelector("[data-price-amount]");
      const periodEl = priceBlock.querySelector("[data-price-period]");
      const equivEl = card.querySelector("[data-price-equiv]");
      if (!amountEl) return;
      const isYearly = mode === "yearly";
      amountEl.textContent = isYearly
        ? priceBlock.dataset.formatYearly
        : priceBlock.dataset.formatMonthly;
      if (periodEl) {
        periodEl.textContent = isYearly ? " / year" : " / month";
      }
      if (equivEl) {
        equivEl.hidden = !isYearly;
      }
    }

    function setBilling(mode) {
      cards.forEach((card) => updateCardPrice(card, mode));
      buttons.forEach((btn) => {
        const active = btn.getAttribute("data-billing") === mode;
        btn.classList.toggle("is-active", active);
        btn.setAttribute("aria-pressed", active ? "true" : "false");
      });
    }

    const firstPrice = document.querySelector("[data-plan-price]");
    const initial = firstPrice?.dataset.defaultBilling || "monthly";
    setBilling(initial);

    buttons.forEach((btn) => {
      btn.addEventListener("click", () => {
        setBilling(btn.getAttribute("data-billing") || "monthly");
      });
    });
  }

  const heroApp = document.querySelector(".crm-hero__visual .crm-app");
  if (heroApp && !window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
    heroApp.classList.add("is-ready");
  }
})();
