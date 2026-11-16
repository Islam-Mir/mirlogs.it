<?php
/**
 * ============================================================
 * VIAGGI.PHP - Atlante Editoriale di Viaggio
 * ============================================================
 * Ispirato allo spirito outdoor e fotografico di Zion Adventure Photog:
 * - Grandi fotografie d'impatto con didascalie sobrie
 * - Racconto personale dell'esperienza asiatica ed europea
 * - Griglia interattiva delle oltre 30 nazioni esplorate
 * ============================================================
 */

$titolo_pagina = "Viaggi & Atlante";
require_once 'includes/header.php';
?>

<div class="container">

  <!-- INTESTAZIONE SEZIONE -->
  <div style="padding-top: 30px; margin-bottom: 40px;">
    <span class="section-label">Diario delle Rotte</span>
    <h1 style="font-size: 3.5rem; margin-bottom: 14px;">I Paesi che ho <em>Respirato</em></h1>
    <p style="font-size: 1.25rem; font-family: var(--font-serif); font-style: italic; color: var(--accent-terracotta);">
      «C’è un modo di viaggiare che non cerca mete, ma significati!»
    </p>
  </div>

  <!-- COMPOSIZIONE EDITORIALE ASIMMETRICA (FOTO + TESTO) -->
  <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center; margin-bottom: 50px;">
    
    <div style="border-radius: var(--radius-sm); overflow: hidden; box-shadow: var(--shadow-subtle);">
      <img src="assets/img/viaggi/M16.jpg" alt="In viaggio tra le strade dell'Asia" class="clickable-image" style="width: 100%; height: 380px; object-fit: cover;">
    </div>

    <div>
      <span class="section-label">Le Radici &amp; il Mondo</span>
      <h3 style="font-size: 2rem; margin-bottom: 16px;">Dall'Asia all'Europa</h3>
      <p style="font-size: 1rem; line-height: 1.75; margin-bottom: 16px;">
        Originario del <strong>Bangladesh</strong> e dall'età dell'adolescenza in <strong>Italia</strong>, il viaggio è per me una scuola senza aule né barriere. In <strong>Malesia</strong>, tra le giungle umide e le luci di Kuala Lumpur, si incrociano profumi di spezie e modernità. La <strong>Thailandia</strong> danza su un fragile equilibrio di templi e quiete, mentre in <strong>Sri Lanka</strong> il verde delle piantagioni di tè parla un linguaggio antico.
      </p>
      <p style="font-size: 1rem; line-height: 1.75;">
        E poi l'<strong>Europa</strong>: una culla in cui ogni paese e ogni vicolo notturno raccontano storie che nessun monumento da cartolina potrà mai restituire con la stessa autenticità.
      </p>
    </div>

  </div>

  <!-- GRIGLIA PAESI VISITATI (ATLANTE) -->
  <section style="margin: 60px 0;">
    <div style="text-align: center; max-width: 600px; margin: 0 auto 30px;">
      <span class="section-label">Registro Geografico</span>
      <h2 style="font-size: 2.4rem;">Un atlante personale</h2>
      <p style="color: var(--text-muted); font-size: 0.95rem;">
        Clicca su ogni nazione per esplorarne le caratteristiche e la storia geografica:
      </p>
    </div>

    <div class="atlas-grid">
      <?php foreach ($paesi_visitati as $paese): ?>
        <a href="<?php echo htmlspecialchars($paese['link']); ?>" 
           target="_blank" 
           rel="noopener noreferrer" 
           class="atlas-pill" 
           title="Approfondisci <?php echo htmlspecialchars($paese['nome']); ?>">
          <img src="https://flagcdn.com/w20/<?php echo htmlspecialchars($paese['codice']); ?>.png" 
               alt="Bandiera <?php echo htmlspecialchars($paese['nome']); ?>">
          <span><?php echo htmlspecialchars($paese['nome']); ?></span>
        </a>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- BANNER ESPLORAZIONI SUBACQUEE -->
  <div style="background-color: var(--bg-sand); border: 1px solid var(--border-delicate); border-radius: var(--radius-sm); padding: 40px; display: grid; grid-template-columns: 1.2fr 1fr; gap: 30px; align-items: center;">
    <div>
      <span class="section-label">Abissi &amp; Barriere Coralline</span>
      <h3 style="font-size: 2rem; margin-bottom: 12px;">Esplorazioni Subacquee &amp; Diving</h3>
      <p style="color: var(--text-muted); margin-bottom: 20px; font-size: 0.95rem;">
        Dalle tartarughe marine alle barriere delle Maldive: immergersi sotto il pelo dell'acqua è entrare in un silenzio dove il tempo non scorre, ma fluttua.
      </p>
      <a href="galleria.php" class="btn-editorial">Guarda gli Scatti Subacquei &rarr;</a>
    </div>
    <div style="border-radius: var(--radius-sm); overflow: hidden; height: 220px;">
      <img src="assets/img/viaggi/turt2.jpg" alt="Diving Tartaruga" class="clickable-image" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
  </div>

</div>

<?php
require_once 'includes/footer.php';
?>
