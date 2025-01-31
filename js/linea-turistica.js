window.onload = tutteLeMieFunzioni();

function tutteLeMieFunzioni() {
    // DATA FORM
    assegnaDataMinimaForm();

    // TOGGLE FORM
    $(document).ready(function () {
        $("#container-form-linea-turistica").hide();
        $("#bottone-container-form-linea-turistica").click(function () {
            toggleFormLineaTuristica();
        });
    });

    // VALIDAZIONE FORM
    document.getElementById("form-linea-turistica").addEventListener(
        "submit",
        function (e) {
            controllaForm(e);
        },
        false
    );
}

// valida il form della linea turistica, sfruttando gli elementi di validazione inseriti in HTML
const form = document.getElementById("form-linea-turistica");
function controllaForm(e) {
    if (!form.checkValidity()) {
        e.preventDefault();
    } else {
        window.location.href = "index.php?m_r=Prenotazione avvenuta con successo!";
    }

    form.classList.add("was-validated");
    console.log("submit");
}

// mostra il form per prenotare la linea turistica
function toggleFormLineaTuristica() {
    $("#container-form-linea-turistica").slideToggle(500);
}

// imposta come data minima la data di domani nel form per prenotare la linea turistica
function assegnaDataMinimaForm() {
    var data = new Date();

    // imposta la data al giorno successivo
    data.setDate(data.getDate() + 1);

    var dd = data.getDate();
    var mm = data.getMonth() + 1; // i mesi in JavaScript sono indicizzati a partire da 0
    var yyyy = data.getFullYear();

    // aggiungi uno zero davanti se il giorno o il mese sono minori di 10
    if (dd < 10) {
        dd = "0" + dd;
    }

    if (mm < 10) {
        mm = "0" + mm;
    }

    // costruisci la stringa della data nel formato YYYY-MM-DD
    var dataMinima = yyyy + "-" + mm + "-" + dd;

    // imposta l'attributo 'min' con la data calcolata
    document.getElementById("data-linea-turistica").setAttribute("min", dataMinima);
}

// calcola il prezzo totale della lina turistica

var app = angular.module("myApp", []);

app.controller("myController", function ($scope) {
    $scope.quantita = 1;
    $scope.calcolaTotale = function () {
        var prezzoPerPersona = 35;
        $scope.totale = $scope.quantita * prezzoPerPersona;
    };

    // inizializza il totale
    $scope.calcolaTotale();
});
