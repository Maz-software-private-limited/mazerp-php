<section class="crm-section crm-section--wash" id="pipeline" aria-labelledby="pipeline-title">
  <div class="crm-wrap crm-split">
    <div class="crm-split__copy">
      <p class="crm-section__kicker">Sales pipeline</p>
      <h2 id="pipeline-title" class="crm-section__title">Know where every deal stands</h2>
      <p class="crm-section__lead">Use the same board your team sees in the app: Overview, Deals, and Pipeline tabs, filters for stage and assignee, and columns for New, Contacted, Proposal, Negotiation, and Won—with create, import, and per-column add actions.</p>
      <a class="crm-btn crm-btn--outline" href="<?= e(section_url('preview')) ?>">Explore sales pipeline</a>
    </div>
    <div class="crm-split__visual">
      <?php $mockCompact = false; require dirname(__DIR__) . '/partials/mock-pipeline-kanban.php'; ?>
    </div>
  </div>
</section>
