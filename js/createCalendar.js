function createCalendar(){
    const td=new Date();
    const tda=new Date();
    document.getElementById("calMonth").innerHTML=getMY(td);
    document.getElementById("calMonth").dataset.yyyy=td.getFullYear();
    document.getElementById("calMonth").dataset.mm=(td.getMonth()+1);
    setCalArrows(getMY(new Date(tda.setMonth(tda.getMonth()-1))),getMY(new Date(tda.setMonth(tda.getMonth()+2))));
    let startingB=getStartingB(td.getFullYear(),td.getMonth());
    let daysinMonth=daysInMonth(td.getFullYear(),td.getMonth());
    for(let i=startingB;i<=daysinMonth+startingB-1;i++){
        document.getElementById("numd"+i).innerHTML=i-startingB+1;
        let accessDay=document.createElement("span");
        accessDay.className="accessDay";
        accessDay.setAttribute("aria-hidden","true");
        accessDay.innerHTML=" "+assignFullDay((td.getMonth()+1)+"/"+i+"/"+td.getFullYear());
        document.getElementById("numd"+i).appendChild(accessDay);
        setDataDisp("numd"+i,(td.getMonth()+1)+"/"+i+"/"+td.getFullYear());
        setLabel("numd"+i,(td.getMonth()+1)+"/"+i+"/"+td.getFullYear());
        if(i==td.getDate()){highlightToday("numd"+i);}
    }
    getSvuotPhp((td.getMonth()+1)+"/1/"+td.getFullYear(),startingB);
}

function getMY(d){
    const mesi=["Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre"];
    return mesi[d.getMonth()]+" "+d.getFullYear();
}

function setCalArrows(leftA,rightA){
    document.getElementById("monthLeft").setAttribute("aria-label","Vedi "+leftA);
    document.getElementById("monthRight").setAttribute("aria-label","Vedi "+rightA);
}

function daysInMonth(year,month){
    return new Date(year,month,0).getDate();
}

function getStartingB(year,month){
    let d=new Date(year,month,"01");
    let startingB=d.getDay();
    if(startingB==0){startingB+=7;}
    return startingB;
}

function changeMonth(index){
    let currentMonthDisp=document.getElementById("calMonth").dataset.mm;
    let currentYearDisp=document.getElementById("calMonth").dataset.yyyy;
    let dateDisp=new Date(currentMonthDisp+"/1/"+currentYearDisp);
    let newDateDisp = new Date(dateDisp.setMonth(dateDisp.getMonth()+index));
    let tda=new Date(newDateDisp);
    document.getElementById("calMonth").innerHTML=getMY(newDateDisp);
    document.getElementById("calMonth").dataset.yyyy=newDateDisp.getFullYear();
    document.getElementById("calMonth").dataset.mm=(newDateDisp.getMonth()+1);
    setCalArrows(getMY(new Date(tda.setMonth(tda.getMonth()-1))),getMY(new Date(tda.setMonth(tda.getMonth()+2))));
    updateCalendar(getStartingB(newDateDisp.getFullYear(),newDateDisp.getMonth()),daysInMonth(newDateDisp.getFullYear(),newDateDisp.getMonth()+1),(newDateDisp.getMonth()+1),newDateDisp.getFullYear());
    readAgain(index);
}

function updateCalendar(startingB,daysinMonth,newMonthDisp,newYearDisp){
    const td=new Date();
    for(let i=1;i<=startingB;i++){
        document.getElementById("numd"+i).innerHTML="";
        removeDataDisp("numd"+i);
        removeLabel("numd"+i);
    }
    for(let i=startingB;i<=daysinMonth+startingB-1;i++){
        document.getElementById("numd"+i).innerHTML=i-startingB+1;
        let accessDay=document.createElement("span");
        accessDay.className="accessDay";
        accessDay.setAttribute("aria-hidden","true");
        accessDay.innerHTML=" "+assignFullDay(newMonthDisp+"/"+(i-startingB+1)+"/"+newYearDisp);
        document.getElementById("numd"+i).appendChild(accessDay);
        setDataDisp("numd"+i,newMonthDisp+"/"+(i-startingB+1)+"/"+newYearDisp);
        setLabel("numd"+i,newMonthDisp+"/"+(i-startingB+1)+"/"+newYearDisp);
        if(i==td.getDate()){highlightToday("numd"+i);}
    }
    for(let i=daysinMonth+startingB;i<=42;i++){
        document.getElementById("numd"+i).innerHTML="";
        removeDataDisp("numd"+i);
        removeLabel("numd"+i);
    }
    limitCalendar(newMonthDisp+"/1/"+newYearDisp);
    getSvuotPhp(new Date(newMonthDisp+"/1/"+newYearDisp),startingB);
}

