<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<section class="crm-hero-home">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5">
      <div class="col-lg-5">
        <div class="crm-eyebrow mb-2">Maz CRM</div>
        <h1 class="mb-3">Manage Leads. Grow Relationships. Close More Deals.</h1>
        <p class="lead mb-4">Give your sales team one place to capture leads, run follow-ups, manage the pipeline, and convert customers — without spreadsheets or missed calls.</p>
        <div class="d-flex flex-wrap gap-2">
          <a href="signup.php" class="btn btn-primary btn-lg px-4">Get Started</a>
          <a href="demo.php" class="btn btn-outline-primary btn-lg px-4">Book a Demo</a>
        </div>
      </div>
      <div class="col-lg-7">
        <?php include __DIR__ . '/includes/mockups/mockup-pipeline.php'; ?>
      </div>
    </div>
  </div>
</section>

<section class="crm-section">
  <div class="container">
    <div class="text-center mb-4">
      <div class="crm-eyebrow">Key CRM Features</div>
      <h2 class="fw-bold">Everything your sales team needs</h2>
      <p class="text-secondary mx-auto" style="max-width:36rem;">From first inquiry to closed deal — leads, customers, pipeline, follow-ups, and reports in one CRM.</p>
    </div>
    <div class="row g-3">
      <?php
      $features = [
        ['id' => 'leads', 'icon' => 'fa-user-plus', 'title' => 'Lead Management', 'text' => 'Capture, score, and assign leads from forms, WhatsApp, walk-ins, and campaigns.'],
        ['id' => 'customers', 'icon' => 'fa-address-book', 'title' => 'Customer Management', 'text' => 'Profiles with purchase history, outstanding balance, and communication logs.'],
        ['id' => 'pipeline', 'icon' => 'fa-filter', 'title' => 'Sales Pipeline', 'text' => 'Visual stages so every deal has an owner, next step, and expected value.'],
        ['id' => 'followups', 'icon' => 'fa-bell', 'title' => 'Follow-ups & Reminders', 'text' => 'Today and overdue queues keep your team on track.'],
        ['id' => 'tasks', 'icon' => 'fa-list-check', 'title' => 'Tasks & Activities', 'text' => 'Assign work and keep activity history against every lead and deal.'],
        ['id' => 'team', 'icon' => 'fa-people-group', 'title' => 'Team / Agent Management', 'text' => 'Roles, ownership, and performance visibility across your sales floor.'],
        ['id' => 'reports', 'icon' => 'fa-chart-line', 'title' => 'Reports & Analytics', 'text' => 'Lead sources, conversion rates, aging, and team reports on demand.'],
        ['id' => 'history', 'icon' => 'fa-comments', 'title' => 'Communication History', 'text' => 'Calls, notes, and follow-ups stay on the record for clean handovers.'],
      ];
      foreach ($features as $f):
      ?>
      <div class="col-md-6 col-lg-3">
        <a href="features.php#<?php echo htmlspecialchars($f['id']); ?>" class="crm-feature-card d-block h-100">
          <div class="fi"><i class="fa-solid <?php echo htmlspecialchars($f['icon']); ?>"></i></div>
          <h3 class="h6 fw-bold"><?php echo htmlspecialchars($f['title']); ?></h3>
          <p class="small text-secondary mb-0"><?php echo htmlspecialchars($f['text']); ?></p>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="crm-section bg-soft">
  <div class="container">
    <div class="text-center mb-4">
      <div class="crm-eyebrow">How It Works</div>
      <h2 class="fw-bold">From inquiry to closed deal</h2>
    </div>
    <div class="row g-3">
      <?php
      $steps = [
        ['Capture leads', 'Website, WhatsApp, walk-ins, and imports land in one queue.'],
        ['Assign leads', 'Route to the right agent with clear ownership and status.'],
        ['Follow up', 'Reminders and attempt logs keep every conversation moving.'],
        ['Convert customers', 'Turn wins into contacts and deals with full history intact.'],
        ['Track performance', 'See conversion, aging, and team output in real time.'],
      ];
      foreach ($steps as $i => $step):
      ?>
      <div class="col-md">
        <div class="crm-step text-center h-100">
          <div class="rounded-circle bg-primary text-white fw-bold d-inline-flex align-items-center justify-content-center mb-2" style="width:32px;height:32px;font-size:0.85rem;"><?php echo $i + 1; ?></div>
          <h3 class="h6 fw-bold"><?php echo htmlspecialchars($step[0]); ?></h3>
          <p class="small text-secondary mb-0"><?php echo htmlspecialchars($step[1]); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="crm-section" id="preview">
  <div class="container">
    <div class="text-center mb-4">
      <div class="crm-eyebrow">Dashboard Preview</div>
      <h2 class="fw-bold">See the product before you sign up</h2>
    </div>
    <div class="crm-preview-tabs d-flex flex-wrap justify-content-center gap-2 mb-3" role="tablist">
      <button type="button" class="btn btn-primary btn-sm px-3" data-panel="pipeline">Pipeline</button>
      <button type="button" class="btn btn-outline-primary btn-sm px-3" data-panel="leads">Leads</button>
      <button type="button" class="btn btn-outline-primary btn-sm px-3" data-panel="contact">Customer</button>
      <button type="button" class="btn btn-outline-primary btn-sm px-3" data-panel="followups">Follow-ups</button>
      <button type="button" class="btn btn-outline-primary btn-sm px-3" data-panel="reports">Reports</button>
    </div>
    <div class="crm-preview-panel is-active" id="panel-pipeline"><?php include __DIR__ . '/includes/mockups/mockup-pipeline.php'; ?></div>
    <div class="crm-preview-panel" id="panel-leads"><?php include __DIR__ . '/includes/mockups/mockup-leads.php'; ?></div>
    <div class="crm-preview-panel" id="panel-contact"><?php include __DIR__ . '/includes/mockups/mockup-contact.php'; ?></div>
    <div class="crm-preview-panel" id="panel-followups"><?php include __DIR__ . '/includes/mockups/mockup-followups.php'; ?></div>
    <div class="crm-preview-panel" id="panel-reports"><?php include __DIR__ . '/includes/mockups/mockup-report.php'; ?></div>
  </div>
