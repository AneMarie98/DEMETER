<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "functions/dbAccess.php";

    $db=new DB\DBAccess;
    $connOk=$db->openDBConnection();
    $id_news = $_GET["id"];

    echo file_get_contents("templates/header.html");

    $newsFromDB ;
    $htmlToInsert = "<main id=\"content\" class=\"detailedNews\"> ";
   
    if($connOk){
        [$titolo, $articolo, $urlImg, $data] = $db -> getDetailedNews($id_news);
        $htmlToInsert .= "<img src=\"".$urlImg."\" alt=\"\" ><h2>".$titolo."</h2> <h3>".$data."</h3><div class=\"newsArticle\">".$articolo."</div>";
      
    } else{
        $htmlToInsert .= "<p>I nostri sistemi sono momentaneamente fuori servizi, stiamo lavorando per risolvere il problema.</p>"; 
    }

    $htmlToInsert .= "</main>";
    echo $htmlToInsert;
    echo file_get_contents("templates/footer.html");

?>