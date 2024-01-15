<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "functions/dbAccess.php";

    $db=new DB\DBAccess;
    $connOk=$db->openDBConnection();
    $segnalazioniFromDB = array();
    $htmlToInsert = "";
    $paginaHTML=file_get_contents("templates/segnalazioniTemplate.html");


    if(isset($_SESSION["email"])){
        $profile=$_SESSION["firstname"];
        $profilelink="functions/logout.php";
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
                <td>".$segnalazione["idSegnalazione"]."</td>
                <td>".$segnalazione["dataS"]."</td>
                <td>".$segnalazione["indirizzo"]."</td>
                <td>
                    <input type=\"checkbox\" id=\"checkbox".$segnalazione["idSegnalazione"]."\" ".($segnalazione["inCarico"] ? "checked" : "")." onclick=\"updateSegnalazione(".$segnalazione["idSegnalazione"].", this.checked)\">
                    <label for=\"checkbox".$segnalazione["idSegnalazione"]."\">Presa in carico</label>
                </td>
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