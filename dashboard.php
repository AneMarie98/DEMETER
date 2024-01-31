<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');


    session_start();
    $paginaHTML=file_get_contents("templates/dashboardTemplate.html");
        
    if(!isset($_SESSION["email"])){

    }else{
        if(isset($_SESSION["admin"])){
        $profile="<span lang='en'>Dashboard</span>";
        $profilelink="dashboard.php";
        $paginaHTML=str_replace("{profile}",$profile,$paginaHTML);
        $paginaHTML=str_replace("{profilelink}",$profilelink,$paginaHTML);
        echo $paginaHTML;
           
            
        }else{
            header("Location: profilo.php");
        }
       
    }


