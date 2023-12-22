<?php
    use DB\DBAccess;

    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "functions/dbAccess.php";

    session_start();
    if(isset($_SESSION["email"])){
        die("<script>location.href='index.php'</script>");
    }

    $paginaHTML=file_get_contents("templates/loginTemplate.html");

    $db=new DBAccess;
    $connOk=$db->openDBConnection();

    if($connOk){
        if(isset($_POST["loginsubmit"])){
            $email=$_POST["loginemail"];
            $password=$_POST["loginpass"];
            if($db->verifyUser($email) && ($password===$db->getUserPassword($email))){
                $db->getAuthUserInfo($email);
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
