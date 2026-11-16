<?php
$titolo_pagina = 'Galleria fotografica';
require_once 'includes/header.php';

// Aggiungi qui ogni nuova foto insieme al titolo e alla didascalia.
// Le categorie disponibili sono: mondo e mare.
$galleria = [
    ['file'=>'C1.jpg','titolo'=>'Trame di viaggio','testo'=>'Un frammento di strada, colori e movimento.','categoria'=>'mondo'],
    ['file'=>'C2.jpg','titolo'=>'Luce in transito','testo'=>'La luce cambia e trasforma la scena.','categoria'=>'mondo'],
    ['file'=>'C3.jpg','titolo'=>'Piccoli dettagli','testo'=>'Una pausa per osservare ciò che spesso sfugge.','categoria'=>'mondo'],
    ['file'=>'C4.jpg','titolo'=>'Geometrie quotidiane','testo'=>'Forme, linee e prospettive incontrate camminando.','categoria'=>'mondo'],
    ['file'=>'C5.jpg','titolo'=>'Un altro orizzonte','testo'=>'Un appunto visivo da tenere nel taccuino.','categoria'=>'mondo'],
    ['file'=>'C6.jpg','titolo'=>'Colori del mondo','testo'=>'Un incontro di tinte e atmosfere.','categoria'=>'mondo'],
    ['file'=>'C7.jpg','titolo'=>'Tra una tappa e l’altra','testo'=>'Il bello del viaggio vive anche nei passaggi.','categoria'=>'mondo'],
    ['file'=>'C8.jpg','titolo'=>'Spazio e silenzio','testo'=>'Un momento per rallentare e guardarsi intorno.','categoria'=>'mondo'],
    ['file'=>'C9.jpg','titolo'=>'La scena cambia','testo'=>'Ogni angolo ha il suo ritmo e la sua luce.','categoria'=>'mondo'],
    ['file'=>'C10.jpg','titolo'=>'Segni di passaggio','testo'=>'Tracce, superfici e storie da immaginare.','categoria'=>'mondo'],
    ['file'=>'C11.jpg','titolo'=>'Un luogo da ricordare','testo'=>'Una fotografia per tornare, almeno con lo sguardo.','categoria'=>'mondo'],
    ['file'=>'C12.jpg','titolo'=>'Prospettive nuove','testo'=>'Cambiare punto di vista cambia il racconto.','categoria'=>'mondo'],
    ['file'=>'C13.jpg','titolo'=>'La calma tra le tappe','testo'=>'Un frammento quieto raccolto lungo il percorso.','categoria'=>'mondo'],
    ['file'=>'C14.jpg','titolo'=>'Contrasti vicini','testo'=>'Texture e dettagli che convivono nella stessa scena.','categoria'=>'mondo'],
    ['file'=>'C15.jpg','titolo'=>'Appunti a colori','testo'=>'Un piccolo ricordo fissato in un’immagine.','categoria'=>'mondo'],
    ['file'=>'M1.jpg','titolo'=>'La strada continua','testo'=>'Un’altra pagina del mio diario fotografico.','categoria'=>'mondo'],
    ['file'=>'M2.jpg','titolo'=>'Lontano dal solito','testo'=>'Uno sguardo curioso verso ciò che non conosco ancora.','categoria'=>'mondo'],
    ['file'=>'M3.jpg','titolo'=>'Istanti in viaggio','testo'=>'Momenti semplici che restano impressi.','categoria'=>'mondo'],
    ['file'=>'M4.jpg','titolo'=>'Forme in cammino','testo'=>'Architetture e dettagli osservati senza fretta.','categoria'=>'mondo'],
    ['file'=>'M5.jpg','titolo'=>'Una luce diversa','testo'=>'La stessa giornata può avere molte atmosfere.','categoria'=>'mondo'],
    ['file'=>'M6.jpg','titolo'=>'Fuori rotta','testo'=>'Le deviazioni spesso regalano le immagini migliori.','categoria'=>'mondo'],
    ['file'=>'M7.jpg','titolo'=>'Ritmo urbano','testo'=>'Un frammento di vita in movimento.','categoria'=>'mondo'],
    ['file'=>'M8.jpg','titolo'=>'Tra cielo e terra','testo'=>'Un momento sospeso nel paesaggio.','categoria'=>'mondo'],
    ['file'=>'M9.jpg','titolo'=>'Diario aperto','testo'=>'Un ricordo visivo da sfogliare ancora.','categoria'=>'mondo'],
    ['file'=>'M10.jpg','titolo'=>'Lungo il percorso','testo'=>'Ogni tappa aggiunge un nuovo punto di vista.','categoria'=>'mondo'],
    ['file'=>'M11.jpg','titolo'=>'Una pausa per guardare','testo'=>'Fermarsi un momento fa parte dell’esplorazione.','categoria'=>'mondo'],
    ['file'=>'M12.jpg','titolo'=>'Tracce di luce','testo'=>'Un dettaglio, una forma, un attimo.','categoria'=>'mondo'],
    ['file'=>'M13.jpg','titolo'=>'Il mondo vicino','testo'=>'La curiosità comincia dalle cose che abbiamo davanti.','categoria'=>'mondo'],
    ['file'=>'M14.jpg','titolo'=>'Colori inaspettati','testo'=>'Un contrasto che ha attirato il mio sguardo.','categoria'=>'mondo'],
    ['file'=>'M15.jpg','titolo'=>'Una storia senza parole','testo'=>'Lascio che siano i dettagli a suggerire il racconto.','categoria'=>'mondo'],
    ['file'=>'M16.jpg','titolo'=>'Orizzonti personali','testo'=>'Un’immagine raccolta durante le mie esplorazioni.','categoria'=>'mondo'],
    ['file'=>'M17.jpg','titolo'=>'Il piacere di perdersi','testo'=>'Seguire la curiosità, senza avere fretta di arrivare.','categoria'=>'mondo'],
    ['file'=>'M18.jpg','titolo'=>'Tra memoria e scoperta','testo'=>'Un posto nuovo diventa parte dei ricordi.','categoria'=>'mondo'],
    ['file'=>'M19.jpg','titolo'=>'Un frammento del viaggio','testo'=>'Una fotografia, una sensazione, una pagina in più.','categoria'=>'mondo'],
    ['file'=>'italia.jpg','titolo'=>'Italia, casa e scoperta','testo'=>'Anche i luoghi familiari sanno mostrarsi in modo nuovo.','categoria'=>'mondo'],
    ['file'=>'D1.jpg','titolo'=>'Sotto la superficie','testo'=>'Un cambio di prospettiva, nel silenzio dell’acqua.','categoria'=>'mare'],
    ['file'=>'turt1.jpg','titolo'=>'Incontro nel blu','testo'=>'Una tartaruga marina attraversa il suo mondo con calma.','categoria'=>'mare'],
    ['file'=>'turt2.jpg','titolo'=>'Compagnia silenziosa','testo'=>'Un incontro ravvicinato durante un’immersione.','categoria'=>'mare'],
    ['file'=>'turt3.jpg','titolo'=>'Movimento leggero','testo'=>'La grazia di una tartaruga tra luce e acqua.','categoria'=>'mare'],
    ['file'=>'turt4.jpg','titolo'=>'Un mondo sommerso','testo'=>'La vita marina continua, lontano dal rumore di superficie.','categoria'=>'mare'],
    ['file'=>'turt5.png','titolo'=>'L’oceano da vicino','testo'=>'Un ricordo subacqueo che porto con me.','categoria'=>'mare'],
];

