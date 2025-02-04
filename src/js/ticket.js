$(document).ready(function () {
    // Aggiungi l'evento di cambio al selectTipo
    $("#select-tipo-ticket").change(handleSelectTipoChange);
    $("#quantita-ticket").change(calcoloPrezzoTotale);
    $("#select-ticket").change(calcoloPrezzoTotale);
    $("#select-tipo-ticket").change(calcoloPrezzoTotale);
    $("#form-ticket").on("reset", ripristinoOpzioniSelect);
    $("#form-ticket").on("submit", function (e) {
        validaFormTicket(e);
    });
});

// funzione che aggiunge un'opzione ad una select
function addOption(selectId, value, text) {
    $(selectId).append('<option value="' + value + '">' + text + "</option>");
}

// ripristina le normali opzioni della seconda select (disabled + vuota)
function ripristinoOpzioniSelect() {
    // console.log("ripristinoOpzioniSelect");
    $("#select-ticket").prop("disabled", true);
    $("#select-ticket").empty();
    addOption("#select-ticket", "", "Scegli un'opzione");
}

// funzione per gestire la logica del cambio nel selectTipo
function handleSelectTipoChange() {
    // console.log("handleSelectTipoChange");
    // abilita o disabilita il secondo select in base alla selezione
    if ($(this).val() !== "") {
        $("#select-ticket").prop("disabled", false);

        // rimuovi tutte le opzioni attuali
        $("#select-ticket").empty();
        // $("#select-ticket").append("<option selected disabled>Scegli un'opzione</option>");

        // aggiungi nuove opzioni in base alla selezione del primo select
        if ($(this).val() === "1") {
            addOption("#select-ticket", "singolo", "Singolo");
            addOption("#select-ticket", "mezza-giornata", "Mezza giornata");
            addOption("#select-ticket", "giornaliero", "Giornaliero");
        } else if ($(this).val() === "2") {
            addOption("#select-ticket", "settimanale", "Settimanale");
            addOption("#select-ticket", "mensile", "Mensile");
            addOption("#select-ticket", "annuale", "Annuale");
        } else if ($(this).val() === "0") {
            ripristinoOpzioniSelect();
        }
    }
}

// calcola il prezzo totale dei biglietti
function calcoloPrezzoTotale() {
    const ticket = $("#select-ticket").val();
    const quantita = $("#quantita-ticket").val();

    if (quantita <= 0) {
        $("#quantita-ticket").val(1);
        $("#quantita-ticket").focus();
    } else {
        switch (ticket) {
            case "singolo":
                assegnaPrezzo(2);
                break;
            case "mezza-giornata":
                assegnaPrezzo(4);
                break;
            case "giornaliero":
                assegnaPrezzo(6);
                break;
            case "settimanale":
                assegnaPrezzo(12);
                break;
            case "mensile":
                assegnaPrezzo(38);
                break;
            case "annuale":
                assegnaPrezzo(310);
                break;
            default:
                $("#totale-ticket").val(0);
        }
    }

    function assegnaPrezzo(prezzo) {
        var totale = quantita * prezzo;
        totale = totale.toFixed(2);
        $("#totale-ticket").val(totale);
    }
}

