<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<!-- PAGE HERO -->
<section class="page-hero">
  <div class="container reveal">
    <span class="label"><i class="fa-solid fa-grid-2"></i> Features</span>
    <h1>Powerful Features to Simplify Your Business Operations</h1>
    <p>Every tool your business needs — GST billing, inventory, payroll management, accounting, CRM, analytics, and multi-store operations — in one connected platform that works the way you do.</p>
    <a href="https://app.mazerp.com/auth/register" class="btn btn-white btn-lg">Start Free Trial</a>
  </div>
</section>

<!-- INVENTORY -->
<section id="inventory">
  <div class="container">
    <div class="sol-block reveal">
      <div class="sol-layout">
        <div class="sol-info">
          <span class="label"><i class="fa-solid fa-boxes-stacked"></i> Inventory Management</span>
          <h2>Track stock in real time and never run out</h2>
          <p class="lead">Track stock levels across every location, manage products with full details, and get automatic alerts before you run low. Barcode scanning speeds up every transaction.</p>
          <div class="sol-feats">
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Add products with GST rates</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Generate barcodes instantly</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Low stock alerts</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Multi-warehouse support</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Batch and expiry tracking</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Stock transfer between stores</div>
          </div>
          <a href="contact.php" class="btn btn-primary">See it in action</a>
        </div>
        <div class="sol-visual">
          <div class="sol-screen">
            <div class="browser-bar"><div class="browser-dots"><span></span><span></span><span></span></div><div class="browser-url"></div></div>
            <img src="assets/img/ui-inventory.svg"
                 alt="MazERP inventory management showing products, stock alerts, and barcode generation"
                 width="700" height="440">
          </div>
          <div class="sol-float top-right">
            <i class="fa-solid fa-barcode" style="color:var(--blue-light);"></i>
            Barcode-ready inventory
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- BILLING -->
<section id="billing" class="bg-subtle">
  <div class="container">
    <div class="sol-block sol-block:nth-child(even) reveal">
      <div class="sol-layout" style="direction:rtl;">
        <div class="sol-info" style="direction:ltr;">
          <span class="label"><i class="fa-solid fa-file-invoice-dollar"></i> <?php echo htmlspecialchars($loc['tax_name']); ?> Billing &amp; Invoicing</span>
          <h2>Create <?php echo htmlspecialchars($loc['tax_name']); ?> invoices in seconds, not minutes</h2>
          <p class="lead">Professional, <?php echo htmlspecialchars($loc['tax_name']); ?>-compliant invoices with automatic tax calculation. Quick billing mode lets you serve customers faster. Track payments and send reminders automatically.</p>
          <div class="sol-feats">
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> <?php echo htmlspecialchars($loc['solutions_tax']); ?></div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Quick billing mode</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Payment tracking</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Returns and adjustments</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Custom invoice formats</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> <?php echo htmlspecialchars($loc['tax_desc']); ?></div>
          </div>
          <a href="contact.php" class="btn btn-primary">See it in action</a>
        </div>
        <div class="sol-visual" style="direction:ltr;">
          <div class="sol-screen">
            <div class="browser-bar"><div class="browser-dots"><span></span><span></span><span></span></div><div class="browser-url"></div></div>
            <img src="assets/img/ui-billing.svg"
                 alt="MazERP billing and invoicing with tax calculation and payment tracking"
                 width="700" height="440">
          </div>
          <div class="sol-float bot-right">
            <i class="fa-solid fa-percent" style="color:var(--emerald);"></i>
            Auto <?php echo htmlspecialchars($loc['tax_name']); ?> calculation
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- REPORTS -->
<section id="reports">
  <div class="container">
    <div class="sol-block reveal">
      <div class="sol-layout">
        <div class="sol-info">
          <span class="label"><i class="fa-solid fa-chart-line"></i> Reports &amp; Analytics</span>
          <h2>Make decisions with real-time data, not guesswork</h2>
          <p class="lead">Sales reports, GST summaries, P&amp;L statements, inventory analytics, and business performance dashboards that update the moment data changes. Export to Excel or PDF whenever you need.</p>
          <div class="sol-feats">
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Sales and revenue reports</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> GST return summaries</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Inventory movement reports</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Profit and loss analytics</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Business performance dashboard</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Export to Excel and PDF</div>
          </div>
          <a href="contact.php" class="btn btn-primary">See it in action</a>
        </div>
        <div class="sol-visual">
          <div class="sol-screen">
            <div class="browser-bar"><div class="browser-dots"><span></span><span></span><span></span></div><div class="browser-url"></div></div>
            <img src="assets/img/ui-reports.svg"
                 alt="MazERP reports showing sales charts, GST summaries, and profit analytics"
                 width="700" height="440">
          </div>
          <div class="sol-float top-right">
            <i class="fa-solid fa-arrow-trend-up" style="color:var(--emerald);"></i>
            Revenue up 28% this quarter
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CRM -->
<section id="crm" class="bg-subtle">
  <div class="container">
    <div class="sol-block reveal">
      <div class="sol-layout" style="direction:rtl;">
        <div class="sol-info" style="direction:ltr;">
          <span class="label"><i class="fa-solid fa-users"></i> Customer Management</span>
          <h2>Build relationships that keep customers coming back</h2>
          <p class="lead">Detailed customer profiles with full purchase history, credit tracking, and outstanding management. Know who your best customers are and serve them better every time.</p>
          <div class="sol-feats">
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Customer profiles and history</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Full purchase history</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Credit and outstanding tracking</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Customer-wise sales reports</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Loyalty and rewards tracking</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Segment and filter customers</div>
          </div>
          <a href="contact.php" class="btn btn-primary">See it in action</a>
        </div>
        <div class="sol-visual" style="direction:ltr;">
          <div class="sol-screen">
            <div class="browser-bar"><div class="browser-dots"><span></span><span></span><span></span></div><div class="browser-url"></div></div>
            <img src="assets/img/ui-crm.svg"
                 alt="MazERP customer management dashboard with purchase history and credit tracking"
                 width="700" height="440">
          </div>
          <div class="sol-float bot-right">
            <i class="fa-solid fa-users" style="color:var(--blue-light);"></i>
            10,000+ customer profiles
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PAYROLL -->
<section id="payroll">
  <div class="container">
    <div class="sol-block reveal">
      <div class="sol-layout">
        <div class="sol-info">
          <span class="label"><i class="fa-solid fa-wallet"></i> <?php echo htmlspecialchars($loc['payroll_title']); ?></span>
          <h2>Automate salary, attendance, and compliance</h2>
          <p class="lead">Manage your team's salaries, track attendance, and ensure complete <?php echo htmlspecialchars($loc['payroll_desc']); ?> seamlessly in one consolidated platform. Empower employees with self-service payslip downloads.</p>
          <div class="sol-feats">
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> <?php echo htmlspecialchars($loc['payroll_feat1']); ?></div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> <?php echo htmlspecialchars($loc['payroll_feat2']); ?></div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> <?php echo htmlspecialchars($loc['payroll_feat3']); ?></div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> <?php echo htmlspecialchars($loc['payroll_feat4']); ?></div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> <?php echo htmlspecialchars($loc['payroll_feat5']); ?></div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> <?php echo htmlspecialchars($loc['payroll_feat6']); ?></div>
          </div>
          <a href="contact.php" class="btn btn-primary">See it in action</a>
        </div>
        <div class="sol-visual">
          <div class="sol-screen">
            <div class="browser-bar"><div class="browser-dots"><span></span><span></span><span></span></div><div class="browser-url"></div></div>
            <img src="assets/img/ui-payroll.svg"
                 alt="MazERP payroll management dashboard showing salary breakdown, attendance tracking, and compliance filings"
                 width="700" height="440">
          </div>
          <div class="sol-float top-right">
            <i class="fa-solid fa-wallet" style="color:var(--purple);"></i>
            Compliant salary payouts
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- MULTI-STORE -->
<section id="multistore" class="bg-subtle">
  <div class="container">
    <div class="sol-block reveal">
      <div class="sol-layout">
        <div class="sol-info">
          <span class="label"><i class="fa-solid fa-store"></i> Multi-Store Support</span>
          <h2>One account for every branch, every location</h2>
          <p class="lead">Run two stores or twenty from a single MazERP account. Shared inventory, unified customer data, centralized pricing, and consolidated reporting across all your outlets.</p>
          <div class="sol-feats">
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Centralized management</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Real-time stock sync across branches</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Store-wise reports</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Inter-store stock transfers</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Role-based staff access</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Consolidated P&amp;L view</div>
          </div>
          <a href="contact.php" class="btn btn-primary">See it in action</a>
        </div>
        <div class="sol-visual">
          <div class="sol-screen">
            <div class="browser-bar"><div class="browser-dots"><span></span><span></span><span></span></div><div class="browser-url"></div></div>
            <img src="assets/img/ui-dashboard.svg"
                 alt="MazERP multi-store management showing all branch locations from one dashboard"
                 width="800" height="500">
          </div>
          <div class="sol-float top-right">
            <i class="fa-solid fa-store" style="color:var(--amber);"></i>
            All stores, one view
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FEATURES OVERVIEW GRID -->
<section>
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-star"></i> All Features</span>
      <h2>Everything you need, nothing you don't</h2>
      <p>MazERP brings together the tools every growing business actually needs into one clean, connected platform.</p>
    </div>
    <div class="feats-grid">
      <div class="feat-card reveal">
        <div class="feat-icon fi-blue">
          <i class="fa-solid fa-file-invoice-dollar"></i>
        </div>
        <h3><?php echo htmlspecialchars($loc['tax_name']); ?> Billing</h3>
        <p>Automatic tax calculation on every invoice. Stay compliant with every transaction.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon fi-green">
          <i class="fa-solid fa-boxes-stacked"></i>
        </div>
        <h3>Inventory</h3>
        <p>Real-time stock tracking with barcode support, low-stock alerts, and multi-location visibility.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon fi-amber">
          <i class="fa-solid fa-chart-bar"></i>
        </div>
        <h3>Reports</h3>
        <p>Sales, <?php echo htmlspecialchars($loc['tax_name']); ?>, P&amp;L, and inventory reports that update live. Export anytime in Excel or PDF.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon fi-sky">
          <i class="fa-solid fa-users"></i>
        </div>
        <h3>CRM</h3>
        <p>Customer profiles, purchase history, credit limits, and outstanding tracking in one place.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon fi-pink">
          <i class="fa-solid fa-store"></i>
        </div>
        <h3>Multi-Store</h3>
        <p>Manage every branch from one account. Consolidated reporting, shared inventory, unified pricing.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon fi-grad">
          <i class="fa-solid fa-mobile-screen-button"></i>
        </div>
        <h3>Mobile ERP</h3>
        <p>Access sales, stock levels, and reports from your phone — anytime, anywhere, on any device.</p>
      </div>
    </div>
  </div>
