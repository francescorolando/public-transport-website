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

    <style>
        .skip-link {
            position: absolute;
            /* Lo toglie dal flusso del documento */
            top: 10px;
            /* Posizionamento */
            left: 10px;
            /* Posizionamento */
            background-color: #f0f0f0;
            /* Stile di base */
            padding: 5px 10px;
            /* Stile di base */
            border: 1px solid #ccc;
            /* Stile di base */
            z-index: 1000;
            /* Assicura che sia sopra gli altri elementi */
            text-decoration: none;
            /* Togli la sottolineatura predefinita dei link */
            /* Stili per l'focus (quando l'utente ci arriva con il tab) */
        }

        .skip-link:focus {
            outline: none;
            /* Togli l'outline predefinito */
            background-color: #ddd;
            /* Cambia colore al focus */
        }

        /* Opzionale: Nascondi il link all'inizio, mostralo solo al focus */
        .skip-link {
            /* Altre proprietà... */
            clip: rect(0, 0, 0, 0);
            /* Nascondi visivamente */
            overflow: hidden;
            /* Nascondi l'overflow */
            white-space: nowrap;
            /* Impedisci il wrapping del testo */
        }

        .skip-link:focus {
            clip: auto;
            /* Mostra il link */
            overflow: auto;
            /* Permetti l'overflow */
        }
    </style>

</head>

<body>
    <a href="admin_hidden.php" class="skip-link">Admin hidden</a>

    <!-- CONTENUTO PRINCIPALE -->

    <div class="container col">

        <div class="row justify-content-center mb-3">
            <div class="col col-md-5">
                <h2 class="colore-principale-testo titolo-sp">Sezione amministratore</h2>
                <p class="colore-testo paragrafo-sp">Utilizza le funzioni qui di seguito per operare sui ticket.</p>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-auto">
                <button type="button" class="btn btn-primary bottone-submit-form me-5" data-bs-toggle="modal" data-bs-target="#newTicketModal">
                    Crea nuovo
                </button>
                <a href="./../../index.php" class="btn btn-outline-secondary">
                    Torna alla home
                </a>
            </div>
        </div>

        <!-- MODALE PER LA CREAZIONE -->
        <div class="modal fade" id="newTicketModal" tabindex="-1" aria-labelledby="newTicketModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="newTicketModalLabel">Nuovo ticket:</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="new-ticket-form" novalidate>
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                            </div>
                            <div class="mb-3">
                                <label for="tipo" class="form-label">Tipo:</label>
                                <select class="form-select" id="tipo" name="tipo" required>
                                    <option value="Biglietto" selected disabled>Scegli un'opzione</option>
                                    <option value="Biglietto">Biglietto</option>
                                    <option value="BIglietto">Abbonamento</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="prezzo" class="form-label">Prezzo</label>
                                <input type="number" class="form-control" id="prezzo" min="1" name="prezzo" required>

                            </div>
                            <div class="mb-3">
                                <label for="descrizione" class="form-label">Descrizione</label>
                                <textarea class="form-control" id="descrizione" name="descrizione" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="disponibilita" class="form-label">Disponibilità</label>
                                <input type="number" class="form-control" id="disponibilita" min="1" name="disponibilita" required>
                            </div>
                            <button type="submit" class="btn btn-primary bottone-submit-form">Crea</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODALE PER LA MODIFICA -->
        <div class="modal fade" id="editTicketModal" tabindex="-1" aria-labelledby="editTicketModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editTicketModalLabel">Modifica ticket</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-ticket-form" novalidate>
                            <input type="hidden" id="edit-id" name="id"> </input>
                            <div class="mb-3">
                                <label for="edit-nome" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="edit-nome" name="nome" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-tipo" class="form-label">Tipo:</label>
                                <select class="form-select" id="edit-tipo" name="tipo">
                                    <option value="Biglietto" selected>Biglietto</option>
                                    <option value="Abbonamento">Abbonamento</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="edit-prezzo" class="form-label">Prezzo</label>
                                <input type="number" class="form-control" id="edit-prezzo" min="1" name="prezzo" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit-descrizione" class="form-label">Descrizione</label>
                                <textarea class="form-control" id="edit-descrizione" name="descrizione" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="edit-disponibilita" class="form-label">Disponibilità</label>
                                <input type="number" class="form-control" id="edit-disponibilita" min="0" name="disponibilita"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary bottone-submit-form">Salva modifiche</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col col-md-10">
                <table class="table tabella-personalizzazione" id="ticket-table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Prezzo(€)</th>
                            <th scope="col">Descrizione</th>
                            <th scope="col">Disponibilità</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>

    <script src="../../src/js/admin.js"></script>

    <script src="../../src/js/redirect.js"></script>
</body>

</html>