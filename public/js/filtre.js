const btn_filtre_alphabetique_croissant = document.getElementById("btn_filtre_croissant");
const normale = document.getElementById("normale");
const filtre_alphabetique_croissant = document.getElementById("filtre_croissant");
// DIV qui va accueillir les titre 
const titre_filtre = document.getElementById("titre_filtre");


// Pour savoir si la page est charger
document.addEventListener('DOMContentLoaded', function() {
    // Si la page est charger execute ce code
    console.log('HTML prêt !');
    filtre_croissant.style.display = "none";
});

// Filtre trie par ordre alphabétique

    // // Premiere manière
    // // Au click button "Ordre craissant" cache la section normale et affiche la section "filtre_croissant"
    // btn_filtre_alphabetique_croissant.addEventListener("click", function(){
    //     console.log('Trier par ordre croissant');
    //     if(getComputedStyle(normale).display != "none"){
    //         normale.style.display = "none";
    //         filtre_alphabetique_croissant.style.display = "block";
    //         btn_filtre_alphabetique_croissant.style.display = "none";
    //         // // Mettre un titre quand un filtre est activé
    //         // if(getComputedStyle(filtre_croissant).display != "none"){
    //         //     const titre_filtre_croissant = document.createElement("h3");
    //         //     titre_filtre_croissant.innerHTML = '<h3 class="fs-1">Trier par ordre croissant</h3>';
    //         //     // titre_filtre_croissant.classList.add("border");
    //         //     titre_filtre.appendChild(titre_filtre_croissant);
    //         // }
    //     } else {
    //         normale.style.display = "block";
    //         filtre_alphabetique_croissant.style.display = "none";
    //     }
    // });

    // Deuxième manière: ajout de  ( onClick="trieAlphabetiqueCroissant()" ) en attibut du bouton "Ordre alphabétique"
    function trieAlphabetiqueCroissant() {
        if(getComputedStyle(normale).display != "none"){
            normale.style.display = "none";
            filtre_alphabetique_croissant.style.display = "block";
            btn_filtre_alphabetique_croissant.style.display = "none";
        } else {
            normale.style.display = "block";
            filtre_alphabetique_croissant.style.display = "none";
        }
    }
//