<?php 
// Funzione per rimuovere il tag <a> da una riga specifica
function removeLinkFromNavItem(&$content, $itemText) {
    $pattern =  '/<a href="' . $itemText . '\.php.*?"([^>]*?)>(.*?)<\/a>/s';
    $replacement = '${1}${2}';
    $content = preg_replace($pattern, $replacement, $content);
}
?>