<?php

declare(strict_types=1);
?>
<div class="crm-screen" aria-hidden="true">
  <div class="crm-screen__top">
    <nav class="crm-screen__tabs" aria-label="Follow-up views">
      <span>Overview</span>
      <span>Leads</span>
      <span class="is-active">My Followups</span>
    </nav>
    <div class="crm-screen__actions">
      <span class="crm-screen__btn crm-screen__btn--ghost">↻ Refresh</span>
      <span class="crm-screen__btn crm-screen__btn--primary">+ Schedule follow-up</span>
    </div>
  </div>
  <div class="crm-screen__toolbar">
    <span class="crm-screen__search">Search follow-ups…</span>
    <span class="crm-screen__filter">Assignee: All ▾</span>
    <span class="crm-screen__filter">Outcome: All ▾</span>
    <span class="crm-screen__filter crm-screen__filter--muted">More Filters ▾</span>
  </div>
  <div class="crm-screen__body">
    <div class="crm-follow-screen__chips">
      <span class="crm-follow-screen__chip is-on">Today <em>6</em></span>
      <span class="crm-follow-screen__chip">Overdue <em>2</em></span>
      <span class="crm-follow-screen__chip">Scheduled</span>
    </div>
    <div class="crm-follow-screen__panel">
      <ul class="crm-follow-screen__list">
        <li class="is-overdue">
          <div class="crm-follow-screen__time">11:00</div>
          <div>
            <p class="crm-follow-screen__title">Call · Nova Pharma</p>
            <p class="crm-follow-screen__meta">Priya S. · Outcome pending</p>
          </div>
          <span class="crm-follow-screen__badge crm-follow-screen__badge--warn">Overdue</span>
        </li>
        <li>
          <div class="crm-follow-screen__time">14:00</div>
          <div>
            <p class="crm-follow-screen__title">Send quote · Greenfield Homes</p>
            <p class="crm-follow-screen__meta">Arun K. · Deal in Proposal</p>
          </div>
          <span class="crm-follow-screen__badge">Today</span>
        </li>
        <li>
          <div class="crm-follow-screen__time">16:30</div>
          <div>
            <p class="crm-follow-screen__title">WhatsApp · Lotus Agencies</p>
            <p class="crm-follow-screen__meta">Meena R. · Check-in on proposal</p>
          </div>
          <span class="crm-follow-screen__badge">Today</span>
        </li>
        <li class="is-muted">
          <div class="crm-follow-screen__time">Tmr</div>
          <div>
            <p class="crm-follow-screen__title">Demo rematch · Orbit Agencies</p>
            <p class="crm-follow-screen__meta">Priya S. · Calendar hold</p>
          </div>
          <span class="crm-follow-screen__badge crm-follow-screen__badge--muted">Scheduled</span>
        </li>
      </ul>
    </div>
  </div>
</div>
