<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<!-- PAGE HERO -->
<section class="page-hero">
  <div class="container reveal">
    <span class="label"><i class="fa-solid fa-tag"></i> Pricing Plans</span>
    <h1>Simple, transparent pricing</h1>
    <p>No hidden fees. Cancel anytime. Free 7-day trial on every plan — no credit card required.</p>
  </div>
</section>

<!-- PRICING TOGGLE + CARDS -->
<section style="padding:var(--sp) 0;">
  <div class="container">

    <!-- Monthly / Annual Toggle -->
    <div class="pricing-toggle-wrap reveal" style="display:flex;justify-content:center;align-items:center;gap:14px;margin-bottom:40px;">
      <span class="toggle-label" id="toggleMonthly" style="font-weight:600;font-size:0.95rem;color:var(--text);cursor:pointer;">Monthly</span>
      <label class="pricing-switch" aria-label="Toggle between monthly and annual pricing">
        <input type="checkbox" id="pricingToggle">
        <span class="pricing-slider"></span>
      </label>
      <span class="toggle-label" id="toggleAnnual" style="font-weight:600;font-size:0.95rem;color:var(--text-muted);cursor:pointer;">Annual</span>
      <span class="annual-badge" id="annualBadge" style="background:var(--emerald);color:#fff;font-size:0.7rem;font-weight:700;padding:3px 10px;border-radius:var(--r-full);opacity:0;transition:opacity 0.3s;">SAVE MORE</span>
    </div>

    <div class="pricing-grid">

      <!-- Basic -->
      <div class="price-card reveal">
        <h2 class="pc-name" style="font-size:1.5rem;font-weight:700;color:var(--text);margin-bottom:8px;">Basic</h2>
        <p style="color:var(--text-muted);font-size:0.875rem;line-height:1.5;min-height:48px;">Essential tools to manage your business operations with ease</p>
        <div class="price-amount" style="margin:16px 0 8px;display:flex;align-items:baseline;gap:4px;">
          <span class="price-num" data-monthly="<?php echo htmlspecialchars($loc['pricing_basic']); ?>" data-annual="<?php echo htmlspecialchars($loc['pricing_basic_annual']); ?>" style="font-size:2.8rem;font-weight:800;color:var(--text);line-height:1;"><?php echo htmlspecialchars($loc['pricing_basic']); ?></span>
          <span class="price-period" data-monthly="/month" data-annual="/year" style="color:var(--text-muted);font-size:0.875rem;">/month</span>
        </div>
        <p class="price-note" data-monthly="Regularly <?php echo htmlspecialchars($loc['pricing_basic_orig']); ?>/mo" data-annual="Regularly <?php echo htmlspecialchars($loc['pricing_basic_annual_orig']); ?>/yr" style="font-size:0.75rem;color:var(--text-muted);margin-bottom:16px;text-decoration:line-through;">Regularly <?php echo htmlspecialchars($loc['pricing_basic_orig']); ?>/mo</p>
        <a href="https://app.mazerp.com/auth/register" class="btn btn-ghost btn-lg" style="width:100%;justify-content:center;margin-bottom:20px;">Start Free Trial</a>
        
        <div style="border-top:1.5px solid var(--border);padding-top:20px;">
          <ul class="price-feats" style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:12px;font-size:0.875rem;">
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Manage: 1 Business</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> 1 User Access</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Billing &amp; Accounting</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Sales Invoice</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Purchase Invoice</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> <?php echo htmlspecialchars($loc['tax_name']); ?> Filing + Report</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> All Accounting Reports</li>
          </ul>
        </div>
      </div>

      <!-- Standard -->
      <div class="price-card reveal">
        <h2 class="pc-name" style="font-size:1.5rem;font-weight:700;color:var(--text);margin-bottom:8px;">Standard</h2>
        <p style="color:var(--text-muted);font-size:0.875rem;line-height:1.5;min-height:48px;">Smart features for growing businesses and daily efficiency</p>
        <div class="price-amount" style="margin:16px 0 8px;display:flex;align-items:baseline;gap:4px;">
          <span class="price-num" data-monthly="<?php echo htmlspecialchars($loc['pricing_std']); ?>" data-annual="<?php echo htmlspecialchars($loc['pricing_std_annual']); ?>" style="font-size:2.8rem;font-weight:800;color:var(--text);line-height:1;"><?php echo htmlspecialchars($loc['pricing_std']); ?></span>
          <span class="price-period" data-monthly="/month" data-annual="/year" style="color:var(--text-muted);font-size:0.875rem;">/month</span>
        </div>
        <p class="price-note" data-monthly="Regularly <?php echo htmlspecialchars($loc['pricing_std_orig']); ?>/mo" data-annual="Regularly <?php echo htmlspecialchars($loc['pricing_std_annual_orig']); ?>/yr" style="font-size:0.75rem;color:var(--text-muted);margin-bottom:16px;text-decoration:line-through;">Regularly <?php echo htmlspecialchars($loc['pricing_std_orig']); ?>/mo</p>
        <a href="https://app.mazerp.com/auth/register" class="btn btn-ghost btn-lg" style="width:100%;justify-content:center;margin-bottom:20px;">Start Free Trial</a>
        
        <div style="border-top:1.5px solid var(--border);padding-top:20px;">
          <ul class="price-feats" style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:12px;font-size:0.875rem;">
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Manage: 1 Business</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> 1 User Access</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Access to ERP + CRM</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Sales Invoice</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Purchase Invoice</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Manage 1 Branch</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> E-Way Bill</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Barcode Gen + Scan</li>
          </ul>
        </div>
      </div>

      <!-- Professional (Featured) -->
      <div class="price-card featured reveal">
        <span class="price-popular" style="background:var(--blue);color:#ffffff;font-size:0.75rem;font-weight:700;padding:4px 12px;border-radius:var(--r-full);position:absolute;top:16px;right:16px;text-transform:uppercase;">Popular</span>
        <h2 class="pc-name" style="font-size:1.5rem;font-weight:700;color:var(--text);margin-bottom:8px;">Professional</h2>
        <p style="color:var(--text-muted);font-size:0.875rem;line-height:1.5;min-height:48px;">Advanced business management with powerful automation tools</p>
        <div class="price-amount" style="margin:16px 0 8px;display:flex;align-items:baseline;gap:4px;">
          <span class="price-num" data-monthly="<?php echo htmlspecialchars($loc['pricing_prof']); ?>" data-annual="<?php echo htmlspecialchars($loc['pricing_prof_annual']); ?>" style="font-size:2.8rem;font-weight:800;color:var(--text);line-height:1;"><?php echo htmlspecialchars($loc['pricing_prof']); ?></span>
          <span class="price-period" data-monthly="/month" data-annual="/year" style="color:var(--text-muted);font-size:0.875rem;">/month</span>
        </div>
        <p class="price-note" data-monthly="Regularly <?php echo htmlspecialchars($loc['pricing_prof_orig']); ?>/mo" data-annual="Regularly <?php echo htmlspecialchars($loc['pricing_prof_annual_orig']); ?>/yr" style="font-size:0.75rem;color:var(--text-muted);margin-bottom:16px;text-decoration:line-through;">Regularly <?php echo htmlspecialchars($loc['pricing_prof_orig']); ?>/mo</p>
        <a href="https://app.mazerp.com/auth/register" class="btn btn-primary btn-lg" style="width:100%;justify-content:center;margin-bottom:20px;">Start Free Trial</a>
        
        <div style="border-top:1.5px solid var(--border);padding-top:20px;">
          <ul class="price-feats" style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:12px;font-size:0.875rem;">
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Manage: 1 Business</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> 3 User Access</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Access to ERP + CRM</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Sales Invoice</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Purchase Invoice</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Manage 3 Branches</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Access to POS</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> E-Invoicing</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> E-Way Bill</li>
          </ul>
        </div>
      </div>

      <!-- Premium -->
      <div class="price-card reveal">
        <h2 class="pc-name" style="font-size:1.5rem;font-weight:700;color:var(--text);margin-bottom:8px;">Premium</h2>
        <p style="color:var(--text-muted);font-size:0.875rem;line-height:1.5;min-height:48px;">All-in-one advanced platform built for high-performance businesses</p>
        <div class="price-amount" style="margin:16px 0 8px;display:flex;align-items:baseline;gap:4px;">
          <span class="price-num" data-monthly="<?php echo htmlspecialchars($loc['pricing_prem']); ?>" data-annual="<?php echo htmlspecialchars($loc['pricing_prem_annual']); ?>" style="font-size:2.8rem;font-weight:800;color:var(--text);line-height:1;"><?php echo htmlspecialchars($loc['pricing_prem']); ?></span>
          <span class="price-period" data-monthly="/month" data-annual="/year" style="color:var(--text-muted);font-size:0.875rem;">/month</span>
        </div>
        <p class="price-note" data-monthly="Regularly <?php echo htmlspecialchars($loc['pricing_prem_orig']); ?>/mo" data-annual="Regularly <?php echo htmlspecialchars($loc['pricing_prem_annual_orig']); ?>/yr" style="font-size:0.75rem;color:var(--text-muted);margin-bottom:16px;text-decoration:line-through;">Regularly <?php echo htmlspecialchars($loc['pricing_prem_orig']); ?>/mo</p>
        <a href="https://app.mazerp.com/auth/register" class="btn btn-ghost btn-lg" style="width:100%;justify-content:center;margin-bottom:20px;">Start Free Trial</a>
        
        <div style="border-top:1.5px solid var(--border);padding-top:20px;">
          <ul class="price-feats" style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:12px;font-size:0.875rem;">
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Manage: 1 Business</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> 5 User Access</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Access to ERP + CRM</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Sales Invoice: Unlimited</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Purchase Invoice: Unlimited</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Manage 5 Branches</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> E-Way Bill: Unlimited</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> E-Invoicing: Unlimited</li>
          </ul>
        </div>
      </div>

      <!-- Enterprise -->
      <div class="price-card price-card-enterprise reveal">
        <h2 class="pc-name" style="font-size:1.5rem;font-weight:700;color:var(--text);margin-bottom:8px;">Enterprise</h2>
        <p style="color:var(--text-muted);font-size:0.875rem;line-height:1.5;min-height:48px;">Let's talk to our team to build your customised business management tool</p>
        <div class="price-amount" style="margin:16px 0 8px;">
          <span style="font-size:1.8rem;font-weight:800;color:var(--text);line-height:1;">Let's Talk</span>
        </div>
        <p style="font-size:0.75rem;color:var(--text-muted);margin-bottom:16px;">Custom pricing for your needs</p>
        <a href="contact.php" class="btn btn-ghost btn-lg" style="width:100%;justify-content:center;margin-bottom:20px;">Contact Sales</a>
        
        <div style="border-top:1.5px solid var(--border);padding-top:20px;">
          <ul class="price-feats" style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:12px;font-size:0.875rem;">
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Fully customisable</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Unlimited users &amp; branches</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Dedicated account manager</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Priority support &amp; SLA</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Custom integrations</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> On-premise option available</li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- COMPARISON TABLE -->
<section class="bg-subtle" style="padding:var(--sp) 0;">
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-table"></i> Compare Plans</span>
      <h2>Detailed Feature Comparison Matrix</h2>
      <p>Compare our packages and select the plan that matches your business scale and compliance requirements.</p>
    </div>
    
    <div class="compare-wrap reveal">
      <table class="compare-tbl" style="width:100%;border-collapse:collapse;text-align:left;">
        <thead>
          <tr style="border-bottom:2px solid var(--border);">
            <th style="padding:16px;font-weight:700;">Features &amp; Capabilities</th>
            <th style="padding:16px;text-align:center;font-weight:700;">Basic</th>
            <th style="padding:16px;text-align:center;font-weight:700;">Standard</th>
            <th style="padding:16px;text-align:center;font-weight:700;background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);">Professional</th>
            <th style="padding:16px;text-align:center;font-weight:700;">Premium</th>
          </tr>
        </thead>
        <tbody>
          <!-- Category: Access -->
          <tr style="background:rgba(37,99,235,0.06);font-weight:700;">
            <td colspan="5" style="padding:12px 16px;font-size:0.875rem;color:var(--blue-dark);text-transform:uppercase;letter-spacing:0.05em;">Access Details</td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">Multi-Device Access</td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">ERP Modules</td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">CRM Modules</td>
            <td style="padding:14px 16px;text-align:center;color:var(--rose);"><i class="fa-solid fa-xmark"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>

          <!-- Category: Business -->
          <tr style="background:rgba(37,99,235,0.06);font-weight:700;">
            <td colspan="5" style="padding:12px 16px;font-size:0.875rem;color:var(--blue-dark);text-transform:uppercase;letter-spacing:0.05em;">Business Parameters</td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">Multi-Organisation Management</td>
            <td style="padding:14px 16px;text-align:center;color:var(--rose);"><i class="fa-solid fa-xmark"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--rose);"><i class="fa-solid fa-xmark"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">Multi-User Support</td>
            <td style="padding:14px 16px;text-align:center;color:var(--rose);"><i class="fa-solid fa-xmark"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--rose);"><i class="fa-solid fa-xmark"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">Multi-Branch Mapping</td>
            <td style="padding:14px 16px;text-align:center;color:var(--rose);"><i class="fa-solid fa-xmark"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>

          <!-- Category: Sales -->
          <tr style="background:rgba(37,99,235,0.06);font-weight:700;">
            <td colspan="5" style="padding:12px 16px;font-size:0.875rem;color:var(--blue-dark);text-transform:uppercase;letter-spacing:0.05em;">Sales &amp; Compliance</td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">Invoices / Year</td>
            <td style="padding:14px 16px;text-align:center;">2,000 / Year</td>
            <td style="padding:14px 16px;text-align:center;">5,000 / Year</td>
            <td style="padding:14px 16px;text-align:center;background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);">10,000 / Year</td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);font-weight:600;">Unlimited</td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">Estimates &amp; Quotes</td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">Thermal Print Support</td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">E-Way Bill Generation</td>
            <td style="padding:14px 16px;text-align:center;color:var(--rose);"><i class="fa-solid fa-xmark"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i> (100/Yr)</td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i> (200/Yr)</td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);font-weight:600;">Unlimited</td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">E-Invoicing Compliance</td>
            <td style="padding:14px 16px;text-align:center;color:var(--rose);"><i class="fa-solid fa-xmark"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--rose);"><i class="fa-solid fa-xmark"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i> (200/Yr)</td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);font-weight:600;">Unlimited</td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">Integrated POS System</td>
            <td style="padding:14px 16px;text-align:center;color:var(--rose);"><i class="fa-solid fa-xmark"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--rose);"><i class="fa-solid fa-xmark"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>

          <!-- Category: Inventory -->
          <tr style="background:rgba(37,99,235,0.06);font-weight:700;">
            <td colspan="5" style="padding:12px 16px;font-size:0.875rem;color:var(--blue-dark);text-transform:uppercase;letter-spacing:0.05em;">Inventory Control</td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">Warehouse &amp; Stock Sync</td>
            <td style="padding:14px 16px;text-align:center;color:var(--rose);"><i class="fa-solid fa-xmark"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">Stock Adjustment</td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">Barcode Print &amp; Scan</td>
            <td style="padding:14px 16px;text-align:center;color:var(--rose);"><i class="fa-solid fa-xmark"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>

          <!-- Category: Purchase -->
          <tr style="background:rgba(37,99,235,0.06);font-weight:700;">
            <td colspan="5" style="padding:12px 16px;font-size:0.875rem;color:var(--blue-dark);text-transform:uppercase;letter-spacing:0.05em;">Purchase Management</td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">Purchase Orders</td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">Vendor Management</td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>

          <!-- Category: Compliance -->
          <tr style="background:rgba(37,99,235,0.06);font-weight:700;">
            <td colspan="5" style="padding:12px 16px;font-size:0.875rem;color:var(--blue-dark);text-transform:uppercase;letter-spacing:0.05em;"><?php echo htmlspecialchars($loc['tax_name']); ?> Compliance</td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;"><?php echo htmlspecialchars($loc['tax_name']); ?> Report</td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">GSTR - 1</td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">GSTR - 2</td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">GSTR - 3B</td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>

          <!-- Category: Reports -->
          <tr style="background:rgba(37,99,235,0.06);font-weight:700;">
            <td colspan="5" style="padding:12px 16px;font-size:0.875rem;color:var(--blue-dark);text-transform:uppercase;letter-spacing:0.05em;">Reports &amp; Analytics</td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">P &amp; L Report</td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">Balance Sheet</td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">Item-wise &amp; Batch-wise Reports</td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">Aging Summary &amp; Sales Summary</td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- PRICING FAQ -->
