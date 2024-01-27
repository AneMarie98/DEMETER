function toggleMenu(){
    if(document.getElementById("menu").style.display=="block"){
        document.getElementById("menu").style.display="none";
        document.getElementById("togglemenu").innerHTML="Apri menù";
    }
    else{
        document.getElementById("menu").style.display="block";
        document.getElementById("togglemenu").innerHTML="Chiudi menù";
    }
}