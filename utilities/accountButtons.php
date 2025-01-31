<?php

function topHeader()
{
    //controlla se si è loggati o meno
    if (!isset($_SESSION['nome']) or empty($_SESSION['nome']))
    {
        $topHeader = "
            <li class='nav-item nav-button-accedi'>
                <a class='nav-link' href=''>Accedi</a>
            </li>
            <li class='nav-item nav-button-registrati'>
                <a class='nav-link' href=''>Registrati</a>
            </li>
        ";
    }
    else
    {
        $nome = $_SESSION['nome'];

        $topHeader = "
            <li class='nav-item nav-button-accedi'>
                <a class='nav-link' href=''>Account</a>
            </li>
            <li class='nav-item nav-button-registrati'>
                <a class='nav-link' href=''>Esci</a>
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