<section style="padding:var(--sp) 0;">
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-circle-question"></i> Pricing FAQ</span>
      <h2>Common questions about billing and plans</h2>
    </div>
    <div class="faq-wrap reveal">

      <div class="faq-item">
        <button class="faq-btn" aria-expanded="false">
          Is the 7-day trial really free with no credit card?
          <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer">
          <p>Yes, completely free. No credit card required, no payment details needed. All features of the Professional plan are unlocked during your trial. At the end of 7 days you can choose a plan or your account simply pauses — we never charge without your permission.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-btn" aria-expanded="false">
          Can I switch plans at any time?
          <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer">
          <p>Yes. Upgrade at any time and get access to new features immediately. Downgrades take effect at the next billing cycle. There are no penalties for switching or cancelling.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-btn" aria-expanded="false">
          Are there any hidden fees or setup charges?
          <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer">
          <p>None at all. The price you see is the price you pay. There are no setup fees, no per-transaction charges, no per-invoice fees, and no surprise invoices. Onboarding and training are included free with every plan.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-btn" aria-expanded="false">
          What's the difference between Monthly and Annual plans?
          <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer">
          <p>Both plans give you access to the same features. Annual plans offer significant savings compared to paying monthly. You can switch between monthly and annual billing at any time from your account settings.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-btn" aria-expanded="false">
          What payment methods do you accept?
          <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer">
          <p>We accept all major credit and debit cards, net banking, UPI, and NEFT/RTGS for plans. All transactions are secured and processed securely through Razorpay.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-btn" aria-expanded="false">
          What happens to my data if I cancel?
          <span class="faq-icon"><i class="fa-solid fa-chevron-down"></i></span>
        </button>
        <div class="faq-answer">
          <p>Your data is yours. If you cancel, you have 30 days to export all your invoices, customer data, inventory records, and reports in standard formats. After that window, data is permanently deleted from our servers.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- CTA -->
