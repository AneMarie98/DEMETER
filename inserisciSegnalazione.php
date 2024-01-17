<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "functions/dbAccess.php";

  
    $paginaHTML=file_get_contents("templates/inserisciSegnalazioneTemplate.html");
    $htmlToInsert = "";

    
    if(isset($_POST["indirizzo"]) && isset($_POST["data"]) && isset($_POST["testo"])){
        $indirizzo=cleanInput($_POST["indirizzo"]);
        $data=cleanInput($_POST["data"]);
        $testo=cleanInput($_POST["testo"]);
        $db=new DB\DBAccess;
        $connOk=$db->openDBConnection();
        if($connOk){
            $db->insertSegnalazione($indirizzo,$data,$testo);
            $htmlToInsert .= "<p>Segnalazione inserita correttamente</p>";
        }
        else{
            die("<script>location.href='error.php'</script>");
        }
    }
    else{
        $htmlToInsert .= "<p>Compila tutti i campi</p>";
    }

    if(isset($_SESSION["email"])){
        $profile=$_SESSION["firstname"];
        $profilelink="profilo.php";
        $htmlToInsert .= " 
        <legend>Segnalazione</legend>
        <form id=\"segnalazione\" action=\"#\" method=\"post\" onsubmit=\"return validazioneForm()\">
            <fieldset>
                <div class=\"form-linegroup\">
                    <label for=\"indirizzo\">Indirizzo:</label>

                    <input type=\"text\" id=\"indirizzo\" name=\"indirizzo\" placeholder=\"Piazza San Marco\" required>

                </div>
                <div class=\"form-linegroup\">
                    <label for=\"data\">Data:</label>
                    <input type=\"date\" id=\"data\" name=\"data\" required >    
                </div>
                <div class=\"form-linegroup\"></div>
                    <label for=\"testo\">Testo:</label>
                    <textarea id=\"testo\" name=\"testo\" placeholder=\"Rifiuti abbandonati sul ciglio della strada\"></textarea>   
                </div>
                <div class=\"form-linegroup\">
                    <button type=\"submit\">Invia</button>
                </div>
            </fieldset>
        </form>";
    }
    else{
        $profile="Accedi";
        $profilelink="login.php";
        $htmlToInsert .= "<p>Per effettuare una segnalazione devi eseguire il login o registrarti</p>";
    }

    $paginaHTML=str_replace("{profile}",$profile,$paginaHTML);
    $paginaHTML=str_replace("{profilelink}",$profilelink,$paginaHTML);
    $paginaHTML=str_replace("{form}",$htmlToInsert,$paginaHTML);
    echo $paginaHTML;

?>