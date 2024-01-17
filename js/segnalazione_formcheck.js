function caricamento(){
    let inputIndirizzo = document.getElementById("indirizzo");
    inputIndirizzo.onblur = function (){validateIndirizzo(this)};
    let inputData = document.getElementById("data");
    inputData.onblur = function (){validateData(this)};
    let inputTesto = document.getElementById("testo");
    inputTesto.onblur = function (){validate(this)};
}


function showError(tag, stringa){
    const padre = tag.parentNode;
    const errore = document.createElement("strong");
    errore.className = "errorSuggestion";
    errore.appendChild(document.createTextNode(stringa));
    padre.appendChild(errore);
}   

function removeChildInput(tag){
    const padre = tag.parentNode;
    if(padre.children.length == 3){
        padre.removeChild(padre.children[2]);
    }
}

function validateIndirizzo(input){
    removeChildInput(input);

    if(input.value.length <= 5 || !input.includes(',')){
        showError(input, "Indirizzo non valido!"); 

        inputURL.focus(); 
        inputURL.select(); 
        return false;
    }
    return true;
}

function validateData(input){
    removeChildInput(input);
    if(input.value.search(/^\d{4}\-\d{2}\-\d{2}$/)!=0){
        showError(input, input.value + " non è una data valida!"); 

        inputURL.focus(); 
        inputURL.select(); 
        return false;
    }
    return true;
}

function validateTesto(input){
    removeChildInput(input);

    return true;


}

function validazioneForm(){
    let inputIndirizzo = document.getElementById("indirizzo");
    let inputData = document.getElementById("data");
    let inputTesto = document.getElementById("testo");
    return validateIndirizzo(inputIndirizzo) && validateData(inputData) && validateTesto(inputTesto);

}
