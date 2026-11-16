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

            <!-- Identità a sinistra -->
            <div>
                <span
                    style="font-family: var(--font-serif); font-size: 1.8rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; display: block; color: var(--text-main);">
                    <?php echo htmlspecialchars($sito_nome); ?>
                </span>
                <span
                    style="font-size: 0.75rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--accent-terracotta); font-weight: 700;">
                    Storie, luoghi e progetti web
                </span>
            </div>

            <!-- Link social ed email a destra -->
            <div class="footer-socials">
                <a href="https://github.com/Islam-Mir/" target="_blank" rel="noopener noreferrer" class="nav-link">GitHub</a>
                <a href="https://www.linkedin.com/in/islam-mir-bba472447/" target="_blank" rel="noopener noreferrer" class="nav-link">LinkedIn</a>
                <a href="https://www.instagram.com/islammir.jahi" target="_blank" rel="noopener noreferrer" class="nav-link">Instagram</a>
                <a href="contatti.php" class="btn-editorial">Scrivimi &rarr;</a>
            </div>

        </div>

        <div class="footer-copy">
            &copy; <?php echo $sito_anno; ?> <?php echo htmlspecialchars($sito_nome); ?> &bull; Progettato e sviluppato
            con il supporto dell'IA. Tutti i diritti riservati.
        </div>

    </div>
</footer>

<!-- SCRIPT JAVASCRIPT MODULARI (Uno per ciascun compito) -->
<script src="assets/js/menu.js"></script>
<script src="assets/js/modal.js"></script>
<script src="assets/js/carosello.js"></script>
<script src="assets/js/galleria.js"></script>
<script src="assets/js/chatbot.js"></script>

</body>

</html>
