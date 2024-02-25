<?php
    use DB\DBAccess;

    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "functions/dbAccess.php";

    session_start();
    if(isset($_SESSION["email"])){
        if(isset($_SESSION["admin"])){
            header("Location: dashboard.php");
        }
        header("Location: profilo.php");
    }

    $paginaHTML=file_get_contents("templates/loginTemplate.html");

    $db=new DBAccess;
    $connOk=$db->openDBConnection();
    $errormsg="";
    
    if($connOk){
        if(isset($_POST["loginsubmit"])){
            $username=$_POST["loginusername"];
            $password=$_POST["loginpassword"];
            if($db->verifyUser($username) && (password_verify($password, $db->getUserPassword($username)))){
                $db->getAuthUserInfo($username);
                if ($username == "admin"){
                    header("Location: dashboard.php");
                } else {
                    header("Location: profilo.php");
                }
                
            }
            else{
                $errormsg="<p class='errorSuggestion'>Username o Password non coincidono</p>";
            }
        }
    }
    else{
        header("Location: p503.html");
    }

    $paginaHTML=str_replace("{error}", $errormsg, $paginaHTML);
    echo $paginaHTML;
    
