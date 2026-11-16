# Nuovo Portfolio Personale - Mir Islam

Benvenuto nella nuova versione del tuo sito web personale, ricostruita da zero con architettura modulare in **PHP**, fogli di stile **CSS nativo** (senza framework pesanti) e script **JavaScript a responsabilità singola**.

---

## 📁 Struttura del Progetto

```text
sito_nuovo/
│
├── includes/
│   ├── config.php       # Dati globali (nome, email, social, paesi, menu)
│   ├── header.php       # Intestazione HTML5, meta tag SEO, font Google e barra di navigazione
│   ├── footer.php       # Piè di pagina, link social, modale lightbox e inclusione script JS
│   └── chatbot.php      # Widget flottante del chatbot (presente in ogni pagina)
│
├── assets/
│   ├── css/
│   │   └── style.css    # Stile chiaro, elegante e rilassante per gli occhi (#f8fafc / #ffffff)
│   ├── js/
│   │   ├── menu.js      # Apertura/chiusura menu su smartphone
│   │   ├── modal.js     # Ingrandimento delle foto (lightbox al click e chiusura con ESC)
│   │   ├── carosello.js # Scorrimento fluido orizzontale
│   │   └── chatbot.js   # Invio asincrono messaggi al backend RAG (FastAPI)
│   └── img/
│       ├── viaggi/      # Foto reali dei viaggi (M1-M19, C1-C15, ecc.)
│       ├── informatica/ # Placeholder per progetti software (es. rag_project.svg)
│       ├── libri/       # Placeholder per le letture (es. book_cover_placeholder.svg)
│       └── icons/       # Favicon
│
├── index.php            # Home page con i 3 pilastri e anteprima carosello foto
├── informatica.php      # Percorso di studi, tecnologie e progetti software
├── viaggi.php           # Racconto, citazioni e atlante personale con bandiere
├── libri.php            # Biblioteca, saggi, recensioni e citazioni
├── galleria.php         # Galleria fotografica completa con foto ingrandibili
└── contatti.php         # Form di contatto e profili social
```

---

## 🎨 Scelte di Design
- **Sfondo Chiaro e Luminoso:** Niente sfondi neri opprimenti o colori fluorescenti accecanti. Sfondo chiaro avorio/slate (`#f8fafc`), superfici bianche (`#ffffff`) e testi ad alto contrasto scuro (`#0f172a`).
- **Tipografia Moderna:** Google Fonts *Outfit* per i titoli scultorei ed eleganti e *Plus Jakarta Sans* per i testi fluidi e leggibili.
- **Micro-interazioni Pulite:** Nessun menu 3D grottesco; hover fluidi con sfumature delicate ed elevazioni di card.

---

## 🤖 Assistente Virtuale 100% Integrato (Nessun server esterno!)
Il chatbot è completamente autonomo e risiede all'interno della cartella del sito:
- **`data/conoscenza.json`**: contiene risposte su Mir, i suoi studi, progetti, viaggi, letture e contatti. Per aggiungere una risposta, aggiorna questo file.
- **`api_chat.php`**: analizza le domande degli utenti con calcolo di affinità per parole chiave ed eroga la risposta corretta in millisecondi.
- **`assets/js/chatbot.js`**: gestisce l'interfaccia, i chip cliccabili con domande rapide e l'invio asincrono.

Non serve avviare Python, terminali né porte esterne: avviando Apache in XAMPP, il chatbot è immediatamente funzionante ovunque!

---

## 🚀 Come visualizzare il sito
1. Assicurati che **Apache** sia avviato nel pannello di controllo di **XAMPP**.
2. Apri il browser e vai all'indirizzo:
   [http://localhost/mirlogs/sito_nuovo/](http://localhost/mirlogs/sito_nuovo/)