</section>

<section class="crm-section bg-soft">
  <div class="container">
    <div class="text-center mb-4">
      <div class="crm-eyebrow">Why Maz CRM</div>
      <h2 class="fw-bold">Built for teams that need clarity</h2>
    </div>
    <div class="row g-3">
      <?php
      $whys = [
        ['fa-hand-pointer', 'Easy to use', 'Clean screens for leads, follow-ups, and pipeline.'],
        ['fa-cloud', 'Cloud-based', 'Work from browser or phone — always in sync.'],
        ['fa-people-group', 'Multi-user support', 'Roles and assignments for managers and agents.'],
        ['fa-bolt', 'Automation', 'Reminders and status flows keep follow-ups consistent.'],
        ['fa-chart-column', 'Real-time reports', 'Conversion and aging without waiting for month-end.'],
        ['fa-lock', 'Secure data', 'Organization-scoped access and role permissions.'],
      ];
      foreach ($whys as $w):
      ?>
      <div class="col-md-6 col-lg-4">
        <div class="crm-why-item h-100">
          <i class="fa-solid <?php echo htmlspecialchars($w[0]); ?>"></i>
          <h3 class="h6 fw-bold"><?php echo htmlspecialchars($w[1]); ?></h3>
          <p class="small text-secondary mb-0"><?php echo htmlspecialchars($w[2]); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="crm-section">
  <div class="container">
    <div class="text-center mb-4">
      <div class="crm-eyebrow">Industries</div>
      <h2 class="fw-bold">CRM that fits how you sell</h2>
    </div>
    <div class="row g-3">
      <?php
      $industries = [
        ['retail', 'fa-store', 'Retail'],
        ['real-estate', 'fa-house', 'Real Estate'],
        ['agencies', 'fa-bullhorn', 'Agencies'],
        ['service', 'fa-screwdriver-wrench', 'Service Businesses'],
        ['distributors', 'fa-truck', 'Distributors'],
        ['b2b', 'fa-handshake', 'B2B Sales Teams'],
      ];
      foreach ($industries as $ind):
      ?>
      <div class="col-md-6 col-lg-4">
        <a href="solutions.php#<?php echo htmlspecialchars($ind[0]); ?>" class="crm-industry-card d-block h-100">
          <i class="fa-solid <?php echo htmlspecialchars($ind[1]); ?>"></i>
          <h3 class="h6 fw-bold mb-0"><?php echo htmlspecialchars($ind[2]); ?></h3>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center mt-4">
      <a href="pricing.php" class="btn btn-primary px-4">View Pricing</a>
      <a href="demo.php" class="btn btn-outline-primary px-4 ms-2">Book a Demo</a>
    </div>
  </div>
</section>

<section class="crm-section bg-soft">
  <div class="container" style="max-width:820px;">
    <div class="text-center mb-4">
      <div class="crm-eyebrow">FAQ</div>
      <h2 class="fw-bold">CRM questions, answered</h2>
    </div>
    <div class="accordion crm-faq" id="homeFaq">
      <?php
      $homeFaqs = [
        ['Can I import my existing leads?', 'Yes. Import leads and contacts from Excel or CSV. Our team can help with bulk migration during onboarding.'],
        ['Does the CRM work on mobile?', 'Yes. Maz CRM runs in any modern mobile browser so field reps can update leads and follow-ups on the go.'],
        ['Is there a free trial?', 'Yes. Start free with full CRM access — no credit card required.'],
      ];
      foreach ($homeFaqs as $i => $faq):
      ?>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button <?php echo $i ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#homeFaq<?php echo $i; ?>">
            <?php echo htmlspecialchars($faq[0]); ?>
          </button>
        </h2>
        <div id="homeFaq<?php echo $i; ?>" class="accordion-collapse collapse <?php echo $i === 0 ? 'show' : ''; ?>" data-bs-parent="#homeFaq">
          <div class="accordion-body"><?php echo htmlspecialchars($faq[1]); ?></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="crm-section">
  <div class="container text-center">
    <h2 class="fw-bold mb-2">Ready to simplify your sales process?</h2>
    <p class="text-secondary mb-4">Start your free trial today — or book a live walkthrough with our team.</p>
    <a href="signup.php" class="btn btn-primary btn-lg px-4">Start Your Free Trial</a>
    <a href="demo.php" class="btn btn-outline-primary btn-lg px-4 ms-2">Book a Demo</a>
  </div>
</section>

<script>
(function () {
  var tabs = document.querySelectorAll('.crm-preview-tabs [data-panel]');
  var panels = document.querySelectorAll('.crm-preview-panel');
  tabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      var id = tab.getAttribute('data-panel');
      tabs.forEach(function (t) {
        t.classList.remove('btn-primary');
        t.classList.add('btn-outline-primary');
      });
      tab.classList.remove('btn-outline-primary');
      tab.classList.add('btn-primary');
      panels.forEach(function (p) { p.classList.remove('is-active'); });
      var panel = document.getElementById('panel-' + id);
      if (panel) panel.classList.add('is-active');
    });
  });
})();
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
