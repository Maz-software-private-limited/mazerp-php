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
    const path = window.location.pathname.replace(/\/$/, "");
    const base = path.endsWith("/index.php") ? path.slice(0, -"/index.php".length) : path;
    const target = `${base}/${hash}`.replace(/\/{2,}/g, "/");
    window.location.replace(target);
    return;
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

  const productsTrigger = document.querySelector("[data-nav-products-trigger]");
  const productsMenu = document.querySelector("[data-nav-products-menu]");

  function closeProductsMenu() {
    if (!productsTrigger || !productsMenu) return;
    productsTrigger.setAttribute("aria-expanded", "false");
    productsMenu.hidden = true;
  }

  function openProductsMenu() {
    if (!productsTrigger || !productsMenu) return;
    productsTrigger.setAttribute("aria-expanded", "true");
    productsMenu.hidden = false;
  }

  if (productsTrigger && productsMenu) {
    productsTrigger.addEventListener("click", (event) => {
      event.stopPropagation();
      const open = productsTrigger.getAttribute("aria-expanded") === "true";
      if (open) {
        closeProductsMenu();
      } else {
        openProductsMenu();
      }
    });

    document.addEventListener("click", (event) => {
      if (productsMenu.hidden) return;
      const target = event.target;
      if (!(target instanceof Node)) return;
      if (productsTrigger.contains(target) || productsMenu.contains(target)) return;
      closeProductsMenu();
    });

    document.addEventListener("keydown", (event) => {
      if (event.key === "Escape") closeProductsMenu();
    });
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
        closeProductsMenu();
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
    const display = document.querySelector("[data-pricing-display]");
    const amountEl = display?.querySelector("[data-price-amount]");
    const periodEl = display?.querySelector("[data-price-period]");
    const equivEl = document.querySelector("[data-price-equiv]");
    const buttons = pricingToggle.querySelectorAll("[data-billing]");

    function setBilling(mode) {
      if (!display || !amountEl || !periodEl) return;
      const isYearly = mode === "yearly";
      amountEl.textContent = isYearly
        ? display.dataset.formatYearly
        : display.dataset.formatMonthly;
      periodEl.textContent = isYearly ? " / year" : " / month";
      if (equivEl) {
        equivEl.hidden = !isYearly;
      }
    }

    const initial = display?.dataset.defaultBilling || "yearly";
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
})();
