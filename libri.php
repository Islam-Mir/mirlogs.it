<?php
/**
 * ============================================================
 * LIBRI.PHP - La Biblioteca Editoriale di Mir Islam
 * ============================================================
 * Ispirata al calore e all'eleganza di Seasons in Colour:
 * - Recensioni editoriali e valutazioni a stelle
 * - Spunti di riflessione e citazioni significative
 * - Armonia visiva tra saggi, informatica e narrativa
 * ============================================================
 */

$titolo_pagina = "Libri · In costruzione";
require_once 'includes/header.php';
?>

<div class="books-under-construction">
<div class="books-content-blur" aria-hidden="true" inert>
<div class="container">

  <!-- INTESTAZIONE SEZIONE -->
  <div style="padding-top: 30px; margin-bottom: 40px;">
    <span class="section-label">Biblioteca Personale</span>
    <h1 style="font-size: 3.5rem; margin-bottom: 14px;">Pagine, Idee &amp; <em>Visioni</em></h1>
    <p style="color: var(--text-muted); max-width: 650px; font-size: 1.05rem;">
      Una biblioteca in costruzione: letture reali e schede dimostrative, da aggiornare con appunti, passaggi e domande che restano.
    </p>
  </div>

  <!-- GRIGLIA LIBRI EDITORIALI -->
  <div class="magazine-grid">

    <!-- LIBRO 1: CLEAN CODE -->
    <article class="magazine-card">
      <div class="magazine-thumb" style="height: 200px;">
        <span class="magazine-category">Ingegneria del Software</span>
        <img src="assets/img/libri/book_cover_placeholder.svg" alt="Clean Code Cover" class="clickable-image">
      </div>
      <div class="magazine-body">
        <div style="color: var(--accent-gold); font-size: 0.95rem; margin-bottom: 8px;">★★★★★</div>
        <h3 class="magazine-title">Clean Code</h3>
        <p style="font-size: 0.78rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--accent-terracotta); font-weight: 700; margin-bottom: 12px;">Robert C. Martin</p>
        <p class="magazine-excerpt">
          Il testo di riferimento per chiunque voglia scrivere codice che parli agli esseri umani prima ancora che ai compilatori.
        </p>
        <div style="border-top: 1px solid var(--border-delicate); padding-top: 12px; font-size: 0.85rem; font-style: italic; color: var(--text-muted);">
          «La semplicità è il prerequisito fondamentale per l'affidabilità.»
        </div>
      </div>
    </article>

    <!-- LIBRO 2: UN ALTRO GIRO DI GIOSTRA -->
    <article class="magazine-card">
      <div class="magazine-thumb" style="height: 200px;">
          <span class="magazine-category">Narrativa · scheda demo</span>
        <img src="assets/img/libri/book_cover_placeholder.svg" alt="Copertina segnaposto per una scheda di lettura" class="clickable-image">
      </div>
      <div class="magazine-body">
        <div style="color: var(--accent-gold); font-size: 0.95rem; margin-bottom: 8px;">★★★★★</div>
        <h3 class="magazine-title">Il nome della rosa</h3>
        <p style="font-size: 0.78rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--accent-terracotta); font-weight: 700; margin-bottom: 12px;">Umberto Eco · scheda dimostrativa</p>
        <p class="magazine-excerpt">
          Un mistero costruito come un sistema: indizi, archivi e interpretazioni si incastrano dentro una biblioteca labirintica.
        </p>
        <div style="border-top: 1px solid var(--border-delicate); padding-top: 12px; font-size: 0.85rem; font-style: italic; color: var(--text-muted);">
          Un romanzo su come le informazioni cambiano significato a seconda di chi le custodisce.
        </div>
      </div>
    </article>

    <!-- LIBRO 3: SAPIENS -->
    <article class="magazine-card">
      <div class="magazine-thumb" style="height: 200px;">
          <span class="magazine-category">Scienza · scheda demo</span>
        <img src="assets/img/libri/book_cover_placeholder.svg" alt="Copertina segnaposto per una scheda di lettura" class="clickable-image">
      </div>
      <div class="magazine-body">
        <div style="color: var(--accent-gold); font-size: 0.95rem; margin-bottom: 8px;">★★★★★</div>
        <h3 class="magazine-title">Breve storia di (quasi) tutto</h3>
        <p style="font-size: 0.78rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--accent-terracotta); font-weight: 700; margin-bottom: 12px;">Bill Bryson · scheda dimostrativa</p>
        <p class="magazine-excerpt">
          Una panoramica curiosa su come si è formata la conoscenza scientifica, raccontata attraverso esperimenti, errori e scoperte.
        </p>
        <div style="border-top: 1px solid var(--border-delicate); padding-top: 12px; font-size: 0.85rem; font-style: italic; color: var(--text-muted);">
          La scienza avanza anche grazie alle domande semplici fatte al momento giusto.
        </div>
      </div>
    </article>

  </div>

  <!-- GRANDE CITAZIONE IN EVIDENZA -->
  <div class="quote-banner">
    <p class="quote-text">
      «Un lettore vive mille vite prima di morire. Chi non legge ne vive solo una.»
    </p>
    <span class="quote-author">— George R.R. Martin</span>
  </div>

</div>
</div>

<section class="construction-overlay" role="status" aria-labelledby="construction-title">
  <div class="construction-message">
    <span class="construction-star" aria-hidden="true">✳</span>
    <span class="section-label">Un nuovo capitolo</span>
    <h1 id="construction-title">La biblioteca è in costruzione</h1>
    <p>Sto preparando una selezione di libri, idee e appunti da condividere. Torna presto.</p>
  </div>
</section>
</div>

<?php
require_once 'includes/footer.php';
?>
