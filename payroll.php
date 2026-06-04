<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<!-- ========== HERO ========== -->
<section class="product-hero" style="background: linear-gradient(135deg, #1e1b4b, #311042);">
  <div class="container ph-layout">
    <div class="ph-content reveal-left">
      <span class="label label-purple"><i class="fa-solid fa-wallet"></i> <?php echo htmlspecialchars($loc['payroll_title']); ?></span>
      <h1 style="color:#fff;">Automate Salary, Attendance, and Compliance</h1>
      <p style="color:rgba(255,255,255,0.85);">MazERP Payroll gives growing businesses a complete, automated payroll system. Track employee attendance, manage salary structures, handle <?php echo htmlspecialchars($loc['payroll_desc']); ?> seamlessly, and payout salaries with a single click.</p>
      <div class="ph-ctas">
        <a href="https://app.mazerp.com/auth/register" class="btn btn-primary btn-lg" style="background:var(--purple);border-color:var(--purple);"><i class="fa-solid fa-rocket"></i> Start Free Trial</a>
        <a href="contact.php" class="btn btn-outline-white"><i class="fa-solid fa-calendar-check"></i> Book Demo</a>
      </div>
    </div>
    <div class="ph-screen reveal-right">
      <div class="screen-chrome">
        <span class="sc-dot" style="background:#ef4444;"></span><span class="sc-dot" style="background:#eab308;"></span><span class="sc-dot" style="background:#22c55e;"></span>
      </div>
      <img src="assets/img/ui-payroll.svg" alt="MazERP Payroll dashboard showing salary breakdown, attendance tracking, and compliance filings" width="700" height="440">
    </div>
  </div>
</section>

<!-- ========== INTRO ========== -->
<section>
  <div class="container">
    <div class="sol-layout reveal">
      <div class="sol-info">
        <span class="label label-purple"><i class="fa-solid fa-circle-info"></i> Why MazERP Payroll?</span>
        <h2>Stop fighting spreadsheets and manual tax filings</h2>
        <p class="lead">Processing payroll manually is a ticking compliance bomb. From wrong PF calculations to delayed ESI filings, small errors can lead to heavy penalties. MazERP Payroll automates it all in one connected flow.</p>
        <p>Integrated directly with your accounting ledger and biometric attendance logs, MazERP Payroll calculates salaries, logs leaves, and prepares <?php echo htmlspecialchars($loc['tax_name']); ?>-ready employee costs automatically. Save days of monthly manual accounting work.</p>
        <a href="https://app.mazerp.com/auth/register" class="btn btn-primary" style="background:var(--purple);border-color:var(--purple);">Try Payroll Free for 7 Days</a>
      </div>
      <div class="sol-img">
        <div class="sol-feats">
          <div class="sol-feat-item reveal"><i class="fa-solid fa-check" style="color:var(--purple);"></i> 100% compliant <?php echo htmlspecialchars($loc['payroll_desc']); ?> calculations</div>
          <div class="sol-feat-item reveal"><i class="fa-solid fa-check" style="color:var(--purple);"></i> Integrated attendance, clock-in, and leave manager</div>
          <div class="sol-feat-item reveal"><i class="fa-solid fa-check" style="color:var(--purple);"></i> One-click bulk salary payouts via corporate banking</div>
          <div class="sol-feat-item reveal"><i class="fa-solid fa-check" style="color:var(--purple);"></i> Employee self-service app for downloading payslips</div>
          <div class="sol-feat-item reveal"><i class="fa-solid fa-check" style="color:var(--purple);"></i> Flexible pay structures with allowance and deductions</div>
          <div class="sol-feat-item reveal"><i class="fa-solid fa-check" style="color:var(--purple);"></i> Automatic salary accounting ledger postings</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ========== ALT SECTION 1: Attendance & Leaves ========== -->
