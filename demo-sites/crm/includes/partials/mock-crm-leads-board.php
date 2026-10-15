<?php

declare(strict_types=1);
?>
<div class="crm-screen" aria-hidden="true">
  <div class="crm-screen__top">
    <nav class="crm-screen__tabs" aria-label="Leads views">
      <span>Overview</span>
      <span class="is-active">Leads</span>
      <span>My Followups</span>
    </nav>
    <div class="crm-screen__actions">
      <span class="crm-screen__btn crm-screen__btn--ghost">↻ Refresh</span>
      <span class="crm-screen__btn crm-screen__btn--primary">+ Create Lead</span>
      <span class="crm-screen__btn crm-screen__btn--ghost">Import leads</span>
    </div>
  </div>
  <div class="crm-screen__toolbar">
    <span class="crm-screen__search">Search leads…</span>
    <span class="crm-screen__view crm-screen__view--list" title="List"></span>
    <span class="crm-screen__view crm-screen__view--board crm-screen__view--on" title="Board"></span>
    <span class="crm-screen__filter">Actions ▾</span>
    <span class="crm-screen__filter">Status: All ▾</span>
    <span class="crm-screen__filter">Assignee: All ▾</span>
    <span class="crm-screen__filter crm-screen__filter--muted">More Filters ▾</span>
  </div>
  <p class="crm-screen__count crm-screen__count--muted">No records</p>
  <div class="crm-board crm-board--leads">
    <div class="crm-board__col">
      <header class="crm-board__head crm-board__head--new">
        <span class="crm-board__stage-icon"></span>
        <span>New</span>
        <span class="crm-board__info">i</span>
        <span class="crm-board__badge">0</span>
      </header>
      <div class="crm-board__empty">No leads in New.</div>
      <footer class="crm-board__add">+ Add Lead</footer>
    </div>
    <div class="crm-board__col">
      <header class="crm-board__head crm-board__head--assigned">
        <span class="crm-board__stage-icon"></span>
        <span>Assigned</span>
        <span class="crm-board__info">i</span>
        <span class="crm-board__badge">0</span>
      </header>
      <div class="crm-board__empty">No leads in Assigned.</div>
      <footer class="crm-board__add">+ Add Lead</footer>
    </div>
    <div class="crm-board__col">
      <header class="crm-board__head crm-board__head--contacted">
        <span class="crm-board__stage-icon"></span>
        <span>Contacted</span>
        <span class="crm-board__info">i</span>
        <span class="crm-board__badge">0</span>
      </header>
      <div class="crm-board__empty">No leads in Contacted.</div>
      <footer class="crm-board__add">+ Add Lead</footer>
    </div>
    <div class="crm-board__col">
      <header class="crm-board__head crm-board__head--qualified">
        <span class="crm-board__stage-icon"></span>
        <span>Qualified</span>
        <span class="crm-board__info">i</span>
        <span class="crm-board__badge">0</span>
      </header>
      <div class="crm-board__empty">No leads in Qualified.</div>
      <footer class="crm-board__add">+ Add Lead</footer>
    </div>
    <div class="crm-board__col crm-board__col--closed">
      <header class="crm-board__head crm-board__head--closed">
        <span class="crm-board__stage-icon"></span>
        <span>Closed</span>
        <span class="crm-board__info">i</span>
        <span class="crm-board__badge">0</span>
      </header>
      <div class="crm-board__empty">No leads in Closed.</div>
      <footer class="crm-board__add">+ Add Lead</footer>
    </div>
  </div>
</div>
