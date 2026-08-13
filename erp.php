<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<!-- ========== HERO ========== -->
<section class="product-hero">
  <div class="container ph-layout">
    <div class="ph-content reveal-left">
      <span class="label"><i class="fa-solid fa-cubes"></i> Enterprise Resource Planning</span>
      <h1>Smarter Operations, Zero Guesswork</h1>
      <p>MazERP gives Indian SMBs one connected platform to run billing, inventory, purchasing, and reporting without spreadsheets, without confusion, and without missing a rupee. Built for the way Indian businesses actually work — GST-ready from day one.</p>
      <div class="ph-ctas">
        <a href="https://app.mazerp.com/auth/register" class="btn btn-primary btn-lg"><i class="fa-solid fa-rocket"></i> Start Free Trial</a>
        <a href="contact.php" class="btn btn-outline-white"><i class="fa-solid fa-calendar-check"></i> Book Demo</a>
      </div>
    </div>
    <div class="ph-screen reveal-right">
      <div class="screen-chrome">
        <span class="sc-dot"></span><span class="sc-dot"></span><span class="sc-dot"></span>
      </div>
      <img src="assets/img/ui-dashboard.svg" alt="MazERP ERP dashboard showing inventory, billing, and real-time analytics" width="800" height="500">
    </div>
  </div>
</section>

<!-- ========== WHAT IS ERP ========== -->
<section>
  <div class="container">
    <div class="sol-layout reveal">
      <div class="sol-info">
        <span class="label label-green"><i class="fa-solid fa-circle-info"></i> What is ERP?</span>
        <h2>One system that runs your entire business</h2>
        <p class="lead">ERP (Enterprise Resource Planning) connects every part of your business — sales, inventory, purchasing, billing, and reporting — into a single real-time platform. Indian SMBs that move from scattered notebooks and spreadsheets to MazERP typically see faster billing, fewer errors, and a clear picture of where every rupee went.</p>
        <p>Whether you run a single retail store or a chain of outlets across Tamil Nadu, MazERP handles the complexity so you can focus on growth. GST compliance is built in. Barcode scanning is built in. Multi-store control is built in.</p>
        <a href="https://app.mazerp.com/auth/register" class="btn btn-primary">Try ERP Free for 7 Days</a>
      </div>
      <div class="sol-img">
        <div class="stats-grid">
          <div class="stat-card reveal">
            <div class="stat-num c-blue">1,240</div>
            <div>Avg SKUs managed per business</div>
          </div>
          <div class="stat-card reveal">
            <div class="stat-num c-green">45%</div>
            <div>Faster billing after switching</div>
          </div>
          <div class="stat-card reveal">
            <div class="stat-num c-amber">60%</div>
            <div>Less stockouts reported</div>
          </div>
          <div class="stat-card reveal">
            <div class="stat-num c-cyan">3M+</div>
            <div>Invoices processed on MazERP</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ========== ALT SECTION 1: Inventory ========== -->
<section class="alt-section bg-subtle" id="inventory">
  <div class="container alt-grid">
    <div class="alt-content reveal-left">
      <span class="label"><i class="fa-solid fa-boxes-stacked"></i> Inventory</span>
      <h2>Real-time Inventory Control</h2>
      <p class="lead">Track every product, across every location, the moment it moves. MazERP eliminates end-of-day stock counts and manual spreadsheet updates. You always know exactly what is on the shelf.</p>
      <div class="alt-feats">
        <div class="alt-feat"><i class="fa-solid fa-check"></i> Barcode scanning — fast item lookup and billing</div>
        <div class="alt-feat"><i class="fa-solid fa-check"></i> Multi-warehouse support across all locations</div>
        <div class="alt-feat"><i class="fa-solid fa-check"></i> Batch tracking for lot-based products</div>
        <div class="alt-feat"><i class="fa-solid fa-check"></i> Expiry alerts before medicines or perishables go bad</div>
        <div class="alt-feat"><i class="fa-solid fa-check"></i> Low stock alerts with automatic reorder triggers</div>
        <div class="alt-feat"><i class="fa-solid fa-check"></i> Stock transfers between outlets in seconds</div>
      </div>
      <a href="contact.php" class="btn btn-primary">See Inventory Demo</a>
    </div>
    <div class="alt-visual reveal-right">
      <div class="alt-screen">
        <div class="browser-bar"><div class="browser-dots"><span></span><span></span><span></span></div><div class="browser-url"></div></div>
        <img src="assets/img/ui-inventory.svg" alt="MazERP inventory management interface showing real-time stock levels" width="700" height="440">
      </div>
      <div class="alt-float top-right" style="animation-delay:0.4s;">
        <i class="fa-solid fa-rotate" style="color:var(--blue-light);"></i>
        Live stock sync
      </div>
    </div>
  </div>
