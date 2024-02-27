function createCalendar(){ //Caricando la pagina crea il calendario
    const td=new Date();
    const tda=new Date();
    const firstofmonth=new Date(tda.getFullYear(),tda.getMonth(),"01");
    document.getElementById("calMonth").innerHTML=getMY(td);
    document.getElementById("calMonth").dataset.yyyy=td.getFullYear();
    document.getElementById("calMonth").dataset.mm=(td.getMonth()+1);
    setCalArrows(getMY(new Date(firstofmonth.setMonth(firstofmonth.getMonth()-1))),getMY(new Date(firstofmonth.setMonth(firstofmonth.getMonth()+2))));
    let startingB=getStartingB(td.getFullYear(),td.getMonth());
    let daysinMonth=daysInMonth(td.getFullYear(),td.getMonth());
    for(let i=startingB;i<=daysinMonth+startingB-1;i++){ //Ciclo for per costruire i blocchi del mese in corso (non serve eliminare i blocchi superflui perché sono già vuoti di default)
        document.getElementById("numd"+i).innerHTML=i-startingB+1;
        let accessDay=document.createElement("span"); //Crea uno <span></span>
        accessDay.className="accessDay"; //Con classe accessDay
        accessDay.setAttribute("aria-hidden","true"); //Lo nasconde agli screen reader per evitare la lettura ridondante di informazioni
        accessDay.innerHTML=" "+assignFullDay((td.getMonth()+1)+"/"+(i-startingB+1)+"/"+td.getFullYear()); //Gli assegna il nome del giorno completo
        document.getElementById("numd"+i).appendChild(accessDay); //Lo aggiunge in coda al blocco
        setDataDisp("numd"+i,(td.getMonth()+1)+"/"+(i-startingB+1)+"/"+td.getFullYear());
        setLabel("numd"+i,(td.getMonth()+1)+"/"+(i-startingB+1)+"/"+td.getFullYear());
    }
    getSvuotPhp((td.getMonth()+1)+"/1/"+td.getFullYear(),startingB);
    highlightToday(); //Metti in risalto il blocco corrispondente al giorno corrente
}

function getMY(d){ //Restituisce mese (completo) e anno della data passata
    const mesi=["Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre"];
    return mesi[d.getMonth()]+" "+d.getFullYear();
}

function setCalArrows(leftA,rightA){ //Inserisce ai relativi bottoni di cambio mese la loro etichetta
    document.getElementById("monthLeft").innerHTML="Vedi "+leftA;
    document.getElementById("monthRight").innerHTML="Vedi "+rightA;
    document.getElementById("monthLeft").setAttribute("aria-label","Vedi "+leftA);
    document.getElementById("monthRight").setAttribute("aria-label","Vedi "+rightA);
}

function daysInMonth(year,month){ //Calcola quanti giorni ci sono nel mese selezionato
    return new Date(year,month+1,0).getDate();
}

function getStartingB(year,month){ //Dato mese e anno calcola con quale giorno della settimana inizia quel mese
    let d=new Date(year,month,"01");
    let startingB=d.getDay();
    if(startingB==0){startingB+=7;}
    return startingB;
}

function changeMonth(index){ //Cambia il mese visualizzato secondo un indice (-1 o 1)
    let currentMonthDisp=document.getElementById("calMonth").dataset.mm;
    let currentYearDisp=document.getElementById("calMonth").dataset.yyyy;
    let dateDisp=new Date(currentMonthDisp+"/1/"+currentYearDisp);
    let newDateDisp = new Date(dateDisp.setMonth(dateDisp.getMonth()+index));
    let tda=new Date(newDateDisp);
    document.getElementById("calMonth").innerHTML=getMY(newDateDisp); //Aggiorna il titolo del mese
    document.getElementById("calMonth").dataset.yyyy=newDateDisp.getFullYear();
    document.getElementById("calMonth").dataset.mm=(newDateDisp.getMonth()+1);
    setCalArrows(getMY(new Date(tda.setMonth(tda.getMonth()-1))),getMY(new Date(tda.setMonth(tda.getMonth()+2))));
    updateCalendar(getStartingB(newDateDisp.getFullYear(),newDateDisp.getMonth()),daysInMonth(newDateDisp.getFullYear(),newDateDisp.getMonth()),(newDateDisp.getMonth()+1),newDateDisp.getFullYear());
    //readAgain(index);
}

