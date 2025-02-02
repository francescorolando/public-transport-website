<?php
session_start();
include './utilities/accountButtons.php';
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TBT - Orari</title>
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
                        <a class="nav-link active" href="orari.php" aria-current="page">Orari</a>
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
                                <a class="dropdown-item" href="biglietti-abbonamenti.php">
                                    Biglietti e abbonamenti
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="linea-turistica.php"> Linea turistica </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contatti.php">Contattaci</a>
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
                        <li class="breadcrumb-item active" aria-current="page">Orari</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- CONTENUTO PRINCIPALE -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-md-8">
                <h1 class="colore-testo">Orari</h1>
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col col-md-8">
                <p class="colore-testo">Consulta gli orari delle nostre linee urbane e scopri le linee notturne.</p>
            </div>
        </div>
        <div class="row justify-content-center mb-4">
            <div class="col col-md-8">
                <table class="table tabella-personalizzazione">
                    <thead>
                        <tr>
                            <th scope="col">Linea</th>
                            <th scope="col">Prima corsa</th>
                            <th scope="col">Ultima corsa</th>
                            <th scope="col">Intervallo</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr>
                            <th scope="row">1</th>
                            <td>05:00</td>
                            <td>00:30</td>
                            <td>15 minuti</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>05:00</td>
                            <td>00:30</td>
                            <td>10 minuti</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>06:20</td>
                            <td>00:30</td>
                            <td>15 minuti</td>
                        </tr>
                        <tr>
                            <th scope="row">4 *</th>
                            <td>05:00</td>
                            <td>00:30 *</td>
                            <td>30 minuti</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>05:50</td>
                            <td>00:30</td>
                            <td>15 minuti</td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>05:00</td>
                            <td>00:30</td>
                            <td>15 minuti</td>
                        </tr>
                        <tr>
                            <th scope="row">7 *</th>
                            <td>06:00</td>
                            <td>00:30 *</td>
                            <td>10 minuti</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-md-8">
                <p class="colore-testo">
                    * = Le <strong>linee notturne</strong> (4 e 9) sono attive solo il fine settimana (venerdì,
                    sabato e domenica) ed effettuano l'<strong>ultima corsa alle ore 03:30</strong>, mantenendo il
                    regolare intervallo tra le corse come indicato nella tabella sopra riportata.
                </p>
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
    <script src=""></script>
</body>

</html>