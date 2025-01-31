<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TBT - Linea turistica</title>
    <meta name="author" content="Rolando Francesco" />
    <meta name="description" content="" />

    <!-- FAVICON -->
    <link rel="icon" type="image/x-icon" href="immagini/favicon.ico" />

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />

    <!-- CSS -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />

    <!-- Angular -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>

<body>
    <nav
        class="navbar sticky-top navbar-expand-lg bg-body-tertiary colore-principale-sfondo bg-dark navbar-dark mb-3">
        <div class="container-fluid">
            <a class="navbar-brand me-5 logo-tbt" href="index.php">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    class="bi bi-bus-front-fill"
                    viewBox="0 0 16 16">
                    <path
                        d="M16 7a1 1 0 0 1-1 1v3.5c0 .818-.393 1.544-1 2v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5V14H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2a2.5 2.5 0 0 1-1-2V8a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1V2.64C1 1.452 1.845.408 3.064.268A44 44 0 0 1 8 0c2.1 0 3.792.136 4.936.268C14.155.408 15 1.452 15 2.64V4a1 1 0 0 1 1 1zM3.552 3.22A43 43 0 0 1 8 3c1.837 0 3.353.107 4.448.22a.5.5 0 0 0 .104-.994A44 44 0 0 0 8 2c-1.876 0-3.426.109-4.552.226a.5.5 0 1 0 .104.994M8 4c-1.876 0-3.426.109-4.552.226A.5.5 0 0 0 3 4.723v3.554a.5.5 0 0 0 .448.497C4.574 8.891 6.124 9 8 9s3.426-.109 4.552-.226A.5.5 0 0 0 13 8.277V4.723a.5.5 0 0 0-.448-.497A44 44 0 0 0 8 4m-3 7a1 1 0 1 0-2 0 1 1 0 0 0 2 0m8 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m-7 0a1 1 0 0 0 1 1h2a1 1 0 1 0 0-2H7a1 1 0 0 0-1 1" />
                </svg>
                <strong> Torino Bus & Tram </strong>
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="linee.php">Linee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="orari.php">Orari</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle active"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            aria-current="page">
                            Acquista
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="biglietti-abbonamenti.php">
                                    Biglietti e abbonamenti
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="linea-turistica.php">Linea turistica</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contatti.php">Contattaci</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-4 briciole">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Acquista</li>
                        <li class="breadcrumb-item active" aria-current="page">Linea turistica</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- CONTENUTO PRINCIPALE -->
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col col-md-8">
                <h1 class="colore-testo">La nostra linea turistica</h1>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col col-md-8">
                <button class="link-per-form-linea-turistica" id="bottone-container-form-linea-turistica">
                    Compila il modulo e acquista il tuo tour
                </button>
            </div>
        </div>

        <div class="row justify-content-center mb-5" id="container-form-linea-turistica">
            <div class="col col-md-8">
                <h4 class="colore-principale-testo">Compila i campi e prenota il tuo tour</h4>
                <p class="colore-testo">Una volta terminato, conferma e procedi al pagamento.</p>
                <form
                    class="border rounded py-4 px-5 shadow"
                    method="post"
                    autocomplete="on"
                    id="form-linea-turistica"
                    name="form-linea-turistica"
                    ng-app="myApp"
                    ng-controller="myController"
                    novalidate>
                    <div class="mb-3">
                        <label for="nome-linea-turistica" class="form-label">
                            Nome dell'intestatario della prenotazione: <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            id="nome-linea-turistica"
                            name="nome-linea-turistica"
                            class="form-control"
                            required />
                        <div class="invalid-feedback">Inserisci un nome valido.</div>
                    </div>

                    <div class="mb-3">
                        <label for="cognome-linea-turistica" class="form-label">
                            Cognome dell'intestatario della prenotazione: <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            id="cognome-linea-turistica"
                            name="cognome-linea-turistica"
                            class="form-control"
                            required />
                        <div class="invalid-feedback">Inserisci un cognome valido.</div>
                    </div>

                    <div class="mb-3">
                        <label for="email-linea-turistica" class="form-label">
                            Inserire un indirizzo e-mail: <span class="text-danger">*</span></label>
                        <input
                            type="email"
                            name="email-linea-turistica"
                            id="email-linea-turistica"
                            required
                            class="form-control"
                            required />
                        <div class="invalid-feedback">Inserisci un indirizzo e-mail valido.</div>
                    </div>

                    <div class="mb-3">
                        <label for="numero-persone-linea-turistica" class="form-label">
                            Quante persone? <span class="text-danger">*</span></label>
                        <input
                            type="number"
                            id="numero-persone-linea-turistica"
                            name="numero-persone-linea-turistica"
                            min="1"
                            max="25"
                            ng-model="quantita"
                            ng-change="calcolaTotale()"
                            class="form-control"
                            required />
                        <div class="invalid-feedback">Inserisci un numero di persone compreso fra 1 e 25.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="totale-linea-turistica">Prezzo totale:</label>
                        <div class="input-group">
                            <span class="input-group-text">€</span>
                            <input
                                type="number"
                                class="form-control"
                                readonly
                                ng-model="totale"
                                name="totale-linea-turistica"
                                id="totale-linea-turistica"
                                required />
                            <span class="input-group-text">,00</span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="data-linea-turistica" class="form-label">
                            Seleziona il giorno in cui vuoi effettuare il tour:
                            <span class="text-danger">*</span></label>
                        <input
                            type="date"
                            name="data-linea-turistica"
                            min=""
                            max="2025-12-31"
                            id="data-linea-turistica"
                            required
                            class="form-control"
                            required />
                        <div class="invalid-feedback">
                            Seleziona una data a partire da domani, fino a al 31-12-2025.
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                value=""
                                id="check-linea-turistica"
                                name="check-linea-turistica"
                                required />
                            <label class="form-check-label" for="check-linea-turistica">
                                Accetto i termini e le condizioni del trattamento
                                <span class="text-danger">*</span></label>
                            <div class="invalid-feedback">È necessario accettare prima di procedere.</div>
                        </div>
                    </div>

                    <div class="row mb-3 g-4">
                        <div class="col-auto">
                            <button
                                class="btn btn-primary bottone-submit-form"
                                type="submit"
                                id="conferma-linea-turistica">
                                Conferma
                            </button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-outline-secondary" type="reset" id="reset-linea-turistica">
                                Svuota il modulo
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col col-md-8">
                <h4 class="colore-principale-testo">Come funziona?</h4>
            </div>
        </div>
        <div class="row justify-content-center mb-4">
            <div class="col col-md-8">
                <p class="colore-testo">
                    Il servizio è disponibile tutti i giorni dalle ore <strong>08:30</strong> alle ore
                    <strong>18:30</strong>. <br />
                    Sali su un nostro autobus e goditi un percorso alla scoperta di Torino, grazie anche alla
                    presenza a bordo delle <strong>nostre guide</strong> che ti accompagneranno durante il tragitto.
                    <br /><br />
                    Il tour prevede <strong>sei fermate</strong>, ad ognuna delle quali potrai scegliere di fermarti
                    per approfondire la visita, risalendo poi in uno degli autobus che passeranno successivamente a
                    <strong>intervalli di un'ora</strong> (con l'ultima corsa in partenza alle ore
                    <strong>18:30</strong>). <br />
                    <em>Non ti preoccupare! Le guide sono presenti in ogni mezzo e potrai tranquillamente
                        riprendere il tour da dove ti eri fermato.</em>
                    <br /><br />
                    Infine, con il tuo ticket potrai scegliere di
                    <strong>visitare gratuitamente uno fra i musei disponibili</strong>; per maggiori informazioni,
                    consultare la sezione dedicata al biglietto.
                </p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col col-md-8">
                <h4 class="colore-principale-testo">L'itinerario</h4>
            </div>
        </div>
        <div class="row justify-content-center mb-4">
            <div class="col col-md-8">
                <p class="colore-testo">
                    Il punto di ritrovo si trova in <strong> <em>P.za Castello 15, 10124 Torino TO.</em> </strong>
                    <br />
                    È raccomandato presentarsi almeno <strong>15 minuti</strong> prima della partenza.
                </p>
                <p class="colore-testo"><strong>Di seguito le tappe/fermate del tour:</strong></p>
                <ol class="colore-testo">
                    <li>Piazza Castello</li>
                    <li>Mole Antonelliana</li>
                    <li>Monte dei Cappuccini</li>
                    <li>Borgo medievale / Parco del Valentino</li>
                    <li>Piazza Carlo Felice</li>
                    <li>Duomo</li>
                </ol>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col col-md-8">
                <h4 class="colore-principale-testo">Il biglietto</h4>
            </div>
        </div>
        <div class="row justify-content-center mb-4">
            <div class="col col-md-8">
                <ul class="colore-testo">
                    <li class="mb-3">Il costo del biglietto è di <strong>€ 35,00</strong> a persona.</li>
                    <li class="mb-3">
                        È valido <strong>esclusivamente</strong> per il giorno indicato in fase di prenotazione e
                        per
                        <strong>tutti gli autobus turistici <abbr title="Torino Bus & Tram">TBT</abbr> di quella
                            giornata</strong>.
                    </li>
                    <li>
                        Compreso nel prezzo avrai a disposizione un ingresso con visita a scelta fra: <br />
                        <strong>Museo Egizio</strong> oppure
                        <strong>Museo Nazionale del Cinema e Mole Antonelliana</strong>.
                    </li>
                </ul>
                <p class="colore-testo">
                    <em>Il biglietto verrà vidimato nel luogo del ritrovo prima della partenza.</em>
                </p>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="container-fluid text-center color footer-personalizzazione mt-4">
        <div class="row justify-content-center">
            <div class="col-10">
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col"><em>Torino Bus & Tram ®</em></div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-auto"><a href="contatti.php">Contatti</a></div>
            <div class="col-auto"><a href="#">Termini e condizioni d'uso</a></div>
            <div class="col-auto"><a href="#">Privacy</a></div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <!-- JS -->
    <script src="js/linea-turistica.js"></script>
</body>

</html>