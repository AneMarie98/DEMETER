-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Gen 30, 2024 alle 17:10
-- Versione del server: 10.6.16-MariaDB-0ubuntu0.22.04.1
-- Versione PHP: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dgusatto`
--
CREATE DATABASE IF NOT EXISTS `dgusatto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dgusatto`;

-- --------------------------------------------------------

--
-- Struttura della tabella `notizie`
--

CREATE TABLE IF NOT EXISTS `notizie` (
  `idNotizia` int(11) NOT NULL AUTO_INCREMENT,
  `titolo` varchar(255) NOT NULL,
  `articolo` text NOT NULL,
  `descrizione` text NOT NULL,
  `dataN` date NOT NULL,
  `urlImg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idNotizia`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `notizie`
--

INSERT INTO `notizie` (`idNotizia`, `titolo`, `articolo`, `descrizione`, `dataN`, `urlImg`) VALUES
(1, 'Emergenza alluvione - Demeter invia uomini e mezzi per lo sgombero e la pulizia nei Comuni alluvionati', '<p>Nell\'affrontare l\'emergenza alluvione che ha colpito diversi Comuni della nostra regione, l\'azienda Demeter dimostra ancora una volta il suo impegno sociale e ambientale. Nel corso del fine settimana appena trascorso, un contingente di operatori altamente specializzati è stato inviato nei luoghi più colpiti per coordinare e supportare le attività di rimozione di detriti e rifiuti causati dall\'alluvione. L\'obiettivo principale di questa missione è la raccolta e lo smaltimento di elettrodomestici, mobili e altri materiali danneggiati dall\'acqua.</p> <p>La situazione attuale ha generato una quantità significativa di rifiuti che occupano le strade, rendendo necessario un intervento immediato per ripristinare la normalità nei Comuni interessati. Gli operatori di Demeter, altamente addestrati e dotati delle attrezzature più moderne, si stanno alternando nella guida di due mezzi specializzati con ragno, ognuno equipaggiato con due cassoni scarrabili. Questi veicoli sono progettati per affrontare terreni difficili e condizioni ambientali avverse, garantendo un intervento efficace e sicuro. </p><p>Il piano di intervento prevede un impegno costante per le prossime due settimane, durante le quali gli operatori di Demeter lavoreranno senza sosta per ripulire le strade e liberare la viabilità. La presenza di mezzi con ragno permetterà di accedere a zone altrimenti difficilmente raggiungibili, assicurando una copertura completa e una pulizia accurata. </p><p>Questa iniziativa non solo rappresenta un contributo fondamentale al ripristino delle normali condizioni di vita nei Comuni colpiti, ma sottolinea anche l\'impegno di Demeter nella gestione responsabile dei rifiuti e nell\'assistenza alle comunità locali in situazioni di emergenza. Demeter si conferma dunque non solo come un\'azienda leader nel settore della raccolta rifiuti, ma anche come un partner affidabile e solidale nei confronti delle comunità in cui opera. L\'impegno verso la sostenibilità e la responsabilità sociale è un elemento fondamentale della filosofia aziendale, che si traduce concretamente in azioni tempestive e efficaci in momenti di difficoltà come quello attuale. </p><p>Il team di Demeter ringrazia anche la popolazione per la collaborazione e la comprensione, ricordando l\'importanza di una gestione consapevole dei rifiuti per la salvaguardia dell\'ambiente e la promozione di una comunità più resiliente.</p>', 'Sono partiti lo scorso fine settimana gli operatori che aiuteranno nelle attività di rimozione di detriti e rifiuti che in questi giorni vengono accatastati lungo le strade. Verranno raccolti elettrodomestici, mobili e altri materiali che hanno subito danno a causa dell\'acqua e di cui cittadini e aziende hanno bisogno di disfarsi al fine di poter liberare le strade. Per due settimane gli operatori si alterneranno alla guida di 2 mezzi con ragno allestiti con due cassoni scarrabili ciascuno.', '2024-01-10', 'alluvione.jpg'),
(2, 'Si dà inizio al nuovo progetto didattico di sensibilizzazione sui rifiuti \"Riciclo In Pratica\"', '<p>Demeter, sempre all\'avanguardia nell\'impegno per un ambiente sano e sostenibile, ha recentemente lanciato il suo ultimo progetto didattico mirato a sensibilizzare gli studenti sull\'importanza della corretta gestione dei rifiuti. Il progetto, intitolato \"Riciclo In Pratica\", è stato ufficialmente avviato la scorsa settimana con una serie di eventi educativi e interattivi presso le scuole primarie e secondarie di primo grado.  </p><p>L\'obiettivo principale di Riciclo In Pratica è fornire informazioni chiare e accessibili sulla corretta gestione dei rifiuti, incoraggiando pratiche sostenibili e responsabili applicabili fin da subito nella pratica di tutti i giorni, dimostrando come piccoli gesti facciano la differenza. Durante il lancio del progetto, il team di Demeter ha presentato un programma ricco di attività coinvolgenti, tra cui workshop interattivi e seminari informativi. Gli esperti del settore hanno condiviso conoscenze fondamentali sul riciclo, la raccolta differenziata e le ultime tecnologie utilizzate nel trattamento dei rifiuti. </p><p>Il direttore generale di Demeter ha dichiarato entusiasta: \"Riciclo In Pratica rappresenta un passo significativo nella nostra missione di promuovere una cultura più consapevole riguardo alla gestione dei rifiuti. Vogliamo coinvolgere attivamente la comunità, educando le persone a fare scelte più sostenibili nella loro vita quotidiana\". Il progetto prevede anche la distribuzione di materiale informativo, come opuscoli e guide pratiche. </p><p>Inoltre, è stata lanciata una campagna social media con l\'hashtag #RicicloInPratica per coinvolgere un pubblico più ampio e incoraggiare la condivisione di buone pratiche in materia di gestione dei rifiuti. La risposta iniziale alla campagna è stata estremamente positiva, con numerosi studenti, insegnanti e membri della comunità che hanno partecipato attivamente agli eventi di sensibilizzazione.</p><p> Demeter si impegna a mantenere viva l\'attenzione su questo importante tema nel lungo periodo, continuando a collaborare con le scuole e le organizzazioni locali per promuovere pratiche eco-sostenibili ed un cambiamento positivo nelle abitudini quotidiane della comunità che possano contribuire alla creazione di un ambiente più pulito e sano per le generazioni future.</p>', 'Demeter, pioniere nell\'ambiente sostenibile, ha lanciato \"Riciclo In Pratica\", un innovativo progetto didattico per sensibilizzare gli studenti sulla gestione responsabile dei rifiuti. Attraverso workshop, seminari e attività coinvolgenti, il programma mira a promuovere pratiche sostenibili nel quotidiano, dimostrando l\'effetto positivo di piccoli gesti. La campagna #RicicloInPratica ha già ricevuto una risposta entusiastica, evidenziando l\'impegno di Demeter nel promuovere una cultura consapevole e sostenibile nel lungo termine.', '2024-01-11', 'educazione.jpg'),
(3, 'EcoCalendari 2024', '<p>È con grande entusiasmo che annunciamo la consegna dei nuovi EcoCalendari per l\'anno 2024! In un impegno continuo per la sostenibilità e la gestione responsabile dei rifiuti, Demeter è lieta di mettere a disposizione dei cittadini i calendari delle raccolte per il prossimo anno. Le informazioni sulle raccolte del nuovo anno sono già consultabili sul nostro sito web su questa pagina . Inoltre, per rendere l\'accesso ancora più facile e immediato, abbiamo reso disponibile l\'intero calendario del 2024 tramite la nostra App ufficiale. </p><p>Ora, gli utenti possono pianificare in anticipo le proprie attività di smaltimento rifiuti, contribuendo così attivamente alla gestione efficiente delle risorse. Vorremmo sottolineare l\'importanza di controllare attentamente l\'EcoCalendario, specialmente in vista delle prossime festività. In alcuni Comuni, le raccolte subiranno delle variazioni per adattarsi al contesto festivo. Questo è un passo fondamentale per garantire una gestione ottimale dei rifiuti durante periodi in cui le abitudini quotidiane potrebbero subire cambiamenti. </p><p>Demeter invita i cittadini a partecipare attivamente al processo di gestione dei rifiuti, utilizzando le risorse messe a disposizione sul nostro sito e sull\'App. La collaborazione di tutti è essenziale per mantenere un ambiente pulito e sostenibile. </p><p>Continuate a seguire le nostre News per ulteriori aggiornamenti e informazioni rilevanti per la vostra comunità. Demeter si impegna a fornire servizi di qualità e a promuovere uno stile di vita ambientalmente responsabile. Grazie per la vostra partecipazione continua!</p>', 'Sono in consegna i nuovi calendari per l\'anno 2024! Le raccolte del nuovo anno sono già disponibili sul nostro sito, inoltre si può consultare l\'intero calendario del 2024 tramite la nostra App. Si ricorda ai cittadini di controllare attentamente l\'EcoCalendario, perché in occasione delle prossime festività, in alcuni Comuni le raccolte subiranno delle variazioni.', '2024-01-01', 'calendario.jpg'),
(4, 'Nuove normative per i bidoni della spazzatura - Conosciamole Insieme', 'Demeter, sempre attenta alle esigenze della comunità e al rispetto dell\'ambiente, desidera informare i cittadini sulle recenti normative concernenti i bidoni della spazzatura. Queste disposizioni sono state introdotte con l\'obiettivo di semplificare la raccolta differenziata e promuovere uno smaltimento responsabile dei rifiuti, in risposta alle sfide ambientali in aumento. Le nuove norme prevedono standardizzazioni nei colori dei bidoni per rendere più intuitiva la separazione dei rifiuti. È fondamentale che ogni cittadino sia a conoscenza di tali cambiamenti per contribuire con successo alla gestione sostenibile dei rifiuti. Ecco i colori standard dei bidoni e il loro significato:<ul>\n	<li>Blu: Carta e Cartone - Questo bidone è destinato alla raccolta di carta e cartone. Si prega di assicurarsi che gli imballaggi siano puliti e privi di residui alimentari.</li>\n	<li>Giallo: Plastica e Metalli - In questo bidone vanno plastica e metalli. Si raccomanda di schiacciare le bottiglie e di separare i metalli dagli altri materiali.</li>\n	<li>Verde: Vetro - Il bidone verde è destinato al vetro. Prima del conferimento, è importante rimuovere tappi e coperchi.</li>\n    <li>Marrone: Organico - Tutti i rifiuti organici, come scarti alimentari e residui vegetali, devono essere smaltiti nel bidone marrone.</li>\n    <li>Grigio: Rifiuti Indifferenziati - Nel caso in cui alcuni materiali non rientrino nelle categorie sopra menzionate, devono essere smaltiti nel bidone grigio.</li>\n     </ul> Demeter invita calorosamente tutti i cittadini a rispettare scrupolosamente queste nuove disposizioni per garantire una raccolta differenziata efficiente. L\'adozione di queste pratiche contribuirà in modo significativo alla riduzione dell\'impatto ambientale e alla promozione di uno stile di vita sostenibile. Confidiamo che la nostra comunità accoglierà positivamente queste nuove normative, dimostrando ancora una volta il suo impegno per un ambiente più pulito e salutare. Continuate a seguire le notizie su Demeter per rimanere aggiornati su iniziative e sviluppi futuri legati alla gestione dei rifiuti. Insieme, possiamo fare la differenza.', 'Demeter informa i cittadini sulle nuove normative per i bidoni della spazzatura, mirate a semplificare la raccolta differenziata e promuovere lo smaltimento responsabile dei rifiuti. I colori standard dei bidoni indicano le categorie specifiche, come carta, plastica, vetro, organico e rifiuti indifferenziati. L\'adesione a queste norme è fondamentale per una gestione sostenibile dei rifiuti. Demeter invita i cittadini a seguire scrupolosamente le nuove disposizioni per contribuire a un ambiente più pulito e sano.', '2024-01-09', 'bidoni.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `rifiuti`
--

CREATE TABLE IF NOT EXISTS `rifiuti` (
  `nome` varchar(255) NOT NULL,
  `fkSvuotB` varchar(255) NOT NULL,
  PRIMARY KEY (`nome`,`fkSvuotB`),
  KEY `fkSvuotB` (`fkSvuotB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `rifiuti`
