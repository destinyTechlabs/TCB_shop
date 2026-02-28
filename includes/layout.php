<?php
function render_head(string $title, string $description, array $cfg, string $canonicalPath): void {
  $site = $cfg['site'];
  $url = rtrim($site['site_url'], '/') . $canonicalPath;
  ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($description) ?>">
  <link rel="canonical" href="<?= htmlspecialchars($url) ?>">

  <!-- Geo tags -->
  <meta name="geo.region" content="US-MD">
  <meta name="geo.placename" content="Laurel">
  <meta name="geo.position" content="39.0993;-76.8483">
  <meta name="ICBM" content="39.0993, -76.8483">

  <!-- OpenGraph -->
  <meta property="og:title" content="<?= htmlspecialchars($title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($description) ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?= htmlspecialchars($url) ?>">
  <meta property="og:site_name" content="<?= htmlspecialchars($site['short']) ?>">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&family=Poppins:wght@400;600;700;800;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="/assets/css/styles.css">
  <script>
    window.RTCB_RECAPTCHA_SITE_KEY = "<?= htmlspecialchars($cfg['recaptcha']['site_key']) ?>";
  </script>
</head>
<body>
  <?php
}

function render_utility(array $cfg): void {
  $s = $cfg['site'];
  ?>
  <div class="utility">
    <div class="container">
      <div class="left">
        <a href="tel:<?= htmlspecialchars($s['phone']) ?>"><?= htmlspecialchars($s['phone_display']) ?></a>
        <a href="mailto:<?= htmlspecialchars($s['email']) ?>"><?= htmlspecialchars($s['email']) ?></a>
        <span style="opacity:.75; display:none;" class="hide-sm">Serving <?= htmlspecialchars($s['service_area']) ?></span>
      </div>
      <div class="right">
        <a href="/careers.php">Careers</a>
        <a href="/contact.php">Support</a>
      </div>
    </div>
  </div>
  <?php
}

function render_header(array $cfg, string $active = ''): void {
  $s = $cfg['site'];
  $nav = [
    '/' => 'Home',
    '/services.php' => 'Services',
    '/about.php' => 'About',
    '/testimonials.php' => 'Testimonials',
    '/careers.php' => 'Careers',
    '/contact.php' => 'Contact',
  ];
  ?>
  <header class="header">
    <div class="container">
      <a class="brand" href="/">
        <img src="<?= htmlspecialchars($s['logo_header']) ?>" alt="<?= htmlspecialchars($s['short']) ?>" style="height:36px;width:auto;">
        <div class="text">
          <div class="name"><?= htmlspecialchars($s['name']) ?></div>
          <div class="sub">IT Services • <?= htmlspecialchars($s['address']) ?></div>
        </div>
      </a>

      <nav class="nav">
        <?php foreach ($nav as $href => $label): ?>
          <a href="<?= htmlspecialchars($href) ?>" <?= $active === $href ? 'style="color:var(--blue)"' : '' ?>><?= htmlspecialchars($label) ?></a>
        <?php endforeach; ?>
        <a class="btn btn-primary" href="/contact.php">Get Support</a>
      </nav>

      <button class="mobile-toggle" data-mobile-toggle aria-expanded="false" aria-label="Open menu">☰</button>
    </div>

    <div class="mobile-menu" data-mobile-menu>
      <div class="container">
        <?php foreach ($nav as $href => $label): ?>
          <a href="<?= htmlspecialchars($href) ?>"><?= htmlspecialchars($label) ?></a>
        <?php endforeach; ?>
        <a class="btn btn-primary" href="/contact.php" style="width:100%; margin-top:8px;">Get Support</a>
      </div>
    </div>
  </header>
  <?php
}

