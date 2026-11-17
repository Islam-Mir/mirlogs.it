<?php
/** Widget dell'assistente virtuale disponibile su tutte le pagine. */
?>

<!-- Pulsante flottante per aprire o chiudere la chat -->
<button class="chatbot-trigger" id="chatbot-trigger" aria-label="Apri la chat con l'assistente IA" title="Chiedi all'assistente IA" aria-controls="chatbot-window" aria-expanded="false" type="button">
  <span class="chatbot-trigger-icon" aria-hidden="true">
    <svg viewBox="0 0 24 24" focusable="false"><path d="M12 3.5c-4.7 0-8.5 3.2-8.5 7.2 0 2.2 1.2 4.1 3.2 5.4l-.8 3.2 3.8-1.7c.8.2 1.5.3 2.3.3 4.7 0 8.5-3.2 8.5-7.2S16.7 3.5 12 3.5Z"/><path d="M8.5 11h.1m3.4 0h.1m3.4 0h.1"/></svg>
  </span>
  <span class="chatbot-trigger-label">Chiedi all'assistente IA</span>
</button>

<!-- Finestra del chatbot -->
<div class="chatbot-window" id="chatbot-window" role="dialog" aria-labelledby="chatbot-title" aria-modal="false">
  <div class="chatbot-header">
    <h4 id="chatbot-title">
      <span class="chatbot-avatar" aria-hidden="true">✦</span>
      <span class="chatbot-heading-copy"><span>Assistente di Mir Islam</span><span class="chatbot-status">Qui per aiutarti</span></span>
    </h4>
    <button class="chatbot-close" id="chatbot-close" aria-label="Chiudi finestra chat" type="button">&times;</button>
  </div>

  <div class="chatbot-messages" id="chatbot-messages" aria-live="polite" aria-relevant="additions">
    <div class="chat-bubble bot">Ciao! Sono l’assistente di questo sito. Chiedimi pure dei progetti, dei viaggi o delle letture di Mir.</div>
  </div>

  <div class="chatbot-suggestions" aria-label="Domande suggerite">
    <button type="button" class="chip-suggestion" data-prompt="Chi è Mir Islam?">Chi è Mir?</button>
    <button type="button" class="chip-suggestion" data-prompt="Cosa studia e quali progetti ha realizzato?">Web &amp; Codice</button>
    <button type="button" class="chip-suggestion" data-prompt="Quali paesi ha visitato e qual è il suo motto?">Viaggi</button>
    <button type="button" class="chip-suggestion" data-prompt="Quali libri consiglia Mir?">Libri</button>
    <button type="button" class="chip-suggestion" data-prompt="Come posso contattare Mir?">Contatti</button>
  </div>

  <form class="chatbot-form" id="chatbot-form">
    <input type="text" class="chatbot-input" id="chatbot-input" placeholder="Fai una domanda..." autocomplete="off" required>
    <button type="submit" class="chatbot-send" id="chatbot-send">Invia</button>
  </form>
</div>
