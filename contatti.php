<?php
/**
 * ============================================================
 * CONTATTI.PHP - Invio e Gestione Messaggi Reale
 * ============================================================
 * Caratteristiche:
 * 1. Salva ogni messaggio su un file locale (data/messaggi.json)
 *    in modo da non perdere MAI nessun messaggio anche in locale!
 * 2. Visualizza la cronologia dei messaggi ricevuti
 * 3. Offre il collegamento rapido mailto: per invio diretto da client di posta
 * ============================================================
 */

$titolo_pagina = "Contatti & Connessioni";
require_once 'includes/header.php';

// File JSON dove memorizziamo i messaggi ricevuti
$file_messaggi = __DIR__ . '/data/messaggi.json';

// Inizializziamo il file se non esiste
if (!file_exists($file_messaggi)) {
    file_put_contents($file_messaggi, json_encode([], JSON_PRETTY_PRINT));
}

$messaggio_salvato = false;
$errore_modulo = "";
$ultimo_nome = "";
$ultimo_email = "";
$ultimo_testo = "";

// GESTIONE DELL'INVIO DEL FORM
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $messaggio = trim($_POST['messaggio'] ?? '');

    if (!empty($nome) && !empty($email) && !empty($messaggio)) {
        
        // 1. Leggiamo i messaggi preesistenti
        $contenuto_attuale = file_get_contents($file_messaggi);
        $elenco_messaggi = json_decode($contenuto_attuale, true);
        if (!is_array($elenco_messaggi)) {
            $elenco_messaggi = [];
        }

        // 2. Creiamo il nuovo record con data e ora
        $nuovo_messaggio = [
            'id' => uniqid('msg_'),
            'data_ora' => date('d/m/Y H:i:s'),
            'nome' => $nome,
            'email' => $email,
            'messaggio' => $messaggio,
            'ip' => $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1'
        ];

        // 3. Aggiungiamo in cima all'elenco (così l'ultimo è il primo visibile)
        array_unshift($elenco_messaggi, $nuovo_messaggio);

        // 4. Salviamo su disco nel file JSON
        file_put_contents($file_messaggi, json_encode($elenco_messaggi, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        $messaggio_salvato = true;
        $ultimo_nome = $nome;
        $ultimo_email = $email;
        $ultimo_testo = $messaggio;

    } else {
        $errore_modulo = "Tutti i campi (Nome, Email e Messaggio) sono obbligatori.";
    }
}

// Leggiamo tutti i messaggi per mostrarli nell'archivio locale
$messaggi_ricevuti = json_decode(file_get_contents($file_messaggi), true);
if (!is_array($messaggi_ricevuti)) {
    $messaggi_ricevuti = [];
}
?>

<div class="container">

    <!-- INTESTAZIONE SEZIONE -->
    <div style="margin-bottom: 40px; padding-top: 30px;">
        <span class="section-label">Dialoghi &amp; Connessioni</span>
        <h1 style="font-size: 3rem; margin-bottom: 12px;">Scrivimi un <em>Messaggio</em></h1>
        <p style="color: var(--text-muted); max-width: 650px;">
            Che si tratti di un progetto software, di un'idea di viaggio o di uno scambio di vedute su una lettura, sarò
            felice di leggerti.
        </p>
    </div>

    <div class="contact-layout">

        <!-- COLONNA 1: FORM EDITORIALE -->
        <div class="contact-card">
            <h3 style="font-size: 1.8rem; margin-bottom: 20px;">Modulo Diretto</h3>

            <?php if ($messaggio_salvato): ?>
            <div
                style="background-color: #EBF5EE; border: 1px solid #C4E3CB; color: #2D5A3C; padding: 18px; border-radius: var(--radius-sm); margin-bottom: 24px;">
                <h4 style="font-size: 1.1rem; margin-bottom: 6px;">✓ Ricevuto con successo!</h4>
                <p style="font-size: 0.9rem; color: #2D5A3C; margin-bottom: 12px;">
                    Il tuo messaggio da parte di <strong><?php echo htmlspecialchars($ultimo_nome); ?></strong> è stato
                    registrato ed è visibile nell'archivio messaggi locale in fondo a questa pagina.
                </p>
                <!-- Opzione rapida per inviare copia via mailto -->
                <?php 
            $mailto_link = "mailto:" . rawurlencode($sito_email) 
              . "?subject=" . rawurlencode("Contatto dal sito da: " . $ultimo_nome) 
              . "&body=" . rawurlencode("Mittente: " . $ultimo_nome . " (" . $ultimo_email . ")\n\n" . $ultimo_testo);
          ?>
                <a href="<?php echo $mailto_link; ?>" class="btn-editorial"
                    style="font-size: 0.72rem; padding: 10px 18px;">
                    Apri anche nel tuo Client Email (Opzionale) &rarr;
                </a>
            </div>
            <?php endif; ?>

            <?php if (!empty($errore_modulo)): ?>
            <div
                style="background-color: #FDF2F0; border: 1px solid #F5C6CB; color: #9B2C2C; padding: 14px; border-radius: var(--radius-sm); margin-bottom: 20px;">
                ⚠ <?php echo htmlspecialchars($errore_modulo); ?>
            </div>
            <?php endif; ?>

            <form action="contatti.php" method="POST">

                <div class="form-group">
                    <label for="campo-nome" class="form-label">Nome Completo</label>
                    <input type="text" id="campo-nome" name="nome" class="form-input" placeholder="Come ti chiami?"
                        required
                        value="<?php echo isset($_POST['nome']) && !$messaggio_salvato ? htmlspecialchars($_POST['nome']) : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="campo-email" class="form-label">Indirizzo Email</label>
                    <input type="email" id="campo-email" name="email" class="form-input" placeholder="latua@email.com"
                        required
                        value="<?php echo isset($_POST['email']) && !$messaggio_salvato ? htmlspecialchars($_POST['email']) : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="campo-messaggio" class="form-label">Il Tuo Messaggio</label>
                    <textarea id="campo-messaggio" name="messaggio" rows="6" class="form-textarea"
                        placeholder="Di cosa vorresti parlare?" style="resize: vertical;"
                        required><?php echo isset($_POST['messaggio']) && !$messaggio_salvato ? htmlspecialchars($_POST['messaggio']) : ''; ?></textarea>
                </div>

                <button type="submit" class="btn-editorial" style="width: 100%; justify-content: center;">
                    Invia Messaggio &rarr;
                </button>

            </form>
        </div>

        <!-- COLONNA 2: DETTAGLI & SOCIAL -->
        <div>
            <div class="contact-card" style="margin-bottom: 24px;">
                <span class="section-label">Canali Diretti</span>
                <h3 style="font-size: 1.6rem; margin-bottom: 14px;">Recapiti</h3>

                <p style="margin-bottom: 14px; font-size: 0.95rem;">
                    ✉️ <strong>Email Principale:</strong><br>
                    <a href="mailto:<?php echo htmlspecialchars($sito_email); ?>"
                        style="color: var(--accent-terracotta); font-weight: 600;">
                        <?php echo htmlspecialchars($sito_email); ?>
                    </a>
                </p>

                <p style="margin-bottom: 14px; font-size: 0.95rem;">
                    📍 <strong>Sede:</strong><br>
                    Bologna / Emilia-Romagna, Italia
                </p>

                <p style="font-size: 0.95rem;">
                    🕒 <strong>Fuso Orario:</strong><br>
                    CET (UTC+1) — Rispondo solitamente entro 24 ore.
                </p>
            </div>

            <div class="contact-card">
                <span class="section-label">Network &amp; Progetti</span>
                <h3 style="font-size: 1.6rem; margin-bottom: 14px;">Canali Social</h3>

                <ul style="list-style: none; display: flex; flex-direction: column; gap: 12px;">
                    <li>
                        <a href="https://github.com/Islam-Mir/" target="_blank" rel="noopener noreferrer"
                            class="magazine-link" style="border: none; padding: 0;">
                            🐙 GitHub — Codice e Repository
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/in/islam-mir-bba472447/" target="_blank"
                            rel="noopener noreferrer" class="magazine-link" style="border: none; padding: 0;">
                            💼 LinkedIn — Rete Professionale
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/islammir.jahi" target="_blank" rel="noopener noreferrer"
                            class="magazine-link" style="border: none; padding: 0;">
                            📷 Instagram — Diario di Viaggio
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>

    <!-- PANNELLO INBOX: ARCHIVIO DEI MESSAGGI SALVATI IN LOCALE 
    <section class="inbox-panel">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px;">
            <div>
                <span class="section-label">Registro Locale</span>
                <h3 style="font-size: 1.5rem; margin: 0;">📥 Archivio Messaggi Ricevuti
                    (<?php echo count($messaggi_ricevuti); ?>)</h3>
                <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 4px;">
                    Tutti i messaggi inviati tramite il modulo vengono registrati in questo database locale per non
                    perderne nessuno.
                </p>
            </div>
        </div>

        <?php if (empty($messaggi_riceviti)): ?>
        <p style="font-size: 0.9rem; color: var(--text-light); font-style: italic;">
            Nessun messaggio presente al momento. Inviane uno dal form sopra per testarlo!
        </p>
        <?php else: ?>
        <?php foreach ($messaggi_riceviti as $msg): ?>
        <div class="inbox-item">
            <div class="inbox-meta">
                <strong><?php echo htmlspecialchars($msg['nome']); ?> &bull; <a
                        href="mailto:<?php echo htmlspecialchars($msg['email']); ?>"><?php echo htmlspecialchars($msg['email']); ?></a></strong>
                <span>🕒 <?php echo htmlspecialchars($msg['data_ora']); ?></span>
            </div>
            <div style="font-size: 0.95rem; color: var(--text-main); line-height: 1.5; white-space: pre-wrap;">
                <?php echo htmlspecialchars($msg['messaggio']); ?>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </section>

</div>
-->
    <?php
require_once 'includes/footer.php';
?>