<?php
session_start();
include "../../utilities/funzioni.php";
require_once './../../utilities/Database.php';

// l'utente deve essere loggato                                                    
loginFALSE("Location: ../../index.php");

// l'utente deve essere admin                                                  
adminFALSE("Location: ../../index.php");

// connessione al DB
$database = new Database("localhost", "tbt", "root", "");
$connessione = $database->getConnection();

if (
    !isset($_POST['conferma']) ||
    empty($_POST['conferma']) ||
    $_POST['conferma'] !== 1 ||
    $_POST['conferma'] !== 2 ||
    $_POST['conferma'] !== 3 ||
    $_POST['conferma'] !== 4
)
{
    // header("Location: admin_hidden.php");
}

$conferma = $_POST['conferma'];

switch ($conferma)
{
        // RIPRISTINO TABELLA UTENTI
    case 1:
        // svuotare tabella
        $sql = "TRUNCATE TABLE `utenti`";
        $stmt = $connessione->query($sql);
        if (!$stmt)
        {
            header("Location: admin_hidden.php?m_r=Qualcosa è andato storto.");
            exit();
        };

        // riempire tabella
        $sql = "INSERT INTO `utenti` (`id`, `email`, `nome`, `cognome`, `password`, `admin`) VALUES
                (1, 'francesco@mail.com', 'Francesco', 'Rolando', 'francesco', 0),
                (2, 'admin@mail.com', 'Francesco', 'Rolando', 'admin', 1);";
        $stmt = $connessione->query($sql);
        if (!$stmt)
        {
            header("Location: admin_hidden.php?m_r=Qualcosa è andato storto.");
            exit();
        };

        // ripristino conteggio id
        $sql = "ALTER TABLE `utenti`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;";
        $stmt = $connessione->query($sql);
        if (!$stmt)
        {
            header("Location: admin_hidden.php?m_r=Qualcosa è andato storto.");
            exit();
        };

        header("Location: admin_hidden.php?m_r=Tabella utenti ripristinata.");

        break;


        // RIPRISTINO TABELLA TICKET
    case 2:
        // svuotare tabella
        $sql = "TRUNCATE TABLE `ticket`";
        $stmt = $connessione->query($sql);
        if (!$stmt)
        {
            header("Location: admin_hidden.php?m_r=Qualcosa è andato storto.");
            exit();
        };

        // riempire tabella
        $sql = "INSERT INTO `ticket` (`id`, `nome`, `tipo`, `prezzo`, `descrizione`, `disponibilita`) VALUES
                (1, 'Singolo', 'Biglietto', 2, 'Valido per 100 minuti dal momento della prima convalida e da convalidare ogni qualvolta si cambi mezzo.', 400),
                (2, 'Mezza giornata', 'Biglietto', 4, 'Valido per 6 ore dal momento della prima convalida e da convalidare ogni qualvolta si cambi mezzo.', 400),
                (3, 'Giornaliero', 'Biglietto', 6, 'Valido per 24 ore dal momento della prima convalida e da convalidare ogni qualvolta si cambi mezzo.', 400),
                (4, 'Settimanale', 'Abbonamento', 12, 'Valido fino alle ore 23:59 della domenica della settimana in cui si convalida il titolo.', 200),
                (5, 'Mensile', 'Abbonamento', 38, 'Valido per 30 giorni dal momento della convalida.', 200),
                (6, 'Annuale', 'Abbonamento', 310, 'Valido per 365 giorni dal momento in cui si acquista il titolo.', 200);";
        $stmt = $connessione->query($sql);
        if (!$stmt)
        {
            header("Location: admin_hidden.php?m_r=Qualcosa è andato storto.");
            exit();
        };

        // ripristino conteggio id
        $sql = "ALTER TABLE `ticket`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;";
        $stmt = $connessione->query($sql);
        if (!$stmt)
        {
            header("Location: admin_hidden.php?m_r=Qualcosa è andato storto.");
            exit();
        };

        header("Location: admin_hidden.php?m_r=Tabella ticket ripristinata.");

        break;


        // AUTO_INCREMENT UTENTI
    case 3:
        // selezione id più alto e creazione nuovo id
        $id;
        $sql = "SELECT MAX(id) FROM `utenti`";
        $stmt = $connessione->query($sql);
        if (!$stmt)
        {
            header("Location: admin_hidden.php?m_r=Qualcosa è andato storto.");
            exit();
        }
        else
        {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row)
            {
                $id = $row['MAX(id)'];
            }
            else
            {
                header("Location: admin_hidden.php?m_r=Qualcosa è andato storto.");
                exit();
            }
        }

        // ripristino conteggio id
        $sql = "ALTER TABLE `utenti`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=$id;";
        $stmt = $connessione->query($sql);
        if (!$stmt)
        {
            header("Location: admin_hidden.php?m_r=Qualcosa è andato storto.");
            exit();
        };

        header("Location: admin_hidden.php?m_r=AUTO_INCREMENT utenti ripristinato.");

        break;


        // AUTO_INCREMENT UTENTI
    case 4:
        // selezione id più alto e creazione nuovo id
        $id;
        $sql = "SELECT MAX(id) FROM `ticket`";
        $stmt = $connessione->query($sql);
        if (!$stmt)
        {
            header("Location: admin_hidden.php?ERROR");
            exit();
        }
        else
        {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row)
            {
                $id = $row['MAX(id)'];
            }
            else
            {
                header("Location: admin_hidden.php?ERROR");
                exit();
            }
        }

        // ripristino conteggio id
        $sql = "ALTER TABLE `ticket`
                        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=$id;";
        $stmt = $connessione->query($sql);
        if (!$stmt)
        {
            header("Location: admin_hidden.php?ERROR");
            exit();
        };

        header("Location: admin_hidden.php?m_r=AUTO_INCREMENT ticket ripristinato.");

        break;


        // di default rimando indietro
    default:
        header("Location: admin_hidden.php?m_r=Seleziona un'opzione valida.");
}
