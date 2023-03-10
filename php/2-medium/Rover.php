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

// Le code d??finit une classe appel??e "Rover". Ici, je suppose que le rover est un v??hicule t??l??command??. La classe Rover
//  a trois propri??t??s priv??es : $direction, $y et $x, qui repr??sentent respectivement la direction du rover (N, S, E, W), sa position en y et sa position en x.

// La classe Rover a ??galement un constructeur qui prend trois arguments : $x, $y, et $direction. Le constructeur initialise les propri??t??s $direction, 
// $y et $x avec les valeurs pass??es en argument.

// La classe Rover a une m??thode appel??e "receive" qui prend une cha??ne de caract??res en argument, $commandsSequence. Cette m??thode ex??cute une s??rie de commandes sur le rover en 
// fonction de la cha??ne de caract??res pass??e en argument. Si la cha??ne de caract??res contient "l" ou "r", le rover tourne dans la direction sp??cifi??e. Si la cha??ne de caract??res 
// contient "f", le rover se d??place dans la direction dans laquelle il fait face. Si $displacement vaut 1, le rover avance. Si $displacement vaut -1, le rover recule.

// En r??sum??, cette classe d??finit un rover qui peut recevoir une s??rie de commandes pour se d??placer.

// Pistes d'optimisation: 

// 1.On peut utiliser un tableau associatif pour mapper les directions et les commandes de rotation afin de remplacer le code de rotation r??p??titif par une seule ligne de code.
// 2.Au lieu de utiliser une boucle for et substr pour parcourir la cha??ne de commandes, on peut utiliser la fonction str_split pour diviser la cha??ne en tableau de caract??res et utiliser une boucle foreach pour parcourir le tableau.
// 3.Au lieu de d??finir une variable $displacement avec une valeur constante de -1 ou 1, on peut utiliser le ternaire $command === 'f' ? 1 : -1 pour d??finir la valeur de $displacement.
// 4.Au lieu de utiliser plusieurs if pour v??rifier la direction du rover, on peut utiliser un switch.


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
