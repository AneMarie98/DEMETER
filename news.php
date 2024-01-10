<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "functions/dbAccess.php";

    $db=new DB\DBAccess;
    $connOk=$db->openDBConnection();
    $newsFromDB = array();
    $htmlToInsert = "";
    $paginaHTML=file_get_contents("templates/newsTemplate.html");


    if(isset($_SESSION["email"])){
        $profile=$_SESSION["firstname"];
        $profilelink="functions/logout.php";
    }
    else{
        $profile="Accedi";
        $profilelink="login.php";
    }
   
    if($connOk){
       $newsFromDB = $db->getNews();
       if(is_array($newsFromDB) && count($newsFromDB) > 0){
        foreach ($newsFromDB as $news) {
            $htmlToInsert .= "<article class >
            <h3> ". $news["titolo"] ." </h3>
            <p> ". $news["descrizione"]." <a href=\"./detailedNews.php?id=".$news["idNotizia"]."\">Scopri di più</a>
            </p>
            </article> ";
            }
       }else{
        $htmlToInsert .= "<p>Al momento non ci sono novità!</p>"; 
       }
       
    }
    else{
        $htmlToInsert .= "<p>I nostri sistemi sono momentaneamente fuori servizi, stiamo lavorando per risolvere il problema.</p>"; 
    }

    $paginaHTML=str_replace("{profile}",$profile,$paginaHTML);
    $paginaHTML=str_replace("{profilelink}",$profilelink,$paginaHTML);
    $paginaHTML=str_replace("{news}",$htmlToInsert,$paginaHTML);
    echo $paginaHTML;

?>