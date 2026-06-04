<?php
require_once __DIR__ . '/includes/config.php';
include __DIR__ . '/includes/header.php';
?>

<!-- PAGE HERO -->
<section class="page-hero" style="padding:72px 0 64px;">
  <div class="container reveal">
    <span class="label"><i class="fa-solid fa-shield-halved"></i> Legal</span>
    <h1>Privacy Policy</h1>
    <p>How we collect, use, and protect your information when you visit our website or use MazERP.</p>
    <p class="legal-last-updated">Last updated: June 4, 2026</p>
  </div>
</section>

<!-- PRIVACY BODY -->
<section class="legal-page">
  <div class="container">
    <div class="legal-page-inner reveal">

      <p class="legal-intro">This Privacy Policy explains how <strong>MAZ Software Solutions</strong> ("<strong>we</strong>," "<strong>us</strong>," or "<strong>our</strong>") handles personal information when you use the MazERP marketing website, cloud application at <a href="https://app.mazerp.com">app.mazerp.com</a>, and related services (collectively, the "<strong>Service</strong>"). It should be read together with our <a href="terms-of-service.php">Terms of Service</a>.</p>

      <p class="legal-disclaimer"><em>This document is for general information. Have a qualified lawyer review it before relying on it in disputes.</em></p>

      <h2>1. Who we are</h2>
      <p>The Service is operated by <strong>MAZ Software Solutions</strong> (MazERP), with a registered office at 2nd floor, Imperial Building, 25G/H2, Swami Nellaiappar High Rd, Tirunelveli, Tamil Nadu 627001, India.</p>
      <p>For privacy-related questions or requests, contact us at <a href="mailto:<?php echo htmlspecialchars(CONTACT_EMAIL); ?>"><?php echo htmlspecialchars(CONTACT_EMAIL); ?></a> or <a href="tel:<?php echo preg_replace('/\s+/', '', CONTACT_PHONE); ?>"><?php echo htmlspecialchars(CONTACT_PHONE); ?></a>.</p>

      <h2>2. Scope</h2>
      <p>This policy applies to:</p>
      <ul>
        <li>Visitors to our public website (for example <?php echo htmlspecialchars(parse_url(SITE_URL, PHP_URL_HOST) ?: 'www.mazerp.com'); ?>);</li>
        <li>Prospective customers who submit demo or trial requests through our <a href="contact.php">contact form</a>;</li>
        <li>Registered users and organizations that use the MazERP Platform, including ERP, CRM, accounting, and payroll modules.</li>
      </ul>
      <p>If you process personal data of your own employees, customers, or vendors inside MazERP, you are generally the data controller for that information. We act as a processor or service provider on your instructions, as described in our Terms and this policy.</p>

      <h2>3. Information we collect</h2>
      <h3>Personal information you provide</h3>
      <p>We collect information you provide directly to us, such as when you create an account, use the Service, book a demo, or contact us for support:</p>
      <ul>
        <li>Name, email address, and contact information;</li>
        <li>Business and company details;</li>
        <li>Payment and billing information (for paid Subscriptions);</li>
        <li>Communications and support interactions.</li>
      </ul>

      <h3>Website and lead forms</h3>
      <p>When you book a demo or contact us through our website, we may also collect:</p>
      <ul>
        <li>Full name, work email, and phone number;</li>
        <li>Company name and business type;</li>
        <li>Any message you choose to send;</li>
        <li>Technical metadata such as submission date and time and IP address, used for fraud prevention and support.</li>
      </ul>
      <p>Submissions may be stored in server logs, emailed to our team, and retained for sales and support follow-up.</p>

      <h3>Account and Platform use</h3>
      <p>When you register for or use MazERP, we collect information needed to provide the Service, such as:</p>
      <ul>
        <li>Account and organization profile details (name, email, phone, billing contacts);</li>
        <li>Login credentials and authentication activity;</li>
        <li><strong>Customer Data</strong> you or your users submit, including invoices, inventory records, CRM contacts, payroll and employee information, attendance, and financial or tax-related records;</li>
        <li>Usage, configuration, and support communications related to your Account.</li>
      </ul>

      <h3>Usage information (Platform)</h3>
      <p>When you use the MazERP application, we automatically collect certain technical and usage information to operate and improve the Service:</p>
      <ul>
        <li>Device information and browser type;</li>
        <li>IP address and approximate location derived from it;</li>
        <li>Features used and actions taken within the Platform;</li>
        <li>Log and diagnostic data related to performance and security.</li>
      </ul>
      <p>This usage information applies to your use of the cloud application, not to third-party advertising tracking on our public website.</p>

      <h3>Cookies and local storage</h3>
      <p>On our marketing site we use:</p>
      <ul>
        <li>A <strong>session cookie</strong> and a <strong>maz_country</strong> cookie (up to 30 days) to remember your selected region (India, United States, or UAE) for localized pricing and content;</li>
        <li><strong>sessionStorage</strong> on your browser to avoid showing the exit-intent promotional modal more than once per session.</li>
      </ul>
      <p>We do not use third-party advertising or analytics cookies on the marketing site at the time of this policy. The Platform may set additional cookies required for login, security, and core functionality.</p>

      <h2>4. How we use information</h2>
      <p>We use personal information to:</p>
      <ul>
        <li>Provide, operate, and maintain the Service;</li>
        <li>Respond to demo requests, sales inquiries, and support tickets;</li>
        <li>Process subscriptions, trials, and payments;</li>
        <li>Send service-related notices (for example account, billing, or security updates);</li>
        <li>Improve reliability, features, and user experience;</li>
        <li>Detect, prevent, and address abuse, fraud, or security incidents;</li>
        <li>Comply with applicable law and enforce our <a href="terms-of-service.php">Terms of Service</a>.</li>
      </ul>
      <p>We do not sell your personal information.</p>

      <h2>5. Legal bases (summary)</h2>
      <p>Depending on your location and the context, we rely on one or more of the following:</p>
      <ul>
        <li><strong>Contract</strong> — to deliver the Service you signed up for;</li>
        <li><strong>Consent</strong> — where you submit forms or opt in to optional communications;</li>
        <li><strong>Legitimate interests</strong> — for example improving the Service, securing our systems, and following up on legitimate business inquiries, balanced against your rights;</li>
        <li><strong>Legal obligation</strong> — where retention or disclosure is required by law.</li>
      </ul>
      <p>If you are in India, the Digital Personal Data Protection Act, 2023 may apply. If you access the Service from the European Economic Area, United Kingdom, UAE, or other regions with data protection laws, you may have additional rights that cannot be waived by contract.</p>

      <h2>6. Sharing and third parties</h2>
      <p>We may share information with:</p>
      <ul>
        <li><strong>Service providers</strong> who help us host, email, bill, or support the Service (for example cloud hosting, SMTP/email delivery, and payment processors), under contractual confidentiality and security obligations;</li>
        <li><strong>Integrations you enable</strong>, such as payment gateways, banks, or messaging tools, governed by those providers' own policies;</li>
        <li><strong>Authorities</strong> when required by law, court order, or to protect rights, safety, and security;</li>
        <li><strong>Business transfers</strong> in connection with a merger, acquisition, or asset sale, with notice where practicable.</li>
      </ul>
      <p>Our website loads Font Awesome from a public CDN. WhatsApp links open in WhatsApp's app or site; we do not embed WhatsApp tracking on our pages.</p>

      <h2>7. International transfers</h2>
      <p>MazERP is a cloud service. Data may be stored or processed in India or other countries where we or our subprocessors operate. Where required by law, we implement appropriate safeguards for cross-border transfers.</p>

      <h2>8. Retention</h2>
      <p>We retain information only as long as necessary to provide the Service and comply with legal obligations. Typical periods include:</p>
      <ul>
        <li><strong>Account data</strong> — retained while your Account is active;</li>
        <li><strong>Transaction and billing records</strong> — up to seven (7) years where required for tax, audit, or statutory purposes;</li>
        <li><strong>Support communications</strong> — up to three (3) years for service quality and dispute resolution;</li>
        <li><strong>Lead and contact form data</strong> — for a reasonable period to manage sales and support, then deleted or anonymized when no longer needed;</li>
        <li><strong>Security and audit logs</strong> — for limited periods appropriate to investigation and compliance.</li>
      </ul>
      <p>When you delete your Account, we will remove or anonymize your personal information within thirty (30) days, except where retention is required by law, active disputes, or backup cycles that are securely purged on schedule.</p>
      <p>You may request deletion of your Account or Customer Data subject to legal retention requirements.</p>

      <h2>9. Security</h2>
      <p>We use reasonable administrative, technical, and organizational measures to protect personal information, including access controls and routine backups. No method of transmission or storage is completely secure; we cannot guarantee absolute security.</p>

      <h2>10. Your rights and choices</h2>
      <p>Depending on applicable law, you may have the right to:</p>
      <ul>
        <li>View and access your personal data;</li>
        <li>Update and correct your information;</li>
        <li>Export your data, where technically feasible;</li>
        <li>Delete your account and associated personal information, subject to legal retention;</li>
        <li>Opt out of marketing communications;</li>
        <li>Manage service and notification settings in your Account where available;</li>
        <li>Object to or restrict certain processing;</li>
        <li>Withdraw consent where processing is consent-based, without affecting prior lawful processing;</li>
        <li>Lodge a complaint with a supervisory authority in your jurisdiction.</li>
      </ul>
      <p><strong>Exercise your rights:</strong> email <a href="mailto:<?php echo htmlspecialchars(CONTACT_EMAIL); ?>"><?php echo htmlspecialchars(CONTACT_EMAIL); ?></a> with enough detail for us to verify your request. We will respond within timelines required by applicable law.</p>
      <p>If you are a MazERP customer processing third-party personal data in the Platform, direct individual requests from your employees or customers to your organization first; we will assist you as processor where appropriate.</p>

      <h2>11. Children</h2>
      <p>The Service is intended for businesses and professionals aged 18 and older. We do not knowingly collect personal information from children. If you believe we have received such information, contact us and we will delete it promptly.</p>

      <h2>12. Changes to this policy</h2>
      <p>We may update this Privacy Policy from time to time. We will post the revised version on this page and update the "Last updated" date. Material changes may also be communicated by email or in-app notice. Continued use after changes take effect means you accept the updated policy, subject to any non-waivable rights under local law.</p>

      <h2>13. Contact</h2>
      <p>Privacy questions or requests may be directed to:</p>
      <ul class="legal-contact">
        <li><strong>MAZ Software Solutions</strong> (MazERP)</li>
        <li>Email: <a href="mailto:<?php echo htmlspecialchars(CONTACT_EMAIL); ?>"><?php echo htmlspecialchars(CONTACT_EMAIL); ?></a></li>
        <li>Phone: <a href="tel:<?php echo preg_replace('/\s+/', '', CONTACT_PHONE); ?>"><?php echo htmlspecialchars(CONTACT_PHONE); ?></a></li>
      </ul>

    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
