<?php

class ProductGateway
{
    private PDO $conn;

    public function __construct(Database $database)
    {
        $this->conn = $database->getConnection();
    }

    // metodo per ottenere l'elenco di tutti i prodotti 
    public function getAll(): array
    {
        $sql = "SELECT *
                FROM ticket";

        $stmt = $this->conn->query($sql);

        $data = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {

            $data[] = $row;
        }

        return $data;
    }

    // metodo per creare nuovi record
    public function create(array $data): string
    {

        $sql = "INSERT INTO ticket (nome, tipo, prezzo, descrizione, disponibilita) 
                VALUES (:nome, :tipo, :prezzo, :descrizione, :disponibilita)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":nome", $data["nome"], PDO::PARAM_STR);
        $stmt->bindValue(":tipo", $data["tipo"], PDO::PARAM_STR);
        $stmt->bindValue(":prezzo", $data["prezzo"], PDO::PARAM_INT);
        $stmt->bindValue(":descrizione", $data["descrizione"], PDO::PARAM_STR);
        $stmt->bindValue(":disponibilita", $data["disponibilita"], PDO::PARAM_INT);

        $stmt->execute();

        // viene restituita una stringa (: string) contenente l'ID del prodotto inserito
        return $this->conn->lastInsertId();
    }

    // metodo per ottenere un elemento con un determinato ID
    public function get(string $id): array | false // restituisce un array (record trovato) o false
    {
        $sql = "SELECT *
                FROM ticket
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        // è un intero
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        $stmt->execute();

        // restituisce un array (record trovato) o false
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    // metodo per modificare un record
    // accetta un array con le informazioni CORRENTI e un array con le informazioni NUOVE
    public function update(array $current, array $new): int // restituisce il numero delle righe modificate
    {

        $sql = "UPDATE ticket 
                SET nome = :nome, tipo = :tipo, prezzo = :prezzo, descrizione = :descrizione, disponibilita = :disponibilita
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        // vecchia validazione e binding
        // $stmt->bindValue(":nome", $new["nome"] ?? $current["nome"], PDO::PARAM_STR);
        // $stmt->bindValue(":tipo", $new["tipo"] ?? $current["tipo"], PDO::PARAM_STR);
        // $stmt->bindValue(":prezzo", $new["prezzo"] ?? $current["prezzo"], PDO::PARAM_INT);
        // $stmt->bindValue(":descrizione", $new["descrizione"] ?? $current["descrizione"], PDO::PARAM_STR);
        // $stmt->bindValue(":disponibilita", $new["disponibilita"] ?? $current["disponibilita"], PDO::PARAM_INT); */

        // per tutti -> se il valore non è stato inserito, non modifico
        $stmt->bindValue(":nome", (empty($new["nome"])) || (!isset($new["nome"])) ? $current["nome"] : $new["nome"], PDO::PARAM_STR);
        $stmt->bindValue(":tipo", (empty($new["tipo"])) || (!isset($new["tipo"])) ? $current["tipo"] : $new["tipo"], PDO::PARAM_STR);
        $stmt->bindValue(":prezzo", (empty($new["prezzo"])) || (!isset($new["prezzo"])) ? $current["prezzo"] : $new["prezzo"], PDO::PARAM_STR);
        $stmt->bindValue(":descrizione", (empty($new["descrizione"])) || (!isset($new["descrizione"])) ? $current["descrizione"] : $new["descrizione"], PDO::PARAM_STR);
        $stmt->bindValue(":disponibilita", (empty($new["disponibilita"])) || (!isset($new["disponibilita"])) ? $current["disponibilita"] : $new["disponibilita"], PDO::PARAM_STR);

        // l'ID rimane quello corrente
        $stmt->bindValue(":id", $current["id"], PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->rowCount(); // restituisco il numero delle righe
    }

    // metodo per eliminare un record esistente
    public function delete(string $id): int
    {
        $sql = "DELETE FROM ticket WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->rowCount();
    }
}
