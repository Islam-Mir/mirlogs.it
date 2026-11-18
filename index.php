<?php
/**
 * ============================================================
 * INDEX.PHP - Home Page Editoriale
 * ============================================================
 * Ispirata alla compilation di:
 * - Zion Adventure Photog (fotografia, timbro avventura, colori caldi)
 * - Seasons in Colour (griglia articoli magazine a 3 colonne, layout elegante)
 * - Mikaela Reuben (composizione asimmetrica, tipografia d'alta classe)
 * ============================================================
 */

$titolo_pagina = "Home";
require_once 'includes/header.php';
?>

<div class="container">

    <!-- 1. HERO SECTION ASIMMETRICO (Stile Mikaela Reuben + Zion Adventure) -->
    <section class="hero-editorial">

        <!-- Testo Hero a sinistra -->
        <div class="hero-text">
            <span class="hero-eyebrow">Studente di Informatica &amp; World Explorer</span>
            <h1 class="hero-heading">
                Il codice per <em>creare</em>,<br>
                il mondo per <em>comprendere</em>.
            </h1>
            <p class="hero-desc">
                Studio informatica a Bologna e ho completato un percorso come Full Stack Web Developer. Questo è il mio
                spazio digitale: qui raccolgo i progetti che sviluppo, i miei appunti di viaggio e le idee nate
                leggendo.
            </p>
            <div class="hero-actions">
                <a href="viaggi.php" class="btn-editorial">Esplora i Viaggi &rarr;</a>
                <a href="informatica.php" class="btn-editorial-outline">I Miei Progetti</a>
            </div>
        </div>

        <!-- Fotografia Hero a destra con Timbro Circolare (Zion Adventure Photog) -->
        <div class="hero-visual">
            <div class="hero-img-wrap">
                <img src="assets/img/viaggi/M19.jpg" alt="Mir Islam in viaggio" class="clickable-image">
            </div>
            <!-- Timbro circolare stile Zion Photog -->
            <div class="stamp-badge"><span class="num">🛫</span><span class="label">Passi e pensieri</span></div>
        </div>

    </section>

    <!-- 2. I TRE PILASTRI - GRIGLIA EDITORIALE MAGAZINE (Stile Seasons in Colour) -->
    <section>
        <div class="section-header">
            <span class="section-label">Il mio percorso</span>
            <h2 class="section-title">Web &amp; Codice, <em>viaggi</em> e letture</h2>
            <p class="section-sub">Progetti a cui lavoro, luoghi che ho incontrato e una biblioteca che sto preparando.
            </p>
        </div>

        <div class="magazine-grid">

            <!-- CARD 1: INFORMATICA -->
            <article class="magazine-card">
                <div class="magazine-thumb">
                    <span class="magazine-category">Web &amp; Codice</span>
                    <img src="assets/img/informatica/dev.jpg" alt="Schema di un progetto di intelligenza artificiale"
                        class="clickable-image">
                </div>
                <div class="magazine-body">
                    <span class="magazine-num">Progetti</span>
                    <h3 class="magazine-title">Imparo costruendo</h3>
                    <p class="magazine-excerpt">
                        Esercizi e progetti su JavaScript, PHP, Laravel, SQL e API: dal codice che gira nel browser
                        alle applicazioni con database e chatbot RAG.
                    </p>
                    <a href="informatica.php" class="magazine-link">Esplora Web &amp; Codice &rarr;</a>
                </div>
            </article>

            <!-- CARD 2: VIAGGI -->
            <article class="magazine-card">
                <div class="magazine-thumb">
                    <span class="magazine-category">Diario di viaggio</span>
                    <img src="assets/img/viaggi/M16.jpg" alt="Viaggi nel mondo" class="clickable-image">
                </div>
                <div class="magazine-body">
                    <span class="magazine-num">Viaggi</span>
                    <h3 class="magazine-title">Luoghi, incontri, ricordi</h3>
                    <p class="magazine-excerpt">
                        Una raccolta di fotografie e appunti dai luoghi che ho attraversato: strade, paesaggi, incontri
                        e momenti sott’acqua.
                    </p>
                    <a href="viaggi.php" class="magazine-link">Sfoglia i viaggi &rarr;</a>
                </div>
            </article>

            <!-- CARD 3: LETTURE -->
            <article class="magazine-card">
                <div class="magazine-thumb">
                    <span class="magazine-category">In costruzione</span>
                    <img src="assets/img/libri/lib.jpg" alt="Grafica della sezione letture in preparazione">
                </div>
                <div class="magazine-body">
                    <span class="magazine-num">Letture</span>
                    <h3 class="magazine-title">Una biblioteca in arrivo</h3>
                    <p class="magazine-excerpt">
                        Sto preparando uno spazio per raccogliere libri, note e idee. La sezione è in costruzione e
                        arriverà presto.
                    </p>
                    <a href="libri.php" class="magazine-link">Vai alla pagina in costruzione &rarr;</a>
                </div>
            </article>

        </div>
    </section>

