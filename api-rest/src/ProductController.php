<?php

class ProductController
{
    public function __construct(private ProductGateway $gateway)
    {
    }

    public function processRequest(string $method, ?string $id): void
    {
        if ($id)
        {
            $this->processResourceRequest($method, $id);
        }
        else
        {
            $this->processCollectionRequest($method);
        }
    }

    // metodo per la richiesta di un record con uno specifico ID
    private function processResourceRequest(string $method, string $id): void
    {
        // chiamo il metodo get() di ProductGateway
        $product = $this->gateway->get($id);

        // se non trovo un prodotto, cambio il codice e inserisco un messaggio
        if (! $product)
        {
            http_response_code(404); // risorsa non trovata
            echo json_encode(["message" => "ticket non trovato", "code" => 404]);
            return;
        }

        // gestione della tipologia di metodo
        switch ($method)
        {
                // ottenere un record esistente
            case "GET":
                echo json_encode($product); // converto semplicemente in JSON il valore restituito da get()
                break;

                // modificare un record esistente
            case "PATCH":

                // legge i dati grezzi (raw data) inviati al server tramite una richiesta HTTP
                // => "php://input" è uno stream di sola lettura che permette di accedere al corpo della richiesta
                // "json_decode(..., true)" -> funzione che decodifica una stringa JSON in una struttura dati di PHP
                // => l'argomento "true" passato come secondo parametro indica che si desidera ottenere un array associativo (invece di un oggetto)
                // "(array)" -> casting per essere sicuri (ad esempio nei casi in cui si restituisce NULL)
                $data = (array) json_decode(file_get_contents("php://input"), true);

                // richiamo il metodo di validazione dei dati
                $errors = $this->getValidationErrors($data, false); // aggiungo "false" perchè il nome non è nuovo
                // se la variabile non è vuota (ci sono errori): 
                if (! empty($errors))
                {
                    http_response_code(422); // unprocessable entity
                    echo json_encode(["errors" => $errors, "code" => 422]);
                    break;
                }

                // richiamo il metodo "update()"
                $rows = $this->gateway->update($product, $data);

                echo json_encode([
                    "message" => "Ticket $id modificato",
                    "rows" => $rows
                ]);
                break;

                // se voglio eliminare un prodotto
            case "DELETE":
                $rows = $this->gateway->delete($id);

                echo json_encode([
                    "message" => "Ticket $id eliminato",
                    "rows" => $rows
                ]);
                break;

                // gestione degli altri metodi http -> permessi solamente GET, PATCH e DELETE 
            default:
                http_response_code(405); // method not allowed
                header("Allow: GET, PATCH, DELETE");
                echo json_encode(["message" => "Metodo non permesso", "code" => 405]); // dettagli relativi all'errore
        }
    }

    // gestione di una collezione di elementi
    private function processCollectionRequest(string $method): void
    {
        switch ($method)
        {
                // se il metodo è GET -> restituisco tutti i record (metodo "getAll()" per quel ProductGateway)
            case "GET":
                echo json_encode($this->gateway->getAll());
                break;

                // se il metodo è "POST" -> creo un nuovo record
            case "POST":
                // legge i dati grezzi (raw data) inviati al server tramite una richiesta HTTP
                // => "php://input" è uno stream di sola lettura che permette di accedere al corpo della richiesta
                // "json_decode(..., true)" -> funzione che decodifica una stringa JSON in una struttura dati di PHP
                // => l'argomento "true" passato come secondo parametro indica che si desidera ottenere un array associativo (invece di un oggetto)
                // "(array)" -> casting per essere sicuri (ad esempio nei casi in cui si restituisce NULL)
                $data = (array) json_decode(file_get_contents("php://input"), true);

                // richiamo il metodo di validazione dei dati
                $errors = $this->getValidationErrors($data);
                // se la variabile non è vuota (ci sono errori): 
                if (! empty($errors))
                {
                    http_response_code(422); // unprocessable entity
                    echo json_encode(["errors" => $errors, "code" => 422]); // mando gli errori come json
                    break;
                }

                // richiamo il metodo per creare un prodotto, passando un array 
                $id = $this->gateway->create($data);

                // risposta in JSON per l'avvenuta creazione del prodotto
                http_response_code(201); // codice da utilizzare per l'inserimento di un nuovo record "CREATED"
                echo json_encode([
                    "message" => "prodotto creato",
                    "id" => $id
                ]);
                break;

                // gestione degli altri metodi http -> permessi solamente GET e POST
            default:
                http_response_code(405); // method not allowed
                header("Allow: GET, POST"); // aggiungo questa linea all'header http
                echo json_encode(["message" => "Metodo non permesso", "code" => 405]);
        }
    }

