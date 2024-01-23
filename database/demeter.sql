-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Gen 23, 2024 alle 17:33
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demeter`
--
CREATE DATABASE IF NOT EXISTS `demeter` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `demeter`;

-- --------------------------------------------------------

--
-- Struttura della tabella `notizie`
--

CREATE TABLE `notizie` (
  `idNotizia` int(11) NOT NULL,
  `titolo` varchar(255) NOT NULL,
  `articolo` text NOT NULL,
  `descrizione` text NOT NULL,
  `dataN` date NOT NULL,
  `urlImg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `notizie`
--

INSERT INTO `notizie` (`idNotizia`, `titolo`, `articolo`, `descrizione`, `dataN`, `urlImg`) VALUES
(1, 'Emergenza alluvione - Demeter invia uomini e mezzi per lo sgombero e la pulizia nei Comuni alluvionati', 'Nell\'affrontare l\'emergenza alluvione che ha colpito diversi Comuni della nostra regione, l\'azienda Demeter dimostra ancora una volta il suo impegno sociale e ambientale. Nel corso del fine settimana appena trascorso, un contingente di operatori altamente specializzati è stato inviato nei luoghi più colpiti per coordinare e supportare le attività di rimozione di detriti e rifiuti causati dall\'alluvione. L\'obiettivo principale di questa missione è la raccolta e lo smaltimento di elettrodomestici, mobili e altri materiali danneggiati dall\'acqua. La situazione attuale ha generato una quantità significativa di rifiuti che occupano le strade, rendendo necessario un intervento immediato per ripristinare la normalità nei Comuni interessati. Gli operatori di Demeter, altamente addestrati e dotati delle attrezzature più moderne, si stanno alternando nella guida di due mezzi specializzati con ragno, ognuno equipaggiato con due cassoni scarrabili. Questi veicoli sono progettati per affrontare terreni difficili e condizioni ambientali avverse, garantendo un intervento efficace e sicuro. Il piano di intervento prevede un impegno costante per le prossime due settimane, durante le quali gli operatori di Demeter lavoreranno senza sosta per ripulire le strade e liberare la viabilità. La presenza di mezzi con ragno permetterà di accedere a zone altrimenti difficilmente raggiungibili, assicurando una copertura completa e una pulizia accurata. Questa iniziativa non solo rappresenta un contributo fondamentale al ripristino delle normali condizioni di vita nei Comuni colpiti, ma sottolinea anche l\'impegno di Demeter nella gestione responsabile dei rifiuti e nell\'assistenza alle comunità locali in situazioni di emergenza. Demeter si conferma dunque non solo come un\'azienda leader nel settore della raccolta rifiuti, ma anche come un partner affidabile e solidale nei confronti delle comunità in cui opera. L\'impegno verso la sostenibilità e la responsabilità sociale è un elemento fondamentale della filosofia aziendale, che si traduce concretamente in azioni tempestive e efficaci in momenti di difficoltà come quello attuale. Il team di Demeter ringrazia anche la popolazione per la collaborazione e la comprensione, ricordando l\'importanza di una gestione consapevole dei rifiuti per la salvaguardia dell\'ambiente e la promozione di una comunità più resiliente.', 'Sono partiti lo scorso fine settimana gli operatori che aiuteranno nelle attività di rimozione di detriti e rifiuti che in questi giorni vengono accatastati lungo le strade. Verranno raccolti elettrodomestici, mobili e altri materiali che hanno subito danno a causa dell\'acqua e di cui cittadini e aziende hanno bisogno di disfarsi al fine di poter liberare le strade. Per due settimane gli operatori si alterneranno alla guida di 2 mezzi con ragno allestiti con due cassoni scarrabili ciascuno.', '2024-01-10', 'alluvione.jpg'),
(2, 'Si dà inizio al nuovo progetto didattico di sensibilizzazione sui rifiuti \"Riciclo In Pratica\"', 'Demeter, sempre all\'avanguardia nell\'impegno per un ambiente sano e sostenibile, ha recentemente lanciato il suo ultimo progetto didattico mirato a sensibilizzare gli studenti sull\'importanza della corretta gestione dei rifiuti. Il progetto, intitolato \"Riciclo In Pratica\", è stato ufficialmente avviato la scorsa settimana con una serie di eventi educativi e interattivi presso le scuole primarie e secondarie di primo grado. L\'obiettivo principale di Riciclo In Pratica è fornire informazioni chiare e accessibili sulla corretta gestione dei rifiuti, incoraggiando pratiche sostenibili e responsabili applicabili fin da subito nella pratica di tutti i giorni, dimostrando come piccoli gesti facciano la differenza. Durante il lancio del progetto, il team di Demeter ha presentato un programma ricco di attività coinvolgenti, tra cui workshop interattivi e seminari informativi. Gli esperti del settore hanno condiviso conoscenze fondamentali sul riciclo, la raccolta differenziata e le ultime tecnologie utilizzate nel trattamento dei rifiuti. Il direttore generale di Demeter ha dichiarato entusiasta: \"Riciclo In Pratica rappresenta un passo significativo nella nostra missione di promuovere una cultura più consapevole riguardo alla gestione dei rifiuti. Vogliamo coinvolgere attivamente la comunità, educando le persone a fare scelte più sostenibili nella loro vita quotidiana\". Il progetto prevede anche la distribuzione di materiale informativo, come opuscoli e guide pratiche. Inoltre, è stata lanciata una campagna social media con l\'hashtag #RicicloInPratica per coinvolgere un pubblico più ampio e incoraggiare la condivisione di buone pratiche in materia di gestione dei rifiuti. La risposta iniziale alla campagna è stata estremamente positiva, con numerosi studenti, insegnanti e membri della comunità che hanno partecipato attivamente agli eventi di sensibilizzazione. Demeter si impegna a mantenere viva l\'attenzione su questo importante tema nel lungo periodo, continuando a collaborare con le scuole e le organizzazioni locali per promuovere pratiche eco-sostenibili ed un cambiamento positivo nelle abitudini quotidiane della comunità che possano contribuire alla creazione di un ambiente più pulito e sano per le generazioni future.', 'Demeter, pioniere nell\'ambiente sostenibile, ha lanciato \"Riciclo In Pratica\", un innovativo progetto didattico per sensibilizzare gli studenti sulla gestione responsabile dei rifiuti. Attraverso workshop, seminari e attività coinvolgenti, il programma mira a promuovere pratiche sostenibili nel quotidiano, dimostrando l\'effetto positivo di piccoli gesti. La campagna #RicicloInPratica ha già ricevuto una risposta entusiastica, evidenziando l\'impegno di Demeter nel promuovere una cultura consapevole e sostenibile nel lungo termine.', '2024-01-11', 'educazione.jpg'),
(3, 'EcoCalendari 2024', 'È con grande entusiasmo che annunciamo la consegna dei nuovi EcoCalendari per l\'anno 2024! In un impegno continuo per la sostenibilità e la gestione responsabile dei rifiuti, Demeter è lieta di mettere a disposizione dei cittadini i calendari delle raccolte per il prossimo anno. Le informazioni sulle raccolte del nuovo anno sono già consultabili sul nostro sito web su questa pagina . Inoltre, per rendere l\'accesso ancora più facile e immediato, abbiamo reso disponibile l\'intero calendario del 2024 tramite la nostra App ufficiale. Ora, gli utenti possono pianificare in anticipo le proprie attività di smaltimento rifiuti, contribuendo così attivamente alla gestione efficiente delle risorse. Vorremmo sottolineare l\'importanza di controllare attentamente l\'EcoCalendario, specialmente in vista delle prossime festività. In alcuni Comuni, le raccolte subiranno delle variazioni per adattarsi al contesto festivo. Questo è un passo fondamentale per garantire una gestione ottimale dei rifiuti durante periodi in cui le abitudini quotidiane potrebbero subire cambiamenti. Demeter invita i cittadini a partecipare attivamente al processo di gestione dei rifiuti, utilizzando le risorse messe a disposizione sul nostro sito e sull\'App. La collaborazione di tutti è essenziale per mantenere un ambiente pulito e sostenibile. Continuate a seguire le nostre News per ulteriori aggiornamenti e informazioni rilevanti per la vostra comunità. Demeter si impegna a fornire servizi di qualità e a promuovere uno stile di vita ambientalmente responsabile. Grazie per la vostra partecipazione continua!', 'Sono in consegna i nuovi calendari per l\'anno 2024! Le raccolte del nuovo anno sono già disponibili sul nostro sito, inoltre si può consultare l\'intero calendario del 2024 tramite la nostra App. Si ricorda ai cittadini di controllare attentamente l\'EcoCalendario, perché in occasione delle prossime festività, in alcuni Comuni le raccolte subiranno delle variazioni.', '2024-01-01', 'calendario.jpg'),
(4, 'Nuove normative per i bidoni della spazzatura - Conosciamole Insieme', 'Demeter, sempre attenta alle esigenze della comunità e al rispetto dell\'ambiente, desidera informare i cittadini sulle recenti normative concernenti i bidoni della spazzatura. Queste disposizioni sono state introdotte con l\'obiettivo di semplificare la raccolta differenziata e promuovere uno smaltimento responsabile dei rifiuti, in risposta alle sfide ambientali in aumento. Le nuove norme prevedono standardizzazioni nei colori dei bidoni per rendere più intuitiva la separazione dei rifiuti. È fondamentale che ogni cittadino sia a conoscenza di tali cambiamenti per contribuire con successo alla gestione sostenibile dei rifiuti. Ecco i colori standard dei bidoni e il loro significato:<ul> <br>\r\n	<li>Blu: Carta e Cartone - Questo bidone è destinato alla raccolta di carta e cartone. Si prega di assicurarsi che gli imballaggi siano puliti e privi di residui alimentari.</li>\r\n	<li>Giallo: Plastica e Metalli - In questo bidone vanno plastica e metalli. Si raccomanda di schiacciare le bottiglie e di separare i metalli dagli altri materiali.</li>\r\n	<li>Verde: Vetro - Il bidone verde è destinato al vetro. Prima del conferimento, è importante rimuovere tappi e coperchi.</li>\r\n    <li>Marrone: Organico - Tutti i rifiuti organici, come scarti alimentari e residui vegetali, devono essere smaltiti nel bidone marrone.</li>\r\n    <li>Grigio: Rifiuti Indifferenziati - Nel caso in cui alcuni materiali non rientrino nelle categorie sopra menzionate, devono essere smaltiti nel bidone grigio.</li>\r\n     </ul><br> Demeter invita calorosamente tutti i cittadini a rispettare scrupolosamente queste nuove disposizioni per garantire una raccolta differenziata efficiente. L\'adozione di queste pratiche contribuirà in modo significativo alla riduzione dell\'impatto ambientale e alla promozione di uno stile di vita sostenibile. Confidiamo che la nostra comunità accoglierà positivamente queste nuove normative, dimostrando ancora una volta il suo impegno per un ambiente più pulito e salutare. Continuate a seguire le notizie su Demeter per rimanere aggiornati su iniziative e sviluppi futuri legati alla gestione dei rifiuti. Insieme, possiamo fare la differenza.', 'Demeter informa i cittadini sulle nuove normative per i bidoni della spazzatura, mirate a semplificare la raccolta differenziata e promuovere lo smaltimento responsabile dei rifiuti. I colori standard dei bidoni indicano le categorie specifiche, come carta, plastica, vetro, organico e rifiuti indifferenziati. L\'adesione a queste norme è fondamentale per una gestione sostenibile dei rifiuti. Demeter invita i cittadini a seguire scrupolosamente le nuove disposizioni per contribuire a un ambiente più pulito e sano.', '2024-01-09', 'bidoni.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `rifiuti`
--

CREATE TABLE `rifiuti` (
  `nome` varchar(255) NOT NULL,
  `fkSvuotB` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `rifiuti`
--

INSERT INTO `rifiuti` (`nome`, `fkSvuotB`) VALUES
('barattolo di vetro', 'Vetro'),
('bottiglia di plastica', 'Plastica '),
('bottiglia di vetro', 'Vetro'),
('busta di carta', 'Carta'),
('cd', 'Secco '),
('contenitore di plastica', 'Plastica'),
('fondi di caffè', 'Umido '),
('guscio di uova', 'Umido'),
('pezzo di carta', 'Carta'),
('sacchetto di plastica', 'Plastica'),
('scarti alimentari', 'Umido'),
('scatola della pizza', 'Carta'),
('scatola di cartone', 'Carta '),
('vasetto di vetro', 'Vetro ');

-- --------------------------------------------------------

--
-- Struttura della tabella `segnalazioni`
--

CREATE TABLE `segnalazioni` (
  `idSegnalazione` int(11) NOT NULL,
  `testo` text NOT NULL,
  `indirizzo` varchar(255) NOT NULL,
  `dataS` date NOT NULL,
  `inCarico` tinyint(1) NOT NULL,
  `fkUtenteS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `segnalazioni`
--

INSERT INTO `segnalazioni` (`idSegnalazione`, `testo`, `indirizzo`, `dataS`, `inCarico`, `fkUtenteS`) VALUES
(1, 'La presente segnalazione riguarda un presunto caso di smaltimento non corretto di rifiuti nella città di Padova. Il segnalante ha notato la presenza di rifiuti abbandonati, tra cui materiali plastici, carta e altri rifiuti non biodegradabili, in una zona dove il corretto smaltimento dei rifiuti dovrebbe essere garantito.La zona segnalata mostra segni evidenti di abbandono di rifiuti, con sacchi strappati, rifiuti sparsi e mancanza di contenitori adatti. Questo comportamento non solo compromette la pulizia e l\'aspetto dell\'area, ma potrebbe anche avere conseguenze ambientali negative, oltre a violare normative locali in materia di smaltimento dei rifiuti.', 'via Margherita Hack 25,Padova', '2024-01-24', 0, 4),
(2, 'Presunte violazioni delle norme ambientali riguardo allo smaltimento dei rifiuti industriali presso un impianto situato all’indirizzo Via Dante 58 a Maserà di Padova. Ho osservato comportamenti sospetti che indicano possibili pratiche non conformi alla legislazione vigente in materia ambientale. L\'area circostante l\'impianto industriale presenta segni di smaltimento inappropriato di rifiuti, con la presenza di sostanze chimiche visibili e rifiuti industriali non trattati. Tale situazione solleva preoccupazioni per la potenziale contaminazione ambientale e la mancata aderenza alle procedure di gestione dei rifiuti pericolosi.', 'via Dante 58, Maserà di Padova', '2024-01-15', 0, 7),
(3, 'Incontrollato abbandono di rifiuti nella città di Mestrino: ho notato la presenza di rifiuti vari, inclusi sacchetti di plastica, cartoni e altro, abbandonati lungo i marciapiedi e in prossimità di contenitori per la raccolta differenziata.', 'Via Albert Camus 99, Mestrino', '2024-01-13', 1, 2),
(4, 'Possibile contaminazione ambientale che richiede un\'attenta bonifica presso Arquà Petrarca .Il segnalante ha notato segni evidenti di presenza di sostanze nocive nel suolo, con potenziali rischi per la salute umana e l\'ecosistema circostante.', 'Via Antonio Vivaldi 2, Arquà Petrarca', '2024-01-05', 0, 8);

-- --------------------------------------------------------

--
-- Struttura della tabella `svuotamenti`
--

CREATE TABLE `svuotamenti` (
  `bidone` varchar(255) NOT NULL,
  `giorno` tinyint(4) NOT NULL,
  `intervallo` tinyint(4) NOT NULL,
  `giornoRif` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `svuotamenti`
--

INSERT INTO `svuotamenti` (`bidone`, `giorno`, `intervallo`, `giornoRif`) VALUES
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

CREATE TABLE `utenti` (
  `idUtente` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`idUtente`, `nome`, `cognome`, `email`, `username`, `password`, `admin`) VALUES
(1, 'Olivia', 'Benson', 'obenson@demeter.com', 'admin', 'admin', 1),
(2, 'Lorelai', 'Gilmore', 'lobelia.gilmore@gmail.com', 'lgilmore', 'lgilmore', 0),
(3, 'Michele', 'Liguori', 'liguorim@gmail.com', 'user', 'user', 0),
(4, 'Sheldon', 'Cooper', 'scooper@caltech.com', 'scooper', 'scooper', 0),
(5, 'Henrietta', 'Lang', 'lang.h@hotmail.com', 'langhenrietta', 'langhenrietta', 0),
(6, 'Olivia', 'Pope', 'oliviapope@whitehouse.gov', 'olivia.pope', 'olivia.pope', 0),
(7, 'Mitchell', 'Pritchett', 'mprichett@hotmail.com', 'mprichett', 'mprichett', 0),
(8, 'Penelope', 'Garcia', 'garcia@bau.com', 'garciap', 'garciap', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `notizie`
--
ALTER TABLE `notizie`
  ADD PRIMARY KEY (`idNotizia`);

--
-- Indici per le tabelle `rifiuti`
--
ALTER TABLE `rifiuti`
  ADD PRIMARY KEY (`nome`,`fkSvuotB`),
  ADD KEY `fkSvuotB` (`fkSvuotB`);

--
-- Indici per le tabelle `segnalazioni`
--
ALTER TABLE `segnalazioni`
  ADD PRIMARY KEY (`idSegnalazione`),
  ADD KEY `fkUtenteS` (`fkUtenteS`);

--
-- Indici per le tabelle `svuotamenti`
--
ALTER TABLE `svuotamenti`
  ADD PRIMARY KEY (`bidone`,`giorno`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`idUtente`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `notizie`
--
ALTER TABLE `notizie`
  MODIFY `idNotizia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `segnalazioni`
--
ALTER TABLE `segnalazioni`
  MODIFY `idSegnalazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `idUtente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
