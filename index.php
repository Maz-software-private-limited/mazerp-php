<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<!-- ========================================================
     SECTION 1 — HERO
     ======================================================== -->
<section class="hero">
  <div class="container">
    <div class="hero-content-wrap">

      <!-- Left: Text content -->
      <div class="hero-text reveal-left">

        <!-- Pill badge -->
        <div class="hero-pill">
          <span class="pill-badge">NEW</span>
          <span>ERP + CRM + Accounting in One Platform</span>
        </div>

        <h1>Run Your Entire Business <span class="grad-text">From One Dashboard</span></h1>

        <p class="hero-sub">Simplify your business operations with smart billing, inventory tracking, GST management, and real-time reports - all in one powerful software designed for retailers, wholesalers, and service providers.</p>

        <div class="hero-ctas">
          <a href="https://app.mazerp.com/auth/register" class="btn btn-white btn-lg">
            <i class="fa-solid fa-rocket"></i> Start Free Trial
          </a>
          <a href="contact.php" class="btn btn-outline-white btn-lg">
            <i class="fa-solid fa-calendar-check"></i> Book a Demo
          </a>
        </div>
      </div><!-- /hero-text -->

      <!-- Right: Device mockup -->
      <div class="hero-visual reveal-right">
        <div class="devices-container">
          <!-- Laptop -->
          <div class="laptop-device">
            <div class="laptop-lid">
              <div class="laptop-cam"></div>
              <div class="laptop-screen-area">
                <img src="assets/img/ui-dashboard.svg" alt="MazERP dashboard" width="800" height="500">
              </div>
            </div>
            <div class="laptop-hinge"></div>
            <div class="laptop-base"></div>
          </div>

          <!-- Phone -->
          <div class="phone-device">
            <div class="phone-body">
              <div class="phone-island"></div>
              <div class="phone-screen-area">
                <img src="assets/img/ui-mobile.svg" alt="MazERP mobile billing" width="360" height="760">
              </div>
              <div class="phone-home-bar"></div>
            </div>
          </div>

          <!-- Floating badge cards -->
          <div class="device-badge top-left">
            <div class="db-icon green"><i class="fa-solid fa-boxes-stacked"></i></div>
            <div class="db-info">
              <div class="db-label">Real-time inventory</div>
              <div class="db-value">1,240 SKUs</div>
            </div>
          </div>

          <div class="device-badge top-right">
            <div class="db-icon blue" style="font-size: 1.25rem; font-weight: 700; display: flex; align-items: center; justify-content: center; color: var(--blue);"><?php echo trim($loc['currency_symbol']); ?></div>
            <div class="db-info">
              <div class="db-label">This quarter</div>
              <div class="db-value">+28% Revenue</div>
            </div>
          </div>

          <div class="device-badge bottom-left">
            <div class="db-icon amber"><i class="fa-solid fa-file-invoice"></i></div>
            <div class="db-info">
              <div class="db-label">Auto-generated</div>
              <div class="db-value"><?php echo $loc['tax_name']; ?> Filed</div>
            </div>
          </div>

        </div><!-- /devices-container -->
      </div><!-- /hero-visual -->

    </div><!-- /hero-content-wrap -->
  </div><!-- /container -->
</section>





<!-- ========================================================
     SECTION 3 — PRODUCTS
     ======================================================== -->
