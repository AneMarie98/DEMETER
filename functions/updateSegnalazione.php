<?php
        ini_set('display_errors',1);
        ini_set('display_startup_errors',1);
        setlocale(LC_ALL,'it_IT');

        if(isset($_GET["id"])){
            $idSegnalazione = $_GET["id"];
            $inCarico = $_GET["inCarico"];

            require_once "dbAccess.php";
            require_once "functions.php";
    
            $db=new DB\DBAccess;
            $connOk=$db->openDBConnection();
            if($connOk){
                if($db->updateSegnalazione($idSegnalazione, $inCarico)){
                    header("Location: ../segnalazioni.php");
                }else{
                    header("Location: ../503.html");
                }
            }else{
                header("Location: ../503.html");
            }

        }else{
            header("Location: ../segnalazioni.php");
        }
        
        
