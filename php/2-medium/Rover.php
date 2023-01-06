<?php

declare(strict_types=1);

namespace App;

class Rover
{
    private string $direction;
    private int $y;
    private int $x;

    public function __construct(int $x, int $y, string $direction)
    {
        $this->direction = $direction;
        $this->y = $y;
        $this->x = $x;
    }

    public function receive(string $commandsSequence): void
    {
        $commandsSequenceLenght = strlen($commandsSequence);
        for ($i = 0; $i < $commandsSequenceLenght; ++$i) {
            $command = substr($commandsSequence, $i, 1);
            if ($command === "l" || $command === "r") {
                // Rotate Rover
                if ($this->direction === "N") {
                    if ($command === "r") {
                        $this->direction = "E";
                    } else {
                        $this->direction = "W";
                    }
                } else if ($this->direction === "S") {
                    if ($command === "r") {
                        $this->direction = "W";
                    } else {
                        $this->direction = "E";
                    }
                } else if ($this->direction === "W") {
                    if ($command === "r") {
                        $this->direction = "N";
                    } else {
                        $this->direction = "S";
                    }
                } else {
                    if ($command === "r") {
                        $this->direction = "S";
                    } else {
                        $this->direction = "N";
                    }
                }
            } else {
                // Displace Rover
                $displacement1 = -1;

                if ($command === "f") {
                    $displacement1 = 1;
                }
                $displacement = $displacement1;

                if ($this->direction === "N") {
                    $this->y += $displacement;
                } else if ($this->direction === "S") {
                    $this->y -= $displacement;
                } else if ($this->direction === "W") {
                    $this->x -= $displacement;
                } else {
                    $this->x += $displacement;
                }
            }
        }
    }
}

// Le code définit une classe appelée "Rover". Ici, je suppose que le rover est un véhicule télécommandé. La classe Rover
//  a trois propriétés privées : $direction, $y et $x, qui représentent respectivement la direction du rover (N, S, E, W), sa position en y et sa position en x.

// La classe Rover a également un constructeur qui prend trois arguments : $x, $y, et $direction. Le constructeur initialise les propriétés $direction, 
// $y et $x avec les valeurs passées en argument.

// La classe Rover a une méthode appelée "receive" qui prend une chaîne de caractères en argument, $commandsSequence. Cette méthode exécute une série de commandes sur le rover en 
// fonction de la chaîne de caractères passée en argument. Si la chaîne de caractères contient "l" ou "r", le rover tourne dans la direction spécifiée. Si la chaîne de caractères 
// contient "f", le rover se déplace dans la direction dans laquelle il fait face. Si $displacement vaut 1, le rover avance. Si $displacement vaut -1, le rover recule.

// En résumé, cette classe définit un rover qui peut recevoir une série de commandes pour se déplacer.