</section>

<!-- ========== ALT SECTION 2: Billing (reverse) ========== -->
<section class="alt-section" id="billing">
  <div class="container alt-grid reverse">
    <div class="alt-visual reveal-left">
      <div class="alt-screen">
        <div class="browser-bar"><div class="browser-dots"><span></span><span></span><span></span></div><div class="browser-url"></div></div>
        <img src="assets/img/ui-billing.svg" alt="MazERP billing interface with automatic GST calculation and e-invoicing" width="700" height="440">
      </div>
      <div class="alt-float bot-right" style="animation-delay:0.6s;">
        <i class="fa-solid fa-percent" style="color:var(--emerald);"></i>
        Auto GST calc
      </div>
    </div>
    <div class="alt-content reveal-right">
      <span class="label"><i class="fa-solid fa-file-invoice-dollar"></i> Billing</span>
      <h2>GST Billing Made Effortless</h2>
      <p class="lead">Create GST-compliant invoices in under 30 seconds. Auto CGST, SGST, and IGST calculation means zero manual tax math and zero errors. E-invoicing and e-way bills are generated with a single click.</p>
      <div class="alt-feats">
        <div class="alt-feat"><i class="fa-solid fa-check"></i> Auto CGST / SGST / IGST calculation per item</div>
        <div class="alt-feat"><i class="fa-solid fa-check"></i> E-invoicing and e-way bill generation</div>
        <div class="alt-feat"><i class="fa-solid fa-check"></i> Quick billing mode for high-traffic counters</div>
        <div class="alt-feat"><i class="fa-solid fa-check"></i> Payment reminders sent automatically</div>
        <div class="alt-feat"><i class="fa-solid fa-check"></i> Returns, credit notes, and adjustments in one place</div>
      </div>
      <a href="contact.php" class="btn btn-primary">See Billing Demo</a>
    </div>
  </div>
</section>

<!-- ========== ALT SECTION 3: Multi-Store ========== -->
<section class="alt-section bg-subtle" id="multistore">
  <div class="container alt-grid">
    <div class="alt-content reveal-left">
      <span class="label"><i class="fa-solid fa-store"></i> Multi-Store</span>
      <h2>Multi-Store Management</h2>
      <p class="lead">Run two locations or twenty from a single MazERP account. Every store shares the same product catalogue, pricing rules, and customer database — while giving you store-level reports and staff controls.</p>
      <div class="alt-feats">
        <div class="alt-feat"><i class="fa-solid fa-check"></i> Centralized control of all outlets from one screen</div>
        <div class="alt-feat"><i class="fa-solid fa-check"></i> Store-wise P&amp;L and revenue comparison</div>
        <div class="alt-feat"><i class="fa-solid fa-check"></i> Shared inventory pool with real-time sync</div>
        <div class="alt-feat"><i class="fa-solid fa-check"></i> Role-based access so staff only see what they need</div>
        <div class="alt-feat"><i class="fa-solid fa-check"></i> Instant stock transfers between outlets</div>
      </div>
      <a href="contact.php" class="btn btn-primary">Book Multi-Store Demo</a>
    </div>
    <div class="alt-visual reveal-right">
      <div class="alt-screen">
        <div class="browser-bar"><div class="browser-dots"><span></span><span></span><span></span></div><div class="browser-url"></div></div>
        <img src="assets/img/ui-reports.svg" alt="MazERP multi-store dashboard showing consolidated store data" width="700" height="440">
      </div>
      <div class="alt-float top-right" style="animation-delay:0.5s;">
        <i class="fa-solid fa-store" style="color:var(--amber);"></i>
        All stores, one view
      </div>
    </div>
  </div>
</section>

