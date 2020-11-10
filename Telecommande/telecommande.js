"user strict";

// j'écoute l'évènement "click" de la première touche de ma télécommande
document.querySelector("main > ul > li:nth-of-type(1)").addEventListener("click", (event) => {
  let bruit = new Audio("https://lasonotheque.org/UPLOAD/mp3/0863.mp3"); // cheval // je créé un objet audio appelé "bruit"
  bruit.play(); // je joue ce bruit
});

// même chose avec les autres touches de ma télécommande

document.querySelector("main > ul > li:nth-of-type(2)").addEventListener("click", (event) => {
  let bruit = new Audio("https://lasonotheque.org/UPLOAD/mp3/0104.mp3"); // coq
  bruit.play();
});

document.querySelector("main > ul > li:nth-of-type(3)").addEventListener("click", (event) => {
  let bruit = new Audio("https://lasonotheque.org/UPLOAD/mp3/0280.mp3"); // chèvre
  bruit.play();
});

document.querySelector("main > ul > li:nth-of-type(4)").addEventListener("click", (event) => {
  let bruit = new Audio("https://lasonotheque.org/UPLOAD/mp3/0417.mp3"); // canard
  bruit.play();
});

document.querySelector("main > ul > li:nth-of-type(5)").addEventListener("click", (event) => {
    let bruit = new Audio("https://lasonotheque.org/UPLOAD/mp3/0546.mp3"); // vache
    bruit.play();
  });

  document.querySelector("main > ul > li:nth-of-type(6)").addEventListener("click", (event) => {
    let bruit = new Audio("https://lasonotheque.org/UPLOAD/mp3/1673.mp3"); // oiseaux
    bruit.play();
  });