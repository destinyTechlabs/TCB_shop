/**
 * reCAPTCHA v3 helper.
 * Requires the reCAPTCHA script on the page:
 * <script src="https://www.google.com/recaptcha/api.js?render=SITE_KEY"></script>
 */
async function rtcGetToken(action) {
  if (!window.grecaptcha) return "";
  await window.grecaptcha.ready();
  return await window.grecaptcha.execute(window.RTCB_RECAPTCHA_SITE_KEY, { action });
}
