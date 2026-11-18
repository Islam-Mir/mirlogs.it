<?php
/**
 * ============================================================
 * CONTATTI.PHP - Modulo diretto con invio email via Web3Forms
 * ============================================================
 */

$titolo_pagina = "Contatti & Connessioni";
require_once 'includes/header.php';
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

            <div id="contact-result" style="margin-bottom: 20px; padding: 18px; border-radius: var(--radius-sm); display: none;"></div>

            <form id="contact-form">
                <div class="form-group">
                    <label for="campo-nome" class="form-label">Nome Completo</label>
                    <input type="text" id="campo-nome" name="nome" class="form-input" placeholder="Come ti chiami?" required>
                </div>

                <div class="form-group">
                    <label for="campo-email" class="form-label">Indirizzo Email</label>
                    <input type="email" id="campo-email" name="email" class="form-input" placeholder="latua@email.com" required>
                </div>

                <div class="form-group">
                    <label for="campo-messaggio" class="form-label">Il Tuo Messaggio</label>
                    <textarea id="campo-messaggio" name="messaggio" rows="6" class="form-textarea" placeholder="Di cosa vorresti parlare?" style="resize: vertical;" required></textarea>
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

</div>

<script>
(function () {
  var form = document.getElementById('contact-form');
  var result = document.getElementById('contact-result');
  if (!form) return;

  form.addEventListener('submit', async function (e) {
    e.preventDefault();

    var formData = new FormData(form);

    result.style.display = 'block';
    result.style.background = '#EBF5EE';
    result.style.color = '#2D5A3C';
    result.textContent = 'Invio in corso...';

    try {
      var response = await fetch('includes/web3forms-proxy.php', {
        method: 'POST',
        headers: {
          'Accept': 'application/json'
        },
        body: formData
      });
      var data = await response.json();

      if (data.success) {
        result.style.background = '#EBF5EE';
        result.style.color = '#2D5A3C';
        result.textContent = '✓ Messaggio inviato con successo! Riceverai una risposta al più presto.';
        form.reset();
      } else {
        throw new Error(data.message || 'Errore invio');
      }
    } catch (err) {
      result.style.background = '#FDF2F0';
      result.style.color = '#9B2C2C';
      result.textContent = '⚠ Si è verificato un errore nell\'invio. Riprova più tardi o scrivimi direttamente.';
    }
  });
})();
</script>

<?php
require_once 'includes/footer.php';
?>
