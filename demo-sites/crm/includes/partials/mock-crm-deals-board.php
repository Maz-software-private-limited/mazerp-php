<?php

declare(strict_types=1);
?>
<div class="crm-screen" aria-hidden="true">
  <div class="crm-screen__top">
    <nav class="crm-screen__tabs" aria-label="Deals views">
      <span>Overview</span>
      <span class="is-active">Deals</span>
      <span>Pipeline</span>
    </nav>
    <div class="crm-screen__actions">
      <span class="crm-screen__btn crm-screen__btn--ghost">↻ Refresh</span>
      <span class="crm-screen__btn crm-screen__btn--ghost">Pipeline overview</span>
      <span class="crm-screen__btn crm-screen__btn--primary">+ Create Deal</span>
      <span class="crm-screen__btn crm-screen__btn--ghost">Import deals</span>
    </div>
  </div>
  <div class="crm-screen__toolbar">
    <span class="crm-screen__search">Search deals…</span>
    <span class="crm-screen__view crm-screen__view--board crm-screen__view--on" title="Board"></span>
    <span class="crm-screen__view crm-screen__view--list" title="List"></span>
    <span class="crm-screen__filter">Actions ▾</span>
    <span class="crm-screen__filter">Stage: All ▾</span>
    <span class="crm-screen__filter">Assignee: All ▾</span>
    <span class="crm-screen__filter">Source: All ▾</span>
    <span class="crm-screen__filter crm-screen__filter--muted">More Filters ▾</span>
  </div>
  <p class="crm-screen__count"><strong>1</strong> deal</p>
  <div class="crm-board crm-board--deals">
    <div class="crm-board__col">
      <header class="crm-board__head crm-board__head--new">
        <span class="crm-board__stage-icon" aria-hidden="true"></span>
        <span>New</span>
        <span class="crm-board__badge">1</span>
      </header>
      <article class="crm-board__card">
        <p class="crm-board__card-title">ANCY VINCENT ( Shaj )</p>
        <div class="crm-board__card-actions">
          <span class="crm-board__card-action crm-board__card-action--call" title="Call"></span>
          <span class="crm-board__card-action crm-board__card-action--mail" title="Email"></span>
          <span class="crm-board__card-action crm-board__card-action--chat" title="Message"></span>
          <span class="crm-board__card-action crm-board__card-action--calendar" title="Schedule"></span>
        </div>
      </article>
      <footer class="crm-board__add">+ Add Deal</footer>
    </div>
    <div class="crm-board__col">
      <header class="crm-board__head crm-board__head--contacted">
        <span class="crm-board__stage-icon"></span>
        <span>Contacted</span>
        <span class="crm-board__badge">0</span>
      </header>
      <div class="crm-board__empty">No deals in Contacted.</div>
      <footer class="crm-board__add">+ Add Deal</footer>
    </div>
    <div class="crm-board__col">
      <header class="crm-board__head crm-board__head--proposal">
        <span class="crm-board__stage-icon"></span>
        <span>Proposal</span>
        <span class="crm-board__badge">0</span>
      </header>
      <div class="crm-board__empty">No deals in Proposal.</div>
      <footer class="crm-board__add">+ Add Deal</footer>
    </div>
    <div class="crm-board__col">
      <header class="crm-board__head crm-board__head--negotiation">
        <span class="crm-board__stage-icon"></span>
        <span>Negotiation</span>
        <span class="crm-board__badge">0</span>
      </header>
      <div class="crm-board__empty">No deals in Negotiation.</div>
      <footer class="crm-board__add">+ Add Deal</footer>
    </div>
    <div class="crm-board__col">
      <header class="crm-board__head crm-board__head--won">
        <span class="crm-board__stage-icon"></span>
        <span>Won</span>
        <span class="crm-board__badge">0</span>
      </header>
      <div class="crm-board__empty">No deals in Won.</div>
      <footer class="crm-board__add">+ Add Deal</footer>
    </div>
  </div>
</div>
