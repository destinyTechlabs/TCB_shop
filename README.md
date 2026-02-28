# REMOTE TCB — HTML/CSS/JS/PHP build

## What's included
- index.php (Home with hero carousel, services grid, logo marquee, testimonials slider)
- services.php, about.php, testimonials.php, careers.php, contact.php
- remote-work.php, remote-work-equipment-setup.php, software-and-cloud.php
- assets/css/styles.css
- assets/js/main.js (carousel, testimonial slider, mobile menu)
- assets/js/recaptcha.js (reCAPTCHA v3 token helper)
- handlers/contact_submit.php (AJAX JSON submit + reCAPTCHA v3 server verify + mail())
- handlers/career_submit.php (file upload + reCAPTCHA v3 server verify + mail())
- includes/config.php, includes/layout.php, includes/verify_recaptcha.php

## Setup
1) Upload the folder to your PHP hosting (Apache/Nginx + PHP 7.4+ recommended)
2) Create an env var on the server:
   - RECAPTCHA_SECRET_KEY = your secret key
   OR edit includes/config.php and set secret_key (not recommended for public repos)
3) Ensure /uploads is writable by PHP (auto-created, but permissions must allow it)

## Forms delivery
The handlers use PHP `mail()` by default.
If your hosting doesn’t support `mail()`, connect SMTP (PHPMailer) or SendGrid/Brevo.

## Security notes
- reCAPTCHA v3 is verified server-side (score threshold 0.3)
- File uploads limited to PDF/DOC/DOCX, max 8MB (configurable)
