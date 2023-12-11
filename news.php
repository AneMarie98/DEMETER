<?php 
include("functions.php") ;
$html = file_get_contents("header.html"); // Leggi il contenuto dell'HTML

$head_keywords = "Demeter, Raccolta, Rifiuti"; // Valore da assegnare a {head_keywords}
$html = str_replace("{head_keywords}", $head_keywords, $html);

$head_description = "Servizio completo di trattamento dei rifiuti per ogni tipo di intervento. Garantiamo lavori rapidi, convenienti e a norma di legge"; // Valore da assegnare a {head_description}
$html = str_replace("{head_description}", $head_description, $html);

removeLinkFromNavItem($html, "news"); //  funzione per rimuovere link circolari

$breadcrumb_path = "&gt; &gt; <span lang=\"en\">News</span>"; // Valore da assegnare a {breadcrumb_path}
$html = str_replace("{breadcrumb_path}", $breadcrumb_path, $html);

echo $html; 
?>


<main id="content" class="news">
        <h2>Ultime <span lang="en">news</span></h2>   
        <article>
            <h3> Emergenza alluvione - Demeter invia uomini e mezzi per lo sgombero e la pulizia nei Comuni alluvionati </h3>
            <p>
            Sono partiti lo scorso fine settimana gli operatori che aiuteranno nelle attività di rimozione di detriti e rifiuti che in questi giorni vengono accatastati lungo le strade. Verranno raccolti elettrodomestici, mobili e altri materiali che hanno subito danno a causa dell'acqua e di cui cittadini e aziende hanno bisogno di disfarsi al fine di poter liberare le strade.
            Per due settimane gli operatori si alterneranno alla guida di 2 mezzi con ragno allestiti con due cassoni scarrabili ciascuno. 
            <a href="../detailedNews/detailedNews.html?">Scopri di più</a>
            </p>
        </article> 
        <article>
            <h3> Si dà inizio al nuovo progetto didattico di sensibilizzazione sui rifiuti "Riciclo In Pratica"</h3>
            <p>
                Demeter, pioniere nell'ambiente sostenibile, ha lanciato "Riciclo In Pratica", un innovativo progetto didattico per sensibilizzare gli studenti sulla gestione responsabile dei rifiuti. Attraverso workshop, seminari e attività coinvolgenti, il programma mira a promuovere pratiche sostenibili nel quotidiano, dimostrando l'effetto positivo di piccoli gesti. 
                La campagna #RicicloInPratica ha già ricevuto una risposta entusiastica, evidenziando l'impegno di Demeter nel promuovere una cultura consapevole e sostenibile nel lungo termine.
                <a href="../detailedNews/detailedNews.html?">Scopri di più</a>
                </p>
        </article> 
        <article>
            <h3> EcoCalendari 2024 </h3>
            <p>
                Sono in consegna i nuovi calendari per l'anno 2024!
                Le raccolte del nuovo anno sono già disponibili sul nostro sito, inoltre si può consultare l'intero calendario del 2024 tramite la nostra App.
                Si ricorda ai cittadini di controllare attentamente l'EcoCalendario, perché in occasione delle prossime festività, in alcuni Comuni le raccolte subiranno delle variazioni.
                <a href="../detailedNews/detailedNews.html?">Scopri di più</a>
            </p>
        </article> 
        <article>
            <h3> Nuove normative per i bidoni della spazzatura - Conosciamole Insieme </h3>
            <p>
                Demeter informa i cittadini sulle nuove normative per i bidoni della spazzatura, mirate a semplificare la raccolta differenziata e promuovere lo smaltimento responsabile dei rifiuti. I colori standard dei bidoni indicano le categorie specifiche, come carta, plastica, vetro, organico e rifiuti indifferenziati. 
                L'adesione a queste norme è fondamentale per una gestione sostenibile dei rifiuti. Demeter invita i cittadini a seguire scrupolosamente le nuove disposizioni per contribuire a un ambiente più pulito e sano.
                <a href="../detailedNews/detailedNews.html?">Scopri di più</a>
                </p>
        </article> 
    </main>

<?php echo file_get_contents('footer.html'); ?>