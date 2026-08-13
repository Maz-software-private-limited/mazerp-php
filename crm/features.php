<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';

$sections = [
    ['leads', 'fa-user-plus', 'Lead Management', 'Capture every inquiry, assign every owner', 'Website forms, WhatsApp, walk-ins, and CSV imports land in one queue.', 'mockup-leads.php', false],
    ['customers', 'fa-address-book', 'Customer Management', 'Profiles that remember every conversation', 'Converted leads become contacts with history, outstanding balances, and timelines.', 'mockup-contact.php', true],
    ['pipeline', 'fa-filter', 'Sales Pipeline', 'Know where every deal stands', 'Kanban stages from new to won help managers coach the team and forecast revenue.', 'mockup-pipeline.php', false],
    ['followups', 'fa-bell', 'Follow-ups & Reminders', 'Never miss the next call', 'Today and overdue queues keep telecallers focused with attempt logs.', 'mockup-followups.php', true],
    ['tasks', 'fa-list-check', 'Tasks & Activities', 'Turn promises into tracked work', 'Assign tasks to agents and keep activity tied to the right lead or deal.', 'mockup-followups.php', false],
    ['team', 'fa-people-group', 'Team / Agent Management', 'Roles that match how you sell', 'Give telecallers, field reps, and managers the right access as you grow.', 'mockup-report.php', true],
    ['reports', 'fa-chart-line', 'Reports & Analytics', 'Know what is working this week', 'Lead sources, aging, conversion, and deal forecasts — ready when leadership asks.', 'mockup-report.php', false],
    ['history', 'fa-comments', 'Communication History', 'Handovers without starting over', 'Calls, notes, and follow-up attempts stay on the record for any agent.', 'mockup-contact.php', true],
];
?>

<section class="crm-page-hero">
  <div class="container">
    <div class="crm-eyebrow">Features</div>
    <h1>CRM features built for daily sales work</h1>
    <p>Leads, customers, pipeline, follow-ups, tasks, team access, reports, and communication history — in one cloud CRM.</p>
  </div>
</section>

<section class="crm-section">
  <div class="container">
    <?php foreach ($sections as $s): ?>
      <div class="row align-items-center g-4 g-lg-5 mb-5 <?php echo $s[6] ? 'flex-lg-row-reverse' : ''; ?>" id="<?php echo htmlspecialchars($s[0]); ?>">
        <div class="col-lg-5">
          <div class="crm-eyebrow mb-2"><i class="fa-solid <?php echo htmlspecialchars($s[1]); ?> me-1"></i> <?php echo htmlspecialchars($s[2]); ?></div>
          <h2 class="fw-bold h3"><?php echo htmlspecialchars($s[3]); ?></h2>
          <p class="text-secondary"><?php echo htmlspecialchars($s[4]); ?></p>
          <a href="signup.php" class="btn btn-primary px-4">Get Started</a>
          <a href="demo.php" class="btn btn-outline-primary px-4 ms-2">Book Demo</a>
        </div>
        <div class="col-lg-7">
          <?php include __DIR__ . '/includes/mockups/' . $s[5]; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
