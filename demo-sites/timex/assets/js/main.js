(function () {
  "use strict";

  const $ = (sel, root = document) => root.querySelector(sel);
  const $$ = (sel, root = document) => [...root.querySelectorAll(sel)];

  /* Theme switch (Aurora / Midnight / Breeze) */
  const themeLink = $("#theme-stylesheet");
  const THEME_KEY = "timex-theme";
  const applyTheme = (name) => {
    if (!themeLink) return;
    const href = themeLink.getAttribute(`data-theme-${name}`);
    if (href) themeLink.href = href;
    try {
      localStorage.setItem(THEME_KEY, name);
    } catch {
      /* ignore */
    }
    $$("[data-set-theme]").forEach((btn) => {
      btn.classList.toggle("is-active", btn.getAttribute("data-set-theme") === name);
    });
  };
  const savedTheme = (() => {
    try {
      return localStorage.getItem(THEME_KEY);
    } catch {
      return null;
    }
  })();
  if (savedTheme === "aurora" || savedTheme === "breeze" || savedTheme === "midnight") {
    applyTheme(savedTheme);
  } else {
    applyTheme("aurora");
  }
  $$("[data-set-theme]").forEach((btn) => {
    btn.addEventListener("click", () => applyTheme(btn.getAttribute("data-set-theme") || "aurora"));
  });

  /* Header scroll */
  const header = $("[data-site-header]");
  if (header) {
    const syncHeader = () => header.classList.toggle("is-scrolled", window.scrollY > 16);
    window.addEventListener("scroll", syncHeader, { passive: true });
    syncHeader();
  }

  /* Modals */
  const body = document.body;
  const openModal = (id) => {
    const el = document.getElementById(id);
    if (!el) return;
    el.hidden = false;
    body.classList.add("modal-open");
    const focusable = el.querySelector("input, button, textarea, select");
    if (focusable) focusable.focus();
  };
  const closeModal = (el) => {
    if (!el) return;
    el.hidden = true;
    if (!$$(".modal:not([hidden])").length) body.classList.remove("modal-open");
  };

  $$("[data-open-modal]").forEach((btn) => {
    btn.addEventListener("click", () => openModal(btn.getAttribute("data-open-modal")));
  });

  $$("[data-close-modal]").forEach((btn) => {
    btn.addEventListener("click", () => {
      const modal = btn.closest(".modal");
      closeModal(modal);
    });
  });

  $$(".modal").forEach((modal) => {
    modal.addEventListener("click", (e) => {
      if (e.target === modal) closeModal(modal);
    });
  });

  document.addEventListener("keydown", (e) => {
    if (e.key !== "Escape") return;
    $$(".modal:not([hidden])").forEach((m) => closeModal(m));
  });

  /* Toast */
  let toastTimer;
  const showToast = (message) => {
    const toast = $("#live-toast");
    if (!toast) return;
    toast.textContent = message;
    toast.classList.add("is-visible");
    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => toast.classList.remove("is-visible"), 3200);
  };

  /* Live attendance table */
  const employees = [
    { id: 1, name: "Anita Reddy", dept: "Operations", shift: "General", status: "Present", in: "09:02" },
    { id: 2, name: "Rahul Kumar", dept: "Field", shift: "Field", status: "On site", in: "08:45" },
    { id: 3, name: "Priya Menon", dept: "HR", shift: "General", status: "Leave", in: "—" },
    { id: 4, name: "Suresh Iyer", dept: "Operations", shift: "Night", status: "Present", in: "21:58" },
    { id: 5, name: "Deepa Nair", dept: "Finance", shift: "General", status: "Present", in: "09:11" },
    { id: 6, name: "Vikram Shah", dept: "Field", shift: "Field", status: "On site", in: "10:03" },
    { id: 7, name: "Kavya Joshi", dept: "IT", shift: "General", status: "Late", in: "09:42" },
    { id: 8, name: "Arun Patel", dept: "Operations", shift: "General", status: "Present", in: "08:59" },
  ];

  const stats = { shift: 102, checked: 96, leave: 6, field: 36 };
  const statEls = {
    shift: $("[data-stat-shift]"),
    checked: $("[data-stat-checked]"),
    leave: $("[data-stat-leave]"),
    field: $("[data-stat-field]"),
    heroChecked: $("[data-hero-checked]"),
  };

  const syncStats = () => {
    if (statEls.shift) statEls.shift.textContent = String(stats.shift);
    if (statEls.checked) statEls.checked.textContent = String(stats.checked);
    if (statEls.leave) statEls.leave.textContent = String(stats.leave);
    if (statEls.field) statEls.field.textContent = String(stats.field);
    if (statEls.heroChecked) statEls.heroChecked.textContent = String(stats.checked);
  };

  const tableBody = $("#attendance-tbody");
  const searchInput = $("#attendance-search");
  const deptFilter = $("#attendance-dept");

  const renderTable = () => {
    if (!tableBody) return;
    const q = (searchInput?.value || "").trim().toLowerCase();
    const dept = deptFilter?.value || "all";
    const rows = employees.filter((row) => {
      const matchQ = !q || row.name.toLowerCase().includes(q) || row.dept.toLowerCase().includes(q);
      const matchD = dept === "all" || row.dept === dept;
      return matchQ && matchD;
    });
    tableBody.innerHTML = rows
      .map(
        (row) => `<tr>
          <td>${row.name}</td>
          <td>${row.dept}</td>
          <td>${row.shift}</td>
          <td><span class="status-pill status-pill--${row.status.replace(/\s+/g, "-").toLowerCase()}">${row.status}</span></td>
          <td>${row.in}</td>
        </tr>`
      )
      .join("");
  };

  searchInput?.addEventListener("input", renderTable);
  deptFilter?.addEventListener("change", renderTable);
  renderTable();
  syncStats();

  $("#simulate-punch")?.addEventListener("click", () => {
    stats.checked += 1;
    syncStats();
    const candidate = employees.find((e) => e.status === "Late" || e.status === "On site");
    if (candidate) {
      candidate.status = "Present";
      candidate.in = new Date().toLocaleTimeString("en-IN", { hour: "2-digit", minute: "2-digit", hour12: false });
    }
    renderTable();
    showToast("Biometric in-punch recorded — checked-in count updated live.");
  });

  /* ROI calculator */
  const roiEmployees = $("#roi-employees");
  const roiSalary = $("#roi-salary");
  const roiMinutes = $("#roi-minutes");
  const roiOut = $("#roi-result");

  const formatInr = (n) => "₹" + Math.round(n).toLocaleString("en-IN");

  const calcRoi = () => {
    if (!roiOut) return;
    const emp = Number(roiEmployees?.value || 0);
    const salary = Number(roiSalary?.value || 0);
    const mins = Number(roiMinutes?.value || 0);
    const hourly = salary / (22 * 8);
    const monthlyHoursSaved = (emp * mins * 22) / 60;
    const savings = monthlyHoursSaved * hourly;
    roiOut.textContent = formatInr(savings);
    $("#roi-employees-val")?.textContent = String(emp);
    $("#roi-salary-val")?.textContent = formatInr(salary);
    $("#roi-minutes-val")?.textContent = String(mins);
  };

  [roiEmployees, roiSalary, roiMinutes].forEach((el) => el?.addEventListener("input", calcRoi));
  calcRoi();

  /* Demo form */
  const form = $("[data-demo-form]");
  if (form) {
    form.addEventListener("submit", async (e) => {
      e.preventDefault();
      const status = form.querySelector("[data-form-status]");
      if (status) {
        status.textContent = "";
        status.className = "form-status";
      }
      try {
        const res = await fetch(form.action, { method: "POST", body: new FormData(form) });
        const data = await res.json();
        if (status) {
          status.textContent = data.message || "";
          status.classList.add(data.ok ? "is-success" : "is-error");
        }
        if (data.ok) {
          form.reset();
          closeModal($("#modal-demo"));
        }
      } catch {
        if (status) {
          status.textContent = "Network error. Try again.";
          status.classList.add("is-error");
        }
      }
    });
  }
})();
