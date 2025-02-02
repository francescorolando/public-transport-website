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
    console.log("ripristinoOpzioniSelect");
    $("#select-ticket").prop("disabled", true);
    $("#select-ticket").empty();
    addOption("#select-ticket", "", "Scegli un'opzione");
}

// Funzione per gestire la logica del cambio nel selectTipo
function handleSelectTipoChange() {
    console.log("handleSelectTipoChange");
    // Abilita o disabilita il secondo select in base alla selezione
    if ($(this).val() !== "") {
        $("#select-ticket").prop("disabled", false);

        // Rimuovi tutte le opzioni attuali
        $("#select-ticket").empty();
        // $("#select-ticket").append("<option selected disabled>Scegli un'opzione</option>");

        // Aggiungi nuove opzioni in base alla selezione del primo select
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
