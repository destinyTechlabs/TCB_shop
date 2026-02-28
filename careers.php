    <?php
    $cfg = require __DIR__ . '/includes/config.php';
    require __DIR__ . '/includes/layout.php';
    render_head("Careers | REMOTE TCB", "Remote tech support jobs at REMOTE TCB: L1, L2, L3, remote desktop support, and customer experience. Apply online with resume submission.", $cfg, "/careers.php");
    render_utility($cfg);
    render_header($cfg, "/careers.php");
    ?>

    <main>

<section class="section">
  <div class="container">
    <span class="badge">Careers</span>
    <h1 class="h2" style="font-size:34px;">Remote opportunities</h1>
    <p class="p">We post remote roles for tech support, cloud admin, customer experience, and more. If you’re disciplined, clear in communication, and love solving problems, apply below.</p>

    <div class="two-col">
      <div class="grid" style="gap:14px;">

<div class="card" style="padding:18px;">
  <div style="font-size:18px;font-weight:950;">Remote Tech Support (L1)</div>
  <div style="margin-top:6px;color:rgba(0,0,0,.60);font-size:13px;font-weight:800;">Remote (Worldwide) • Contract / Part‑time / Full‑time</div>
  <div style="margin-top:10px;color:rgba(0,0,0,.70);font-size:14px;">Handle tickets, basic troubleshooting, account resets, and end‑user support with clear documentation.</div>
  <div class="small" style="margin-top:10px;">Tip: Include tools you’ve used (M365, Google Workspace, AD, VPN, Intune/SCCM, AWS/Azure, ticketing systems).</div>
</div>


<div class="card" style="padding:18px;">
  <div style="font-size:18px;font-weight:950;">Remote Tech Support (L2)</div>
  <div style="margin-top:6px;color:rgba(0,0,0,.60);font-size:13px;font-weight:800;">Remote (Worldwide) • Contract / Full‑time</div>
  <div style="margin-top:10px;color:rgba(0,0,0,.70);font-size:14px;">Advanced troubleshooting, networking basics, VPN support, M365/Google Workspace administration, and escalation handling.</div>
  <div class="small" style="margin-top:10px;">Tip: Include tools you’ve used (M365, Google Workspace, AD, VPN, Intune/SCCM, AWS/Azure, ticketing systems).</div>
</div>


<div class="card" style="padding:18px;">
  <div style="font-size:18px;font-weight:950;">Remote Tech Support (L3)</div>
  <div style="margin-top:6px;color:rgba(0,0,0,.60);font-size:13px;font-weight:800;">Remote (Worldwide) • Contract / Full‑time</div>
  <div style="margin-top:10px;color:rgba(0,0,0,.70);font-size:14px;">Lead escalations, infrastructure changes, Active Directory/Entra, cloud administration, and incident response collaboration.</div>
  <div class="small" style="margin-top:10px;">Tip: Include tools you’ve used (M365, Google Workspace, AD, VPN, Intune/SCCM, AWS/Azure, ticketing systems).</div>
</div>


<div class="card" style="padding:18px;">
  <div style="font-size:18px;font-weight:950;">Remote Desktop Support</div>
  <div style="margin-top:6px;color:rgba(0,0,0,.60);font-size:13px;font-weight:800;">Remote (USA Preferred) • Contract / Part‑time</div>
  <div style="margin-top:10px;color:rgba(0,0,0,.70);font-size:14px;">Remote endpoint troubleshooting (Windows/macOS), RDP/remote tools, patching, and device policy enforcement.</div>
  <div class="small" style="margin-top:10px;">Tip: Include tools you’ve used (M365, Google Workspace, AD, VPN, Intune/SCCM, AWS/Azure, ticketing systems).</div>
</div>


<div class="card" style="padding:18px;">
  <div style="font-size:18px;font-weight:950;">Customer Experience Specialist</div>
  <div style="margin-top:6px;color:rgba(0,0,0,.60);font-size:13px;font-weight:800;">Remote (Worldwide) • Contract / Part‑time</div>
  <div style="margin-top:10px;color:rgba(0,0,0,.70);font-size:14px;">Client communication, ticket triage, status updates, follow‑ups, and coordination with technical teams.</div>
  <div class="small" style="margin-top:10px;">Tip: Include tools you’ve used (M365, Google Workspace, AD, VPN, Intune/SCCM, AWS/Azure, ticketing systems).</div>
