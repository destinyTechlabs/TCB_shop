    <?php
    $cfg = require __DIR__ . '/includes/config.php';
    require __DIR__ . '/includes/layout.php';
    render_head("Remote Work Equipment Setup | REMOTE TCB", "Remote work equipment setup for individuals and small businesses: devices, internet, VPN, security, and productivity tooling.", $cfg, "/remote-work-equipment-setup.php");
    render_utility($cfg);
    render_header($cfg, "");
    ?>

    <main>

<section class="section">
  <div class="container">
    <span class="badge">Equipment Setup</span>
    <h1 class="h2" style="font-size:34px;">Remote work equipment setup for individuals & SMBs</h1>
    <p class="p">A stable home setup is the difference between a smooth remote day and constant interruptions. We configure devices, networking, accounts, and security to match your role and workplace requirements.</p>

    <div class="two-col">
      <div class="card" style="padding:22px;">
        <h2 class="h2" style="font-size:22px;margin-top:0;">What we set up</h2>
        <ul style="margin-top:10px; color: rgba(0,0,0,.70); line-height:1.7;">
          <li>Laptop/desktop setup, updates, and performance tuning</li>
          <li>Work email and collaboration (Google Workspace / Microsoft 365 / Zoho)</li>
          <li>VPN and secure access (remote access or site‑to‑site)</li>
          <li>Network optimization: Wi‑Fi, routers, mesh systems, VLAN options</li>
          <li>Backup, endpoint security, MFA, and password manager</li>
          <li>Remote tools: RDP, TeamViewer/BeyondTrust, ticketing basics</li>
        </ul>
        <div style="margin-top:14px; display:flex; gap:12px; flex-wrap:wrap;">
          <a class="btn btn-primary" href="/contact.php">Request setup</a>
          <a class="btn btn-secondary" href="/services.php#networking">Networking service</a>
        </div>
      </div>

      <div class="card media">
        <img src="https://tcb-media.s3.us-east-1.amazonaws.com/images/sqaure-600x600/man_holding_table_for_support.jpg" alt="Support setup" style="border-radius:var(--radius);">
      </div>
    </div>
  </div>
</section>

    </main>
    <?php render_footer($cfg); ?>
