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
}
