<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TBT - Biglietti e abbonamenti</title>
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
                        <li class="breadcrumb-item active" aria-current="page">Biglietti e abbonamenti</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- CONTENUTO PRINCIPALE -->

    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col col-md-8">
                <h1 class="colore-testo">Biglietti e abbonamenti</h1>
            </div>
        </div>

        <div class="row justify-content-center mb-4">
            <div class="col col-lg-8">
                <p class="colore-testo">
                    [scorri fino al fondo della pagina per <a href="#container-form-ticket">compilare il form</a>]
                </p>
                <p class="colore-testo">
                    Prima di procedere con l'acquisto, ti invitiamo a leggere con attenzione quanto riportato qui di
                    seguito:
                </p>
                <ul class="colore-testo">
                    <li class="mb-3">
                        I biglietti e gli abbonamenti certificati <abbr title="Torino Bus & Tram">TBT</abbr> sono
                        validi su <strong>tutti i nostri mezzi</strong>, sia autobus che tram, nel rispetto della
                        durata e della tipologia del titolo acquistato, fatta eccezione per la nostra
                        <a href="linea-turistica.php" title="Linea turistica">linea turistica</a>, dotata di un
                        ticket apposito.
                    </li>
                    <li class="mb-3">
                        I biglietti sono acquistabili all'interno di questo sito, all'interno del comune di Torino
                        presso le rivendite <abbr title="Torino Bus & Tram">TBT</abbr> autorizzate oppure a bordo
                        dei nostri mezzi.
                    </li>
                    <li class="mb-3">
                        Chiunque utilizzi i nostri mezzi che non sia in possesso di un titolo
                        <strong>valido, convalidato o rientrante nelle tempistiche prestabilite</strong>, verrà
                        fatto scendere alla prima fermata disponibile e sarà costretto al pagamento di una
                        <strong>sanzione pecuniaria di € 125.00</strong>.
                    </li>
                </ul>
            </div>
        </div>

        <div class="row justify-content-center mb-4">
            <div class="col-12 col-lg-4">
                <h4 class="colore-principale-testo mb-3">Biglietti</h4>
                <ul class="colore-testo">
                    <li class="mb-3">
                        <strong> Singolo - € 1,70 </strong> <br />
                        <em>Valido per 100 minuti dal momento della convalida e da convalidare ogni qualvolta si
                            cambi mezzo.</em>
                    </li>
                    <li class="mb-3">
                        <strong> Mezza giornata - € 3,40 </strong> <br />
                        <em>Valido per 6 ore dal momento della prima convalida e da convalidare ogni qualvolta si
                            cambi mezzo.</em>
                    </li>
                    <li class="mb-3">
                        <strong> Giornaliero - € 5,20 </strong> <br />
                        <em>Valido per 24 ore dal momento della convalida e da convalidare ogni qualvolta si cambi
                            mezzo.</em>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-lg-4">
                <h4 class="colore-principale-testo mb-3">Abbonamenti</h4>
                <ul class="colore-testo">
                    <li class="mb-3">
                        <strong> Settimanale - € 12,00 </strong> <br />
                        <em>Valido fino alle ore 23:59 della domenica della settimana in cui si convalida il
                            titolo.</em>
                    </li>
                    <li class="mb-3">
                        <strong> Mensile - € 38,00 </strong> <br />
                        <em>Valido per 30 giorni dal momento della convalida.</em>
                    </li>
                    <li class="mb-3">
                        <strong> Annuale - € 310,00 </strong> <br />
                        <em>Valido per 365 giorni dal momento in cui si acquista il titolo.</em>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row justify-content-center mb-5" id="container-form-ticket">
            <div class="col col-lg-8">
                <h4 class="colore-principale-testo">Acquista compilando il form</h4>
                <p class="colore-testo">Una volta terminato, conferma e procedi al pagamento.</p>
                <form
                    action="index.php?m_r=Prenotazione avvenuta con successo!"
                    class="border rounded py-4 px-5 shadow"
                    method="post"
                    autocomplete="on"
                    id="form-ticket"
                    name="form-ticket"
                    novalidate>
                    <div class="mb-4">
                        <label for="email-ticket" class="form-label">
                            Inserire un indirizzo e-mail: <span class="text-danger">*</span></label>
                        <input
                            type="email"
                            name="email-ticket"
                            id="email-ticket"
                            required
                            class="form-control"
                            required />
                    </div>

                    <div class="row">
                        <div class="col-12 col-md mb-4">
                            <label class="form-label" for="select-tipo-ticket">Categoria:</label>
                            <select class="form-select" id="select-tipo-ticket" name="select-tipo-ticket">
                                <option value="0" selected disabled>Scegli un'opzione</option>
                                <option value="1">Biglietto</option>
                                <option value="2">Abbonamento</option>
                            </select>
                        </div>

                        <div class="col-12 col-md mb-4">
                            <label class="form-label" for="select-ticket">Seleziona il tipo: </label>
                            <select class="form-select" id="select-ticket" name="select-ticket" disabled>
                                <option value="0">Scegli un'opzione</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md mb-4">
                            <label for="quantita-ticket" class="form-label">
                                Quantità: <span class="text-danger">*</span></label>
                            <input
                                type="number"
                                id="quantita-ticket"
                                name="quantita-ticket"
                                value="1"
                                min="1"
                                max="10"
                                class="form-control"
                                required />
                        </div>

                        <div class="col-12 col-md mb-4">
                            <label class="form-label" for="totale-ticket">Prezzo totale:</label>
                            <div class="input-group">
                                <span class="input-group-text">€</span>
                                <input
                                    type="number"
                                    class="form-control"
                                    readonly
                                    value="0"
                                    name="totale-ticket"
                                    id="totale-ticket"
                                    required />
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-end g-4">
                        <div class="col-auto">
                            <button class="btn btn-primary bottone-submit-form" type="submit" id="conferma-ticket">
                                ACQUISTA
                            </button>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-outline-secondary" type="reset" id="reset-ticket">
                                Svuota il modulo
                            </button>
                        </div>
                    </div>
                </form>
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
    <script src="js/ticket.js"></script>
</body>

</html>