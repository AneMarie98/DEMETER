<?php
        ini_set('display_errors',1);
        ini_set('display_startup_errors',1);
        setlocale(LC_ALL,'it_IT');

        if(isset($_GET["id"])){
            $idSegnalazione = $_GET["id"];
            $inCarico = $_GET["inCarico"];

            require_once "functions/dbAccess.php";
            require_once "functions/functions.php";
    
            $db=new DB\DBAccess;
            $connOk=$db->openDBConnection();
            if($connOk){
                if($db->updateSegnalazione($idSegnalazione, $inCarico)){
                    header("Location: segnalazioni.php");
                }else{
                    //TODO: gestire errore connessione
                    //TODO: pagina 503
                }
            }else{
                //TODO: gestire errore connessione
                //TODO: pagina 503
            }

        }else{
            header("Location: segnalazioni.php");
        }
        
        
