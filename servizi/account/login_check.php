<?php
session_start();
include "../../utilities/funzioni.php";
require_once './../../utilities/Database.php';
require_once '../../config/config.php';

// connessione al DB
$database = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);

$connessione = $database->getConnection();

// fa in modo che l'utente debba prima passare da "login.php"
confermaPaginaPrecedente("Location: login.php");

// l'utente non deve essere loggato                                                     
loginTRUE("Location: ../../index.php");



#GESTIONE DEGLI ERRORI

//verifica che tutti i campi del form siano stati compilati
if (
    !isset($_POST['email-login']) or empty($_POST['email-login']) or
    !isset($_POST['password-login']) or empty($_POST['password-login'])
)
{
    Header("Location: login.php?m_r=Per favore, compila tutti i campi!");
    exit();
}

$email_input = strtolower($_POST['email-login']);
$password_input = $_POST['password-login'];

// DEBUG
// echo $password_input;
// echo $email_input;
// exit();

#confronta l'email inserita con quella già registrata nel database => ricerca di corrispondenze
$stmt = $connessione->prepare("SELECT password FROM utenti WHERE email = :email");
$stmt->execute([':email' => $email_input]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row === false)
{
    header("Location: login.php?m_r=L'indirizzo email non risulta registrato.");
    exit();
}


// verifica della correttezza della password
$password_registrata = $row['password'];

// DEBUG
// echo $email_input;
// echo $password_input;
// echo $password_registrata;
// exit();

// password_verify per confrontare le password
if ($password_input != $password_registrata)
{
    header("Location: login.php?m_r=Attenzione! La password che hai inserito è errata.");
    exit();
}

// richiesta dei dati dell'utente
$stmt = $connessione->prepare("SELECT id, email, nome, cognome, admin FROM utenti WHERE email = :email");
$stmt->execute([':email' => $email_input]);
$riga_login = $stmt->fetch(PDO::FETCH_ASSOC);


// ulteriore verifica di esistenza dell'utente
if ($riga_login)
{
    $_SESSION['id'] = $riga_login['id'];
    $_SESSION['email'] = $riga_login['email'];
    $_SESSION['nome'] = $riga_login['nome'];
    $_SESSION['cognome'] = $riga_login['cognome'];
    $_SESSION['admin'] = $riga_login['admin'];


    header("Location: ../../index.php?m_r=Bentornato!");

    $connessione = null;
    $database = null;

    exit();
}
