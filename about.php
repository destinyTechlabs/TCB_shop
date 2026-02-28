    <?php
    $cfg = require __DIR__ . '/includes/config.php';
    require __DIR__ . '/includes/layout.php';
    render_head("About Us | REMOTE TCB", "Remote Work Solutions TCB (REMOTE TCB) — 10+ years delivering reliable IT services for remote teams, SMBs, and homes in Laurel, MD 20708 and worldwide.", $cfg, "/about.php");
    render_utility($cfg);
    render_header($cfg, "/about.php");
    ?>

    <main>

<section class="section">
  <div class="container">
    <span class="badge">About</span>
    <h1 class="h2" style="font-size:34px;">A practical IT partner for modern work</h1>
    <p class="p">REMOTE TCB helps businesses and individuals run reliable technology—whether you’re a local shop in Maryland or a distributed team worldwide. We bring 10+ years of experience across remote support, identity, networking, cloud, software systems, and secure access.</p>

    <div class="two-col">
      <div class="card media">
        <img src="https://tcb-media.s3.us-east-1.amazonaws.com/images/rectangular-images/analytics_business_perfromace.jpg" alt="Business analytics" style="border-radius:var(--radius);">
      </div>
      <div class="card" style="padding:22px;">
        <h2 class="h2" style="font-size:22px;margin-top:0;">Our story</h2>
        <p class="p">We started with one goal: deliver professional support without the complexity. Over time, we expanded to cloud solutions, structured onboarding, and managed services—so clients can grow with confidence.</p>

        <h3 style="margin-top:18px; font-size:13px; font-weight:950; color:var(--slate);">Core values</h3>
        <div class="grid" style="grid-template-columns: repeat(2, 1fr); margin-top:10px;">
          <div class="card" style="padding:14px; box-shadow:none;"><div style="font-weight:950;">Security by default</div><div class="p">MFA, least-privilege access, and sensible policies baked into every setup.</div></div>
          <div class="card" style="padding:14px; box-shadow:none;"><div style="font-weight:950;">Documentation-first</div><div class="p">Clear runbooks and handover notes—so your team isn’t locked in.</div></div>
          <div class="card" style="padding:14px; box-shadow:none;"><div style="font-weight:950;">Business-aligned IT</div><div class="p">We prioritize uptime, cost control, and workflows that fit how you work.</div></div>
          <div class="card" style="padding:14px; box-shadow:none;"><div style="font-weight:950;">Human support</div><div class="p">Fast responses, respectful communication, and ownership from start to finish.</div></div>
        </div>
      </div>
    </div>

    <div class="card" style="padding:22px; margin-top:18px;">
      <div style="display:flex; flex-wrap:wrap; align-items:flex-end; justify-content:space-between; gap:10px;">
        <div>
          <h2 class="h2" style="font-size:22px;margin-top:0;">Timeline milestones</h2>
          <p class="p">A snapshot of how we’ve grown and what we focus on today.</p>
        </div>
        <span class="badge">Laurel, MD 20708</span>
      </div>

      <div class="grid" style="grid-template-columns: repeat(2, 1fr); margin-top:12px;">
        <div class="card" style="padding:14px; box-shadow:none;"><div style="font-weight:950;color:var(--blue);">2015</div><div class="p">Started providing hands‑on IT support for SMBs and remote-first teams.</div></div>
        <div class="card" style="padding:14px; box-shadow:none;"><div style="font-weight:950;color:var(--blue);">2018</div><div class="p">Expanded into cloud migrations and identity management for distributed workforces.</div></div>
        <div class="card" style="padding:14px; box-shadow:none;"><div style="font-weight:950;color:var(--blue);">2021</div><div class="p">Launched structured remote onboarding and device management programs.</div></div>
        <div class="card" style="padding:14px; box-shadow:none;"><div style="font-weight:950;color:var(--blue);">2024</div><div class="p">Scaled services globally with standard playbooks, security baselines, and partner platforms.</div></div>
      </div>

      <div style="margin-top:16px; overflow:hidden; border-radius: var(--radius); border:1px solid rgba(0,0,0,.06);">
        <iframe title="Map to Laurel, MD 20708" style="width:100%; height:380px; border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
          src="https://www.google.com/maps?q=Laurel%20MD%2020708&output=embed"></iframe>
      </div>
    </div>
  </div>
</section>

    </main>
    <?php render_footer($cfg); ?>
