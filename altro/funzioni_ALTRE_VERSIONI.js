// ALTERNATIVA
// validazione form biglieti e abbonamenti

function validaFormTicket(evento) {
    const mail = document.getElementById("email-ticket").value;
    const ticket = document.getElementById("select-ticket").value;
    const quantita = document.getElementById("quantita-ticket").value;

    console.log(mail);
    console.log(ticket);
    console.log(quantita);

    // controlla che non ci siano campi vuoti
    if (mail === "" || ticket === "" || ticket === "0" || quantita === "") {
        window.alert("Per favore, compila tutti i campi!");
        document.getElementById("email-ticket").focus();
        evento.preventDefault();
        return;
    }

    // controlla che la mail corrisponda all'espressione regolare
    const expressioneRegolare = /^[a-z]+[a-z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/;
    const test = expressioneRegolare.test(mail);

    if (!test) {
        window.alert("Per favore, inserisci un indirizzo e-mail valido!");
        document.getElementById("email-ticket").focus();
        evento.preventDefault();
        return;
    }

    // Controlla che si selezioni un tipo valido di biglietto/abbonamento
    const tipiValidi = ["singolo", "mezza-giornata", "giornaliero", "settimanale", "mensile", "annuale"];
    if (!tipiValidi.includes(ticket)) {
        window.alert("Per favore, seleziona una tipologia valida!");
        document.getElementById("select-tipo-ticket").focus();
        evento.preventDefault();
        return;
    }

    // Controlla che la quantità sia corretta
    if (!(quantita >= 1 && quantita <= 10)) {
        window.alert("Per favore, inserisci una quantità minima di 1 e massima di 10!");
        document.getElementById("select-tipo-ticket").focus();
        evento.preventDefault();
        return;
    }
}

// ALTERNATIVA
// validazione form linea turistica

// aggiungere questo codice a tutteLeMieFunzioni:
document.getElementById("form-linea-turistica").addEventListener("submit", function (event) {
    validaFormLineaTuristica(event);
});

function validaFormLineaTuristica(evento) {
    const nome = document.getElementById("nome-linea-turistica").value;
    const cognome = document.getElementById("cognome-linea-turistica").value;
    const email = document.getElementById("email-linea-turistica").value;
    const numeroPersone = document.getElementById("numero-persone-linea-turistica").value;
    const data = document.getElementById("data-linea-turistica").value;
    const check = document.getElementById("check-linea-turistica").checked;

    // controlla che non ci siano campi vuoti
    if (nome === "" || cognome === "" || email === "" || numeroPersone === "" || data === "") {
        window.alert("Per favore, compila tutti i campi!");
        document.getElementById("nome-linea-turistica").focus();
        evento.preventDefault();
        return;
    }

    // controlla che il checkbox sia selezionato
    if (!check) {
        window.alert("È necessario accettare i termini e le condizioni prima di procedere.");
        document.getElementById("check-linea-turistica").focus();
        evento.preventDefault();
        return;
    }

    // controlla che la mail corrisponda all'espressione regolare
    const expressioneRegolare = /^[a-z]+[a-z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/;
    const test = expressioneRegolare.test(email);

    if (!test) {
        window.alert("Per favore, inserisci un indirizzo e-mail valido!");
        document.getElementById("email-linea-turistica").focus();
        evento.preventDefault();
        return;
    }

    // controlla che il numero di persone sia compreso fra 1 e 25
    if (!(numeroPersone >= 1 && numeroPersone <= 25)) {
        window.alert("Per favore, inserisci un numero di persone compreso fra 1 e 25!");
        document.getElementById("numero-persone-linea-turistica").focus();
        evento.preventDefault();
        return;
    }

    // controlla che la data sia valida (a partire da domani) e che non vada oltre il 31 dicembre 2025
    const oggi = new Date();
    const dataSelezionata = new Date(data);

    if (isNaN(dataSelezionata) || dataSelezionata < oggi || dataSelezionata.getFullYear() > 2025) {
        window.alert("Seleziona una data valida a partire da domani ed entro il 31 dicembre 2025!");
        document.getElementById("data-linea-turistica").focus();
        evento.preventDefault();
        return;
    }
}
