<?php
/* Da includere dentro <head> di ogni pagina:  <?php include 'includes/nav-head.php'; ?>
   Percorsi: assets/ deve stare nella stessa cartella delle pagine (index.php, viaggi.php...) */
$mwnCss = __DIR__ . '/../assets/css/nav-fx.css';
$mwnJs  = __DIR__ . '/../assets/js/nav-fx.js';
$mwnVc  = @filemtime($mwnCss) ?: 1;   /* cache-busting automatico quando modifichi i file */
$mwnVj  = @filemtime($mwnJs) ?: 1;
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/nav-fx.css?v=<?= $mwnVc ?>">
<script src="assets/js/nav-fx.js?v=<?= $mwnVj ?>" defer></script>
