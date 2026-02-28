<?php
header('Content-Type: application/json');

$cfg = require __DIR__ . '/../includes/config.php';
require __DIR__ . '/../includes/verify_recaptcha.php';

function bad($msg, $code=400) {
  http_response_code($code);
  echo json_encode(['ok'=>false,'error'=>$msg]);
  exit;
}

$payload = json_decode(file_get_contents('php://input'), true);
if (!is_array($payload)) bad('Invalid payload');

$required = ['name','email','phone','address','company','service','message','recaptchaToken'];
foreach ($required as $k) {
  if (!isset($payload[$k]) || trim((string)$payload[$k]) === '') bad("Missing field: $k");
}

if (!filter_var($payload['email'], FILTER_VALIDATE_EMAIL)) bad('Invalid email');

$token = (string)$payload['recaptchaToken'];
$v = verify_recaptcha_v3($token, 'contact_form', $cfg);
if (empty($v['ok'])) bad('reCAPTCHA verification failed. Please try again.');

$mailTo = $cfg['mail']['to'];
$from = $cfg['mail']['from'];
$subj = $cfg['mail']['subject_prefix'] . ' Contact Form: ' . $payload['service'];

$body = "New Contact Form Submission\n\n"
  . "Name: {$payload['name']}\n"
  . "Email: {$payload['email']}\n"
  . "Phone: {$payload['phone']}\n"
  . "Address: {$payload['address']}\n"
  . "Company: {$payload['company']}\n"
  . "Service: {$payload['service']}\n"
  . "Message:\n{$payload['message']}\n\n"
  . "reCAPTCHA score: " . ($v['score'] ?? 'n/a') . "\n"
  . "Time: " . date('c') . "\n";

$headers = "From: $from\r\nReply-To: {$payload['email']}\r\n";

$sent = @mail($mailTo, $subj, $body, $headers);
if (!$sent) {
  // Hosting may not have mail() configured. Still return ok but show a helpful message in logs.
  error_log("REMOTE TCB contact form: mail() failed. Configure SMTP or use SendGrid/Brevo.");
}

echo json_encode(['ok'=>true]);
