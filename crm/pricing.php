<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';

$plans = [
    [
        'key' => 'standard',
        'name' => 'Standard',
        'icon' => 'green',
        'icon_fa' => 'fa-seedling',
        'monthly' => '₹80',
        'yearly' => '₹800',
        'popular' => false,
        'cta_class' => 'btn-outline-primary',
        'features' => [
            '1 User',
            '2,000 Contacts',
            'Basic Reports',
            'Task Management',
            'Lead Management',
            'Email Support',
        ],
    ],
    [
        'key' => 'professional',
        'name' => 'Professional',
        'icon' => 'blue',
        'icon_fa' => 'fa-briefcase',
        'monthly' => '₹140',
        'yearly' => '₹1,400',
        'popular' => false,
        'cta_class' => 'btn-outline-primary',
        'features' => [
            '5 Users',
            '10,000 Contacts',
            'Advanced Reports',
            'Workflow Automation',
            'Sales Pipeline',
            'Priority Support',
        ],
    ],
    [
        'key' => 'premium',
        'name' => 'Premium',
        'icon' => 'pink',
        'icon_fa' => 'fa-crown',
        'monthly' => '₹240',
        'yearly' => '₹2,400',
        'popular' => true,
        'cta_class' => 'btn-crm-accent',
        'features' => [
            'Unlimited Users',
            'Unlimited Contacts',
            'Advanced Analytics',
            'Custom Fields',
            'API Access',
            'Role Permissions',
            'Priority Support',
        ],
    ],
    [
        'key' => 'enterprise',
        'name' => 'Enterprise',
        'icon' => 'indigo',
        'icon_fa' => 'fa-building',
        'monthly' => '₹260',
        'yearly' => '₹2,600',
        'popular' => false,
        'cta_class' => 'btn-outline-primary',
        'features' => [
            'Everything in Premium',
            'API Access',
            'Dedicated Account Manager',
            'Custom Onboarding',
            'Advanced Security',
            'Priority Support',
        ],
    ],
];

$faqs = [
    [
        'q' => 'Can I pay as I grow with your CRM?',
        'a' => 'Yes. Start on a smaller plan and upgrade anytime as your team, contacts, or automation needs grow. Changes apply to your next billing cycle.',
    ],
    [
        'q' => 'What payment methods do you accept?',
        'a' => 'We accept major credit/debit cards, UPI, and net banking for Indian customers. Invoices are available for annual plans.',
    ],
    [
        'q' => 'Is there a free trial?',
        'a' => 'Yes. You can start a free trial with full CRM access — no credit card required. You can also book a live demo first.',
    ],
    [
        'q' => 'Can I switch between monthly and yearly billing?',
        'a' => 'Yes. Yearly billing includes up to 20% savings. You can switch plans from your account or by contacting support.',
    ],
    [
        'q' => 'Are taxes included in the listed prices?',
        'a' => 'All prices shown are in INR and inclusive of applicable taxes unless otherwise noted for your region.',
    ],
    [
        'q' => 'Do you offer custom or enterprise contracts?',
        'a' => 'Yes. Contact our sales team for volume pricing, dedicated onboarding, and enterprise security requirements.',
    ],
    [
        'q' => 'What happens if I cancel?',
        'a' => 'You can cancel anytime. Your account remains active until the end of the current billing period. Export your data before you leave.',
    ],
    [
        'q' => 'Are WhatsApp and email marketing included?',
        'a' => 'Core CRM includes leads, pipeline, follow-ups, and reports. WhatsApp Chat and Email Marketing are available as optional add-ons.',
    ],
];
?>

<section class="crm-pricing-hero">
  <div class="container">
    <div class="crm-eyebrow">Pricing Plans</div>
    <h1>Sensational software. Sensible price.</h1>

    <div class="crm-trust-row">
      <div class="crm-trust-item"><i class="fa-regular fa-credit-card"></i> No Credit Card Required</div>
      <div class="crm-trust-item"><i class="fa-solid fa-list-check"></i> Choose Your Plan</div>
      <div class="crm-trust-item"><i class="fa-solid fa-chart-line"></i> Scale As You Grow</div>
      <div class="crm-trust-item"><i class="fa-solid fa-rotate-left"></i> Cancel Anytime</div>
    </div>

    <div class="crm-billing-toggle" id="crmBillingToggle" role="group" aria-label="Billing period">
      <button type="button" class="btn active" data-period="yearly">
        Yearly
        <span class="save-badge">Save up to 20%</span>
      </button>
      <button type="button" class="btn" data-period="monthly">Monthly</button>
    </div>
    <p class="crm-tax-note">All prices are in INR and inclusive of taxes.</p>
  </div>
</section>