<section class="bg-subtle" style="padding:60px 0;">
  <div class="container reveal" style="text-align:center;padding:60px 20px;">
    <span class="label"><i class="fa-solid fa-rocket"></i> Get Started Today</span>
    <h2>Start your free 7-day trial — no card needed</h2>
    <p style="max-width:520px;margin:0 auto 32px;">Join over 10,000 businesses already running on MazERP. Set up in under an hour and start billing on day one.</p>
    <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
      <a href="https://app.mazerp.com/auth/register" class="btn btn-primary btn-xl">Start Free Trial</a>
      <a href="contact.php" class="btn btn-ghost btn-xl">Talk to Sales</a>
    </div>
  </div>
</section>

<!-- Pricing FAQ Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Is the 7-day trial really free with no credit card?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, completely free. No credit card required. All features of the Professional plan are unlocked during your trial."
      }
    },
    {
      "@type": "Question",
      "name": "Can I switch plans at any time?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes. Upgrade at any time and get access to new features immediately. Downgrades take effect at the next billing cycle."
      }
    },
    {
      "@type": "Question",
      "name": "Are there any hidden fees or setup charges?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "None at all. No setup fees, no per-transaction charges, no per-invoice fees. Onboarding and training are included free with every plan."
      }
    },
    {
      "@type": "Question",
      "name": "What's the difference between Monthly and Annual plans?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Both plans give you access to the same features. Annual plans offer significant savings compared to paying monthly."
      }
    },
    {
      "@type": "Question",
      "name": "What payment methods do you accept?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We accept all major credit and debit cards, net banking, UPI, and NEFT/RTGS. All transactions are processed securely through Razorpay."
      }
    },
    {
      "@type": "Question",
      "name": "What happens to my data if I cancel?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Your data is yours. You have 30 days to export all invoices, customer data, inventory records, and reports after cancellation."
      }
    }
  ]
}
</script>