function render_footer(array $cfg): void {
  $s = $cfg['site'];
  $year = date('Y');
  ?>
  <footer class="footer">
    <div class="container top">
      <div>
        <div style="display:flex;gap:12px;align-items:center;">
          <img src="<?= htmlspecialchars($s['logo_header']) ?>" alt="<?= htmlspecialchars($s['short']) ?>" style="height:34px;width:auto;">
          <div>
            <div style="font-weight:950;font-size:14px;"><?= htmlspecialchars($s['short']) ?></div>
            <div style="font-size:12px;opacity:.75;">Remote Work Solutions TCB</div>
          </div>
        </div>
        <p style="margin-top:12px;">
          Professional IT services for homes and SMBs—remote work, cloud, networking, identity, and software support—serving Laurel, MD and teams worldwide.
        </p>
        <div style="margin-top:14px; font-size:13px;">
          <div style="font-weight:950;">Contact</div>
          <div><a href="tel:<?= htmlspecialchars($s['phone']) ?>"><?= htmlspecialchars($s['phone_display']) ?></a></div>
          <div><a href="mailto:<?= htmlspecialchars($s['email']) ?>"><?= htmlspecialchars($s['email']) ?></a></div>
          <div style="opacity:.75;"><?= htmlspecialchars($s['address']) ?></div>
        </div>
      </div>

      <div>
        <h4>IT Services</h4>
        <ul>
          <li><a href="/services.php#remote-work">Remote Work Setup</a></li>
          <li><a href="/services.php#active-directory">Active Directory & Identity</a></li>
          <li><a href="/services.php#vpn">VPN Solutions</a></li>
          <li><a href="/services.php#cloud">Cloud Solutions</a></li>
          <li><a href="/services.php#pbx">PBX / VoIP</a></li>
          <li><a href="/services.php">View all services →</a></li>
        </ul>
      </div>

      <div>
        <h4>Resources</h4>
        <ul>
          <li><a href="/about.php">About Us</a></li>
          <li><a href="/testimonials.php">Client Testimonials</a></li>
          <li><a href="/remote-work.php">Remote Work Programs</a></li>
          <li><a href="/remote-work-equipment-setup.php">Remote Work Equipment Setup</a></li>
          <li><a href="/software-and-cloud.php">Software & Cloud Services</a></li>
          <li><a href="/careers.php">Careers</a></li>
          <li><a href="/contact.php">Contact</a></li>
        </ul>
      </div>

      <div>
        <h4>Connect</h4>
        <ul>
          <li><a href="#" rel="noreferrer">Facebook</a></li>
          <li><a href="#" rel="noreferrer">LinkedIn</a></li>
          <li><a href="#" rel="noreferrer">Glassdoor</a></li>
          <li><a href="#" rel="noreferrer">Crunchbase</a></li>
        </ul>

        <div style="margin-top:18px; font-size:12px; opacity:.75; font-weight:900;">Trusted tools & platforms</div>
        <div style="margin-top:10px; display:flex; flex-wrap:wrap; gap:8px;">
          <?php foreach (['Microsoft 365','Google Workspace','AWS','Azure','Salesforce','ServiceNow','SAP','QuickBooks','Power BI','Zoho'] as $tag): ?>
            <span style="background:rgba(255,255,255,.10); padding:6px 10px; border-radius:999px; font-size:12px; color:rgba(255,255,255,.85);"><?= htmlspecialchars($tag) ?></span>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div class="container bottom">
      <div>© <?= $year ?> Remote Work Solutions TCB — All rights reserved.</div>
      <div style="display:flex;gap:10px;flex-wrap:wrap;align-items:center;">
        <a href="/services.php">Services</a>
        <span style="opacity:.35;">•</span>
        <a href="/contact.php">Support</a>
        <span style="opacity:.35;">•</span>
        <a href="mailto:<?= htmlspecialchars($s['email']) ?>">Email us</a>
      </div>
    </div>

    <!-- LocalBusiness structured data -->
    <script type="application/ld+json">
      <?= json_encode([
        "@context" => "https://schema.org",
        "@type" => "LocalBusiness",
        "name" => $s['name'],
        "url" => $s['site_url'],
        "telephone" => $s['phone_display'],
        "email" => $s['email'],
        "address" => [
          "@type" => "PostalAddress",
          "addressLocality" => "Laurel",
          "addressRegion" => "MD",
          "postalCode" => "20708",
          "addressCountry" => "US"
        ],
        "areaServed" => ["United States", "Worldwide"],
        "description" => "IT services including remote work setup, Active Directory/identity, networking, VPN, cloud solutions, PBX/VoIP, software management, web development & SEO, and data analytics."
      ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>
    </script>

    <script src="/assets/js/main.js" defer></script>
  </footer>
</body>
</html>
  <?php
}
