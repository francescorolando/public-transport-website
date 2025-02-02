<?php
session_start();
include "../../utilities/funzioni.php";

// l'utente deve essere loggato                                                    
loginFALSE("Location: ../../index.php");

// l'utente deve essere admin                                                  
adminFALSE("Location: ../../index.php");
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN</title>
    <meta name="author" content="Rolando Francesco" />
    <meta name="description" content="" />

    <!-- FAVICON -->
    <link rel="icon" type="image/x-icon" href="./../../src/immagini/favicon.ico" />

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />

    <!-- CSS -->
    <link href="./../../src/css/style.css" rel="stylesheet" type="text/css" />
    <link href="./../../src/css/style_secondary_pages.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <!-- CONTENUTO PRINCIPALE -->

    <div class="container col">

        <div class="row justify-content-center mb-3">
            <div class="col col-md-5">
                <h2 class="colore-principale-testo titolo-sp">Sezione amministratore</h2>
                <p class="colore-testo paragrafo-sp">Utilizza le funzioni qui di seguito per operare sui ticket.</p>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-auto">
                <button type="button" class="btn btn-primary bottone-submit-form me-5" data-bs-toggle="modal" data-bs-target="#newTicketModal">
                    Crea nuovo
                </button>
                <a href="./../../index.php" class="btn btn-outline-secondary">
                    Torna alla home
                </a>
            </div>
        </div>

        <!-- MODALE PER LA CREAZIONE -->
        <div class="modal fade" id="newTicketModal" tabindex="-1" aria-labelledby="newTicketModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="newTicketModalLabel">Nuovo ticket:</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="new-ticket-form">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                            </div>
                            <div class="mb-3">
                                <label for="tipo" class="form-label">Tipo:</label>
                                <select class="form-select" id="tipo" name="tipo" required>
                                    <option value="Biglietto" selected disabled>Scegli un'opzione</option>
                                    <option value="Biglietto">Biglietto</option>
                                    <option value="BIglietto">Abbonamento</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="prezzo" class="form-label">Prezzo</label>
                                <input type="number" class="form-control" id="prezzo" min="1" name="prezzo" required>

                            </div>
                            <div class="mb-3">
                                <label for="descrizione" class="form-label">Descrizione</label>
                                <textarea class="form-control" id="descrizione" name="descrizione" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="disponibilita" class="form-label">Disponibilità</label>
                                <input type="number" class="form-control" id="disponibilita" min="1" name="disponibilita" required>
                            </div>
                            <button type="submit" class="btn btn-primary bottone-submit-form">Crea</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODALE PER LA MODIFICA -->
        <div class="modal fade" id="editTicketModal" tabindex="-1" aria-labelledby="editTicketModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editTicketModalLabel">Modifica ticket</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-ticket-form">
                            <input type="hidden" id="edit-id" name="id"> </input>
                            <div class="mb-3">
                                <label for="edit-nome" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="edit-nome" name="nome" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-tipo" class="form-label">Tipo:</label>
                                <select class="form-select" id="edit-tipo" name="tipo">
                                    <option value="Biglietto" selected>Biglietto</option>
                                    <option value="Abbonamento">Abbonamento</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="edit-prezzo" class="form-label">Prezzo</label>
                                <input type="number" class="form-control" id="edit-prezzo" min="1" name="prezzo" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-descrizione" class="form-label">Descrizione</label>
                                <textarea class="form-control" id="edit-descrizione" name="descrizione" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="edit-disponibilita" class="form-label">Disponibilità</label>
                                <input type="number" class="form-control" id="edit-disponibilita" min="1" name="disponibilita"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary bottone-submit-form">Salva modifiche</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col col-md-10">
                <table class="table tabella-personalizzazione" id="ticket-table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Prezzo(€)</th>
                            <th scope="col">Descrizione</th>
                            <th scope="col">Disponibilità</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {

            // URL dell'API
            const apiUrl = "./../../api-rest/tickets";

            // costante che rappresenta la tabella
            const tableBody = document.getElementById('ticket-table').querySelector('tbody');

            // ELENCO DEI TICKET -------------------------------------

            // utilizzo fetch() => promises 
            function caricaBiglietti() {
                fetch(apiUrl)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        tableBody.innerHTML = ''; // svuota la tabella

                        // verifico la presenza dei dati
                        if (data && data.length > 0) {
                            data.forEach(ticket => {
                                const row = tableBody.insertRow();
                                row.insertCell().textContent = ticket.id;
                                row.insertCell().textContent = ticket.nome;
                                row.insertCell().textContent = ticket.tipo;
                                row.insertCell().textContent = ticket.prezzo;
                                row.insertCell().textContent = ticket.descrizione;
                                row.insertCell().textContent = ticket.disponibilita;

                                // inserimento del pulsante MODIFICA
                                // Cella con il bottone "Modifica"
                                const editCell = row.insertCell();
                                const editButton = document.createElement('button');
                                editButton.textContent = 'Modifica';
                                editButton.classList.add('btn', 'btn-outline-secondary', 'btn-sm', 'me-2');
                                editButton.dataset.id = ticket.id; // metodo di button che ci permette di memorizzare l'ID
                                editCell.appendChild(editButton);

                                // inserimento del pulsante ELIMINA
                                const deleteCell = row.insertCell();
                                const deleteButton = document.createElement('button');
                                deleteButton.textContent = 'Elimina';
                                deleteButton.classList.add('btn', 'btn-danger', 'btn-sm');
                                deleteButton.dataset.id = ticket.id; // metodo di button che ci permette di memorizzare l'ID
                                deleteCell.appendChild(deleteButton);
                            });
                        } else {
                            // nel caso in cui non ci fossero dati
                            const row = tableBody.insertRow();
                            row.insertCell().colSpan = 6; // centro il messaggio
                            row.textContent = "Nessun ticket trovato.";
                        }
                    })
                    .catch(error => {
                        console.error("Errore durante la richiesta:", error);
                        // 
                        tableBody.innerHTML = '';
                        const row = tableBody.insertRow();
                        row.insertCell().colSpan = 6;
                        row.textContent = "Errore durante il caricamento dei ticket.";
                    });
            }

            caricaBiglietti(); // lancio la funzione


            // MODIFICA DI UN TICKET ----------------------------------------------------

            // metto il modale in una costante
            const editTicketModal = new bootstrap.Modal(document.getElementById('editTicketModal'));
            // metto il form di modifica in una costante
            const editTicketForm = document.getElementById('edit-ticket-form');

            // event listener
            // => apre e compila il modale
            tableBody.addEventListener('click', function(event) {
                // metodo per riferirsi al bottone cliccato in quel momento
                if (event.target.tagName === 'BUTTON' && event.target.textContent === 'Modifica') {
                    const ticketId = event.target.dataset.id;
                    fetch(`${apiUrl}/${ticketId}`) // mando la richiesta selezionando l'ID del biglietto corrispondente
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }
                            return response.json();
                        })
                        .then(ticket => {
                            // precompilo il form del modale con i dati del biglietto
                            document.getElementById('edit-id').value = ticket.id;
                            document.getElementById('edit-nome').value = ticket.nome;
                            document.getElementById('edit-tipo').value = ticket.tipo;
                            document.getElementById('edit-prezzo').value = ticket.prezzo;
                            document.getElementById('edit-descrizione').value = ticket.descrizione;
                            document.getElementById('edit-disponibilita').value = ticket.disponibilita;

                            // apro il modale
                            editTicketModal.show();
                        })
                        .catch(error => {
                            console.error("Errore durante il recupero del ticket:", error);
                            alert('Errore durante il recupero del ticket.');
                        });
                }
            });


            // event listener
            // => si triggera all'invio del form di modifica
            editTicketForm.addEventListener('submit', function(event) {
                event.preventDefault();

                const ticketId = document.getElementById('edit-id').value;
                const formData = new FormData(this);

                fetch(`${apiUrl}/${ticketId}`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(Object.fromEntries(formData.entries()))
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        // chiudo il modale
                        editTicketModal.hide();

                        // resetto il form
                        editTicketForm.reset();

                        // ricarico la tabella
                        caricaBiglietti();

                        // alert('Ticket modificato con successo!');
                    })
                    .catch(error => {
                        console.error("Errore durante la modifica:", error);
                        alert('Errore durante la modifica del ticket.');
                    });
            });


            // ELIMINAZIONE DI UN TICKET -----------------------------------------------------

            // event listener
            // => richiamo la funzione eliminaBiglietto al CLICK
            tableBody.addEventListener('click', function(event) {
                // metodo per riferirsi al bottone cliccato in quel momento
                if (event.target.tagName === 'BUTTON' && event.target.textContent === 'Elimina') {
                    const ticketId = event.target.dataset.id;
                    if (confirm('Sei sicuro di voler eliminare questo biglietto?')) {
                        eliminaBiglietto(ticketId);
                    }
                }
            });

            // funzione che elimina il biglietto
            function eliminaBiglietto(ticketId) {
                fetch(`${apiUrl}/${ticketId}`, { // mando la richiesta selezionando l'ID del biglietto corrispondente
                        method: 'DELETE'
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        caricaBiglietti(); // richiamo la funzione che aggiorna la tabella
                        alert('Biglietto eliminato con successo!');
                    })
                    .catch(error => {
                        console.error("Errore durante l'eliminazione:", error);
                        alert("Errore durante l\'eliminazione del biglietto.");
                    });
            }


            // CREAZIONE DI UN TICKET ----------------------------------------------

            // metto il modale in una costante
            const newTicketModal = new bootstrap.Modal(document.getElementById('newTicketModal'));
            // metto il form in una costante
            const newTicketForm = document.getElementById('new-ticket-form');

            newTicketForm.addEventListener('submit', function(event) {
                event.preventDefault();

                // creo un nuovo oggetto FormData
                // si riferisce al form corrente
                const formData = new FormData(this);

                fetch(apiUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(Object.fromEntries(formData.entries()))
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        // chiudo il modale
                        newTicketModal.hide();

                        // resetto il form
                        newTicketForm.reset();

                        // mostra messaggio di successo 
                        //alert('Ticket creato con successo!');

                        // Ricarica la tabella
                        caricaBiglietti();
                    })
                    .catch(error => {
                        console.error("Errore durante la creazione:", error);
                        alert('Errore durante la creazione del ticket.');
                    });
            });
        });
    </script> -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>

    <script src="../../src/js/admin.js"></script>

    <script src="../../src/js/redirect.js"></script>
</body>

</html>