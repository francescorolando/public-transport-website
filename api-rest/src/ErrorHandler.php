<?php

class ErrorHandler
{
    public static function handleException(Throwable $exception): void
    {
        // imposta il codice di errore della risposta a "500" -> indica un errore
        http_response_code(500);

        // stampa un JSON con una serie di informazioni sulla natura dell'eccezione
        echo json_encode([
            "code" => $exception->getCode(),
            "message" => $exception->getMessage(),
            "file" => $exception->getFile(),
            "line" => $exception->getLine()
        ]);
    }

    // metodo per gestire l'errore (es: cerco di creare un record con POST senza inserire dati)
    public static function handleError(
        int $errno, // numero di errore
        string $errstr, // contenuto
        string $errfile, // file in cui è avvenuto
        int $errline // numero di riga
    ): bool
    {
        // classe che permette di mostrare gli errori in forma di eccezione
        // -> imposto 0 come codice di errore, dato che non lo conosco
        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    }
}
