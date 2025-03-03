$(document).ready(function () {
    $("#form-ticket").on("submit", function (e) {
        validaFormTicket(e);
    });
});

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
    const form = document.getElementById("form-ticket");
    const emailInput = document.getElementById("email-ticket"); // Ottieni il riferimento al campo email
    const tipoSelect = document.getElementById("select-tipo-ticket");
    const ticketSelect = document.getElementById("select-ticket");
    const quantitaInput = document.getElementById("quantita-ticket");
    const totaleInput = document.getElementById("totale-ticket");

    form.addEventListener("reset", function () {
        // email (con delay a causa di problemi)
        setTimeout(() => {
            emailInput.value = "";
        }, 0);

        // select dei ticket
        ticketSelect.disabled = true; // disabilita la select dei ticket
        ticketSelect.value = 0; // resetta la select dei ticket
        ticketSelect.innerHTML = '<option value="0">Scegli un\'opzione</option>'; // Reset opzioni ticket

        // quantità
        quantitaInput.disabled = true; // disabilita l'input della quantità
        quantitaInput.value = 0; // imposta la quantità a 0

        // totalePrezzo.value = 0; // resetta il prezzo totale

        emailInput.focus();
    });

    // funzione per caricare i biglietti dall'API e popolare la select
    function caricaBiglietti(tipo) {
        fetch(apiUrl)
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then((data) => {
                ticketSelect.innerHTML = '<option value="0">Scegli un\'opzione</option>'; // pulisci le opzioni precedenti
                ticketSelect.disabled = true; // disabilita la select finché non ci sono dati

                if (data && data.length > 0) {
                    console.log("------------------");
                    console.log("data:");
                    console.log(data);
                    console.log("lunghezza data: " + data.length);
                    const filteredData = data.filter((ticket) => {
                        // restituisce i ticket di quel tipo
                        // restituisce solo se disponibili
                        return ticket.tipo === tipo && ticket.disponibilita > 0;
                    });

                    console.log("------------------");
                    console.log("filteredData:");
                    console.log(filteredData);
                    console.log("lunghezza filteredData: " + filteredData.length);

                    if (filteredData.length > 0) {
                        filteredData.forEach((ticket) => {
                            const option = document.createElement("option");
                            option.value = ticket.id; // usa l'ID del ticket come valore
                            option.text = ticket.nome; // mostra il nome del ticket
                            ticketSelect.appendChild(option);
                        });
                        ticketSelect.disabled = false; // abilita la select
                    } else {
                        console.log("Nessun " + tipo.toLowerCase() + " disponibile");
                        /* const option = document.createElement("option");
                        option.text = `Nessun ${tipo} disponibile.`;
                        ticketSelect.appendChild(option); */
                        ticketSelect.innerHTML = `<option value="0">Nessun ${tipo.toLowerCase()} disponibile </option>`; // pulisci le opzioni precedenti
                        ticketSelect.disabled = true; // disabilita la select finché non ci sono dati
                    }
                } else {
                    // TODO: controllare caso in cui nel db non ci sono voci
                    console.log("NESSUN TICKET DISPONIBILE");
                    const option = document.createElement("option");
                    option.text = "Nessun ticket trovato.";
                    ticketSelect.appendChild(option);
                }

                // disabilita l'input della quantità
                quantitaInput.disabled = true;
                // valore predefinito del campo quantità
                quantitaInput.value = 0;

                // aggiorna la quantità massima
                aggiornaQuantitaMassima();
                // calcola il totale iniziale (se c'è un ticket selezionato)
                calcolaTotale();
            })
            .catch((error) => {
                console.error("Errore durante la richiesta:", error);
                ticketSelect.innerHTML = '<option value="0">Errore durante il caricamento dei dati</option>';
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

    // quanto il ticket cambia:
    ticketSelect.addEventListener("change", function () {
        quantitaInput.value = 1;
        calcolaTotale();
        aggiornaQuantitaMassima();
        quantitaInput.disabled = false;
    });

    quantitaInput.addEventListener("input", calcolaTotale);

    function aggiornaQuantitaMassima() {
        const ticketId = ticketSelect.value;

        if (ticketId) {
            fetch(apiUrl)
                .then((response) => response.json())
                .then((data) => {
                    const ticket = data.find((t) => t.id == ticketId);
                    if (ticket) {
                        quantitaInput.max = ticket.disponibilita; // imposta il massimo in base alla disponibilità
                    } else {
                        quantitaInput.value = 0;
                        quantitaInput.max = 10; // valore predefinito se il ticket non viene trovato
                        quantitaInput.disabled = true;
                    }
                });
        } else {
            quantitaInput.max = 10; // valore predefinito se nessun ticket è selezionato
        }
    }

    function calcolaTotale() {
        const ticketId = ticketSelect.value;
        const quantita = quantitaInput.value;

        if (ticketId && quantita > 0) {
            fetch(apiUrl)
                .then((response) => response.json())
                .then((data) => {
                    const ticket = data.find((t) => t.id == ticketId);
                    if (ticket) {
                        const totale = ticket.prezzo * quantita;
                        totaleInput.value = totale.toFixed(2); // Mostra il totale con 2 decimali
                    } else {
                        totaleInput.value = 0;
                    }
                });
        } else {
            totaleInput.value = 0;
        }
    }
});
