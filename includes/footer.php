<?php
/**
 * MazERP v2 - Footer
 * CTA banner, footer nav, floating action buttons, exit intent popup
 */
?>

<!-- CTA Banner -->
<section class="cta-banner reveal">
  <div class="container">
    <div class="cta-inner">
      <h2>Ready to simplify your entire business?</h2>
      <p>Join 10,000+ businesses running smarter with MazERP. ERP, CRM, and Accounting — all in one platform.</p>
      <div class="cta-btns">
        <a href="https://app.mazerp.com/auth/register" class="btn btn-cta btn-lg">Start Free Trial — It's Free</a>
        <a href="contact.php" class="btn btn-cta-ghost btn-lg">
          <i class="fa-solid fa-calendar-check"></i> Book a Demo
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="site-footer">
  <div class="container">
    <div class="footer-top">

      <!-- Brand column -->
      <div class="footer-brand">
        <a href="index.php" aria-label="MazERP home" style="display: inline-block; align-self: flex-start; background: #fff; padding: 6px 12px; border-radius: 8px; margin-bottom: 16px;">
          <img src="<?php echo LOGO_ALT_URL; ?>" alt="MazERP" style="display: block; width: 62px; height: 32px; object-fit: cover; object-position: left;">
        </a>
        <p>Maz ERP empowers businesses with smart, integrated solutions for managing finance, operations, and inventory.</p>
        <div class="footer-socials">
          <a href="#" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
          <a href="#" aria-label="Twitter / X"><i class="fa-brands fa-x-twitter"></i></a>
          <a href="#" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
          <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
        </div>
      </div>

      <!-- Quick Links column -->
      <div class="footer-col">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="features.php">Features</a></li>
          <li><a href="solutions.php">Solutions</a></li>
          <li><a href="pricing.php">Pricing</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </div>

      <!-- Products column -->
      <div class="footer-col">
        <h3>Products</h3>
        <ul>
          <li><a href="erp.php"><i class="fa-solid fa-layer-group"></i> ERP</a></li>
          <li><a href="crm.php"><i class="fa-solid fa-users"></i> CRM</a></li>
          <li><a href="accounting.php"><i class="fa-solid fa-calculator"></i> Accounting</a></li>
        </ul>
      </div>

      <!-- Solutions column -->
      <div class="footer-col">
        <h3>Solutions</h3>
        <ul>
          <li><a href="solutions.php#retail">Retail Stores</a></li>
          <li><a href="solutions.php#supermarkets">Supermarkets</a></li>
          <li><a href="solutions.php#pharmacies">Pharmacies</a></li>
          <li><a href="solutions.php#hardware">Hardware Shops</a></li>
        </ul>
      </div>

      <!-- Contact column -->
      <div class="footer-col footer-col-contact">
        <h3>Contact</h3>
        <ul>
          <li>
            <i class="fa-solid fa-phone"></i>
            <a href="tel:<?php echo preg_replace('/\s+/', '', CONTACT_PHONE); ?>"><?php echo CONTACT_PHONE; ?></a>
          </li>
          <li>
            <i class="fa-solid fa-envelope"></i>
            <a href="mailto:<?php echo CONTACT_EMAIL; ?>"><?php echo CONTACT_EMAIL; ?></a>
          </li>
        </ul>
      </div>

    </div><!-- /.footer-top -->

    <div class="footer-bottom">
      <p class="footer-copyright">&copy; <?php echo date('Y'); ?> MAZ Software Solutions. All Rights Reserved.</p>
      <p class="footer-credit">Made with <i class="fa-solid fa-heart" style="color: var(--rose);"></i> by <a href="https://kasadaratech.in" target="_blank" style="color: inherit; text-decoration: underline;">kasadaratech.in</a></p>
      <div class="footer-legal">
        <a href="terms-of-service.php">Terms of Service</a>
        <a href="privacy-policy.php">Privacy Policy</a>
      </div>
    </div>

  </div>
</footer>

<!-- Floating action buttons -->
<div class="fab">
  <a href="https://wa.me/<?php echo WHATSAPP_NUMBER; ?>?text=Hi%20MazERP%2C%20I%20am%20interested%20in%20your%20software"
     class="fab-wa" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
    <i class="fa-brands fa-whatsapp"></i>
    <span>WhatsApp</span>
  </a>
  <a href="contact.php" class="fab-demo" aria-label="Book a demo">
    <i class="fa-solid fa-calendar-check"></i>
    <span>Book Demo</span>
  </a>
</div>

<!-- Exit Intent Modal -->
<div class="modal-overlay" id="exitModal" hidden>
  <div class="modal-back" data-close></div>
  <div class="modal-box">
    <button class="modal-close" data-close aria-label="Close">&times;</button>
    <div class="modal-icon"><i class="fa-solid fa-rocket"></i></div>
    <h3>Wait, don't leave yet.</h3>
    <p>Start your free trial today and see how MazERP simplifies billing, inventory, and accounting for your business. No credit card needed.</p>
    <a href="https://app.mazerp.com/auth/register" class="btn btn-primary btn-lg" style="width:100%;justify-content:center;">
      Start My Free Trial
    </a>
    <span class="modal-fine">Free for 7 days. Cancel anytime.</span>
  </div>
</div>

<script src="assets/js/main.js" defer></script>
</body>
</html>
