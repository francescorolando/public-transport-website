<?php
include "../../utilities/funzioni.php";
require_once './../../utilities/Database.php';

// connessione al DB
$database = new Database("localhost", "tbt", "root", "");
$connessione = $database->getConnection();

// fa in modo che l'utente debba prima passare da "registrazione.php"
confermaPaginaPrecedente("Location: registrazione.php");

// l'utente non deve essere loggato                                                     
loginTRUE("Location: ../../index.php");



#GESTIONE DEGLI ERRORI

//verifica che tutti i campi del form siano stati compilati
if (
    !isset($_POST['nome-registrazione']) or empty($_POST['nome-registrazione']) or
    !isset($_POST['cognome-registrazione']) or empty($_POST['cognome-registrazione']) or
    !isset($_POST['email-registrazione']) or empty($_POST['email-registrazione']) or
    !isset($_POST['password1-registrazione']) or empty($_POST['password1-registrazione']) or
    !isset($_POST['password2-registrazione']) or empty($_POST['password2-registrazione'])
)
{
    Header("Location: registrazione.php?m_r=Per favore, compila tutti i campi!");
    exit();
};

//verifica che le due password siano uguali
if ($_POST['password1-registrazione'] != $_POST['password2-registrazione'])
{
    Header("Location: registrazione.php?m_r=Attenzione! Le due password non corrispondono.");
    exit();
};

// verifica la validità della mail
function isValidEmail($email)
{
    return preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email);
}
if (!isValidEmail($_POST['email-registrazione']))
{
    Header("Location: registrazione.php?m_r=Inserisci un indirizzo email valido.");
    exit();
}

//verifica sulle lunghezze dei vari input (DB)
if (strlen($_POST['email-registrazione']) > 100)
{
    Header("Location: registrazione.php?m_r=Attenzione! L'indirizzo email non può superare i 100 caratteri.");
    exit();
};
if (strlen($_POST['nome-registrazione']) > 50)
{
    Header("Location: registrazione.php?m_r=Attenzione! Il nome non può superare i 50 caratteri.");
    exit();
};
if (strlen($_POST['cognome-registrazione']) > 50)
{
    Header("Location: registrazione.php?m_r=Attenzione! Il nome non può superare i 50 caratteri.");
    exit();
};
if (strlen($_POST['password1-registrazione']) > 50 || strlen($_POST['password1-registrazione']) < 6)
{
    Header("Location: registrazione.php?m_r=Attenzione! La password deve essere compresa fra 6 e 50 caratteri.");
    exit();
};


// RENDE LE INIZIALI DI NOME E COGNOME MAIUSCOLE e LA MAIL MINUSCOLA
$nome = ucwords($_POST['nome-registrazione']);
$cognome = ucwords($_POST['cognome-registrazione']);
$email = strtolower($_POST['email-registrazione']);
// $password = password_hash($_POST['password1-registrazione'], PASSWORD_DEFAULT); // Hash della password!

$password = $_POST["password1-registrazione"];

// verifica se l'utente è già registrato
$stmt = $connessione->prepare("SELECT * FROM utenti WHERE email = :email");
$stmt->execute(['email' => $email]);
$utenteEsistente = $stmt->fetch(PDO::FETCH_ASSOC);

if ($utenteEsistente)
{
    Header("Location: registrazione.php?m_r=Attenzione! L'utente esiste già.");
    exit();
}

$stmt = $connessione->prepare("INSERT INTO utenti (email, nome, cognome, password, admin) VALUES (:email, :nome, :cognome, :password, 0)");
$stmt->execute(['email' => $email, 'nome' => $nome, 'cognome' => $cognome, 'password' => $password]);

// messaggio di successo
header("Location: ../../index.php?m_r=Registrazione avvenuta con successo!");

$database = NULL;
$connessione = NULL;

exit();
