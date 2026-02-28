    <?php
    $cfg = require __DIR__ . '/includes/config.php';
    require __DIR__ . '/includes/layout.php';
    render_head("Contact | REMOTE TCB", "Contact Remote Work Solutions TCB (REMOTE TCB) for IT support. Professional contact form with validation and reCAPTCHA protection.", $cfg, "/contact.php");
    render_utility($cfg);
    render_header($cfg, "/contact.php");
    ?>

    <main>

<section class="section">
  <div class="container">
    <span class="badge">Contact</span>
    <h1 class="h2" style="font-size:34px;">Let’s solve your IT challenges</h1>
    <p class="p">Tell us what you need—remote work setup, networking, VPN, cloud, PBX/VoIP, web development, software management, or data analytics. We respond with a clear plan and next steps.</p>

    <div class="two-col" style="grid-template-columns: 1.4fr .6fr;">
      <div class="card form">
        <form id="contactForm">
          <div class="form-grid">
            <div>
              <label>Full Name</label>
              <input name="name" required>
            </div>
            <div>
              <label>Email</label>
              <input name="email" type="email" placeholder="you@company.com" required>
            </div>
            <div>
              <label>Phone</label>
              <input name="phone" required>
            </div>
            <div>
              <label>Address</label>
              <input name="address" placeholder="City, State, ZIP" required>
            </div>
            <div>
              <label>Company</label>
              <input name="company" placeholder="Company name" required>
            </div>
            <div>
              <label>Service Needed</label>
              <select name="service" required>
                <option value="">Select a service…</option>
                <option value="Remote Work Setup (Offshore & Local)">Remote Work Setup (Offshore & Local)</option>
<option value="Active Directory & Identity (Microsoft/Google/AWS)">Active Directory & Identity (Microsoft/Google/AWS)</option>
<option value="Networking for Homes & Small Business">Networking for Homes & Small Business</option>
<option value="VPN Solutions (Site‑to‑Site & Remote Access)">VPN Solutions (Site‑to‑Site & Remote Access)</option>
<option value="Cloud Solutions for Small Business">Cloud Solutions for Small Business</option>
<option value="Web Development & SEO">Web Development & SEO</option>
<option value="Software Setup & Management (SMB)">Software Setup & Management (SMB)</option>
<option value="Data Analysis & BI (Excel, Power BI)">Data Analysis & BI (Excel, Power BI)</option>
<option value="Email & Collaboration">Email & Collaboration</option>
<option value="PBX / VoIP Installation & Maintenance">PBX / VoIP Installation & Maintenance</option>
<option value="Endpoint Management (Intune, SCCM)">Endpoint Management (Intune, SCCM)</option>
<option value="IT Service Management (ITIL / ServiceNow)">IT Service Management (ITIL / ServiceNow)</option>
              </select>
            </div>
          </div>

          <div style="margin-top:14px;">
            <label>Message</label>
            <textarea name="message" placeholder="Tell us what you need help with…" required></textarea>
          </div>

          <input type="hidden" name="recaptchaToken" id="contactRecaptchaToken" value="">

          <div style="margin-top:12px; display:flex; align-items:center; justify-content:space-between; gap:12px; flex-wrap:wrap;">
            <div class="small">Protected by reCAPTCHA v3 (token sent on submit).</div>
            <button class="btn btn-primary" type="submit">Send Message</button>
          </div>

          <div id="contactAlert" class="alert" style="display:none;"></div>
        </form>
      </div>

      <aside class="grid" style="gap:14px;">
        <div class="card" style="padding:18px;">
          <div style="font-weight:950;">Direct contact</div>
          <div style="margin-top:10px; font-size:14px; color: rgba(0,0,0,.70); line-height:1.7;">
            <div><b>Phone:</b> <a href="tel:<?= htmlspecialchars($cfg['site']['phone']) ?>" style="color:var(--blue); text-decoration: underline;"><?= htmlspecialchars($cfg['site']['phone_display']) ?></a></div>
            <div><b>Email:</b> <a href="mailto:<?= htmlspecialchars($cfg['site']['email']) ?>" style="color:var(--blue); text-decoration: underline;"><?= htmlspecialchars($cfg['site']['email']) ?></a></div>
            <div><b>Location:</b> <?= htmlspecialchars($cfg['site']['address']) ?></div>
            <div class="small">Serving domestically and around the world.</div>
          </div>
        </div>

        <div class="card" style="padding:18px;">
          <div style="font-weight:950;">What to include</div>
          <ul style="margin-top:10px; color: rgba(0,0,0,.70); line-height:1.7;">
            <li>Number of users/devices, locations, and critical apps</li>
            <li>Your preferred timeline and budget range</li>
            <li>Any compliance/security needs (MFA, encryption, access control)</li>
            <li>Whether you want one-time setup or ongoing support</li>
          </ul>
        </div>
      </aside>
    </div>
  </div>
</section>

<script src="https://www.google.com/recaptcha/api.js?render=<?= htmlspecialchars($cfg['recaptcha']['site_key']) ?>"></script>
<script src="/assets/js/recaptcha.js"></script>
<script>
  const form = document.getElementById('contactForm');
  const alertEl = document.getElementById('contactAlert');

  function val(v) { return (v || '').trim(); }

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    alertEl.style.display = 'none';

    const data = Object.fromEntries(new FormData(form).entries());
    // basic client validation
    if (val(data.name).length < 2) return window.RTCB.setAlert(alertEl, false, "Name is required.");
    if (!/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(val(data.email))) return window.RTCB.setAlert(alertEl, false, "Valid email required.");
    if (val(data.phone).length < 7) return window.RTCB.setAlert(alertEl, false, "Valid phone required.");
    if (val(data.address).length < 4) return window.RTCB.setAlert(alertEl, false, "Address is required.");
    if (val(data.company).length < 2) return window.RTCB.setAlert(alertEl, false, "Company name is required.");
    if (val(data.service).length < 2) return window.RTCB.setAlert(alertEl, false, "Please select a service.");
    if (val(data.message).length < 10) return window.RTCB.setAlert(alertEl, false, "Please add details (10+ characters).");

    const token = await rtcGetToken('contact_form');
    document.getElementById('contactRecaptchaToken').value = token || "";
    data.recaptchaToken = token || "";

    const res = await fetch('/handlers/contact_submit.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data)
    });
    const json = await res.json().catch(() => ({}));
    if (!res.ok || !json.ok) {
      return window.RTCB.setAlert(alertEl, false, json.error || "Something went wrong. Please try again.");
    }
    window.RTCB.setAlert(alertEl, true, "Thanks! We received your message and will reply shortly.");
    form.reset();
  });
</script>

    </main>
    <?php render_footer($cfg); ?>