--

INSERT INTO `rifiuti` (`nome`, `fkSvuotB`) VALUES
('barattolo di vetro', 'Vetro'),
('bicchieri di vetro', 'Vetro'),
('bottiglia di plastica', 'Plastica '),
('bottiglia di vetro', 'Vetro'),
('busta di carta', 'Carta'),
('carta alluminio', 'Secco'),
('carta oleata', 'Secco'),
('carta stagnola', 'Secco'),
('cartone della pizza pulito', 'Carta'),
('cartone della pizza sporco (solo le parti unte/sporche)', 'Umido'),
('cartucce d\'inchiostro', 'Appositi Contenitori'),
('cd', 'Secco '),
('contenitore di plastica', 'Plastica'),
('copertina di libro', 'Carta'),
('cotone idrofilo', 'Secco'),
('fazzoletti di carta usati', 'Umido'),
('fogli di carta stampati', 'Carta'),
('fondi di caffè', 'Umido '),
('guscio di uova', 'Umido'),
('indumenti usati', 'Appositi Contenitori'),
('lampadina bruciata', 'Secco'),
('medicinali scaduti', 'Appositi Contenitori'),
('pannolino usa e getta', 'Secco'),
('penna esausta', 'Secco'),
('pezzo di carta', 'Carta'),
('piatti di carta', 'Carta'),
('pile esauste', 'Appositi Contenitori'),
('rasoio usa e getta', 'Secco'),
('sacchetto di plastica', 'Plastica'),
('scarti alimentari', 'Umido'),
('scatola di cartone', 'Carta '),
('schiuma da barba vuota', 'Plastica'),
('scontrino', 'Secco'),
('spazzolino da denti esausto', 'Secco'),
('spugna da cucina', 'Secco'),
('tappo di plastica', 'Plastica'),
('tappo di sughero', 'Secco'),
('tovaglioli di carta usati', 'Umido'),
('tubo di dentifricio vuoto', 'Plastica'),
('vasetto di vetro', 'Vetro '),
('vecchio giornale', 'Carta');

