<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');
    session_start();
    require_once "functions/dbAccess.php";
    require_once "functions/functions.php";

    $db=new DB\DBAccess;
    $connOk=$db->openDBConnection();
    $id_news = $_GET["id"];
    $newsFromDB ;
    $htmlToInsert = "";
    $paginaHTML=file_get_contents("templates/detailedNewsTemplate.html");

    if(!isset($_GET["id"])){
        header("Location: news.php");
    }


    if(!isset($_SESSION["email"])){
        $profile="Accedi";
        $profilelink="login.php";

    }else{
        if(isset($_SESSION["admin"])){
            $profile="<span lang='en'>Dashboard</span>";
            $profilelink="dashboard.php";
           
            
        }else{
            $profile=$_SESSION["firstname"];
            $profilelink="profilo.php";
        }
       
    }

    if($connOk){
        // modifica html
        [$titolo, $articolo, $urlImg, $data] = $db -> getDetailedNews($id_news);
        $htmlToInsert .= 
        "
        <div id='detnewstitledesktop'><div class=\"detailedNewsImage\"><div class='detnewstitle'><h2>".$titolo."</h2> 
        <p class='datapubblicazione'> <time datetime=\"".$data."\">Data: ".convertDateFormatString($data)."</time></p></div></div></div>
        <div id='detnewstitlemobile'><div class='detnewstitle'><h2>".$titolo."</h2> 
        <p class='datapubblicazione'> <time datetime=\"".$data."\">Data: ".convertDateFormatString($data)."</time></p></div><div class=\"detailedNewsImage\"></div></div>
        <div class=\"newsArticle\">".$articolo."</div>"; // le immagini non devono essere di contenuto

        // modifica css
        $cssNewContent = "\n\tbackground-image: url('../img/news/".$urlImg."');";
        //desktop style
        dynamicDetailedNewsCSS('css/style.css',$cssNewContent);
        //mini
        dynamicDetailedNewsCSS('css/mini.css',$cssNewContent);
    } 
    else{
        //$htmlToInsert .= "<p>I nostri sistemi sono momentaneamente fuori servizi, stiamo lavorando per risolvere il problema.</p>"; 
        header("Location: p503.html");
    }

    
    

    $paginaHTML=str_replace("{profile}",$profile,$paginaHTML);
    $paginaHTML=str_replace("{profilelink}",$profilelink,$paginaHTML);
    $paginaHTML=str_replace("{detailedArticle}",$htmlToInsert,$paginaHTML);

    echo $paginaHTML;

