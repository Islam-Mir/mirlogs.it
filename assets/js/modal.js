/**
 * ============================================================
 * MODAL.JS - Gestione dell'ingrandimento delle immagini (Lightbox)
 * ============================================================
 * 
 * Questo script ha un solo compito:
 * 1. Aprire la finestra modale quando clicchiamo su una foto
 * 2. Mostrare l'immagine a schermo intero
 * 3. Chiudere la modale con la X, cliccando sullo sfondo o premendo ESC
 * ============================================================
 */

// Funzione 1: Apre la modale e imposta l'indirizzo dell'immagine
function apriModaleImmagine(sorgenteImmagine, testoAlternativo) {
  const modale = document.getElementById("lightbox-modal");
  const imgElemento = document.getElementById("lightbox-img");

  if (!modale || !imgElemento) return;

  imgElemento.src = sorgenteImmagine;
  imgElemento.alt = testoAlternativo || "Immagine ingrandita";
  modale.classList.add("is-open");
}

// Funzione 2: Chiude la modale
function chiudiModaleImmagine() {
  const modale = document.getElementById("lightbox-modal");
  const imgElemento = document.getElementById("lightbox-img");

  if (!modale) return;

  modale.classList.remove("is-open");
  if (imgElemento) {
    imgElemento.src = ""; // Resetta la sorgente per liberare memoria
  }
}

// Funzione 3: Chiude se si preme il tasto 'Escape' sulla tastiera
function gestisciTastoTastiera(evento) {
  if (evento.key === "Escape") {
    chiudiModaleImmagine();
  }
}

// Funzione 4: Configura i listener per tutte le immagini cliccabili
function collegaClickImmagini() {
  // Cerchiamo tutti gli elementi che hanno la classe 'clickable-image'
  const immaginiCliccabili = document.querySelectorAll(".clickable-image");

  immaginiCliccabili.forEach(function (img) {
    // Nel carosello il click viene gestito delegando l'intera scheda.
    if (img.closest(".carousel-slide")) return;
    img.addEventListener("click", function () {
      apriModaleImmagine(img.src, img.alt);
    });
  });

  // Bottone di chiusura (X)
  const bottoneChiudi = document.getElementById("lightbox-close");
  if (bottoneChiudi) {
    bottoneChiudi.addEventListener("click", chiudiModaleImmagine);
  }

  // Click sullo sfondo scuro per chiudere
  const modale = document.getElementById("lightbox-modal");
  if (modale) {
    modale.addEventListener("click", function (evento) {
      if (evento.target === modale) {
        chiudiModaleImmagine();
      }
    });
  }

  // Ascolto tasto ESC
  document.addEventListener("keydown", gestisciTastoTastiera);
}

// Avvio quando la pagina è pronta
document.addEventListener("DOMContentLoaded", collegaClickImmagini);