<section class="alt-section bg-subtle" id="attendance">
  <div class="container alt-grid">
    <div class="alt-content reveal-left">
      <span class="label label-purple"><i class="fa-solid fa-clock"></i> Attendance &amp; Leaves</span>
      <h2>Smart Attendance Tracking</h2>
      <p class="lead">No more manual register entries. Track daily attendance, shifts, overtime, and leaves seamlessly. Works with biometric scanners, web clock-ins, or mobile geofencing.</p>
      <div class="alt-feats">
        <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Biometric device integration for automatic logs</div>
        <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Mobile geofenced check-in for field employees</div>
        <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Leave approval workflows with custom policies</div>
        <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Half-day, overtime, and late-in penalty automation</div>
        <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Monthly shift schedules and rotation builder</div>
      </div>
      <a href="contact.php" class="btn btn-primary" style="background:var(--purple);border-color:var(--purple);">See Attendance Demo</a>
    </div>
    <div class="alt-visual reveal-right">
      <div class="alt-screen">
        <div class="browser-bar"><div class="browser-dots"><span></span><span></span><span></span></div><div class="browser-url"></div></div>
        <img src="assets/img/ui-payroll.svg" alt="MazERP attendance tracking dashboard showing daily logs and leave applications" width="700" height="440">
      </div>
      <div class="alt-float top-right" style="animation-delay:0.4s;">
        <i class="fa-solid fa-clock" style="color:var(--purple);"></i>
        Shift-wise live tracking
      </div>
    </div>
  </div>
</section>

<!-- ========== ALT SECTION 2: Statutory Compliance (reverse) ========== -->
<section class="alt-section" id="compliance">
  <div class="container alt-grid reverse">
    <div class="alt-visual reveal-left">
      <div class="alt-screen">
        <div class="browser-bar"><div class="browser-dots"><span></span><span></span><span></span></div><div class="browser-url"></div></div>
        <img src="assets/img/ui-payroll.svg" alt="MazERP compliance dashboard displaying automated compliance filings" width="700" height="440">
      </div>
      <div class="alt-float bot-right" style="animation-delay:0.6s;">
        <i class="fa-solid fa-shield-halved" style="color:var(--purple);"></i>
        Zero compliance errors
      </div>
    </div>
    <div class="alt-content reveal-right">
      <?php if ($country === 'IN'): ?>
        <span class="label label-purple"><i class="fa-solid fa-shield-halved"></i> Indian Compliance</span>
        <h2>PF, ESI, &amp; Professional Tax Made Simple</h2>
        <p class="lead">Stay 100% compliant with Indian labor laws. MazERP automatically calculates EPF, EPS, ESI, TDS, and state-specific Professional Taxes based on the latest rules.</p>
        <div class="alt-feats">
          <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Automatic employee &amp; employer contribution calculations</div>
          <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Ready-to-upload PF ECR and ESI challan file generation</div>
          <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> State-specific Professional Tax (PT) slab rules</div>
          <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Automated TDS estimation and tax declaration manager</div>
          <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Form 16 generator and annual compliance pack</div>
        </div>
      <?php elseif ($country === 'US'): ?>
        <span class="label label-purple"><i class="fa-solid fa-shield-halved"></i> US Compliance</span>
        <h2>FICA, W-2, &amp; 1099 Made Simple</h2>
        <p class="lead">Stay 100% compliant with US labor laws. MazERP automatically calculates FICA withholdings, Federal &amp; State W-2/1099 compliance, and FUTA/SUTA taxes.</p>
        <div class="alt-feats">
          <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Automatic federal, state, and local tax calculations</div>
          <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Ready-to-file W-2 and 1099 document generation</div>
          <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Automated FICA withholding adjustments</div>
          <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Contractor pay management with IRS tax rules</div>
          <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Annual IRS compliance reporting packs</div>
        </div>
      <?php else: ?>
        <span class="label label-purple"><i class="fa-solid fa-shield-halved"></i> UAE Compliance</span>
        <h2>WPS &amp; Gratuity Made Simple</h2>
        <p class="lead">Stay 100% compliant with UAE labor laws. MazERP automatically generates Wage Protection System (WPS) files and calculates End-of-Service gratuity.</p>
        <div class="alt-feats">
          <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> FTA and Ministry of Human Resources (MOHRE) compliance</div>
          <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Standard SIF file generation for bank WPS direct uploads</div>
          <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> UAE labor law compliant gratuity &amp; end-of-service indemnity</div>
          <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Multi-currency allowance support (AED base)</div>
          <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Annual audit-ready WPS compliance pack</div>
        </div>
      <?php endif; ?>
      <a href="contact.php" class="btn btn-primary" style="background:var(--purple);border-color:var(--purple);">See Compliance Demo</a>
    </div>
  </div>
</section>