</div> <!-- Fine container -->

<!-- 3. CAROSELLO 3D MIR CAROUSEL A TUTTA LARGHEZZA (Frammenti di Mondo) -->
<section class="mw-section home-carousel-section" data-mw-carousel data-autoplay="5000">
    <div class="mw-bg"><i></i><i></i></div>

    <div class="mw-head">
        <span class="section-label">Archivio Fotografico</span>
        <h2 class="mw-title">Frammenti di Mondo</h2>
    </div>

    <figure class="mw-source">
        <img src="assets/img/viaggi/M1.jpg" alt="Scatto 1">
        <img src="assets/img/viaggi/M2.jpg" alt="Scatto 2">
        <img src="assets/img/viaggi/M3.jpg" alt="Scatto 3">
        <img src="assets/img/viaggi/M4.jpg" alt="Scatto 4">
        <img src="assets/img/viaggi/M5.jpg" alt="Scatto 5">
        <img src="assets/img/viaggi/M6.jpg" alt="Scatto 6">
        <img src="assets/img/viaggi/M7.jpg" alt="Scatto 7">
        <img src="assets/img/viaggi/M8.jpg" alt="Scatto 8">
    </figure>

    <div class="mw-stage-wrap">
        <button class="gallery-carousel-arrow gallery-carousel-prev mw-arrow-prev" data-mw="prev" type="button" aria-label="Fotografia precedente">
            <svg viewBox="0 0 66 43" aria-hidden="true" focusable="false">
                <path class="gallery-arrow-path-one" d="M40 4 44 0l22 21-22 22-4-4 17-17L40 4Z"/>
                <path class="gallery-arrow-path-two" d="M20 4 24 0l22 21-22 22-4-4 17-17L20 4Z"/>
                <path class="gallery-arrow-path-three" d="M0 4 4 0l22 21L4 43l-4-4 17-17L0 4Z"/>
            </svg>
        </button>

        <div class="mw-stage" tabindex="0" role="region" aria-roledescription="carosello" aria-label="Archivio fotografico">
            <div class="mw-tilt"><div class="mw-ring"></div></div>
        </div>

        <button class="gallery-carousel-arrow gallery-carousel-next mw-arrow-next" data-mw="next" type="button" aria-label="Fotografia successiva">
            <svg viewBox="0 0 66 43" aria-hidden="true" focusable="false">
                <path class="gallery-arrow-path-one" d="M40 4 44 0l22 21-22 22-4-4 17-17L40 4Z"/>
                <path class="gallery-arrow-path-two" d="M20 4 24 0l22 21-22 22-4-4 17-17L20 4Z"/>
                <path class="gallery-arrow-path-three" d="M0 4 4 0l22 21L4 43l-4-4 17-17L0 4Z"/>
            </svg>
        </button>
    </div>
</section>

<div class="container">

    <!-- 4. BANNER CITAZIONE ISPIRATA (Stile Mikaela Reuben) -->
    <div class="quote-banner">
        <p class="quote-text">
            «Viaggiare è imparare senza libri, crescere senza confini e respirare il pianeta. C’è un modo di viaggiare
            che non cerca mete, ma significati!»
        </p>
        <span class="quote-author">— Il mio motto personale</span>
    </div>

</div>

<?php
require_once 'includes/footer.php';
?>
