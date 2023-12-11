<?php 
include("functions.php") ;
$html = file_get_contents("header.html"); // Leggi il contenuto dell'HTML

$head_keywords = "Demeter, Raccolta, Rifiuti, Servizi"; // Valore da assegnare a {head_keywords}
$html = str_replace("{head_keywords}", $head_keywords, $html);

$head_description = "Servizio completo di trattamento dei rifiuti per ogni tipo di intervento. Garantiamo lavori rapidi, convenienti e a norma di legge"; // Valore da assegnare a {head_description}
$html = str_replace("{head_description}", $head_description, $html);

removeLinkFromNavItem($html, "home"); //  funzione per rimuovere link circolari

$breadcrumb_path = ""; // Valore da assegnare a {breadcrumb_path}
$html = str_replace("{breadcrumb_path}", $breadcrumb_path, $html);

echo $html; 
?>


<main id="content">

            <h2>Gestisci i tuoi rifiuti nel migliore dei modi</h2>
            <div id="wrapper">
            <div class="left">
            <p>
                <strong>Demeter</strong> è l'azienda di riferimento per la <strong>raccolta</strong> e lo smaltimento dei <strong>rifiuti</strong> in tutta Italia.
            </p>
            <p>
                Con i suoi <strong>servizi</strong>, Demeter riesce a garantire una completa assistenza e disponibilità nei confronti dei suoi clienti. 
                Unisciti a noi accendendo al nostro portale e richiedendo subito il servizio che più ti interessa. Oppure contattaci direttamente 
                all'indirizzo demeter@gmail.com per ottenere informazioni e chiarire i dubbi in merito al nostro servizio.
            </p>
            <p>
                Consulta il <a href="calendar.html">calendario</a> e rimani aggiornato su tutto ciò che accade nel mondo, nel nostro mondo. Aiutaci a migliorare la nostra casa, 
                in modo tale che sia vivibile ancora per migliaia di anni. Ognuno di noi, sebbene possa sembrare poco, è importante e insieme riusciremo 
                a rendere questo mondo un posto migliore dove vivere per le prossime generazioni.
            </p>
        </div>
        <div class="right"></div>
     </div>
        </main>

<?php echo file_get_contents('footer.html'); ?>