<section class="bg-subtle" style="padding:var(--sp) 0;">
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-cubes"></i> Our Products</span>
      <h2>ERP + CRM + Accounting — All in One</h2>
      <p>Three powerful modules, one connected platform. Everything your business needs to operate, grow, and scale.</p>
    </div>

    <div class="products-grid">

      <!-- ERP -->
      <div class="product-card blue-card reveal">
        <div class="pc-icon blue"><i class="fa-solid fa-layer-group"></i></div>
        <div>
          <div class="pc-title">Enterprise Resource Planning</div>
          <div class="pc-desc">Manage every moving part of your business — from purchase orders to final sale — in one connected system built for Indian businesses.</div>
        </div>
        <ul class="pc-features">
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> Inventory management</li>
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> GST billing &amp; invoicing</li>
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> Multi-store support</li>
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> Purchase orders</li>
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> Barcode scanning</li>
        </ul>
        <a href="features.php#inventory" class="pc-link">Explore ERP <i class="fa-solid fa-arrow-right"></i></a>
      </div>

      <!-- CRM -->
      <div class="product-card green-card reveal">
        <div class="pc-icon green"><i class="fa-solid fa-users"></i></div>
        <div>
          <div class="pc-title">Customer Relationship Management</div>
          <div class="pc-desc">Know your customers deeply. Track every interaction, manage your pipeline, and retain more buyers with smart, automated follow-ups.</div>
        </div>
        <ul class="pc-features">
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> Customer profiles &amp; history</li>
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> Lead tracking</li>
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> Sales pipeline</li>
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> Payment reminders</li>
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> Loyalty programs</li>
        </ul>
        <a href="features.php#crm" class="pc-link">Explore CRM <i class="fa-solid fa-arrow-right"></i></a>
      </div>

      <!-- Accounting -->
      <div class="product-card amber-card reveal">
        <div class="pc-icon amber"><i class="fa-solid fa-calculator"></i></div>
        <div>
          <div class="pc-title">Accounting &amp; Finance</div>
          <div class="pc-desc">Keep your books clean and your taxes sorted. Real-time financial reports, GST return summaries, and cash flow — all automated.</div>
        </div>
        <ul class="pc-features">
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> Profit &amp; Loss reports</li>
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> GST return reports</li>
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> Expense tracking</li>
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> Bank reconciliation</li>
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> Cash flow analytics</li>
        </ul>
        <a href="features.php#reports" class="pc-link">Explore Accounting <i class="fa-solid fa-arrow-right"></i></a>
      </div>

    </div><!-- /products-grid -->
  </div>
</section>


<!-- ========================================================
     SECTION 4 — HOW IT WORKS
     ======================================================== -->
<section style="padding:var(--sp) 0;">
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-bolt"></i> How It Works</span>
      <h2>Up and running in under an hour</h2>
      <p>No IT team needed. No complex setup. Just sign up and start running your business smarter from day one.</p>
    </div>

    <div class="steps-grid">

      <div class="step-card reveal">
        <div class="step-num">01</div>
        <h3>Sign Up Free</h3>
        <p>Create your account in minutes. Add your business details, GSTIN, and invite your team members to get started.</p>
      </div>

      <div class="step-card reveal">
        <div class="step-num">02</div>
        <h3>Add Your Products</h3>
        <p>Import your inventory, set GST rates for each product, configure pricing tiers, and define stock levels and reorder points.</p>
      </div>

      <div class="step-card reveal">
        <div class="step-num">03</div>
        <h3>Start Billing</h3>
        <p>Create GST invoices, track inventory automatically with every sale, and generate real-time reports — all from a single screen.</p>
      </div>

    </div><!-- /steps-grid -->
  </div>
</section>


<!-- ========================================================
     SECTION 5 — ALTERNATING FEATURES
     ======================================================== -->

