const normale = document.getElementById("normale");
const btn_filtre_alphabetique_croissant = document.getElementById("btn_filtre_croissant");
const filtre_alphabetique_croissant = document.getElementById("filtre_croissant");
const btn_filtre_alphabetique_decroissant = document.getElementById("btn_filtre_decroissant");
const filtre_alphabetique_decroissant = document.getElementById("filtre_decroissant");
const btn_annee_de_sortie_croissant = document.getElementById("btn_annee_de_sortie_croissant");
const filtre_annee_sorti_croissant = document.getElementById("filtre_annee_sorti_croissant");

filtre_annee_sorti_croissant
// DIV qui va accueillir les titre 
const titre_filtre = document.getElementById("titre_filtre");


// Pour savoir si la page est charger
document.addEventListener('DOMContentLoaded', function() {
    // Si la page est charger execute ce code
    console.log('HTML prêt !');
    filtre_alphabetique_croissant.style.display = "none";
    filtre_alphabetique_decroissant.style.display = "none";

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

    // Deuxième manière: pour que la fonction fonctionne il faut ajouter ( onClick="trieAlphabetiqueCroissant()" ) en attibut du bouton "Ordre alphabétique"
    function trieAlphabetiqueCroissant() {
        if(getComputedStyle(normale).display != "none" || 
        getComputedStyle(filtre_alphabetique_decroissant).display != "none" || 
        getComputedStyle(filtre_annee_sorti_croissant).display != "none"){
            console.log("Boutton'Ordre Alphabétique'");
            filtre_alphabetique_croissant.style.display = "block";
            normale.style.display = "none";
            filtre_alphabetique_decroissant.style.display = "none";
            btn_filtre_alphabetique_croissant.style.display = "none";
            btn_annee_de_sortie_croissant.style.display = "block";
            btn_filtre_alphabetique_decroissant.style.display = "block";
        }
    }

    function trieAlphabetiqueDecroissant() {
        if(getComputedStyle(normale).display != "none" || 
        getComputedStyle(filtre_alphabetique_croissant).display != "none" || 
        getComputedStyle(filtre_annee_sorti_croissant).display != "none"){
            console.log("Boutton'Ordre Alphabétique décroissant'");
            filtre_alphabetique_decroissant.style.display = "block";
            normale.style.display = "none";
            filtre_alphabetique_croissant.style.display = "none";
            btn_filtre_alphabetique_decroissant.style.display = "none";
            btn_annee_de_sortie_croissant.style.display = "block";
            btn_filtre_alphabetique_croissant.style.display = "block";
        } 
    }
    
    function trieAnneeSortiCroissant() {
        if(getComputedStyle(normale).display != "none" || 
        getComputedStyle(filtre_alphabetique_croissant).display != "none" || 
        getComputedStyle(filtre_alphabetique_decroissant).display != "none"){
            console.log("Boutton 'Tri année croissant'");
            filtre_annee_sorti_croissant.style.display = "block"
            normale.style.display = "none";
            filtre_alphabetique_croissant.style.display = "none";
            filtre_alphabetique_decroissant.style.display = "none";
            btn_annee_de_sortie_croissant.style.display = "none";
            btn_filtre_alphabetique_croissant.style.display = "block";
            btn_filtre_alphabetique_decroissant.style.display = "block";
        } 
    }
//