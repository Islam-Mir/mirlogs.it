<?php
/**
 * ============================================================
 * HEADER.PHP - Intestazione Editoriale Globale
 * ============================================================
 * Ispirato allo stile di Zion Adventure Photog, Seasons in Colour
 * e Mikaela Reuben:
 * - Font Google: 'Cormorant Garamond' (serif scultoreo) & 'Plus Jakarta Sans'
 * - Barra superiore discreta e logo tipografico raffinato
 * - Menu minimalista con indicatori di linea sottile
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

    <!-- Tipografia editoriale: titoli geometrici e testo leggibile -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Mono:wght@400;700&family=Syne:wght@500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- FOGLIO DI STILE EDITORIALE -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- BARRA SUPERIORE MINIMALE -->
    <div class="top-bar-notice">
        <h2 class="hero-header">Viaggiare &egrave; imparare senza libri, crescere senza confini e respirare il pianeta!
        </h2>
    </div>

    <!-- HEADER E MENU -->
    <header class="site-header">
        <div class="container navbar">

            <!-- LOGO TIPOGRAFICO EDITORIALE -->
            <a href="index.php" class="nav-brand" title="Torna alla Home">
                <span class="brand-name">MIR ISLAM</span>
                <span class="brand-sub">Storie, luoghi e progetti web</span>
            </a>

            <!-- PULSANTE PER SMARTPHONE -->
            <button class="menu-toggle" id="menu-toggle" aria-label="Apri menu" aria-expanded="false"
                aria-controls="nav-links" type="button">
                <span aria-hidden="true">✳</span>
            </button>

            <!-- LINK DI NAVIGAZIONE -->
            <ul class="nav-links" id="nav-links">
                <?php foreach ($pagine_menu as $voce): ?>
                <?php $isAttiva = paginaAttiva($voce['file']); ?>
                <li>
                    <a href="<?php echo htmlspecialchars($voce['file']); ?>"
                        class="nav-link <?php echo $isAttiva ? 'active' : ''; ?>">
                        <?php echo htmlspecialchars($voce['titolo']); ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </header>

    <!-- CONTENUTO PRINCIPALE -->
    <main class="main-content">