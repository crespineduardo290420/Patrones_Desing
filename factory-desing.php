<?php
// Crear un programa que contenga dos personajes: "Esqueleto" y "Zombi". Cada personaje tendrá una lógica diferente en sus ataques y velocidad. 
//La creación de los personajes dependerá del nivel del juego:
// - En el nivel fácil se creará un personaje "Esqueleto".
// - En el nivel difícil se creará un personaje "Zombi".
// Debes aplicar el patrón de diseño Factory para la creación de los personajes.


// Definimos la clase base para los personajes
abstract class Personaje {
    abstract public function atacar();
    abstract public function velocidad();
}

// Clase Esqueleto que hereda de Personaje
class Esqueleto extends Personaje {
    public function atacar() {
        return "El Esqueleto lanza un ataque con su espada.";
    }

    public function velocidad() {
        return "El Esqueleto se mueve a una velocidad lenta.";
    }
}

// Clase Zombi que hereda de Personaje
class Zombi extends Personaje {
    public function atacar() {
        return "El Zombi muerde a su oponente.";
    }

    public function velocidad() {
        return "El Zombi se mueve a una velocidad moderada.";
    }
}

// Clase Factory para crear personajes
class PersonajeFactory {
    public static function crearPersonaje($nivel) {
        if ($nivel === "facil") {
            return new Esqueleto();
        } elseif ($nivel === "dificil") {
            return new Zombi();
        } else {
            throw new InvalidArgumentException("Nivel no válido. Debe ser 'facil' o 'dificil'.");
        }
    }
}

// Ejemplo de uso
try {
    $nivelJuego = readline("Ingrese el nivel del juego (facil/dificil): ");
    $personaje = PersonajeFactory::crearPersonaje(trim($nivelJuego));
    
    echo $personaje->atacar() . PHP_EOL;
    echo $personaje->velocidad() . PHP_EOL;
} catch (InvalidArgumentException $e) {
    echo $e->getMessage() . PHP_EOL;
}