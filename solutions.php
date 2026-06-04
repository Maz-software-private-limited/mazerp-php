<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<!-- PAGE HERO -->
<section class="page-hero">
  <div class="container reveal">
    <span class="label"><i class="fa-solid fa-building"></i> Solutions</span>
    <h1>Built for the way your industry works</h1>
    <p>MazERP isn't generic software adapted for your business — it's pre-configured for your industry from day one. Retail, supermarkets, pharmacies, hardware, and more.</p>
    <a href="contact.php" class="btn btn-white btn-lg">Book an Industry Demo</a>
  </div>
</section>

<!-- RETAIL -->
<section id="retail">
  <div class="container">
    <div class="sol-block reveal">
      <div class="sol-layout">
        <div class="sol-info">
          <span class="label"><i class="fa-solid fa-shirt"></i> Retail Stores</span>
          <h2>Fast billing, accurate stock, and happier customers</h2>
          <p class="lead">Whether you run a clothing boutique, electronics shop, or general store, MazERP gives you the speed and accuracy to serve more customers with fewer errors.</p>
          <div class="sol-feats">
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Quick billing with barcode scanning</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Real-time inventory tracking</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Customer loyalty management</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> GST-compliant invoicing</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Daily sales reports</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Product variants and sizes</div>
          </div>
          <a href="contact.php" class="btn btn-primary">See Retail Solution</a>
        </div>
        <div class="sol-visual">
          <div class="sol-screen">
            <div class="browser-bar"><div class="browser-dots"><span></span><span></span><span></span></div><div class="browser-url"></div></div>
            <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=900&h=566&fit=crop&q=80"
                 alt="Modern retail store with organized shelves and POS counter"
                 width="900" height="566">
          </div>
          <div class="sol-float top-right">
            <i class="fa-solid fa-bag-shopping" style="color:var(--blue-light);"></i>
            Quick POS billing
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SUPERMARKETS -->
<section id="supermarkets">
  <div class="container">
    <div class="sol-block reveal">
      <div class="sol-layout">
        <div class="sol-info">
          <span class="label"><i class="fa-solid fa-cart-shopping"></i> Supermarkets</span>
          <h2>High-volume billing with barcode scanning and multi-counter support</h2>
          <p class="lead">Handle thousands of SKUs, multiple billing counters, and high transaction volumes without breaking a sweat. Expiry tracking built in for perishables.</p>
          <div class="sol-feats">
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> High-speed barcode billing</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Multiple billing counters</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Expiry date tracking for perishables</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Supplier and purchase management</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Scheme and discount management</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Consolidated multi-branch reports</div>
          </div>
          <a href="contact.php" class="btn btn-primary">See Supermarket Solution</a>
        </div>
        <div class="sol-visual">
          <div class="sol-screen">
            <div class="browser-bar"><div class="browser-dots"><span></span><span></span><span></span></div><div class="browser-url"></div></div>
            <img src="https://images.unsplash.com/photo-1604719312566-8912e9227c6a?w=900&h=566&fit=crop&q=80"
                 alt="Supermarket aisle with products on shelves"
                 width="900" height="566">
          </div>
          <div class="sol-float top-right">
            <i class="fa-solid fa-barcode" style="color:var(--amber);"></i>
            Multi-counter scanning
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PHARMACIES -->
<section id="pharmacies" class="bg-subtle">
  <div class="container">
    <div class="sol-block reveal">
      <div class="sol-layout" style="direction:rtl;">
        <div class="sol-info" style="direction:ltr;">
          <span class="label"><i class="fa-solid fa-pills"></i> Pharmacies &amp; Medical Shops</span>
          <h2>Batch tracking, expiry alerts, and GST-ready billing for medicines</h2>
          <p class="lead">Pharmacy-specific features like batch and expiry management, medicine stock tracking, and automatic GST invoicing. Stay compliant while serving patients faster.</p>
          <div class="sol-feats">
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Batch and expiry date management</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Drug inventory tracking</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Automatic expiry alerts (90 days)</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> GST-compliant medicine invoicing</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Distributor purchase management</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Low-stock reorder alerts</div>
          </div>
          <a href="contact.php" class="btn btn-primary">See Pharmacy Solution</a>
        </div>
        <div class="sol-visual" style="direction:ltr;">
          <div class="sol-screen">
            <div class="browser-bar"><div class="browser-dots"><span></span><span></span><span></span></div><div class="browser-url"></div></div>
            <img src="https://images.unsplash.com/photo-1585435557343-3b092031a831?w=900&h=566&fit=crop&q=80"
                 alt="Pharmacy shelves with medicine bottles"
                 width="900" height="566">
          </div>
          <div class="sol-float bot-right">
            <i class="fa-solid fa-pills" style="color:var(--rose);"></i>
            Batch &amp; expiry alerts
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- HARDWARE -->
<section id="hardware">
  <div class="container">
    <div class="sol-block reveal">
      <div class="sol-layout">
        <div class="sol-info">
          <span class="label"><i class="fa-solid fa-hammer"></i> Hardware &amp; Building Materials</span>
          <h2>Product variants, bulk inventory, and credit tracking made simple</h2>
          <p class="lead">Handle thousands of product variants and sizes, manage bulk inventory, track credit customers, and see profit reports by product category. Built for the complexity of hardware retail.</p>
          <div class="sol-feats">
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Product variants by size and grade</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Bulk inventory management</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Credit and outstanding tracking</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Payment reminder automation</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Category-wise profit reports</div>
            <div class="sol-feat-item"><i class="fa-solid fa-check"></i> Supplier ledger management</div>
          </div>
          <a href="contact.php" class="btn btn-primary">See Hardware Solution</a>
        </div>
        <div class="sol-visual">
          <div class="sol-screen">
            <div class="browser-bar"><div class="browser-dots"><span></span><span></span><span></span></div><div class="browser-url"></div></div>
            <img src="https://images.unsplash.com/photo-1504148455328-c376907d081c?w=900&h=566&fit=crop&q=80"
                 alt="Hardware store with tools and building supplies"
                 width="900" height="566">
          </div>
          <div class="sol-float top-right">
            <i class="fa-solid fa-screwdriver-wrench" style="color:var(--purple);"></i>
            Variants &amp; credit tracking
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="bg-subtle">
  <div class="container">
    <div class="section-head reveal">
      <span class="label"><i class="fa-solid fa-star"></i> Customer Stories</span>
      <h2>Businesses like yours are already running on MazERP</h2>
    </div>
    <div class="testi-grid">
      <div class="testi-card reveal">
        <div class="testi-quote"><i class="fa-solid fa-quote-left"></i></div>
        <div class="testi-stars">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
        </div>
        <p class="testi-text">We switched from manual billing to MazERP and billing time dropped from 5 minutes to 30 seconds per customer. Stock accuracy went from 70% to 98%. Honestly didn't expect results this fast.</p>
        <div class="testi-author">
          <strong>Karthik R.</strong>
          <span>Clothing Retailer, Coimbatore</span>
        </div>
      </div>
      <div class="testi-card reveal">
        <div class="testi-quote"><i class="fa-solid fa-quote-left"></i></div>
        <div class="testi-stars">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
        </div>
        <p class="testi-text">The expiry tracking feature alone saved us from writing off nearly ₹2 lakh in expired medicines. MazERP sends alerts 90 days early. We return stock to distributors on time now.</p>
        <div class="testi-author">
          <strong>Dr. Meena S.</strong>
          <span>Medical Shop Owner, Tirunelveli</span>
        </div>
      </div>
      <div class="testi-card reveal">
        <div class="testi-quote"><i class="fa-solid fa-quote-left"></i></div>
        <div class="testi-stars">
          <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
        </div>
        <p class="testi-text">Running 4 outlets used to mean a 3-day consolidation exercise every month. Now I see all-store revenue in real time on my phone. MazERP paid for itself in the first month.</p>
        <div class="testi-author">
          <strong>Suresh M.</strong>
          <span>Supermarket Chain Owner, Tamil Nadu</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section>
  <div class="container reveal" style="text-align:center;padding:60px 20px;">
    <span class="label"><i class="fa-solid fa-rocket"></i> Get Started</span>
    <h2>Ready to see MazERP for your industry?</h2>
    <p style="max-width:540px;margin:0 auto 32px;">Book a free demo tailored to your business type. We'll walk you through exactly how MazERP works for your specific industry — no generic slides, just your workflow.</p>
    <a href="contact.php" class="btn btn-primary btn-xl">Book a Free Demo</a>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
