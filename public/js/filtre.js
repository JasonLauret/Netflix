const normale = document.getElementById("normale");
const btn_filtre_alphabetique_croissant = document.getElementById("btn_filtre_croissant");
const filtre_alphabetique_croissant = document.getElementById("filtre_croissant");
const btn_filtre_alphabetique_decroissant = document.getElementById("btn_filtre_decroissant");
const filtre_alphabetique_decroissant = document.getElementById("filtre_decroissant");
const btn_filtre_annee_sortie_croissant = document.getElementById("btn_filtre_annee_sortie_croissant");
const filtre_annee_sorti_croissant = document.getElementById("filtre_annee_sorti_croissant");
const btn_filtre_annee_sortie_decroissant = document.getElementById("btn_filtre_annee_sortie_decroissant");
const filtre_annee_sorti_decroissant = document.getElementById("filtre_annee_sorti_decroissant");

// DIV qui va accueillir les titre 
const title_filter = document.getElementById("title_filter");
// const title_h3 = document.getElementsByClassName("title_h3");


// Pour savoir si la page est charger
document.addEventListener('DOMContentLoaded', function() {
    // Si la page est charger execute ce code
    console.log('HTML prêt !');
    filtre_alphabetique_croissant.style.display = "none";
    filtre_alphabetique_decroissant.style.display = "none";
    filtre_annee_sorti_croissant.style.display = "none";
    filtre_annee_sorti_decroissant.style.display = "none";
});

function addTitleByFilter(title){
    // Création d'un titre
    // Solution 1
    // Crée un nouvel élément h3
    const newH3 = document.createElement("h3");
    // Lui donner du contenu
    const contenuH3 = document.createTextNode(title);
    // ajouter le nœud texte au nouveau h3 créé
    newH3.appendChild(contenuH3);
    // ajouter le h3 dans la div title_filter
    title_filter.appendChild(newH3);
    // Solution 2
    // let newTitle = document.createElement("h3");
    // newTitle.innerHTML = '<h3 class="title_h3">' + title + '</h3>';
    // title_filter.appendChild(newTitle);
}

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
    //         //     title_filter.appendChild(titre_filtre_croissant);
    //         // }
    //     } else {
    //         normale.style.display = "block";
    //         filtre_alphabetique_croissant.style.display = "none";
    //     }
    // });

    // Les quatres fonction suivant permettes de masquer ou d'afficher les films et des titre lors d'un click bouton 
    // Deuxième manière: pour que la fonction fonctionne il faut ajouter ( onClick="trieAlphabetiqueCroissant()" ) en attibut du bouton "Ordre alphabétique"
    function trieAlphabetiqueCroissant() {
        if(getComputedStyle(normale).display != "none" || 
        getComputedStyle(filtre_alphabetique_decroissant).display != "none" || 
        getComputedStyle(filtre_annee_sorti_croissant).display != "none" || 
        getComputedStyle(filtre_annee_sorti_decroissant).display != "none"){
            console.log("Boutton'Ordre Alphabétique'");
            normale.style.display = "none";
            filtre_alphabetique_croissant.style.display = "block";
            btn_filtre_alphabetique_croissant.style.display = "none";
            filtre_alphabetique_decroissant.style.display = "none";
            btn_filtre_alphabetique_decroissant.style.display = "block";
            filtre_annee_sorti_croissant.style.display = "none";
            btn_filtre_annee_sortie_croissant.style.display = "block";
            filtre_annee_sorti_decroissant.style.display = "none";
            btn_filtre_annee_sortie_decroissant.style.display = "block";
            
            // Mettre un titre
            // Supprimer le contenu de title_filter
            title_filter.innerHTML = "";
            // Créer un titre h3 dans title_filter
            let newTitle = document.createElement('h3');
            newTitle.textContent = 'Trie des titres par ordre alphabétique';
            title_filter.appendChild(newTitle);
        }
    }

    function trieAlphabetiqueDecroissant() {
        if(getComputedStyle(normale).display != "none" || 
        getComputedStyle(filtre_alphabetique_croissant).display != "none" || 
        getComputedStyle(filtre_annee_sorti_croissant).display != "none" || 
        getComputedStyle(filtre_annee_sorti_decroissant).display != "none"){
            console.log("Boutton'Ordre Alphabétique décroissant'");
            normale.style.display = "none";
            filtre_alphabetique_croissant.style.display = "none";
            btn_filtre_alphabetique_croissant.style.display = "block";
            filtre_alphabetique_decroissant.style.display = "block";
            btn_filtre_alphabetique_decroissant.style.display = "none";
            filtre_annee_sorti_croissant.style.display = "none";
            btn_filtre_annee_sortie_croissant.style.display = "block";
            filtre_annee_sorti_decroissant.style.display = "none";
            btn_filtre_annee_sortie_decroissant.style.display = "block";

            title_filter.innerHTML = "";
            let newTitle = document.createElement('h3');
            newTitle.textContent = 'Trie des titres par ordre alphabétique décroissant';
            title_filter.appendChild(newTitle);
        }
    }
    
    function trieAnneeSortiCroissant() {
        if(getComputedStyle(normale).display != "none" || 
        getComputedStyle(filtre_alphabetique_croissant).display != "none" || 
        getComputedStyle(filtre_alphabetique_decroissant).display != "none" || 
        getComputedStyle(filtre_annee_sorti_decroissant).display != "none"){
            console.log("Boutton 'Tri année croissant'");
            normale.style.display = "none";
            filtre_alphabetique_croissant.style.display = "none";
            btn_filtre_alphabetique_croissant.style.display = "block";
            filtre_alphabetique_decroissant.style.display = "none";
            btn_filtre_alphabetique_decroissant.style.display = "block";
            filtre_annee_sorti_croissant.style.display = "block";
            btn_filtre_annee_sortie_croissant.style.display = "none";
            filtre_annee_sorti_decroissant.style.display = "none";
            btn_filtre_annee_sortie_decroissant.style.display = "block";

            title_filter.innerHTML = "";
            let newTitle = document.createElement('h3');
            newTitle.textContent = 'Trier par année de sortie croissant';
            title_filter.appendChild(newTitle);
        } 
    }

    function trieAnneeSortiDeroissant() {
        if(getComputedStyle(normale).display != "none" || 
        getComputedStyle(filtre_alphabetique_croissant).display != "none" || 
        getComputedStyle(filtre_alphabetique_decroissant).display != "none" || 
        getComputedStyle(filtre_annee_sorti_croissant).display != "none"){
            console.log("Boutton 'Tri année décroissant'");
            filtre_annee_sorti_decroissant.style.display = "block";
            btn_filtre_annee_sortie_decroissant.style.display = "none";
            normale.style.display = "none";
            filtre_alphabetique_croissant.style.display = "none";
            btn_filtre_alphabetique_croissant.style.display = "block";
            filtre_alphabetique_decroissant.style.display = "none";
            btn_filtre_alphabetique_decroissant.style.display = "block";
            filtre_annee_sorti_croissant.style.display = "none";
            btn_filtre_annee_sortie_croissant.style.display = "block";

            title_filter.innerHTML = "";
            let newTitle = document.createElement('h3');
            newTitle.textContent = 'Trier par année de sortie décroissant';
            title_filter.appendChild(newTitle);
        } 
    }