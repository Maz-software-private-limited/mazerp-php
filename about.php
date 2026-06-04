<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<!-- PAGE HERO -->
<section class="page-hero">
  <div class="container reveal">
    <span class="label"><i class="fa-solid fa-heart"></i> About Us</span>
    <h1>We help Indian businesses run smarter</h1>
    <p>MazERP was built by people who understand the daily challenges of running a business in India — GST compliance, manual billing, scattered inventory, and the constant fight to stay on top of the numbers.</p>
    <a href="#story" class="btn btn-white btn-lg">Our Story</a>
  </div>
</section>

<!-- OUR STORY -->
<section id="story">
  <div class="container">
    <div class="alt-grid reveal">
      <div class="alt-content reveal-left">
        <span class="label"><i class="fa-solid fa-book-open"></i> Our Story</span>
        <h2>Born from a real business problem</h2>
        <p class="lead">Founded in 2020, MAZ Software Solutions started with one straightforward goal: help Indian businesses manage their operations without fighting their software.</p>
        <p>Our founders experienced the frustration of manual billing, scattered inventory records, and GST compliance headaches firsthand while running their own retail operations. They couldn't find a tool that was powerful enough for real business complexity yet simple enough for a store clerk to learn in an afternoon.</p>
        <p>So they built MazERP. What began as an internal tool for one shop has grown into a platform trusted by over 10,000 businesses across India. We've processed millions of invoices, tracked billions of rupees in inventory, and saved business owners countless hours of manual work every single day.</p>
        <p>Today our team works out of Tirunelveli, Tamil Nadu. Every feature on our roadmap comes from a real customer conversation — not a competitor's feature list.</p>
      </div>
      <div class="alt-visual reveal-right">
        <div class="alt-screen">
          <div class="browser-bar"><div class="browser-dots"><span></span><span></span><span></span></div><div class="browser-url"></div></div>
          <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&h=566&fit=crop&q=80"
               alt="MazERP team collaborating in a modern office" width="900" height="566">
        </div>
        <div class="alt-float top-right" style="animation-delay:0.4s;">
          <i class="fa-solid fa-handshake" style="color:var(--emerald);"></i>
          Built in Tirunelveli
        </div>
        <div class="alt-float bot-left" style="animation-delay:0.8s;">
          <i class="fa-solid fa-users" style="color:var(--blue-light);"></i>
          10,000+ businesses served
        </div>
      </div>
    </div>
  </div>
</section>

<!-- MISSION & VALUES -->
<section class="bg-subtle">
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-compass"></i> What Drives Us</span>
      <h2>Mission &amp; values</h2>
      <p>Three principles guide every decision we make — from product features to customer support.</p>
    </div>
    <div class="feats-grid">
      <div class="feat-card reveal">
        <div class="feat-icon fi-blue">
          <i class="fa-solid fa-wand-magic-sparkles"></i>
        </div>
        <h3>Simplicity</h3>
        <p>Software should be simple enough for anyone to use on day one. We cut complexity ruthlessly. If a feature needs a manual, it needs a redesign.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon fi-green">
          <i class="fa-solid fa-shield-halved"></i>
        </div>
        <h3>Reliability</h3>
        <p>99.9% uptime, data backed up three times daily, and a support team that actually picks up the phone. Your business depends on us — we take that seriously.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon fi-amber">
          <i class="fa-solid fa-handshake"></i>
        </div>
        <h3>Transparency</h3>
        <p>No hidden fees, honest pricing, and plain English about what your subscription includes. We'd rather lose a sale than earn it with fine print.</p>
      </div>
    </div>
  </div>
</section>

<!-- STATS ROW -->
<section>
  <div class="container">
    <div class="stats-grid">
      <div class="stat-card reveal">
        <div class="stat-num c-blue" data-count="10000" data-suffix="+">0</div>
        <div>Businesses Using MazERP</div>
      </div>
      <div class="stat-card reveal">
        <div class="stat-num c-green" data-count="5" data-suffix="+">0</div>
        <div>Years in Business</div>
      </div>
      <div class="stat-card reveal">
        <div class="stat-num c-amber" data-count="50" data-suffix="+">0</div>
        <div>Team Members</div>
      </div>
      <div class="stat-card reveal">
        <div class="stat-num c-cyan" data-count="4.8">0</div>
        <div>Customer Rating (out of 5)</div>
      </div>
    </div>
  </div>
</section>

<!-- WHY CHOOSE MAZERP -->
<section>
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-trophy"></i> Why MazERP</span>
      <h2>What makes us different from other billing software</h2>
    </div>
    <div class="feats-grid">
      <div class="feat-card reveal">
        <div class="feat-icon fi-blue">
          <i class="fa-solid fa-bolt"></i>
        </div>
        <h3>Up and running in under an hour</h3>
        <p>No IT team needed. Sign up, add your products, and start billing the same day. Most businesses go live within their first session.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon fi-green">
          <i class="fa-solid fa-flag"></i>
        </div>
        <h3>Built for India, not adapted</h3>
        <p>GST compliance, e-invoicing, CGST/SGST/IGST, rupee formatting, and Indian tax rules are baked into the core — not bolted on as afterthoughts.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon fi-amber">
          <i class="fa-solid fa-headset"></i>
        </div>
        <h3>Real humans, real support</h3>
        <p>Phone, email, and WhatsApp support that responds within the hour. Onboarding and training included free with every plan, no exceptions.</p>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