// validazione del form sui ticket
function validaFormTicket(evento) {
    const mail = $("#email-ticket").val();
    const ticket = $("#select-ticket").val();
    const quantita = $("#quantita-ticket").val();

    console.log(mail);
    console.log(ticket);
    console.log(quantita);

    // controlla che non ci siano campi vuoti
    if (
        mail === "" ||
        mail === null ||
        ticket === "" ||
        ticket === null ||
        ticket === 0 ||
        quantita === "" ||
        quantita === null
    ) {
        window.alert("Per favore, compila tutti i campi!");
        $("#email-ticket").focus();
        evento.preventDefault();
        return;
    }

    // controlla che la mail corrisponda all'espressione regolare
    const expressioneRegolare = /^[a-z]+[a-z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/;
    var test = expressioneRegolare.test(mail);

    if (!test) {
        window.alert("Per favore, inserisci un indirizzo e-mail valido!");
        $("#email-ticket").focus();
        evento.preventDefault();
        return;
    }

    // controlla che si selezioni un tipo valido di biglietto/abbonamento
    if (
        ticket != "singolo" &&
        ticket != "mezza-giornata" &&
        ticket != "giornaliero" &&
        ticket != "settimanale" &&
        ticket != "mensile" &&
        ticket != "annuale"
    ) {
        window.alert("Per favore, seleziona una tipologia valida!");
        $("#select-tipo-ticket").focus();
        evento.preventDefault();
        return;
    }

    // controlla che la quantità sia corretta
    if (!(quantita >= 1 && quantita <= 10)) {
        window.alert("Per favore, inserisci una quantità mininma di 1 e massima di 10!");
        $("#select-tipo-ticket").focus();
        evento.preventDefault();
        return;
    }
}

// INTERGRAZIONE DELL'API

document.addEventListener("DOMContentLoaded", function () {
    const apiUrl = "./api-rest/tickets";
    const tipoSelect = document.getElementById("select-tipo-ticket");
    const ticketSelect = document.getElementById("select-ticket");

    // funzione per caricare i biglietti dall'API e popolare la select
    function caricaBiglietti(tipo) {
        fetch(apiUrl)
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                // console.log(response.json());
                return response.json();
            })
            .then((data) => {
                ticketSelect.innerHTML = '<option value="0">Scegli un\'opzione</option>'; // Pulisci le opzioni precedenti
                ticketSelect.disabled = true; // Disabilita la select finché non ci sono dati

                if (data && data.length > 0) {
                    console.log(data);
                    const filteredData = data.filter((ticket) => {
                        // restituisce i ticket di quel tipo
                        // restituisce solo se disponibili
                        return ticket.tipo === tipo && ticket.disponibilita > 0;
                    });

                    console.log("------------------");
                    console.log("------------------");
                    console.log("------------------");
                    console.log(filteredData);

                    if (filteredData.length > 0) {
                        filteredData.forEach((ticket) => {
                            const option = document.createElement("option");
                            option.value = ticket.id; // Usa l'ID del ticket come valore
                            option.text = ticket.nome; // Mostra il nome del ticket
                            ticketSelect.appendChild(option);
                        });
                        ticketSelect.disabled = false; // Abilita la select
                    } else {
                        const option = document.createElement("option");
                        option.text = `Nessun ${tipo} disponibile.`;
                        ticketSelect.appendChild(option);
                    }
                } else {
                    const option = document.createElement("option");
                    option.text = "Nessun ticket trovato.";
                    ticketSelect.appendChild(option);
                }
            })
            .catch((error) => {
                console.error("Errore durante la richiesta:", error);
                ticketSelect.innerHTML = '<option value="0">Scegli un\'opzione</option>';
                const option = document.createElement("option");
                option.text = "Errore durante il caricamento dei ticket.";
                ticketSelect.appendChild(option);
                ticketSelect.disabled = true;
            });
    }

    // event listener => viene cambiato il tipo di ticket
    tipoSelect.addEventListener("change", function () {
        const tipoSelezionato = this.value;
        if (tipoSelezionato === "1") {
            caricaBiglietti("Biglietto");
        } else if (tipoSelezionato === "2") {
            caricaBiglietti("Abbonamento");
        } else {
            ticketSelect.innerHTML = '<option value="0">Scegli un\'opzione</option>';
            ticketSelect.disabled = true;
        }
    });

    // Inizializzazione: popola la select dei tipi di ticket
    // (Opzionale: puoi anche caricare i biglietti di default al caricamento della pagina)
    // caricaBiglietti("Biglietto"); // Carica i biglietti all'avvio per default
});

/*
document.addEventListener("DOMContentLoaded", function () {
    // URL dell'API
    const apiUrl = "./../../api-rest/tickets";

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
                        row.insertCell().textContent = ticket.prezzo;
                        row.insertCell().textContent = ticket.descrizione;
                        row.insertCell().textContent = ticket.disponibilita;

                        // inserimento del pulsante MODIFICA
                        // Cella con il bottone "Modifica"
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
});*/
