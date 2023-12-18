<?php 
include("functions.php") ;
$header = file_get_contents("header.html"); // Leggi il contenuto dell'HTML

$head_keywords = "Demeter, Raccolta, Rifiuti"; // Valore da assegnare a {head_keywords}
$header = str_replace("{head_keywords}", $head_keywords, $header);

$head_description = "Servizio completo di trattamento dei rifiuti per ogni tipo di intervento. Garantiamo lavori rapidi, convenienti e a norma di legge"; // Valore da assegnare a {head_description}
$header = str_replace("{head_description}", $head_description, $header);

removeLinkFromNavItem($header, "news"); //  funzione per rimuovere link circolari

$breadcrumb_path = "&gt; &gt; <span lang=\"en\">News</span>"; // Valore da assegnare a {breadcrumb_path}
$header = str_replace("{breadcrumb_path}", $breadcrumb_path, $header);

echo $header; 

$content = file_get_contents("contents/news.html");
echo $content; //Leggi il contenuto del main nell'HTML

 echo file_get_contents('footer.html'); ?>