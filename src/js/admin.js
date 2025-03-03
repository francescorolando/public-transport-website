document.addEventListener("DOMContentLoaded", function () {
    // URL dell'API
    const apiUrl = "./../../api-rest/tickets";

    // costante che rappresenta la tabella
    const tableBody = document.getElementById("ticket-table").querySelector("tbody");

    // ELENCO DEI TICKET -------------------------------------

    // utilizzo fetch() => promises
    function caricaBiglietti() {
        fetch(apiUrl)
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then((data) => {
                tableBody.innerHTML = ""; // svuota la tabella

                // verifico la presenza dei dati
                if (data && data.length > 0) {
                    data.forEach((ticket) => {
                        const row = tableBody.insertRow();
                        row.insertCell().textContent = ticket.id;
                        row.insertCell().textContent = ticket.nome;
                        row.insertCell().textContent = ticket.tipo;
                        // formattazione del prezzo
                        const prezzo = parseFloat(ticket.prezzo); // converti in numero
                        const prezzoFormattato = new Intl.NumberFormat("it-IT", {
                            // formatta con la localizzazione italiana
                            style: "currency",
                            currency: "EUR",
                        }).format(prezzo);
                        row.insertCell().textContent = prezzoFormattato; // usa il prezzo formattato
                        row.insertCell().textContent = ticket.descrizione;
                        row.insertCell().textContent = ticket.disponibilita;

                        // inserimento del pulsante MODIFICA
                        const editCell = row.insertCell();
                        const editButton = document.createElement("button");
                        editButton.textContent = "Modifica";
                        editButton.classList.add("btn", "btn-outline-secondary", "btn-sm", "me-2");
                        editButton.dataset.id = ticket.id; // metodo di button che ci permette di memorizzare l'ID
                        editCell.appendChild(editButton);

                        // inserimento del pulsante ELIMINA
                        const deleteCell = row.insertCell();
                        const deleteButton = document.createElement("button");
                        deleteButton.textContent = "Elimina";
                        deleteButton.classList.add("btn", "btn-danger", "btn-sm");
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
            .catch((error) => {
                console.error("Errore durante la richiesta:", error);
                //
                tableBody.innerHTML = "";
                const row = tableBody.insertRow();
                row.insertCell().colSpan = 6;
                row.textContent = "Errore durante il caricamento dei ticket.";
            });
    }

    caricaBiglietti(); // lancio la funzione

    // MODIFICA DI UN TICKET ----------------------------------------------------

    // metto il modale in una costante
    const editTicketModal = new bootstrap.Modal(document.getElementById("editTicketModal"));
    // metto il form di modifica in una costante
    const editTicketForm = document.getElementById("edit-ticket-form");

    // event listener
    // => apre e compila il modale
    tableBody.addEventListener("click", function (event) {
        // metodo per riferirsi al bottone cliccato in quel momento
        if (event.target.tagName === "BUTTON" && event.target.textContent === "Modifica") {
            const ticketId = event.target.dataset.id;
            fetch(`${apiUrl}/${ticketId}`) // mando la richiesta selezionando l'ID del biglietto corrispondente
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then((ticket) => {
                    // precompilo il form del modale con i dati del biglietto
                    document.getElementById("edit-id").value = ticket.id;
                    document.getElementById("edit-nome").value = ticket.nome;
                    document.getElementById("edit-tipo").value = ticket.tipo;
                    document.getElementById("edit-prezzo").value = ticket.prezzo;
                    document.getElementById("edit-descrizione").value = ticket.descrizione;
                    document.getElementById("edit-disponibilita").value = ticket.disponibilita;

                    // apro il modale
                    editTicketModal.show();
                })
                .catch((error) => {
                    console.error("Errore durante il recupero del ticket:", error);
                    alert("Errore durante il recupero del ticket.");
                });
        }
    });

    // event listener
    // => si triggera all'invio del form di modifica
    editTicketForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const ticketId = document.getElementById("edit-id").value;
        const formData = new FormData(this);

        fetch(`${apiUrl}/${ticketId}`, {
            method: "PATCH",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(Object.fromEntries(formData.entries())),
        })
            .then((response) => {
                console.log(response);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then((data) => {
                // chiudo il modale
                editTicketModal.hide();

                // resetto il form
                editTicketForm.reset();

                // ricarico la tabella
                caricaBiglietti();

                // alert('Ticket modificato con successo!');
            })
            .catch((error) => {
                console.error("Errore durante la modifica:", error);
                alert("Errore durante la modifica del ticket.");
            });
    });

    // ELIMINAZIONE DI UN TICKET -----------------------------------------------------

    // event listener
    // => richiamo la funzione eliminaBiglietto al CLICK
    tableBody.addEventListener("click", function (event) {
        // metodo per riferirsi al bottone cliccato in quel momento
        if (event.target.tagName === "BUTTON" && event.target.textContent === "Elimina") {
            const ticketId = event.target.dataset.id;
            if (confirm("Sei sicuro di voler eliminare questo biglietto?")) {
                eliminaBiglietto(ticketId);
            }
        }
    });

    // funzione che elimina il biglietto
    function eliminaBiglietto(ticketId) {
        fetch(`${apiUrl}/${ticketId}`, {
            // mando la richiesta selezionando l'ID del biglietto corrispondente
            method: "DELETE",
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then((data) => {
                caricaBiglietti(); // richiamo la funzione che aggiorna la tabella
                alert("Biglietto eliminato con successo!");
            })
            .catch((error) => {
                console.error("Errore durante l'eliminazione:", error);
                alert("Errore durante l'eliminazione del biglietto.");
            });
    }

    // CREAZIONE DI UN TICKET ----------------------------------------------

    // metto il modale in una costante
    const newTicketModal = new bootstrap.Modal(document.getElementById("newTicketModal"));
    // metto il form in una costante
    const newTicketForm = document.getElementById("new-ticket-form");

    newTicketForm.addEventListener("submit", function (event) {
        event.preventDefault();

        // creo un nuovo oggetto FormData
        // si riferisce al form corrente
        const formData = new FormData(this);

        fetch(apiUrl, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(Object.fromEntries(formData.entries())),
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then((data) => {
                // chiudo il modale
                newTicketModal.hide();

                // resetto il form
                newTicketForm.reset();

                // mostra messaggio di successo
                //alert('Ticket creato con successo!');

                // Ricarica la tabella
                caricaBiglietti();
            })
            .catch((error) => {
                console.error("Errore durante la creazione:", error);
                alert("Errore durante la creazione del ticket.");
            });
    });
});