<!-- Alt 1: Smart Inventory -->
<section class="alt-section">
  <div class="container">
    <div class="alt-grid">

      <div class="alt-content reveal-left">
        <span class="label label-green"><i class="fa-solid fa-boxes-stacked"></i> Smart Inventory</span>
        <h2>Never run out of stock again</h2>
        <p>MazERP gives you a live view of every product across every location. Set reorder alerts, scan barcodes, manage multiple warehouses, and track expiry dates — all in one place.</p>

        <div class="alt-feats">
          <div class="alt-feat">
            <div class="af-icon"><i class="fa-solid fa-barcode"></i></div>
            <div class="af-text">
              <h5>Barcode scanning</h5>
              <p>Speed up billing and stock-taking with built-in barcode generation and scanning on any device.</p>
            </div>
          </div>
          <div class="alt-feat green">
            <div class="af-icon"><i class="fa-solid fa-bell"></i></div>
            <div class="af-text">
              <h5>Low stock alerts</h5>
              <p>Get automatic notifications before you run out so you can reorder before a sale is lost.</p>
            </div>
          </div>
          <div class="alt-feat">
            <div class="af-icon"><i class="fa-solid fa-warehouse"></i></div>
            <div class="af-text">
              <h5>Multi-warehouse support</h5>
              <p>Track stock across multiple stores or warehouses with real-time transfers and consolidated reports.</p>
            </div>
          </div>
          <div class="alt-feat amber">
            <div class="af-icon"><i class="fa-solid fa-calendar-xmark"></i></div>
            <div class="af-text">
              <h5>Expiry tracking</h5>
              <p>Automatically flag products nearing expiry so you can move them before they become a loss.</p>
            </div>
          </div>
        </div>

        <a href="features.php#inventory" class="btn btn-primary">See Inventory Features</a>
      </div>

      <div class="alt-visual reveal-right">
        <div class="alt-screen">
          <div class="browser-bar">
            <div class="browser-dots">
              <span></span><span></span><span></span>
            </div>
            <div class="browser-url"></div>
          </div>
          <img src="assets/img/ui-inventory.svg" alt="MazERP inventory management screen" width="700" height="440">
        </div>
        <div class="alt-float top-right" style="animation-delay:0.5s;">
          <i class="fa-solid fa-check-circle" style="color:var(--emerald);"></i>
          Stock synced across all stores
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Alt 2: GST Billing (reversed) -->
<section class="alt-section">
  <div class="container">
    <div class="alt-grid reverse">

      <div class="alt-content reveal-right">
        <span class="label"><i class="fa-solid fa-file-invoice-dollar"></i> <?php echo htmlspecialchars($loc['tax_name']); ?> Billing</span>
        <h2>Create <?php echo htmlspecialchars($loc['tax_name']); ?> invoices in seconds</h2>
        <p>Stop wasting time on tax calculations. MazERP auto-calculates tax based on transaction details — and generates compliant invoices with a single click.</p>

        <div class="alt-feats">
          <div class="alt-feat">
            <div class="af-icon"><i class="fa-solid fa-percent"></i></div>
            <div class="af-text">
              <h5><?php echo htmlspecialchars($loc['solutions_tax']); ?></h5>
              <p><?php echo htmlspecialchars($loc['solutions_tax_desc']); ?>. Zero manual effort, zero errors.</p>
            </div>
          </div>
          <div class="alt-feat">
            <div class="af-icon"><i class="fa-solid fa-file-lines"></i></div>
            <div class="af-text">
              <h5><?php echo htmlspecialchars($loc['tax_name']); ?> compliance</h5>
              <p><?php echo htmlspecialchars($loc['tax_desc']); ?> automatically from the billing screen.</p>
            </div>
          </div>
          <div class="alt-feat green">
            <div class="af-icon"><i class="fa-solid fa-money-bill-wave"></i></div>
            <div class="af-text">
              <h5>Payment tracking</h5>
              <p>Track paid, partial, and overdue invoices. Send automatic WhatsApp or SMS payment reminders.</p>
            </div>
          </div>
          <div class="alt-feat amber">
            <div class="af-icon"><i class="fa-solid fa-bolt"></i></div>
            <div class="af-text">
              <h5>Quick billing mode</h5>
              <p>Serve customers faster with a streamlined POS-style billing screen designed for high-volume shops.</p>
            </div>
          </div>
        </div>

        <a href="features.php#billing" class="btn btn-primary">See Billing Features</a>
      </div>

      <div class="alt-visual reveal-left">
        <div class="alt-screen">
          <div class="browser-bar">
            <div class="browser-dots">
              <span></span><span></span><span></span>
            </div>
            <div class="browser-url"></div>
          </div>
          <img src="assets/img/ui-billing.svg" alt="MazERP billing screen" width="700" height="440">
        </div>
        <div class="alt-float bot-left" style="animation-delay:1s;">
          <i class="fa-solid fa-file-invoice" style="color:var(--blue);"></i>
          <?php echo htmlspecialchars($loc['tax_name']); ?> invoice in under 10 seconds
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Alt 3: Real-time Reports -->
<section class="alt-section">
  <div class="container">
    <div class="alt-grid">

      <div class="alt-content reveal-left">
        <span class="label label-amber"><i class="fa-solid fa-chart-line"></i> Real-time Reports</span>
        <h2>See your business clearly, right now</h2>
        <p>Every sale, every stock movement, every expense — instantly reflected in your dashboards. Make decisions with today's numbers, not last month's spreadsheets.</p>

        <div class="alt-feats">
          <div class="alt-feat">
            <div class="af-icon"><i class="fa-solid fa-chart-pie"></i></div>
            <div class="af-text">
              <h5>P&amp;L statements</h5>
              <p>See your gross profit, net profit, and operating costs updated live as transactions come in.</p>
            </div>
          </div>
          <div class="alt-feat green">
            <div class="af-icon"><i class="fa-solid fa-receipt"></i></div>
            <div class="af-text">
              <h5><?php echo htmlspecialchars($loc['tax_name']); ?> summaries</h5>
              <p>Monthly <?php echo htmlspecialchars($loc['tax_name']); ?> reports broken down by tax components — ready for tax filing or export.</p>
            </div>
          </div>
          <div class="alt-feat">
            <div class="af-icon"><i class="fa-solid fa-water"></i></div>
            <div class="af-text">
              <h5>Cash flow</h5>
              <p>Track money in and out in real time. Know your exact cash position before making any purchase decisions.</p>
            </div>
          </div>
          <div class="alt-feat amber">
            <div class="af-icon"><i class="fa-solid fa-file-export"></i></div>
            <div class="af-text">
              <h5>Export to Excel &amp; PDF</h5>
              <p>Share any report with your accountant or investor in one click. Format it in Excel or a clean PDF.</p>
            </div>
          </div>
        </div>

        <a href="features.php#reports" class="btn btn-primary">See Reporting Features</a>
      </div>

      <div class="alt-visual reveal-right">
        <div class="alt-screen">
          <div class="browser-bar">
            <div class="browser-dots">
              <span></span><span></span><span></span>
            </div>
            <div class="browser-url"></div>
          </div>
          <img src="assets/img/ui-reports.svg" alt="MazERP reports and analytics dashboard" width="700" height="440">
        </div>
        <div class="alt-float top-right" style="animation-delay:0.75s;">
          <i class="fa-solid fa-arrow-trend-up" style="color:var(--emerald);"></i>
          Revenue up 28% this quarter
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ========================================================
     SECTION 6 — PRODUCTS OVERVIEW
     ======================================================== -->