<!-- ========== FEATURES GRID ========== -->
<section class="bg-subtle">
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-grid-2"></i> Full Feature Set</span>
      <h2>Everything your ERP should do</h2>
      <p>Six core modules that work together seamlessly. Activate what you need today, expand as you grow.</p>
    </div>
    <div class="feats-grid">
      <div class="feat-card reveal">
        <div class="feat-icon fi-blue"><i class="fa-solid fa-boxes-stacked"></i></div>
        <h3>Inventory Management</h3>
        <p>Real-time stock tracking with barcode scanning, low-stock alerts, batch management, and multi-warehouse support.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon fi-green"><i class="fa-solid fa-file-invoice-dollar"></i></div>
        <h3>Billing &amp; Invoicing</h3>
        <p>GST-compliant invoices in seconds. Automatic tax calculation, e-invoicing, e-way bills, and payment tracking built in.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon fi-amber"><i class="fa-solid fa-cart-flatbed"></i></div>
        <h3>Purchase Orders</h3>
        <p>Raise POs to suppliers, track deliveries, auto-update stock on receipt, and monitor supplier performance.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon fi-sky"><i class="fa-solid fa-barcode"></i></div>
        <h3>Barcode Management</h3>
        <p>Generate barcodes for every product, scan at billing counters, and speed up stock-taking with mobile scanning.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon fi-pink"><i class="fa-solid fa-store"></i></div>
        <h3>Multi-Store Control</h3>
        <p>One account for every outlet. Shared catalogue, unified reporting, and inter-store stock transfers on demand.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon fi-grad"><i class="fa-solid fa-mobile-screen-button"></i></div>
        <h3>Mobile Access</h3>
        <p>Run billing, check stock, approve POs, and view dashboards from any phone or tablet — no app download needed.</p>
      </div>
    </div>
  </div>
</section>

<!-- ========== INDUSTRIES ========== -->
<section>
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-building"></i> Industries</span>
      <h2>Which businesses use MazERP ERP?</h2>
      <p>Pre-configured workflows for the industries that need ERP the most. No fighting generic templates.</p>
    </div>
    <div class="products-grid">
      <div class="product-card reveal">
        <div class="pc-icon-blue"><i class="fa-solid fa-shirt"></i></div>
        <h3>Retail Stores</h3>
        <p>Fast billing, real-time stock, customer management, and daily P&amp;L for clothing, electronics, and general merchandise stores.</p>
        <a href="solutions.php#retail" class="pc-link">See retail solution <i class="fa-solid fa-arrow-right"></i></a>
      </div>

      <div class="product-card reveal">
        <div class="pc-icon-amber"><i class="fa-solid fa-pills"></i></div>
        <h3>Pharmacies</h3>
        <p>Batch and expiry tracking, medicine stock management, GST invoices, and automatic alerts before medicines expire.</p>
        <a href="solutions.php#pharmacies" class="pc-link">See pharmacy solution <i class="fa-solid fa-arrow-right"></i></a>
      </div>
      <div class="product-card reveal">
        <div class="pc-icon-blue"><i class="fa-solid fa-screwdriver-wrench"></i></div>
        <h3>Hardware Shops</h3>
        <p>Product variants, bulk inventory, credit tracking, and margin reports for shops with thousands of SKUs across sizes.</p>
        <a href="solutions.php#hardware" class="pc-link">See hardware solution <i class="fa-solid fa-arrow-right"></i></a>
      </div>
      <div class="product-card reveal">
        <div class="pc-icon-green"><i class="fa-solid fa-basket-shopping"></i></div>
        <h3>Supermarkets</h3>
        <p>High-volume barcode billing, multi-counter support, expiry tracking for perishables, and consolidated multi-outlet reports.</p>
        <a href="solutions.php#supermarkets" class="pc-link">See supermarket solution <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- ========== TESTIMONIALS ========== -->
<section class="bg-subtle">
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-quote-left"></i> Customer Stories</span>
      <h2>Real businesses. Real results.</h2>
      <p>What business owners say after switching to MazERP ERP.</p>
    </div>
    <div class="testi-grid">
      <div class="testi-card reveal">
        <div class="testi-quote">"</div>
        <div class="testi-stars">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
        </div>
        <p class="testi-text">Inventory tracking across three stores used to take my manager a full day every week. Now it is automatic. Stock-outs dropped by 60 percent in the first month. MazERP ERP is the best decision we made this year.</p>
        <div class="testi-author">
          <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=100&h=100&fit=crop" alt="Priya Sharma" width="46" height="46">
          <div><strong>Priya Sharma</strong><span>Manager, QuickServe Supermarket, Chennai</span></div>
        </div>
      </div>
      <div class="testi-card reveal">
        <div class="testi-quote">"</div>
        <div class="testi-stars">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
        </div>
        <p class="testi-text">We were billing by hand and updating stock in a register. With MazERP, billing time dropped from 5 minutes to under 30 seconds per customer. My accountant can now pull GST reports without calling me on a Sunday.</p>
        <div class="testi-author">
          <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=100&h=100&fit=crop" alt="Karthik Rajan" width="46" height="46">
          <div><strong>Karthik Rajan</strong><span>Owner, FreshMart Retail, Coimbatore</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ========== FAQ ========== -->
