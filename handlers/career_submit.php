<?php
header('Content-Type: application/json');

$cfg = require __DIR__ . '/../includes/config.php';
require __DIR__ . '/../includes/verify_recaptcha.php';

function bad($msg, $code=400) {
  http_response_code($code);
  echo json_encode(['ok'=>false,'error'=>$msg]);
  exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') bad('Invalid method', 405);

$fields = ['name','tel','email','address','job','yearsExperience','latestDiploma','message','recaptchaToken'];
foreach ($fields as $k) {
  if (!isset($_POST[$k]) || trim((string)$_POST[$k]) === '') bad("Missing field: $k");
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) bad('Invalid email');

$token = (string)$_POST['recaptchaToken'];
$v = verify_recaptcha_v3($token, 'career_form', $cfg);
if (empty($v['ok'])) bad('reCAPTCHA verification failed. Please try again.');

$uploadsDir = $cfg['uploads']['dir'];
if (!is_dir($uploadsDir)) @mkdir($uploadsDir, 0755, true);
if (!is_dir($uploadsDir) || !is_writable($uploadsDir)) bad('Uploads folder is not writable on server.');

$maxSize = intval($cfg['uploads']['max_size']);
$allowedExt = $cfg['uploads']['allowed_ext'];

function save_upload(string $key, array $cfg, bool $required): ?string {
  if (!isset($_FILES[$key]) || $_FILES[$key]['error'] === UPLOAD_ERR_NO_FILE) {
    return $required ? null : null;
  }
  $f = $_FILES[$key];
  if ($f['error'] !== UPLOAD_ERR_OK) return null;
  if ($f['size'] <= 0 || $f['size'] > intval($cfg['uploads']['max_size'])) return null;

  $name = $f['name'];
  $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
  if (!in_array($ext, $cfg['uploads']['allowed_ext'], true)) return null;

  $safeBase = preg_replace('/[^a-zA-Z0-9_-]+/', '_', pathinfo($name, PATHINFO_FILENAME));
  $rand = bin2hex(random_bytes(8));
  $dest = rtrim($cfg['uploads']['dir'], '/') . '/' . $safeBase . '_' . $rand . '.' . $ext;

  if (!move_uploaded_file($f['tmp_name'], $dest)) return null;
  return $dest;
}

$resumePath = save_upload('resume', $cfg, true);
if (!$resumePath) bad('Resume upload failed. Only PDF/DOC/DOCX up to 8MB.');

$coverPath = null;
if (isset($_FILES['coverLetter']) && $_FILES['coverLetter']['error'] !== UPLOAD_ERR_NO_FILE) {
  $coverPath = save_upload('coverLetter', $cfg, false);
  if (!$coverPath) bad('Cover letter upload failed. Only PDF/DOC/DOCX up to 8MB.');
}

$mailTo = $cfg['mail']['to'];
$from = $cfg['mail']['from'];
$subj = $cfg['mail']['subject_prefix'] . ' Career Application: ' . $_POST['job'];

$previousCompany = isset($_POST['previousCompany']) ? (string)$_POST['previousCompany'] : '';

$body = "New Career Application\n\n"
  . "Name: {$_POST['name']}\n"
  . "Email: {$_POST['email']}\n"
  . "Phone: {$_POST['tel']}\n"
  . "Address: {$_POST['address']}\n"
  . "Role: {$_POST['job']}\n"
  . "Years Experience: {$_POST['yearsExperience']}\n"
  . "Previous Company: {$previousCompany}\n"
  . "Latest Diploma: {$_POST['latestDiploma']}\n"
  . "Message:\n{$_POST['message']}\n\n"
  . "Resume saved at: {$resumePath}\n"
  . ($coverPath ? "Cover letter saved at: {$coverPath}\n" : "")
  . "\nreCAPTCHA score: " . ($v['score'] ?? 'n/a') . "\n"
  . "Time: " . date('c') . "\n";

$headers = "From: $from\r\nReply-To: {$_POST['email']}\r\n";

$sent = @mail($mailTo, $subj, $body, $headers);
if (!$sent) {
  error_log("REMOTE TCB careers form: mail() failed. Configure SMTP or use SendGrid/Brevo.");
}

echo json_encode(['ok'=>true]);
