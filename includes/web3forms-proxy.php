<?php
/**
 * ============================================================
 * WEB3FORMS PROXY - Invia email via Web3Forms senza esporre la chiave
 * ============================================================
 * Il frontend chiama questo script PHP; la access_key resta sul server.
 */
header('Content-Type: application/json; charset=utf-8');

// --- Leggi .env ---
$envFile = __DIR__ . '/../.env';
$accessKey = '';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || strpos($line, '#') === 0) {
            continue;
        }
        if (strpos($line, 'WEB3FORMS_ACCESS_KEY=') === 0) {
            $accessKey = trim(substr($line, strlen('WEB3FORMS_ACCESS_KEY=')));
        }
    }
}

if (empty($accessKey)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Configurazione mancante sul server.']);
    exit;
}

// --- Ricevi dati dal frontend ---
$input = json_decode(file_get_contents('php://input'), true);
if (!is_array($input)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Dati non validi.']);
    exit;
}

$nome = trim($input['nome'] ?? '');
$email = trim($input['email'] ?? '');
$messaggio = trim($input['messaggio'] ?? '');

if ($nome === '' || $email === '' || $messaggio === '') {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Tutti i campi sono obbligatori.']);
    exit;
}

// --- Inoltra a Web3Forms (chiave nascosta sul server) ---
$postData = [
    'access_key' => $accessKey,
    'name' => $nome,
    'email' => $email,
    'message' => $messaggio,
    'subject' => 'Nuovo messaggio dal sito da: ' . $nome
];

$ch = curl_init('https://api.web3forms.com/submit');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

if ($response === false) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Errore di rete: ' . $curlError]);
    exit;
}

$data = json_decode($response, true);

if (isset($data['success']) && $data['success'] === true) {
    echo json_encode(['success' => true, 'message' => 'Messaggio inviato con successo!']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => $data['message'] ?? 'Errore invio (HTTP ' . $httpCode . ')']);
}
