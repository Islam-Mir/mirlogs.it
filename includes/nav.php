<?php
/* Da includere dove c'era la vecchia navbar:  <?php include 'includes/nav.php'; ?>
   Per aggiungere una pagina: una riga nell'array. Il terzo valore è il tema dell'effetto:
   home | code | travel | books | gallery | contact */
$mwnPages = [
    ['index.php',      'Home',         'home'],
    ['informatica.php','Web & Codice', 'code'],
    ['viaggi.php',     'Viaggi',       'travel'],
    ['libri.php',      'Libri',        'books'],
    ['galleria.php',   'Galleria',     'gallery'],
    ['contatti.php',   'Contatti',     'contact'],
];
/* pagina corrente: se la tua pagina ha già $currentPage la usa, altrimenti la ricava da sola */
$mwnCurrent = isset($currentPage) ? $currentPage : basename($_SERVER['SCRIPT_NAME']);
?>
<div class="mwn">
    <a class="mwn-brand" href="index.php" id="mwn-brand" aria-label="MIR ISLAM">MIR ISLAM</a>

    <button type="button" class="mwn-toggle" id="mwn-toggle" aria-label="Apri menu" aria-expanded="false" aria-controls="mwn-list">
        <span></span><span></span><span></span>
    </button>

    <ul class="mwn-list" id="mwn-list">
        <?php foreach ($mwnPages as $p): $on = ($p[0] === $mwnCurrent); ?>
        <li>
            <a href="<?= htmlspecialchars($p[0], ENT_QUOTES, 'UTF-8') ?>"
               class="mwn-link<?= $on ? ' is-active' : '' ?>"
               data-fx="<?= htmlspecialchars($p[2], ENT_QUOTES, 'UTF-8') ?>"<?= $on ? ' aria-current="page"' : '' ?>>
                <?= htmlspecialchars($p[1], ENT_QUOTES, 'UTF-8') ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
