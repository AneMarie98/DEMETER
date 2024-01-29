function cleanInput(value) {
    value = value.trim();   //rimuove gli spazi bianchi
    value = value.replace(/<(?!p|ul|li|\/p|\/ul|\/li)[^>]+>/g, ''); //rimuove tutti i tag html tranne <p>, <ul> e <li>
    value = value.replace(/&/g, '&amp;')
                 .replace(/</g, '&lt;')
                 .replace(/>/g, '&gt;')
                 .replace(/"/g, '&quot;')
                 .replace(/'/g, '&#039;'); //rimuove i caratteri speciali
    return value;
}


/**
 * aggiorna la segnalazione con l'inCarico specificato
 */
function updateSegnalazione(id, isChecked) {
    window.location.href = "updateSegnalazione.php?id=" + id + "&inCarico=" + isChecked;
}

function assignDay(num) {
    let dayofweek = "";
    switch (num) {
        case '0':
            dayofweek = "domenica";
            break;
        case '1':
            dayofweek = "lunedì";
            break;
        case '2':
            dayofweek = "martedì";
            break;
        case '3':
            dayofweek = "mercoledì";
            break;
        case '4':
            dayofweek = "giovedì";
            break;
        case '5':
            dayofweek = "venerdì";
            break;
        case '6':
            dayofweek = "sabato";
            break;
        default:
            dayofweek = "";
            break;
    }
    return dayofweek;
}


/**
 * Ricerca da SearchBar in DoveLoButto e visualizza risultati 
*/
function searchResults() {
    document.getElementById('searchButton').addEventListener('click', function() {
        var searchInput = document.getElementById('searchInput').value;

        try {
            fetch('functions/search.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'rifiuto=' + encodeURIComponent(searchInput),
            })
            .then(response => response.json())
            .then(data => {
                var results = document.getElementById('searchResults');
                results.innerHTML = '';
                  
                if (data.length > 0) {
                   
                    data.forEach(function(item) {
                        var dlElement = document.createElement('dl');
                        var rifiutodt = document.createElement('dt');
                        rifiutodt.textContent = "Rifiuto: ";
                        var rifiutodd = document.createElement('dd');
                        rifiutodd.textContent = item.nomeRifiuto;
                        dlElement.appendChild(rifiutodt);
                        dlElement.appendChild(rifiutodd);
                        var bidonedt = document.createElement('dt');
                        bidonedt.textContent = "Bidone: ";
                        var bidonedd = document.createElement('dd');
                        bidonedd.textContent = item.bidone;
                        dlElement.appendChild(bidonedt);
                        dlElement.appendChild(bidonedd);
                        results.appendChild(dlElement);
                    });
                  
                   
                } else {
                    results.appendChild(document.createTextNode('Nessun risultato trovato'));
                }
            })
            .catch(error => {

                var  results = document.getElementById('searchResults');
                results.appendChild(document.createTextNode('Nessun risultato trovato'));

            });
        } catch (error) {
            var  results = document.getElementById('searchResults');
                results.appendChild(document.createTextNode('Nessun risultato trovato'));
        }
    });
}


document.addEventListener('DOMContentLoaded', function() {
    searchResults();
});