<!-- Pricing Toggle Script -->
<script>
(function(){
  var toggle = document.getElementById('pricingToggle');
  var labelMonthly = document.getElementById('toggleMonthly');
  var labelAnnual = document.getElementById('toggleAnnual');
  var badge = document.getElementById('annualBadge');
  if(!toggle) return;

  function updatePricing(isAnnual) {
    var nums = document.querySelectorAll('.price-num[data-monthly]');
    var periods = document.querySelectorAll('.price-period[data-monthly]');
    var notes = document.querySelectorAll('.price-note[data-monthly]');
    var key = isAnnual ? 'annual' : 'monthly';

    nums.forEach(function(el){ el.textContent = el.getAttribute('data-'+key); });
    periods.forEach(function(el){ el.textContent = el.getAttribute('data-'+key); });
    notes.forEach(function(el){ el.textContent = el.getAttribute('data-'+key); });

    labelMonthly.style.color = isAnnual ? 'var(--text-muted)' : 'var(--text)';
    labelAnnual.style.color = isAnnual ? 'var(--text)' : 'var(--text-muted)';
    badge.style.opacity = isAnnual ? '1' : '0';
  }

  toggle.addEventListener('change', function(){ updatePricing(this.checked); });
  labelMonthly.addEventListener('click', function(){ toggle.checked = false; updatePricing(false); });
  labelAnnual.addEventListener('click', function(){ toggle.checked = true; updatePricing(true); });
})();
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
