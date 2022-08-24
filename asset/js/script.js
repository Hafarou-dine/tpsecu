const zone = document.querySelector("#message");
function ecrireMsg(msg){
    zone.innerText = msg;
}

// Fonction qui permet d'ajouter une option à au select ayant pour id : "liste_type"
function addOption(text, value){
    const select = document.getElementById("liste_type");
    const newOption = new Option(text, value);
    select.options.add(newOption);
}