<section class="bg-subtle" style="padding:var(--sp) 0;">
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-cubes"></i> Our Core Suite</span>
      <h2>Four Powerful Modules. One Connected Platform.</h2>
      <p>Turn on what you need today, grow with confidence. Every product is built for premium performance and seamless integration.</p>
    </div>

    <div class="products-grid">

      <!-- ERP -->
      <div class="product-card blue-card reveal">
        <div class="pc-icon blue"><i class="fa-solid fa-layer-group"></i></div>
        <div>
          <div class="pc-title">Enterprise Resource Planning</div>
          <div class="pc-desc">Manage every moving part of your business — purchase orders, billing, and inventory — in one connected dashboard.</div>
        </div>
        <ul class="pc-features">
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> Real-time inventory tracking</li>
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> Barcode scanning &amp; printing</li>
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> Multi-store &amp; warehouse control</li>
        </ul>
        <a href="erp.php" class="pc-link">Explore ERP <i class="fa-solid fa-arrow-right"></i></a>
      </div>

      <!-- CRM -->
      <div class="product-card green-card reveal">
        <div class="pc-icon green"><i class="fa-solid fa-users"></i></div>
        <div>
          <div class="pc-title">Customer Relationship</div>
          <div class="pc-desc">Retain customers and drive sales. Smart lead tracking, lead pipeline, and points-based loyalty programs.</div>
        </div>
        <ul class="pc-features">
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> Automated loyalty points</li>
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> Customer profile &amp; credit ledger</li>
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> Pipeline &amp; lead tracking</li>
        </ul>
        <a href="crm.php" class="pc-link">Explore CRM <i class="fa-solid fa-arrow-right"></i></a>
      </div>

      <!-- Accounting -->
      <div class="product-card amber-card reveal">
        <div class="pc-icon amber"><i class="fa-solid fa-calculator"></i></div>
        <div>
          <div class="pc-title">Accounting &amp; Finance</div>
          <div class="pc-desc">Sort out your taxes and finances. Automated P&amp;L reports, cash flow, bank sync, and direct compliance filing.</div>
        </div>
        <ul class="pc-features">
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> <?php echo htmlspecialchars($loc['solutions_tax']); ?></li>
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> P&amp;L and <?php echo htmlspecialchars($loc['tax_name']); ?> return reports</li>
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> Live cash flow analytics</li>
        </ul>
        <a href="accounting.php" class="pc-link">Explore Accounting <i class="fa-solid fa-arrow-right"></i></a>
      </div>

      <!-- Payroll -->
      <div class="product-card purple-card reveal">
        <div class="pc-icon purple"><i class="fa-solid fa-wallet"></i></div>
        <div>
          <div class="pc-title"><?php echo htmlspecialchars($loc['payroll_title']); ?></div>
          <div class="pc-desc">Automate employee salary calculations, track attendance, and ensure seamless <?php echo htmlspecialchars($loc['payroll_desc']); ?>.</div>
        </div>
        <ul class="pc-features">
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> <?php echo htmlspecialchars($loc['payroll_feat1']); ?></li>
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> <?php echo htmlspecialchars($loc['payroll_feat3']); ?></li>
          <li><i class="fa-solid fa-check" style="color:var(--emerald);"></i> <?php echo htmlspecialchars($loc['payroll_feat5']); ?></li>
        </ul>
        <a href="payroll.php" class="pc-link">Explore Payroll <i class="fa-solid fa-arrow-right"></i></a>
      </div>

    </div><!-- /products-grid -->
  </div>