function updateCalendar(startingB,daysinMonth,newMonthDisp,newYearDisp){ //Aggiorna i blocchi del calendario
    const td=new Date();
    for(let i=1;i<=startingB;i++){ //Fino alla data di partenza del mese, elimina i blocchi
        document.getElementById("numd"+i).innerHTML="";
        removeDataDisp("numd"+i);
        removeLabel("numd"+i);
    }
    for(let i=startingB;i<=daysinMonth+startingB-1;i++){ //Inserisce quelli del mese selezionato come in createCalendar()
        document.getElementById("numd"+i).innerHTML=i-startingB+1;
        let accessDay=document.createElement("span");
        accessDay.className="accessDay";
        accessDay.setAttribute("aria-hidden","true");
        accessDay.innerHTML=" "+assignFullDay(newMonthDisp+"/"+(i-startingB+1)+"/"+newYearDisp);
        document.getElementById("numd"+i).appendChild(accessDay);
        setDataDisp("numd"+i,newMonthDisp+"/"+(i-startingB+1)+"/"+newYearDisp);
        setLabel("numd"+i,newMonthDisp+"/"+(i-startingB+1)+"/"+newYearDisp);
    }
    for(let i=daysinMonth+startingB;i<=42;i++){ //Tutti i blocchi oltre la data di fine mese vengono eliminati
        document.getElementById("numd"+i).innerHTML="";
        removeDataDisp("numd"+i);
        removeLabel("numd"+i);
    }
    limitCalendar(newMonthDisp+"/1/"+newYearDisp);
    getSvuotPhp(new Date(newMonthDisp+"/1/"+newYearDisp),startingB);
    highlightToday(); //Metti in risalto il blocco corrispondente al giorno corrente
}

function limitCalendar(newDateDisp){ //Se il mese mostrato è Dicembre dell'anno precedente a quello corrente o Gennaio dell'anno successivo, toglie la possibilità di andare indietro o avanti nel calendario
    let td=new Date();
    let d=new Date(newDateDisp);
    if(d.getFullYear()==(td.getFullYear()-1)){
        document.getElementById("monthLeft").removeAttribute("onclick");
        document.getElementById("monthLeft").className="calarrowhidden";
    }
    else if(d.getFullYear()==(td.getFullYear()+1)){
        document.getElementById("monthRight").removeAttribute("onclick");
        document.getElementById("monthRight").className="calarrowhidden";
    }
    else{
        document.getElementById("monthLeft").setAttribute("onclick","changeMonth(-1)");
        document.getElementById("monthLeft").className="calarrowshow";
        document.getElementById("monthRight").setAttribute("onclick","changeMonth(1)");
        document.getElementById("monthRight").className="calarrowshow";
    }
}

function setDataDisp(id,data){ //Ad ogni blocco viene assegnato un data-datadisp per ricavare meglio la data del blocco
    document.getElementById(id).dataset.datadisp=data;
}

function setLabel(id,data){ //Ad ogni blocco del calendario aggiunge un aria-labelledby, così da leggere il giorno ogni volta ("Lunedì 1 Gennaio 2024")
    day=assignDay(data);
    document.getElementById(id).setAttribute("aria-labelledby",day+" "+id+" calMonth");
}

function assignDay(data){ //Ritorna il giorno della settimana ("lun","mar",...) della data passata
    let d=new Date(data);
    let day=d.getDay();
    let dayofweek="";
    switch(day){
        case 0: dayofweek="dom";break;
        case 1: dayofweek="lun";break;
        case 2: dayofweek="mar";break;
        case 3: dayofweek="mer";break;
        case 4: dayofweek="gio";break;
        case 5: dayofweek="ven";break;
        case 6: dayofweek="sab";break;
        default: dayofweek="";break;
    }
    return dayofweek;
}

function assignFullDay(data){ //Ritorno il giorno della settimana completo della data passata
    let d=new Date(data);
    let day=d.getDay();
    let dayofweek="";
    switch(day){
        case 0: dayofweek="Domenica";break;
        case 1: dayofweek="Lunedì";break;
        case 2: dayofweek="Martedì";break;
        case 3: dayofweek="Mercoledì";break;
        case 4: dayofweek="Giovedì";break;
        case 5: dayofweek="Venerdì";break;
        case 6: dayofweek="Sabato";break;
        default: dayofweek="";break;
    }
    return dayofweek;
}

function removeDataDisp(id){ //Rimuove l'attributo data-datadisp dal blocco
    document.getElementById(id).removeAttribute("data-datadisp");
}

function removeLabel(id){ //Rimuove l'attributo aria-labelledby dal blocco
    document.getElementById(id).removeAttribute("aria-labelledby");
}

function highlightToday(){ //Al blocco passato corrispondente alla data corrente cambia la classe in modo da far risaltare maggiormente il giorno in questione
    const td=new Date();
    for(let i=1;i<=42;i++){
        let dayOfBlock=new Date(document.getElementById("numd"+i).dataset.datadisp);
        if((td.getFullYear()==dayOfBlock.getFullYear()) && (td.getMonth()==dayOfBlock.getMonth()) && (td.getDate()==dayOfBlock.getDate())){
            document.getElementById("numd"+i).parentElement.className="calElemToday";
            document.getElementById("navigationHelpCal").href="#numd"+i; //Aggiunge un link come ancora all'inizio del calendario in modo da navigarlo meglio
        }
        else{ //Se si cambia mese il blocco viene resettato
            document.getElementById("numd"+i).parentElement.className="calElem"; 
        }
    }
}

