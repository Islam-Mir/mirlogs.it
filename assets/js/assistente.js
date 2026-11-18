/**
 * ============================================================
 * ASSISTENTE.JS - Assistente Virtuale Autonomo per il Sito
 * ============================================================
 * 
 * Questo script gestisce:
 * 1. Apertura e chiusura della finestra chat (#chatbot-window)
 * 2. Visualizzazione dei fumetti utente e bot
 * 3. Chiamata HTTP asincrona (fetch) a risposte.php interno al sito
 * 4. Click sui suggerimenti rapidi (chip)
 * 
 * Tutto rimane al 100% all'interno della cartella del sito!
 * ============================================================
 */

// Indirizzo dello script PHP interno al sito
const URL_ASSISTENTE = "risposte.php";

// Funzione 1: Apre o chiude la finestra della chat
function toggleFinestraChat() {
  const finestra = document.getElementById("chatbot-window");
  const pulsante = document.getElementById("chatbot-trigger");
  if (!finestra) return;

  finestra.classList.toggle("is-open");
  if (pulsante) pulsante.setAttribute("aria-expanded", String(finestra.classList.contains("is-open")));

  if (finestra.classList.contains("is-open")) {
    const input = document.getElementById("chatbot-input");
    if (input) input.focus();
  }
}

// Funzione 2: Aggiunge un messaggio all'area della chat
function aggiungiFumetto(testo, tipo) {
  const contenitore = document.getElementById("chatbot-messages");
  if (!contenitore) return null;

  const bolla = document.createElement("div");
  bolla.className = `chat-bubble ${tipo}`;
  bolla.textContent = testo;

  contenitore.appendChild(bolla);
  contenitore.scrollTop = contenitore.scrollHeight;

  return bolla;
}

// Funzione 3: Esegue la richiesta asincrona ad risposte.php
async function chiediAlBot(testoDomanda) {
  const risposta = await fetch(URL_ASSISTENTE, {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify({ message: testoDomanda })
  });

  if (!risposta.ok) {
    throw new Error("Errore risposta server: " + risposta.status);
  }

  const dati = await risposta.json();
  return dati.answer || "Nessuna risposta disponibile.";
}

// Funzione 4: Invia un messaggio (da form o da chip suggerito)
async function inviaMessaggio(testo) {
  const input = document.getElementById("chatbot-input");
  const btnInvia = document.getElementById("chatbot-send");

  const domanda = testo.trim();
  if (!domanda) return;

  // Aggiungiamo il fumetto dell'utente
  aggiungiFumetto(domanda, "user");
  if (input) input.value = "";

  if (btnInvia) btnInvia.disabled = true;

  // Fumetto temporaneo di attesa
  const bollaAttesa = aggiungiFumetto("Sto pensando...", "bot");

  try {
    const risposta = await chiediAlBot(domanda);
    if (bollaAttesa) {
      bollaAttesa.textContent = risposta;
    }
  } catch (errore) {
    console.error("Errore chatbot:", errore);
    if (bollaAttesa) {
      bollaAttesa.textContent = "Si è verificato un problema di caricamento. Riprova tra poco!";
    }
  } finally {
    if (btnInvia) btnInvia.disabled = false;
    if (input) input.focus();
  }
}

// Funzione 5: Gestione invio dal form
function gestisciSubmitForm(evento) {
  evento.preventDefault();
  const input = document.getElementById("chatbot-input");
  if (input) {
    inviaMessaggio(input.value);
  }
}

// Funzione 6: Gestione click sui chip di suggerimento
function collegaChipSuggerimenti() {
  const chips = document.querySelectorAll(".chip-suggestion");
  chips.forEach(function (chip) {
    chip.addEventListener("click", function () {
      const prompt = chip.getAttribute("data-prompt");
      if (prompt) {
        inviaMessaggio(prompt);
      }
    });
  });
}

// Funzione 7: Inizializza tutti gli eventi
function avviaChatbotAutonomo() {
  const trigger = document.getElementById("chatbot-trigger");
  const closeBtn = document.getElementById("chatbot-close");
  const form = document.getElementById("chatbot-form");

  if (trigger) {
    trigger.addEventListener("click", toggleFinestraChat);
  }

  if (closeBtn) {
    closeBtn.addEventListener("click", toggleFinestraChat);
  }

  if (form) {
    form.addEventListener("submit", gestisciSubmitForm);
  }

  collegaChipSuggerimenti();
}

document.addEventListener("DOMContentLoaded", avviaChatbotAutonomo);
