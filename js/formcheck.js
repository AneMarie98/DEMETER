/*
* Questo file contiene le funzioni per la validazione dei form
*/

function cleanInput(value) {
    value = value.trim();   //rimuove gli spazi bianchi
    value = value.replace(/<(?!p|ul|li|\/p|\/ul|\/li)[^>]+>/g, ''); //rimuove tutti i tag html tranne <p>, <ul> e <li>
    value = value.replace(/&/g, '&amp;')
                 .replace(/</g, '&lt;')
                 .replace(/>/g, '&gt;')
                 .replace(/"/g, '&quot;')
                 .replace(/'/g, '&#039;'); //rimuove i caratteri speciali
    return value;
}

function caricamentoSegnalazione(){
    let inputIndirizzo = document.getElementById("indirizzo");
    inputIndirizzo.onblur = function (){validateIndirizzo(this)};
    let inputData = document.getElementById("data");
    inputData.onblur = function (){validateData(this)};
    let inputDescrizione = document.getElementById("testo");
    inputDescrizione.onblur = function (){validateTesto(this)};
}

function caricamentoNotizia(){
    let inputTitolo = document.getElementById("titolo");
    inputTitolo.onblur = function (){validateTitolo(this)};
    let inputData = document.getElementById("data");
    inputData.onblur = function (){validateData(this)};
    let inputArticolo = document.getElementById("articolo");
    inputArticolo.onblur = function (){validateTesto(this)};
    let inputDescrizione = document.getElementById("descrizione");
    inputDescrizione.onblur = function (){validateTitolo(this)};
    let inputUrl = document.getElementById("urlImg");
    inputUrl.onblur = function (){validateUrl(this)};
}

function caricamentoRegistrazione(){
    let inputNome = document.getElementById("nome");
    inputNome.onblur = function (){validateNome(this)};
    let inputCognome = document.getElementById("cognome");
    inputCognome.onblur = function (){validateNome(this)};
    let inputUsername = document.getElementById("username");
    inputUsername.onblur = function (){validateUsername(this)};
    let inputEmail = document.getElementById("mail");
    inputEmail.onblur = function (){validateEmail(this)};
    let inputPassword = document.getElementById("password");
    inputPassword.onblur = function (){validatePassword(this)};
    let inputConfermaPassword = document.getElementById("confermapassword");
    inputConfermaPassword.onblur = function (){validateConfermaPassword(document.getElementById("password"), this)};

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
    
    input.value = cleanInput(input.value);
    if(input.value.length <= 5 || (!input.value.includes('via') || !input.value.includes('Via') || !input.value.includes('piazza') || !input.value.includes('Piazza') || !input.includes('viale') || !input.includes('Viale'))){
        showError(input, "Indirizzo non valido!"); 

        input.focus(); 
        input.select(); 
        return false;
    }
    return true;
}

function validateData(input){
    removeChildInput(input);
    input.value = cleanInput(input.value);
    if(input.value.search(/^\d{4}\-\d{2}\-\d{2}$/)!=0){
        showError(input, input.value + " Non è una data valida!"); 

        input.focus(); 
        input.select(); 
        return false;
    }
    return true;
}

function validateTesto(input){
    removeChildInput(input);

    input.value = cleanInput(input.value);
    if(input.value.search(/^[a-zA-ZÀ-ÿ(),.'\s\/]*$/)!=0 || input.value.length <= 10 || input.value.length >= 500){
        showError(input, "Questo non è un testo valido!"); 

        input.focus(); 
        return false;
    }
    return true;
}

function validateTitolo(input){
    removeChildInput(input);
    input.value = cleanInput(input.value);
    if(input.value.length <= 10 || input.value.length >= 50 || input.value.search(/^[a-zA-ZÀ-ÿ.,()'\s]+$/)!=0){
        showError(input, "Questo non è un titolo valido!"); 

        input.focus(); 
        input.select(); 
        return false;
    }
    return true;
}

function validateDescrizione(input){
    removeChildInput(input);
    input.value = cleanInput(input.value);
    if(input.value.length <= 5 || input.value.length >= 25 || /^[a-zA-ZÀ-ÿ.,()'\s]+$/){
        showError(input, input.value + " è una descrizione troppo lunga!"); 

        input.focus(); 
        input.select(); 
        return false;
    }
    return true;
}

/**
 * Accetta un percorso o un file
 */
function validateUrl(input){
    removeChildInput(input);
    input.value = cleanInput(input.value);
    if(input.value.search(/^(?:[a-zA-Z0-9._%-]+\/)*[a-zA-Z0-9._%-]+\.(png|jpg|jpeg|gif)$/)!=0){
        showError(input, input.value + " non è un percorso valido!"); 

        input.focus(); 
        input.select(); 
        return false;
    }
    return true;
}

function validateNome(input){
    removeChildInput(input);
    input.value = cleanInput(input.value);
    if(input.value.search(/^[a-zA-Z]{2,}$/)!=0){
        showError(input, input.value + " non è un nome valido!"); 

        input.focus(); 
        input.select(); 
        return false;
    }
    return true;
}

function validateEmail(input){
    removeChildInput(input);
    input.value = cleanInput(input.value);
    if(input.value.search(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/)!=0 || emails.includes(input.value)){
        showError(input, input.value + " non è una email valida!"); 

        input.focus(); 
        input.select(); 
        return false;
    }
    return true;
}

function validateUsername(input){
    removeChildInput(input);
    input.value = cleanInput(input.value);
    if(input.value.search(/^[a-zA-Z0-9._%\-]{8,}$/)!=0 || usernames.includes(input.value)){
        showError(input, input.value + " non è un username valido!"); 

        input.focus(); 
        input.select(); 
        return false;
    }
    return true;
}

function validatePassword(input){
    removeChildInput(input);
    input.value = cleanInput(input.value);
    if(input.value.search(/^[a-zA-Z0-9._%$+\-]{8,}$/)!=0){
        showError(input, input.value + " non è una password valida!"); 

        input.focus(); 
        input.select(); 
        return false;
    }
    return true;
}

function validateConfermaPassword(password, input){
    removeChildInput(input);
    password.value = cleanInput(password.value);
    input.value = cleanInput(input.value);
    if(input.value!=password.value){
        showError(input, "Le password non coincidono!"); 

        input.focus(); 
        input.select(); 
        return false;
    }
    return true;
}

function validazioneFormSegnalazione(){
    let inputIndirizzo = document.getElementById("indirizzo");
    let inputData = document.getElementById("data");
    let inputTesto = document.getElementById("testo");
    return validateIndirizzo(inputIndirizzo) && validateData(inputData) && validateTesto(inputTesto);

}

function validazioneFormNotizia(){
    let inputTitolo = document.getElementById("titolo");
    let inputData = document.getElementById("data");
    let inputArticolo = document.getElementById("articolo");
    let inputDescrizione = document.getElementById("descrizione");
    let inputUrl = document.getElementById("urlImg");
    return validateTitolo(inputTitolo) && validateData(inputData) && validateTesto(inputArticolo) && validateTitolo(inputDescrizione) && validateUrl(inputUrl);
}

function validazioneFormRegistrazione(){
    let inputNome = document.getElementById("nome");
    let inputCognome = document.getElementById("cognome");
    let inputUsername = document.getElementById("username");
    let inputEmail = document.getElementById("email");
    let inputPassword = document.getElementById("password");
    let inputConfermaPassword = document.getElementById("confermaPassword");
    return validateNome(inputNome) && validateNome(inputCognome) && validateUsername(inputUsername) && validateEmail(inputEmail) && validatePassword(inputPassword) && validateConfermaPassword(inputPassword, inputConfermaPassword);
}