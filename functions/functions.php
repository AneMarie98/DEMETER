<?php
    function getCurrentMY($currentmonth){
        $month=date("m",strtotime($currentmonth));
        switch($month){
            case "1": $m="Gennaio ";break;
            case "2": $m="Febbraio ";break;
            case "3": $m="Marzo ";break;
            case "4": $m="Aprile ";break;
            case "5": $m="Maggio ";break;
            case "6": $m="Giugno ";break;
            case "7": $m="Luglio ";break;
            case "8": $m="Agosto ";break;
            case "9": $m="Settembre ";break;
            case "10": $m="Ottobre ";break;
            case "11": $m="Novembre ";break;
            case "12": $m="Dicembre ";break;
            default: $m="Errore";break;
        }
        return $m.date("Y",strtotime($currentmonth));
    }

    function replaceBox($boxId,$boxDay,$paginaHTML){
        $boxContent="<p class='dayNum'>$boxDay</p><div id='bidC' class='bidsvuot'>C</div><div id='bidP' class='bidsvuot'>P</div>";
        return str_replace("{{$boxId}}",$boxContent,$paginaHTML);
    }