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
        <p class="lead mb-4">Give your sales team one place to capture leads, run follow-ups, manage the pipeline, and convert customers—without spreadsheets or missed calls.</p>
        <div class="d-flex flex-wrap gap-2 mb-3">
          <a href="<?php echo htmlspecialchars(CRM_SIGNUP_URL); ?>" class="btn btn-primary btn-lg px-4">Start Free</a>
          <a href="<?php echo htmlspecialchars(crm_url('contact')); ?>" class="btn btn-outline-primary btn-lg px-4">Book a Demo</a>
        </div>
        <p class="small text-secondary mb-0">Built for sales managers, telecallers, and owners who want a clearer path from inquiry to closed deal.</p>
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
      <div class="crm-eyebrow">Why Maz CRM</div>
      <h2 class="fw-bold">Clearer follow-ups. Fewer missed deals.</h2>
      <p class="section-lead">Replace scattered spreadsheets and chat threads with a structured sales loop—from first inquiry to won customer.</p>
    </div>
    <div class="row g-3">
      <?php
      $benefits = [
        ['fa-user-plus', 'Capture every inquiry', 'Website forms, WhatsApp, walk-ins, and imports land in one lead queue with an owner.'],
        ['fa-user-check', 'Assign leads clearly', 'Route work to the right agent so nothing sits unowned in a shared inbox.'],
        ['fa-bell', 'Follow-ups that do not slip', 'Today and overdue queues keep the next call, quote, or WhatsApp visible.'],
        ['fa-filter', 'A pipeline you can coach', 'Stages, owners, and expected value help managers see what is stuck this week.'],
        ['fa-address-book', 'Customer records with history', 'Converted leads keep notes, attempts, and context for clean handovers.'],
        ['fa-chart-line', 'Reports that answer leadership', 'Lead sources, conversion, aging, and team output without waiting for month-end.'],
      ];
      foreach ($benefits as $b):
      ?>
      <div class="col-md-6 col-lg-4">
        <div class="crm-benefit">
          <i class="fa-solid <?php echo htmlspecialchars($b[0]); ?>" aria-hidden="true"></i>
          <div>
            <h3 class="h6 fw-bold mb-1"><?php echo htmlspecialchars($b[1]); ?></h3>
            <p class="small text-secondary mb-0"><?php echo htmlspecialchars($b[2]); ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="crm-section bg-soft">
  <div class="container">
    <div class="text-center mb-4">
      <div class="crm-eyebrow">Capabilities</div>
      <h2 class="fw-bold">Everything you need to run sales</h2>
      <p class="section-lead">Explore the modules that power Maz CRM—based on the product teams use every day.</p>
    </div>
    <div class="row g-3">
      <?php
      $features = [
        ['leads', 'fa-user-plus', 'Lead Management', 'Capture, score, and assign leads from forms, WhatsApp, walk-ins, and campaigns.', crm_url('lead-management')],
        ['customers', 'fa-address-book', 'Customer Management', 'Profiles with history, outstanding context, and communication logs.', crm_url('customer-management')],
        ['pipeline', 'fa-filter', 'Sales Pipeline', 'Visual stages so every deal has an owner, next step, and expected value.', crm_url('sales-pipeline')],
        ['followups', 'fa-bell', 'Follow-ups', 'Today and overdue queues with attempt logs against each lead or deal.', crm_url('follow-ups')],
        ['tasks', 'fa-list-check', 'Tasks & Activities', 'Assign work and keep activity history tied to the right record.', crm_url('follow-ups') . '#tasks'],
        ['team', 'fa-people-group', 'Team / Agents', 'Roles, ownership, and performance visibility across your sales floor.', crm_url('features') . '#team'],
        ['reports', 'fa-chart-line', 'Reports', 'Lead sources, conversion, aging, and team reports from one hub.', crm_url('crm-reports')],
        ['history', 'fa-comments', 'Communication History', 'Calls, notes, and follow-ups stay on the record for clean handovers.', crm_url('customer-management')],
      ];
      foreach ($features as $f):
      ?>
      <div class="col-md-6 col-lg-3">
        <a href="<?php echo htmlspecialchars($f[4]); ?>" class="crm-feature-card d-block h-100">
          <div class="fi"><i class="fa-solid <?php echo htmlspecialchars($f[1]); ?>" aria-hidden="true"></i></div>
          <h3 class="h6 fw-bold"><?php echo htmlspecialchars($f[2]); ?></h3>
          <p class="small text-secondary mb-0"><?php echo htmlspecialchars($f[3]); ?></p>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center mt-4">
      <a href="<?php echo htmlspecialchars(crm_url('features')); ?>" class="btn btn-outline-primary">View all features</a>
    </div>
  </div>
</section>