$galleria = array_values(array_filter($galleria, static function ($foto) {
    return is_file(__DIR__ . '/assets/img/viaggi/' . $foto['file']);
}));
$galleriaJson = json_encode($galleria, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE);
?>

<div class="gallery-experience" id="gallery-experience" tabindex="-1">
  <header class="gallery-heading">
    <div>
      <span class="section-label">Diario visivo · Mir Islam</span>
      <h1>Frammenti di <em>mondo</em></h1>
      <p>Viaggi, incontri e istanti sott’acqua. Sfoglia le fotografie, una alla volta.</p>
    </div>
    <div class="gallery-heading-meta"><span id="gallery-total"><?php echo count($galleria); ?></span><small>fotografie</small></div>
  </header>

  <div class="gallery-toolbar">
    <div class="gallery-filters" role="group" aria-label="Filtra le fotografie">
      <button class="gallery-filter is-active" type="button" data-filter="tutte" aria-pressed="true">Tutte</button>
      <button class="gallery-filter" type="button" data-filter="mondo" aria-pressed="false">Viaggi</button>
      <button class="gallery-filter" type="button" data-filter="mare" aria-pressed="false">Mare</button>
    </div>
    <div class="gallery-tools">
      <span class="gallery-shortcut">← → per navigare</span>
      <button class="gallery-tool-button" id="gallery-autoplay" type="button" aria-pressed="false" aria-label="Avvia riproduzione automatica"><span aria-hidden="true">▶</span><span class="tool-label">Avvia</span></button>
      <button class="gallery-tool-button" id="gallery-fullscreen" type="button" aria-label="Apri la galleria a schermo intero"><span aria-hidden="true">⛶</span><span class="tool-label">Schermo intero</span></button>
    </div>
  </div>

  <section class="gallery-coverflow" id="gallery-stage" tabindex="0" aria-label="Carosello fotografico 3D. Usa le frecce per navigare.">
    <div class="gallery-coverflow-top"><span class="gallery-live-mark"><i></i> Diario fotografico</span><span class="gallery-counter" id="gallery-counter" aria-live="polite">01 / <?php echo str_pad((string) count($galleria), 2, '0', STR_PAD_LEFT); ?></span></div>
    <div class="gallery-coverflow-track" id="gallery-track" aria-live="polite"></div>
    <button class="gallery-arrow gallery-arrow-prev" id="gallery-prev" type="button" aria-label="Fotografia precedente">←</button>
    <button class="gallery-arrow gallery-arrow-next" id="gallery-next" type="button" aria-label="Fotografia successiva">→</button>
    <div class="gallery-stage-progress" aria-hidden="true"><span id="gallery-progress"></span></div>
  </section>

  <p class="gallery-hint">Trascina le schede o usa le frecce per scorrere il diario. Seleziona “Apri foto” per ingrandire.</p>
  <script type="application/json" id="gallery-data"><?php echo $galleriaJson ?: '[]'; ?></script>
</div>

<?php require_once 'includes/footer.php'; ?>
