<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "functions/dbAccess.php";
    require_once "functions/functions.php";

    $db=new DB\DBAccess;
    $connOk=$db->openDBConnection();
    $newsFromDB = array();
    $htmlToInsert = "";
    $paginaHTML=file_get_contents("templates/newsTemplate.html");


    if(isset($_SESSION["email"])){
        $profile=$_SESSION["firstname"];
        $profilelink="profilo.php";
    }
    else{
        $profile="Accedi";
        $profilelink="login.php";
    }
   
    if($connOk){
       $newsFromDB = $db->getNews();
       if(is_array($newsFromDB) && count($newsFromDB) > 0){
        foreach ($newsFromDB as $news) {
            // <img src=\"./img/news/".$news["urlImg"]."\" alt=\"\" >
            $htmlToInsert .= 
            "<article class >
            <div id=\"news_".$news["idNotizia"]."\" class=\"newsImg\"></div>
            <h3><a href=\"./detailedNews.php?id=".$news["idNotizia"]."\">". $news["titolo"] ."</a></h3>
            <p> ". $news["descrizione"]."</p>
            </article> ";
            } 
       }else{
        $htmlToInsert .= "<p>Al momento non ci sono novità!</p>"; 
       }
       
    }
    else{
        $htmlToInsert .= "<p>I nostri sistemi sono momentaneamente fuori servizi, stiamo lavorando per risolvere il problema.</p>"; 
    }

    //inizio modifica al css
    $cssStyles = "";
    foreach ($newsFromDB as $news) {
        $cssStyles = "#news_".$news["idNotizia"]."{\n\tbackground-image: url('../img/news/".$news["urlImg"]."');\n}";
        //desktop style
        dynamicNewsCSS('css/style.css',$cssStyles);
        //mini
        dynamicNewsCSS('css/mini.css',$cssStyles);
    }
    
    //fine modifica al css
    $paginaHTML=str_replace("{profile}",$profile,$paginaHTML);
    $paginaHTML=str_replace("{profilelink}",$profilelink,$paginaHTML);
    $paginaHTML=str_replace("{news}",$htmlToInsert,$paginaHTML);
    echo $paginaHTML;

?>