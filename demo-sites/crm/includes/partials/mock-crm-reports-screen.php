<?php

declare(strict_types=1);
?>
<div class="crm-screen" aria-hidden="true">
  <div class="crm-screen__top">
    <nav class="crm-screen__tabs" aria-label="Reports">
      <span class="is-active">All Reports</span>
      <span>Leads</span>
      <span>Deals</span>
      <span>Follow-ups</span>
    </nav>
    <div class="crm-screen__actions">
      <span class="crm-screen__btn crm-screen__btn--ghost">↻ Refresh</span>
      <span class="crm-screen__btn crm-screen__btn--ghost">Export</span>
    </div>
  </div>
  <div class="crm-screen__toolbar">
    <span class="crm-screen__filter">Period: This month ▾</span>
    <span class="crm-screen__filter">Branch: All ▾</span>
    <span class="crm-screen__filter">Team: All ▾</span>
  </div>
  <div class="crm-screen__body">
    <div class="crm-reports-screen">
      <header class="crm-reports-screen__head">
        <h4>Team performance</h4>
        <p>October · All branches</p>
      </header>
      <div class="crm-reports-screen__kpis">
        <article>
          <span>New leads</span>
          <strong>214</strong>
          <em class="up">+12%</em>
        </article>
        <article>
          <span>Conversion</span>
          <strong>38%</strong>
          <em class="up">+4 pts</em>
        </article>
        <article>
          <span>Pipeline value</span>
          <strong>₹42L</strong>
        </article>
        <article>
          <span>Follow-ups done</span>
          <strong>91%</strong>
          <em class="neutral">On track</em>
        </article>
      </div>
      <div class="crm-reports-screen__chart-card">
        <p class="crm-reports-screen__chart-title">New leads by week</p>
        <div class="crm-reports-screen__chart" role="img" aria-label="Sample weekly leads chart">
          <div class="crm-reports-screen__bars">
            <span style="--h:42%"></span>
            <span style="--h:58%"></span>
            <span style="--h:36%"></span>
            <span style="--h:71%"></span>
            <span style="--h:64%"></span>
            <span style="--h:52%"></span>
          </div>
          <div class="crm-reports-screen__labels">
            <span>W1</span><span>W2</span><span>W3</span><span>W4</span><span>W5</span><span>W6</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
