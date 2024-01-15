function cleanInput(value) {
    value = value.trim();   //rimuove gli spazi bianchi
    value = value.replace(/<[^>]+>/g, ''); //rimuove tutti i tag html
    value = value.replace(/&/g, '&amp;')
                 .replace(/</g, '&lt;')
                 .replace(/>/g, '&gt;')
                 .replace(/"/g, '&quot;')
                 .replace(/'/g, '&#039;'); //rimuove i caratteri speciali
    return value;
}

function updateSegnalazione(id, isChecked) {
    window.location.href = "updateSegnalazione.php?id=" + id + "&inCarico=" + isChecked;
}