</section>

<!-- STATS ROW -->
<section>
  <div class="container">
    <div class="stats-grid">
      <div class="stat-card reveal">
        <div class="stat-num c-blue" data-count="10000" data-suffix="+">0</div>
        <div>Active Businesses</div>
      </div>
      <div class="stat-card reveal">
        <div class="stat-num c-green" data-count="3" data-suffix="M+">0</div>
        <div>Invoices Processed</div>
      </div>
      <div class="stat-card reveal">
        <div class="stat-num c-amber" data-count="99.9" data-suffix="%">0</div>
        <div>Uptime Guarantee</div>
      </div>
      <div class="stat-card reveal">
        <div class="stat-num c-cyan" data-count="4.8">0</div>
        <div>Average Rating</div>
      </div>
    </div>
  </div>
</section>

<!-- FEATURES FAQ -->
<section class="bg-subtle">
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-circle-question"></i> FAQ</span>
      <h2>Common questions about MazERP features</h2>
    </div>
    <div class="faq-wrap reveal">

      <div class="faq-item">
        <button class="faq-btn" aria-expanded="false">
          Does MazERP handle all GST types — CGST, SGST, and IGST?
          <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer">
          <p>Yes. MazERP automatically applies the correct tax split based on the billing state. For intra-state sales it applies CGST and SGST; for inter-state sales it applies IGST. You set the HSN code and GST rate once per product and the system handles everything from there.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-btn" aria-expanded="false">
          Can I track inventory across multiple branches from one account?
          <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer">
          <p>Yes. The multi-store module lets you manage any number of branches under one login. You can view consolidated stock, transfer inventory between stores, set branch-specific pricing, and generate reports per store or across all stores combined.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-btn" aria-expanded="false">
          What kinds of reports does MazERP generate?
          <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer">
          <p>MazERP covers sales reports, GST summary reports (GSTR-1 and GSTR-3B ready), profit and loss statements, inventory movement reports, customer-wise sales, product-wise profitability, and daily/monthly/yearly business overviews. All reports can be exported to Excel or PDF.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-btn" aria-expanded="false">
          Does MazERP work on mobile devices?
          <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer">
          <p>Yes. MazERP is fully responsive and works on smartphones and tablets. You can view sales data, check stock levels, approve invoices, and pull reports from any device with a browser. A dedicated mobile app is also available for Android.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-btn" aria-expanded="false">
          Can my staff have different access levels?
          <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer">
          <p>Yes. MazERP has role-based access control. You can give a billing staff member access only to the POS screen, restrict your inventory manager to stock operations, and keep financial reports visible only to managers and owners. All roles are configurable from the admin panel.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
