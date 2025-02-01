<?php

function topHeader()
{
    //controlla se si è loggati o meno
    if (!isset($_SESSION['nome']) or empty($_SESSION['nome']))
    {
        $topHeader = "
            <li class='nav-item nav-button-accedi'>
                <a class='nav-link' href='./servizi/account/login.php'>Accedi</a>
            </li>
            <li class='nav-item nav-button-registrati'>
                <a class='nav-link' href='./servizi/account/registrazione.php'>Registrati</a>
            </li>
        ";
    }
    else
    {
        /* $admin = "";
        if ($_SESSION['admin'] == 1)
        {
            $admin = "<a class='nav-link' href=''>Admin</a>";
        };
        <li class='nav-item nav-button-admin'>
            $admin
        </li> */

        $topHeader = "
            <li class='nav-item nav-button-esci'>
                <a class='nav-link' href='./servizi/account/logout_check.php'>Esci</a>
            </li>
        ";
    };

    return $topHeader;
};

/*
function footerAmministratore()
{
    if (!isset($_SESSION['nome']) or empty($_SESSION['nome']))
    {
        $footer_amministratore = '';
    }
    else
    {
        if ($_SESSION['admin'])
        {
            $footer_amministratore = "<li> <a href='admin/admin_main.php' title='Opzioni amministratore' tabindex='24'> Opzioni amministratore </a> </li>";
        }
        else
        {
            $footer_amministratore = '';
        };
    };

    return $footer_amministratore;
};
*/
