<?php
    use DB\DBAccess;

    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "functions/dbAccess.php";

    session_start();
    if(isset($_SESSION["email"])){
        if(isset($_SESSION["admin"])){
            die("<script>location.href='dashboard.php'</script>");
        }
        die("<script>location.href='profilo.php'</script>");
    }

    $paginaHTML=file_get_contents("templates/loginTemplate.html");

    $db=new DBAccess;
    $connOk=$db->openDBConnection();

    if($connOk){
        if(isset($_POST["loginsubmit"])){
            $username=$_POST["loginusername"];
            $password=$_POST["loginpassword"];
            if($db->verifyUser($username) && ($password===$db->getUserPassword($username))){
                $db->getAuthUserInfo($username);
                die("<script>location.href='index.php'</script>");
            }
            else{
                $errormsg="Email o Password non coincidono";
            }
        }
    }
    else{
        die("<script>location.href='error.php'</script>");
    }

    echo $paginaHTML;
    if(isset($errormsg)){
        echo "<script>document.getElementById('loginerror').innerHTML='$errormsg'</script>";
    }
