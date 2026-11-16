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
                    <span class="magazine-num">01 / PROGETTI</span>
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
                    <span class="magazine-num">02 / VIAGGI</span>
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
                    <span class="magazine-num">03 / LETTURE</span>
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

<!-- 3. CAROSELLO MULTIFUNZIONE A TUTTA LARGHEZZA (Tasti Tastiera, Mouse Drag, Frecce) -->
<section class="carousel-editorial-wrap">
    <div class="container">

        <div class="carousel-editorial-header">
            <div>
                <span class="section-label">Archivio Fotografico</span>
                <h2 style="font-size: 2.2rem;">Frammenti di Mondo</h2>
            </div>

            <!-- Controlli: Contatore e Frecce -->
            <div style="display: flex; align-items: center; gap: 20px;">
                <div class="carousel-counter" id="carousel-counter">01 / 12</div>
                <div class="carousel-controls">
                    <button class="carousel-btn" id="carousel-prev" aria-label="Foto precedente"
                        type="button">&larr;</button>
                    <button class="carousel-btn" id="carousel-next" aria-label="Foto successiva"
                        type="button">&rarr;</button>
                </div>
            </div>
        </div>

        <!-- Traccia Carosello con Drag e Cliccabile -->
        <div class="carousel-track-container" id="carousel-track-container" tabindex="0"
            aria-label="Galleria fotografica. Usa le frecce per scorrere.">
            <div class="carousel-track">

                <div class="carousel-slide">
                    <img src="assets/img/viaggi/M1.jpg" alt="Scatto di Viaggio 1"
                        class="carousel-slide-img clickable-image">
                    <div class="carousel-slide-info">
                        <span class="carousel-slide-tag">Esplorazione // 01</span>
                        <span style="font-size: 0.85rem;">📸 Ingrandisci</span>
                    </div>
                </div>

                <div class="carousel-slide">
                    <img src="assets/img/viaggi/M2.jpg" alt="Scatto di Viaggio 2"
                        class="carousel-slide-img clickable-image">
                    <div class="carousel-slide-info">
                        <span class="carousel-slide-tag">Esplorazione // 02</span>
                        <span style="font-size: 0.85rem;">📸 Ingrandisci</span>
                    </div>
                </div>

                <div class="carousel-slide">
                    <img src="assets/img/viaggi/M3.jpg" alt="Scatto di Viaggio 3"
                        class="carousel-slide-img clickable-image">
                    <div class="carousel-slide-info">
                        <span class="carousel-slide-tag">Esplorazione // 03</span>
                        <span style="font-size: 0.85rem;">📸 Ingrandisci</span>
                    </div>
                </div>

                <div class="carousel-slide">
                    <img src="assets/img/viaggi/M4.jpg" alt="Scatto di Viaggio 4"
                        class="carousel-slide-img clickable-image">
                    <div class="carousel-slide-info">
                        <span class="carousel-slide-tag">Esplorazione // 04</span>
                        <span style="font-size: 0.85rem;">📸 Ingrandisci</span>
                    </div>
                </div>

                <div class="carousel-slide">
                    <img src="assets/img/viaggi/M5.jpg" alt="Scatto di Viaggio 5"
                        class="carousel-slide-img clickable-image">
                    <div class="carousel-slide-info">
                        <span class="carousel-slide-tag">Esplorazione // 05</span>
                        <span style="font-size: 0.85rem;">📸 Ingrandisci</span>
                    </div>
                </div>

                <div class="carousel-slide">
                    <img src="assets/img/viaggi/M6.jpg" alt="Scatto di Viaggio 6"
                        class="carousel-slide-img clickable-image">
                    <div class="carousel-slide-info">
                        <span class="carousel-slide-tag">Esplorazione // 06</span>
                        <span style="font-size: 0.85rem;">📸 Ingrandisci</span>
                    </div>
                </div>

                <div class="carousel-slide">
                    <img src="assets/img/viaggi/M7.jpg" alt="Scatto di Viaggio 7"
                        class="carousel-slide-img clickable-image">
                    <div class="carousel-slide-info">
                        <span class="carousel-slide-tag">Esplorazione // 07</span>
                        <span style="font-size: 0.85rem;">📸 Ingrandisci</span>
                    </div>
                </div>

                <div class="carousel-slide">
                    <img src="assets/img/viaggi/M8.jpg" alt="Scatto di Viaggio 8"
                        class="carousel-slide-img clickable-image">
                    <div class="carousel-slide-info">
                        <span class="carousel-slide-tag">Esplorazione // 08</span>
                        <span style="font-size: 0.85rem;">📸 Ingrandisci</span>
                    </div>
                </div>

                <div class="carousel-slide">
                    <img src="assets/img/viaggi/M13.jpg" alt="Diving Scatto 09"
                        class="carousel-slide-img clickable-image">
                    <div class="carousel-slide-info">
                        <span class="carousel-slide-tag">Subacquea // 09</span>
                        <span style="font-size: 0.85rem;">📸 Ingrandisci</span>
                    </div>
                </div>

                <div class="carousel-slide">
                    <img src="assets/img/viaggi/M14.jpg" alt="Tartaruga Marina 10"
                        class="carousel-slide-img clickable-image">
                    <div class="carousel-slide-info">
                        <span class="carousel-slide-tag">Oceano // 10</span>
                        <span style="font-size: 0.85rem;">📸 Ingrandisci</span>
                    </div>
                </div>

                <div class="carousel-slide">
                    <img src="assets/img/viaggi/M10.jpg" alt="Scatto di Viaggio 11"
                        class="carousel-slide-img clickable-image">
                    <div class="carousel-slide-info">
                        <span class="carousel-slide-tag">Esplorazione // 11</span>
                        <span style="font-size: 0.85rem;">📸 Ingrandisci</span>
                    </div>
                </div>

                <div class="carousel-slide">
                    <img src="assets/img/viaggi/M11.jpg" alt="Scatto di Viaggio 12"
                        class="carousel-slide-img clickable-image">
                    <div class="carousel-slide-info">
                        <span class="carousel-slide-tag">Esplorazione // 12</span>
                        <span style="font-size: 0.85rem;">📸 Ingrandisci</span>
                    </div>
                </div>

            </div>
        </div>



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