<!-- ========== ALT SECTION 3: Self-Service Portal ========== -->
<section class="alt-section bg-subtle" id="selfservice">
  <div class="container alt-grid">
    <div class="alt-content reveal-left">
      <span class="label label-purple"><i class="fa-solid fa-users-gear"></i> Self-Service Portal</span>
      <h2>Employee Self-Service &amp; Payslips</h2>
      <p class="lead">Empower your staff. Employees get a dedicated web portal and mobile view to manage their professional details, submit leaves, and download payslips directly.</p>
      <div class="alt-feats">
        <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Instant digitally signed PDF payslip downloads</div>
        <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Submit leave requests and track approvals online</div>
        <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Upload investment declarations for TDS benefits</div>
        <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> View shift calendars, announcements, and directories</div>
        <div class="alt-feat purple"><div class="af-icon"><i class="fa-solid fa-check"></i></div> Secure login with role-based dashboard views</div>
      </div>
      <a href="contact.php" class="btn btn-primary" style="background:var(--purple);border-color:var(--purple);">See Portal Demo</a>
    </div>
    <div class="alt-visual reveal-right">
      <div class="alt-screen">
        <div class="browser-bar"><div class="browser-dots"><span></span><span></span><span></span></div><div class="browser-url"></div></div>
        <img src="assets/img/ui-payroll.svg" alt="MazERP employee self-service login and dashboard layout" width="700" height="440">
      </div>
      <div class="alt-float top-right" style="animation-delay:0.5s;">
        <i class="fa-solid fa-paper-plane" style="color:var(--purple);"></i>
        Mobile-first self service
      </div>
    </div>
  </div>
</section>

<!-- ========== FEATURES GRID ========== -->
<section>
  <div class="container">
    <div class="section-head reveal">
      <span class="label label-purple"><i class="fa-solid fa-grid-2"></i> Full Feature Set</span>
      <h2>Everything a modern payroll system should do</h2>
      <p>Six core Payroll capabilities that connect directly with your billing, inventory, and accounting data.</p>
    </div>
    <div class="feats-grid">
      <div class="feat-card reveal">
        <div class="feat-icon purple"><i class="fa-solid fa-indian-rupee-sign"></i></div>
        <h3>Salary structures</h3>
        <p>Define flexible structures with custom basic, HRA, DA, travel, and special allowances and deductions.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon purple"><i class="fa-solid fa-clock"></i></div>
        <h3>Attendance &amp; Leave</h3>
        <p>Biometrics, mobile geofencing, or web logs update leaves and calculations instantly to your payroll flow.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon purple"><i class="fa-solid fa-file-invoice"></i></div>
        <h3>PF &amp; ESI compliance</h3>
        <p>100% compliant EPF, ESI, PT, and TDS calculations and ready ECR files generated with one click.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon purple"><i class="fa-solid fa-wallet"></i></div>
        <h3>Direct bank transfers</h3>
        <p>Generate bulk transfer files for all major Indian banks or integrate directly with corporate bank APIs.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon purple"><i class="fa-solid fa-users-viewfinder"></i></div>
        <h3>Employee portal</h3>
        <p>Let staff manage leaves, download payslips, view calendars, and update compliance declarations online.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon purple"><i class="fa-solid fa-chart-pie"></i></div>
        <h3>Payroll analytics</h3>
        <p>Analyze employee cost trends, department budgets, tax liabilities, and shift schedules on live dashboards.</p>
      </div>
    </div>
  </div>
</section>

<!-- ========== STATS ========== -->
<section class="bg-subtle">
  <div class="container">
    <div class="section-head reveal">
      <span class="label label-purple"><i class="fa-solid fa-chart-bar"></i> Impact</span>
      <h2>Numbers from real MazERP Payroll users</h2>
      <p>Measured within the first six months of using MazERP Payroll.</p>
    </div>
    <div class="stats-grid">
      <div class="stat-card purple reveal">
        <div class="stat-num">50,000+</div>
        <div>Employees paid monthly via MazERP Payroll</div>
      </div>
      <div class="stat-card purple reveal">
        <div class="stat-num">80%</div>
        <div>Average reduction in salary processing time</div>
      </div>
      <div class="stat-card purple reveal">
        <div class="stat-num">100%</div>
        <div>PF, ESI, &amp; state tax compliance filing rate</div>
      </div>
      <div class="stat-card purple reveal">
        <div class="stat-num">4.9/5</div>
        <div>Average employee satisfaction rating</div>
      </div>
    </div>
  </div>
</section>