-- --------------------------------------------------------

--
-- Struttura della tabella `segnalazioni`
--

CREATE TABLE IF NOT EXISTS `segnalazioni` (
  `idSegnalazione` int(11) NOT NULL AUTO_INCREMENT,
  `testo` text NOT NULL,
  `indirizzo` varchar(255) NOT NULL,
  `dataS` date NOT NULL,
  `inCarico` tinyint(1) NOT NULL DEFAULT 0,
  `fkUtenteS` int(11) NOT NULL,
  PRIMARY KEY (`idSegnalazione`),
  KEY `fkUtenteS` (`fkUtenteS`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `segnalazioni`
--

INSERT INTO `segnalazioni` (`idSegnalazione`, `testo`, `indirizzo`, `dataS`, `inCarico`, `fkUtenteS`) VALUES
(1, 'La presente segnalazione riguarda un presunto caso di smaltimento non corretto di rifiuti nella città di Padova. Il segnalante ha notato la presenza di rifiuti abbandonati, tra cui materiali plastici, carta e altri rifiuti non biodegradabili, in una zona dove il corretto smaltimento dei rifiuti dovrebbe essere garantito.La zona segnalata mostra segni evidenti di abbandono di rifiuti, con sacchi strappati, rifiuti sparsi e mancanza di contenitori adatti. Questo comportamento non solo compromette la pulizia e l\'aspetto dell\'area, ma potrebbe anche avere conseguenze ambientali negative, oltre a violare normative locali in materia di smaltimento dei rifiuti.', 'via Margherita Hack 25, Padova', '2024-01-24', 0, 4),
(2, 'Presunte violazioni delle norme ambientali riguardo allo smaltimento dei rifiuti industriali presso un impianto situato all’indirizzo Via Dante 58 a Maserà di Padova. Ho osservato comportamenti sospetti che indicano possibili pratiche non conformi alla legislazione vigente in materia ambientale. L\'area circostante l\'impianto industriale presenta segni di smaltimento inappropriato di rifiuti, con la presenza di sostanze chimiche visibili e rifiuti industriali non trattati. Tale situazione solleva preoccupazioni per la potenziale contaminazione ambientale e la mancata aderenza alle procedure di gestione dei rifiuti pericolosi.', 'via Dante 58, Maserà di Padova', '2024-01-15', 0, 7),
(3, 'Incontrollato abbandono di rifiuti nella città di Mestrino: ho notato la presenza di rifiuti vari, inclusi sacchetti di plastica, cartoni e altro, abbandonati lungo i marciapiedi e in prossimità di contenitori per la raccolta differenziata.', 'Via Albert Camus 99, Mestrino', '2024-01-13', 1, 2),
(4, 'Possibile contaminazione ambientale che richiede un\'attenta bonifica presso Arquà Petrarca .Il segnalante ha notato segni evidenti di presenza di sostanze nocive nel suolo, con potenziali rischi per la salute umana e l\'ecosistema circostante.', 'Via Antonio Vivaldi 2, Arquà Petrarca', '2024-01-05', 0, 8);

-- --------------------------------------------------------

--
-- Struttura della tabella `svuotamenti`
--

CREATE TABLE IF NOT EXISTS `svuotamenti` (
  `bidone` varchar(255) NOT NULL,
  `giorno` tinyint(4) NOT NULL,
  `intervallo` tinyint(4) NOT NULL,
  `giornoRif` date NOT NULL,
  PRIMARY KEY (`bidone`,`giorno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `svuotamenti`
--

INSERT INTO `svuotamenti` (`bidone`, `giorno`, `intervallo`, `giornoRif`) VALUES
('Appositi Contenitori', 2, 1, '2024-01-02'),
('Carta', 4, 2, '2023-12-07'),
('Plastica', 4, 2, '2023-12-14'),
('Secco', 5, 2, '2023-12-01'),
('Umido', 1, 1, '2023-12-04'),
('Umido', 5, 1, '2023-12-01'),
('Vetro', 4, 4, '2023-12-14');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE IF NOT EXISTS `utenti` (
  `idUtente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`idUtente`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`idUtente`, `nome`, `cognome`, `email`, `username`, `password`, `admin`) VALUES
(1, 'Olivia', 'Benson', 'obenson@demeter.com', 'admin', '$2y$10$AOUDqzrtO0w6skGAmCLt3esoQxfRiSVRbItaNjdErWGoc5PqZKNCm', 1),
(2, 'Lorelai', 'Gilmore', 'lorelai.gilmore@gmail.com', 'lgilmore', '$2y$10$9r8REZQWZqOvzPIhOl1ZSOnS3pOi6fypBx6WXdFAEavO35EcsShHS', 0),
(3, 'Michele', 'Liguori', 'liguorim@gmail.com', 'user', '$2y$10$dwUE22FJbcxjK/n1C2E.QuM5SMpm2aSCAtaEypnJwGZqu44HyGpS.', 0),
(4, 'Sheldon', 'Cooper', 'scooper@caltech.com', 'scooper', '$2y$10$R5Lb5IMhbhGt/N0qDCTbyenDVP7M6NgGIik3FXcSNjnPP3C/ghvI6', 0),
(7, 'Mitchell', 'Pritchett', 'mprichett@hotmail.com', 'mprichett', '$2y$10$I23ySqeCxBUZFnPJfL3GauPQR5KfhBgUUf2/VQkkDnM3CAZipZzmO', 0),
(8, 'Penelope', 'Garcia', 'garcia@bau.com', 'garciap', '$2y$10$0w5eJITUCzL/f85hxZHxsuw5WFDgkfe4H1a6e.Gopfw.PN/3yVpHC', 0);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `rifiuti`
--
ALTER TABLE `rifiuti`
  ADD CONSTRAINT `rifiuti_ibfk_1` FOREIGN KEY (`fkSvuotB`) REFERENCES `svuotamenti` (`bidone`);

--
-- Limiti per la tabella `segnalazioni`
--
ALTER TABLE `segnalazioni`
  ADD CONSTRAINT `segnalazioni_ibfk_1` FOREIGN KEY (`fkUtenteS`) REFERENCES `utenti` (`idUtente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
