<section class="crm-section crm-section--wash" id="preview" aria-labelledby="preview-title">
  <div class="crm-wrap">
    <header class="crm-section__head crm-section__head--center">
      <p class="crm-section__kicker">Product preview</p>
      <h2 id="preview-title" class="crm-section__title">See how Maz CRM looks in practice</h2>
      <p class="crm-section__lead">UI previews mirror the Maz CRM app layout—Deals board, Leads kanban, follow-ups, contacts, and reports. Sample data only.</p>
    </header>
    <div class="crm-preview" data-preview>
      <div class="crm-preview__tabs" role="tablist" aria-label="Product screens">
        <button type="button" role="tab" id="tab-pipeline" aria-selected="true" aria-controls="panel-pipeline" data-preview-tab="pipeline">Pipeline</button>
        <button type="button" role="tab" id="tab-leads" aria-selected="false" aria-controls="panel-leads" data-preview-tab="leads">Leads</button>
        <button type="button" role="tab" id="tab-customer" aria-selected="false" aria-controls="panel-customer" data-preview-tab="customer">Customer</button>
        <button type="button" role="tab" id="tab-followups" aria-selected="false" aria-controls="panel-followups" data-preview-tab="followups">Follow-ups</button>
        <button type="button" role="tab" id="tab-reports" aria-selected="false" aria-controls="panel-reports" data-preview-tab="reports">Reports</button>
      </div>
      <div class="crm-preview__panels crm-preview__frame">
        <div role="tabpanel" id="panel-pipeline" aria-labelledby="tab-pipeline" data-preview-panel="pipeline">
          <?php $mockCompact = false; require dirname(__DIR__) . '/partials/mock-pipeline-kanban.php'; ?>
        </div>
        <div role="tabpanel" id="panel-leads" aria-labelledby="tab-leads" hidden data-preview-panel="leads">
          <?php require dirname(__DIR__) . '/partials/mock-leads-table.php'; ?>
        </div>
        <div role="tabpanel" id="panel-customer" aria-labelledby="tab-customer" hidden data-preview-panel="customer">
          <?php require dirname(__DIR__) . '/partials/mock-customer-profile.php'; ?>
        </div>
        <div role="tabpanel" id="panel-followups" aria-labelledby="tab-followups" hidden data-preview-panel="followups">
          <?php require dirname(__DIR__) . '/partials/mock-followups-list.php'; ?>
        </div>
        <div role="tabpanel" id="panel-reports" aria-labelledby="tab-reports" hidden data-preview-panel="reports">
          <?php require dirname(__DIR__) . '/partials/mock-reports.php'; ?>
        </div>
      </div>
    </div>
  </div>
</section>
