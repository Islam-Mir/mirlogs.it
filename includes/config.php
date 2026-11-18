<?php
/**
 * ============================================================
 * CONFIG.PHP - File di configurazione globale del sito
 * ============================================================
 * 
 * Questo file contiene tutte le impostazioni principali
 * del sito web. Viene incluso da ogni pagina PHP
 * tramite require_once, così se devo cambiare qualcosa
 * (es. il nome del sito, i colori, i link social)
 * lo faccio solo qui e si aggiorna ovunque.
 * 
 * Autore: Mir Islam - Studente di Informatica
 * ============================================================
 */

// --- INFORMAZIONI PERSONALI ---
// Questi dati vengono usati nell'header, footer e nelle pagine
$sito_nome = "Mir Islam";                          // Il mio nome completo
$sito_titolo = "Portfolio Personale";              // Sottotitolo del sito
$sito_descrizione = "Portfolio personale di Mir Islam: Web & Codice, progetti, viaggi e letture."; // Per SEO
$sito_email = "islam.mir@aldini.istruzioneer.it";  // Email di contatto
$sito_anno = date("Y");                            // Anno corrente (si aggiorna da solo)

// --- PERCORSI DEL SITO ---
// Definisco il percorso base così posso usarlo nei link
// dirname() prende la cartella del file corrente
// str_replace() converte i backslash di Windows in slash per gli URL
$base_path = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
// Se il percorso base è "/" non aggiungo nulla, altrimenti aggiungo il percorso
if ($base_path === '/' || $base_path === '.') {
    $base_url = '';
} else {
    $base_url = $base_path;
}

// --- LINK SOCIAL ---
// Array associativo: la chiave è il nome del social, il valore è l'URL
$social_links = [
    'github'    => 'https://github.com/mirislam',       // Profilo GitHub
    'linkedin'  => 'https://linkedin.com/in/mirislam',   // Profilo LinkedIn
    'instagram' => 'https://instagram.com/mirislam',     // Profilo Instagram
];

// --- PAGINE DEL MENU ---
// Ogni pagina ha un 'titolo' (mostrato nel menu) e un 'file' (il nome del file PHP)
// L'icona è un emoji che appare accanto al titolo nel menu
$pagine_menu = [
    ['titolo' => 'Home',         'file' => 'index.php',        'icona' => '🏠', 'fx' => 'home'],
    ['titolo' => 'Web & Codice', 'file' => 'informatica.php',  'icona' => '💻', 'fx' => 'code'],
    ['titolo' => 'Viaggi',       'file' => 'viaggi.php',       'icona' => '✈️', 'fx' => 'travel'],
    ['titolo' => 'Libri',        'file' => 'libri.php',        'icona' => '📚', 'fx' => 'books'],
    ['titolo' => 'Galleria',     'file' => 'galleria.php',     'icona' => '📸', 'fx' => 'gallery'],
    ['titolo' => 'Contatti',     'file' => 'contatti.php',     'icona' => '📬', 'fx' => 'contact'],
];