<section>
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-circle-question"></i> FAQ</span>
      <h2>ERP questions, answered directly</h2>
      <p>Still on the fence? Our team answers within one business hour if something is missing below.</p>
    </div>
    <div class="faq-wrap reveal">
      <div class="faq-item">
        <button class="faq-btn">What is ERP and does my small business actually need it? <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span></button>
        <div class="faq-answer"><p>ERP connects billing, inventory, purchasing, and reporting in one system. You need it the moment you are wasting time cross-referencing spreadsheets, manually calculating GST, or losing track of what is in stock. Most Indian SMBs break even on their MazERP subscription within the first 30 days through time savings alone.</p></div>
      </div>
      <div class="faq-item">
        <button class="faq-btn">How does MazERP ERP handle GST? <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span></button>
        <div class="faq-answer"><p>Every invoice automatically calculates the correct CGST, SGST, or IGST based on the product HSN code and the billing state. E-invoices and e-way bills generate with a single click. GSTR-1, GSTR-3B, and other return summaries are ready to export anytime, so your CA has everything they need.</p></div>
      </div>
      <div class="faq-item">
        <button class="faq-btn">Can MazERP manage multiple stores? <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span></button>
        <div class="faq-answer"><p>Yes. Multi-store support is built into every MazERP plan. All outlets share one product catalogue and customer database. You get store-wise P&amp;L, consolidated revenue reports, and the ability to transfer stock between locations from your phone.</p></div>
      </div>
      <div class="faq-item">
        <button class="faq-btn">Does MazERP work on mobile? <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span></button>
        <div class="faq-answer"><p>Completely. MazERP runs in any browser on any device — phone, tablet, or desktop. You can create invoices, check live stock, approve purchase orders, and view daily reports from anywhere with a data connection. No app download required.</p></div>
      </div>
      <div class="faq-item">
        <button class="faq-btn">Can I migrate my existing data from old software or Excel? <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span></button>
        <div class="faq-answer"><p>Yes. MazERP supports bulk import of products, customers, suppliers, and opening stock from Excel and CSV files. Our onboarding team will help you migrate at no extra cost. Most businesses complete migration in under two hours.</p></div>
      </div>
    </div>
  </div>
</section>

<!-- ========== CTA ========== -->
<section class="product-hero" style="padding:80px 0;">
  <div class="container reveal" style="text-align:center;max-width:680px;">
    <span class="label label-white"><i class="fa-solid fa-rocket"></i> Get Started</span>
    <h2 style="color:#fff;font-size:clamp(1.75rem,4vw,2.5rem);margin:16px 0;">Start your free ERP trial today</h2>
    <p style="color:rgba(255,255,255,0.8);margin-bottom:32px;">No credit card. No setup fees. Full access for 7 days. Join 10,000+ Indian businesses already running on MazERP.</p>
    <div class="ph-ctas" style="justify-content:center;">
      <a href="https://app.mazerp.com/auth/register" class="btn btn-primary btn-lg"><i class="fa-solid fa-rocket"></i> Start Free Trial</a>
      <a href="contact.php" class="btn btn-outline-white"><i class="fa-solid fa-calendar-check"></i> Book Demo</a>
    </div>
  </div>
</section>

<!-- ========== EXPLORE OTHER MODULES ========== -->
<section class="bg-subtle">
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-grid-2"></i> Explore Other Modules</span>
      <h2>ERP is just the beginning</h2>
      <p>MazERP includes powerful CRM and Accounting modules that connect seamlessly with your ERP data.</p>
    </div>
    <div class="products-grid" style="grid-template-columns:repeat(auto-fit,minmax(280px,1fr));max-width:720px;margin:0 auto;">
      <div class="product-card reveal">
        <div class="pc-icon-green"><i class="fa-solid fa-users"></i></div>
        <h3>CRM</h3>
        <p>Complete customer profiles, loyalty programs, sales pipeline tracking, and automated follow-up reminders.</p>
        <a href="crm/" class="pc-link">Explore CRM <i class="fa-solid fa-arrow-right"></i></a>
      </div>
      <div class="product-card reveal">
        <div class="pc-icon-amber"><i class="fa-solid fa-calculator"></i></div>
        <h3>Accounting</h3>
        <p>Automatic GST compliance, live P&amp;L reports, cash flow forecasting, and bank reconciliation in one place.</p>
        <a href="accounting.php" class="pc-link">Explore Accounting <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
