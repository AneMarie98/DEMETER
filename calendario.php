<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "functions/dbAccess.php";

    $db=new DB\DBAccess;
    $connOk=$db->openDBConnection();

    session_start();

    $paginaHTML=file_get_contents("templates/calendarioTemplate.html");

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

    $paginaHTML=str_replace("{profile}",$profile,$paginaHTML);
    $paginaHTML=str_replace("{profilelink}",$profilelink,$paginaHTML);

    $svuot=$db->getSvuotDays();
    $rows=count($svuot);
    $cols=count($svuot[0]);

    /*echo "<script>
              const svuot=[";
    for($i=0;$i<$rows-1;$i++){
        echo "[";
        for($j=0;$j<$cols-1;$j++){
            echo "'".$svuot[$i][$j]."',";
        }
        echo "'".$svuot[$i][$cols]."'],";
    }
    echo "[";
    for($j=0;$j<$cols-1;$j++){
        echo "'".$svuot[$i][$j]."',";
    }
    echo "'".$svuot[$rows][$cols]."']";

    echo"];
          </script>";*/

    echo "<script>
              const svuot=[['".$svuot[0][0]."','".$svuot[0][1]."','".$svuot[0][2]."','".$svuot[0][3]."'],
                           ['".$svuot[1][0]."','".$svuot[1][1]."','".$svuot[1][2]."','".$svuot[1][3]."'],
                           ['".$svuot[2][0]."','".$svuot[2][1]."','".$svuot[2][2]."','".$svuot[2][3]."'],
                           ['".$svuot[3][0]."','".$svuot[3][1]."','".$svuot[3][2]."','".$svuot[3][3]."'],
                           ['".$svuot[4][0]."','".$svuot[4][1]."','".$svuot[4][2]."','".$svuot[4][3]."'],
                           ['".$svuot[5][0]."','".$svuot[5][1]."','".$svuot[5][2]."','".$svuot[5][3]."'],
                          ];
          </script>";
          

    echo $paginaHTML;