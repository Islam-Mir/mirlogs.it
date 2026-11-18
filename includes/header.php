<?php
/**
 * ============================================================
 * HEADER.PHP - Intestazione Editoriale Globale
 * ============================================================
 * Con Navbar Interattiva FX e Logo tipografico animato
 * identico al prototipo nav-fx-v2.html.
 * ============================================================
 */

require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo isset($titolo_pagina) ? htmlspecialchars($titolo_pagina) . ' — ' . htmlspecialchars($sito_nome) : htmlspecialchars($sito_nome) . ' — ' . htmlspecialchars($sito_titolo); ?>
    </title>

    <meta name="description" content="<?php echo htmlspecialchars($sito_descrizione); ?>">
    <meta name="author" content="<?php echo htmlspecialchars($sito_nome); ?>">

    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/icons/favicon-32x32.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@900&display=swap" rel="stylesheet">

    <!-- Tipografia editoriale -->
    <link
        href="https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Mono:wght@400;700&family=Syne:wght@500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- FOGLIO DI STILE EDITORIALE CON CACHE BUSTER -->
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo filemtime(__DIR__ . '/../assets/css/style.css'); ?>">

    <!-- NAVBAR FX (identica a nav-fx-v2) -->
    <?php include 'includes/nav-head.php'; ?>
</head>

<body>

    <!-- BARRA SUPERIORE MINIMALE -->
    <div class="top-bar-notice">
        <h2 class="hero-header">Viaggiare &egrave; imparare senza libri, crescere senza confini e respirare il pianeta!
        </h2>
    </div>

    <!-- HEADER E MENU IDENTICO A nav-fx-v2.html -->
    <header class="site-header">
        <?php include 'includes/nav.php'; ?>
    </header>

    <!-- CONTENUTO PRINCIPALE -->
    <main class="main-content">
