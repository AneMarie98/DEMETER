/*
* Questo script si occupa di mostrare un messaggio di conferma all'utente prima di eliminare una segnalazione
*/

document.addEventListener('DOMContentLoaded', function() {

    var link = document.getElementById('deleteSegnalazione');

    link.addEventListener('click', function(event) {
    
      event.preventDefault();
      var linkHref = link.getAttribute('href');
      var userConfirmed = confirm('Sei sicuro di voler eliminare la segnalazione?');
     
      if (userConfirmed) {
        window.location.href = linkHref;
      } else {
        // Do nothing!
      }
    });
  });