function getSvuot(monthDisp,startingB,svuot){ //Dato un mese, la sua data di partenza e l'array (delle date di riferimento) degli svuotamenti, calcola, nel mese, le date dei vari svuotamenti
    const td=new Date();
    let d=new Date(monthDisp);
    const svuotdays=new Array();
    for(let i=0;i<svuot.length;i++){ //Per ogni data di riferimento presente nel database
        svuotdays[i]=new Array();
        svuotdays[i][0]=svuot[i][0]; //Assegna il primo elemento dell'array i di svuot al primo elemento dell'array i di svuot days
        let rifDate=new Date(svuot[i][3]);
        let j=1;
        do{
            if((rifDate.getFullYear()==d.getFullYear()) && (rifDate.getMonth()==d.getMonth())){ //Se anno e mese della data di riferimento e quella controllata coincidono
                svuotdays[i][j]=(rifDate.getMonth()+1)+"/"+rifDate.getDate()+"/"+rifDate.getFullYear(); //La aggiunge all'array i di svuotdays
                j++;
            }
            rifDate=new Date(rifDate.setDate(rifDate.getDate()+(svuot[i][2]*7))); //Aggiunge i giorni tra uno svuotamento e l'altro alla data di riferimento
            
        }while(!((rifDate.getFullYear()==(td.getFullYear()+1)) && (rifDate.getMonth()>1))); //Finché l'anno o il mese della data di riferimento è diverso 
    }
    deleteSvuotBadges();
    insertSvuot(svuotdays,startingB);
}

function deleteSvuotBadges(){ //Per tutti i blocchi del calendario, elimina eventuali badge già presenti
    for(let i=1;i<=42;i++){
        let parentBox=document.getElementById("numd"+i).parentElement;
        let childrenCount=parentBox.childElementCount;
        for(let j=1;j<childrenCount;j++){ //Per tutti i figli di un blocco tranne il primo (la data)
            parentBox.removeChild(parentBox.lastChild);
        }
    }
}

function insertSvuot(svuotdays,startingB){ //Inserisce i badge per ogni data dell'array passato
    for(let i=0;i<svuotdays.length;i++){ //Per ogni diverso svuotamento
        let svuotId=getSvuotElemId(svuotdays[i][0]);
        for(let j=1;j<svuotdays[i].length;j++){ //Per ogni data di quel svuotamento
            const d=new Date(svuotdays[i][j]);
            let parentBox=document.getElementById("numd"+(d.getDate()+startingB-1)).parentElement;
            let svuotBadge=document.createElement("div"); //Crea un <div></div>
            svuotBadge.innerHTML=svuotId; //Gli assegna come valore l'id dello svuotamento
            svuotBadge.classList.add("bidsvuot"); //Aggiunge la classe bidsvuot e bid+svuotId ("bidU","bidS",...)
            svuotBadge.classList.add("bid"+svuotId);
            svuotBadge.setAttribute("aria-labelledby","legend"+svuotId); //Aggiunge un aria-labelledby per far leggere allo screen reader la parola e non solo una lettera
            svuotBadge.setAttribute("aria-hidden","true");
            parentBox.appendChild(svuotBadge); //Aggiunge in coda l'elemento creato al blocco
            let oldLabel=parentBox.firstChild.getAttribute("aria-labelledby");
            parentBox.firstChild.setAttribute("aria-labelledby",oldLabel+" legend"+svuotId)
        }
    }
}

function getSvuotElemId(svuotElem){ //Dato un bidone, ritorna l'id corrispondente
    let svuotId="";
    switch(svuotElem){
        case "Carta":svuotId="C";break;
        case "Plastica":svuotId="P";break;
        case "Vetro":svuotId="V";break;
        case "Umido":svuotId="U";break;
        case "Secco":svuotId="S";break;
        default: svuotId="";break;
    }
    return svuotId;
}

function getSvuotPhp(monthDisp,startingB){ //Tramite fetch prende le informazioni sugli svuotamenti da functions/svuotCalendar.php
    fetch("functions/svuotCalendar.php")
        .then((response) => {
            if(!response.ok){
                throw new Error("Something went wrong!");
            }
            return response.json(); //Analizza i dati
        })
        .then((data) => {
             //Cosa fa con la risposta
             getSvuot(monthDisp,startingB,data);
        })
        .catch((error) => {
             // Errori
        });
}

function showToday(){
    const td=new Date();
    let i=0;
    refMonth=document.getElementById("calMonth");
    if(refMonth.dataset.yyyy<td.getFullYear()) i=1;
    if(refMonth.dataset.yyyy>td.getFullYear()) i=-1;
    if(refMonth.dataset.yyyy==td.getFullYear()){
        if(refMonth.dataset.mm<(td.getMonth()+1)) i=1;
        if(refMonth.dataset.mm>(td.getMonth()+1)) i=-1;
    }
    console.log(i);
    while(refMonth.dataset.mm!=(td.getMonth()+1)){
        changeMonth(i);
    }
}