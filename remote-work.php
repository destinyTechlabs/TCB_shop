    <?php
    $cfg = require __DIR__ . '/includes/config.php';
    require __DIR__ . '/includes/layout.php';
    render_head("Remote Work Programs | REMOTE TCB", "REMOTE TCB helps companies set up remote work for employees and helps individuals find and succeed in remote roles worldwide.", $cfg, "/remote-work.php");
    render_utility($cfg);
    render_header($cfg, "");
    ?>

    <main>

<section class="section">
  <div class="container">
    <span class="badge">Remote Work</span>
    <h1 class="h2" style="font-size:34px;">Remote work setup for companies — and remote job pathways for individuals</h1>
    <p class="p">We support employers onboarding offshore or local staff with secure tools, access controls, and support playbooks. We also help candidates prepare for remote roles in tech support, DevOps, cloud admin, customer service, claims & billing, and more—anywhere in the world.</p>

    <div class="two-col">
      <div class="card media">
        <img src="https://tcb-media.s3.us-east-1.amazonaws.com/images/sqaure-600x600/team_of_clients_working.jpg" alt="Remote team working" style="border-radius:var(--radius);">
      </div>
      <div class="card" style="padding:22px;">
        <h2 class="h2" style="font-size:22px;margin-top:0;">For employers</h2>
        <ul style="margin-top:10px; color: rgba(0,0,0,.70); line-height:1.7;">
          <li>Remote onboarding: accounts, devices, and collaboration tools</li>
          <li>Identity: Active Directory/Entra ID, Google Workspace, MFA</li>
          <li>Secure access: VPN, zero-trust patterns, endpoint policies</li>
          <li>Support: ticketing, SLAs, escalation paths, knowledge base</li>
        </ul>
        <div style="margin-top:14px; display:flex; gap:12px; flex-wrap:wrap;">
          <a class="btn btn-secondary" href="/services.php#remote-work">Remote work service</a>
          <a class="btn btn-primary" href="/contact.php">Plan onboarding</a>
        </div>
      </div>
    </div>

    <div class="card" style="padding:22px; margin-top:18px;">
      <h2 class="h2" style="font-size:22px;margin-top:0;">For individuals</h2>
      <p class="p">We provide guidance on readiness: tool familiarity, communication, ticket handling, and remote professionalism. We can also help with equipment setup so you can work reliably from home.</p>
      <div style="margin-top:12px; display:flex; gap:12px; flex-wrap:wrap;">
        <a class="btn btn-secondary" href="/remote-work-equipment-setup.php">Equipment setup</a>
        <a class="btn btn-primary" href="/careers.php">Browse remote jobs</a>
      </div>
    </div>
  </div>
</section>

    </main>
    <?php render_footer($cfg); ?>