</div>

      </div>

      <div>
        <div class="card" style="padding:18px; box-shadow: var(--shadow);">
          <div style="font-weight:950;">Apply online</div>
          <div class="p">Upload your resume (PDF/DOCX). Cover letter is optional. Form is protected by reCAPTCHA v3.</div>
        </div>

        <div class="card form" style="margin-top:14px;">
          <form id="careerForm" enctype="multipart/form-data">
            <div class="form-grid">
              <div>
                <label>Full Name</label>
                <input name="name" required>
              </div>
              <div>
                <label>Phone</label>
                <input name="tel" required>
              </div>
              <div>
                <label>Email</label>
                <input name="email" type="email" required>
              </div>
              <div>
                <label>Address</label>
                <input name="address" placeholder="City, State, Country" required>
              </div>
              <div>
                <label>Role</label>
                <select name="job" required>
                  <option value="">Select…</option>
                  <option value="Remote Tech Support (L1)">Remote Tech Support (L1)</option>
<option value="Remote Tech Support (L2)">Remote Tech Support (L2)</option>
<option value="Remote Tech Support (L3)">Remote Tech Support (L3)</option>
<option value="Remote Desktop Support">Remote Desktop Support</option>
<option value="Customer Experience Specialist">Customer Experience Specialist</option>
                </select>
              </div>
              <div>
                <label>Years of Experience</label>
                <input name="yearsExperience" type="number" min="0" max="60" value="0" required>
              </div>
              <div>
                <label>Previous Company (optional)</label>
                <input name="previousCompany">
              </div>
              <div>
                <label>Latest Diploma / Certification</label>
                <input name="latestDiploma" placeholder="e.g., BSc, HND, IT certs" required>
              </div>
            </div>

            <div style="margin-top:14px;">
              <label>Message</label>
              <textarea name="message" placeholder="Tell us about your strengths and availability…" required></textarea>
            </div>

            <div class="form-grid" style="margin-top:14px;">
              <div>
                <label>Resume (PDF or DOCX)</label>
                <input name="resume" type="file" accept=".pdf,.doc,.docx" required>
              </div>
              <div>
                <label>Cover Letter (optional, PDF or DOCX)</label>
                <input name="coverLetter" type="file" accept=".pdf,.doc,.docx">
              </div>
            </div>

            <input type="hidden" name="recaptchaToken" id="careerRecaptchaToken" value="">
            <div class="small" style="margin-top:10px;">Protected by reCAPTCHA v3 (token sent on submit). File types limited to PDF/DOCX.</div>

            <div style="margin-top:12px; display:flex; justify-content:flex-end;">
              <button class="btn btn-primary" type="submit">Submit Application</button>
            </div>

            <div id="careerAlert" class="alert" style="display:none;"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- reCAPTCHA + submission script -->
<script src="https://www.google.com/recaptcha/api.js?render=<?= htmlspecialchars($cfg['recaptcha']['site_key']) ?>"></script>
<script src="/assets/js/recaptcha.js"></script>
<script>
  const form = document.getElementById('careerForm');
  const alertEl = document.getElementById('careerAlert');

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    alertEl.style.display = 'none';

    // client-side checks
    const resume = form.querySelector('input[name="resume"]').files[0];
    const cover = form.querySelector('input[name="coverLetter"]').files[0];
    const okExt = (f) => !f || /\.(pdf|doc|docx)$/i.test(f.name);
    if (!resume || !okExt(resume)) return window.RTCB.setAlert(alertEl, false, "Resume must be PDF/DOC/DOCX.");
    if (cover && !okExt(cover)) return window.RTCB.setAlert(alertEl, false, "Cover letter must be PDF/DOC/DOCX.");

    const token = await rtcGetToken('career_form');
    document.getElementById('careerRecaptchaToken').value = token || "";

    const fd = new FormData(form);

    const res = await fetch('/handlers/career_submit.php', {
      method: 'POST',
      body: fd
    });
    const json = await res.json().catch(() => ({}));
    if (!res.ok || !json.ok) {
      return window.RTCB.setAlert(alertEl, false, json.error || "Submission failed. Please try again.");
    }
    window.RTCB.setAlert(alertEl, true, "Application received! We’ll review and reach out if there’s a match.");
    form.reset();
  });
</script>

    </main>
    <?php render_footer($cfg); ?>
