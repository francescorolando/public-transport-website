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
        $topHeader = "
            <li class='nav-item nav-button-esci'>
                <a class='nav-link' href='./servizi/account/logout_check.php'>Esci</a>
            </li>
        ";
    };

    return $topHeader;
};

function buttonAdmin()
{
    if (!isset($_SESSION['nome']) or empty($_SESSION['nome']))
    {
        $buttonAdmin = '';
    }
    else
    {
        if ($_SESSION['admin'])
        {
            $buttonAdmin = "<div class='col-auto'><a href='servizi/admin/admin.php'>ADMIN</a></div>";
        }
        else
        {
            $buttonAdmin = '';
        };
    };

    return $buttonAdmin;
};
