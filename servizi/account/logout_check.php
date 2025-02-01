<?php
session_start();
include "../../utilities/funzioni.php";

// l'utente deve essere loggato                                                     
loginFALSE("Location: ../../index.php");

session_unset();
session_destroy();

header("Location: ../../index.php?m_r=Logout effettuato!");

exit();
