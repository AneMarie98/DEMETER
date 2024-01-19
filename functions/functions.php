
<?php
function cleanInput($value, $connection){
        // elimina gli spazi
        $value = trim($value);
        // rimuove tag html (non sempre è una buona idea!)
        $value = strip_tags($value);
        // converte i caratteri speciali in entità html (ex. &lt;)
        $value = htmlentities($value);
        $value = mysqli_real_escape_string($connection, $value);

        return $value;

}

function convertDateFormatString($date){
    $elements = explode("-", $date);
    $date = $elements[2]."/".$elements[1]."/".$elements[0];
    return $date;
}

