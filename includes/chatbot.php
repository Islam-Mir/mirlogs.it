<?php
/**
 * ============================================================
 * CHATBOT.PHP - Widget dell'Assistente Virtuale Autonomo
 * ============================================================
 * Funziona al 100% in locale con PHP e JavaScript:
 * - Nessun server esterno necessario
 * - Chip rapidi con domande suggerite
 * - Modulo di digitazione libera
 * ============================================================
 */
?>

<!-- PULSANTE FLOTTANTE PER APRIRE/CHIUDERE LA CHAT -->
<button class="chatbot-trigger" id="chatbot-trigger" aria-label="Apri la chat con l'assistente IA" title="Chiedi all'assistente IA" aria-controls="chatbot-window" aria-expanded="false" type="button">
  <span class="chatbot-trigger-icon" aria-hidden="true">💬</span>
  <span class="chatbot-trigger-label">Chiedi all'assistente IA</span>
</button>

<!-- FINESTRA DEL CHATBOT -->
<div class="chatbot-window" id="chatbot-window" role="dialog" aria-labelledby="chatbot-title">
  
  <!-- Intestazione della chat -->
  <div class="chatbot-header">
    <h4 id="chatbot-title">
      <span>🤖</span>
      <span>Assistente di Mir Islam</span>
    </h4>
    <button class="chatbot-close" id="chatbot-close" aria-label="Chiudi finestra chat">&times;</button>
  </div>

  <!-- Area dei messaggi -->
  <div class="chatbot-messages" id="chatbot-messages">
    <!-- Messaggio di benvenuto -->
    <div class="chat-bubble bot">
      Ciao! 👋 Sono l'assistente di questo sito. Tutto ciò di cui hai bisogno è qui: chiedimi pure dei progetti, dei viaggi o delle letture di Mir!
    </div>
  </div>

  <!-- Argomenti rapidi suggeriti (Chip) -->
  <div style="padding: 8px 12px; background-color: var(--bg-card); border-top: 1px solid var(--border-delicate); display: flex; gap: 6px; overflow-x: auto; scrollbar-width: none;">
    <button type="button" class="chip-suggestion" data-prompt="Chi è Mir Islam?" style="background-color: var(--bg-sand); border: 1px solid var(--border-delicate); border-radius: var(--radius-pill); padding: 4px 10px; font-size: 0.72rem; cursor: pointer; white-space: nowrap; font-family: inherit;">👤 Chi è Mir?</button>
    <button type="button" class="chip-suggestion" data-prompt="Cosa studia e quali progetti ha realizzato?" style="background-color: var(--bg-sand); border: 1px solid var(--border-delicate); border-radius: var(--radius-pill); padding: 4px 10px; font-size: 0.72rem; cursor: pointer; white-space: nowrap; font-family: inherit;">💻 Web &amp; Codice</button>
    <button type="button" class="chip-suggestion" data-prompt="Quali paesi ha visitato e qual è il suo motto?" style="background-color: var(--bg-sand); border: 1px solid var(--border-delicate); border-radius: var(--radius-pill); padding: 4px 10px; font-size: 0.72rem; cursor: pointer; white-space: nowrap; font-family: inherit;">✈️ Viaggi</button>
    <button type="button" class="chip-suggestion" data-prompt="Quali libri consiglia Mir?" style="background-color: var(--bg-sand); border: 1px solid var(--border-delicate); border-radius: var(--radius-pill); padding: 4px 10px; font-size: 0.72rem; cursor: pointer; white-space: nowrap; font-family: inherit;">📚 Libri</button>
    <button type="button" class="chip-suggestion" data-prompt="Come posso contattare Mir?" style="background-color: var(--bg-sand); border: 1px solid var(--border-delicate); border-radius: var(--radius-pill); padding: 4px 10px; font-size: 0.72rem; cursor: pointer; white-space: nowrap; font-family: inherit;">📬 Contatti</button>
  </div>

  <!-- Form di invio domanda -->
  <form class="chatbot-form" id="chatbot-form">
    <input 
      type="text" 
      class="chatbot-input" 
      id="chatbot-input" 
      placeholder="Fai una domanda..." 
      autocomplete="off" 
      required
    >
    <button type="submit" class="chatbot-send" id="chatbot-send">Invia</button>
  </form>

</div>
