<?php
$titolo_pagina = 'Sviluppo full stack';
require_once 'includes/header.php';

$aree_studio = [
    ['numero' => '01', 'titolo' => 'Interfacce web', 'testo' => 'HTML, CSS responsive e JavaScript: struttura, stile, DOM, eventi, array e interazioni.'],
    ['numero' => '02', 'titolo' => 'Backend', 'testo' => 'PHP, organizzazione del codice, Laravel, rotte, controller, validazione e operazioni CRUD.'],
    ['numero' => '03', 'titolo' => 'Dati e API', 'testo' => 'SQL e MySQL, relazioni tra tabelle, chiavi esterne, richieste API e visualizzazione dei dati.'],
    ['numero' => '04', 'titolo' => 'AI applicata', 'testo' => 'Un chatbot RAG sperimentale con Python, FastAPI, ChromaDB e modelli locali tramite Ollama.'],
];

$progetti = [
    [
        'sigla' => 'RAG', 'categoria' => 'Python · AI locale',
        'titolo' => 'Chatbot con ricerca sui documenti',
        'testo' => 'Un prototipo che recupera passaggi da una base documentale e li usa per formulare risposte. La pipeline combina FastAPI, ChromaDB, embedding nomic e un modello locale Qwen tramite Ollama.',
        'stack' => ['Python', 'FastAPI', 'ChromaDB', 'Ollama'],
    ],
    [
        'sigla' => 'CRUD', 'categoria' => 'Laravel · MySQL',
        'titolo' => 'Gestione di clienti, mete e prenotazioni',
        'testo' => 'Un progetto didattico full stack per gestire dati collegati. Include modelli e relazioni Eloquent, rotte resource, controller, migrazioni, seed e validazione dei dati.',
        'stack' => ['Laravel', 'PHP', 'MySQL', 'MVC'],
    ],
    [
        'sigla' => 'SQL', 'categoria' => 'PHP · database',
        'titolo' => 'Database relazionale per un’agenzia viaggi',
        'testo' => 'Schema MySQL con clienti, destinazioni e prenotazioni. Le chiavi esterne collegano le entità e i vincoli mantengono coerenti i dati quando si eliminano record.',
        'stack' => ['PHP', 'MySQL', 'SQL', 'Relazioni'],
    ],
    [
        'sigla' => 'API', 'categoria' => 'JavaScript · REST',
        'titolo' => 'Catalogo film con operazioni CRUD',
        'testo' => 'Un’interfaccia che esercita la lettura e la modifica dei dati tramite richieste API, collegando eventi e componenti del browser a un archivio JSON di sviluppo.',
        'stack' => ['JavaScript', 'Fetch', 'JSON Server', 'Bootstrap'],
    ],
];
?>

<div class="container tech-page">
  <section class="tech-hero">
    <div class="tech-hero-copy">
      <span class="section-label">Studio · pratica · iterazione</span>
      <h1 class="tech-title">Dal browser<br>al <em>backend</em>.</h1>
      <p>Sto costruendo il mio percorso nello sviluppo web mettendo in pratica i concetti in piccoli esercizi e progetti: interfacce, logica applicativa, database e API.</p>
      <a class="btn-editorial" href="#progetti">Scopri i progetti <span aria-hidden="true">↓</span></a>
    </div>
    <div class="tech-code-card" aria-label="Esempio di codice JavaScript">
      <div class="code-window-bar"><span></span><span></span><span></span><small>percorso.js</small></div>
      <pre><code><span class="code-muted">// imparare facendo</span>
const <span class="code-accent">percorso</span> = {
  idee: <span class="code-string">"in codice"</span>,
  dati: <span class="code-string">"in relazioni"</span>,
  dubbi: <span class="code-string">"in esperimenti"</span>
};

<span class="code-keyword">while</span> (curiosità) {
  costruisci(percorso);
  impara();
}</code></pre>
      <span class="code-caption">un passo alla volta <b>✳</b></span>
    </div>
  </section>

  <section class="study-section" aria-labelledby="study-title">
    <div class="tech-section-heading">
      <div><span class="section-label">Il percorso</span><h2 id="study-title">Le basi che sto mettendo insieme</h2></div>
      <p>Dagli esercizi ai progetti completi, con attenzione a come i diversi livelli comunicano.</p>
    </div>
    <div class="study-grid">
      <?php foreach ($aree_studio as $area): ?>
        <article class="study-card">
          <span class="study-number"><?php echo htmlspecialchars($area['numero']); ?></span>
          <h3><?php echo htmlspecialchars($area['titolo']); ?></h3>
          <p><?php echo htmlspecialchars($area['testo']); ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="projects-section" id="progetti" aria-labelledby="projects-title">
    <div class="tech-section-heading">
      <div><span class="section-label">Laboratorio</span><h2 id="projects-title">Esperimenti diventati progetti</h2></div>
      <p>Una selezione dei lavori e degli esercizi che raccontano meglio cosa sto imparando.</p>
    </div>
    <div class="tech-project-grid">
      <?php foreach ($progetti as $indice => $progetto): ?>
        <article class="tech-project-card">
          <div class="project-art project-art-<?php echo $indice + 1; ?>" aria-hidden="true">
            <span class="project-art-index">0<?php echo $indice + 1; ?></span>
            <span class="project-art-mark"><?php echo htmlspecialchars($progetto['sigla']); ?></span>
            <span class="project-art-orbit"></span>
          </div>
          <div class="tech-project-copy">
            <span class="project-category"><?php echo htmlspecialchars($progetto['categoria']); ?></span>
            <h3><?php echo htmlspecialchars($progetto['titolo']); ?></h3>
            <p><?php echo htmlspecialchars($progetto['testo']); ?></p>
            <ul class="tech-tags" aria-label="Tecnologie usate">
              <?php foreach ($progetto['stack'] as $tecnologia): ?>
                <li><?php echo htmlspecialchars($tecnologia); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="tech-note">
    <span class="section-label">Prossimo commit</span>
    <p>Ogni progetto è un’occasione per capire meglio come si incontrano interfaccia, logica e dati.</p>
    <a href="contatti.php" class="magazine-link">Parliamone <span aria-hidden="true">↗</span></a>
  </section>
</div>

<?php require_once 'includes/footer.php'; ?>
