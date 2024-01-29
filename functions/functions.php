
<?php
function cleanInput($value, $connection){
    // elimina gli spazi
    $value = trim($value);
    // rimuove tag html (non sempre è una buona idea!)
    $value = strip_tags($value, '<p><ul><li>');
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

function dynamicNewsCSS($cssFilePath, $cssContent) {
    // Verifica se il file CSS esiste
    if (file_exists($cssFilePath)) {
        // Ottieni il contenuto attuale del file CSS
        $existingContent = file_get_contents($cssFilePath);
        // Normalizzo i testi
        $normalizedExistingContent = str_replace(["\r\n", "\r", "\n", ' '], '', $existingContent);
        $normalizedCssContent = str_replace(["\r\n", "\r", "\n", ' '], '', $cssContent);
        if (strpos($normalizedExistingContent, $normalizedCssContent) === false) {
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
    }
}

function dynamicDetailedNewsCSS($cssFilePath, $cssContent){ 
    // Verifica se il file CSS esiste
    if (file_exists($cssFilePath)) {
        // Ottieni il contenuto attuale del file CSS
        $existingContent = file_get_contents($cssFilePath);
        $cssAllNewContent = '#detailedNewsImage{'.$cssContent."\n}";
        // Normalizzo i testi
        $normalizedExistingContent = str_replace(["\r\n", "\r", "\n", ' '], '', $existingContent);
        $normalizedCssContent = str_replace(["\r\n", "\r", "\n", ' '], '', $cssAllNewContent);
        if (strpos($normalizedExistingContent, $normalizedCssContent) === false) {
            // Siamo nel caso in cui il nuovo contenuto non è già presente nell css
            if (!strpos($normalizedExistingContent, "#detailedNewsImage{") === false) {
                // Siamo nel caso in cui non ci sia
                $pos = strpos($existingContent, "#detailedNewsImage{");
                if ($pos !== false) {
                    // Posiziona il cursore dopo il commento
                    $pos += strlen("#detailedNewsImage{\n");
                    // Trova la fine della riga corrente da sostituire
                    $endOfLinePos = strpos($existingContent, ";", $pos);
                    $endOfLinePos += strlen(";");
                    // Inserisci il nuovo contenuto nella riga successiva
                    $newContent = substr_replace($existingContent, $cssContent, $pos, $endOfLinePos - $pos);
                    file_put_contents($cssFilePath, $newContent);
                }
                else{
                    // Aggiungi il nuovo contenuto alla file del file
                    file_put_contents($cssFilePath, "\n".$cssAllNewContent, FILE_APPEND);
                }
            }
        }
    }   
}