<?php

declare(strict_types=1);
?>
<div class="crm-screen" aria-hidden="true">
  <div class="crm-screen__top">
    <nav class="crm-screen__tabs" aria-label="Contacts views">
      <span class="is-active">Contacts</span>
      <span>Companies</span>
    </nav>
    <div class="crm-screen__actions">
      <span class="crm-screen__btn crm-screen__btn--ghost">↻ Refresh</span>
      <span class="crm-screen__btn crm-screen__btn--primary">+ Create contact</span>
    </div>
  </div>
  <div class="crm-screen__toolbar">
    <span class="crm-screen__search">Search contacts…</span>
    <span class="crm-screen__filter">Status: All ▾</span>
    <span class="crm-screen__filter">Owner: All ▾</span>
  </div>
  <div class="crm-screen__body">
    <div class="crm-customer-screen">
      <header class="crm-customer-screen__header">
        <div class="crm-customer-screen__avatar">RK</div>
        <div class="crm-customer-screen__identity">
          <h4>Ramesh Kumar</h4>
          <p>Metro Distributors · Decision maker</p>
          <p class="crm-customer-screen__meta">+91 98XXX XXX21 · ramesh@metro-dist.in</p>
          <div class="crm-customer-screen__tags">
            <span class="crm-status crm-status--won">Active customer</span>
            <span class="crm-customer-screen__due">Outstanding ₹24,500</span>
          </div>
        </div>
        <div class="crm-customer-screen__quick">
          <span class="crm-screen__btn crm-screen__btn--ghost">Log call</span>
          <span class="crm-screen__btn crm-screen__btn--primary">Schedule follow-up</span>
        </div>
      </header>
      <div class="crm-customer-screen__grid">
        <section class="crm-customer-screen__card">
          <h5>Activity timeline</h5>
          <ul class="crm-customer-screen__timeline">
            <li>
              <time>Today 10:24</time>
              <strong>Call logged</strong>
              <span>Credit terms discussed with finance.</span>
            </li>
            <li>
              <time>Yesterday</time>
              <strong>Invoice #INV-2041</strong>
              <span>₹78,400 · Sent to accounts.</span>
            </li>
            <li>
              <time>2 days ago</time>
              <strong>WhatsApp</strong>
              <span>Quote v2 shared · Viewed.</span>
            </li>
            <li>
              <time>12 days ago</time>
              <strong>Converted from lead</strong>
              <span>Referral · Owner: Meena R.</span>
            </li>
          </ul>
        </section>
        <section class="crm-customer-screen__card crm-customer-screen__card--side">
          <h5>Open deals</h5>
          <p class="crm-customer-screen__deal">Metro expansion · <strong>₹2.4L</strong> · Proposal</p>
          <h5>Next follow-up</h5>
          <p class="crm-customer-screen__next">Payment reminder · Friday 3:00 PM</p>
          <h5>Owner</h5>
          <p class="crm-customer-screen__next">Meena R.</p>
        </section>
      </div>
    </div>
  </div>
</div>
