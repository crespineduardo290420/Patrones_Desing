<?php
// Tenemos un sistema donde mostramos mensajes en distintos tipos de salida, como por consola, formato JSON y archivo TXT. Debes crear un programa donde se muestren todos estos tipos de salidas.
// Para este propósito, aplica el patrón de diseño Strategy.

interface OutputStrategy {
    public function output(string $message): void;
}

//Se crea clase para las estrategias concretas para la salida en la consola
class ConsoleOutput implements OutputStrategy {
    public function output(string $message): void {
        echo "Consola: " . $message . "\n";
    }
}

//Salida en JSON
class JsonOutput implements OutputStrategy {
    public function output(string $message): void {
        echo json_encode(["message" => $message]) . "\n";
    }
}

//Salida en txt
class FileOutput implements OutputStrategy {
    private $filename;

    public function __construct(string $filename) {
        $this->filename = $filename;
    }

    public function output(string $message): void {
        file_put_contents($this->filename, $message . PHP_EOL, FILE_APPEND);
        echo "Mensaje guardado en archivo: " . $this->filename . "\n";
    }
}

//Creamos el contexto en la cual se mostrara la salida en la consola
class MessageContext {
    private $strategy;

    public function setStrategy(OutputStrategy $strategy): void {
        $this->strategy = $strategy;
    }

    public function showMessage(string $message): void {
        if ($this->strategy) {
            $this->strategy->output($message);
        } else {
            echo "No se ha establecido una estrategia de salida.\n";
        }
    }
}

//Ejemplo de uso
// Crear el contexto
$messageContext = new MessageContext();

// Mostrar mensaje en consola
$messageContext->setStrategy(new ConsoleOutput());
$messageContext->showMessage("Hola, este es un mensaje en consola.");

// Mostrar mensaje en formato JSON
$messageContext->setStrategy(new JsonOutput());
$messageContext->showMessage("Hola, este es un mensaje en formato JSON.");

// Mostrar mensaje en archivo txt, se guaradar un archivo en txt 
$messageContext->setStrategy(new FileOutput("output.txt"));
$messageContext->showMessage("Hola, este es un mensaje guardado en archivo.");