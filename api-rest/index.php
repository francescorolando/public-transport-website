<?php
// utilizzata per abilitare il "strict typing" (tipizzazione rigorosa)
declare(strict_types=1);

// DEBUGGING
/* echo "Richiesta: " . $_SERVER["REQUEST_URI"];
echo "\n";
echo "\n"; */

// funzione di PHP che permette di registrare una funzione o un metodo da chiamare automaticamente quando viene tentata l'istanziazione di una classe che non è stata ancora caricata
// fn questo caso, viene registrata una funzione anonima (una closure) che caricherà la classe richiesta
spl_autoload_register(function ($class)
{
    // "__DIR__" => costante magica che restituisce il percorso della directory corrente del file in cui viene chiamato
    require __DIR__ . "/src/$class.php"; // percorso del file che contiene la classe da caricare, in cui $class è il nome della classe
});

// imposta il gestore degli errori del file 
// -> le gestisce il metodo "handleError" della classe "ErrorHandler"
set_error_handler("ErrorHandler::handleError");
// imposta il gestore delle eccezioni del file 
// -> le gestisce il metodo "handleException" della classe "ErrorHandler"
set_exception_handler("ErrorHandler::handleException");

// imposta il tipo di contenuto della http reponse a JSON 
header("Content-type: application/json; charset=UTF-8");

// crea un array a partire dall'URI corrente, utilizzando "/" come criterio di separazione
// esempio: ["", "products", "123"]
$parts = explode("/", $_SERVER["REQUEST_URI"]);

// gestione del segmento "api-rest" nell'URL
$resource_index = 1; // indice di default per la risorsa
// trova l'indice di "api-rest"
$api_rest_index = array_search("api-rest", $parts);
if ($api_rest_index !== false)
{
    $resource_index = $api_rest_index + 1;
}

// controllo del percorso -> validità di "product" e "products"
$allowed_resources = ["ticket", "tickets"];
if (!isset($parts[$resource_index]) || !in_array($parts[$resource_index], $allowed_resources))
{
    http_response_code(404);
    exit;
}

// DEBUGGING - controllo sull'array parts
/* foreach ($parts as $key => $value)
{
    echo "$key : '$value' \n";
}
echo "\n"; */

// gestione dell'ID
$id = null;
if (isset($parts[$resource_index + 1]))
{
    $id = $parts[$resource_index + 1];
}

$database = new Database("localhost", "tbt", "root", "");

$gateway = new ProductGateway($database);

$controller = new ProductController($gateway);

$controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
