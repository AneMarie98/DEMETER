<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "functions/dbAccess.php";
    require_once "functions/functions.php";
    session_start();
    $db=new DB\DBAccess;
    $connOk=$db->openDBConnection();
  
    $paginaHTML=file_get_contents("templates/inserisciSegnalazioneTemplate.html");
    $htmlToInsert = "";


    if(isset($_SESSION["email"])){
    
        $profile=$_SESSION["firstname"];
        $profilelink="profilo.php";

        if(isset($_SESSION["admin"])){
            $profile="Dashboard";
        $profilelink="dashboard.php";
        }


        if(isset($_POST["indirizzo"]) && isset($_POST["data"]) && isset($_POST["testo"])&&$connOk){
            $indirizzo=cleanInput($_POST["indirizzo"], $db->getConnection());
            $data=cleanInput($_POST["data"],$db->getConnection());
            $testo=cleanInput($$_POST["testo"], $db->getConnection());
            $db=new DB\DBAccess;
            $connOk=$db->openDBConnection();
            if($connOk){
               if( $db->insertSegnalazione($indirizzo,$data,$testo,$$_SESSION["email"])){
                    $htmlToInsert .= "<p>Segnalazione inserita correttamente. Torna alla <a href=\"index.php\" lang=\"en\"> Home </a></p>";
               }
            }
            else{
                //$htmlToInsert .= "<p>Errore di connessione al database. Ti invitiamo a riprovare ad <a href=\"inserisciSegnalazione.php\"> inserire una segnalazione </a></p>";
                header("Location: p503.html");
            }
        }else{
            $htmlToInsert .= " 
            <legend>Segnalazione</legend>
            <form id=\"segnalazione\" action=\"inserisciSegnalazione.php\" method=\"GET\" onsubmit=\"validazioneFormSegnalazione()\">
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
    }else{
        $profile="Accedi";
        $profilelink="login.php";
        $htmlToInsert .= "<p>Per effettuare una segnalazione devi eseguire il login o registrarti</p>";
    }   

   
    $paginaHTML=str_replace("{profile}",$profile,$paginaHTML);
    $paginaHTML=str_replace("{profilelink}",$profilelink,$paginaHTML);
    $paginaHTML=str_replace("{form}",$htmlToInsert,$paginaHTML);
    echo $paginaHTML;