// --- LISTA PAESI VISITATI ---
// Ogni paese ha il nome, il codice bandiera (per flagcdn.com) e il link Wikipedia
$paesi_visitati = [
    ['nome' => 'Bangladesh',       'codice' => 'bd', 'link' => 'https://it.wikipedia.org/wiki/Bangladesh'],
    ['nome' => 'Italia',           'codice' => 'it', 'link' => 'https://it.wikipedia.org/wiki/Italia'],
    ['nome' => 'Francia',          'codice' => 'fr', 'link' => 'https://it.wikipedia.org/wiki/Francia'],
    ['nome' => 'Croazia',          'codice' => 'hr', 'link' => 'https://it.wikipedia.org/wiki/Croazia'],
    ['nome' => 'Svizzera',         'codice' => 'ch', 'link' => 'https://it.wikipedia.org/wiki/Svizzera'],
    ['nome' => 'Portogallo',       'codice' => 'pt', 'link' => 'https://it.wikipedia.org/wiki/Portogallo'],
    ['nome' => 'Germania',         'codice' => 'de', 'link' => 'https://it.wikipedia.org/wiki/Germania'],
    ['nome' => 'Polonia',          'codice' => 'pl', 'link' => 'https://it.wikipedia.org/wiki/Polonia'],
    ['nome' => 'Malta',            'codice' => 'mt', 'link' => 'https://it.wikipedia.org/wiki/Malta'],
    ['nome' => 'Inghilterra',      'codice' => 'gb', 'link' => 'https://it.wikipedia.org/wiki/Inghilterra'],
    ['nome' => 'Spagna',           'codice' => 'es', 'link' => 'https://it.wikipedia.org/wiki/Spagna'],
    ['nome' => 'Sri Lanka',        'codice' => 'lk', 'link' => 'https://it.wikipedia.org/wiki/Sri_Lanka'],
    ['nome' => 'Maldive',          'codice' => 'mv', 'link' => 'https://it.wikipedia.org/wiki/Maldive'],
    ['nome' => 'Malesia',          'codice' => 'my', 'link' => 'https://it.wikipedia.org/wiki/Malesia'],
    ['nome' => 'Singapore',        'codice' => 'sg', 'link' => 'https://it.wikipedia.org/wiki/Singapore'],
    ['nome' => 'Thailandia',       'codice' => 'th', 'link' => 'https://it.wikipedia.org/wiki/Thailandia'],
    ['nome' => 'Emirati Arabi',    'codice' => 'ae', 'link' => 'https://it.wikipedia.org/wiki/Emirati_Arabi_Uniti'],
    ['nome' => 'Albania',          'codice' => 'al', 'link' => 'https://it.wikipedia.org/wiki/Albania'],
    ['nome' => 'Città del Vaticano','codice' => 'va', 'link' => 'https://it.wikipedia.org/wiki/Città_del_Vaticano'],
    ['nome' => 'San Marino',       'codice' => 'sm', 'link' => 'https://it.wikipedia.org/wiki/San_Marino'],
    ['nome' => 'Monaco',           'codice' => 'mc', 'link' => 'https://it.wikipedia.org/wiki/Monaco'],
    ['nome' => 'Liechtenstein',    'codice' => 'li', 'link' => 'https://it.wikipedia.org/wiki/Liechtenstein'],
];

// --- CHATBOT ---
// URL del backend del chatbot RAG (quando sarà avviato con FastAPI/Uvicorn)
$chatbot_api_url = "http://127.0.0.1:8000/api/chat";

// --- FUNZIONE HELPER ---
// Questa funzione mi dice se la pagina corrente è quella attiva nel menu
// Serve per evidenziare la voce di menu della pagina in cui mi trovo
function paginaAttiva($file_pagina) {
    // basename() prende solo il nome del file dall'URL corrente
    // Lo confronto con il file della voce di menu
    $pagina_corrente = basename($_SERVER['SCRIPT_NAME']);
    return $pagina_corrente === $file_pagina;
}

// Funzione helper per generare l'HTML delle lettere del brand con i 6 colori animati
if (!function_exists('renderBrandLetters')) {
    function renderBrandLetters($text) {
        $colors = ['#1fa971', '#0fb5c9', '#3b82f6', '#8b5cf6', '#f59e0b', '#ec4899'];
        $out = '';
        $chars = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
        $colorIndex = 0;
        foreach ($chars as $i => $c) {
            if ($c === ' ') {
                $out .= '<span class="sp"></span>';
            } else {
                $color = $colors[$colorIndex % count($colors)];
                $colorIndex++;
                $out .= '<span class="ch" style="--i:' . $i . '"><span class="in" style="--c:' . $color . '; --d: 0;">' . htmlspecialchars($c) . '</span></span>';
            }
        }
        return $out;
    }
}

// Funzione helper per generare i caratteri span.l del titolo del nav-link
if (!function_exists('renderNavLetters')) {
    function renderNavLetters($text) {
        $out = '';
        $chars = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
        foreach ($chars as $i => $c) {
            $display = ($c === ' ') ? '&nbsp;' : htmlspecialchars($c);
            $out .= '<span class="l" style="--i:' . $i . '">' . $display . '</span>';
        }
        return $out;
    }
}
?>
