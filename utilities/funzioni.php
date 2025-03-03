<?php

#fa in modo che l'utente debba prima passare da "x"
function confermaPaginaPrecedente($location)
{
    if (!isset($_POST['conferma']) or empty($_POST['conferma']) or $_POST['conferma'] != 1)
    {
        header($location);
        exit();
    };;
}


#verifico che l'utente SIA LOGGATO
function loginTRUE($location)
{
    if (isset($_SESSION['email']) or !empty($_SESSION['email']))
    {
        header($location);
        exit();
    };
};


#verifica che l'utente NON SIA LOGGATO
function loginFALSE($location)
{
    if (!isset($_SESSION['email']) || empty($_SESSION['email']))
    {
        header($location);
        exit();
    };
};

#controlla che l'utente loggato sia amministratore
function adminFALSE($location)
{
    if ($_SESSION['admin'] != 1)
    {
        header($location);
        exit();
    };
};
