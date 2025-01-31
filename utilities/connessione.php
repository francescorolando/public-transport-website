<?php

$serverDB = 'localhost';
$userDB = 'root';
$passwordDB = '';
$DB = 'tbt';

$connessione = mysqli_connect($serverDB ,$userDB, $passwordDB, $DB);
/* or die("Errore connessione: ".mysqli_connect_error()); */

if (!$connessione)
{
    header("Location: /TBT/index.php?m_r=Ops! Errore di connessione al database.");
    exit();
}

?>