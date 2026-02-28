<?php
function verify_recaptcha_v3(string $token, string $expectedAction, array $cfg): array {
  $secret = $cfg['recaptcha']['secret_key'] ?? '';
  if (!$secret || $secret === 'REPLACE_ME') {
    // In dev you can skip verification, but production should set RECAPTCHA_SECRET_KEY.
    return ['ok' => true, 'score' => 0.0, 'warning' => 'Secret missing, verification skipped'];
  }

  $data = http_build_query([
    'secret' => $secret,
    'response' => $token,
  ]);

  $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  $response = curl_exec($ch);
  $err = curl_error($ch);
  curl_close($ch);

  if ($response === false) {
    return ['ok' => false, 'error' => 'cURL error: ' . $err];
  }

  $json = json_decode($response, true);
  if (!is_array($json) || empty($json['success'])) {
    return ['ok' => false, 'error' => 'reCAPTCHA failed', 'codes' => $json['error-codes'] ?? []];
  }

  if (!empty($json['action']) && $json['action'] !== $expectedAction) {
    return ['ok' => false, 'error' => 'reCAPTCHA action mismatch'];
  }

  $score = floatval($json['score'] ?? 0);
  $threshold = floatval($cfg['recaptcha']['score_threshold'] ?? 0.3);
  if ($score > 0 && $score < $threshold) {
    return ['ok' => false, 'error' => 'Low reCAPTCHA score', 'score' => $score];
  }

  return ['ok' => true, 'score' => $score];
}
