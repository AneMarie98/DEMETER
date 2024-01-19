<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');


    $paginaHTML=file_get_contents("templates/dashboardTemplate.html");


    
        
   if(isset($_SESSION["email"]) && isset($_SESSION["admin"])){
        $profile="Dashboard";
        $profilelink="dashboard.php";
        $paginaHTML=str_replace("{profile}",$profile,$paginaHTML);
        $paginaHTML=str_replace("{profilelink}",$profilelink,$paginaHTML);
        echo $paginaHTML;

   }
    else{
        header("Location: login.php");
        
    }
