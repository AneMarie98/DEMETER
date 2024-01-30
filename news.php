<?php
   ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "functions/dbAccess.php";
    require_once "functions/functions.php";
    session_start();
    $db=new DB\DBAccess;
    $connOk=$db->openDBConnection();
    $newsFromDB = array();
    $htmlToInsert = "";
    $paginaHTML=file_get_contents("templates/newsTemplate.html");


    if(!isset($_SESSION["email"])){
        $profile="Accedi";
        $profilelink="login.php";

    }else{
        if(isset($_SESSION["admin"])){
            $profile="Dashboard";
            $profilelink="dashboard.php";
           
            
        }else{
            $profile=$_SESSION["firstname"];
            $profilelink="profilo.php";
        }
       
    }
   
    if($connOk){
       $newsFromDB = $db->getNews();
       if(is_array($newsFromDB) && count($newsFromDB) > 0){
        foreach ($newsFromDB as $news) {
            // <img src=\"./img/news/".$news["urlImg"]."\" alt=\"\" >
            $htmlToInsert .= 
            "<article>
                <div class='newsArtText'>
                    <h3><a href=\"./detailedNews.php?id=".$news["idNotizia"]."\">". $news["titolo"] ."</a></h3>
                    <p> ". $news["descrizione"]."</p>
                </div>
                <div id=\"news_".$news["idNotizia"]."\" class=\"newsImg\"></div>
            </article> ";
            } 
       }else{
        //$htmlToInsert .= "<p>Al momento non ci sono novità!</p>"; 
        header("Location: p503.html");
       }
       
    }
    else{
        //$htmlToInsert .= "<p>I nostri sistemi sono momentaneamente fuori servizi, stiamo lavorando per risolvere il problema.</p>"; 
       header("Location: p503.html");
    }

    //inizio modifica al css
    $cssStyles = "";
    if(is_array($newsFromDB) && count($newsFromDB) > 0){
        foreach ($newsFromDB as $news) {
            $cssStyles = "#news_".$news["idNotizia"]."{\n\tbackground-image: url('../img/news/".$news["urlImg"]."');\n}";
            //desktop style
            dynamicNewsCSS('css/style.css',$cssStyles);
            //mini
            dynamicNewsCSS('css/mini.css',$cssStyles);
        }
    }
    
    //fine modifica al css
    $paginaHTML=str_replace("{profile}",$profile,$paginaHTML);
    $paginaHTML=str_replace("{profilelink}",$profilelink,$paginaHTML);
    $paginaHTML=str_replace("{news}",$htmlToInsert,$paginaHTML);
    echo $paginaHTML;

