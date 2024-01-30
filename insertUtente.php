<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "functions/dbAccess.php";
    require_once "functions/functions.php"; 
    
    if(isset($_POST["username"])){
        $db=new DB\DBAccess;
        $connOk=$db->openDBConnection();
        if($connOk){
            $username=cleanInput($_POST["username"], $db->getConnection());
            $password=cleanInput($_POST["password"], $db->getConnection());
            $email=cleanInput($_POST["mail"], $db->getConnection());
            $nome=cleanInput($_POST["nome"], $db->getConnection());
            $cognome=cleanInput($_POST["cognome"], $db->getConnection());
            if($connOk){
                if( $db->insertUtente($username, password_hash($password, PASSWORD_DEFAULT),$email,$nome,$cognome)){
                    session_start();
                    echo "qui";
                    $_SESSION["email"]=$email;
                    $_SESSION["firstname"]=$nome;
                    $_SESSION["lastname"]=$cognome;
                    header("Location: profilo.php");
                }
            }
            else{
                header("Location: 503.html");
            }
        }
    }else{
        header("Location: registrazione.php");
    }    