</section>


<!-- ========================================================
     SECTION 7 — DARK SHOWCASE
     ======================================================== -->
<section class="dark-showcase">
  <div class="container">
    <div class="section-head light reveal">
      <span class="label label-dark"><i class="fa-solid fa-desktop"></i> See It In Action</span>
      <h2>A look inside MazERP</h2>
      <p>Clean interfaces designed for speed. Every screen built for the people who actually use it every day.</p>
    </div>

    <div class="showcase-grid">

      <div class="sc-card reveal">
        <div class="sc-icon blue"><i class="fa-solid fa-boxes-stacked"></i></div>
        <img src="assets/img/ui-inventory.svg" alt="MazERP inventory dashboard" width="600" height="376">
        <h3>Inventory Dashboard</h3>
        <p>Track every SKU across warehouses. Add products, generate barcodes, and set alerts from one clean interface.</p>
      </div>

      <div class="sc-card reveal">
        <div class="sc-icon amber"><i class="fa-solid fa-chart-bar"></i></div>
        <img src="assets/img/ui-reports.svg" alt="MazERP reports and analytics" width="600" height="376">
        <h3>Reports &amp; Analytics</h3>
        <p>Real-time sales, GST, inventory, and financial reports. Drill down to any transaction in two clicks.</p>
      </div>

      <div class="sc-card reveal">
        <div class="sc-icon green"><i class="fa-solid fa-building"></i></div>
        <img src="assets/img/ui-crm.svg" alt="MazERP CRM pipeline" width="600" height="376">
        <h3>Industry Solutions</h3>
        <p>Pre-built workflows for retail, restaurants, pharmacies, supermarkets, and hardware stores.</p>
      </div>

    </div><!-- /showcase-grid -->
  </div>
</section>


<!-- ========================================================
     SECTION 8 — BENEFITS
     ======================================================== -->
<section style="padding:var(--sp) 0;">
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-circle-check"></i> Why MazERP</span>
      <h2>Smart Benefits for Your Business</h2>
      <p>MazERP delivers clear, measurable advantages that save you time, reduce errors, and keep your data safe.</p>
    </div>

    <div class="benefits-row">

      <div class="benefit-card reveal">
        <div class="b-icon blue"><i class="fa-solid fa-gauge-high"></i></div>
        <h3>Save hours every week</h3>
        <p>Automate billing, GST calculations, stock updates, and report generation. Focus on growing the business.</p>
      </div>

      <div class="benefit-card reveal">
        <div class="b-icon green"><i class="fa-solid fa-indian-rupee-sign"></i></div>
        <h3>Reduce costly errors</h3>
        <p>Automatic tax math eliminates GST mistakes. Stock tracking prevents over-ordering and shrinkage.</p>
      </div>

      <div class="benefit-card reveal">
        <div class="b-icon amber"><i class="fa-solid fa-eye"></i></div>
        <h3>See your business clearly</h3>
        <p>Real-time dashboards update the moment a sale happens. Make decisions with today's data, not last month's.</p>
      </div>

      <div class="benefit-card reveal">
        <div class="b-icon purple"><i class="fa-solid fa-shield-halved"></i></div>
        <h3>Data you can trust</h3>
        <p>Encrypted, cloud-backed, and GST-compliant. Your business data is always safe and always accessible.</p>
      </div>

    </div><!-- /benefits-row -->
  </div>
