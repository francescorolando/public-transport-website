<?php

class Database
{
    public function __construct(
        private string $host,
        private string $name,
        private string $user,
        private string $password
    )
    {
    }

    public function getConnection(): PDO
    {
        $dsn = "mysql:host={$this->host};dbname={$this->name};charset=utf8";

        // all'interno setto dei parametri
        return new PDO($dsn, $this->user, $this->password, [
            // permette di impostare l'attributo successivo
            PDO::ATTR_EMULATE_PREPARES => false,
            // disabilita il fatto che tutti i dati vengono restituiti come stringhe
            PDO::ATTR_STRINGIFY_FETCHES => false
        ]);
    }

    /* public function getConnection(): PDO
    {
        $dsn = "mysql:host={$this->host};dbname={$this->name};charset=utf8";

        try
        {
            $pdo = new PDO($dsn, $this->user, $this->password, [
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_STRINGIFY_FETCHES => false
            ]);
            return $pdo;
        }
        catch (PDOException $e)
        {
            // gestione dell'errore di connessione
            error_log("Errore di connessione al database: " . $e->getMessage());
            // eccezione personalizzata o restituire un valore di errore
            throw new Exception("Impossibile connettersi al database.");
        }
    } */
}
