<?php
session_start();
include './utilities/accountButtons.php';
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TBT - Contattaci</title>
    <meta name="author" content="Rolando Francesco" />
    <meta name="description" content="" />

    <!-- FAVICON -->
    <link rel="icon" type="image/x-icon" href="./src/immagini/favicon.ico" />

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />

    <!-- CSS -->
    <link href="./src/css/style.css" rel="stylesheet" type="text/css" />

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
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Acquista
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="ticket.php">
                                    Biglietti e abbonamenti
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="linea-turistica.php">Linea turistica</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="contatti.php">Contattaci</a>
                    </li>
                    <?= topHeader() ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-2 briciole">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active" aria-current="page">Contatti</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- CONTENUTO PRINCIPALE -->
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col col-md-8">
                <h1 class="colore-testo">I nostri contatti</h1>
            </div>
        </div>
        <div class="row justify-content-center mb-4">
            <div class="col col-md-8">
                <ul class="colore-testo">
                    <li class="mb-3">
                        Sede legale e operativa:
                        <a
                            href="https://www.google.com/maps/place/Via+Cesare+Battisti,+7,+10123+Torino+TO/@45.069446,7.6834946,17z/data=!3m1!4b1!4m5!3m4!1s0x47886d70189d4c41:0xbf4e3ca064876a62!8m2!3d45.069446!4d7.6856833"
                            title="Sede legale e operativa [link esterno]">
                            Via Cesare Battisti, 7 - Torino (TO) 10123
                        </a>
                    </li>
                    <li class="mb-3">Telefono: +39 011 578 9579 (dal lunedì al venerdì, 8:00 - 18:30)</li>
                    <li>
                        Email:
                        <a href="mailto:torinobustram@gmail.com" title="Invia un'e-mail">
                            torinobustram@mail.com
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col col-md-8">
                <h4 class="colore-principale-testo">... altrimenti</h4>
                <p class="colore-testo">Compila il form e cercheremo di aiutarti!</p>
            </div>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col col-md-8">
                <form
                    action="index.php?m_r=Messaggio inviato con successo!"
                    name="formContatti"
                    class="border rounded shadow py-4 px-5"
                    method="post"
                    autocomplete="on"
                    novalidate
                    ng-app="myApp"
                    ng-controller="myController">
                    <div class="mb-4">
                        <label for="nome" class="form-label"> Nome: <span class="text-danger">*</span></label>
                        <input type="text" id="nome" name="nome" class="form-control" required ng-model="nome" />
                        <span style="color:red" ng-show="formContatti.nome.$dirty && formContatti.nome.$invalid">
                            <span ng-show="formContatti.nome.$error.required">Il nome è obbligatorio.</span>
                        </span>
                    </div>

                    <div class="mb-4">
                        <label for="cognome" class="form-label"> Cognome: <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            id="cognome"
                            name="cognome"
                            class="form-control"
                            required
                            ng-model="cognome" />
                        <span
                            style="color:red"
                            ng-show="formContatti.cognome.$dirty && formContatti.cognome.$invalid">
                            <span ng-show="formContatti.cognome.$error.required">Il cognome è obbligatorio.</span>
                        </span>
                    </div>

                    <div class="mb-4">
                        <label for="mail" class="form-label">
                            Inserire un indirizzo e-mail: <span class="text-danger">*</span></label>
                        <input
                            type="email"
                            ng-pattern="/^[a-z]+[a-z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/"
                            name="mail"
                            id="mail"
                            required
                            class="form-control"
                            ng-model="mail" />
                        <span style="color:red" ng-show="formContatti.mail.$dirty && formContatti.mail.$invalid">
                            <span ng-show="formContatti.mail.$error.required">La e-mail è obbligatoria.</span>
                            <span ng-show="formContatti.mail.$error.pattern">Inserisci una e-mail valida.</span>
                        </span>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="frequenza">Quante volte utilizzi il nostro servizio? </label>
                        <select class="form-select" id="frequenza" name="frequenza" ng-model="frequenza">
                            <option value="0" disabled>Scegli un'opzione</option>
                            <option value="1">Poche volte all'anno</option>
                            <option value="2">Almeno una volta al mese</option>
                            <option value="3">Almeno una volta a settimana</option>
                            <option value="3">Più volte a settimana</option>
                            <option value="3">Ogni giorno</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="textarea">Scrivi qui il tuo messaggio: <span class="text-danger">*</span></label>
                        <textarea
                            class="form-control"
                            name="textarea"
                            id="textarea"
                            rows="6"
                            minlength="1"
                            maxlength="255"
                            ng-model="textarea"
                            ng-keydown="mostraCaratteriRimanenti = true"
                            ng-blur="mostraCaratteriRimanenti = false"
                            required></textarea>
                        <span
                            style="color:red"
                            ng-show="formContatti.textarea.$dirty && formContatti.textarea.$invalid">
                            <span ng-show="formContatti.textarea.$error.required">Inserisci un messaggio valido (minimo 1 e massimo 255 caratteri).</span>
                        </span>
                        <div id="passwordHelpBlock" class="form-text" ng-show="mostraCaratteriRimanenti">
                            Caratteri rimanenti: {{caratteriRimanenti()}}
                        </div>
                    </div>

                    <div class="mb-4 border rounded px-3 py-3">
                        <p class="colore-testo mb-1"><strong>Informazioni che useremo per ricontattarti</strong></p>
                        <p class="colore-testo mb-1">
                            Nome: <em>{{ nome | primaLetteraMaiuscola}} {{ cognome | primaLetteraMaiuscola}}</em>
                        </p>
                        <p class="colore-testo mb-1">E-mail: <em>{{ mail | lowercase }}</em></p>
                    </div>

                    <div
                        class="mb-4"
                        ng-show="formContatti.nome.$valid && formContatti.cognome.$valid && formContatti.mail.$valid && formContatti.textarea.$valid">
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                value=""
                                id="check-contatti"
                                name="check-contatti"
                                ng-model="check"
                                required />
                            <label class="form-check-label" for="check-contatti">
                                Accetto i termini e le condizioni del trattamento
                                <span class="text-danger">*</span></label>
                        </div>
                    </div>

                    <div class="row mb-3 g-4">
                        <div class="col-auto">
                            <input
                                class="btn btn-primary bottone-submit-form"
                                ng-disabled="
                                    !check || 
                                    formContatti.nome.$dirty && formContatti.nome.$invalid || 
                                    formContatti.cognome.$dirty && formContatti.cognome.$invalid || 
                                    formContatti.mail.$dirty && formContatti.mail.$invalid || 
                                    formContatti.textarea.$dirty && formContatti.textarea.$invalid"
                                type="submit"
                                value="Invia" />
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-outline-secondary" type="reset" ng-click="svuotaModulo()">
                                Svuota il modulo
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
            <?= buttonAdmin() ?>
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
    <script src="src/js/contatti.js"></script>
</body>

</html>