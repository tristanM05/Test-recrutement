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

// Pistes d'optimisation: 

// 1.On peut utiliser un tableau associatif pour mapper les directions et les commandes de rotation afin de remplacer le code de rotation répétitif par une seule ligne de code.
// 2.Au lieu de utiliser une boucle for et substr pour parcourir la chaîne de commandes, on peut utiliser la fonction str_split pour diviser la chaîne en tableau de caractères et utiliser une boucle foreach pour parcourir le tableau.
// 3.Au lieu de définir une variable $displacement avec une valeur constante de -1 ou 1, on peut utiliser le ternaire $command === 'f' ? 1 : -1 pour définir la valeur de $displacement.
// 4.Au lieu de utiliser plusieurs if pour vérifier la direction du rover, on peut utiliser un switch.


// class Rover
// {
//     private $directions = [
//         'N' => ['l' => 'W', 'r' => 'E'],
//         'S' => ['l' => 'E', 'r' => 'W'],
//         'W' => ['l' => 'S', 'r' => 'N'],
//         'E' => ['l' => 'N', 'r' => 'S'],
//     ];
//     private string $direction;
//     private int $y;
//     private int $x;

//     public function __construct(int $x, int $y, string $direction)
//     {
//         $this->direction = $direction;
//         $this->y = $y;
//         $this->x = $x;
//     }

//     public function receive(string $commandsSequence): void
//     {
//         $commands = str_split($commandsSequence);
//         foreach ($commands as $command) {
//             if ($command === 'l' || $command === 'r') {
//                 // Rotate Rover
//                 $this->direction = $this->directions[$this->direction][$command];
//             } else {
//                 // Displace Rover
//                 $displacement = $command === 'f' ? 1 : -1;

//                 switch ($this->direction) {
//                     case 'N':
//                         $this->y += $displacement;
//                         break;
//                     case 'S':
//                         $this->y -= $displacement;
//                         break;
//                     case 'W':
//                         $this->x -= $displacement;
//                         break;
//                     case 'E':
//                         $this->x += $displacement;
//                         break;
//                 }
//             }
//         }
//     }
// }
