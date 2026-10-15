<?php

declare(strict_types=1);

session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

require __DIR__ . '/bootstrap.php';

$c = site_config();
$tel = contact_tel_href();
$wa = contact_whatsapp_href();
$phone = (string) $c['contact_phone'];
$mazerpUrl = (string) ($c['mazerp_marketing_url'] ?? 'https://www.mazerp.com');
$monthlyPrice = (int) ($c['pricing']['monthly_price'] ?? 999);
$freeMaxEmployees = (int) ($c['pricing']['free_year_max_employees'] ?? 10);
$heroAssetVer = static function (string $rel): string {
    $path = __DIR__ . '/' . ltrim($rel, '/');
    $url = asset_url($rel);
    return is_file($path) ? $url . '?v=' . filemtime($path) : $url;
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MazERP Timex — Time and Attendance Management</title>
  <meta name="description" content="<?= e($c['meta_description']) ?>">
  <link rel="icon" href="<?= e(asset_url('assets/img/favicon.ico')) ?>" sizes="any">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Sora:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= e(asset_url('assets/css/style.css')) ?>">
  <link rel="stylesheet" href="<?= e(asset_url('assets/css/header.css')) ?>">
  <link rel="stylesheet" href="<?= e(asset_url('assets/css/sections.css')) ?>">
  <link rel="stylesheet" href="<?= e(asset_url('assets/css/hero.css')) ?>">
</head>
<body>
  <header class="site-header" data-site-header>
    <div class="site-header__inner">
      <a class="tam-logo" href="#top" aria-label="MazERP Timex home">
        <img class="tam-logo__img" src="<?= e(asset_url((string) $c['logo'])) ?>" width="140" height="40" alt="MazERP Timex">
        <span class="tam-logo__text">
          <span class="tam-logo__title">Time and Attendance Management App</span>
          <span class="tam-logo__by">by MazERP · Maz Techno</span>
        </span>
      </a>
      <nav class="site-nav" aria-label="Primary">
        <a href="#clients">Clients</a>
        <a href="#features">Features</a>
        <a href="#reports">Reports</a>
        <a href="#security">Security</a>
      </nav>
      <div class="site-header__actions">
        <a class="site-phone" href="<?= e($tel) ?>"><?= e($phone) ?></a>
        <button type="button" class="btn btn--primary" data-open-modal="modal-demo"><span class="btn-label-full">Schedule your Demo</span><span class="btn-label-short">Demo</span></button>
      </div>
    </div>
  </header>

  <main id="top">
    <section class="hero hero--split">
      <div class="hero__inner">
        <div class="hero__panel">
          <p class="hero__panel-badge">Limited-time offer</p>
          <h1 class="hero__panel-title">Smart Attendance Management Software. Free for 1 Year!</h1>
          <p class="hero__panel-text">
            Manage employee attendance smarter with MazERP Timex. Get your first-year subscription worth <?= e(format_inr($monthlyPrice)) ?> absolutely free and simplify workforce management.
          </p>
          <div class="hero__panel-price">
            <div class="hero__panel-price-row">
              <span class="hero__panel-price-tag">
                <span class="hero__price-was"><?= e(format_inr($monthlyPrice)) ?></span>
                <span class="hero__price-arrow" aria-hidden="true">→</span>
                <span>FREE</span>
              </span>
              <span class="hero__panel-price-note">First-year subscription</span>
            </div>
            <p class="hero__panel-eligibility">
              <span class="hero__panel-eligibility__badge" aria-label="Team size limit">
                <span class="hero__panel-eligibility__icon" aria-hidden="true"></span>
                Up to <strong><?= (int) $freeMaxEmployees ?></strong> employees
              </span>
            </p>
          </div>
          <div class="hero__panel-actions">
            <button type="button" class="btn--offer" data-open-modal="modal-demo">Get Started Free</button>
            <a class="btn--outline-light" href="#features">Explore Features</a>
          </div>
        </div>

        <div class="hero__media" aria-label="Timex product preview">
          <img
            class="hero__visual"
            src="<?= e($heroAssetVer('assets/img/hero-visual-blend.png')) ?>"
            width="1320"
            height="554"
            alt="Timex QR scanner, attendance dashboard on laptop, and mobile check-in app"
            loading="eager"
            decoding="async"
            fetchpriority="high">
        </div>
      </div>
    </section>

    <section class="clients-band" id="clients" aria-labelledby="clients-title">
      <div class="clients-band__inner">
        <p id="clients-title"><strong>Clients.</strong> Timex is MazERP time and attendance—alongside Books, CRM, and Payroll in one signed-in workspace for growing businesses.</p>
        <a href="<?= e($mazerpUrl) ?>">Explore MazERP products →</a>
      </div>
    </section>

    <section class="section" id="features">
      <div class="container">
        <header class="section-head">
          <p class="section-kicker">Features</p>
          <h2>Multi-channel attendance</h2>
        </header>
        <div class="feature-spotlight">
          <p>With MazERP Timex, organizations gain complete multi-channel attendance flexibility. Whether the team operates from the office, works remotely, or on the field, Timex provides a seamless attendance solution tailored to your needs—hassle-free, accurate, and convenient every time.</p>
        </div>
        <div class="feature-grid">
          <article class="feature-card"><h3>Office &amp; devices</h3><p>Biometric devices, punch logs, and office locations.</p></article>
          <article class="feature-card"><h3>Mobile &amp; QR</h3><p>GPS geofencing, selfie verification, and QR punch.</p></article>
          <article class="feature-card"><h3>Field teams</h3><p>On-site status and field attendance on the live board.</p></article>
        </div>
      </div>
    </section>

    <section class="scale-band" id="scale">
      <div class="container">
        <h2>Attendance that grows with your business worldwide</h2>
        <p>Scale locations, shifts, and workforce types in Timex—multi-site attendance, role-based access, and HRM reports that stay consistent as you expand.</p>
      </div>
    </section>

    <section class="section section--alt" id="testimonials">
      <div class="container">
        <header class="section-head">
          <p class="section-kicker">Testimonials</p>
          <h2>See Timex with your workflow</h2>
        </header>
        <div class="demo-invite">
          <p>We do not publish customer testimonials on this site. Request a walkthrough and we will show attendance, leave, and approvals using scenarios that match your organization.</p>
          <div class="demo-invite__actions">
            <button type="button" class="btn btn--primary btn--lg" data-open-modal="modal-demo">Schedule your Demo</button>
            <?php if ($wa !== ''): ?>
            <a class="btn btn--ghost btn--lg" href="<?= e($wa) ?>" rel="noopener noreferrer">WhatsApp Maz Techno</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <section class="section" id="reports">
      <div class="container">
        <header class="section-head">
          <p class="section-kicker">From clock-ins to reports</p>
          <h2>Your workforce, simplified</h2>
          <p>Set up people and attendance, run daily punches, then review HRM reports—with a live board you can try below.</p>
        </header>
        <ol class="workflow-steps">
          <li><strong>1</strong><span>Set up employees, departments, and shifts in Timex.</span></li>
          <li><strong>2</strong><span>Configure devices, locations, and mobile punch policies.</span></li>
          <li><strong>3</strong><span>Track attendance, leave, and overtime with approvals.</span></li>
          <li><strong>4</strong><span>Review workforce reports and export-ready totals.</span></li>
        </ol>
        <div class="live-panel" id="live-board">
          <div class="live-stats">
            <div class="live-stat"><span>Shift Employees</span><strong data-stat-shift>102</strong></div>
            <div class="live-stat"><span>Checked-in</span><strong data-stat-checked>96</strong></div>
            <div class="live-stat"><span>On Leave</span><strong data-stat-leave>6</strong></div>
            <div class="live-stat"><span>Field</span><strong data-stat-field>36</strong></div>
          </div>
          <div class="live-toolbar">
            <input type="search" id="attendance-search" placeholder="Search employee or department…" aria-label="Search employees">
            <select id="attendance-dept" aria-label="Filter by department">
              <option value="all">All departments</option>
              <option value="Operations">Operations</option>
              <option value="Field">Field</option>
              <option value="HR">HR</option>
              <option value="Finance">Finance</option>
              <option value="IT">IT</option>
            </select>
            <button type="button" class="btn btn--primary" id="simulate-punch">Simulate Biometric In-Punch</button>
          </div>
          <div class="table-wrap">
            <table class="data-table">
              <thead>
                <tr>
                  <th>Employee</th>
                  <th>Department</th>
                  <th>Shift</th>
                  <th>Status</th>
                  <th>Last punch</th>
                </tr>
              </thead>
              <tbody id="attendance-tbody"></tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

    <section class="section section--alt" id="security">
      <div class="container">
        <header class="section-head">
          <p class="section-kicker">Roles &amp; permissions</p>
          <h2>Secure, structured access</h2>
          <p>Role-based permissions with MazERP sign-in—control data visibility and streamline approvals across locations.</p>
        </header>
        <ul class="access-list">
          <li>Role and location-based access control</li>
          <li>Configurable user permissions</li>
          <li>Secure data visibility by organization</li>
          <li>Streamlined approval hierarchy</li>
        </ul>
      </div>
    </section>

    <section class="section" id="roi">
      <div class="container">
        <header class="section-head">
          <h2>ROI savings calculator</h2>
          <p>Estimate monthly savings from reduced manual attendance reconciliation.</p>
        </header>
        <div class="roi-panel">
          <div class="roi-controls">
            <label>
              Employees <output id="roi-employees-val">50</output>
              <input type="range" id="roi-employees" min="10" max="500" value="50" step="5">
            </label>
            <label>
              Avg. monthly salary <output id="roi-salary-val">₹35,000</output>
              <input type="range" id="roi-salary" min="15000" max="120000" value="35000" step="1000">
            </label>
            <label>
              Minutes saved / employee / day <output id="roi-minutes-val">8</output>
              <input type="range" id="roi-minutes" min="2" max="30" value="8" step="1">
            </label>
          </div>
          <div class="roi-result">
            <p>Estimated monthly savings</p>
            <p class="roi-result__value" id="roi-result">₹0</p>
            <p class="roi-result__note">Illustrative model—confirm with your Maz Techno advisor.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container">
      <p>© <?= date('Y') ?> Maz Techno · MazERP Timex · Time &amp; Attendance Management</p>
    </div>
  </footer>

  <div class="float-actions" aria-label="Quick contact">
    <button type="button" class="float-btn float-btn--call" data-open-modal="modal-call" title="Quick call">📞</button>
    <?php if ($wa !== ''): ?>
    <a class="float-btn float-btn--wa" href="<?= e($wa) ?>" rel="noopener noreferrer" title="WhatsApp">💬</a>
    <?php endif; ?>
  </div>

  <div class="toast" id="live-toast" role="status" aria-live="polite"></div>

  <div class="modal" id="modal-demo" hidden>
    <div class="modal__dialog" role="dialog" aria-labelledby="modal-demo-title" aria-modal="true">
      <button type="button" class="modal__close" data-close-modal aria-label="Close">×</button>
      <h2 id="modal-demo-title">Schedule your demo</h2>
      <p>Tell us about your team—we will show MazERP Timex live attendance, mobile punch, and approvals. Qualifying organizations with up to <strong><?= (int) $freeMaxEmployees ?> employees</strong> get <strong>year one free</strong>, then <strong><?= e(format_inr($monthlyPrice)) ?>/month</strong>.</p>
      <form data-demo-form action="<?= e(demo_request_url()) ?>" method="post">
        <input type="hidden" name="csrf_token" value="<?= e($_SESSION['csrf_token']) ?>">
        <label>Name<input name="name" required autocomplete="name"></label>
        <label>Work email<input name="email" type="email" required autocomplete="email"></label>
        <label>Company<input name="company" autocomplete="organization"></label>
        <label>Message<textarea name="message" rows="3"></textarea></label>
        <button type="submit" class="btn btn--primary btn--block">Submit request</button>
        <p class="form-status" data-form-status></p>
      </form>
    </div>
  </div>

  <div class="modal" id="modal-call" hidden>
    <div class="modal__dialog" role="dialog" aria-labelledby="modal-call-title" aria-modal="true">
      <button type="button" class="modal__close" data-close-modal aria-label="Close">×</button>
      <h2 id="modal-call-title">Quick call</h2>
      <p>Speak with Maz Techno about Timex pricing, rollout, and the <strong>first year free</strong> offer for up to <?= (int) $freeMaxEmployees ?> employees (<?= e(format_inr($monthlyPrice)) ?>/month after).</p>
      <a class="btn btn--primary btn--block" href="<?= e($tel) ?>">Call <?= e($phone) ?></a>
      <button type="button" class="btn btn--ghost btn--block" data-close-modal>Close</button>
    </div>
  </div>

  <script src="<?= e(asset_url('assets/js/main.js')) ?>" defer></script>
</body>
</html>
