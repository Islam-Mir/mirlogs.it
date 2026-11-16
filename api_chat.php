<?php
/**
 * ============================================================
 * API_CHAT.PHP - Motore Intelligente Autonomo per il Chatbot
 * ============================================================
 * 
 * Questo script elabora le domande DIRETTAMENTE in PHP:
 * - Nessun server esterno, nessuna porta 8000, nessun Python richiesto.
 * - Legge la base di conoscenza da data/conoscenza.json.
 * - Analizza la frase dell'utente con calcolo di affinità per parole chiave.
 * - Restituisce istantaneamente la risposta corretta in formato JSON.
 * ============================================================
 */

header('Content-Type: application/json; charset=utf-8');

// Leggiamo la richiesta: può arrivare sia come JSON (php://input) sia come parametro POST/GET normale
$messaggio_input = "";
$input_json = file_get_contents('php://input');

if (!empty($input_json)) {
    $dati = json_decode($input_json, true);
    if (isset($dati['message'])) {
        $messaggio_input = trim($dati['message']);
    }
}

// Fallback su $_POST o $_GET se non inviato in JSON grezzo
if (empty($messaggio_input)) {
    $messaggio_input = trim($_POST['message'] ?? $_GET['message'] ?? '');
}

if (empty($messaggio_input)) {
    echo json_encode(['answer' => 'Ciao! Scrivimi una domanda o seleziona uno degli argomenti suggeriti qui sotto.']);
    exit;
}

$domanda_originale = $messaggio_input;
$domanda_pulita = strtolower($domanda_originale);
// Rimuoviamo punteggiatura comune per facilitare il confronto
$domanda_pulita = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $domanda_pulita);

// Gestione saluti di base
if (preg_match('/\b(ciao|buongiorno|buonasera|salve|hey|hola)\b/u', $domanda_pulita)) {
    echo json_encode([
        'answer' => "Ciao! 👋 Sono l'assistente virtuale di Mir Islam. Chiedimi pure dei suoi progetti Web & Codice, dei suoi viaggi o delle sue letture preferite!"
    ]);
    exit;
}

// Carichiamo la base di conoscenza dal file locale
$file_conoscenza = __DIR__ . '/data/conoscenza.json';
if (!file_exists($file_conoscenza)) {
    echo json_encode(['answer' => "Benvenuto! Puoi navigare tra le sezioni del sito per scoprire i progetti e i viaggi di Mir."]);
    exit;
}

$conoscenza = json_decode(file_get_contents($file_conoscenza), true);
if (!is_array($conoscenza)) {
    echo json_encode(['answer' => "Errore nel caricamento della base di conoscenza."]);
    exit;
}

// ALGORITMO DI MATCHING DELLE PAROLE CHIAVE
$miglior_punteggio = 0;
$miglior_risposta = "";

// Dividiamo la domanda in singole parole
$parole_domanda = array_filter(explode(' ', $domanda_pulita));

foreach ($conoscenza as $voce) {
    $punteggio = 0;
    $parole_chiave = $voce['parole_chiave'] ?? [];

    foreach ($parole_chiave as $chiave) {
        $chiave_pulita = strtolower($chiave);
        
        // Match esatto della frase chiave nella domanda
        if (strpos($domanda_pulita, $chiave_pulita) !== false) {
            $punteggio += 3; // Peso elevato per frasi o parole esatte
        }
        
        // Match parziale su singole parole
        foreach ($parole_domanda as $parola) {
            if (strlen($parola) > 2 && strpos($chiave_pulita, $parola) !== false) {
                $punteggio += 1;
            }
        }
    }

    if ($punteggio > $miglior_punteggio) {
        $miglior_punteggio = $punteggio;
        $miglior_risposta = $voce['risposta'];
    }
}

// Se abbiamo trovato una risposta pertinente
if ($miglior_punteggio > 0 && !empty($miglior_risposta)) {
    echo json_encode(['answer' => $miglior_risposta]);
    exit;
}

// Risposta di cortesia se non trova argomenti specifici
echo json_encode([
    'answer' => "Non ho trovato informazioni precise su questo argomento nella mia base dati. Puoi chiedermi dei progetti Web & Codice, dei viaggi, dei libri oppure lasciarmi un messaggio nella pagina 'Contatti'!"
]);
?>
