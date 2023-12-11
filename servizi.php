<?php 
include("functions.php") ;
$html = file_get_contents("header.html"); // Leggi il contenuto dell'HTML

$head_keywords = "Servizi Ecologici, Impianti, Smaltimento Rifiuti,Raccolta,Bonifiche Ambientali.Intervento"; // Valore da assegnare a {head_keywords}
$html = str_replace("{head_keywords}", $head_keywords, $html);

$head_description = "Servizio completo di trattamento dei rifiuti per ogni tipo di intervento. Garantiamo lavori rapidi, convenienti e a norma di legge"; // Valore da assegnare a {head_description}
$html = str_replace("{head_description}", $head_description, $html);

removeLinkFromNavItem($html, "servizi"); //  funzione per rimuovere link circolari

$breadcrumb_path = " &gt; &gt; Servizi"; // Valore da assegnare a {breadcrumb_path}
$html = str_replace("{breadcrumb_path}", $breadcrumb_path, $html);

echo $html; 
?>

<main id="content">
        <h2 >Servizi</h2>
        <section id="section1">
            <div class="container section1Content">

                <div class="section1Description">
                    
                    <h3>Servizi di qualità nel rispetto delle norme di legge</h3>
                    <p>Sei in cerca di <strong> esperti nei servizi ecologici </strong>? Allora sei nel posto giusto!</p>
                    <p>L'impresa Demeter ha un'ampia esperienza nel settore e fornisce servizi che soddisfano <strong>elevati livelli di qualità</strong>, sempre <strong>nel pieno rispetto delle leggi vigenti</strong>.</p>

                    

                </div>

                <div class="img1">
                    
                </div>
            </div>
        </section>
            
        <section id="section2">
            <div class="container section2Content">
                <div class="serviceDescription">
                    <h3>Servizi Ecologici Completi</h3>
                    <p>La nostra impresa si occupa in particolare di:</p>
                    <div class="img2">

                    </div>
                </div>

                <div class="serviceContainer">
                    <div class="serviceBoxContainer"> 
                        <div class="content">
                            <h3>
                                <a href="servizi/impianti.html">Impianti di smaltimento e depurazione</a>
                            </h3>
                                    
                        </div>
         
                    </div>
                    <div class="serviceBoxContainer">
                        <div class="content">
                            <h3>
                                <a href="servizi/smaltimento.html">Smaltimento rifiuti</a>
                            </h3>
                        </div>
                    </div>
                    <div class="serviceBoxContainer">
                       <div class="content">
                            <h3>
                                <a href="servizi/raccolta.html">Recupero e raccolta rifiuti</a>
                            </h3>
                        </div>
                    </div>
                    <div class="serviceBoxContainer">
                        <div class="content">
                            <h3>
                                <a href="servizi/bonifiche.html">Bonifiche ambientali</a>
                            </h3>
                        </div>
                            
                        
                    </div>
                    <div class="serviceBoxContainer">
                      <div class="content">
                            <h3>
                                <a href="servizi/intervento.html">Pronto intervento ambientale</a>
                            </h3>
                        
                        </div>
                    </div>
                </div>


            </div>

            

  


        


        </section>

        <section id="section3">
            <h3>Scegli anche tu la nostra professionalità</h3>

            <p>L'azienda Demeter è situata in un contesto che riflette la nostra dedizione all'ambiente, la nostra sede è il 
                luogo ideale per immergersi nella missione di <strong>gestire i rifiuti in modo responsabile</strong> ed ecocompatibile. <strong>Infrastrutture
                moderne</strong>, <strong>personale qualificato</strong>, <strong>attrezzature e mezzi innovativi</strong> sono gli aspetti che ci permettono di offrire 
                servizi di qualità e contribuiscono alla costante evoluzione della nostra attività. 
                Siamo entusiasti di condividere la nostra passione per la sostenibilità ambientale
                e di costruire insieme un futuro più verde. 
            </p>

        </section>

        <section id="section4">
            <h3>Perchè scegliere Demeter</h3>
        <div class="reasonContainer">
            <div class="reasonBoxContainer">
                <div class="content">
                    <h4>Impegno Ambientale</h4>
                    <p>Demeter si impegna attivamente nella promozione della sotenibilità ambientale. La nostra azienda adotta pratiche e tecnologie
                                avanzate per ridurre l'impatto ambientale della gestione dei rifiuti, contribuendo così alla conservazione dell'ambiente. 
                    </p>
                </div>

            </div>

            <div class="reasonBoxContainer">

                        <div class="content">
                            <h4>Tecnologie innovative</h4>
                            <p>Utilizziamo tecnologie all'avanguardia per la raccolta, il riciclo e lo smaltimento dei rifiuti. Ciò ci consente di massimizzare l'efficienza operativa
                                e di garantire una gestione dei rifiuti sicura ed ecocompatibile. 
                            </p>
                        </div>

            </div>

            <div class="reasonBoxContainer">
                
                        <div class="content">
                            <h4>Personalizzazione dei servizi</h4>
                            <p>Comprendiamo che le esigenze di ogni cliente possono essere uniche. Per questo offriamo 
                                soluzioni personalizzate per adattarci alle specifiche necessità di ciascun cliente, garantendo un servizio 
                                flessibile e adatto alle singole circostanze. 
                            </p>
                        </div>

            </div>

            <div class="reasonBoxContainer">

                        <div class="content">
                            <h4>Affidabilità e professionalità</h4>
                            <p>Siamo orgogliosi della nostra reputazione. Il nostro team è composto da esperti nel settore che lavorano con dedizione per assicurare
                                ai clienti un servizio di alta qualità, puntuale e conforme agli standard normativi.  
                            </p>
                        </div>

            </div>

            <div class="reasonBoxContainer">

                        <div class="content">
                            <h4>Trasparenza e Comunicazione</h4>
                            <p>Presso Demeter crediamo nell'importanza della trasparenza e della comunicazione aperta 
                                con i nostri clienti. Forniamo informazioni dettagliate sui nostri processi e ci sforziamo di mantenere una comunicazione chiara
                                e tempestiva per garantire la massima soddisfazione. 
                            </p>
                        </div>

            </div>


        </div>

        </section>


        

    



    </main>

<?php echo file_get_contents('footer.html'); ?>