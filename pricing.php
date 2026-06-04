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

<!-- PRICING CARDS -->
<section style="padding:var(--sp) 0;">
  <div class="container">
    <div class="pricing-grid" style="grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));">

      <!-- Basic -->
      <div class="price-card reveal">
        <h2 class="pc-name" style="font-size:1.5rem;font-weight:700;color:var(--text);margin-bottom:8px;">Basic</h2>
        <p style="color:var(--text-muted);font-size:0.875rem;line-height:1.5;min-height:48px;">Essential tools to manage your business operations with ease</p>
        <div class="price-amount" style="margin:16px 0 8px;display:flex;align-items:baseline;gap:4px;">
          <span class="price-num" style="font-size:2.8rem;font-weight:800;color:var(--text);line-height:1;"><?php echo htmlspecialchars($loc['pricing_basic']); ?></span>
          <span class="price-period" style="color:var(--text-muted);font-size:0.875rem;">/month</span>
        </div>
        <p class="price-note" style="font-size:0.75rem;color:var(--text-muted);margin-bottom:16px;text-decoration:line-through;">Regularly <?php echo htmlspecialchars($loc['pricing_basic_orig']); ?>/mo</p>
        <a href="https://app.mazerp.com/auth/register" class="btn btn-ghost btn-lg" style="width:100%;justify-content:center;margin-bottom:20px;">Start Free Trial</a>
        
        <div style="border-top:1.5px solid var(--border);padding-top:20px;">
          <ul class="price-feats" style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:12px;font-size:0.875rem;">
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Manage: 1 Business</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> 1 User Access</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Billing &amp; Accounting</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Sales Invoice: 2000</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Purchase Invoice: 2000</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> <?php echo htmlspecialchars($loc['tax_name']); ?> Compliance Filing</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> All Accounting Reports</li>
          </ul>
        </div>
      </div>

      <!-- Standard -->
      <div class="price-card reveal">
        <h2 class="pc-name" style="font-size:1.5rem;font-weight:700;color:var(--text);margin-bottom:8px;">Standard</h2>
        <p style="color:var(--text-muted);font-size:0.875rem;line-height:1.5;min-height:48px;">Smart features for growing businesses and daily efficiency</p>
        <div class="price-amount" style="margin:16px 0 8px;display:flex;align-items:baseline;gap:4px;">
          <span class="price-num" style="font-size:2.8rem;font-weight:800;color:var(--text);line-height:1;"><?php echo htmlspecialchars($loc['pricing_std']); ?></span>
          <span class="price-period" style="color:var(--text-muted);font-size:0.875rem;">/month</span>
        </div>
        <p class="price-note" style="font-size:0.75rem;color:var(--text-muted);margin-bottom:16px;text-decoration:line-through;">Regularly <?php echo htmlspecialchars($loc['pricing_std_orig']); ?>/mo</p>
        <a href="https://app.mazerp.com/auth/register" class="btn btn-ghost btn-lg" style="width:100%;justify-content:center;margin-bottom:20px;">Start Free Trial</a>
        
        <div style="border-top:1.5px solid var(--border);padding-top:20px;">
          <ul class="price-feats" style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:12px;font-size:0.875rem;">
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Manage: 1 Business</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> 1 User Access</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Access to ERP + CRM</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Sales Invoice: 5000</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Purchase Invoice: 5000</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Manage 1 Branch</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> <?php echo htmlspecialchars($loc['tax_name']); ?> E-Way compliance</li>
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
          <span class="price-num" style="font-size:2.8rem;font-weight:800;color:var(--text);line-height:1;"><?php echo htmlspecialchars($loc['pricing_prof']); ?></span>
          <span class="price-period" style="color:var(--text-muted);font-size:0.875rem;">/month</span>
        </div>
        <p class="price-note" style="font-size:0.75rem;color:var(--text-muted);margin-bottom:16px;text-decoration:line-through;">Regularly <?php echo htmlspecialchars($loc['pricing_prof_orig']); ?>/mo</p>
        <a href="https://app.mazerp.com/auth/register" class="btn btn-primary btn-lg" style="width:100%;justify-content:center;margin-bottom:20px;">Start Free Trial</a>
        
        <div style="border-top:1.5px solid var(--border);padding-top:20px;">
          <ul class="price-feats" style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:12px;font-size:0.875rem;">
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Manage: 1 Business</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> 3 User Access</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> ERP + CRM + <?php echo htmlspecialchars($loc['payroll_title']); ?></li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Sales Invoice: 10000</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Purchase Invoice: 10000</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Manage 3 Branches</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Access to POS</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> <?php echo htmlspecialchars($loc['tax_name']); ?> Compliance (200/Yr)</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Compliance Reports (200/Yr)</li>
          </ul>
        </div>
      </div>

      <!-- Premium -->
      <div class="price-card reveal">
        <h2 class="pc-name" style="font-size:1.5rem;font-weight:700;color:var(--text);margin-bottom:8px;">Premium</h2>
        <p style="color:var(--text-muted);font-size:0.875rem;line-height:1.5;min-height:48px;">All-in-one advanced platform built for high-performance businesses</p>
        <div class="price-amount" style="margin:16px 0 8px;display:flex;align-items:baseline;gap:4px;">
          <span class="price-num" style="font-size:2.8rem;font-weight:800;color:var(--text);line-height:1;"><?php echo htmlspecialchars($loc['pricing_prem']); ?></span>
          <span class="price-period" style="color:var(--text-muted);font-size:0.875rem;">/month</span>
        </div>
        <p class="price-note" style="font-size:0.75rem;color:var(--text-muted);margin-bottom:16px;text-decoration:line-through;">Regularly <?php echo htmlspecialchars($loc['pricing_prem_orig']); ?>/mo</p>
        <a href="https://app.mazerp.com/auth/register" class="btn btn-ghost btn-lg" style="width:100%;justify-content:center;margin-bottom:20px;">Start Free Trial</a>
        
        <div style="border-top:1.5px solid var(--border);padding-top:20px;">
          <ul class="price-feats" style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:12px;font-size:0.875rem;">
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Manage: 1 Business</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> 5 User Access</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> ERP + CRM + <?php echo htmlspecialchars($loc['payroll_title']); ?></li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Sales Invoice: Unlimited</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Purchase Invoice: Unlimited</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Manage 5 Branches</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> Compliance: Unlimited</li>
            <li><i class="fa-solid fa-circle-check" style="color:var(--blue);margin-right:8px;"></i> E-Invoicing: Unlimited</li>
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
          <!-- Category Header: Access -->
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
          <tr style="border-bottom:1px solid var(--border);">
            <td style="padding:14px 16px;">Payroll Module</td>
            <td style="padding:14px 16px;text-align:center;color:var(--rose);"><i class="fa-solid fa-xmark"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--rose);"><i class="fa-solid fa-xmark"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);background:rgba(37,99,235,0.03);border-left:1px dashed var(--blue-100);border-right:1px dashed var(--blue-100);"><i class="fa-solid fa-check"></i></td>
            <td style="padding:14px 16px;text-align:center;color:var(--emerald);"><i class="fa-solid fa-check"></i></td>
          </tr>

          <!-- Category Header: Business -->
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

          <!-- Category Header: Sales -->
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

          <!-- Category Header: Inventory -->
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

<?php include __DIR__ . '/includes/footer.php'; ?>