</section>


<!-- ========================================================
     SECTION 9 — INDUSTRIES
     ======================================================== -->
<section class="bg-subtle" style="padding:var(--sp) 0;">
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-building"></i> Industries</span>
      <h2>Built for the way your business actually works</h2>
      <p>Pre-configured workflows for your industry. No fighting with generic templates — MazERP fits right in.</p>
    </div>

    <div class="industries-grid">

      <a href="solutions.php#retail" class="industry-tile reveal">
        <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=500&h=375&fit=crop" alt="Retail store interior" width="500" height="375">
        <div class="ind-overlay">
          <i class="fa-solid fa-store"></i>
          <h3>Retail Stores</h3>
          <p>POS, stock, loyalty programs</p>
        </div>
      </a>

      <a href="solutions.php#restaurants" class="industry-tile reveal">
        <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=500&h=375&fit=crop" alt="Restaurant interior" width="500" height="375">
        <div class="ind-overlay">
          <i class="fa-solid fa-utensils"></i>
          <h3>Restaurants</h3>
          <p>Orders, kitchen, menu management</p>
        </div>
      </a>

      <a href="solutions.php#supermarkets" class="industry-tile reveal">
        <img src="https://images.unsplash.com/photo-1604719312566-8912e9227c6a?w=500&h=375&fit=crop" alt="Supermarket aisle" width="500" height="375">
        <div class="ind-overlay">
          <i class="fa-solid fa-cart-shopping"></i>
          <h3>Supermarkets</h3>
          <p>Barcode, multi-counter billing</p>
        </div>
      </a>

      <a href="solutions.php#pharmacies" class="industry-tile reveal">
        <img src="https://images.unsplash.com/photo-1585435557343-3b092031a831?w=500&h=375&fit=crop" alt="Pharmacy shelves" width="500" height="375">
        <div class="ind-overlay">
          <i class="fa-solid fa-pills"></i>
          <h3>Pharmacies</h3>
          <p>Batch, expiry, and drug alerts</p>
        </div>
      </a>

      <a href="solutions.php#hardware" class="industry-tile reveal">
        <img src="https://images.unsplash.com/photo-1504148455328-c376907d081c?w=500&h=375&fit=crop" alt="Hardware shop" width="500" height="375">
        <div class="ind-overlay">
          <i class="fa-solid fa-hammer"></i>
          <h3>Hardware Shops</h3>
          <p>Variants, bulk pricing, credit</p>
        </div>
      </a>

    </div><!-- /industries-grid -->
  </div>
</section>





<!-- ========================================================
     SECTION 11 — COMPARE TABLE
     ======================================================== -->
<section class="bg-subtle" style="padding:var(--sp) 0;">
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-scale-balanced"></i> Compare</span>
      <h2>MazERP vs the old way</h2>
      <p>See how a modern cloud platform stacks up against spreadsheets and disconnected manual tools.</p>
    </div>

    <div class="compare-wrap reveal">
      <table class="compare-tbl">
        <thead>
          <tr>
            <th>Capability</th>
            <th class="featured-col">MazERP</th>
            <th>Spreadsheets / Manual</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>GST invoice creation</td>
            <td class="featured-col yes">Automatic in seconds</td>
            <td class="no">Manual calculation every time</td>
          </tr>
          <tr>
            <td>Inventory tracking</td>
            <td class="featured-col yes">Real-time, across all locations</td>
            <td class="no">End-of-day manual count</td>
          </tr>
          <tr>
            <td>Multi-store management</td>
            <td class="featured-col yes">Built-in, centralised view</td>
            <td class="no">Not possible without custom tools</td>
          </tr>
          <tr>
            <td>GST reports and filing</td>
            <td class="featured-col yes">Auto-generated, export-ready</td>
            <td class="no">Hours of manual data entry</td>
          </tr>
          <tr>
            <td>Mobile access</td>
            <td class="featured-col yes">Any device, anywhere</td>
            <td class="no">Desktop only</td>
          </tr>
          <tr>
            <td>Setup time</td>
            <td class="featured-col yes">Under 1 hour</td>
            <td>Weeks of configuration</td>
          </tr>
          <tr>
            <td>True cost</td>
            <td class="featured-col yes">Transparent monthly plan</td>
            <td class="no">Hidden costs add up fast</td>
          </tr>
        </tbody>
      </table>
    </div><!-- /compare-wrap -->
  </div>
