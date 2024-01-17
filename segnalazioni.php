<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "functions/dbAccess.php";
    require_once "functions/functions.php";

    $db=new DB\DBAccess;
    $connOk=$db->openDBConnection();
    $segnalazioniFromDB = array();
    $htmlToInsert = "";
    $paginaHTML=file_get_contents("templates/segnalazioniTemplate.html");


    if(isset($_SESSION["email"])){
        $profile=$_SESSION["firstname"];
        $profilelink="profilo.php";
    }
    else{
        $profile="Accedi";
        $profilelink="login.php";
    }
   
    if($connOk){
       $segnalazioniFromDB = $db->getSegnalazioni();
       if(is_array($segnalazioniFromDB) && count($segnalazioniFromDB) > 0){
        foreach ($segnalazioniFromDB as $segnalazione) {
            $htmlToInsert .= "
            <tr>
                <th scope= \"row\"><a href=\"detailedSegnalazione.php?id=".$segnalazione["idSegnalazione"]."\">".$segnalazione["idSegnalazione"]."</a></th>
                <td data-title=\"Data\">  <time datetime=\"".$segnalazione["dataS"]."\">".convertDateFormatString($segnalazione["dataS"])."</time></td>
                <td data-title=\"Indirizzo\">".$segnalazione["indirizzo"]."</td>
                <td";
            if($segnalazione["inCarico"] == 1){
                $htmlToInsert .= " class=\"inCarico\"><a href=\"updateSegnalazione.php?id=" .$segnalazione["idSegnalazione"]. "&inCarico=0\"><span>Si</span></a>";
            }else{
                $htmlToInsert .= " class=\"NonInCarico\"><a href=\"updateSegnalazione.php?id=" .$segnalazione["idSegnalazione"]. "&inCarico=1\"><span>No</span></a>";
            }
            $htmlToInsert .= " </td>

            </tr>
            ";
        }

            
       }else{
        $htmlToInsert .= "<p>Al momento non ci sono segnalazioni!</p>"; 
       }
       
    }
    else{
        $htmlToInsert .= "<p>I nostri sistemi sono momentaneamente fuori servizi, stiamo lavorando per risolvere il problema.</p>"; 
    }

    $paginaHTML=str_replace("{profile}",$profile,$paginaHTML);
    $paginaHTML=str_replace("{profilelink}",$profilelink,$paginaHTML);
    $paginaHTML=str_replace("{segnalazioni}",$htmlToInsert,$paginaHTML);
    echo $paginaHTML;

?>