<section class="crm-section">
  <div class="container">
    <div class="text-center mb-4">
      <div class="crm-eyebrow">How CRM Works</div>
      <h2 class="fw-bold">A clear path from inquiry to closed deal</h2>
    </div>
    <div class="row g-3">
      <?php
      $steps = [
        ['Capture leads', 'Website, WhatsApp, walk-ins, and imports land in one queue.'],
        ['Assign owners', 'Route to the right agent with clear status and next step.'],
        ['Follow up', 'Reminders and attempt logs keep every conversation moving.'],
        ['Move the pipeline', 'Advance deals by stage so managers can see what is stuck.'],
        ['Convert customers', 'Turn wins into contacts with full history intact.'],
        ['Track performance', 'See conversion, aging, and team output when leadership asks.'],
      ];
      foreach ($steps as $i => $step):
      ?>
      <div class="col-6 col-md-4 col-xl-2">
        <div class="crm-step h-100 text-center">
          <div class="crm-step-num"><?php echo $i + 1; ?></div>
          <h3 class="h6 fw-bold"><?php echo htmlspecialchars($step[0]); ?></h3>
          <p class="small text-secondary mb-0"><?php echo htmlspecialchars($step[1]); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center mt-4">
      <a href="<?php echo htmlspecialchars(crm_url('sales-pipeline')); ?>">See the full pipeline workflow</a>
    </div>
  </div>
</section>

<section class="crm-section bg-soft">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5">
      <div class="col-lg-5">
        <div class="crm-eyebrow">Sales Pipeline</div>
        <h2 class="fw-bold mb-3">Know where every deal stands</h2>
        <p class="text-secondary mb-3">Kanban stages from new to won help managers coach the team and forecast revenue. Each deal keeps an owner, expected value, and next activity.</p>
        <a href="<?php echo htmlspecialchars(crm_url('sales-pipeline')); ?>" class="btn btn-outline-primary">Explore sales pipeline</a>
      </div>
      <div class="col-lg-7">
        <?php include __DIR__ . '/includes/mockups/mockup-pipeline.php'; ?>
      </div>
    </div>
  </div>
</section>

<section class="crm-section">
  <div class="container">
    <div class="row align-items-center g-4 g-lg-5">
      <div class="col-lg-7 order-lg-2">
        <?php include __DIR__ . '/includes/mockups/mockup-followups.php'; ?>
      </div>
      <div class="col-lg-5 order-lg-1">
        <div class="crm-eyebrow">Follow-ups &amp; Customers</div>
        <h2 class="fw-bold mb-3">Keep the next call visible—and the history with it</h2>
        <p class="text-secondary mb-3">Today and overdue queues keep telecallers focused. Converted leads become customer records with notes, attempts, and outstanding context so handovers do not start over.</p>
        <ul class="text-secondary small mb-4">
          <li class="mb-2">Today and overdue follow-up queues</li>
          <li class="mb-2">Attempt logs against leads and deals</li>
          <li class="mb-2">Customer profiles with communication history</li>
        </ul>
        <a href="<?php echo htmlspecialchars(crm_url('follow-ups')); ?>" class="btn btn-outline-primary">Learn about follow-ups</a>
      </div>
    </div>
  </div>
</section>

<section class="crm-section bg-soft" id="preview">
  <div class="container">
    <div class="text-center mb-4">
      <div class="crm-eyebrow">Product Preview</div>
      <h2 class="fw-bold">See how Maz CRM looks in practice</h2>
    </div>
    <div class="d-flex flex-wrap justify-content-center gap-2 mb-3" role="tablist" aria-label="Product preview">
      <button type="button" class="btn btn-primary btn-sm px-3" data-crm-panel="pipeline">Pipeline</button>
      <button type="button" class="btn btn-outline-primary btn-sm px-3" data-crm-panel="leads">Leads</button>
      <button type="button" class="btn btn-outline-primary btn-sm px-3" data-crm-panel="contact">Customer</button>
      <button type="button" class="btn btn-outline-primary btn-sm px-3" data-crm-panel="followups">Follow-ups</button>
      <button type="button" class="btn btn-outline-primary btn-sm px-3" data-crm-panel="reports">Reports</button>
    </div>
    <div data-crm-panel-target="pipeline"><?php include __DIR__ . '/includes/mockups/mockup-pipeline.php'; ?></div>
    <div data-crm-panel-target="leads" hidden><?php include __DIR__ . '/includes/mockups/mockup-leads.php'; ?></div>
    <div data-crm-panel-target="contact" hidden><?php include __DIR__ . '/includes/mockups/mockup-contact.php'; ?></div>
    <div data-crm-panel-target="followups" hidden><?php include __DIR__ . '/includes/mockups/mockup-followups.php'; ?></div>
    <div data-crm-panel-target="reports" hidden><?php include __DIR__ . '/includes/mockups/mockup-report.php'; ?></div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
