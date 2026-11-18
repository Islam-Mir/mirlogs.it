<?php
/**
 * ============================================================
 * FOOTER.PHP - Piè di Pagina Editoriale Globale
 * ============================================================
 * Ispirato allo stile di Seasons in Colour e Mikaela Reuben:
 * - Linee sottili di separazione
 * - Link social con microinterazioni sobrie
 * - Inclusione del widget Chatbot e della modale Lightbox
 * ============================================================
 */
?>
</main> <!-- Fine .main-content -->

<!-- MODALE LIGHTBOX PER FOTO INGRANDITE -->
<div class="lightbox-modal" id="lightbox-modal" aria-hidden="true">
    <div class="lightbox-content">
        <button class="lightbox-close" id="lightbox-close" aria-label="Chiudi modale">&times;</button>
        <img src="" alt="Anteprima ingrandita" class="lightbox-img" id="lightbox-img">
    </div>
</div>

<!-- WIDGET CHATBOT RAG (DISPONIBILE SU TUTTE LE PAGINE) -->
<?php require_once __DIR__ . '/chatbot.php'; ?>

<!-- PIÈ DI PAGINA EDITORIALE -->
<footer class="site-footer">
    <div class="container">

        <div class="footer-inner">

            <!-- Identità a sinistra con identico effetto dell'header -->
            <a href="index.php" class="mwn-brand" aria-label="MIR ISLAM, torna alla home">
                <span class="moon" aria-hidden="true"></span>
                <span aria-hidden="true"><?php echo renderBrandLetters("MIR ISLAM"); ?></span>
            </a>

            <!-- Link social ed email a destra -->
            <div class="footer-socials">
                <a href="https://github.com/Islam-Mir/" target="_blank" rel="noopener noreferrer" class="social-link social-github" aria-label="GitHub">
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="M12 .9a11.1 11.1 0 0 0-3.51 21.63c.55.1.76-.24.76-.53v-2.08c-3.1.67-3.76-1.32-3.76-1.32-.5-1.29-1.24-1.63-1.24-1.63-1.02-.7.08-.69.08-.69 1.12.08 1.71 1.15 1.71 1.15 1 1.7 2.61 1.21 3.25.93.1-.72.39-1.21.71-1.49-2.48-.28-5.09-1.24-5.09-5.53 0-1.22.44-2.22 1.15-3-.12-.28-.5-1.42.11-2.96 0 0 .94-.3 3.05 1.15a10.6 10.6 0 0 1 5.55 0c2.11-1.45 3.05-1.15 3.05-1.15.61 1.54.23 2.68.11 2.96.72.78 1.15 1.78 1.15 3 0 4.3-2.61 5.25-5.1 5.52.4.35.76 1.03.76 2.08V22c0 .29.2.63.77.52A11.1 11.1 0 0 0 12 .9Z"/></svg>
                    <span>GitHub</span>
                </a>
                <a href="https://www.linkedin.com/in/islam-mir-bba472447/" target="_blank" rel="noopener noreferrer" class="social-link social-linkedin" aria-label="LinkedIn">
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="M20.45 2H3.55C2.69 2 2 2.68 2 3.53v16.94c0 .85.69 1.53 1.55 1.53h16.9c.86 0 1.55-.68 1.55-1.53V3.53c0-.85-.69-1.53-1.55-1.53ZM7.93 18.46H4.96V9.1h2.97v9.36ZM6.45 7.82a1.72 1.72 0 1 1 .02-3.44 1.72 1.72 0 0 1-.02 3.44Zm12.01 10.64H15.5v-4.55c0-1.08-.02-2.47-1.5-2.47-1.5 0-1.73 1.17-1.73 2.39v4.63H9.3V9.1h2.85v1.28h.04c.4-.73 1.37-1.5 2.82-1.5 3.02 0 3.58 1.99 3.58 4.57v5.01Z"/></svg>
                    <span>LinkedIn</span>
                </a>
                <a href="https://www.instagram.com/islammir.jahi" target="_blank" rel="noopener noreferrer" class="social-link social-instagram" aria-label="Instagram">
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" d="M7.2 2h9.6A5.2 5.2 0 0 1 22 7.2v9.6a5.2 5.2 0 0 1-5.2 5.2H7.2A5.2 5.2 0 0 1 2 16.8V7.2A5.2 5.2 0 0 1 7.2 2Zm0 2A3.2 3.2 0 0 0 4 7.2v9.6A3.2 3.2 0 0 0 7.2 20h9.6a3.2 3.2 0 0 0 3.2-3.2V7.2A3.2 3.2 0 0 0 16.8 4H7.2Zm4.8 3a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 2a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm5.2-3.5a1.2 1.2 0 1 1 0 2.4 1.2 1.2 0 0 1 0-2.4Z"/></svg>
                    <span>Instagram</span>
                </a>
                <a href="contatti.php" class="btn-editorial btn-contact"><span>Scrivimi <span aria-hidden="true">&rarr;</span></span></a>
            </div>

        </div>

        <nav class="footer-privacy-links" aria-label="Privacy e cookie">
            <a href="privacy.php" class="footer-link">Privacy Policy</a>
            <button type="button" class="footer-link cookie-preferences-open" data-cookie-preferences>Preferenze Cookie</button>
        </nav>

        <div class="footer-copy">
            &copy; <?php echo $sito_anno; ?> <?php echo htmlspecialchars($sito_nome); ?> &bull; Progettato e sviluppato
            con il supporto dell'IA. Tutti i diritti riservati.
        </div>

    </div>
</footer>

<section class="cookie-banner" id="cookie-banner" role="dialog" aria-label="Preferenze cookie" aria-describedby="cookie-banner-text" hidden>
    <p id="cookie-banner-text">Questo sito utilizza cookie tecnici essenziali e, previo tuo consenso, cookie analitici di Google Analytics per comprendere come viene visitato il sito. <a href="privacy.php">Leggi la Privacy Policy</a></p>
    <div class="cookie-banner-actions">
        <button type="button" class="cookie-action" data-cookie-choice="accept">Accetta</button>
        <button type="button" class="cookie-action" data-cookie-choice="reject">Rifiuta</button>
    </div>
</section>

<!-- SCRIPT JAVASCRIPT MODULARI (Uno per ciascun compito) -->
<script src="assets/js/modal.js"></script>
<script src="assets/js/carosello.js?v=<?php echo filemtime(__DIR__ . '/../assets/js/carosello.js'); ?>"></script>
<script src="assets/js/galleria.js"></script>
<script src="assets/js/chatbot.js"></script>
<script src="assets/js/cookie-consent.js"></script>

</body>

</html>
