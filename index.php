<?php
session_start();
include './utilities/accountButtons.php';
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TBT - Home</title>
    <meta name="author" content="Rolando Francesco" />
    <meta name="description" content="" />

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Rokkitt:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

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

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Stile alert -->
    <style>
        .alert {
            background: #ffdb9b;
            padding: 20px 40px;
            min-width: 420px;
            position: absolute;
            right: 0;
            top: 10px;
            border-radius: 4px;
            border-left: 8px solid #ffa502;
            overflow: hidden;
            opacity: 0;
            pointer-events: none;
            z-index: 9999;
        }

        .alert.showAlert {
            opacity: 1;
            pointer-events: auto;
        }

        .alert.show {
            animation: show_slide 1s ease forwards;
        }

        @keyframes show_slide {
            0% {
                transform: translateX(100%);
            }

            40% {
                transform: translateX(-10%);
            }

            80% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-10px);
            }
        }

        .alert.hide {
            animation: hide_slide 1s ease forwards;
        }

        @keyframes hide_slide {
            0% {
                transform: translateX(-10px);
            }

            40% {
                transform: translateX(0%);
            }

            80% {
                transform: translateX(-10%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        .alert .fa-exclamation-circle {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #ce8500;
            font-size: 30px;
        }

        .alert .msg {
            padding: 0 20px;
            font-size: 16px;
            color: #ce8500;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .alert .close-btn {
            position: absolute;
            right: 0px;
            top: 50%;
            transform: translateY(-50%);
            background: #ffd080;
            padding: 20px 18px;
            cursor: pointer;
        }

        .alert .close-btn:hover {
            background: #ffc766;
        }

        .alert .close-btn .fas {
            color: #ce8500;
            font-size: 22px;
            line-height: 40px;
        }
    </style>
</head>

<body class="body-home body-home-sfondo">
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
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
                    <?= topHeader() ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Alert container -->
    <div id="alert-container"></div>

    <!-- CONTENUTO PRINCIPALE -->
    <div class="container contenuto-principale-home">
        <?php
        // DEBUG
        /* foreach ($_SESSION as $key => $value)
        {
            echo "$key - $value <br>";
        } */
        ?>
        <div class="row justify-content-end mb-4">
            <div class="col col-md-9 col-lg-7">
                <h1><span>T</span>orino <span>B</span>us & <span>T</span>ram</h1>
            </div>
        </div>
        <div class="row justify-content-end mb-4">
            <div class="col col-md-9 col-lg-7">
                <p>
                    Naviga all'interno del nostro sito e potrai trovare la informazioni di cui hai bisogno,
                    acquistare un biglietto oppure un abbonamento. Dai anche un'occhiata al nostro tour turistico!
                </p>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col col-md-9 col-lg-7 container-bottoni-home">
                <a href="biglietti-abbonamenti.php" class="btn btn-primary btn-lg px-4 gap-3">
                    Biglietti e abbonamenti
                </a>
                <a href="contatti.php" class="btn btn-outline-secondary btn-lg px-4"> Contattaci </a>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <!-- JS -->
    <script src="src/js/redirect.js"></script>
</body>

</html>