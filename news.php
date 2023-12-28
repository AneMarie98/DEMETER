<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "functions/dbAccess.php";

    $db=new DB\DBAccess;
    $connOk=$db->openDBConnection();

    echo file_get_contents("templates/header.html");

    $newsFromDB = array();
    $htmlToInsert = "<main id=\"content\" class=\"news\"> <h2>Ultime <span lang=\"en\">news</span></h2>";
   
    if($connOk){
       $newsFromDB = $db->getNews();
       if(is_array($newsFromDB) && count($newsFromDB) > 0){
        foreach ($newsFromDB as $news) {
            $htmlToInsert .= "<article class >
            <h3> ". $news["titolo"] ." </h3>
            <p> ". $news["descrizione"]." <a href=\"../detailedNews.php?id=".$news["idNotizia"]."\">Scopri di più</a>
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

    $htmlToInsert .= "</main>";
    echo $htmlToInsert;
    echo file_get_contents("templates/footer.html");

?>