</section>


<!-- ========================================================
     SECTION 12 — FAQ
     ======================================================== -->
<section style="padding:var(--sp) 0;">
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-circle-question"></i> FAQ</span>
      <h2>Frequently asked questions</h2>
      <p>Short, direct answers to the questions we hear most. Something missing? Our team responds within one business hour.</p>
    </div>

    <div class="faq-wrap reveal">

      <div class="faq-item">
        <button class="faq-btn">
          What is MazERP and who is it for?
          <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            MazERP is a cloud-based ERP, CRM, and accounting platform designed for Indian small and medium businesses. It is ideal for retail stores, restaurants, supermarkets, pharmacies, and hardware shops that want to replace scattered tools — billing software, inventory tracker, accounting tool — with one connected system that handles GST compliance automatically.
          </div>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-btn">
          How quickly can I get started?
          <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            Most businesses are fully up and running within an hour. Sign up, add your products and GSTIN, invite your team members, and start billing. No installation needed — MazERP works entirely in your browser and on mobile devices, so there is nothing to download or configure on your computers.
          </div>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-btn">
          Is MazERP fully GST compliant?
          <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            Yes, completely. GST invoicing, e-invoicing (IRN generation), automatic CGST / SGST / IGST calculation based on buyer location, and GST return reports (GSTR-1, GSTR-3B summaries) are all built into the platform. You do not need a separate compliance tool or tax software.
          </div>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-btn">
          Can I manage multiple stores from one account?
          <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            Absolutely. MazERP supports multiple outlets and warehouses from a single account. Inventory, pricing, and customer data sync in real time across all locations. You get consolidated reports for the whole business plus store-wise breakdowns — all from one dashboard.
          </div>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-btn">
          Is there a free trial? Do I need a credit card?
          <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            Yes. You can start a free 7-day trial with no credit card required. Every feature is fully unlocked during the trial — including multi-store, reports, and CRM — so you can properly test whether MazERP fits your business before you commit to a paid plan.
          </div>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-btn">
          What support do you offer after I sign up?
          <i class="fa-solid fa-chevron-down"></i>
        </button>
        <div class="faq-answer">
          <div class="faq-answer-inner">
            We offer phone, email, and WhatsApp support. Our team typically responds within one business hour. We also provide free onboarding assistance and training for your team at no extra cost. If you have a specific workflow requirement, our team will work with you to configure MazERP to match exactly how your business operates.
          </div>
        </div>
      </div>

    </div><!-- /faq-wrap -->
  </div>
</section>


<!-- FAQ JSON-LD Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What is MazERP and who is it for?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "MazERP is a cloud-based ERP, CRM, and accounting platform for Indian small and medium businesses. It is ideal for retail stores, restaurants, supermarkets, pharmacies, and hardware shops that want one connected system for GST billing, inventory, and accounting."
      }
    },
    {
      "@type": "Question",
      "name": "How quickly can I get started?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Most businesses are fully up and running within an hour. No installation needed — MazERP works in your browser and on mobile devices."
      }
    },
    {
      "@type": "Question",
      "name": "Is MazERP fully GST compliant?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. GST invoicing, e-invoicing, automatic CGST/SGST/IGST calculation, and GST return reports are all built into the platform."
      }
    },
    {
      "@type": "Question",
      "name": "Can I manage multiple stores from one account?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. MazERP supports multiple outlets and warehouses from a single account with real-time sync, consolidated reports, and store-wise breakdowns."
      }
    },
    {
      "@type": "Question",
      "name": "Is there a free trial? Do I need a credit card?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. You can start a free 7-day trial with no credit card required. All features are fully unlocked during the trial."
      }
    },
    {
      "@type": "Question",
      "name": "What support do you offer after I sign up?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Phone, email, and WhatsApp support with under one-hour response times. Free onboarding assistance and team training included at no extra cost."
      }
    }
  ]
}
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
