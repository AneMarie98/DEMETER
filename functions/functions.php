
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


function dynamicAppendCSS($cssFilePath, $cssContent) {
    echo '<script>'; //tmp
    echo 'console.log(\'dynamicAppend run\')'; //tmp
    echo '</script>'; //tmp
    // Verifica se il file CSS esiste
    if (file_exists($cssFilePath)) {
        // Ottieni il contenuto attuale del file CSS
        $existingContent = file_get_contents($cssFilePath);
        // Normalizzo i testi
        $normalizedExistingContent = str_replace(["\r\n", "\r", "\n", ' '], '', $existingContent);
        $normalizedCssContent = str_replace(["\r\n", "\r", "\n", ' '], '', $cssContent);
 
        if (strpos($normalizedExistingContent, $normalizedCssContent) === false) {
            echo '<script>'; //tmp
            echo 'console.log(\'contenuto non trovato\')'; //tmp
            echo '</script>'; //tmp

            $pos = strpos($existingContent, '/* News */');
            if ($pos !== false) {
                // Posiziona il cursore dopo il commento
                $pos += strlen('/* News */');
                 // Inserisci il nuovo contenuto nella riga successiva
                $newContent = substr_replace($existingContent, "\n\n".$cssContent."", $pos, 0);
                file_put_contents($cssFilePath, $newContent);
            }
            else{
                // Aggiungi il nuovo contenuto al file
                file_put_contents($cssFilePath, $cssContent, FILE_APPEND);
            }
        }
        else{ //tmp
            echo '<script>'; //tmp
            echo 'console.log(\'contenuto trovato\')'; //tmp
            echo '</script>'; //tmp
        }
    }
}