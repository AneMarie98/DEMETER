<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "functions/dbAccess.php";

    $db=new DB\DBAccess;
    $connOk=$db->openDBConnection();
    $id_segnalazione = $_GET["id"];
    $htmlToInsert = "";
    $paginaHTML=file_get_contents("templates/detailedSegnalazioneTemplate.html");

    if(isset($_SESSION["email"])){
        $profile=$_SESSION["firstname"];
        $profilelink="functions/logout.php";
    }
    else{
        $profile="Accedi";
        $profilelink="login.php";
    }

    if($connOk){
        [ $indirizzo, $data, $testo, $inCarico] = $db -> getDetailedSegnalazione($id_segnalazione);
       
        $htmlToInsert .= "<h3>".$indirizzo." | ".$data."</h3>";
        $htmlToInsert .= "<p>".$testo."</p>";
        if($inCarico){
            $htmlToInsert .= "<p>Questa segnalazione è presa in carico, se non è così <a href=\"\">segnala come non presa in carico </a></p>";
        }else{
            $htmlToInsert .= "<p>Questa segnalazione non è presa in carico, <a href=\"\">segnala come presa in carico </a></p>";
        }
       
    } else{
        $htmlToInsert .= "<p>I nostri sistemi sono momentaneamente fuori servizi, stiamo lavorando per risolvere il problema.</p>"; 
    }


    $paginaHTML=str_replace("{profile}",$profile,$paginaHTML);
    $paginaHTML=str_replace("{profilelink}",$profilelink,$paginaHTML);
    $paginaHTML=str_replace("{detailedTitle}",$id_segnalazione,$paginaHTML);
    $paginaHTML=str_replace("{detailedSegnalazione}",$htmlToInsert,$paginaHTML);

    echo $paginaHTML;
?>
