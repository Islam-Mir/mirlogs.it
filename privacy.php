<?php
$titolo_pagina = 'Privacy Policy e Cookie';
require_once __DIR__ . '/includes/header.php';
?>
<article class="privacy-content">
    <h1>Privacy Policy e Cookie</h1>
    <p>Questa informativa descrive come vengono trattati i dati personali durante la navigazione su mirlogs.it, ai sensi del Regolamento (UE) 2016/679 (GDPR). Ultimo aggiornamento: 17 novembre 2026.</p>

    <h2>Titolare del trattamento</h2>
    <p>Il titolare è Mir Islam. Per informazioni o per esercitare i propri diritti è possibile scrivere a <a href="mailto:<?php echo htmlspecialchars($sito_email, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($sito_email, ENT_QUOTES, 'UTF-8'); ?></a>.</p>

    <h2>Hosting e log tecnici</h2>
    <p>Il sito è ospitato sull’infrastruttura di InfinityFree. Per garantire sicurezza, disponibilità e prevenire abusi, il server può registrare temporaneamente dati tecnici di connessione, come indirizzo IP, user-agent e data e ora della richiesta. Il trattamento si basa sul legittimo interesse del titolare alla sicurezza del sito; i log sono conservati per il tempo strettamente necessario alle finalità di sicurezza e gestione tecnica, secondo le impostazioni del fornitore.</p>
    <p>L’hosting può inoltre utilizzare il cookie tecnico anti-bot <code>__test</code> per verificare il funzionamento del browser e proteggere il servizio. Non è usato per finalità pubblicitarie.</p>

    <h2>Cookie tecnici</h2>
    <p>Il sito utilizza l’archiviazione locale del browser per ricordare la scelta relativa ai cookie analitici (accettazione o rifiuto). Questa preferenza è necessaria per rispettare la decisione dell’utente e non viene usata per tracciarlo.</p>

    <h2>Cookie analitici: Google Analytics 4</h2>
    <p>Google Analytics 4 è attivato esclusivamente dopo il consenso esplicito tramite il pulsante “Accetta”. Il servizio è fornito da Google Ireland Limited e consente di raccogliere statistiche sull’utilizzo del sito. In assenza di consenso, o in caso di rifiuto, lo script Analytics non viene caricato. La configurazione richiede l’anonimizzazione dell’indirizzo IP; Google può trattare i dati secondo i propri termini e le proprie informative. Il consenso può essere revocato in qualsiasi momento usando “Preferenze Cookie” nel footer o il pulsante qui sotto.</p>

    <h2>Destinatari, trasferimenti e conservazione</h2>
    <p>I dati tecnici sono accessibili al titolare e ai fornitori che gestiscono l’hosting e, se autorizzati dall’utente, le statistiche Analytics. I trattamenti svolti da Google possono comportare trasferimenti o accessi da paesi fuori dallo Spazio Economico Europeo secondo le garanzie e i meccanismi indicati da Google. I dati sono conservati per il tempo necessario alle finalità sopra descritte e secondo le impostazioni di conservazione del servizio.</p>

    <h2>Diritti dell’interessato</h2>
    <p>Nei casi previsti dal GDPR, l’interessato può chiedere accesso, rettifica, cancellazione, limitazione o opposizione al trattamento e può proporre reclamo al Garante per la protezione dei dati personali. Le richieste possono essere inviate all’indirizzo email del titolare indicato sopra.</p>

    <h2>Modifica delle preferenze</h2>
    <p>Puoi revocare il consenso o modificare la tua scelta in qualsiasi momento. Revocandolo, il sito interrompe le nuove attivazioni di Analytics e rimuove i cookie Analytics accessibili dal sito.</p>
    <button type="button" class="btn-editorial cookie-preferences-button" data-cookie-preferences>Modifica preferenze cookie</button>
</article>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