    // metodo per la validazione dei campi
    // accetta un array di dati da validare e restituisce un array con messaggio di errore
    private function getValidationErrors(array $data, bool $is_new = true): array // aggiungo un nuovo parametro per capire se si tratta di un nuovo record
    {
        $errors = [];

        /* echo var_dump($data["nome"]);
        echo var_dump($data["tipo"]);
        echo var_dump($data["prezzo"]);
        echo var_dump($data["descrizione"]);
        echo var_dump($data["disponibilita"]);
        echo "\n";

        echo "nome:" . json_encode(gettype($data['nome']));
        echo "\n";
        echo "tipo:" . json_encode(gettype($data['tipo']));
        echo "\n";
        echo "prezzo:" . json_encode(gettype($data['prezzo']));
        echo "\n";
        echo "descrizione:" . json_encode(gettype($data['descrizione']));
        echo "\n";
        echo "disponibilita:" . json_encode(gettype($data['disponibilita']));
        echo "\n";
        echo "\n"; */


        if ($is_new && empty($data["nome"]))
        { // validazione "nome"
            $errors[] = "nome è un campo obbligatorio";
        }

        if ($is_new && empty($data["tipo"]))
        { // validazione "tipo"
            $errors[] = "tipo è un campo obbligatorio";
        }

        if ($is_new && empty($data["prezzo"]))
        { // validazione "prezzo"
            $errors[] = "prezzo è un campo obbligatorio";
        }

        if ($is_new && empty($data["descrizione"]))
        { // validazione "descrizione"
            $errors[] = "descrizione è un campo obbligatorio";
        }

        if ($is_new && empty($data["disponibilita"]))
        { // validazione "disponibilita"
            $errors[] = "disponibilita è un campo obbligatorio";
        }

        // validazione lunghezza massima dei campi
        // &
        // validazione tipo dei campi 

        // NOME
        if (isset($data["nome"]))
        {
            if (!is_string($data["nome"]))
            {
                $errors[] = "nome deve essere una stringa";
            }
            if (strlen($data["nome"]) > 100)
            {
                $errors[] = "nome deve avere al massimo 100 caratteri";
            }
        }

        // TIPO
        if (isset($data["tipo"]))
        {
            if (!is_string($data["tipo"]))
            {
                $errors[] = "tipo deve essere una stringa";
            }
            if (strlen($data["tipo"]) > 50)
            {
                $errors[] = "tipo deve avere al massimo 50 caratteri";
            }
            if ($data['tipo'] !== "Biglietto" && $data['tipo'] !== "Abbonamento")
            {
                $errors[] = "tipo può essere solamente Biglietto o Abbonamento";
            }
        }

        // DESCRIZIONE
        if (isset($data["descrizione"]))
        {
            if (!is_string($data["descrizione"]))
            {
                $errors[] = "descrizione deve essere una stringa";
            }
            if (strlen($data["descrizione"]) > 255)
            {
                $errors[] = "descrizione deve avere al massimo 255 caratteri";
            }
        }

        // PREZZO
        // valori non ok -> 0, "0", vuoto
        // valori ok -> 1, "1"
        if (isset($data["prezzo"]))
        {
            if (!preg_match("/^\d+$/", $data["prezzo"])) // verifico che sia un numero intero
            {
                $errors[] = "prezzo deve essere un numero intero";
            }
            else
            {
                $prezzo = intval($data["prezzo"]); // converto in intero
                if ($prezzo < 0)
                {
                    $errors[] = "prezzo non può essere negativo";
                }
            }
        }

        // DISPONIBILITA
        // valori non ok -> 0, "0", vuoto
        // valori ok -> 1, "1"
        if (isset($data["disponibilita"]))
        {
            // TODO: possibile correzione
            // (filter_var($int, FILTER_VALIDATE_INT)!== false)
            if (!filter_var($data["disponibilita"], FILTER_VALIDATE_INT)) // verifico che sia un intero
            {
                $errors[] = "disponibilita deve essere un numero intero";
            }
            else
            {
                $disponibilita = intval($data["disponibilita"]); // conversione in intero
                if ($disponibilita < 0)
                {
                    $errors[] = "disponibilita non può essere negativa";
                }
            }
        }

        return $errors;
    }
}
