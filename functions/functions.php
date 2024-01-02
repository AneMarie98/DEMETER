<?php
    function getCurrentMY(){
        $month=date("m");
        switch($month){
            case "1": $my="Gennaio ".date("Y");break;
            case "2": $my="Febbraio ".date("Y");break;
            case "3": $my="Marzo ".date("Y");break;
            case "4": $my="Aprile ".date("Y");break;
            case "5": $my="Maggio ".date("Y");break;
            case "6": $my="Giugno ".date("Y");break;
            case "7": $my="Luglio ".date("Y");break;
            case "8": $my="Agosto ".date("Y");break;
            case "9": $my="Settembre ".date("Y");break;
            case "10": $my="Ottobre ".date("Y");break;
            case "11": $my="Novembre ".date("Y");break;
            case "12": $my="Dicembre ".date("Y");break;
            default: $my="Errore";break;
        }
        return $my;
    }

    function replaceBox($boxId,$boxDay,$paginaHTML){
        $boxContent="<p class='dayNum'>$boxDay</p><div class='bidsvuot'></div>";
        return str_replace("{{$boxId}}",$boxContent,$paginaHTML);
    }