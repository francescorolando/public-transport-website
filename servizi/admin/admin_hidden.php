<?php
session_start();
include "../../utilities/funzioni.php";

// l'utente deve essere loggato                                                    
loginFALSE("Location: ../../index.php");

// l'utente deve essere admin                                                  
adminFALSE("Location: ../../index.php");
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN</title>
    <meta name="author" content="Rolando Francesco" />
    <meta name="description" content="" />

    <!-- FAVICON -->
    <link rel="icon" type="image/x-icon" href="./../../src/immagini/favicon.ico" />

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />

    <!-- CSS -->
    <link href="./../../src/css/style.css" rel="stylesheet" type="text/css" />
    <link href="./../../src/css/style_secondary_pages.css" rel="stylesheet" type="text/css" />

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

<body>

    <!-- Alert container -->
    <div id="alert-container"></div>

    <!-- CONTENUTO PRINCIPALE -->

    <div class="container col">
        <div class="row justify-content-center mb-3">
            <div class="col col-md-5">
                <h2 class="colore-principale-testo titolo-sp mb-5">Sezione amministratore NASCOSTE</h2>
                <p class="colore-testo paragrafo-sp">Utilizza le funzioni qui di seguito per operare sui ticket.</p>
            </div>
        </div>
        <div class="row justify-content-center mb-5 mt-5">
            <div class="col-auto">
                <form action="admin_hidden_check.php" method="post">
                    <input type="hidden" name="conferma" value="1">
                    <button type="submit" class="btn btn-primary bottone-submit-form ms-3 me-3">
                        Ripristina tabella <strong>utenti</strong>
                    </button>
                </form>
            </div>

            <div class="col-auto">
                <form action="admin_hidden_check.php" method="post">
                    <input type="hidden" name="conferma" value="2">
                    <button type="submit" class="btn btn-primary bottone-submit-form ms-3 me-3">
                        Ripristina tabella <strong>ticket</strong>
                    </button>
                </form>
            </div>
        </div>

        <div class="row justify-content-center mb-5 mt-5">
            <div class="col-auto">
                <form action="admin_hidden_check.php" method="post">
                    <input type="hidden" name="conferma" value="3">
                    <button type="submit" class="btn btn-primary bottone-submit-form ms-3 me-3">
                        AUTO_INCREMENT <strong>utenti</strong>
                    </button>
                </form>
            </div>

            <div class="col-auto">
                <form action="admin_hidden_check.php" method="post">
                    <input type="hidden" name="conferma" value="4">
                    <button type="submit" class="btn btn-primary bottone-submit-form ms-3 me-3">
                        AUTO_INCREMENT <strong>ticket</strong>
                    </button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-auto">
                <a href="admin.php" class="btn btn-outline-secondary">
                    Torna indietro
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>

    <script src="../../src/js/redirect.js"></script>
</body>

</html>