<!-- ========== FAQ ========== -->
<section class="bg-subtle">
  <div class="container">
    <div class="section-head reveal">
      <span class="label label-purple"><i class="fa-solid fa-circle-question"></i> FAQ</span>
      <h2>Payroll questions, answered</h2>
      <p>Straight answers about MazERP Payroll. Our customer success team responds within one business hour.</p>
    </div>
    <div class="faq-wrap reveal">
      <div class="faq-item">
        <button class="faq-btn">Does MazERP Payroll handle country-specific compliance and labor laws? <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span></button>
        <div class="faq-answer"><p>Yes. Region-specific rules like Professional Tax slabs (India), FICA regulations (USA), or MOHRE WPS and end-of-service gratuity calculation slabs (Dubai/UAE) are automatically updated in our cloud. The system applies the correct slabs based on the employee's work location.</p></div>
      </div>
      <div class="faq-item">
        <button class="faq-btn">How does direct bank transfer work? <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span></button>
        <div class="faq-answer"><p>At the end of a payroll run, MazERP generates a standardized bank file (such as direct SIF format for UAE WPS, or HDFC/SBI bank formats for India, or NACHA direct deposit files for US banks) containing employee account numbers and payout amounts. You can upload this directly into your corporate banking portal to execute bulk transfers safely. Direct API-based payouts are also supported for partner banks.</p></div>
      </div>
      <div class="faq-item">
        <button class="faq-btn">Can we integrate biometric attendance systems? <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span></button>
        <div class="faq-answer"><p>Yes. MazERP provides a lightweight synchronization tool and cloud APIs that connect directly with ZKTeco and other popular biometric attendance machines. Swipe-ins and swipe-outs are synchronized in real-time, calculating leaves and attendance penalties automatically.</p></div>
      </div>
      <div class="faq-item">
        <button class="faq-btn">Can I import my existing employee directory? <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span></button>
        <div class="faq-answer"><p>Absolutely. You can bulk-import employee details, salary structures, bank accounts, and past tax records from Excel or CSV files. Our onboarding team helps set up your system at no extra charge, completing migration in under an hour.</p></div>
      </div>
      <div class="faq-item">
        <button class="faq-btn">How secure is employee salary and bank data? <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span></button>
        <div class="faq-answer"><p>We treat payroll security with critical care. All employee files, bank details, and salary histories are encrypted using AES-256 both in transit and at rest. Strict role-based permissions ensure that only authorized accounts can process salaries or view financial structures.</p></div>
      </div>
    </div>
  </div>
</section>

<!-- ========== CTA ========== -->
<section class="product-hero" style="padding:80px 0;background: linear-gradient(135deg, #1e1b4b, #311042);">
  <div class="container reveal" style="text-align:center;max-width:680px;">
    <span class="label label-white"><i class="fa-solid fa-wallet"></i> Get Started</span>
    <h2 style="color:#fff;font-size:clamp(1.75rem,4vw,2.5rem);margin:16px 0;">Simplify your business payroll today</h2>
    <p style="color:rgba(255,255,255,0.8);margin-bottom:32px;">7-day free trial. No credit card required. Full Payroll access from day one alongside billing, inventory, and accounting.</p>
    <div class="ph-ctas" style="justify-content:center;">
      <a href="https://app.mazerp.com/auth/register" class="btn btn-primary btn-lg" style="background:var(--purple);border-color:var(--purple);"><i class="fa-solid fa-rocket"></i> Start Free Trial</a>
      <a href="contact.php" class="btn btn-outline-white"><i class="fa-solid fa-calendar-check"></i> Book Demo</a>
    </div>
  </div>
</section>

<!-- ========== EXPLORE OTHER MODULES ========== -->
<section class="bg-subtle">
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-grid-2"></i> Explore Other Modules</span>
      <h2>Payroll is just one piece</h2>
      <p>MazERP also includes full ERP and Accounting modules that share the same data as your payroll.</p>
    </div>
    <div class="products-grid" style="grid-template-columns:repeat(auto-fit,minmax(280px,1fr));max-width:720px;margin:0 auto;">
      <div class="product-card reveal">
        <div class="pc-icon-blue"><i class="fa-solid fa-cubes"></i></div>
        <h3>ERP</h3>
        <p>Real-time inventory, GST billing, multi-store control, and purchasing — all connected to your payroll.</p>
        <a href="erp.php" class="pc-link">Explore ERP <i class="fa-solid fa-arrow-right"></i></a>
      </div>
      <div class="product-card reveal">
        <div class="pc-icon-amber"><i class="fa-solid fa-calculator"></i></div>
        <h3>Accounting</h3>
        <p>Automatic GST compliance, live P&amp;L, cash flow tracking, and bank reconciliation integrated with every sale.</p>
        <a href="accounting.php" class="pc-link">Explore Accounting <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