function limitCalendar(newDateDisp){
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

function setDataDisp(id,data){
    document.getElementById(id).dataset.datadisp=data;
}

function setLabel(id,data){
    day=assignDay(data);
    document.getElementById(id).setAttribute("aria-labelledby",day+" "+id+" calMonth");
}

function assignDay(data){
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

function assignFullDay(data){
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

function removeDataDisp(id){
    document.getElementById(id).removeAttribute("data-datadisp");
}

function removeLabel(id){
    document.getElementById(id).removeAttribute("aria-labelledby");
}

function highlightToday(id){
    const td=new Date();
    let dayRef=new Date(document.getElementById(id).dataset.datadisp);
    if((td.getFullYear()==dayRef.getFullYear()) && (td.getMonth()==dayRef.getMonth()) && (td.getDate()==dayRef.getDate())){
        document.getElementById(id).parentElement.className="calElemToday";
        document.getElementById("navigationHelpCal").href="#"+id;
    }
    else{
        document.getElementById(id).parentElement.className="calElem";
        document.getElementById("navigationHelpCal").removeAttribute("href");
    }
}

function getSvuot(monthDisp,startingB,svuot){
    const td=new Date();
    let d=new Date(monthDisp);
    const svuotdays=new Array();
    for(let i=0;i<svuot.length;i++){
        svuotdays[i]=new Array();
        svuotdays[i][0]=svuot[i][0];
        let rifDate=new Date(svuot[i][3]);
        let j=1;
        do{
            if((rifDate.getFullYear()==d.getFullYear()) && (rifDate.getMonth()==d.getMonth())){
                svuotdays[i][j]=(rifDate.getMonth()+1)+"/"+rifDate.getDate()+"/"+rifDate.getFullYear();
                j++;
            }
            rifDate=new Date(rifDate.setDate(rifDate.getDate()+(svuot[i][2]*7)));
            
        }while(!((rifDate.getFullYear()==(td.getFullYear()+1)) && (rifDate.getMonth()>1)));
    }
    deleteSvuotBadges();
    insertSvuot(svuotdays,startingB);
}

function deleteSvuotBadges(){
    for(let i=1;i<=42;i++){
        let parentBox=document.getElementById("numd"+i).parentElement;
        let childrenCount=parentBox.childElementCount;
        for(let j=1;j<childrenCount;j++){
            parentBox.removeChild(parentBox.lastChild);
        }
    }
}

function insertSvuot(svuotdays,startingB){
    for(let i=0;i<svuotdays.length;i++){
        let svuotId=getSvuotElemId(svuotdays[i][0]);
        for(let j=1;j<svuotdays[i].length;j++){
            const d=new Date(svuotdays[i][j]);
            let parentBox=document.getElementById("numd"+(d.getDate()+startingB-1)).parentElement;
            let svuotBadge=document.createElement("div");
            svuotBadge.innerHTML=svuotId;
            svuotBadge.classList.add("bidsvuot");
            svuotBadge.classList.add("bid"+svuotId);
            svuotBadge.setAttribute("aria-labelledby","legend"+svuotId);
            parentBox.appendChild(svuotBadge);
        }
    }
}

function getSvuotElemId(svuotElem){
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

function getSvuotPhp(monthDisp,startingB){
    fetch("functions/svuotCalendar.php")
        .then((response) => {
            if(!response.ok){
                throw new Error("Something went wrong!");
            }
            return response.json(); // Parse the JSON data.
        })
        .then((data) => {
             // This is where you handle what to do with the response.
             getSvuot(monthDisp,startingB,data);
        })
        .catch((error) => {
             // This is where you handle errors.
        });
}

function readAgain(index){
    if(index==1){
        document.getElementById("monthRight").blur();
        document.getElementById("monthRight").focus();
    }
    else{
        document.getElementById("monthLeft").blur();
        document.getElementById("monthLeft").focus();
    }
}