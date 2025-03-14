<?php
// Crear un programa donde sea posible añadir diferentes armas a ciertos personajes de videojuegos. Debes utilizar al menos dos personajes para este ejercicio.
// Para llevar a cabo esta tarea, aplica el patrón de diseño Decorator.



interface Character {
    public function getDescription(): string;
    public function getAttackPower(): int;
}


//Se crean los personajes
class Warrior implements Character {
    public function getDescription(): string {
        return "Guerrero";
    }

    public function getAttackPower(): int {
        return 10; // Poder de ataque base
    }
}

class Mage implements Character {
    public function getDescription(): string {
        return "Mago";
    }

    public function getAttackPower(): int {
        return 8; // Poder de ataque base
    }
}

//Se declara el decorator
abstract class WeaponDecorator implements Character {
    protected $character;

    public function __construct(Character $character) {
        $this->character = $character;
    }

    public function getDescription(): string {
        return $this->character->getDescription();
    }

    public function getAttackPower(): int {
        return $this->character->getAttackPower();
    }
}

//Implementar las armas de los personajes
class Sword extends WeaponDecorator {
    public function getDescription(): string {
        return $this->character->getDescription() . " con espada";
    }

    public function getAttackPower(): int {
        return $this->character->getAttackPower() + 5; // Aumenta el poder de ataque
    }
}

class Staff extends WeaponDecorator {
    public function getDescription(): string {
        return $this->character->getDescription() . " con bastón";
    }

    public function getAttackPower(): int {
        return $this->character->getAttackPower() + 3; // Aumenta el poder de ataque
    }
}


//Ejemplo de uso
// Crear personajes
$warrior = new Warrior();
$mage = new Mage();

// Añadir armas
$warriorWithSword = new Sword($warrior);
$mageWithStaff = new Staff($mage);

// Mostrar descripciones y poderes de ataque
echo $warriorWithSword->getDescription() . " tiene un poder de ataque de " . $warriorWithSword->getAttackPower() . "\n";
echo $mageWithStaff->getDescription() . " tiene un poder de ataque de " . $mageWithStaff->getAttackPower() . "\n";