<section class="crm-plans">
  <div class="container">
    <div class="row g-3 g-xl-4">
      <?php foreach ($plans as $plan): ?>
        <div class="col-md-6 col-xl-3">
          <div class="crm-plan-card <?php echo $plan['popular'] ? 'is-popular' : ''; ?>">
            <?php if ($plan['popular']): ?>
              <div class="crm-popular-banner">MOST POPULAR</div>
            <?php endif; ?>
            <div class="crm-plan-icon <?php echo htmlspecialchars($plan['icon']); ?>">
              <i class="fa-solid <?php echo htmlspecialchars($plan['icon_fa']); ?>"></i>
            </div>
            <div class="crm-plan-name"><?php echo htmlspecialchars($plan['name']); ?></div>
            <div class="crm-plan-price">
              <span class="currency">₹</span><span class="crm-price-num" data-monthly="<?php echo htmlspecialchars(ltrim(str_replace(['₹', ','], '', $plan['monthly']), '₹')); ?>" data-yearly="<?php echo htmlspecialchars(str_replace([',', '₹'], '', $plan['yearly'])); ?>"><?php echo htmlspecialchars(str_replace('₹', '', $plan['yearly'])); ?></span>
            </div>
            <div class="crm-plan-unit"><span class="crm-price-unit" data-monthly="/user/month" data-yearly="/user/year">/user/year</span></div>
            <a href="signup.php" class="btn <?php echo htmlspecialchars($plan['cta_class']); ?> w-100 mb-3">Choose Plan</a>
            <ul class="crm-plan-features">
              <?php foreach ($plan['features'] as $feat): ?>
                <li><i class="fa-solid fa-check"></i><span><?php echo htmlspecialchars($feat); ?></span></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mt-4 crm-plan-meta">
      <span><i class="fa-solid fa-circle-check text-success me-1"></i> No setup fees or hidden charges</span>
      <span>Need a custom plan? <a href="contact.php"><i class="fa-regular fa-comments me-1"></i>Contact our sales team</a></span>
    </div>
  </div>
</section>

<section class="crm-addons">
  <div class="container">
    <h2 class="text-center fw-bold mb-4">Enhance your CRM with powerful add-ons</h2>
    <div class="row g-3 mb-4">
      <div class="col-md-4">
        <div class="crm-addon-card">
          <div class="crm-addon-icon wa"><i class="fa-brands fa-whatsapp"></i></div>
          <h5 class="fw-bold">WhatsApp Chat</h5>
          <p class="text-secondary small mb-3">Talk to leads and customers on WhatsApp without leaving Maz CRM.</p>
          <a href="contact.php" class="btn btn-crm-accent btn-sm px-3">Add-on</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="crm-addon-card">
          <div class="crm-addon-icon mail"><i class="fa-solid fa-envelope"></i></div>
          <h5 class="fw-bold">Email Marketing</h5>
          <p class="text-secondary small mb-3">Send campaigns and nurture sequences tied to your CRM contacts.</p>
          <a href="contact.php" class="btn btn-crm-accent btn-sm px-3">Add-on</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="crm-addon-card">
          <div class="crm-addon-icon apps"><i class="fa-solid fa-puzzle-piece"></i></div>
          <h5 class="fw-bold">100+ Apps &amp; Integrations</h5>
          <p class="text-secondary small mb-3">Connect billing, telephony, and productivity tools your team already uses.</p>
          <a href="contact.php" class="btn btn-crm-accent btn-sm px-3">Add-on</a>
        </div>
      </div>
    </div>
    <div class="crm-marketplace-banner">
      <div class="fw-semibold">Looking for more? Explore all add-ons in our marketplace</div>
      <a href="contact.php">View All Add-ons <i class="fa-solid fa-arrow-right ms-1"></i></a>
    </div>
  </div>
</section>

<section class="crm-customers">
  <div class="container">
    <h2 class="text-center fw-bold mb-4">Join growing sales teams across India</h2>
    <div class="crm-customer-grid">
      <?php
      $chips = ['Retail', 'Wholesale', 'Pharma', 'Fashion', 'Hardware', 'Agencies', 'Real Estate', 'Services', 'Distributors', 'Startups', 'SMEs', 'Field Sales'];
      foreach ($chips as $chip):
      ?>
        <div class="crm-customer-chip"><?php echo htmlspecialchars($chip); ?></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="crm-faq">
  <div class="container" style="max-width:820px;">
    <h2 class="text-center fw-bold mb-4">Frequently Asked Questions</h2>
    <div class="accordion" id="crmPricingFaq">
      <?php foreach ($faqs as $i => $faq): ?>
        <div class="accordion-item">
          <h2 class="accordion-header" id="faqHeading<?php echo $i; ?>">
            <button class="accordion-button <?php echo $i === 0 ? '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse<?php echo $i; ?>" aria-expanded="<?php echo $i === 0 ? 'true' : 'false'; ?>" aria-controls="faqCollapse<?php echo $i; ?>">
              <?php echo htmlspecialchars($faq['q']); ?>
            </button>
          </h2>
          <div id="faqCollapse<?php echo $i; ?>" class="accordion-collapse collapse <?php echo $i === 0 ? 'show' : ''; ?>" aria-labelledby="faqHeading<?php echo $i; ?>" data-bs-parent="#crmPricingFaq">
            <div class="accordion-body"><?php echo htmlspecialchars($faq['a']); ?></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<script>
(function () {
  var root = document.getElementById('crmBillingToggle');
  if (!root) return;
  var buttons = root.querySelectorAll('[data-period]');
  function setPeriod(period) {
    buttons.forEach(function (btn) {
      btn.classList.toggle('active', btn.getAttribute('data-period') === period);
    });
    document.querySelectorAll('.crm-price-num').forEach(function (el) {
      var val = el.getAttribute('data-' + period);
      if (val) el.textContent = Number(val).toLocaleString('en-IN');
    });
    document.querySelectorAll('.crm-price-unit').forEach(function (el) {
      var val = el.getAttribute('data-' + period);
      if (val) el.textContent = val;
    });
  }
  buttons.forEach(function (btn) {
    btn.addEventListener('click', function () {
      setPeriod(btn.getAttribute('data-period'));
    });
  });
})();
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
