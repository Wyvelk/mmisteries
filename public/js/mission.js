 // Nombre final du compteur
var cpt = 0; // Initialisation du compteur
var duree = 2; // Durée en seconde pendant laquel le compteur ira de 0 à 15
var delta = Math.ceil((duree * 1000) / n); // On calcule l'intervalle de temps entre chaque rafraîchissement du compteur (durée mise en milliseconde)
var node = document.getElementById("dispo"); // On récupère notre noeud où sera rafraîchi la valeur du compteur

function countdown() {
    node.innerHTML = ++cpt;
    if (cpt < n) { // Si on est pas arrivé à la valeur finale, on relance notre compteur une nouvelle fois
        setTimeout(countdown, delta);
    }
}

setTimeout(countdown, delta);

const htmlP = document.getElementById("titre");
const txt = htmlP.dataset.label;
let i = 0;

function showLetters() {
    let timeOut;
    if (i < txt.length) {
        htmlP.innerHTML += `<span>${txt[i]}</span>`;
        timeOut = setTimeout(showLetters, 100)
        i++
    } else {
        clearTimeout(timeOut);
        console.log("end")
    }
}
showLetters();